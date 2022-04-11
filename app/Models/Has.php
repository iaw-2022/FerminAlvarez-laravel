<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Has extends Model
{
    use HasFactory;

    protected $table = 'has';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'price',
        'ISBN',
        'Bookshop'
    ];
}
