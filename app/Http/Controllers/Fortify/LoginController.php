<?php

namespace App\Http\Controllers\Fortify;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Api\V1\User\ValidAuthController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\LoginViewResponse;

class LoginController extends Controller
{

    public function create(Request $request)
    {
        if ($request->session()->has('logged'))
            return redirect()->route('dashboard');

        return app(LoginViewResponse::class);
    }

    public function authenticate(Request $request)
    {
        $username = 'falah';
        $password = 'falah0918';

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($username ===  $request->username && $password === $request->password) {
            $request->session()->push('logged', true);

            return redirect()->route('dashboard');
        }

        return redirect()->back()->withErrors(['Username & Password Wrong']);
    }


    public function register(Request $request)
    {
        (new CreateNewUser())->create($request->all());

        return Inertia::render('SuccessRegister');
    }
}
