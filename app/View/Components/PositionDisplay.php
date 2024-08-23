<?php

namespace App\View\Components;

use App\Models\Sport;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PositionDisplay extends Component
{
    public readonly Sport $sport;
    /**
     * Create a new component instance.
     */
    public function __construct(
        Sport $sport
    )
    {
        $this->sport = $sport->load('positions');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.position-display')
            ->with('sport', $this->sport);
            ;
    }
}
