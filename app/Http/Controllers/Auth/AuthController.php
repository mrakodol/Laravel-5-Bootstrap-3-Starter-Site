<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests\Auth\LoginRequest as LoginRequest;
use App\Http\Requests\Auth\RegisterRequest as RegisterRequest;
use App\User as User;

class AuthController extends Controller
{
    
    /*
     * |--------------------------------------------------------------------------
     * | Registration & Login Controller
     * |--------------------------------------------------------------------------
     * |
     * | This controller handles the registration of new users, as well as the
     * | authentication of existing users. By default, this controller uses
     * | a simple trait to add these behaviors. Why don't you explore it?
     * |
     */
    
    use AuthenticatesAndRegistersUsers;

    protected $user;

    /**
     * Create a new authentication controller instance.
     *
     * @param \Illuminate\Contracts\Auth\Guard $auth            
     * @param \Illuminate\Contracts\Auth\Registrar $registrar            
     * @return void
     */
    public function __construct(Guard $auth, Registrar $registrar, User $user)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;
        $this->user = $user;
        
        $this->middleware('guest', [
            'except' => 'getLogout'
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @Get("auth/register")
     *
     * @return Response
     */
    public function showRegistrationForm()
    {
        return view('site.auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @Post("auth/register")
     *
     * @param RegisterRequest $request            
     * @return Response
     */
    public function register(RegisterRequest $request)
    {
        $this->user->email = $request->email;
        $this->user->name = $request->name;
        $this->user->password = \Hash::make($request->password);
        $this->user->save();
        
        $this->auth->login($this->user);
        
        return redirect('/');
    }

    /**
     * Show the application login form.
     *
     * @Get("auth/login")
     *
     * @return Response
     */
    public function showLoginForm()
    {
        return view('site.auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @Post("auth/login")
     *
     * @param LoginRequest $request            
     * @return Response
     */
    public function login(LoginRequest $request)
    {
        if ($this->auth->attempt($request->only('email', 'password'))) {
            return redirect('/');
        }
        
        return redirect('/auth/login')->withErrors([
            'email' => 'These credentials do not match our records.'
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @Get("auth/logout")
     *
     * @return Response
     */
    public function logout()
    {
        $this->auth->logout();
        
        return redirect('/');
    }
}
	