<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserInfoRequest;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('user.userInfo.userInfoIndex',);
    }

    public function store(UserInfoRequest $request)
    {
        $user = auth()->user();

        $validatedData = $request->validated();

        if (!$validatedData) {
            return back()->withErrors($validatedData);
        }

        $validatedData['user_id'] = auth()->id();

        User::saveUserAddress($user);

        UserInfo::create($validatedData);

        return redirect()->route('user.show')->with('success', 'Address Registered');
    }

    public function edit()
    {
        $user = auth()->user();

        $user->load('userInfo');

        return view('user.userInfo.userInfoEdit', ['user' => $user]);
    }

    public function update(UserInfoRequest $request)
    {
        $user = auth()->user();

        $validatedData = $request->validated();

        User::updateUserAddress($user, $validatedData);

        return redirect()->route('user.show')->with('success', 'Address Updated');
    }

    public function isAdmin(Request $request)
    {
        $user = auth()->user();

        $isAdmin = $request->input('is_admin');

        if (!$isAdmin) {
            User::updateUserPermission($user, $isAdmin);
            return back()->with('success', 'You are now a User');
        }

        User::updateUserPermission($user, $isAdmin);
        return back()->with('success', 'You are now a Admin');
    }

    public function addProductPage(Request $request)
    {
        $user = auth()->user();


        if (!$user->is_admin) {
            return back()->with('error', 'you are not a admin');
        }

        return view('user.user-product-create', ['user' => $request]);
    }
}
