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
<div class="form-group">
    {!! Form::label('category', 'Category',) !!}
    {!! Form::select('category_id', $categories->pluck('name'), null, ['class' => 'form-control']) !!}
    @error('category')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>