<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Facades\Passport;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use App\Mail\VerifyEmail;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 422);
    }

    try {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check if the user is verified
            if (!$user->verified) {
                auth()->logout(); // Log out the user
                return response()->json(['error' => 'Account not verified.'], 401);
            }

            $token = $user->createToken('AppName')->accessToken;

            return redirect('/');
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    } catch (\Exception $e) {
        \Log::error('Error during login: ' . $e->getMessage());
        return response()->json(['error' => 'Something went wrong'], 500);
    }
}


    public function signup(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'fname' => 'required|string',
                'lname' => 'required|string',
                'email' => 'required|email|unique:users',
                'contact' => 'required|numeric',
                'rcode' => 'string',
                'password' => 'required|string|min:6',
                'address'   =>'string',
                'plan'      =>'required|in:1,2,3'

                // Add other validation rules as needed
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }
            $verificationToken = Str::random(60); // Generate a random token

            // You can customize the logic for saving user data to the database here
            $user = User::create([
                'fname' => $request->input('fname'),
                'lname' => $request->input('lname'),
                'name'  =>$request->input('fname') . ' ' .  $request->input('lname'),
                'email' => $request->input('email'),
                'contact' => $request->input('contact'),
                'rcode' => $request->input('rcode'),
                'password' => Hash::make($request->input('password')),
                'address'   =>$request->input('address'),
                'plan'      =>$request->input('plan'),
                'verified' => false,
                'verification_token' => $verificationToken,

                // Add other user data fields as needed
            ]);

            Mail::to($request->input('email'))->send(new VerifyEmail($user));

            return redirect('/login-page')->with('success', 'Check Your email for verification');

        } catch (\Exception $e) {
            dd($e->getMessage());
            \Log::error('Error during signup: ' . $e->getMessage());
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function verifyEmail(Request $request, $token)
    {
        try {
            $user = User::where('verification_token', $token)->first();

            if (!$user) {
                return response()->json(['error' => 'Invalid verification token'], 400);
            }

            // Check if the user is already verified
            if ($user->verified) {
                return response()->json(['error' => 'Email already verified'], 400);
            }

            $user->update([
                'verified' => true,
                'verification_token' => null, // Remove the token after verification
            ]);

            return redirect('/login-page')->with('success1', 'Your email has been verified. You can now log in.');

        } catch (\Exception $e) {
            \Log::error('Error during email verification: ' . $e->getMessage());
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }


    public function sendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'name' => 'required|string',
            'email' => 'required|email|unique:users',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $request->session()->put('signup_data', [
            // 'name' => $request->input('name'),
            'email' => $request->input('email'),
            // Other relevant data
        ]);

        // Generate OTP
        $otp = rand(100000, 999999);

        // Save OTP in user session
        $request->session()->put('otp', $otp);

        try{
        Mail::to($request->email)->send(new OtpMail($otp));
        return redirect("/api/otp-check");
        // return response()->json(['redirecting to OTP check' => 'success'], 200);

        }
        catch (\Exception $e) {
            //
            Log::error('Error creating user: ' . $e->getMessage());
            dd($e->getMessage());
            return response()->json(['error' => 'Something went wrong'], 500);
        }

    }

    // public function verifyOtp(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'otp' => 'required|numeric',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['error' => $validator->errors()], 422);
    //     }

    //     $savedOtp = $request->session()->get('otp');

    //     if ($request->otp == $savedOtp) {
    //         return redirect('/api/set-password');

    //     } else {
    //         return response()->json(['error' => 'Invalid OTP'], 422);
    //     }
    // }

    // public function setPassword(Request $request)
    // {
    // $validator = Validator::make($request->all(), [
    //     'password' => 'required|string|min:6|confirmed',
    // ]);

    // if ($validator->fails()) {
    //     return response()->json(['error' => $validator->errors()], 422);
    // }

    // try {
    //     // Retrieve user details from the session
    //     $userData = $request->session()->get('signup_data');

    //     // Check if $userData is not null
    //     if (!$userData) {
    //         return response()->json(['error' => 'User data not found in session'], 500);
    //     }

    //     // Create a new user in the database
    //     $user = User::create([
    //         // 'name' => $userData['name'],
    //         'email' => $userData['email'],
    //         'password' => Hash::make($request->password),
    //     ]);

    //     // Clear user details from the session
    //     $request->session()->forget('signup_data');

    //     return redirect('/');
    //     return response()->json(['success' => 'redirect to loginpage'], 200);

    // } catch (\Exception $e) {
    //     Log::error('Error creating user: ' . $e->getMessage());
    //     // dd($e->getMessage());
    //     return response()->json(['error' => 'Something went wrong'], 500);
    // }
    // }

    public function logout(Request $request)
{
    try {
        $accessToken = $request->user()->token();

        if ($accessToken) {
            $accessToken->revoke();
            DB::table('oauth_refresh_tokens')
                ->where('access_token_id', $accessToken->id)
                ->delete();
        }

        auth()->logout();

        $request->session()->forget('key');

        // return redirect("/");
        return response()->json(['loggged out' => 'Succesfully'], 200);

    } catch (\Exception $e) {
        \Log::error('Error during logout: ' . $e->getMessage());
        return response()->json(['error' => 'Something went wrong'], 500);
    }
}

}
