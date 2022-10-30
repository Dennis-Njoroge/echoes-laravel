<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Farmer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function register(Request $request){
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender'=>'required',
            'user_type'=>'required|integer',
            'phone' =>'required',
            'email'=>'required|unique:users',
            'password'=>'required',
        ]);
        $user = User::create([
            'name' => $request->input('first_name') . ' ' . $request->input('last_name'),
            'email' => $request->input('email'),
            'status'=>2,
            'user_type'=> $request->input('user_type'),
            'password' => Hash::make($request->input('password')),
        ]);
        if ($user) {
            $values = [
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone' => $request->input('phone'),
                'gender' => $request->input('gender'),
                'user_id' => $user->id,
            ];
            if ($request->input('user_type') ==1){
                Customer::create($values);
            }
            else{
                Farmer::create($values);
            }
            $response = [
                'user'=> $request->all(),
                'message' => "Account created successfully"
            ];
            return response($response,201);
        }
        return response([
            'message'=>'Registration Failed!'
        ],401);
    }
    public function login(Request $request){
        $request ->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        $user = User::where(['email'=>$request->input('email')])->first();
        if (!$user){
            return response([
                'message'=>'Account is not registered! Sign Up instead'
            ],404);
        }
        if (!Hash::check($request->input('password'),$user->password)){
            return response([
                'message'=>'Wrong Credentials'
            ],401);
        }

        if ($user['status'] != 1){
            return response([
                'message' => 'Account is inactive.'
            ],401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user'=> $user,
            'account_details'=> $user['user_type']== 1 ? $user->userCustomerDetails : $user->userEmployeeDetails,
            'token' => $token
        ];

        return response($response,200);

    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return [
            'message' => 'Logged out!'
        ];
    }
}
