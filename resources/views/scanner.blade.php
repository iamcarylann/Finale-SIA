@extends('layout')

@section('content')
<style>
    #wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin-top: -10%;
    }

    #reader {
        width: 300px;
        height: 400px;
        border: 2px solid #333;
        position: relative;
        overflow: hidden;
    }

    #scan-line {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background-color: #28a745;
        animation: scan 2s infinite linear;
    }

    @keyframes scan {
        0% {
            transform: translateY(0);
        }
        100% {
            transform: translateY(100%);
        }
    }

    h1 {
        font-size: 36px;
        margin-bottom: 30px;
    }

    .container {
        text-align: center;
    }

    .btn {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 18px;
        margin-top: 20px;
    }

    .btn:hover {
        background-color: #0056b3;
    }
</style>

<div class="container">
    <div id="wrapper">
        <h1>Pay using Gcash:</h1>
        <div id="reader">
            <div id="scan-line"></div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/html5-qrcode@latest/dist/html5-qrcode.min.js"></script>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/html5-qrcode.min.js') }}"></script>
<script>
    const config = {
        fps: 30,
        qrbox: 200
    }

    const scanner = new Html5QrcodeScanner("reader", config)

    const success = (data) => {
        fetch("{{ route('scanner.scan') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ data: data })
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                alert("orders added successfully!");
            } else {
                alert("Failed to add orders: " + result.message);
            }
            window.location.href = "{{ route('orders.index') }}"; 
        })
        .catch(error => {
            console.error("Error:", error);
            alert("An error occurred while adding order.");
            window.location.href = "{{ route('orders.index') }}"; 
        });
    }

    const error = (err) => {
        console.error(err)
    }

    scanner.render(success, error);
</script>
@endsection
