<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Friend;
use Illuminate\Support\Facades\Auth;

class FriendButton extends Component
{
    public $friendId;
    public $status;

    public function mount($friendId)
    {
        $this->friendId = $friendId;
        $friendship = Friend::where(function ($q) {
            $q->where('user_id', Auth::id())->where('friend_id', $this->friendId);
        })->orWhere(function ($q) {
            $q->where('user_id', $this->friendId)->where('friend_id', Auth::id());
        })->first();

        $this->status = $friendship ? $friendship->status : null;
    }

    public function sendRequest()
    {
        if ($this->status)
            return;

        Friend::create([
            'user_id' => Auth::id(),
            'friend_id' => $this->friendId,
            'status' => 'pending'
        ]);

        $this->status = 'pending';
        session()->flash('success', 'Friend request sent!');
    }

    public function render()
    {
        return view('livewire.friend-button');
    }
}
