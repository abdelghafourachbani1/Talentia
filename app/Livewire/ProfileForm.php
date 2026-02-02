<?php

namespace App\Livewire;

use Livewire\Component;

class ProfileForm extends Component {

    public $title;
    public $formation;
    public $experiences;
    public $competences;
    public $photo; 

    public function render()
    {
        return view('livewire.profile-form');
    }
}
