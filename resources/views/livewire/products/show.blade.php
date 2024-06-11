<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a wire:navigate href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a wire:navigate href="{{ route('products.index') }}">Semua Jersey</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Jersey</li>
        </ol>
    </nav>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card gambar-product mb-3">
                <div class="card-body">
                    <img src="{{ $product->gambar_url }}" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <div>
                <h1>{{ $product->nama }}</h1>
                @if($product->is_ready == 1)
                <span class="badge bg-green-lt"><i class="icon ti ti-shopping-bag"></i> Ready Stok</span>
                @else
                <span class="badge bg-danger-lt"><i class="icon ti ti-shopping-bag-x"></i> Stok Habis</span>
                @endif
                <h3 class="mt-3">Rp. {{ $product->harga_formatted }}</h3>
            </div>

            <div class="row">
                <div class="col">
                    <form wire:submit.prevent="wishlist">
                        <table class="table align-middle">
                            <tr>
                                <td>Liga</td>
                                <td>:</td>
                                <td>
                                    <img src="{{ $product->liga?->gambar_url }}" class="img-fluid" width="50">
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis</td>
                                <td>:</td>
                                <td>{{ $product->jenis }}</td>
                            </tr>
                            <tr>
                                <td>Berat</td>
                                <td>:</td>
                                <td>{{ $product->berat }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah</td>
                                <td>:</td>
                                <td>
                                    <x-input type="number" class="{{ $errors->has('jumlah_pesanan') ? 'is-invalid' : '' }}" wire:model="jumlah_pesanan" value="{{ old('jumlah_pesanan') }}" />
                                    @error('jumlah_pesanan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            @if($jumlah_pesanan > 1)
                            @else
                            <tr>
                                <td colspan="3"><b>Name Set (isi jika tambah nameset)</b></td>
                            </tr>
                            <tr>
                                <td>Harga Name Set</td>
                                <td>:</td>
                                <td>Rp. {{ $product->harga_nameset_formatted }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>
                                    <x-input type="text" class="{{ $errors->has('nama') ? 'is-invalid' : '' }}" wire:model="nama" value="{{ old('nama') }}" />
                                    @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor</td>
                                <td>:</td>
                                <td>
                                    <x-input type="number" class="{{ $errors->has('nomor') ? 'is-invalid' : '' }}" wire:model="nomor" value="{{ old('nomor') }}" />
                                    @error('nomor')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td colspan="3">
                                    <button type="submit" class="btn btn-dark w-100" @if($product->is_ready !== 1) disabled @endif><i class="fas fa-shopping-cart"></i> Masukkan Keranjang</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
