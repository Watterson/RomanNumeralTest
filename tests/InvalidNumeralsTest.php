<?php
namespace PhpNwSykes\Tests;

use PhpNwSykes\InvalidNumeral;
use PhpNwSykes\RomanNumeral;
use PHPUnit\Framework\TestCase;

class InvalidNumeralsTest extends TestCase
{
    /**
     * @param $numeral
     * @dataProvider badMappings
     * @throws InvalidNumeral
     */
    public function testInvalidOutput($number)
    {
        $roman = new RomanNumeral($number);
        $roman->toNumeral();
        $this->expectException(InvalidNumeral::class);

    }

    public function badMappings(): array
    {
        return [
            [0],
            [4987]
        ];
    }
}
