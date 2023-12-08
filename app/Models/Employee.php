<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'profile_image',
        'description',
        'profession_id'
    ];

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }
}
