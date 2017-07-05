<?php
if (!is_file(__DIR__ . '/input')) {
    die('Input file not found');
}
$input = new SplFileObject(__DIR__ . '/input');
$input->setFlags(SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY);
$lights = array_fill(0, 1000, array_fill(0, 1000, 0));
while (!$input->eof()) {
    $line = trim($input->current());
    $input->next();
    list($from, $to, ) = explode(' through ', $line);
    $lastSpace = strrpos($from, ' ');
    $command = substr($from, 0, $lastSpace);
    $from = array_map('intval', explode(',', substr($from, ($lastSpace + 1))));
    $to = array_map('intval', explode(',', $to));
    for ($i = $from[0]; $i <= $to[0]; ++$i) {
        for ($j = $from[1]; $j <= $to[1]; ++$j) {
            switch ($command) {
                case 'turn on':
                    ++$lights[$i][$j];
                    break;
                case 'turn off':
                    if ($lights[$i][$j] > 0) {
                        --$lights[$i][$j];
                    }
                    break;
                case 'toggle':
                    $lights[$i][$j] += 2;
                    break;
            }
        }
    }
}
$onCount = 0;
foreach ($lights as $lightRow) {
    $valCounts = array_count_values($lightRow);
    foreach ($valCounts as $total => $brightness) {
        $onCount += ($total * $brightness);
    }
}
echo 'part two: ' . $onCount . PHP_EOL;
