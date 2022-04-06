<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class LoginController extends Controller
{
    public function __invoke(Request $request)
    {

        if (!User::where('email', $request->email)->first()) {
            return response()->json([
                'data' => 'E-mail does not exist.',
                  '_benchmark' => microtime(true) -  $this->time_start,
            ], 401);
        }

        if (User::where('is_active', 0)->where('email', $request->email)->first()) {
            return response()->json([
                'data' => 'Account is inactive.',
                '_benchmark' => microtime(true) -  $this->time_start,
            ], 401);
        }

        if (!auth()->attempt($request->only('email', 'password'))) {

            return response()->json([
                'data' => 'Invalid Credentials.',
                  '_benchmark' => microtime(true) -  $this->time_start,
            ], 401);
        }

        $request->session()->regenerate();

        return response()->json([
            'success' => true,
            '_benchmark' => microtime(true) -  $this->time_start,
        ], 200);


    }
}
