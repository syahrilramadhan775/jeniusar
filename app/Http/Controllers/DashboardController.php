<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use App\Models\Licence;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use illuminate\Support\Str;
use Inertia\Inertia;
use NumberFormatter;

class DashboardController extends Controller
{
    //
    function index()
    {
        $widget = [
            'activeUser' => $this->activeUser(),
            'totalActivation' => $this->totalCode(),
            'codeLeft' => $this->codeLeft(),
        ];


        return Inertia::render('Dashboard', [
            'widget' => $widget,
            'user' => $this->lastRegisteredUser(),
        ]);
    }

    private function activeUser()
    {
        return $this->num(Licence::whereNotNull('user_id')->count());
    }

    private function totalCode()
    {
        return $this->num(Licence::count());
    }

    private function codeLeft()
    {
        return $this->num(Licence::whereNull('user_id')->count());
    }

    private function lastRegisteredUser()
    {

        /** @var User */
        $user = User::has('licence');

        $user->orderBy('updated_at', 'desc');
        $user->limit(5);

        return ClientResource::collection(
            $user->get()
        );
    }

    private function num($num)
    {
        return str_replace(',000', '', number_format($num, 3, ',', '.'));
    }
}
