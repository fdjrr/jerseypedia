<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a wire:navigate href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a wire:navigate href="{{ route('keranjang') }}">Keranjang Saya</a></li>
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
        </ol>
    </nav>

    <div class="row mt-4">
        <div class="col">
            <h3>Informasi Pembayaran</h3>
            <hr>
            <p>Untuk pembayaran silahkan dapat transfer di rekening dibawah ini sebesar : <b>Rp. {{ number_format($total_harga, 0, '', '.') }}</b></p>
            <img class="mb-3" src="{{ url('assets/bri.png') }}" alt="Bank BRI" width="60">
            <p>No. Rekening 012345-678-910 atas nama <b>Fadjrir Herlambang</b></p>
        </div>
        <div class="col">
            <h3>Informasi Pengiriman</h3>
            <hr>
            <form wire:submit.prevent="checkout">
                <div class="mb-3">
                    <x-label :required="true">No. HP</x-label>
                    <x-input type="text" wire:model="handphone" class="{{ $errors->has('handphone') ? 'is-invalid' : '' }}" value="{{ old('handphone') }}" />
                    @error('handphone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <x-label :required="true">Alamat</x-label>
                    <x-textarea wire:model="alamat" class="{{ $errors->has('alamat') ? 'is-invalid' : '' }}">{{ old('alamat') }}</x-textarea>
                    @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success"><i class="icon ti ti-shopping-cart"></i> Checkout</button>
            </form>
        </div>
    </div>
</div>