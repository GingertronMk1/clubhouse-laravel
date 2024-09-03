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
    public readonly string $inputClass;

    /**
     * @param iterable<mixed> $options
     */
    public function __construct(
        public readonly string $name,
        public readonly string $type = 'text',
        public readonly iterable $options = [],
        ?Closure $valueFn = null,
        ?Closure $textFn = null,
        public readonly bool $canBeNull = false,
        ?string $label = null,
        public readonly ?string $value = null,
    ) {
        $this->valueFn = $valueFn ?? fn ($input) => $input->id;
        $this->textFn = $textFn ?? fn ($input) => $input->name;
        if (!is_null($label)) {
            $this->label = $label;
        } else {
            $spacedName = preg_replace('/[^A-Za-z0-9]/', ' ', $name);
            $this->label = ucwords($spacedName ?? 'Error getting name');
        }
        $this->id = new UuidV7();

        $this->inputClass = match ($type) {
            'color' => 'form-control-color',
            'select' => 'form-select',
            'checkbox' => 'form-check-input',
            default => 'form-control',
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Closure|string|View
    {
        return view('components.input');
    }
}
