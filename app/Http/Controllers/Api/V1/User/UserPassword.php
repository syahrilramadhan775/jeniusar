<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserPassword extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {
        $valid = Validator::make($request->all(), [
            "current_password" => 'required',
            "new_password" => 'required',
            "confirm_password" => 'required|same:new_password',
            "id" => 'required|integer',
        ]);

        //Check If Not Exist Data.
        if ($valid->fails()) {
            return response(["message" => "Unauthorized Data.", "validation_errors" => $valid->errors()], 401);
        }

        if (Hash::check($request->current_password, Auth::user()->password) == false) {
            return response([
                "message"
            ], 401);
        } else {
            $pass = Hash::make($request->new_password);
            User::where('id', $request->id)->update([
                "password" => $pass
            ]);
            return response(["message" => "Success"], 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function forgotPassword(Request $request)
    {
        $valid = Validator::make($request->all(), [
            "current_password" => 'required',
            "new_password" => 'required',
            "confirm_password" => 'required|same:new_password',
            "id" => 'required|integer',
        ]);

        //Check If Not Exist Data.
        if ($valid->fails()) {
            return response(["message" => "Unauthorized Data.", "validation_errors" => $valid->errors()], 401);
        }

        if (Hash::check($request->current_password, Auth::user()->password) == false) {
            return response([
                "message"
            ], 401);
        } else {
            $pass = Hash::make($request->new_password);
            User::where('id', $request->id)->update([
                "password" => $pass
            ]);
            return response(["message" => "Success"], 200);
        }
    }
}
