<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('user.userInfo.userInfoIndex',);
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        [$rules, $messages] = $this->getValidationRules();
        $validated = $request->validate($rules, $messages);

        if (!$validated) {
            return back()->withErrors($validated);
        }

        $validated['user_id'] = auth()->id();

        $user->has_address = true;
        $user->save();

        UserInfo::create($validated);

        return redirect()->route('user.show')->with('success', 'Address Registered');
    }

    public function edit()
    {
        $user = auth()->user();

        $user->load('userInfo');

        return view('user.userInfo.userInfoEdit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        [$rules, $messages] = $this->getValidationRules();

        $validated = $request->validate($rules, $messages);

        $userInfo = $user->userInfo;
        $userInfo->update($validated);

        return redirect()->route('user.show')->with('success', 'Address Updated');
    }

    private function getValidationRules()
    {
        $messages = [
            'country.required' => 'The field is required',
            'state.required' => 'The field is required',
            'city.required' => 'The field is required',
            'address.required' => 'The field is required',
            'house_num.required' => 'The field is required',
            'house_num.integer' => 'It must be a number',
        ];

        $rules = [
            'country' => 'required|min:2|max:100',
            'state' => 'required|min:2|max:100',
            'city' => 'required|min:2|max:100',
            'address' => 'required|min:2|max:100',
            'house_num' => 'required|integer|min:1|max:10000',
        ];

        return [$rules, $messages];
    }
}
