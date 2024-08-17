<?php

namespace App\Http\Controllers;

use Alert;
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
        // Validate the form input fields
        $validator = Validator::make($request->all(), [
            'emailPhone' => 'required|string',
            'password' => 'required|string',
        ]);

        // Alert the user of the input error
        if ($validator->fails()) {
            return back()
                ->with('toast_error', $validator->messages()->all()[0])
                ->withInput();
        }

        // Get the credentials from the request
        $emailPhone = $request->input('emailPhone');
        $password = $request->input('password');

        // Determine if the input is an email or phone number and find the user
        $user = filter_var($emailPhone, FILTER_VALIDATE_EMAIL) ? DB::table('users')->where('email', $emailPhone)->first() : DB::table('users')->where('telephone', $emailPhone)->first();

        // If the user is found
        if ($user) {
            // Check if the inputted password matches the user's phone number (default password)
            if (Hash::check($password, $user->password)) {
                // Log the user in
                Auth::loginUsingId($user->memberID);

                // Check if the user used the default password
                if ($password === $user->telephone) {
                    // Redirect to the password change page
                    return redirect('auth/passwordChange')->with('toast_warning', 'Kindly reset your password!');
                }

                // If the password is not the default, redirect to the home page
                return redirect('/')->with('toast_success', 'Logged in succesfully!');
            } else {
                // Error message for invalid credentials
                return back()->with('toast_error', 'Invalid login credentials. Please try again!');
            }
        } else {
            // Error message for user not found
            return back()->with('toast_error', 'User not found. Please check your credentials and try again!');
        }
    }

    // public function login(Request $request)
    // {
    //     //Validate the form input fields
    //     $validator = Validator::make($request->all(), [
    //         'emailPhone' => 'required|string',
    //         'password' => 'required|string',
    //     ]);

    //     //Alert the user of the input error
    //     if ($validator->fails()) {
    //         toastr()->error($validator->messages()->all()[0], 'Oops!');
    //         return back();
    //     } else {
    //         // Get the credentials from the request
    //         $emailPhone = $request->input('emailPhone');
    //         $password = $request->input('password');

    //         // Check if the input is an email or phone number
    //         if (filter_var($emailPhone, FILTER_VALIDATE_EMAIL)) {
    //             // Attempt to find the user by email
    //             $user = DB::table('users')->where('email', $emailPhone)->first();
    //         } else {
    //             // Attempt to find the user by phone number
    //             $user = DB::table('users')->where('telephone', $emailPhone)->first();
    //         }

    //         // If the user is found
    //         if ($user) {
    //             // Check if the inputted password matches the user's phone number
    //             if ($password === $user->telephone) {
    //                 // Log the user in temporarily
    //                 Auth::loginUsingId($user->memberID);

    //                 //Success message
    //                 toastr()->warning('Kindly reset your password!', 'warning!');

    //                 // Redirect to the password change page
    //                 return redirect('auth/passwordChange');

    //                 // If the password matches the one stored in the database
    //             } elseif (Hash::check($password, $user->password)) {
    //                 // Log the user in
    //                 Auth::loginUsingId($user->memberID);

    //                 //Success message
    //                 toastr()->success('Logged in successfully!', 'Success!');

    //                 // Redirect to the intended page
    //                 return redirect('/');
    //             } else {
    //                 //Error message
    //                 toastr()->error('Invalid login credentials. Please try again!', 'Error!');

    //                 // Redirect to the intended page
    //                 return back();
    //             }
    //         }
    //     }
    // }

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
            return back()
                ->with('toast_error', $validator->messages()->all()[0])
                ->withInput();
        } else {
            // Get the currently authenticated user
            $user = Auth::user();

            // Update the password in the Members table
            DB::table('Members')
                ->where('memberID', $user->memberID)
                ->update(['password' => Hash::make($request->input('password'))]);

            // Log the user in again to refresh their session
            Auth::login($user);

            // Redirect to the intended page or home with a success message
            return redirect('/')->with('toast_success', 'Password changed successfully!');
        }
    }

    /**
     * Logout the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        // Log out the user
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        // Redirect to the home page or login page
        return redirect('auth/login');
    }
}
