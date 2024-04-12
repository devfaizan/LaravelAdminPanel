<?php

namespace App\Http\Controllers;


use App\Models\Stock;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function addProduct(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ["required"],
            'size' => ["required"],
            'status' => ["required"],
            'price' => ["required", 'numeric'],
            'quantity' => ["required", 'numeric'],
            'stock' => ["required", 'regex:/^[0-9]+$/'],
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        $adminId = auth()->user()->id;

        $product = Product::create([
            'product_name' => $validatedData['name'],
            'product_size' => $validatedData['size'],
            'product_status' => $validatedData['status'],
            'product_price' => $validatedData['price'],
            'product_quantity' => $validatedData['quantity'],
            'stock_id' => $validatedData['stock'],
            'admin_id' => $adminId,
            'last_update_by' => $adminId,
        ]);

        $product->save();

        foreach ($request->file('images') as $image) {
            $imageName = $product->product_id . '_' . Str::random(5) . time() . '.' . $image->extension();
            $image->storeAs('productimages/' . $product->product_id, $imageName, 'public');

            ProductImage::create([
                'product_id' => $product->product_id,
                'image_name' => $imageName,
            ]);
        }
        $stock = Stock::findOrFail($validatedData['stock']);
        $stock->quantity -= $validatedData['quantity'];
        $stock->save();

        return redirect('/addproduct')->with('success', 'Product created successfully.');
    }

    public function showProducts()
    {
        $products = Product::with('images')->paginate(4);

        return view('products.products', compact('products'));
    }


    public function editProduct($id)
    {
        $product = Product::with('images')->findOrFail($id);

        return view('products.editproduct', compact('product'));
    }

    public function updateProduct(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'size' => ['required'],
            'status' => ['required'],
            'price' => ["required", 'numeric'],
            'quantity' => ["required", 'numeric'],
            'stock' => ["required", 'regex:/^[0-9]+$/'],
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        $product = Product::with('images')->findOrFail($id);

        $stockChange = $validatedData['quantity'] - $product->product_quantity;
        $stock = Stock::findOrFail($validatedData['stock']);
        $stock->quantity -= $stockChange;
        $stock->save();

        $product->update([
            'product_name' => $validatedData['name'],
            'product_size' => $validatedData['size'],
            'product_status' => $validatedData['status'],
            'product_price' => $validatedData['price'],
            'product_quantity' => $validatedData['quantity'],
            'stock_id' => $validatedData['stock'],
            'last_update_by' => auth()->user()->id,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $product->product_id . '_' . Str::random(5) . time() . '.' . $image->extension();
                $image->storeAs('productimages/' . $product->product_id, $imageName, 'public');

                ProductImage::create([
                    'product_id' => $product->product_id,
                    'image_name' => $imageName,
                ]);
            }
        }
        if ($request->has('delete_images')) {
            foreach ($request->input('delete_images') as $imageId) {
                $image = ProductImage::find($imageId);

                if ($image) {
                    $imagePath = 'productimages/' . $product->product_id . '/' . $image->image_name;
                    if (Storage::disk('public')->exists($imagePath)) {
                        Storage::disk('public')->delete($imagePath);
                    }
                    $image->delete();
                }
            }
        }


        return redirect('/products')->with('success', 'Product updated successfully.');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);

        $stock = Stock::findOrFail($product->stock_id);
        $stock->quantity += $product->product_quantity;
        $stock->save();


        foreach ($product->images as $image) {
            $imagePath = 'productimages/' . $product->product_id . '/' . $image->image_name;
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            $image->delete();
        }
        $productFolderPath = 'productimages/' . $product->product_id;
        if (Storage::disk('public')->exists($productFolderPath)) {
            Storage::disk('public')->deleteDirectory($productFolderPath);
        }
        $product->delete();

        return redirect('/products')->with('success', 'Product and associated images deleted successfully.');
    }

    public function deleteImage($id)
    {
        $image = ProductImage::find($id);

        if ($image) {
            $imagePath = 'productimages/' . $image->product_id . '/' . $image->image_name;
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            $image->delete();

            return response()->json(['success' => true], 200);
        }

        return response()->json(['success' => false], 404);
    }
    public function getProducts()
    {
        $products = Product::with('images')->get();

        return response()->json(['products' => $products], 200);
    }

}
