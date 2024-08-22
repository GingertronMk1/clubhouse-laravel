<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

/**
 * @implements CastsAttributes<array<int, string>, array<int, string|array<int|string>>>
 */
class ColourArray implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param array<string, mixed> $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return json_decode($value, true);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param array<string, mixed> $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if (!is_array($value)) {
            throw new InvalidArgumentException('Expected an array');
        }

        return json_encode(array_map(fn ($item) => $this->transformColour($item), $value));
    }

    /**
     * @param array<int|string, int|string>|string $colour
     */
    private function transformColour(array|string $colour): string
    {
        if (is_array($colour)) {
            if (3 !== count($colour)) {
                throw new InvalidArgumentException('Invalid colour array');
            }

            $returnVal = '#';

            $colours = [
                'red' => intval($colour['red'] ?? $colour['r'] ?? $colour[0]),
                'green' => intval($colour['green'] ?? $colour['g'] ?? $colour[1]),
                'blue' => intval($colour['blue'] ?? $colour['b'] ?? $colour[2]),
            ];

            foreach ($colours as $colourKey => $colourValue) {
                if ($colourValue < 0 || $colourValue > 255) {
                    throw new InvalidArgumentException("Invalid colour value - {$colourKey} not in range (0, 255)");
                }

                $returnVal .= str_pad(dechex($colourValue), 2, '0', STR_PAD_LEFT);
            }
        } else {
            if (preg_match('/^\d{6}$/', $colour)) {
                $returnVal = "#{$colour}";
            } else {
                $returnVal = $colour;
            }
        }

        return strtoupper($returnVal);
    }
}
