<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        // $products = Product::where('user_id', auth()->user()->id)
        //                     ->where('name', $this->search)
        //                     ->latest('id')
        //                     ->paginate();
        $products = Product::orderBy('id', 'ASC')->where('name', 'LIKE' ,'%' . $this->search . '%')->paginate(20);

        return view('livewire.admin.products-index', compact('products'));
    }
}
