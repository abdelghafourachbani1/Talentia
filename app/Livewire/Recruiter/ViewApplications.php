<?php

namespace App\Livewire\Recruiter;

use App\Models\JobOffer;
use App\Models\Application;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ViewApplications extends Component
{
    public $jobOfferId;
    public $offer;

    public function mount($jobOfferId)
    {
        $this->jobOfferId = $jobOfferId;
        $this->offer = JobOffer::with('applications.user.profile')->findOrFail($jobOfferId);

        if ($this->offer->user_id !== Auth::id()) {
            abort(403);
        }
    }

    public function updateStatus($applicationId, $status)
    {
        $application = Application::findOrFail($applicationId);
        if ($application->jobOffer->user_id === Auth::id()) {
            $application->status = $status;
            $application->save();
            session()->flash('message', 'Application status updated.');
        }
    }

    public function render()
    {
        return view('livewire.recruiter.view-applications', [
            'applications' => $this->offer->applications()->with('user.profile')->latest()->get(),
        ]);
    }
}
