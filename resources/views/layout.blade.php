<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CommerceFlow</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="icon" href="{{ asset('Logo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        #branding img {
            width: 250px;  /* Adjust the width as needed */
            height: auto;  /* Maintain aspect ratio */
        }

      
    </style>

</head>
<body>
    
  
<div id="main">
    <div id="sidebar">
        <div id="branding">
            <img src="{{ asset('Logo.png') }}" alt="Logo">
        </div>
        <nav id="main-nav">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/products') }}">Product</a>
            <a href="{{ url('/orders') }}">Order</a>
            <a href="{{ url('/qr') }}">QR</a>
        
        </nav>
    </div>
    <div id="content">
        @yield('content')
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
