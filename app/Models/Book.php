<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $primaryKey = 'ISBN';

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
}
