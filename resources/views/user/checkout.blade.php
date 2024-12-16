<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Open Trip Jejak - Curug Cibaliung Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .checkout-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            width: 100%;
            display: flex;
            gap: 20px;
        }

        .left-section {
            flex: 1;
        }

        .right-section {
            flex: 1;
        }

        .checkout-container h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .checkout-container p {
            color: gray;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .checkout-section {
            margin-bottom: 20px;
        }

        .checkout-section label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .checkout-section input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .quantity-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .quantity-container input {
            width: 50px;
            text-align: center;
        }

        .summary {
            text-align: right;
        }

        .summary div {
            margin-bottom: 10px;
        }

        .summary .total {
            font-size: 18px;
            font-weight: bold;
        }

        .checkout-button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .description {
            font-size: 14px;
            line-height: 1.6;
        }
    </style>
    <script>
        function updateTotal() {
            const ticketPrice = {{ $trip->harga_trip }};
            const quantity = parseInt(document.getElementById('ticket-quantity').value) || 0;
            const total = ticketPrice * quantity;
            document.getElementById('total-amount').textContent = `Total: Rp${total.toLocaleString('id-ID')}`;
        }
    </script>
</head>

<body>
    <div class="checkout-container">
        <!-- Left Section: Description -->
        <div class="left-section">
            <h1>{{ $trip->judul }}</h1>
            <img src="{{ asset('storage/' . $trip->images->first()->image_path) }}" width="90%" id="ProductImg">
            <p class="description">{{ $trip->deskripsi }}</p>
            <p><strong>Harga Trip:</strong> Rp{{ number_format($trip->harga_trip) }}</p>
            <p><strong>Lokasi:</strong> {{ $trip->nama_destinasi }}</p>
            <p><strong>Durasi:</strong> {{ $trip->durasi }}</p>
        </div>

        <!-- Right Section: Form -->
        <div class="right-section">
            <h1>Checkout</h1>
            <p>Konfirmasi pembayaran untuk Open Trip Jejak {{ $trip->judul }}</p>

            <!-- Quantity Section -->
            <div class="checkout-section">
                <label for="ticket-quantity">Jumlah Tiket</label>
                <div class="quantity-container">
                    <button type="button"
                        onclick="document.getElementById('ticket-quantity').stepDown(); updateTotal();">-</button>
                    <input type="number" id="ticket-quantity" value="1" min="1" onchange="updateTotal()">
                    <button type="button"
                        onclick="document.getElementById('ticket-quantity').stepUp(); updateTotal();">+</button>
                </div>
            </div>

            <!-- Summary -->
            <div class="summary">
                <div>Harga Trip: <b>Rp{{ number_format($trip->harga_trip) }}</b></div>
                <div id="total-amount" class="total">Total: Rp{{ number_format($trip->harga_trip) }}</div>
            </div>


            <form method="POST" action="{{ route('checkout.store', $trip->id) }}">
                @csrf
                <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                <input type="hidden" name="quantity" id="quantity" value="1">
                <button type="submit" class="checkout-button">Checkout</button>
            </form>

        </div>
    </div>



    <script>
        function updateTotal() {
            const ticketPrice = {{ $trip->harga_trip }};
            const quantity = parseInt(document.getElementById('ticket-quantity').value) || 0;
            const total = ticketPrice * quantity;
            document.getElementById('total-amount').textContent = `Total: Rp${total.toLocaleString('id-ID')}`;
            document.getElementById('quantity').value = quantity;
        }
    </script>
</body>

</html>
