<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\URL;
use App\Models\ProductUrl;
use Illuminate\Support\Facades\DB;

class ProductUrlController extends Controller
{
    public function index()
    {        
        $producturls = ProductUrl::where('url', '!=', null)->paginate(15);

        return view('producturls.index', compact('producturls'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $product = DB::table('product')->get();
        $url = DB::table('url')->get();
        return view('producturls.create',$product,$url);
    }

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|max:255',
            'sku' => 'required|max:255',
        ]);

        ProductUrl::create($request->all());

        return redirect()->route('producturls.index',['url','sku'])
            ->with('success', 'Connection created successfully.');
    }

    public function show(ProductUrl $producturl)
    {
        return view('producturls.show', compact('producturls'));
    }

    public function edit(ProductUrl $producturl)
    {
        $product = DB::table('product')->get();
        $url = DB::table('url')->get();
        return view('producturls.edit', [$product, $url], compact('producturls'));
    }

    public function update(Request $request, ProductUrl $producturl)
    {
        $product = DB::table('product')->get();
        $url = DB::table('url')->get();
        $request->validate([
            'url' => 'required|max:255',
            'sku' => 'required|max:255',
            'description' => 'required|max:2040',
        ]);
        $producturl->update($request->all());

        return redirect()->route('producturls.index',['products'=>$product,'url'=>$url])
            ->with('success', 'Connection updated successfully');        
    }

    public function destroy(ProductUrl $producturl)
    {
        $producturl->delete();

        return redirect()->route('producturls.index')
            ->with('success', 'Connection deleted successfully');
    }
}
