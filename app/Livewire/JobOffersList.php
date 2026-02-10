<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\JobOffer;

class JobOffersList extends Component
{
    use WithPagination;

    public $perPage = 6;

    public function loadMore()
    {
        $this->perPage += 6;
    }
    public function render()
    {
        $query = JobOffer::query()
            ->where('status', 'active')
            ->whereDate('expires_at', '>=', now());

        return view('livewire.job-offers-list', [
            'offers' => $query->latest()->paginate($this->perPage)
        ]);
    }
}
