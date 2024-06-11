<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if ($this->search) {
            $products = Product::query()->filter([
                'search' => $this->search,
            ])->paginate(8)->withQueryString();
        } else {
            $products = Product::query()->paginate(8)->withQueryString();
        }

        return view('livewire.products.index', [
            'title'    => 'Semua Jersey',
            'products' => $products,
        ]);
    }
}
