<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    /**
     * Display the product page in admin panel.
     *
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Add Product Page.
     *
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Add Product method.
     *
     */
    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();
        $product = Product::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'status' => $request['status'] == true ? '1' : '0',
            'price' => $validatedData['price']

        ]);

        $product->save();

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';
            $i = 1;
            foreach ($request->file('image') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time() . $i++ . '.' . $extension;
                $imageFile->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath . $filename;
                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName
                ]);
            }
        }

        return redirect('/admin/products')->with('message', 'Product Added Successfully');

    }

    /**
     * Update Product page.
     *
     */
    public function edit(int $product_id)
    {
        $product = Product::findOrFail($product_id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update Product method.
     *
     */
    public function update(ProductFormRequest $request, int $product_id)
    {
        $validatedData = $request->validated();
        $product = Product::findOrFail($product_id);

        if ($product) {
            $product->update([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'price' => $validatedData['price']
            ]);

            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/products/';
                $i = 1;
                foreach ($request->file('image') as $imageFile) {
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename = time() . $i++ . '.' . $extension;
                    $imageFile->move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath . $filename;

                    $product->productImages()->update([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName
                    ]);
                }
            }

            return redirect('/admin/products')->with('message', 'Product Updated Successfully');

        } else {
            return redirect('admin/products')->with('message', "No Product Found");
        }

    }

    /**
     * Delete product method.
     *
     */
    public function destroy(int $product_id)
    {
        $product = Product::findOrFail($product_id);
        if ($product->productImages()) {
            foreach ($product->productImages as $image) {
                if (File::exists($image->image)) {
                    File::delete($image->image);
                }
            }
        }

        $product->delete();
        return redirect()->back()->with('message', 'Product deleted');
    }

    /**
     * Change status without refresh method.
     *
     */
    public function changeProductStatus(Request $request)
    {

        $product = Product::find($request->product_id);
        $product->status = $request->status;
        $product->save();
        return response()->json(['success' => "Status Changed Successfully"]);
    }


}
