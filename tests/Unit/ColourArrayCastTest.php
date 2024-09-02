<?php

namespace Tests\Unit;

use App\Casts\ColourArray;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class ColourArrayCastTest extends TestCase
{
    private readonly Model $model;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->model = new class extends Model {
            /**
             * @return array<string, string>
             */
            protected function casts()
            {
                return [
                    'colours' => ColourArray::class,
                ];
            }
        };
    }

    public function testEmpty(): void
    {
        $this->model->colours = null;
        $this->assertEquals([], $this->model->colours);
    }

    public function testInvalidTypeOfColour(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->model->colours = 42;
    }

    public function testInvalidNumberOfColourChannels(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->model->colours = [[5, 10]];
    }

    public function testInvalidSizeOfColourChannel(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->model->colours = [[0, 0, 500]];
    }

    public function testIdentity(): void
    {
        $initialColours = ['#BAD455'];
        $this->model->colours = $initialColours;
        $this->assertEquals($initialColours, $this->model->colours);
    }

    public function testMultis(): void
    {
        $this->model->colours = [[0, 0, 0]];
        $this->assertEquals(['#000000'], $this->model->colours);
    }

    public function testNoLeadingHashSymbol(): void
    {
        $this->model->colours = ['123456'];
        $this->assertEquals(['#123456'], $this->model->colours);
    }
}