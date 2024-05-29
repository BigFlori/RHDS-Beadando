<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_type_id',
        'name',
        'email',
        'phone_number',
        'zip_code',
        'city',
        'address',
    ];

    public function memberType()
    {
        return $this->belongsTo(MemberType::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
