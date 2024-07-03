<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class VNPayTransaction extends Model
{
    protected $fillable = [
        'user_id', 'transaction_id', 'amount', 'status', 'signature', 'transaction_time',
    ];


    // Định nghĩa quan hệ với model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
