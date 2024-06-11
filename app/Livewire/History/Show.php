<?php

namespace App\Livewire\History;

use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public $pesanan;

    public function mount($pesananId)
    {
        $pesanan = Pesanan::query()->where([
            'id'      => $pesananId,
            'user_id' => Auth::user()->id,
        ])->first();
        if (!$pesanan) {
            return redirect()->route('history.index');
        }

        $this->pesanan = $pesanan;
    }

    public function render()
    {
        return view('livewire.history.show');
    }
}
