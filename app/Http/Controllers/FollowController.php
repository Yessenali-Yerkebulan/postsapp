<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;

class FollowController extends Controller
{
    public function createFollow(User $user)
    {
        if($user->id == auth()->user()->id) {
            return back()->with('failure', 'You cannot follow yourself');
        }

        $existCheck = Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $user->id]])->count();
        if($existCheck) {
            return back()->with('failure', 'You are already following this user');
        }

        $newFollow = new Follow;
        $newFollow->user_id = auth()->user()->id;
        $newFollow->followeduser = $user->id;
        $newFollow->save();

        return back()->with('success', 'Followed');
    }

    public function removeFollow(User $user)
    {
        Follow::where([['user_id', '=', auth()->user()->id],['followeduser', '=', $user->id]])->delete();
        return back()->with('success', 'You have successfully unfollowed you.');
    }
}
