<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /* public function product()
    {
        $Allcategory = Categories::Allcategory();
        $Allproduct = Products::Allproduct();
        return view('product', compact('Allcategory', 'Allproduct'));
    } */

    public function product(Request $request)
    {
        $category_id = $request->query('category_id');
        $Allcategory = Categories::Allcategory();

        if ($category_id) {
            $Allproduct = Products::getProductsByCategory($category_id);
        } else {
            $Allproduct = Products::Allproduct();
        }

        return view('product', compact('Allcategory', 'Allproduct'));
    }

    public function product_detail($id)
    {
        $Product = Products::showProduct($id);
        $newProducts = Products::newProducts(4);
        return view('product_detail', compact('Product', 'newProducts'));
    }

    public function productByCategory($category_id)
    {
        $Allcategory = Categories::Allcategory();
        $Allproduct = Products::getProductsByCategory($category_id);
        return view('product', compact('Allcategory', 'Allproduct'));
    }

    public function searchProduct(Request $request)
    {
        $keyword = $request->input('keyword');
        $Allcategory = Categories::Allcategory();
        $Allproduct = Products::searchProductByName($keyword);
        return view('product', compact('Allcategory', 'Allproduct'));
    }
}
