<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;

    public $perPage = 12;

    public function loadMore()
    {
        $this->perPage += 12;
    }
    public function render()
    {
        $query = User::where('id', '!=', auth()->id())
            ->with(['profile']);

        $users = $query->latest()->paginate($this->perPage);

        return view('livewire.users-list', [
            'users' => $users
        ]);
    }
}
