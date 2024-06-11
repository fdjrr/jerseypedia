<?php

namespace App\Livewire\Products;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Show extends Component
{
    public $product;

    #[Validate(['required', 'integer'])]
    public $jumlah_pesanan;

    #[Validate(['nullable', 'string', 'min:3'])]
    public $nama;

    #[Validate(['nullable', 'integer'])]
    public $nomor;

    public function mount($productId)
    {
        $product = Product::find($productId);
        if ($product) {
            $this->product = $product;
        }
    }

    public function wishlist()
    {
        if (!Auth::check()) {
            return redirect()->route('auth.login');
        }

        $this->validate();

        if (!empty($this->nama)) {
            $total_harga = $this->jumlah_pesanan * ($this->product?->harga + $this->product?->harga_nameset);
        } else {
            $total_harga = $this->jumlah_pesanan * $this->product?->harga;
        }

        $pesanan = Pesanan::query()->where([
            'user_id' => Auth::user()->id,
            'status'  => 0,
        ])->first();
        if (!$pesanan) {
            $pesanan = Pesanan::create([
                'user_id'        => Auth::user()->id,
                'total_harga'    => $total_harga,
                'status'         => 0,
                'kode_pemesanan' => 'JP-' . mt_rand(1000, 99999),
                'kode_unik'      => mt_rand(100, 999),
            ]);
        } else {
            $pesanan->total_harga = $pesanan->total_harga + $total_harga;
            $pesanan->save();
        }

        PesananDetail::create([
            'product_id'     => $this->product->id,
            'pesanan_id'     => $pesanan->id,
            'jumlah_pesanan' => $this->jumlah_pesanan,
            'namaset'        => $this->nama ? true : false,
            'nama'           => Str::upper($this->nama),
            'nomor'          => $this->nomor,
            'total_harga'    => $total_harga,
        ]);

        session()->flash('message', 'Berhasil menambahkan Jersey ke keranjang!');

        $this->dispatch('updateCart');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.products.show', [
            'product' => $this->product,
        ]);
    }
}
