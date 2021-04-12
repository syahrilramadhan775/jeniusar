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
            'username'         => 'required|unique:users',
            'email'            => 'required|email|unique:users',
            'password'         => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'name'             => 'required',
        ]);

        // TODO : Call Object returnValidation().
        return self::returnValidation($valid);
    }

    //* Object QrRegister (OK) */
    public static function qrRegister(Request $request)
    {
        // TODO : Create Validation
        $valid = Validator::make($request->all(), [
            'username'         => 'required|unique:users',
            'email'            => 'required|email|unique:users',
            'password'         => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'name'             => 'required',
            'licence'          => 'required',
        ]);

        // TODO : Call Object returnValidation().
        return self::returnValidation($valid);
    }

    //* Object Login By Username Or Email (OK).
    public static function Login(Request $request)
    {
        // TODO : Create Validation
        $valid = Validator::make($request->all(), [
            'usermail'         => 'required',
            'password'         => 'required|min:8',
        ]);

        // TODO : Call Object returnValidation().
        return self::returnValidation($valid);
    }

    //* Object changePassword (OK) */
    public static function changePassword(Request $request)
    {
        // TODO : Create Validation
        $valid = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password'     => 'required',
            'confirm_password' => 'required|same:new_password',
            'id'               => 'required|integer',
        ]);

        // TODO : Call Object returnValidation().
        return self::returnValidation($valid);
    }

    //? Object Function Validate (OK)
    private static function returnValidation($valid)
    {
        // TODO : Check Validation.
        if ($valid->fails()) {
        // TODO : Return Object.
        return [
            'status_code'      => 401,
            'problems'         => collect($valid->errors()->getMessages())->map(function ($item) {
                    return join(',', $item);
                })
            ];
        }
    }
}
