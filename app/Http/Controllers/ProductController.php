<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;



class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product-list', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('show', compact('product'));
    }

    public function generateQrCode(Product $product)
    {
        $url = route('show', $product);
        $qrCode = QrCode::size(300)->generate($url);
        return response($qrCode)->header('Content-Type', 'image/png');
    }

    public function pdf()
    {
        $products = Product::orderBy('id')->get();

        foreach ($products as $product) {
            $product->qrCode=QrCode::size(100)->generate($product->id);
        }

        $pdf = Pdf::loadView('pdf', compact('products'));

        return $pdf->download('list of products.pdf');
    }

}