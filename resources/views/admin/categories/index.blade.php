@extends('adminlte::page')

@section('title', 'BonsaiDef')

@section('content_header')
    <h1>Category List</h1>
@stop

@section('content')

    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif

    <div class="card">

        <div class="card-header">
            <a class="btn btn-secondary" href="{{route('admin.categories.create')}}">Create Category</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{route('admin.categories.edit', $category)}}">Edit</a>
                            </td>
                            <td >
                                <form action="{{route('admin.categories.destroy', $category)}}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            </td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
