@extends('layout')

@section('content')

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #e0f7fa;
        color: #0277bd;
    }
    .product-details {
        max-width: 600px;
        margin: 40px auto;
        padding: 20px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
        transition: box-shadow 0.3s;
    }

    .product-details:hover {
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
    }

    .product-title {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 15px;
        color: #333333;
        text-align: center;
    }

    .product-price {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 25px;
        color: #007bff;
        text-align: center;
    }

    .product-description {
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 30px;
        color: #555555;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #333333;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        border: 1px solid #cccccc;
        border-radius: 6px;
        box-sizing: border-box;
        font-size: 16px;
        color: #333333;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 6px rgba(0, 123, 255, 0.25);
    }

    .btn-primary {
        display: inline-block;
        padding: 12px 25px;
        font-size: 16px;
        font-weight: bold;
        color: #ffffff;
        background-color: #007bff;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        text-align: center;
        transition: background-color 0.3s, box-shadow 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
    }

    .btn-primary:active {
        background-color: #004494;
    }
</style>

<div class="product-details">
    <h2 class="product-title">{{ $product->name }}</h2>
    <div class="product-price">${{ $product->price }}</div>
    <p class="product-stock">{{ $product->stock }}</p>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <button type="submit" class="btn-primary">Order Now</button>
    </form>
</div>

@endsection
