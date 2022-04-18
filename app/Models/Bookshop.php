<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookshop extends Model
{
    use HasFactory;

    protected $table = 'bookshops';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'city',
        'latitude',
        'longitude'
    ];

    public function books(){
        return $this->belongsToMany(Book::class,'has','Bookshop','ISBN')->withPivot('price')->withTimestamps();
    }
}
