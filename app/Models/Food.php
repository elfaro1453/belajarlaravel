<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id',
        'descriptions',
        'ingredients',
        'price',
        'rating',
        'type',
        'picture_path',
    ];

    /**
     * Membuat fungsi untuk mendapatkan user yang telah membuat food ini.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
