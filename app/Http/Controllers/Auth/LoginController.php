<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;

use App\User;
use Auth;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
	 return Socialite::driver('senhaunica')->redirect();
    }

    public function handleProviderCallback(Request $request)
    {
        $user = Socialite::driver('senhaunica')->user();
        $vinculo = $this->retornaVinculo($user);
        if ($vinculo) {
            $authUser = User::where('id', $user->codpes)->first();
            if (!$authUser)
            {
                $authUser = new User;
                $authUser->name = $user->nompes;
                $authUser->email = $user->email;
                $authUser->id = $user->codpes;
                $authUser->tipoVinculo = $vinculo;
                $authUser->save();
            }
            Auth::login($authUser, true);
        }
        return redirect('/');
    }

    public function logout(Request $request) {
      Auth::logout();
      return redirect('/');
    }

    private function retornaVinculo($user)
    {
        $vinculo = false;
        $admins = explode(',', trim(env('CODPES_ADMINS')));
        $vinculos = array('ALUNOGR', 'DOCENTE');
        
        foreach ($user->vinculo as $temp) {
          if (in_array($temp['tipoVinculo'], $vinculos) && ($temp['codigoUnidade'] == env('REPLICADO_CODUND')))
          {
            $vinculo = $temp['tipoVinculo'];
          }
        }
        if (in_array($user->codpes, $admins))
        {
            $vinculo = 'ADMIN';
        }  
        return $vinculo;
    }
}
