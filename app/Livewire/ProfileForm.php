<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileForm extends Component
{
    use WithFileUploads;

    public $title;
    public $formation;
    public $experiences;
    public $competences;
    public $photo;
    public $existingPhoto;

    public function mount()
    {
        $user = Auth::user();
        if ($user->profile) {
            $this->title = $user->profile->title;
            $this->formation = $user->profile->formation;
            $this->experiences = $user->profile->experiences;
            $this->competences = $user->profile->competences;
            $this->existingPhoto = $user->profile->photo;
        }
    }

    public function saveProfile()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'formation' => 'required|string',
            'experiences' => 'required|string',
            'competences' => 'required|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        $user = Auth::user();

        $data = [
            'user_id' => $user->id,
            'title' => $this->title,
            'formation' => $this->formation,
            'experiences' => $this->experiences,
            'competences' => $this->competences,
        ];

        if ($this->photo) {
            $data['photo'] = $this->photo->store('profiles', 'public');
        }

        Profile::updateOrCreate(
            ['user_id' => $user->id],
            $data
        );

        session()->flash('success', 'Profile saved successfully');
    }

    public function render()
    {
        return view('livewire.profile-form');
    }
}
