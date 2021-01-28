@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Store product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('producturls.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
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
    <form action="{{ route('producturls.store') }}" method="POST" >
        @csrf
        <div class="row">            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">                    
                    <select name="sku">
                        <option value=''>Product</optiopn>
                        @foreach($products as $product)
                            <option value="{{ $product->sku }}">{{ $product->name}}</option>
                        @endforeach 
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <select name="url">
                        <option value=''>RUL</optiopn>
                        @foreach($urls as $url)
                            <option value="{{ $url->url }}">{{ $url->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:50px; width:200px;" name="description" placeholder="Description"></textarea>
                </div>
            </div>           
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection