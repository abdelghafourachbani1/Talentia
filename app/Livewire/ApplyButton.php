<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Application;
use App\Models\JobOffer;
use Illuminate\Support\Facades\Auth;

class ApplyButton extends Component
{
    public $jobOfferId;

public function apply()
{
    dd('apply clicked');
}


    public function render()
    {
        return view('livewire.apply-button');
    }
}
