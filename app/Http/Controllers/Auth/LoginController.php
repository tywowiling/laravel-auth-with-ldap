<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        $uname = $request->username;
        $user = User::where('username', '=', $uname)
                ->first();

        if($user){
            if($user['guid'] != NULL){
                return [
                    'sAMAccountName' => $request->username,
                    'password' => $request->password,
                ];
            } else {
                return [
                    'sAMAccountName' => $request->username,
                    'password' => $request->password,
                    'fallback' => [
                        'username' => $request->username,
                        'password' => $request->password,
                    ],
                ];
            }   
        }

        return [
            'u' => $request->username,
            'password' => $request->password,
        ];
        
        // if($user){
        //     return [
        //         'uid' => $request->username,
        //         'password' => $request->password,
        //         'fallback' => [
        //             'username' => $request->username,
        //             'password' => $request->password,
        //         ],
        //     ];
        // }

        // return [
        //     'sAMAccountName' => $request->username,
        //     'password' => $request->password,
        // ];

        // return [
        //     'uid' => $request->username,
        //     'password' => $request->password,
        // ];
    }

    public function username()
    {
        return 'username';
    }
// LDAP_LOGGING=true
// LDAP_CONNECTION=default
// LDAP_HOST=ldap.forumsys.com
// LDAP_USERNAME=null
// LDAP_PASSWORD=null
// LDAP_PORT=389
// LDAP_BASE_DN="dc=example,dc=com"
// LDAP_TIMEOUT=5
// LDAP_SSL=false
// LDAP_TLS=false
}
