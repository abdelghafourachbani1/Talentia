<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Friend;
use Illuminate\Support\Facades\Auth;

class FriendRequests extends Component
{
    public function accept($id)
    {
        $request = Friend::findOrFail($id);
        if ($request->friend_id === Auth::id()) {
            $request->update(['status' => 'accepted']);
            session()->flash('success', 'Friend request accepted!');
        }
    }

    public function refuse($id)
    {
        $request = Friend::findOrFail($id);
        if ($request->friend_id === Auth::id()) {
            $request->update(['status' => 'refused']);
            session()->flash('success', 'Friend request refused!');
        }
    }

    public function render()
    {
        // Get pending requests for logged-in user
        $requests = Friend::where('friend_id', Auth::id())
                          ->where('status', 'pending')
                          ->with('user')
                          ->get();

        return view('livewire.friend-requests', compact('requests'));
    }
}
