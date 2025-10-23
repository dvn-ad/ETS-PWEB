<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * 
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     *
     */
    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'is_admin' => ['boolean'],
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['is_admin'] = $request->has('is_admin') ? true : false;

        User::create($data);

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8'],
            'is_admin' => ['boolean'],
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $data['is_admin'] = $request->has('is_admin') ? true : false;

        $user->update($data);

        return redirect()->route('users.index');
    }

    /**
     * 
     */
    public function destroy(User $user)
    {
        // ga hapus diri sendiri
        if ($user->id === auth()->id()) {
            return redirect()->route('users.index');
        }

        $user->delete();
        return redirect()->route('users.index');
    }
}
