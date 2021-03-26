<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'user_id',
    'food_id',
    'quantity',
    'total',
    'status',
    'payment_url',
    ];

    /**
     * Mendapatkan user yang telah melakukan transaksi
     * @see https://laravel.com/docs/8.x/eloquent-relationships#one-to-one-defining-the-inverse-of-the-relationship
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Mendapatkan data food lebih lengkap dengan menggunakan food_id
     */
    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}
