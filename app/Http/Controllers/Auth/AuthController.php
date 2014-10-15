<?php namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Contracts\Auth\Authenticator;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\ChangePasswordRequest;

/**
 * @Middleware("csrf")
 * @Middleware("guest", except={"logout"})
 */
class AuthController {

	/**
	 * The authenticator implementation.
	 *
	 * @var Authenticator
	 */
	protected $auth;
	protected $user; 
	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  Authenticator  $auth
	 * @return void
	 */
	public function __construct(Authenticator $auth, \App\User $user)
	{
		$this->auth = $auth;
		$this->user = $user;
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
	 * @param  RegisterRequest  $request
	 * @return Response
	 */
	public function register(RegisterRequest $request)
	{
		$this->user->email = $request->email;
        $this->user->name = $request->name;
        $this->user->password = \Hash::make($request->password);
        $this->user->save();

        $this->auth->login($this->user);

        return redirect('/admin/dashboard');
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
	 * @param  LoginRequest  $request
	 * @return Response
	 */
	public function login(LoginRequest $request)
	{
		if ($this->auth->attempt($request->only('email', 'password')))
		{
			return redirect('/admin/dashboard');
		}
        return redirect('/user/login');
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

    /**
     * Show the application settings user form.
     *
     * @Get("auth/settings")
     *
     * @return Response
     */
    public function showChangePasswordForm()
    {
        if($this->auth->user()!=null){
            return view('site.auth.changepassword');
        }
        return redirect('/');
    }

    /**
     * Handle a settings request for the application.
     *
     * @Post("auth/settings")
     *
     * @param  SettingsRequest  $request
     * @return Response
     */
    public function changepassword(ChangePasswordRequest $request)
    {
        if($request->password == $request->password_confirmation){
            $user = User::find($this->auth->user()->getAuthIdentifier());
            $user->password = \Hash::make($request->password);
            $user->save();
            $this->auth->logout();
            return redirect('/');
        }
        return redirect('/user/changepassword');
    }

}
