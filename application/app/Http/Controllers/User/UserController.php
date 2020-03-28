<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\Front\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $user = Auth::guard('user')->user();

        return view('users.edit', compact('user'));
    }

    /**
     * @param UpdateRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateRequest $request)
    {
        $user = Auth::guard('user')->user();

        $user->update($request->updateParameters());

        return redirect('/home');
    }
}
