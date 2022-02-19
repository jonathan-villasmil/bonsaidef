@extends('adminlte::page')

@section('title', 'BonsaiDef')

@section('content_header')
    <h1>Create product</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.products.store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Insert name of the product']) !!}
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Insert slug of the product', 'readonly']) !!}
                @error('slug')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            
            <div class="form-group">
                {!! Form::label('description', 'Description') !!}
                {!! Form::text('description', null, ['class'=> 'form-control', 'placeholder' => 'Insert the description of the product']) !!}
            </div>

            {{-- selection category of the product --}}
            {{-- <div class="form-group">
                {!! Form::label('category', 'Category',) !!}
                {!! Form::select('category_id', $categories->pluck('name'), null, ['class' => 'form-control']) !!}
                @error('category')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div> --}}
            {{-- selection active of the product --}}
            {{-- <div class="form-group">
                {!! Form::label('active', 'Active',) !!}
                {!! Form::select('active', $products->pluck('active'), null, ['class' => 'form-control']) !!}
                @error('category')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div> --}}

            {!! Form::submit('Create product', ['class'=> 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>

@endsection