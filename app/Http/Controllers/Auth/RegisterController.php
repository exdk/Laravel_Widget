<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserNotificationSettings;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        if (request()->has('signature') && !request()->hasValidSignature()) {
            return redirect()->route('register');
        }

        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
			'dzen' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\User
     */
    public function create(array $data)
    {
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'team_id'  => request()->input('team', null),
        ]);
		if($data['dzen'] == "zakaz")
		{
			$user->setRole(2);
		}
		elseif($data['dzen'] == "tran")
		{
			$user->setRole(3);
		}
        if (!request()->has('team')) {
            $team = \App\Models\Team::create([
                'owner_id' => $user->id,
                'name'     => $data['email'],
            ]);

            $user->update(['team_id' => $team->id]);
        }
		
		$notification_settings = new UserNotificationSettings();
		$notification_settings->fill([
			'user_id' => $user->id,
		]);
		$user->notifications_settings()->save($notification_settings);
        return $user;
    }
}
