<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ldap\User;
use App\Models\User as ModelsUser;


class LdapUserController extends Controller
{
    //
    public function index()
    {
        $user = User::$objectClasses;
        // dd($user);
        return response()->json(['result' => $user]);
        // return view('ldap-user');
    }
}
