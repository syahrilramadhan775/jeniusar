<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidAuthController extends Controller
{
    //* Object Register (OK) */
    public static function Register(Request $request)
    {
        // TODO : Create Validation
        $valid = Validator::make($request->all(), [
            "username" => 'required|unique:users',
            "email" => 'required|email|unique:users',
            "password" => 'required|min:8',
            "confirm_password" => 'required|same:password',
            "name" => 'required',
        ]);

        // TODO : Check Validation
        if ($valid->fails()) {
            // TODO : Return Object.
            return [
                'status_code' => 401,
                'problems' => collect($valid->errors())
                    ->map(function ($item) {
                        return join('', $item);
                    })
            ];
        }
    }

    //* Object QrRegister (OK) */
    public static function qrRegister(Request $request)
    {
        // TODO : Create Validation
        $valid = Validator::make($request->all(), [
            "username" => 'required|unique:users',
            "email" => 'required|email|unique:users',
            "password" => 'required|min:8',
            "confirm_password" => 'required|same:password',
            "name" => 'required',
            "licence" => 'required'
        ]);

        // TODO : Check Validation.
        if ($valid->fails()) {
            // TODO : Return Object.
            return [
                'status_code' => 401,
                'problems' => collect($valid->errors()->getMessages())
                    ->map(function ($item) {
                        return join(',', $item);
                    })
            ];
        }
    }

    //* Object Login By Username Or Email (OK).
    public static function Login(Request $request)
    {
        // TODO : Create Validation
        $valid = Validator::make($request->all(), [
            "usermail" => "required",
            "password" => "required|min:8",
        ]);

        // TODO : Check Validation.
        if ($valid->fails()) {
            // TODO : Return Object.
            return response([
                'status_code' => 401,
                'problems' => collect($valid->errors()->getMessages())
                    ->map(function ($item) {
                        return join(',', $item);
                    })
            ]);
        }
    }

    //* Object changePassword (OK) */
    public static function changePassword(Request $request)
    {
        // TODO : Create Validation
        $valid = Validator::make($request->all(), [
            "current_password" => 'required',
            "new_password" => 'required',
            "confirm_password" => 'required|same:new_password',
            "id" => 'required|integer',
        ]);

        // TODO : Check If Not Exist Data.
        if ($valid->fails()) {
            return response([
                'status_code' => 401,
                'problems' => collect($valid->errors()->getMessages())
                    ->map(function ($item) {
                        return join(',', $item);
                    })
            ]);
        }
    }
}
