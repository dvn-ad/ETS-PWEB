<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'release_date',
        'stock',
        'publisher_id',
        'author_id',
    ];

    protected $casts = [
        'release_date' => 'date',
        'price' => 'decimal:2',
        'stock' => 'integer',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
}
