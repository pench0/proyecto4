<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UsersController extends Controller
{
    public function getIndex()
    {
        $result = \DB::table('users')
            ->select('users.*')
            ->get();

        foreach ($result as $row) {
            $row->fullName = $row->firstName . ' ' .
                             $row->lastName;

        }

        dd($result);
        return $result;
    }

    public function getOrm()
    {
        $user = User::find(5);
        dd($user->profile);
    }
}
