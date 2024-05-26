<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use App\Imports\OrdersImport;
use Maatwebsite\Excel\Facades\Excel;
use League\Csv\Reader;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Create the order
        $order = new Order();
        $order->customer_name = $validatedData['name'];
        $order->customer_email = $validatedData['email'];
        $order->product_id = $validatedData['product_id'];
        // You might need additional logic here, like calculating the total based on product price
        $order->total = 0; // Placeholder value
        $order->save();

        // Redirect to the orders index page or display a success message
        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }

    function generateCSV() {
        $orders = Order::orderBy('id')->get();

        $filename = '../storage/orders.csv';

        $file = fopen($filename, 'w+');

        foreach($orders as $o) {

            fputcsv($file, [
                $o->customer_name,
                $o->customer_email,
                $o->product->name,
                $o->product->price  
            ]);
        }

        fclose($file);

        return response()->download($filename);
    }

    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        // Process the CSV file
        $file = $request->file('csv_file');

        // Read CSV data
        $csvData = array_map('str_getcsv', file($file));

        // Get the CSV header row
        $header = array_shift($csvData);

        foreach ($csvData as $row) {
            try {
                // Assuming CSV structure is customer_name, customer_email, product_id, total
                $customerName = $row[0];
                $customerEmail = $row[1];
                $productId = $row[2];
                $total = $row[3];

                // Find product by product ID
                $product = Product::find($productId);

                if ($product) {
                    // Create order
                    $order = new Order();
                    $order->customer_name = $customerName;
                    $order->customer_email = $customerEmail;
                    $order->product_id = $product->id;
                    $order->total = $total;
                    $order->save();
                }
            } catch (\Exception $e) {
                Log::error('Error importing order: ' . $e->getMessage());
            }
        }

        // Redirect or return a response as needed
        return redirect()->route('orders.index')->with('success', 'Orders imported successfully.');
    }

    
    public function deleteAll()
{
    Order::truncate(); // Delete all orders from the database
    return redirect()->route('orders.index')->with('success', 'All orders deleted successfully.');
}

}