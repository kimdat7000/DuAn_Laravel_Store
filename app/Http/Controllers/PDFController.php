<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Products;

class PDFController extends Controller
{
    public function downloadProductsPDF()
    {
        $products = Products::all();
        $data = [
            'title' => 'PRODUCTS',
            'date' => date('d/m/Y'),
            'products' => $products,
        ];
        $pdf = PDF::loadView('admin.pdf_products', $data);

        return $pdf->download('products.pdf');
    }
}
