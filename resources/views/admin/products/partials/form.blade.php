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

    @error('description')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

{{-- selection category of the product --}}
<div class="form-group">
    {!! Form::label('category_id', 'Category',) !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
    @error('category_id')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>


{{-- selection active of the product --}}
<div class="form-group">
    <p class="font-weight-bold">Status</p>
    {!! Form::label('active', 'Off',) !!}
    {!! Form::radio('active', 1, true) !!}
    
    {!! Form::label('active', 'On',) !!}
    {!! Form::radio('active', 2) !!}
    
    @error('active')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
{{-- select and up you image product --}}
<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset ($product->image)
                <img id="picture" src="{{Storage::url($product->image->url)}}" alt="">
            @else
            <img id="picture" src="https://cdn.pixabay.com/photo/2021/11/28/16/27/nature-6830717_960_720.jpg" alt="">
            @endisset
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Image') !!}
            {!! Form::file('file', ['class' => 'form-control-file mb-3', 'accept' => 'image/*']) !!}
            @error('file')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam accusantium tenetur adipisci a, asperiores dolores voluptas, error consequuntur cupiditate ex vero recusandae, inventore impedit aperiam labore expedita! Tempora, unde ullam?</p>
    </div>
</div>