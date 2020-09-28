<?php
namespace PhpNwSykes;

use phpDocumentor\Reflection\Types\Integer;
use phpDocumentor\Reflection\Types\Null_;
use PHPUnit\Exception;


class RomanNumeral
{

    protected $symbols = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1,

    ];

    protected $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    /**
     * Converts a normal number such as 10 to a roman numeral, 'X'
     *
     * @throws InvalidNumeral on failure (when a numeral is invalid)
     */
    public function toNumeral():string
    {
        if(!$this->number <= 0 || $this->number < 4000)
        {
            $result = '';
            while($this->number > 0)
            {
                foreach($this->symbols as $roman => $int)
                {
                    if($this->number >= $int )
                    {
                        $this->number -= $int;
                        $result .= $roman;
                        break;
                    }
                }
            }
            // The Roman numeral should be built, return it
            return $result;
        }else{
            throw new InvalidNumeral();
        }
    }
}
