@extends('layout')

@section('content')
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e0f7fa;
            color: #0277bd;
        }
            

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form {
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #495057;
        }

        .form-group input[type="text"],
        .form-group input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            color: #495057;
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="number"]:focus {
            border-color: #007bff;
            outline: none;
        }

        .form-group button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            color: #ffffff;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        .info {
            text-align: center;
        }

        .info img {
            margin-bottom: 20px;
        }

        .info .title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #007bff;
        }

        .qr-code-box {
            margin: 20px 0;
        }

        .qr-code-box img {
            width: 200px;
            height: 200px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .code {
            font-size: 18px;
            color: #007bff;
            margin-top: 15px;
        }
    </style>
    <div class="container">
        <div class="form">
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" id="name" class="common-input">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" class="common-input">
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" id="stock" class="common-input">
            </div>
            <div class="form-group">
                <button type="button" onclick="generateQR()">Save</button>
            </div>
        </div>
        <div class="info">
            <div class="title">QR Code Generator</div>
            <div class="qr-code-box">
                <img id="qrcode" src="https://static.vecteezy.com/system/resources/previews/019/786/999/original/qr-code-scanning-icon-in-smartphone-on-transparent-background-free-png.png" alt="QR Code">
            </div>
            <header id="header"></header>
            <p id="stockText"></p>
            <h1 class="code">SCAN QR CODE</h1>
        </div>
    </div>
    <script>
        function generateQR() {
            var name = document.getElementById('name').value;
            var price = document.getElementById('price').value;
            var stock = document.getElementById('stock').value;

            // Check if all fields are filled
            if (name === "" || price === "" || stock === "") {
                alert("Please fill in all fields before saving.");
                return;
            }

            var qrCodeText = "Product Name: " + name + "\nPrice: " + price + "\nStock: " + stock;

            var qrCodeImage = document.getElementById('qrcode');
            qrCodeImage.src = 'https://api.qrserver.com/v1/create-qr-code/?data=' + encodeURIComponent(qrCodeText);

            var header = document.getElementById('header');
            header.textContent = name;

            var stockText = document.getElementById('stockText');
            stockText.textContent = "Stock: " + stock;

            // Clear form fields
            document.getElementById('name').value = "";
            document.getElementById('price').value = "";
            document.getElementById('stock').value = "";
        }
    </script>
@endsection
