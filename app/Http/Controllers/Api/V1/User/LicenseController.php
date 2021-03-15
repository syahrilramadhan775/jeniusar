<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Exception\QrRegisterException;
use App\Http\Resources\API\V1\User\QrRegistrationResource;
use App\Models\Licence;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LicenseController extends Controller
{

    public static function licence($Licence, Request $request)
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
            $user->sendEmailVerificationNotification();

            return new QrRegistrationResource($user);
        } else {
            return new QrRegisterException($request);
        }
    }
}
