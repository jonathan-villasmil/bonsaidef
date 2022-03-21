<x-app-layout>

    <div class=" max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8 ">
        <h1 class="uppercase text-center text-3xl font-bold">
            Categoria: {{$category->name}}
        </h1>

        @foreach ($products as $product)
            <div class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full h-72 object-cover object-center" src="@if($product->image){{Storage::url($product->image->url)}} @else https://cdn.pixabay.com/photo/2021/11/28/16/27/nature-6830717_960_720.jpg @endif()" alt="">

                <div class="px-6 py-4">
                    <h1 class="font-bold text-xl mb-2">
                        <a href="{{route('products.show', $product)}}">{{$product->name}}</a>
                    </h1>
                    <div>
                        {{$product->description}}
                    </div>
                </div>
            </div>
        @endforeach

        <div class="mt-4">
            {{$products->links()}}
        </div>
    </div>
    
</x-app-layout>