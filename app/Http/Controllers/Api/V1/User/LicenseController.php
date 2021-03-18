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
    //* Object Licence (OK).
    public static function licence($Licence, Request $request)
    {
        // TODO : If Licence Unused Or The Licence Is Not Already Owned.
        if (!$Licence->user_id) {
            // TODO : Save Data With Profile.
            $user = User::userDataSave($request);

            // TODO : Find Licence By Id.
            $key = Licence::find($Licence->id);
            $key->user_id = $user->id;
            $key->save();

            // TODO : Send Email Verification Notification To User Email.
            $user->sendEmailVerificationNotification();

            // TODO : Return Success Registration.
            return new QrRegistrationResource($user);
        } else {
            // TODO : Return Error Registration.
            return new QrRegisterException($request);
        }
    }
}
