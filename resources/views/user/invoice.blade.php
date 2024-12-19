<x-layout>
    @section('content')
<div class="container">
    <h1>Invoice</h1>

    <div class="card">
        <div class="card-header">
            <h5>Invoice Details</h5>
        </div>
        <div class="card-body">
            <p><strong>{{ $booking->trip->judul }}</strong></p>
            <p><strong>Harga Trip:</strong> Rp. {{ number_format($booking->trip->harga_trip, 0, ',', '.') }}</p>
            <p><strong>Total:</strong> Rp. {{ number_format($booking->harga_total, 0, ',', '.') }}</p>
            <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
            <p><strong>Tanggal pembayaran:</strong> {{ $booking->created_at->format('d M Y, H:i') }}</p>
        </div>
    </div>

    <div class="d-flex justify-content-center my-5">
        <a href="{{ '/homepage' }}" class="btn btn-primary">Kembali ke beranda</a>
    </div>
</div>
</x-layout>