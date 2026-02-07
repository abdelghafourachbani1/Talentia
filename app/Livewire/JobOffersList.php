<?php

    namespace App\Livewire;

    use Livewire\Component;
    use App\Models\JobOffer;

    class JobOffersList extends Component
    {
        public $perPage = 15;

        public function loadMore() {
            $this->perPage += 5;
        }

        public function render() {
            return view('livewire.job-offers-list', [
                'offers' => JobOffer::latest()->take($this->perPage)->get()
            ]);
        }
    }
