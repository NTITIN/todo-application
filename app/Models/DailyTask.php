<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class DailyTask extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'user_name',
        'task_description',
        'user_email_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

}
