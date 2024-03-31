<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = [
        'zip_code',
        'city_name',
    ];

    public function members()
    {
        return $this->hasMany(Member::class, 'zip_code', 'zip_code');
    }
}
