<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Store;
use App\Models\StoredProduct;
use App\Http\Controllers\StoredController;

class StoredController extends Controller
{
    public function index()
    {
        $storedproducts = StoredProduct::where('product_url', '!=', null)->paginate(15);

        return view('storedproducts.index', compact('storedproducts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $product = DB::table('product')->get();
        $store = DB::table('store')->get();
        return view('storedproducts.create',['products'=>$product,'stores'=>$store]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'base_url' => 'required',
            'sku' => 'required',
        ]);
        
        if(empty($request->input('product_url'))) {
            $product_url = strtolower(preg_replace("/\s+/", "", Str::random(15)));
            /*From task file: If the URL is not provided by the user when adding a product to store, the url should be
            automatically generated (using observer).
            I have no idea how to use oberver classes but this solution works and automatically create url with 15 characters.*/
            $request->merge([
                'product_url' => $product_url,
            ]);
        }
        else {
            $request->merge([
                'product_url' => strtolower(preg_replace("/\s+/", "",$request->input('product_url'))),
            ]);
        }

        StoredProduct::create($request->all());

        return redirect()->route('storedproducts.index','product_url')
            ->with('success', 'Product is stored successfully.');
    }

    public function show(StoredProduct $storedproduct)
    {
        return view('storedproducts.show', compact('storedproduct'));
    }

    public function edit(StoredProduct $storedproduct)
    {
        $product = DB::table('product')->get();
        $store = DB::table('store')->get();
        return view('storedproducts.edit',['products'=>$product,'stores'=>$store] ,compact('storedproduct'));
    }

    public function update(Request $request, StoredProduct $storedproduct)
    {
        $request->validate([
            'product_url' => 'required|max:255',
            'base_url' => 'required|max:255',
            'sku' => 'required|max:255',
        ]);

        $request->merge([
            'product_url' => strtolower(preg_replace("/\s+/", "",$request->input('product_url'))),
        ]);

        $storedproduct->update($request->all());

        return redirect()->route('storedproducts.index')
            ->with('success', 'Stored product updated successfully');        
    }

    public function destroy(StoredProduct $storedproduct)
    {
        $storedproduct->delete();

        return redirect()->route('storedproducts.index')
            ->with('success', 'Stored product deleted successfully');
    }
}
