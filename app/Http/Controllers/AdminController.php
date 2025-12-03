<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\ProductImage;

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


}
