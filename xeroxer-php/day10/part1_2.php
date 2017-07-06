<?php
$input = '1321131112';
for ($i = 0; $i < 50; ++$i) {
    $length = strlen($input);
    $output = '';
    $sequence = [];
    for ($j = 0; $j < $length; ++$j) {
        if ($sequence
            && $sequence[0] != $input[$j]
        ) {
            $output .= count($sequence) . $sequence[0];
            $sequence = [$input[$j]];
        } else {
            $sequence[] = $input[$j];
        }
    }
    $output .= count($sequence) . $sequence[0];
    $input = $output;
    if ($i == 39) {
        echo 'The length of the result for part 1 is ' . strlen($input) . PHP_EOL;
    }
}
echo 'The length of the result for part 2 is ' . strlen($input) . PHP_EOL;
