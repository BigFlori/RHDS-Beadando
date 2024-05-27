<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'isbn',
        'title',
        'author',
        'publisher',
        'publication_year',
        'edition',
    ];

    // Egy könyvnek több inventory-ja lehet
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function isLoaned()
    {
        return $this->inventories()->where('borrowable', 0)->exists();
    }
}
