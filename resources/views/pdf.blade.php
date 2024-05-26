<!DOCTYPE html>
<html>
<head>
    <title>Products PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .qrcode {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <h1>Product List</h1>
    <hr>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>QR Code</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>${{ $product->price }}</td>
                    <td>
                        <img src="data:image/png;base64, {!! base64_encode(QrCode::size(80)->generate('product: ' . $product->name . '\n' .
                        'product: ' . $product->name . '\n' .
                        'product: ' . $product->description . '\n' .
                        'product: ' . $product->price)) !!} ">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
