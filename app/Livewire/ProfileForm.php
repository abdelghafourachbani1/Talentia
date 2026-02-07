<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Profile;
use Illuminate\Container\Attributes\Auth;


class ProfileForm extends Component
{
    use WithFileUploads;


    public $title;
    public $formation;
    public $experiences;
    public $competences;
    public $photo;

    public function saveProfile() {
        $this->validate([
            'title' => 'required|string|max:255',
            'formation' => 'required|string',
            'experiences' => 'required|string',
            'competences' => 'required|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        $user = Auth::user();

        $photoPath = null;
        if ($this->photo) {
            $photoPath = $this->photo->store('profiles', 'public');
        }

        Profile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'title' => $this->title,
                'formation' => $this->formation,
                'experiences' => $this->experiences,
                'competences' => $this->competences,
                'photo' => $photoPath,
            ]
        );

        session()->flash('success', 'Profile saved successfully');
    }

    public function render() {
        return view('livewire.profile-form');
    }
}
