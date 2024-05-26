@extends('layout')

@section('content')

<style>
    /* General body styling */
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #e0f7fa;
        color: #0277bd;
    }

    /* Content container styling */
    #content {
        padding: 20px;
    }

    /* Styling for the Export button */
    .bg-green-500 {
        background-color: #4caf50;
    }

    .rounded {
        border-radius: 5px;
    }

    .py-1 {
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .px-4 {
        padding-left: 20px;
        padding-right: 20px;
    }

    .text-black {
        color: black;
    }

    .hover\:bg-green-300:hover {
        background-color: #81c784;
    }

    .duration-200 {
        transition-duration: 200ms;
    }

    /* Styling for the heading */
    h2 {
        margin-bottom: 20px;
        font-size: 24px;
        text-align: center;
    }

    /* Styling for the product list container */
    .product-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }

    /* Styling for individual product items */
    .product-item {
        background-color: #ffffff;
        border: 1px solid #0277bd;
        border-radius: 10px;
        padding: 15px;
        width: 200px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .product-item .product-title {
        font-size: 18px;
        margin-bottom: 10px;
        font-weight: bold;
        color: #01579b;
    }

    .product-item .product-price {
        font-size: 16px;
        margin-bottom: 10px;
        color: #004d40;
    }

    .product-item .btn {
        display: inline-block;
        background-color: #0288d1;
        color: white;
        padding: 10px 15px;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 200ms;
    }

    .product-item .btn:hover {
        background-color: #0277bd;
    }
</style>

<div id="content">

    <a href="products/pdf" target="_blank" class="bg-green-500 rounded py-1 px-4 text-black hover:bg-green-300 duration-200">Export</a>

    <h2>Featured Products</h2>
    <div class="product-list">
        @foreach ($products as $product)
        <div class="product-item">
            {{ QrCode::generate($product->id) }}
            <div class="product-title">{{ $product->name }}</div>
            <div class="product-price">${{ $product->price }}</div>
            <a href="{{ route('show', $product->id) }}" class="btn">Order Now</a>
        </div>
        @endforeach
    </div>
</div>

@endsection
