<!-- resources/views/admin/list_booking.blade.php -->
<x-layout-admin>
    <div class="container">
        <h1>Informasi Booking</h1> <br>

        @if ($bookings->isEmpty())
            <p>No bookings found.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tanggal Booking</th>
                        <th>Nama Trip</th>
                        <th>Jumlah</th>
                        <th>Harga Trip</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->user->name }}</td>
                            <td>{{ $booking->user->email }}</td>
                            <td>{{ $booking->created_at->format('d M Y') }}</td>
                            <td>{{ $booking->trip->judul }}</td>
                            <td>{{ $booking->jumlah }}</td>
                            <td>Rp. {{ number_format($booking->trip->harga_trip, 0, ',', '.') }}</td>
                            <td>Rp. {{ number_format($booking->harga_total, 0, ',', '.') }}</td>
                            <td>{{ $booking->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-layout-admin>
