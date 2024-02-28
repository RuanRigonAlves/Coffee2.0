<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(Request $request)
    {

        $user = Auth::user();


        return view('user.userShow', [
            'user' => $user,
        ]);
    }
}
