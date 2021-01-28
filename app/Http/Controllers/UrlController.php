<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\URL;
use App\Models\Product;

class UrlController extends Controller
{
    public function index()
    {
        $urls = URL::where('url', '!=', null)->paginate(15);

        return view('urls.index', compact('urls'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('urls.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        if(empty($request->input('url'))) {
            $url = Str::random(15);
            $request->merge([
                'url' => $url,
            ]);
        }

        URL::create($request->all());

        return redirect()->route('urls.index','url')
            ->with('success', 'URL created successfully.');
    }

    public function show(URL $url)
    {
        return view('urls.show', compact('url'));
    }

    public function edit(URL $url)
    {
        return view('urls.edit', compact('url'));
    }

    public function update(Request $request, URL $url)
    {
        $request->validate([
            'url' => 'required|max:255',
            'name' => 'required|max:255',
        ]);
        $url->update($request->all());

        return redirect()->route('urls.index')
            ->with('success', 'URL updated successfully');        
    }

    public function destroy(URL $url)
    {
        $url->delete();

        return redirect()->route('urls.index')
            ->with('success', 'URL deleted successfully');
    }
}
