<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
use Carbon\Carbon;
use DateTime;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;

class UserCtrl extends Controller
{

    public function login(Request $request, User $user){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ], [
            'email.required' => 'Email is required',
            'email.max' => 'Email max 255 characters',
            'email.email' => 'Email is not invalidate',
            'password.required' => 'Password is required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $email = $request->input('email');
        $password = $request->input('password');
        $remember_me = $request->input('rememberToken');

        $query = $user->checkEmail($email)->first();
        if($query == NULL) {
            return response()->json(['errors' => 'Email is not exist!'], 422);
        }

        if (Auth::attempt(['email' => $email, 'password' => $password], $remember_me)) {
            $token = auth()->user()->createToken(auth()->user()->email)->accessToken;
            return response()->json(['status' => true, 'token' => $token], 200);
        } else {
            return response()->json(['errors' => 'Email or password is not correct!'], 422);
        }

    }

    public function register(Request $request, User $user){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'address' => 'required',
            'birthday' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'Name is required',
            'phone.required' => 'Phone is required',
            'phone.unique' => 'Phone is unique',
            'email.required' => 'Email is required',
            'email.unique' => 'Email is required',
            'email.email' => 'Email is email',
            'address.required' => 'Address is required',
            'birthday.required' => 'Birthday is required',
            'password.required' => 'Password is required',
        ]);

        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 422);
        }

        DB::beginTransaction();
        try {
            $user->name = $request->input('name');
            $user->phone = $request->input('phone');
            $user->email = $request->input('email');
            $user->address = $request->input('address');
            $user->birthday = Carbon::createFromFormat('Y-m-d', $request->input('birthday'));
            $user->password = Hash::make($request->input('password'));
            $user->avatar = $request->input('avatar', '');
            $user->cover = $request->input('cover', '');
            $user->status = $request->input('status', 'AVAILABLE');
            $user->is_admin = $request->input('is_admin', 0);
            $user->save();
            DB::commit();
            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error', "Can't register this account!"], 422);
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('login');
    }
}
