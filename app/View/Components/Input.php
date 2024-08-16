<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Symfony\Component\Uid\UuidV7;

class Input extends Component
{
    public readonly Closure $valueFn;
    public readonly Closure $textFn;
    public readonly string $label;
    public readonly UuidV7 $id;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly string $name,
        public readonly string $type = 'text',
        public readonly array $options = [],
        ?Closure $valueFn = null,
        ?Closure $textFn = null,
        public readonly bool $canBeNull = false,
        ?string $label = null,
    )
    {
        $this->valueFn = $valueFn ?? fn ($input) => $input->id;
        $this->textFn = $textFn ?? fn ($input) => $input->name;
        $this->label = $label ?? ucwords(preg_replace('/[^A-Za-z0-9]/', ' ', $name));
        $this->id = new UuidV7();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input')

            ;
    }
}
