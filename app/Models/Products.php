<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'img',
        'description',
        'price',
        'view',
        'sold',
        'category_id'
    ];

    public static function Allproduct()
    {
        return self::orderBy('created_at', 'desc')->paginate(16);
    }

    public static function product_admin()
    {
        return self::orderBy('created_at', 'desc')->paginate(20);
    }
        public static function showProduct($id)
        {
            return self::findOrFail($id);
        }

    public static function newProducts($limit)
    {
        return self::orderBy('created_at', 'desc')->take($limit)->get();
    }

    public static function bestSellerProducts($limit)
    {
        return self::orderBy('sold', 'desc')->take($limit)->get();
    }

    public static function getProductsByCategory($category_id)
    {
        return self::where('category_id', $category_id)->paginate(16);
    }

    public static function searchProductByName($keyword)
    {
        return self::where('name', 'like', '%' . $keyword . '%')->paginate(16)->appends(['keyword' => $keyword]);
    }

    //API
    public static function getLatestProducts($limit = 6)
    {
        return self::orderBy('created_at', 'desc')->take($limit)->get();
    }
}