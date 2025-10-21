<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'category',
        'author_id',
        'average_rating',
        'voter'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
