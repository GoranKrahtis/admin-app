@extends('layouts.app')

@section('content')

    <div class='row'>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{$store->name}}</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('stores.index')}}" class="btn btn-primary" title="Go back"><i class="fas fa-backward "></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Code</strong>
                {{$store->code}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description</strong>
                {{$store->description}}
            </div>
        </div>
    </div>

@endsection