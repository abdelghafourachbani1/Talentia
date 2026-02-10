<?php

namespace App\Livewire\Recruiter;

use App\Models\JobOffer;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\Auth;

class CreateOffer extends Component
{
    use WithFileUploads;

    #[Url]
    public $id;

    public $title;
    public $description;
    public $type_contrat;
    public $entreprise;
    public $image;
    public $expires_at;
    public $existingImage;

    public function mount()
    {
        if ($this->id) {
            $offer = JobOffer::where('id', $this->id)
                ->where('user_id', Auth::id())
                ->firstOrFail();

            $this->title = $offer->title;
            $this->description = $offer->description;
            $this->type_contrat = $offer->type_contrat;
            $this->entreprise = $offer->entreprise;
            $this->expires_at = $offer->expires_at ? $offer->expires_at->format('Y-m-d') : '';
            $this->existingImage = $offer->image;
        }
    }

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type_contrat' => 'required|string',
            'entreprise' => 'required|string',
            'image' => $this->id ? 'nullable|image|max:2048' : 'required|image|max:2048',
            'expires_at' => 'required|date|after_or_equal:today',
        ];
    }

    public function store()
    {
        $this->validate();

        $data = [
            'user_id' => Auth::id(),
            'title' => $this->title,
            'description' => $this->description,
            'type_contrat' => $this->type_contrat,
            'entreprise' => $this->entreprise,
            'status' => 'active',
            'expires_at' => $this->expires_at,
        ];

        if ($this->image) {
            $data['image'] = $this->image->store('job-offers', 'public');
        }

        if ($this->id) {
            JobOffer::where('id', $this->id)
                ->where('user_id', Auth::id())
                ->update($data);
            session()->flash('message', 'Offer updated successfully.');
        } else {
            JobOffer::create($data);
            session()->flash('message', 'Offer published successfully.');
        }

        return redirect()->route('recruiter.offers');
    }

    public function render()
    {
        return view('livewire.recruiter.create-offer')
            ->layout('layouts.app');
    }
}
