<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a wire:navigate href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">History</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row row-cards mt-4">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-nowrap align-middle">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Tanggal Pesan</th>
                                <th scope="col">Kode Pemesanan</th>
                                <th scope="col">Pesanan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pesanans as $pesanan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pesanan->created_at }}</td>
                                <td>{{ $pesanan->kode_pemesanan }}</td>
                                <td><a href="{{ route('history.show', $pesanan->id) }}">Lihat Pesanan</a></td>
                                <td>
                                    @if($pesanan->is_paid == 1)
                                    <span class="badge bg-success text-success-fg">Lunas</span>
                                    @else
                                    <span class="badge bg-red text-red-fg">Belum Lunas</span>
                                    @endif
                                </td>
                                <td>Rp. {{ $pesanan->total_harga_formatted }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan=100%">Data not found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <p>Untuk pembayaran silahkan dapat transfer di rekening dibawah ini :</p>
                    <img class="mb-3" src="{{ url('assets/bri.png') }}" alt="Bank BRI" width="60">
                    <p>No. Rekening 012345-678-910 atas nama <b>Fadjrir Herlambang</b></p>
                </div>
            </div>
        </div>
    </div>
</div>