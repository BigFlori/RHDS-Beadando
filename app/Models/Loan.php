<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'inventory_id',
        'borrow_date',
        'return_date',
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
