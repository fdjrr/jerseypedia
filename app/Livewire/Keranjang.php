<?php

namespace App\Livewire;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Keranjang extends Component
{
    public $pesanan;

    public function destroy($id)
    {
        $pesanan_detail = PesananDetail::query()->filter([
            'user_id' => Auth::user()->id,
        ])->where('id', $id)->first();
        if ($pesanan_detail) {
            if ($this->pesanan->pesanan_details->count() == 1) {
                $this->pesanan->delete();
            } else {
                $this->pesanan->total_harga = $this->pesanan->total_harga - $pesanan_detail->total_harga;
                $this->pesanan->save();
            }

            $pesanan_detail->delete();

            $this->dispatch('updateCart');

            session()->flash('message', 'Berhasil menghapus item dari keranjang!');
        }
    }

    public function render()
    {
        $this->pesanan = Pesanan::query()->with('pesanan_details.product')->where([
            'user_id' => Auth::user()->id,
            'status'  => 0,
        ])->first();

        return view('livewire.keranjang', [
            'pesanan' => $this->pesanan,
        ]);
    }
}
