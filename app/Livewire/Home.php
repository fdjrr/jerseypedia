<?php

namespace App\Livewire;

use App\Models\Liga;
use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $products = Product::query()->take(4)->get();

        return view('livewire.home', [
            'products' => $products,
            'ligas'    => Liga::all(),
        ]);
    }
}
