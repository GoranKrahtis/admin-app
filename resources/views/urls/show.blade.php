@extends('layouts.app')

@section('content')

    <div class='row'>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{$url->name}}</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('urls.index')}}" class="btn btn-primary" title="Go back"><i class="fas fa-backward "></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>URL</strong>
                {{$url->code}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description</strong>
                {{$url->description}}
            </div>
        </div>
    </div>

@endsection