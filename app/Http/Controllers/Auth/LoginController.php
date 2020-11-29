<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/admin/penawarans';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo(){
        if(Auth::user()->hasAnyRoles(['admin','adminuniversitas','adminfakultas'])){
                $this->redirectTo = route('admin.penawarans.index');
                return $this->redirectTo;
        }
        if(Auth::user()->hasRole(['user'])){
            $this->redirectTo = url('/pendaftar');
            return $this->redirectTo;
    }
        $this->redirectTo = '/';
        return $this->redirectTo;
    }
}
