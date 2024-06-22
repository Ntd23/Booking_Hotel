<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
        }
        .container {
            width: 100%;
            margin: 0 auto;
        }
        .header, .footer {
            text-align: center;
            padding: 10px;
        }
        .content {
            margin: 20px 0;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>NightStar</h1>
        </div>
        <div class="content">
            <h2>Thông tin đặt phòng</h2>
            <table class="table">
                <tr>
                    <th>Mã đặt phòng:</th>
                    <td>{{ 'NSH_' . $booking->id }}</td>
                </tr>
                <tr>
                    <th>Tên phòng:</th>
                    <td>{{ $booking->room->name }}</td>
                </tr>
                <tr>
                    <th>Ngày nhận phòng:</th>
                    <td>{{ \Carbon\Carbon::parse($booking->check_in_date)->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th>Ngày trả phòng:</th>
                    <td>{{ \Carbon\Carbon::parse($booking->check_out_date)->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th>Thanh toán:</th>
                    <td>{{ number_format($booking->total_price) }} VND</td>
                </tr>
                @if ($booking->payment->isNotEmpty())
                    <tr>
                        <th>Ngày thanh toán:</th>
                        <td>{{ $booking->payment->first()->payment_date }}</td>
                    </tr>
                @endif
            </table>
        </div>
        <div class="footer">
            <p>Cảm ơn quý khách đã quan tâm đến NightStar!</p>
        </div>
    </div>
</body>
</html>
