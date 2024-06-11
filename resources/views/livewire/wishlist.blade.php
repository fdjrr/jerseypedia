<div class="nav-item">
    <a href="{{ route('keranjang') }}" class="nav-link" wire:navigate>
        <i class="icon ti ti-shopping-cart"></i>
        @if ($pesanan && $pesanan->pesanan_details_count > 0)
        <span class="badge bg-red"></span>
        @endif
    </a>
</div>
