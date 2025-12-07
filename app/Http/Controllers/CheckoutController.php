<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Address;
use App\Models\ProductStock;

class CheckoutController extends Controller
{

    public function show()
    {
        return view('checkout.index');
    }

    public function process(Request $request)
    {

        $request->validate([
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'extra_details' => 'nullable|string|max:500',
            'payment_method' => 'required|string|in:card,cash,paypal',
        ]);

        $user = Auth::user();

        // Obtenemos el carrito de localStorage via JS (en el front-end lo pasaremos al backend vía fetch o input hidden)
        $cartItems = json_decode($request->input('cart_items'), true);

        if (empty($cartItems)) {
            return back()->with('error', 'El carrito está vacío.');
        }

        DB::beginTransaction();

        try {

            // Calcular total y verificar stock
            $total = 0;
            foreach ($cartItems as $item) {
                $stock = ProductStock::findOrFail($item['stock_id']); // stock_id enviado desde el front
                if ($stock->quantity < $item['quantity']) {
                    return back()->with('error', "No hay suficiente stock para {$stock->product->name} talla {$stock->size}");
                }
                $total += $item['price'] * $item['quantity'];
            }

            // Crear pedido
            $order = Order::create([
                'user_id' => $user->id,
                'total_amount' => $total,
                'status' => 'pending',
            ]);

            // Crear items y reducir stock
            foreach ($cartItems as $item) {
                $stock = ProductStock::findOrFail($item['stock_id']);
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_stock_id' => $stock->id,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
                $stock->decrement('quantity', $item['quantity']);
            }

            // Guardar dirección asociada al pedido
            Address::create([
                'order_id' => $order->id,
                'street' => $request->street,
                'city' => $request->city,
                'postal_code' => $request->postal_code,
                'country' => $request->country,
                'extra_details' => $request->extra_details,
            ]);

            // Crear pago
            Payment::create([
                'order_id' => $order->id,
                'method' => $request->payment_method,
                'status' => 'pending', // Aquí se integraría pasarela real
            ]);

            DB::commit();

            return redirect()->route('checkout.success', $order->id);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Error al procesar el pedido: '.$e->getMessage());
        }

    }

    public function success(Order $order)
    {
        return view('checkout.success', compact('order'));
    }

}
