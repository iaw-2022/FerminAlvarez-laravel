<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $primaryKey = 'ISBN';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'ISBN',
        'name',
        'publisher',
        'total_pages',
        'published_at',
        'category',
        'image_link',
    ];

    public function authors(){
        return $this->belongsToMany(Author::class,'written_by','ISBN','Author');
    }

    public function bookshops(){
        return $this->belongsToMany(Bookshop::class,'has','ISBN','Bookshop')->withPivot('price');
    }

    public function subscribers(){
        return $this->belongsToMany(Suscriber::class,'subscribed','ISBN','email');
    }

    public function category(){
        return $this->hasOne(Category::class,'id','category');
    }
}
