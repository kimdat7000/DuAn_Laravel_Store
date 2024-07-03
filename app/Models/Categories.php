<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primary_key = 'id';
    protected $fillable = [
        'id',
        'name',
    ];

    public static function Allcategory()
    {
        return self::orderBy('created_at', 'desc')->get();
    }
    public static function category_ad()
    {
        return self::orderBy('created_at', 'desc')->paginate(20);
    }
    public static function showCategory($id)
    {
        return self::findOrFail($id);
    }
}
