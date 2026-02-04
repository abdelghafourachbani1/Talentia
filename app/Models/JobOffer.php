<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class JobOffer extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'type_contrat',
        'entreprise',
        'image',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
