<?php
namespace PhpNwSykes;
require_once __DIR__ . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

$positiveTests = [
    'X' => 10,
    'IX' => 9,
    'V' => 5,
    'IV' => 4,
    'MMX' => 2010,
    'III' => 3,
    'CD' => 400
];

$negativeTests = [
    'Bad',
    'XI Something',
    'Something MM',
    '-X',
    ''
];

?>
<h2>Valid Tests</h2>
<?php
foreach ($positiveTests as $number => $expected) {
    printf('<p>%s should be %s - Result %s</p>', $number, $expected, ((new RomanNumeral($number))->toNumeral() === $expected) ? 'PASS' : 'FAIL');
}
?>
<h2>Invalid Tests</h2>
<?php
foreach($negativeTests as $number) {
    $exception = false;
    try {
        (new RomanNumeral($number))->toNumeral();
    } catch (\Exception $e) {
        $exception = true;
    }

    printf('<p>%s should throw exception - Result %s</p>', $numerial, $exception ? 'PASS' : 'FAIL');
}
