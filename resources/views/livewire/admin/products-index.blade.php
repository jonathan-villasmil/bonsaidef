<div class="card">

    <div class="card-header">
        <input wire:model="search"  class="form-control" placeholder="Insert product name">
    </div>

    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif

    @if ($products->count())
        <div class="card-body">
            <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Active</th>
                                <th colspan="2"></th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->active}}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{route('admin.products.edit', $product)}}">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{route('admin.products.destroy', $product)}}" method="POSt">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                        </form>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{$products->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>Product not found</strong>
        </div>
        
    @endif
    
</div>
