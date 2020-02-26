<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        $photo = str_replace('public', '', $user->image_path);

        return view('users/edit/'.$user->id, compact('user'));
    }

    public function update(User $user)
    {

    }
}
