<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\User\ProfileResource;
use App\Http\Resources\API\V1\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //* Object Get All Users. (OK).
    public function index()
    {
        // TODO : Get Data Collection Users.
        return UserResource::collection(User::all());
    }

    //* Object Tokens. (OK).
    public function tokens(Request $request)
    {
        // TODO : Get And Request BearerToken From Header.
        $tokens = $request->bearerToken();

        // TODO : Check CurrentToken.
        return $request->user()->currentAccessToken() ? [
            'status_code' => 200,
            'tokens' => $tokens
        ] : http_response_code(500);
    }

    //* Object Get Single Data By Id Users. (OK).
    public function show($id)
    {
        // TODO : Filter Data By Id And Return ProfileResource Data If User Data This Found.
        return User::find($id) ? new ProfileResource(User::find($id)) : ["status" => false, "message" => "Whoops! no user found"];
    }
}
