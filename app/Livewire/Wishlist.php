<?php

namespace App\Livewire;

use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Wishlist extends Component
{
    public $pesanan;

    #[On('updateCart')]
    public function mount()
    {
        $this->pesanan = Pesanan::query()
            ->withCount(['pesanan_details'])
            ->where([
                'user_id' => Auth::user()->id,
                'status'  => 0,
            ])->first();
    }

    public function render()
    {
        return view('livewire.wishlist', [
            'pesanan' => $this->pesanan,
        ]);
    }
}
