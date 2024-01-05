<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supervisor;

class Internship extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'supervisor_id',
        'company',
        'country',
        'county',
        'address',
        'website' .
        'duration'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class);
    }

}
