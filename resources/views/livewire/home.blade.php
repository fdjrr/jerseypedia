<div class="container">
    {{-- Banner --}}
    <div class="banner">
        <img src="{{ asset('assets/slider/slider1.png') }}" alt="">
    </div>

    {{-- Pilih Liga --}}
    <section class="pilih-liga mt-4">
        <h1 class="mt-4">Pilih Liga</h1>
        <div class="row mt-4">
            @forelse ($ligas as $liga)
            <div class="col-6 col-md-3 col-lg-3">
                <a href="{{ route('products.liga', $liga->id) }}" class="text-decoration-none" wire:navigate>
                    <div class="card mb-3 shadow">
                        <div class="card-body text-center">
                            <img src="{{ asset($liga->gambar_url) }}" alt="{{ $liga->nama }}" class="img-fluid">
                            <h5 class="card-title mt-3">{{ $liga->nama }}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            @endforelse
        </div>
    </section>

    {{-- Best Product --}}
    <section class="best-products mt-4">
        <div class="row align-items-center">
            <div class="col-md-9">
                <h1 class="mt-4">Best Product</h1>
            </div>
            <div class="col-md-3">
                <a href="{{ route('products.index') }}" class="btn btn-dark float-end" wire:navigate><i class="icon ti ti-eye"></i> Semua Jersey</a>
            </div>
        </div>
        <div class="row mt-4">
            @forelse ($products as $product)
            <div class="col-6 col-md-3 col-lg-3">
                <div class="card mb-3">
                    <div class="card-body text-center">
                        <img src="{{ asset($product->gambar_url) }}" alt="{{ $product->nama }}" class="img-fluid">
                        <h5 class="card-title mt-3">{{ Str::limit($product->nama, 20, '...') }}</h5>
                        <p>Rp. {{ $product->harga_formatted }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-dark w-100" wire:navigate>Detail Jersey</a>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </section>
</div>
