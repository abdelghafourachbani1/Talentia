<?php

namespace App\Livewire\Recruiter;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\JobOffer;
use Illuminate\Support\Facades\Auth;

class ManageOffers extends Component
{
    use WithFileUploads;

    public $title, $description, $type_contrat, $entreprise, $image;
    public $editingId = null;

    public function save()
    {
        if (!Auth::user()->hasRole('recruteur')) {
            abort(403);
        }

        $data = $this->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'type_contrat' => 'required',
            'entreprise' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($this->image) {
            $data['image'] = $this->image->store('offers', 'public');
        }

        $data['user_id'] = Auth::id();

        JobOffer::updateOrCreate(
            ['id' => $this->editingId],
            $data
        );

        $this->reset();
    }

    public function edit($id)
    {
        $offer = JobOffer::findOrFail($id);

        $this->editingId = $offer->id;
        $this->title = $offer->title;
        $this->description = $offer->description;
        $this->type_contrat = $offer->type_contrat;
        $this->entreprise = $offer->entreprise;
    }

    public function close($id)
    {
        JobOffer::where('id', $id)
            ->where('user_id', Auth::id())
            ->update(['status' => 'closed']);
    }

    public function render()
    {
        return view('livewire.recruiter.manage-offers', [
            'offers' => JobOffer::where('user_id', Auth::id())->get()
        ]);
    }
}
