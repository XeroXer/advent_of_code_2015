<?php
$input = new SplFileObject(__DIR__ . '/input');
$input->setFlags(SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY);
$totalDifference = 0;
while (!$input->eof()) {
    $line = trim($input->current());
    $input->next();
    $totalDifference += (strlen($line) - (strlen(stripcslashes($line)) - 2));
}
echo 'The difference in number of characters in code and memory is ' . $totalDifference . PHP_EOL;
