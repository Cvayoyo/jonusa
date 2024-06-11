<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\gs_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function loginUserrrrrrrrrrr(Request $request)
    // {   
    //     $request->validate([
    //         'username' => 'required',
    //         'password' => 'required',
    //     ]);
    //     $credentials = $request->only('username', 'password');
    //     $hashedPassword = md5($credentials['password']);
                             
    //     $user = gs_user::where(function($query) use ($credentials) {
    //         $query->where('username', $credentials['username'])
    //               ->orWhere('email', $credentials['username']);
    //     })
    //     ->where('password', $hashedPassword)
    //     ->first();
                        
    //     if (!$user) {
    //         return response()->json([
    //             'message' => 'Login failed, invalid credentials'
    //         ], 401);
    //     }else{
    //         if ($user->active == "true") {
    //             $login_time = gs_user::where('id', $user->id)->first();
    //             if ($login_time) {
    //                 $login_time->dt_login = Carbon::now('Asia/Bangkok');
    //                 $login_time->ip = $request->getClientIp();
    //                 $login_time->save();
    //                 $user = Auth::user();
    //                 return $user;
    //                 return response()->json([
    //                     'message' => 'Login successful',
    //                     'user_id' => $user->id,
    //                     'manager_id' => $user->manager_id
    //                 ]);
    //             }
    //         } else {
    //             return response()->json(['message' => 'ERROR_ACCOUNT_LOCKED']);
    //         }
    //     }
    // }

    public function loginUser(Request $request)
    {   
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('username', 'password');
        $hashedPassword = md5($credentials['password']);
                             
        $user = gs_user::where(function($query) use ($credentials) {
            $query->where('username', $credentials['username'])
                  ->orWhere('email', $credentials['username']);
        })
        ->where('password', $hashedPassword)
        ->first();
                        
        if (!$user) {
            return response()->json([
                'message' => 'Login failed, invalid credentials'
            ], 401);
        }else{
            if ($user->active == "true") {
                $login_time = gs_user::where('id', $user->id)->first();
                if ($login_time) {
                    $login_time->dt_login = Carbon::now('Asia/Bangkok');
                    $login_time->ip = $request->getClientIp();
                    $login_time->save();
                    $token = $user->createToken('Personal Access Token')->plainTextToken;
                    return response()->json([
                        'message' => 'Login successful',
                        'user_id' => $user->id,
                        'manager_id' => $user->manager_id,
                        'token' => $token
                    ]);
                }
            } else {
                return response()->json(['message' => 'ERROR_ACCOUNT_LOCKED']);
            }
        }
    }
    
}