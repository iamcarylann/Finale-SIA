@extends('layout')

@section('content')

        <h1>Create Order</h1>
        <form method="POST" action="{{ route('orders.store') }}">
            @csrf
            <div class="form-group">
                <label for="customer_name">Customer Name</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" required>
            </div>
            <div class="form-group">
                <label for="customer_email">Customer Email</label>
                <input type="email" class="form-control" id="customer_email" name="customer_email" required>
            </div>
            <!-- Add more input fields as needed -->
            <button type="submit" class="btn btn-primary">Submit Order</button>
        </form>
    </div>

@endsection