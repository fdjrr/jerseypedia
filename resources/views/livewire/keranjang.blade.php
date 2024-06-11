<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a wire:navigate href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Keranjang Saya</li>
        </ol>
    </nav>

    <div class="row mt-4">
        <div class="col-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-nowrap align-middle">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Name Set</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($pesanan)
                            @forelse ($pesanan->pesanan_details as $pesanan_detail)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ $pesanan_detail->product?->gambar_url }}" alt="" class="img-fluid" width="75"></td>
                                <td>{{ $pesanan_detail->product?->nama }}</td>
                                <td>
                                    @if($pesanan_detail->nama)
                                    <ul>
                                        <li>Nama : {{ $pesanan_detail->nama }}</li>
                                        <li>Nomor : {{ $pesanan_detail->nomor }}</li>
                                    </ul>
                                    @endif
                                </td>
                                <td>{{ $pesanan_detail->jumlah_pesanan }}</td>
                                <td>Rp. {{ $pesanan_detail->product?->harga_formatted }}</td>
                                <td>Rp. {{ $pesanan_detail->total_harga_formatted }}</td>
                                <td>
                                    <button wire:click="destroy({{ $pesanan_detail->id }})" class="btn btn-icon btn-danger"><i class="icon ti ti-trash"></i></button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="100%" class="text-center">Keranjang Kosong</td>
                            </tr>
                            @endforelse
                            <tr>
                                <td class="fw-bold" colspan="6" align="right">Total Harga :</td>
                                <td align="right">Rp. {{ $pesanan->total_harga_formatted }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold" colspan="6" align="right">Kode Unik : </td>
                                <td align="right">Rp. {{ $pesanan->kode_unik_formatted }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold" colspan="6" align="right">Total Yang Harus dibayarkan :</td>
                                <td align="right">Rp. {{ number_format($pesanan->total_harga + $pesanan->kode_unik, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td colspan="6"></td>
                                <td colspan="2">
                                    <a href="{{ route('checkout') }}" class="btn btn-success" wire:navigate><i class="icon ti ti-shopping-cart"></i> Checkout</a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td colspan="100%" class="text-center">Data not found.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
