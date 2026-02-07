<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;


class ApplyToJob extends Component
{
    public $jobOfferId;

    public function apply()
    {
        Application::firstOrCreate([
            'user_id' => auth()->user()->id,
            'job_offer_id' => $this->jobOfferId,
        ]);

        session()->flash('success', 'Application sent');
    }

    public function render()
    {
        return view('livewire.apply-to-job');
    }
}

