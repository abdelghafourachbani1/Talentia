<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
        'user_id',
        'title',
        'formation',
        'experiences',
        'competences',
        'photo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
