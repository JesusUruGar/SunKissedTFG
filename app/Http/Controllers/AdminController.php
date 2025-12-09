<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductStock;
use App\Models\Order;

class AdminController extends Controller
{

    // Main ----------------------------------------

    public function index()
    {
        return view('admin.index');
    }

    // Users ----------------------------------------

    public function indexUsers()
    {
        $users = User::orderBy('id','desc')->paginate(10);

        return view('admin.users', compact('users'));
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);

        return view('admin.usersEdit', compact('user'));
    }

    public function saveUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        $user->save();

        return redirect()->route('admin.users');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users');
    }

    // Products ----------------------------------------

    public function indexProducts()
    {
        $products = Product::orderBy('id','desc')->paginate(10);

        return view('admin.products', compact('products'));
    }

    public function createProduct()
    {
        $categories = Category::all();

        return view('admin.productEdit', compact('categories'));
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.productEdit', compact('product', 'categories'));
    }

    public function saveProduct(Request $request, $id = null)
    {
        if ($id) {
            $product = Product::findOrFail($id);
        } else {
            $product = new Product();
        }

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;

        $product->save();

        // Handle product images upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $uploadedImage) {
                $filename = time() . '_' . $uploadedImage->getClientOriginalName();
                $uploadedImage->move(public_path('images/products'), $filename);

                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->image_path = $filename;
                $productImage->is_primary = false;
                $productImage->order = ProductImage::where('product_id', $product->id)->count();
                $productImage->save();
            }
        }

        return redirect()->route('admin.products');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products');
    }

    // Products Images ----------------------------------------

    public function destroyImage($id)
    {
        $image = ProductImage::findOrFail($id);

        $path = public_path('images/products/' . $image->image_path);
        if (file_exists($path)) unlink($path);

        $image->delete();

        return response()->json(['success' => true]);
    }

    public function setPrimaryImage($id)
    {
        $image = ProductImage::findOrFail($id);

        // Unset previous primary
        ProductImage::where('product_id', $image->product_id)->update([
            'is_primary' => false
        ]);

        $image->is_primary = true;
        $image->save();

        return response()->json(['success' => true]);
    }

    public function reorderImages(Request $request)
    {
        foreach ($request->order as $item) {
            ProductImage::where('id', $item['id'])
                ->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }

    // Stock ----------------------------------------

    public function indexStock($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.stock', compact('product'));
    }

    public function updateStock(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $stock = ProductStock::where('product_id', $product->id);
        if (!$stock) {
            $stock = new ProductStock();
            $stock->product_id = $product->id;
        }

        // Update stock quantities
        foreach ($request->all() as $key => $value) {
            if (preg_match('/stock_(\d+)/', $key, $match)) {
                $id = $match[1];

                $variant = ProductStock::find($id);
                if ($variant) {
                    $variant->quantity = $value;
                    $variant->save();
                }
            }
        }


        return redirect()->route('admin.products');
    }

    public function addStock($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.stockEdit', compact('product'));
    }

    public function editStock($id)
    {
        $stock = ProductStock::findOrFail($id);
        $product = Product::findOrFail($stock->product_id);

        return view('admin.stockEdit', compact('product', 'stock'));
    }

    public function saveStock(Request $request, $idProduct, $idStock = null)
    {
        $product = Product::findOrFail($idProduct);

        if ($idStock) {
            $stock = ProductStock::findOrFail($idStock);
        } else {
            $stock = new ProductStock();
            $stock->product_id = $product->id;
        }

        $stock->size = $request->size;
        $stock->quantity = 0; // Initial quantity set to 0

        $stock->save();

        return redirect()->route('admin.stock', $product->id);
    }

    public function deleteStock($idProduct, $idStock)
    {
        $product = Product::findOrFail($idProduct);

        $stock = ProductStock::findOrFail($idStock);
        $stock->delete();

        return redirect()->route('admin.stock', $product->id);
    }

    // Categories ----------------------------------------

    public function indexCategories()
    {
        $categories = Category::all();

        return view('admin.categories', compact('categories'));
    }

    public function createCategory()
    {
        return view('admin.categoriesEdit');
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categoriesEdit', compact('category'));
    }

    public function saveCategory(Request $request, $id = null)
    {
        if ($id) {
            $category = Category::findOrFail($id);
        } else {
            $category = new Category();
        }

        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();

        return redirect()->route('admin.categories');
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories');
    }

    // Orders ----------------------------------------

    public function indexOrders()
    {
        $orders = Order::orderBy('id','desc')->paginate(10);

        return view('admin.orders', compact('orders'));
    }

    public function viewOrder($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.orderView', compact('order'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.orders');
    }

}
