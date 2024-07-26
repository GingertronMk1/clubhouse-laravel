<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Arrayable;
use Inertia\Inertia;

abstract class Controller
{
    protected function inertia(
        string $component,
        array|Arrayable $props = []
    ): \Inertia\Response
    {
        return Inertia::render($component, $props);
    }
}
