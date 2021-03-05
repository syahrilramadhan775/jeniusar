<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        if (Hash::check($request->current_password, Auth::user()->password) == false) {
            return [
                "status" => false,
                "problems" => [
                    "data" => "error change password"
                ]
            ];
        } else {
            $pass = Hash::make($request->new_password);
            User::where('id', $request->id)->update([
                "password" => $pass
            ]);
            return [
                "status" => true,
                "message" => "Success"
            ];
        }
    }
}
