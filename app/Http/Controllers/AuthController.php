<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response as HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        if(Auth::attempt($request->only('email','password')))
        {
            $user = Auth::user();

           $token = $user->createToken('admin')->accessToken;

           return [
               'token'=>$token
           ];
        }

        return response([
            'error'=>'Invalid Credentials'
        ], Response::HTTP_UNAUTHORIZED);
    }

    // register function

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->only('first_name','last_name','email')
        +['password'=>Hash::make($request->input('password'))]);

        return response($user,Response::HTTP_CREATED);
    }



    // public function register(RegisterRequest $request)
    // {
    //     $user = User::create($request->only('first_name','last_name','email')
    //     +['password'=>Hash::make($request->input('password'))]);

    //     return response($user,Response::HTTP_CREATED);
    // }





    // public function login(Request $request)
    // {
    //     if(Auth::attempt(($request->only('email','password')))){
    //         $user = Auth::user();

    //         $token = $user->createToken('admin')->accessToken;

    //         return[
    //             'token'=>$token
    //         ];
    //     }

    //     return response([
    //         'error' =>'Invalid Credentials'
    //     ],Response::HTTP_UNAUTHORIZED);


    // }
}
