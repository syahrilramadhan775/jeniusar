<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\User\LogoutResource;
use App\Http\Resources\API\V1\User\LoginResource;
use App\Http\Resources\API\V1\User\UserResource;
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
        //Validation
        $valid = Validator::make($request->all(), [
            "username" => 'required|unique:users',
            "email" => 'required|unique:users',
            "password" => 'required|min:8',
            "confirm_password" => 'required|same:password',
            "name" => 'required|string|min:3|max:255'
        ]);

        //Check If Not Exist Data.
        if ($valid->fails()) {
            return response(["message" => "Unauthorized Data (Field Is Required).", "validation_errors" => $valid->errors()], 401);
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

        //Check If Not Exist Data.
        if ($validator->fails()) {
            return response(["message" => "Unauthorized Data.", "validation_errors" => $validator->errors()], 401);
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
            return response(["status" => "NOT LOGOUT"], 401);
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

        //Check If Not Exist Data.
        if ($valid->fails()) {
            return response(["message" => "Unauthorized Data (Field Is Required).", "validation_errors" => $valid->errors()], 401);
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
}
