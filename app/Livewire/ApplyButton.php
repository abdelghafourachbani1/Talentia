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
        if (!Auth::check()) {
            session()->flash('success', 'You must be logged in to apply.');
            return;
        }

        $offer = JobOffer::findOrFail($this->jobOfferId);

        if ($offer->status === 'closed') {
            session()->flash('success', 'This offer is closed.');
            return;
        }

        Application::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'job_offer_id' => $this->jobOfferId,
            ],
            [
                'status' => 'applied'
            ]
        );

        session()->flash('success', 'You applied successfully!');
    }

    public function render()
    {
        return view('livewire.apply-button');
    }
}
