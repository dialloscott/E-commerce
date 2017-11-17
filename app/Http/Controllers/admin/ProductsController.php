<?php

namespace App\Http\Controllers\admin;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Image;
use App\Product;
use App\Repositories\DroboxStorage;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(5);

        $product_count = Product::count();
        return view('admin.products.index', compact('products', 'product_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists();
        $brands = Brand::lists();
        $product = new Product();
        return view('admin.products.create', compact('categories', 'brands', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        Product::create($this->createProduct($request));
        flash()->success('Success', 'Product created successfully!');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.upload', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('products.index');
        }
        $brands = Brand::lists();
        $categories = Category::lists();
        return view('admin.products.edit', compact('product', 'brands', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        if ($this->user()->isAdmin()) {
            $product = Product::find($id);
            $product->update($request->only([
                'name', 'price', 'reduce', 'brand_id', 'category_id', 'sku', 'quantity', 'description', 'spec', 'featured'
            ]));
            flash()->success('success', 'Product updated successfully');
            return redirect()->route('products.index');
        }
        flash()->error('error', 'Cannot edit product because you are not a administrator ');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->user()->isAdmin()) {
            Product::findOrFail($id)->delete();
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function attachImage(Request $request,DroboxStorage $droboxStorage, int $id)
    {
        $product = Product::where('id', $id)->first();
        $file = $request->file('image');
        $image = $product->images()->create([
            'name' => md5($file->getClientOriginalName().time()).'.'.$file->extension()
        ]);
        $image->upload($product,$file,$droboxStorage);
        return $image->name;

    }


    private function createProduct(Request $request)
    {
        return $request->only(['name', 'brand_id', 'price', 'reduce',
            'category_id', 'featured', 'quantity', 'sku', 'description', 'spec']);
    }
}
