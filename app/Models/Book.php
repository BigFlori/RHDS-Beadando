<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'author',
        'publisher',
        'year',
        'edition',
    ];

    public function inventory()
    {
        return $this->hasMany(Inventory::class, 'isbn', 'isbn');
    }
}
