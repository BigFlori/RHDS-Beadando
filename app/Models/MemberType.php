<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberType extends Model
{
    use HasFactory;

    protected $table = 'member_types';

    protected $fillable = [
        'type_name',
        'borrow_limit',
        'borrow_day_limit',
    ];

    public function members()
    {
        return $this->hasMany(Member::class, 'member_type_id', 'id');
    }
}
