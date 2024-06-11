<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a wire:navigate href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Semua Jersey</li>
        </ol>
    </nav>

    <div class="row align-items-center mt-4">
        <div class="col-md-9">
            <h1>{{ $title }}</h1>
        </div>
        <div class="col-md-3">
            <div class="input-group mb-2">
                <input type="text" wire:model.live="search" class="form-control" placeholder="Cari Jerseymu disini...">
                <button class="btn btn-icon btn-dark" type="button"><i class="icon ti ti-search"></i></button>
            </div>
        </div>
    </div>

    {{-- Semua Jersey --}}
    <section class="best-products mt-4">
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
        {{ $products->links() }}
    </section>
</div>
