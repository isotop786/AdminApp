<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use App\User;
// use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\UpdateUserInfo;

class UserController extends Controller
{
    public function index(){
        return User::paginate(10);
    }

    public function show($id){
        return User::findOrFail($id);
    }

    // storing in database
    public function store(UserCreateRequest $request)
    {
        $user = User::create([
            'first_name'=>$request->input('first_name'),
            'last_name'=>$request->input('last_name'),
            'email'=>$request->input('email'),
            'password'=> Hash::make(1234)
        ]);

        return response($user,201);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);

        $user->update($request->only('first_name','last_name','email'));

        return response($user,201);
    }

    public function destroy($id)
    {
        User::destroy($id);

        return response(null,Response::HTTP_NO_CONTENT);
    }


    /// User's Profile
    public function user()
    {
        $user = Auth::user();

        return $user;

    }
    // User Info Update
    public function updateInfo(UpdateUserInfo $request)
    {
        $user = Auth::user();
        $user->update($request->only('first_name','last_name','email'));
        return response($user,Response::HTTP_ACCEPTED);
    }

    public function passwordReset(PasswordResetRequest $request)
    {
       $user = Auth::user();

       $user->update([
           'password'=>Hash::make($request->input('password'))
       ]);

       return response($user,Response::HTTP_ACCEPTED);
    }
}
