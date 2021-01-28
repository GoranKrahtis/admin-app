@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('storedproducts.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('storedproducts.update', $storedproduct->product_url) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product url:</strong>
                    <input type="text" name="product_url" value="{{ $storedproduct->product_url }}" class="form-control" placeholder="Product url">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">                    
                    <select name="sku" value="{{ $storedproduct->sku }}">
                        <option value=''>Product</optiopn>
                        @foreach($products as $product)
                            <option value="{{ $product->sku }}" {{$product->sku==$storedproduct->sku ? 'selected' : ''}}>{{ $product->name}}</option>
                        @endforeach 
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <select name="base_url">>
                        <option value=''>Store</optiopn>
                        @foreach($stores as $store)                            
                            <option value="{{ $store->base_url }}" {{$store->base_url==$storedproduct->base_url ? 'selected' : ''}}>{{ $store->name}}</option>
                        @endforeach 
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection