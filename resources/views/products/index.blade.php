<x-app-layout>
    {{-- <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 bg-gray-800 text-white">
        <div class="grid grid-cols-3 gap-6">
          
            @foreach ($products as $product)
                      
              <div class=" w-80 h-100 mt-10 bg-cover bg-center ">
                <p class="text-center">{{$product->name}}</p>
                <p>{{$product->description}}</p>
                <img src="{{Storage::url($product->image->url)}}" alt="" />
              </div>
          
            @endforeach

        </div>

    </div> --}}
    <div class="bg-white ">
        <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
          <h2 class="text-2xl text-center font-extrabold tracking-tight text-gray-900">Products</h2>
          
          <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            @foreach ($products as $product)
            
              <div class="group relative">
                <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                  <img src="{{Storage::url($product->image->url)}}" alt="" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                </div>
                <div class="mt-4 flex justify-between">
                  <div>
                    <h3 class="text-sm text-gray-700">
                      <a href="{{route('products.show', $product)}}">
                        <span aria-hidden="true" class="absolute inset-0"></span>
                        {{$product->name}}
                      </a>
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">Black</p>
                  </div>
                  <p class="text-sm font-medium text-gray-900">$35</p>
                </div>
              </div>
            @endforeach
          </div>
          
          <div class="mt-8">
            {{$products->links()}}
          </div>
        </div>
      </div>
      
</x-app-layout>