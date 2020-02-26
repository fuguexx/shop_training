<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AdminUser\StoreRequest;
use App\Http\Requests\AdminUser\UpdateRequest;
use App\Models\admin\AdminUser;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', AdminUser::class);

        $name = $request->get('name', '');
        $email = $request->get('email', '');
        $authority = $request->get('authority', 'all');
        $sort = $request->get('sort', 'id-asc');
        $pageUnit = (int)$request->get('pageUnit', '10');

        $query = AdminUser::query();
        switch ($sort) {
            case 'id-asc':
                $query = $query->orderBy('id', 'ASC');
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
            default:
                break;
        }

        $adminUsers = $query->likeName($name)->likeEmail($email)->likeAuthority($authority)->paginate($pageUnit);

        return view('admin.admin_users.index', compact('adminUsers', 'name', 'email', 'authority', 'sort', 'pageUnit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', AdminUser::class);

        return view('admin.admin_users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $this->authorize('create', AdminUser::class);

        $hashedPassword = Hash::make($request->get('password'));

        $adminUser = AdminUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_owner' => $request->is_owner,
            'password' => $hashedPassword,
        ]);

        return redirect('admin/admin_users/'.$adminUser->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AdminUser $adminUser)
    {
        $this->authorize('view', $adminUser);

        return view('admin.admin_users.show', compact('adminUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminUser $adminUser)
    {
        $this->authorize('update', $adminUser);

        return view('admin.admin_users.edit', compact('adminUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, AdminUser $adminUser)
    {
        $this->authorize('update', $adminUser);

        $adminUser->update($request->updateParameters());

        return redirect('admin/admin_users/'.$adminUser->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminUser $adminUser)
    {
        $this->authorize('delete', $adminUser);

        $adminUser->delete();

        return redirect('admin/admin_users');
    }
}
