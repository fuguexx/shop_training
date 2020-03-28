<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->get('name', '');
        $email = $request->get('email', '');
        $sort = $request->get('sort', 'id-asc');
        $pageUnit = (int)$request->get('pageUnit', '10');

        $query = User::query();
        switch ($sort) {
            case 'id-asc':
                $query = $query->orderby('id', 'ASC');
                break;
            case 'id-desc':
                $query = $query->orderBy('id', 'DESC');
                break;
            case 'name-asc':
                $query = $query->orderBy('name', 'ASC');
                break;
            case 'name-desc':
                $query = $query->orderBy('name', 'DESC');
                break;
            case 'email-asc':
                $query = $query->orderBy('email', 'ASC');
                break;
            case 'email-desc':
                $query = $query->orderBy('email', 'DESC');
                break;
        }

        $users = $query->likeName($name)->likeEmail($email)->paginate($pageUnit);

        return view('admin.users.index', compact('users', 'name', 'email', 'sort', 'pageUnit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreRequest $request)
    {
        $user = User::create($request->storeParameters());

        return redirect('admin/users/'.$user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateRequest $request, User $user)
    {
        $user->update($request->updateParameters());

        return redirect('admin/users/'.$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('admin/users');
    }
}
