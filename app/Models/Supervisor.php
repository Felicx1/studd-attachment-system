<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Internship;

class Supervisor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'department'
    ];


    public function internships()
    {
        return $this->hasMany(Internship::class);
    }
}
