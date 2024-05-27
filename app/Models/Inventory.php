<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'borrowable',
    ];

    // Egy inventory-hoz tartozik egy könyv
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Egy inventory-hoz tartozhat több kölcsönzés
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
