<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;

    public $perPage = 12;
    public $search = '';

    public function loadMore()
    {
        $this->perPage += 12;
    }

    public function render()
    {
        $query = User::where('id', '!=', auth()->id())
            ->with(['profile']);

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhereHas('profile', function ($pq) {
                        $pq->where('title', 'like', '%' . $this->search . '%')
                            ->orWhere('competences', 'like', '%' . $this->search . '%');
                    });
            });
        }

        $users = $query->latest()->paginate($this->perPage);

        return view('livewire.users-list', [
            'users' => $users
        ]);
    }
}
