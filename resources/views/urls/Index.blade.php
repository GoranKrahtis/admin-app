@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>URLs</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('urls.create') }}" title="Create new URL"> <i class="fas fa-plus-circle"></i>
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
            <th>No</th>
            <th>Code</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        @foreach ($urls as $url)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$url->url}}</td>
                <td>{{$url->name}}</td>
                <td>{{$url->description}}</td>
                <td>
                    <form action="{{ route('urls.destroy', $url->url) }}" method="POST">
                    
                        <a href="{{route('urls.show',$url->url)}}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{route('urls.edit',$url->url)}}" title='edit'>
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

    {!! $urls->links() !!}

@endsection
