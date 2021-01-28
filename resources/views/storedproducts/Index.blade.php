@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Stored products</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('storedproducts.create') }}" title="Store a product"> <i class="fas fa-plus-circle"></i>
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
            <th>Store.base_url</th>
            <th>Product name</th>
            <th>Store name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($storedproducts as $stored_product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $stored_product->sku }}</td>
                <td>{{ $stored_product->base_url }}</td>
                <td>{{ $stored_product->GetProductName($stored_product->sku) }}</td>
                <td>{{ $stored_product->GetStoreName($stored_product->base_url) }}</td>
                <td>
                    <form action="{{ route('storedproducts.destroy', $stored_product->product_url) }}" method="POST">

                        <a href="{{ route('storedproducts.show', $stored_product->product_url) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('storedproducts.edit', $stored_product->product_url) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

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