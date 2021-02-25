<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
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
        //Validation.
        $valid = Validator::make($request->all(), [
            "username" => 'required|unique:users',
            "email" => 'required|unique:users',
            "password" => 'required|min:8',
            "confirm_password" => 'required|same:password',
            "name" => 'required|string|min:3|max:255'
        ]);

        //Check Validation.
        if ($valid->fails()) {
            //Convert Array Data On Problems(), Not Object To Array.
            return response(['status' => false, 'problems' => collect($valid->errors()->getMessages())->map(function ($item) {
                return join(',', $item);
            })->flatten()]);
        }

        //Request Data Resources.
        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        //Save Data.
        $user = User::create($data);
        Profile::create([
            'user_id' => $user->id,
            'name' => $data['name']
        ]);

        //If Exist Data Resource
        if (!is_null($user)) {
            $ss = User::where('id', $user->id)->first();
            return new UserResource($ss);
        } else {
            return response(["status" => "Unauthorized Registration", "message" => "Data Error Register"]);
        }
    }

    public function login(Request $request)
    {
        //Cek Validation
        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required|min:8",
        ]);

        //Check Validation.
        if ($validator->fails()) {
            //Convert Array Data On Problems(), Not Object To Array.
            return response(['status' => false, 'problems' => collect($valid->errors()->getMessages())->map(function ($item) {
                return join(',', $item);
            })->flatten()]);
        }

        //Filter By Email.
        $user = User::where('email', $request->email)->first();

        //Check Auth If Exist Data User.
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return new LoginResource($user);
        } else {
            return response(["message" => "Unauthorized Data."], 401);
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
        //Validation
        $valid = Validator::make($request->all(), [
            "username" => 'required|unique:users',
            "email" => 'required|unique:users',
            "password" => 'required|min:8',
            "confirm_password" => 'required|same:password',
            "name" => 'required',
            "qrcode" => 'required'
        ]);

        //Check Validation.
        if ($valid->fails()) {
            //Convert Array Data On Problems(), Not Object To Array.
            return response(['status' => false, 'problems' => collect($valid->errors()->getMessages())->map(function ($item) {
                return join(',', $item);
            })->flatten()]);
        }

        //Request Data Resources.
        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        //Licence
        $Licence = Licence::where('licence', $request->qrcode)->first();
        if (!$Licence->user_id) {
            //Save Data.
            $user = User::create($data);
            Profile::create([
                'user_id' => $user->id,
                'name' => $data['name']
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
