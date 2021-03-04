<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\ChangeProfileNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
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
        $user = $this->getProfile($email, $token);

        // Return If Not User Account & Invalid 
        if (!$user) return $this->responseInvalidRequest();

        return Inertia::render('User/ChangeProfile', [
            'token' => $token,
            'email' => $email,
            'name' => $user->profile->name,
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

        $request->validate(['name' => 'required|string|min:3']);

        $token = $request->token;
        $user = $this->getProfile($request->email, $token);

        // Return If Not User Account & Invalid 
        if (!$user) return $this->responseInvalidRequest();

        $user->profile()->update([
            'name' => $request->name
        ]);

        $user->tokens()->where('token', $token)->delete();

        return Inertia::render('User/ProfileSuccess');
    }

    function mail($id)
    {
        /** @var User */
        $user = User::find($id);

        $token = $user->createToken('Set Name Mail')->accessToken->token;
        $email = $user->email;

        Notification::route('mail', $email)
            ->notify(new ChangeProfileNotification($this->buildUrl($email, $token)));

        return [
            'status' => 'success'
        ];
    }

    function buildUrl($email, $token)
    {
        return route('profile.get') . "?email=$email&token=$token";
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

    private function responseInvalidRequest()
    {
        return redirect()->back()->withErrors(['name' => 'Token Tidak Sesuai atau email tidak ketemu']);
    }
}
