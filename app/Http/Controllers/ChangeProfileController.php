<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChangeProfileController extends Controller
{
    /**
     * Show Form Edit
     * 
     */
    function edit(Request $request)
    {
        /**@var User $user */
        // if The Parameter Not Filled
        if ($this->hasNotValid())
            return abort(404);

        $token = $request->token;
        $email = $request->email;

        return Inertia::render('User/ChangeProfile', [
            'token' => $token,
            'email' => $email,
        ]);
    }

    /**
     * Update User
     * 
     * @param Request $request
     */
    function update(Request $request)
    {

        // if The Parameter Not Filled
        if ($this->hasNotValid())
            return abort(404);

        $request->validate([
            'name' => 'required|string|min:3',
        ]);
        $token = $request->token;
        $user = $this->getProfile($request->email, $token);

        if (!$user) return redirect()->back()->withErrors(['name' => 'Token Tidak Sesuai atau email tidak ketemu']);

        $user->profile()->update([
            'name' => $request->name
        ]);

        $user->tokens()->where('token', $token)->delete();

        return Inertia::render('User/ProfileSuccess');
    }

    /**
     * Get User Profile 
     * 
     * @param String $email
     * @param String $token
     * 
     * @return User|Boolean
     */
    private function getProfile($email, $token)
    {
        $user = User::where('email', $email)->first();

        if (!$user)
            return false;

        if (!($user->tokens()->where('token', $token)->exists()))
            return false;

        return $user;
    }

    private function hasNotValid()
    {
        return !(request()->has('email') && request()->has('token'));
    }
}
