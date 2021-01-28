<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\URL;
use App\Models\StoredProduct;
use App\Models\ProductUrl;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('sku', '!=', null)->paginate(15);

        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $urls = DB::table('url')->get();
        return view('products.create',['urls'=>$urls]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sku' => 'required|max:255',
            'name' => 'required|max:255',
            'price' => 'required',
        ]);

        $product = new Product();
        $product->sku = $request->input('sku');
        $string = $request->input('sku');
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->save();
        
        if(!empty($request->input('url'))) {
            $urlstr = $request->input('url');
            $url = URL::find($urlstr);
            $product->URLs()->sync(null,$string,$url->url);
        }

        return redirect()->route('products.index','sku')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'sku' => 'required|max:255',
            'name' => 'required|max:255',
            'price' => 'required',
        ]);
        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $storedProducts = StoredProduct::where('sku','==',$product->sku)->paginate(15);
        //$urlProducts = ProductUrl::where('sku','==',$product->sku);
        if($storedProducts!=null || $product->URLs->count()>0) {
            return redirect()->route('products.index')
            ->with('success', 'Operation not possible!');
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}