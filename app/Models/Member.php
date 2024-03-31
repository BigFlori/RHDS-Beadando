<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'members';

    protected $fillable = [
        'name',
        'street',
        'house_number',
        'email',
        'phone_number',
        'member_type_id',
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'zip_code', 'zip_code');
    }

    public function memberType()
    {
        return $this->belongsTo(MemberType::class, 'member_type_id', 'id');
    }

    public function borrowings()
    {
        return $this->hasMany(Library::class, 'member_id', 'id');
    }
}
