<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class DailyReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'descrption_of_work_done',
        'remarks_or_comments',
        'sign_or_innitials'

    ];

    public function user()

    {
        return $this->belongsTo(User::class);
    }
}
