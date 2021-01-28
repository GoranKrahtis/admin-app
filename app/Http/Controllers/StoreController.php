<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::where('base_url', '!=', null)->paginate(15);

        return view('stores.index', compact('stores'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('stores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        if(empty($request->input('base_url'))) {
            $base_url = strtolower(preg_replace("/\s+/", "",Str::random(15)));
            $request->merge([
                'base_url' => $base_url,
            ]);
        }
        else {
            $request->merge([
                'base_url' => strtolower(preg_replace("/\s+/", "",$request->input('base_url'))),
            ]);
        }

        if(empty($request->input('code'))) {
            $code = Str::random(15);
            $request->merge([
                'code' => $code,
            ]);
        }

        Store::create($request->all());

        return redirect()->route('stores.index','base_url')
            ->with('success', 'Store created successfully.');
    }

    public function show(Store $store)
    {
        return view('stores.show', compact('store'));
    }

    public function edit(Store $store)
    {
        return view('stores.edit', compact('store'));
    }

    public function update(Request $request, Store $store)
    {
        $request->validate([
            'code' => 'required|max:255',
            'name' => 'required',
        ]);
        $store->update($request->all());

        return redirect()->route('stores.index')
            ->with('success', 'Store updated successfully');        
    }

    public function destroy(Store $store)
    {
        $store->delete();

        return redirect()->route('stores.index')
            ->with('success', 'Store deleted successfully');
    }
}