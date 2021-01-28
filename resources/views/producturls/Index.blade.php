@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Stored products</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('producturls.create') }}" title="Store a product"> <i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>Number</th>
            <th>Product.sku</th>
            <th>URL</th>
            <th>Product name</th>
            <th>URL name</th>
            <th width="280px">Delete</th>
        </tr>
        @foreach ($producturls as $producturl)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $producturl->url }}</td>
                <td>{{ $producturl->sku }}</td>
                <td>{{ $producturl->GetProductName($producturl->sku) }}</td>
                <td>{{ $producturl->GetUrlName($producturl->url) }}</td>
                <td>
                    <form action="{{ route('producturls.destroy', $producturl->id) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection