<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display the Login Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('Auth.login');
    }

    /**
     * Display the Password Change Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPasswordChangeForm()
    {
        return view('Auth.passwordChange');
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        //Validate the form input fields
        $validator = Validator::make($request->all(), [
            'emailPhone' => 'required|string',
            'password' => 'required|string',
        ]);

        //Alert the user of the input error
        if ($validator->fails()) {
            toastr()->error($validator->messages()->all()[0], 'Oops!');
            return back();
        } else {
            // Get the credentials from the request
            $emailPhone = $request->input('emailPhone');
            $password = $request->input('password');

            // Check if the input is an email or phone number
            if (filter_var($emailPhone, FILTER_VALIDATE_EMAIL)) {
                // Attempt to find the user by email
                $user = DB::table('users')->where('email', $emailPhone)->first();
            } else {
                // Attempt to find the user by phone number
                $user = DB::table('users')->where('telephone', $emailPhone)->first();
            }

            // If the user is found
            if ($user) {
                // Check if the inputted password matches the user's phone number
                if ($password === $user->telephone) {
                    // Log the user in temporarily
                    Auth::loginUsingId($user->memberID);

                    //Success message
                    toastr()->warning('Kindly reset your password!', 'warning!');

                    // Redirect to the password change page
                    return redirect('auth/passwordChange');

                    // If the password matches the one stored in the database
                } elseif (Hash::check($password, $user->password)) {
                    // Log the user in
                    Auth::loginUsingId($user->memberID);

                    //Success message
                    toastr()->success('Logged in successfully!', 'Success!');

                    // Redirect to the intended page
                    return redirect('/');
                } else {
                    //Error message
                    toastr()->error('Invalid login credentials. Please try again!', 'Error!');

                    // Redirect to the intended page
                    return back();
                }
            }
        }
    }

    /**
     * Change password for the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function passwordChange(Request $request)
    {
        //Validate the form input fields
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|confirmed|min:6',
        ]);

        //Alert the user of the input error
        if ($validator->fails()) {
            toastr()->error($validator->messages()->all()[0], 'Oops!');
            return back();
        } else {
            // Get the currently authenticated user
            $user = Auth::user();

            // Update the password in the Members table
            DB::table('Members')
                ->where('memberID', $user->memmberID)
                ->update(['password' => Hash::make($request->input('password'))]);

            // Log the user in again to refresh their session
            Auth::login($user);

            //Success message
            toastr()->success('Password changed successfully!', 'Success!');
            
            // Redirect to the intended page or home with a success message
            return redirect('/');
        }
    }
}
