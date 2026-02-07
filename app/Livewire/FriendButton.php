<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Friend;
use Illuminate\Support\Facades\Auth;

class FriendButton extends Component
{
    public $friendId;

    public function sendRequest()
    {
        Friend::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'friend_id' => $this->friendId
            ],
            [
                'status' => 'pending'
            ]
        );

        session()->flash('success', 'Friend request sent!');
    }

    public function render()
    {
        return view('livewire.friend-button');
    }
}
