<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class JobOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'type_contrat',
        'entreprise',
        'image',
        'status'
    ];

    public function recruiter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

