<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;
use Auth;
use Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator=Validator::make($request->all(),
        [
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'c_password'=>'required|same:password',
        ]);
        if($validator->fails())
        {
            $response=[
                'success'=>false,
                'message'=>$validator->errors(),
            ];
            return response()->json($response,400);
        }

        $input=$request->all();
        $input['password']=Hash::make($input['password']);
        $user=User::create($input);

        $success['token']=$user->createToken('MyApp')->plainTextToken;
        $success['name']=$user->name;

        $response=[
            'success'=>true,
            'user'=>$success,
            'message'=>'User Registered Successfully',
        ];

        return response()->json($response,200);
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=>($request->password)]))
        {
            $user=Auth::user();

            // $success['token']=$user->createToken('MyApp')->plainTextToken;
            $success['name']=$user->name;
            $success['user_id']=$user->id;

            $response=[
                'success'=>true,
                'user'=>$success,
                'message'=>'User Login Successfully Done',
            ];

            return response()->json($response,200);
        }
        else
        {
            $response=[
                'success'=>false,
                'message'=>'User Unauthorized',
            ];

            return response()->json($response,404);
        }
    }

    public function logout(Request $request)
    {
        // return Auth::user();
        // $request->user()->currentAccessToken()->delete();
        Auth::logout();
        $response=[
            'success'=>true,
            'message'=>'User Logged out',
        ];
        return response()->json($response,200);
    }
}
