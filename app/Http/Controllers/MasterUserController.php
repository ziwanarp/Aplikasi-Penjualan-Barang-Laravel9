<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class MasterUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return ['users' => User::all()];
        return view('dashboard.masteruser.index', [
            'title' => 'Master User',
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.masteruser.create', [
            'title' => 'Create User',
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'password' => 'required|min:5|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registrasi berhasil, silahkan login!!');

        return redirect('/masteruser')->with('success', 'Akun berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $masteruser)
    {
        return view('dashboard.masteruser.show', [
            'title' => 'Detail User',
            'user' => $masteruser
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $masteruser)
    {
        // dd($user);
        return view('dashboard.masteruser.edit', [
            'title' => 'Edit User',
            'user' => $masteruser,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $masteruser)
    {
        $rules = [
            'name' => 'required|max:255',
            'role' => 'required',
            'password' => 'required|min:5|max:255',
        ];

        if ($request->email != $masteruser->email) {
            $rules['email'] = 'required|email|unique:users';
        }

        $validatedData = $request->validate($rules);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::where('id', $masteruser->id)->update($validatedData);

        return redirect('/masteruser')->with('success', 'Akun berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $masteruser)
    {
        $result = User::destroy($masteruser->id);

        if ($result !== 1) {
            return redirect('/masteruser')->with('error', 'User gagal dihapus !!');
        }
        return redirect('/masteruser')->with('success', 'User berhasil dihapus !!');
    }
}
