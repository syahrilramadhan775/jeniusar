<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Exception\LoginExceptionResource;
use App\Http\Resources\API\V1\Exception\QrRegisterException;
use App\Http\Resources\API\V1\User\LogoutResource;
use App\Http\Resources\API\V1\User\LoginResource;
use App\Http\Resources\API\V1\User\QrRegistrationResource;
use App\Http\Resources\API\V1\User\UserResource;
use App\Models\Licence;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthUserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registration(Request $request)
    {
        $valid = new Valid();

        //If No Error Data.
        if (!$valid->Register($request)) {

            // Save Data.
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            Profile::create([
                'user_id' => $user->id,
                'name' => $request->name
            ]);

            return new UserResource($user);
        } else {
            return $valid->Register($request);
        }
    }

    public function login(Request $request)
    {
        $valid = new Valid();
        if (!$valid->Login($request)) {
            //Filter By Email.
            $user = User::where('email', $request->email)->first();

            //Check Auth If Exist Data User.
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return new LoginResource($user);
            } else {
                return new LoginExceptionResource($this);
            }
        } else {
            return $valid->Login($request);
        }
    }

    public function logout()
    {
        //Get Data User By Auth.
        $user = Auth::user();

        //If Exist Data User.
        if (!is_null($user)) {
            $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
            return new LogoutResource($this);
        } else {
            return response(["status" => false, "message" => "Not Logout"]);
        }
    }

    public function qrRegistration(Request $request)
    {
        $valid = new Valid();
        if (!$valid->qrRegister($request)) {
            //Licence
            $Licence = Licence::where('licence', $request->qrcode)->first();
            return $this->licence($Licence, $request);
        } else {
            return $valid->qrRegister($request);
        }
    }

    private function licence($Licence, Request $request)
    {
        if (!$Licence->user_id) {
            //Save Data.
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            Profile::create([
                'user_id' => $user->id,
                'name' => $request->name
            ]);
            $key = Licence::find($Licence->id);
            $key->user_id = $user->id;
            $key->save();

            return new QrRegistrationResource($user);
        } else {
            return new QrRegisterException($this);
        }
    }
}

class Valid
{
    public static function Register(Request $request)
    {
        $valid = Validator::make($request->all(), [
            "username" => 'required|unique:users',
            "email" => 'required|unique:users',
            "password" => 'required|min:8',
            "confirm_password" => 'required|same:password',
            "name" => 'required',
        ]);

        //Shapes 1 : Mas Kevin Require.
        // if ($valid->fails()) {
        //     //Convert Array Data On Problems(), Not Object To Array.
        //     return response([
        //         'status' => false,
        //         'problems' => collect($valid->errors()->getMessages())
        //             ->map(function ($item) {
        //                 return join(',', $item);
        //             })->flatten()
        //     ]);
        // }

        //Shapes 2 : Kak Faiz Require.
        if ($valid->fails()) {
            return collect($valid->errors()->getMessages())
                ->map(function ($item) {
                    return join(',', $item);
                });
        }
    }

    public static function qrRegister(Request $request)
    {
        $valid = Validator::make($request->all(), [
            "username" => 'required|unique:users',
            "email" => 'required|unique:users',
            "password" => 'required|min:8',
            "confirm_password" => 'required|same:password',
            "name" => 'required',
            "qrcode" => 'required'
        ]);

        //Shapes 1 : Mas Kevin Require.
        // if ($valid->fails()) {
        //     //Convert Array Data On Problems(), Not Object To Array.
        //     return response([
        //         'status' => false,
        //         'problems' => collect($valid->errors()->getMessages())
        //             ->map(function ($item) {
        //                 return join(',', $item);
        //             })->flatten()
        //     ]);
        // }

        //Shapes 2 : Kak Faiz Require.
        if ($valid->fails()) {
            return collect($valid->errors()->getMessages())
                ->map(function ($item) {
                    return join(',', $item);
                });
        }
    }

    public static function Login(Request $request)
    {
        $valid = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required|min:8",
        ]);

        //Check Validation.
        if ($valid->fails()) {
            //Convert Array Data On Problems(), Not Object To Array.
            return response([
                'status' => false,
                'problems' => collect($valid->errors()->getMessages())
                    ->map(function ($item) {
                        return join(',', $item);
                    })->flatten()
            ]);
        }
    }
}
