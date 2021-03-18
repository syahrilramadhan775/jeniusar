<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class EmailVerifyController extends Controller
{
    //* Object Invoke Email Verify (OK).
    public function __invoke(Request $request): RedirectResponse
    {
        // TODO : Find User By Id.
        $user = User::find($request->route('id'));

        // TODO : If User Already Verify Event Create || User Has Verified Email.
        if ($user->hasVerifiedEmail()) {
            return [
                'status' => true,
                'message' => "Email Sudah Verifikasi"
            ];
        }

        // TODO : If User Null || User Has Not Verified Email.
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        // TODO : Direct To Pages Success Verify Email.
        return redirect(env('FRONT_URL') . '/success/verify');
    }
}
