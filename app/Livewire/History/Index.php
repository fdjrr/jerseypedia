<?php

namespace App\Livewire\History;

use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.history.index', [
            'pesanans' => Pesanan::query()->with(['pesanan_details.product'])->where([
                'user_id' => Auth::user()->id,
                'status'  => 1,
            ])->get(),
        ]);
    }
}
