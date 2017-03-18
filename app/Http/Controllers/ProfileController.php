<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProfileController extends Controller
{

	use RegistersUsers;

    // *
    //  * Where to redirect users after registration.
    //  *
    //  * @var string
     
    // protected $redirectTo = '/';

    /**
     * Update the user's profile.
     *
     * @return Response
     */
    public function updateProfile()
    {
        if (Auth::check())
        {
            $user = Auth::user();
            return view('profile/update')->withUser($user);
            //dd(Auth::id());

        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function updateSave(Request $request)
    {

    	$input = $request->all();
    	//dd($input);
        // return User::Update([
        //     'name' => $input['name'],
        //     'email' => $input['email'],
        //     // 'password' => bcrypt($data['password']),
        // ]);

        $user = User::find(Auth::id());
		$user->name = $input['name'];
		$user->email = $input['email'];
		$user->save();

		//Auth::setUser($user);
		$request->session()->flash('alert-success', 'Profile was successful updated!');
		return view('/home');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            // 'password' => 'required|min:6|confirmed',
        ]);
    }
}
