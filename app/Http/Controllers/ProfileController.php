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

    /**
     * Show the Update user's profile view.
     *
     * @return Response
     */
    public function updateProfile()
    {
        if (Auth::check())
        {
            $user = Auth::user();
            return view('profile/update')->withUser($user);

        }
    }

    /**
     * Update a new user instance after a validation.
     *
     * @param  Request  $request
     * @return response
     */
    protected function updateSave(Request $request)
    {
    	$this->validate($request, [
	        'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
	    ]);

    	$input = $request->all();
        $user = User::find(Auth::id());
        $email = User::where('email', $input['email'])->first();

        if( $email==null || ($email['email'] == $user['email'] ) ) {
        	$user->name = $input['name'];
			$user->email = $input['email'];
			$user->save();

			$request->session()->flash('alert-success', 'Profile was successful updated!');
	    } else {
	    	$request->session()->flash('alert-danger', 'The email already exist!');
	    }
		
		return view('/home');
    }

}
