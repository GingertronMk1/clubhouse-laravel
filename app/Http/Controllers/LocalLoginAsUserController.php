<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocalLoginAsUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $userId = $request->input('user_id');
        $user = User::find($userId);
        if ($user) {
            Auth::login($user);

            return to_route('dashboard');
        }

        $request->session()->flash('error', 'User not found');

        return to_route('login');
    }
}
