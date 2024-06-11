<?php

namespace App\Livewire;

use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Checkout extends Component
{
    public $total_harga;

    #[Validate(['required', 'integer'])]
    public $handphone;

    #[Validate(['required'])]
    public $alamat;

    public function mount()
    {
        if (!Auth::user()) {
            return redirect()->route('auth.login');
        }

        $this->handphone = Auth::user()->handphone;
        $this->alamat    = Auth::user()->alamat;

        $pesanan = Pesanan::query()->where([
            'user_id' => Auth::user()->id,
            'status'  => 0,
        ])->first();
        if ($pesanan) {
            $this->total_harga = $pesanan->total_harga + $pesanan->kode_unik;
        } else {
            return redirect()->route('home');
        }
    }

    public function checkout()
    {
        $this->validate();

        Auth::user()->update([
            'handphone' => $this->handphone,
            'alamat'    => Str::upper($this->alamat),
        ]);

        $pesanan         = Pesanan::query()->where([
            'user_id' => Auth::user()->id,
            'status'  => 0,
        ])->first();
        $pesanan->status = 1;
        $pesanan->save();

        $this->dispatch('updateCart');

        session()->flash('message', "Sukses Checkout");

        return redirect()->route('history.index');
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
