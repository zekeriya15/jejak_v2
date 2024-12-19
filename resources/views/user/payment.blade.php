


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midtrans Payment</title>
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
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>

<body>
    <div class="checkout-container">
        <!-- Left Section: Description -->
        <div class="left-section">
            <h1>{{ $trip->judul }}</h1>
            <img src="{{ asset('storage/' . $trip->images->first()->image_path) }}" width="90%" alt="Trip Image">
            <p class="description">{{ $trip->deskripsi }}</p>
            <p><strong>Harga Trip:</strong> Rp{{ number_format($trip->harga_trip) }}</p>
            <p><strong>Lokasi:</strong> {{ $trip->nama_destinasi }}</p>
            <p><strong>Durasi:</strong> {{ $trip->durasi }}</p>
        </div>

        <!-- Right Section: Payment -->
        <div class="right-section">
            <h1>Pembayaran</h1>
            <p>Konfirmasi pembayaran untuk Open Trip Jejak {{ $trip->judul }}</p>
            <div class="summary">
                <div>Jumlah Tiket: <b>{{ $quantity }}</b></div>
                <div>Harga Trip: <b>Rp{{ number_format($trip->harga_trip) }}</b></div>
                <div id="total-amount" class="total">Total: Rp{{ number_format($trip->harga_trip * $quantity) }}</div>
            </div>

            <button id="pay-button" class="checkout-button">Bayar Sekarang</button>
        </div>
    </div>


    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{ $snapToken }}', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            // alert("payment success!"); console.log(result);
            window.location.href = "{{ route('checkout.invoice', ['booking_id' => '__booking_id__']) }}".replace('__booking_id__', result.order_id.replace('BOOKING-', ''));
          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
      });
    </script>


    {{-- <script type="text/javascript">
        // Midtrans Snap popup integration
        document.getElementById('pay-button').addEventListener('click', function () {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function (result) {
                    // alert("Pembayaran berhasil!"); 
                    // window.location.href = `/invoice/${result.order_id.replace('BOOKING-', '')}`;
                    window.location.href = "{{ route('checkout.invoice', ['booking_id' => '__booking_id__']) }}".replace('__booking_id__', result.order_id.replace('BOOKING-', ''));
                    console.log(result);
                },
                onPending: function (result) {
                    alert("Menunggu pembayaran!"); 
                    console.log(result);
                },
                onError: function (result) {
                    alert("Pembayaran gagal!"); 
                    console.log(result);
                },
                onClose: function () {
                    alert('Anda menutup popup tanpa menyelesaikan pembayaran');
                }
            });
        });
    </script> --}}
</body>

</html>
