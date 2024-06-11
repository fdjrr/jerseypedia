<?php

namespace App\Livewire\Products;

use App\Models\Liga as BaseModel;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Liga extends Component
{
    use WithPagination;

    public $search, $liga;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount($ligaId)
    {
        $liga = BaseModel::find($ligaId);

        if ($liga) {
            $this->liga = $liga;
        }
    }

    public function render()
    {
        if ($this->search) {
            $products = Product::query()->where('liga_id', $this->liga->id)->filter([
                'search' => $this->search,
            ])->paginate(8)->withQueryString();
        } else {
            $products = Product::query()->where('liga_id', $this->liga->id)->paginate(8)->withQueryString();
        }

        return view('livewire.products.liga', [
            'title'    => 'Jersey ' . $this->liga->nama,
            'products' => $products,
        ]);
    }
}
