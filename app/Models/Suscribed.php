<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscribed extends Model
{
    use HasFactory;

    protected $table = 'subscribed';
    protected $primaryKey = "id_suscriber";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_suscriber',
        'ISBN'
    ];
}
