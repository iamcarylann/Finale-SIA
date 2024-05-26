@extends('layout')

@section('content')
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #e0f7fa;
        color: #333;
    }

    #content {
        max-width: 1200px;
        margin: 30px auto;
        padding: 25px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #007bff;
        margin-bottom: 25px;
        font-size: 2em;
    }

    .download-link {
        display: inline-block;
        margin-bottom: 20px;
        padding: 12px 25px;
        background-color: #28a745;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .download-link:hover {
        background-color: #218838;
    }

    form {
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="file"] {
        display: block;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
        padding: 8px 15px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .btn-outline-secondary {
        color: #6c757d;
        border-color: #6c757d;
        background-color: #ffffff;
        display: inline-flex;
        align-items: center;
        padding: 8px 15px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .btn-outline-secondary:hover {
        background-color: #e2e6ea;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        color: #fff;
        padding: 8px 15px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 25px;
    }

    th, td {
        padding: 15px;
        border: 1px solid #dee2e6;
        text-align: left;
    }

    th {
        background-color: #007bff;
        color: #ffffff;
    }

    tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    tbody tr:hover {
        background-color: #f1f1f1;
    }

    .icon {
        width: 20px;
        height: 20px;
    }
</style>

<script src="/node_modules/html5-qrcode/html5-qrcode.min.js"></script>
<script src="/public/jquery.min.js"></script>
<script src="/public/qrcode.min.js"></script>

<div id="content">
    <h2>Orders</h2>
    
    <a href="/orders/csv-all" target="_blank" class="download-link">Download CSV</a>

    <!-- Add the form for importing CSV -->
    <form method="POST" action="{{ route('orders.import') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="csv_file">Upload CSV File</label>
            <input type="file" class="form-control-file" id="csv_file" name="csv_file" required>
        </div>
        <button type="submit" class="btn btn-primary">Import CSV</button>
    </form>

    <a href="{{ route('scanner') }}" class="btn btn-outline-secondary btn-sm align-items-center mb-3">
        <svg id="Layer_1" data-name="Layer 1" class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.61 122.88">
            <title>scan</title>
            <path d="M23.38,0h13V11.15h-13a12.22,12.22,0,0,0-8.64,3.57l0,0a12.22,12.22,0,0,0-3.57,8.64V39.32H0V23.38A23.32,23.32,0,0,1,6.86,6.89l0,0A23.31,23.31,0,0,1,23.38,0ZM3.25,54.91H119.36a3.29,3.29,0,0,1,3.25,3.27V64.7A3.29,3.29,0,0,1,119.36,68H3.25A3.28,3.28,0,0,1,0,64.7V58.18a3.27,3.27,0,0,1,3.25-3.27ZM90.57,0h8.66a23.28,23.28,0,0,1,16.49,6.86v0a23.32,23.32,0,0,1,6.87,16.52V39.32H111.46V23.38a12.2,12.2,0,0,0-3.6-8.63v0a12.21,12.21,0,0,0-8.64-3.58H90.57V0Zm32,81.85V99.5a23.46,23.46,0,0,1-23.38,23.38H90.57V111.73h8.66A12.29,12.29,0,0,0,111.46,99.5V81.85Zm-86.23,41h-13A23.32,23.32,0,0,1,6.86,116l-.32-.35A23.28,23.28,0,0,1,0,99.5V81.85H11.15V99.5a12.25,12.25,0,0,0,3.35,8.41l.25.22a12.2,12.2,0,0,0,8.63,3.6h13v11.15Z"/>
        </svg>
    </a>

    <div class="container">
        <table>
            <thead>
                <tr>  
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr> 
                        <td>{{ $order->product ? $order->product->id : 'N/A' }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->customer_email }}</td>              
                        <td>{{ $order->product ? $order->product->name : 'Product not found' }}</td>
                        <td>${{ $order->product ? $order->product->price : 'N/A' }}</td>
                        <td>{{ $order->product ? $order->product->stock : 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            <form action="{{ route('orders.deleteAll') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete all orders?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete All Orders</button>
            </form>
        </div>
    </div>
</div>
@endsection
