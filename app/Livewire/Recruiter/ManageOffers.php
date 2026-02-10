<?php

namespace App\Livewire\Recruiter;

use App\Models\JobOffer;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ManageOffers extends Component
{
    use WithFileUploads, WithPagination;

    public $confirmingDeletion = false;
    public $offerToDeleteId;

    public function render()
    {
        return view('livewire.recruiter.manage-offers', [
            'offers' => JobOffer::where('user_id', Auth::id())->latest()->paginate(10),
        ]);
    }

    public function edit($id)
    {
        // Redirect to a dedicated edit page or show a toast that this is coming soon.
        // For now, we prioritize creation as requested.
        return redirect()->route('recruiter.offers.create', ['id' => $id]);
    }

    public function confirmDelete($id)
    {
        $this->confirmingDeletion = true;
        $this->offerToDeleteId = $id;
    }

    public function delete()
    {
        $offer = JobOffer::find($this->offerToDeleteId);

        if ($offer && $offer->user_id === Auth::id()) {
            $offer->delete();
            session()->flash('message', 'Offer deleted successfully.');
        }

        $this->confirmingDeletion = false;
        $this->offerToDeleteId = null;
    }

    public function toggleStatus($id)
    {
        $offer = JobOffer::find($id);
        if ($offer && $offer->user_id === Auth::id()) {
            $offer->status = $offer->status === 'active' ? 'closed' : 'active';
            $offer->save();
            session()->flash('message', 'Offer status updated successfully.');
        }
    }
}
