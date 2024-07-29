<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return $this->inertia('Dashboard', [
            'peopleCount' => Person::all()->count()
        ]);
    }
}
