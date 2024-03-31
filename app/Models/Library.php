<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    protected $table = 'libraries';

    protected $primaryKey = ['member_id', 'inventory_number'];

    public $incrementing = false;

    protected $fillable = [
        'member_id',
        'inventory_number',
        'borrow_date',
        'return_date',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'inventory_number', 'inventory_number');
    }
}
