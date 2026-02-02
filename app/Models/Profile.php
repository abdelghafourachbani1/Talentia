<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user() {
        $profile = Profile::first();
        $profile->user;
    }
}
