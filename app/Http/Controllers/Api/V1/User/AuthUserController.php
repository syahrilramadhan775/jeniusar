<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Exception\LoginExceptionResource;
use App\Http\Resources\API\V1\User\LoginResource;
use App\Http\Resources\API\V1\User\UserRegistrationResource;
use App\Models\Licence;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthUserController extends Controller
{
    //* Object Register (OK).
    public function registration(Request $request)
    {
        // TODO : If Success Validation Or Not Exist Error.
        return ValidAuthController::Register($request) ?
            ValidAuthController::Register($request) : $this->userData($request);
    }

    //* Object qrRegistration (OK).
    public function qrRegistration(Request $request)
    {
        // TODO : If Success Validation Or Not Exist Error.
        return ValidAuthController::qrRegister($request) ?
            ValidAuthController::qrRegister($request) : $this->userDataQr($request);
    }

    //* Object Login By Username Or Email (OK).
    public function login(Request $request)
    {
        // TODO : If Success Validation Or Not Exist Error.
        return ValidAuthController::Login($request) ?
            ValidAuthController::Login($request) : $this->userDataLogin($request);
    }

    //* Object Logout (OK).
    public function logout()
    {
        // TODO : If Not Null Data User.
        return Auth::user() ? $this->userDataLogout()
            : ["status_code" => 403, "message" => "Error Logout"];
    }

    //? Method Function Store Data User Without Licence.
    private function userData(Request $request)
    {
        // TODO : Save Data User With Profile And Without Licence.
        $user = User::userDataSave($request);

        // TODO : Send Email Verification Notification.
        $user->sendEmailVerificationNotification();

        // TODO : Return Success Registration.
        return new UserRegistrationResource($user);
    }

    //? Method Function Store Data User With Licence.
    private function userDataQr(Request $request)
    {
        // TODO : Get A Licence.
        $Licence = Licence::where('licence', $request->licence)->first();

        // TODO : If Licence No Exist ?.
        return $Licence ? LicenseController::licence($Licence, $request) : [
            'status' => 404,
            'message' => 'Error Registration',
            'problems' => [
                'licence' => "Licence Not Found"
            ]
        ];
    }

    //? Method Function User Login.
    private function userDataLogin(Request $request)
    {
        $usermail = $request->usermail;

        // TODO : Filter By Username Or Email.
        $user = User::where('username', $usermail)->orWhere(function ($query) use ($usermail) {
            $query->where('email', $usermail);
        })->first();

        // TODO : Check Auth If Exist Data User.
        if (
            Auth::attempt(['username' => $usermail, 'password' => $request->password]) ||
            Auth::attempt(['email' => $usermail, 'password' => $request->password])
        ) {
            // TODO : Revoke Tokens by User Login.
            $user->tokens()->delete();

            // TODO : Check Auth If User Already Verify Email Or Not ?.
            return Auth::user()->email_verified_at ? new LoginResource($user) : [
                'status_code' => 403,
                'message' => "You have not verified your email"
            ];
        } else {
            return new LoginExceptionResource($this);
        }
    }

    //? Method Function User Logout.
    // private function userDataLogout()
    // {
    //     // TODO : Get Data User By Auth.
    //     $user = Auth::user();

    //     // TODO : Delete CurrentAccessToken.
    //     $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

    //     // TODO : Return Resource.
    //     return new LogoutResource($this);
    // }
}
