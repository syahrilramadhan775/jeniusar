<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Exception\LoginExceptionResource;
use App\Http\Resources\API\V1\User\LogoutResource;
use App\Http\Resources\API\V1\User\LoginResource;
use App\Http\Resources\API\V1\User\UserRegistrationResource;
use App\Http\Resources\API\V1\User\UserResource;
use App\Models\Licence;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
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
    //* Object Register (OK).
    public function registration(Request $request)
    {
        $valid = new ValidAuthController();

        //? If No Error Data.
        if (!$valid->Register($request)) {
            //? Save Data.
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            Profile::create([
                'user_id' => $user->id,
                'name' => $request->name
            ]);

            return new UserRegistrationResource($user);
        } else {
            return $valid->Register($request);
        }
    }

    //* Object Login By Username Or Email (OK).
    public function login(Request $request)
    {
        //? Initialitation Object Valid.
        $valid = new ValidAuthController();

        $usermail = $request->usermail;

        if (!$valid->Login($request)) {
            //? Filter By Username Or Email.
            $user = User::where('username', $usermail)->orWhere(function ($query) use ($usermail) {
                $query->where('email', $usermail);
            })->first();

            //? Check Auth If Exist Data User.
            if (
                Auth::attempt(['username' => $usermail, 'password' => $request->password]) ||
                Auth::attempt(['email' => $usermail, 'password' => $request->password])
            ) {
                return new LoginResource($user);
            } else {
                return new LoginExceptionResource($this);
            }
        } else {
            return $valid->Login($request);
        }
    }

    //* Object Logout (OK).
    public function logout()
    {
        //? Get Data User By Auth.
        $user = Auth::user();

        //? If Exist Data User.
        if (!is_null($user)) {
            $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
            return new LogoutResource($this);
        } else {
            return ["status" => false, "message" => "Gagal Logout"];
        }
    }

    //* Object qrRegistration (OK).
    public function qrRegistration(Request $request)
    {
        $valid = new ValidAuthController();

        //? If No Error Data.
        if (!$valid->qrRegister($request)) {
            //? Get A Licence.
            $Licence = Licence::where('licence', $request->licence)->first();

            //? If Licence No Exist
            if (!$Licence) {
                return [
                    'status' => false,
                    'message' => 'Gagal Registrasi',
                    'problems' => [
                        'licence' => "Lisensi Tidak Di Temukan"
                    ]
                ];
            } else {
                return LicenseController::licence($Licence, $request);
            }
        } else {
            return $valid->qrRegister($request);
        }
    }
}
