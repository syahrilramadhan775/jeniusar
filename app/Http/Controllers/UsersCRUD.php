<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use App\Models\Licence;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Illuminate\Support\Str;

class UsersCRUD extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return Inertia::render('User/Show', [
            'user' => ClientResource::collection($user)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return Inertia::render('User/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'license' => 'required|min:12|max:12',
        ]);

        $license = Licence::where('licence', $input['license']);
        $hasLicense = $license->exists();

        // check if license key exists
        if (!$hasLicense)
            return redirect()->back()->withErrors(['license' => 'Serial Code Tidak ditemukan']);

        $user = User::create([
            'username' => $input['username'],
            'email' => $input['email'],
            'password' => Hash::make(Str::random(9)),
        ]);


        $user->profile()->create([
            'name' => $input['name']
        ]);

        $license->update(['user_id' => $user->id]);

        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return Inertia::render('User/Update', [
            'user' => new ClientResource($user),
            // 'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $user = User::find($id);
        $rules = [
            'username' => 'string|required|min:9',
            'name' => 'string|required|min:9',
        ];

        // if form is filled
        if ($user->username != $request->username)
            $rules['username'] = 'unique:users';

        $request->validate($rules);

        //  Update User
        $user->update([
            'username' => $request->username,
        ]);

        $user->profile->update([
            'name' => $request->name,
        ]);

        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('client.index');
    }
}
