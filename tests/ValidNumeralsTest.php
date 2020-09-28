<?php
namespace PhpNwSykes\Tests;

use PhpNwSykes\RomanNumeral;
use PHPUnit\Framework\TestCase;

class ValidNumeralsTest extends TestCase
{
    /**
     * @param $number The numeral to convert
     * @param $expected Expected output
     * @throws \PhpNwSykes\InvalidNumeral
     * @dataProvider numeralMapping
     */
    public function testValidInput($number, $expected)
    {
        $roman = new RomanNumeral($number);
        $this->assertSame($expected, $roman->toNumeral());
    }

    public function numeralMapping()
    {
        return [
            [10, 'X'],
            [9, 'IX'],
            [5, 'V'],
            [4, 'IV'],
            [3, 'III'],
            [2010, 'MMX'],
            [400, 'CD'],
        ];
    }

    public function testDoubleParse()
    {
        $roman = new RomanNumeral(1010);
        $this->assertSame('MX', $roman->toNumeral());
    }
}
