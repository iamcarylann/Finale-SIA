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

    #gif-container {
        position: fixed;
        top: -10;
        left: 700px;
        width: 30%;
        height: 25%;
        z-index: -1; 
        box-shadow:0 0 10px gray;
        border-radius:10px;
        
    }

    #background-gif {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    #welcome-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        color: #ffffff;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.6);
    }

    h2 {
        font-size: 4rem;
        margin: 0;
        padding: 20px;
        border-radius: 10px;
        background: rgba(0, 77, 153, 0.7);
    }

    p.intro {
        font-size: 1.5rem;
        margin: 20px 0;
        padding: 20px;
        border-radius: 10px;
        max-width: 800px;
        text-align: center;
        background: rgba(0, 77, 153, 0.7);
    }

    .button-container {
        margin-top: 20px;
    }

    .button-container a {
        text-decoration: none;
        color: #fff;
        background-color: green;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 1.2rem;
        transition: background-color 0.3s;
    }

    .button-container a:hover {
        background-color: #01579b;
    }
</style>

<div id="gif-container">
    <img id="background-gif" src="https://media4.giphy.com/media/J8Zoo10e8y7Pfj0F1S/giphy.gif" alt="Background GIF">
</div>

<div id="welcome-container">
    <h2>Welcome to Our E-Commerce Store</h2>
    <p class="intro">
        Discover a wide range of products at unbeatable prices. Shop now and enjoy an amazing shopping experience with fast shipping and secure payment options.
    </p>
    <div class="button-container">
        <a href="{{ url('/products') }}">Start Shopping</a>
    </div>
</div>
@endsection
