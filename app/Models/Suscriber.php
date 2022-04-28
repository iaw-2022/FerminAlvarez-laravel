<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Suscriber extends Model
{
    use HasFactory;

    protected $table = 'suscribers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email'
    ];

    public function books(){
        return $this->belongsToMany(Book::class,'subscribed','id_suscriber','ISBN','id','ISBN');
    }
}
