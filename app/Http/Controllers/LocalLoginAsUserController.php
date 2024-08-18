<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LocalLoginAsUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $userId = $request->input('user_id');
        $user = User::find($userId);
        if ($user instanceof User) {
            Auth::login($user);

            return to_route('dashboard');
        }

        $request->session()->flash('error', 'User not found');

        return to_route('login');
    }
}
