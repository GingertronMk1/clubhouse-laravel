<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Team;
use Illuminate\Http\Request;
use Inertia\Response;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Response
    {
        return $this->inertia('Dashboard', [
            'peopleCount' => Person::count(),
            'teamCount' => Team::count(),
        ]);
    }
}
