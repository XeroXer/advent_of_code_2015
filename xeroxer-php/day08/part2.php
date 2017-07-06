<?php
$input = new SplFileObject(__DIR__ . '/input');
$input->setFlags(SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY);
$totalCharacters = 0;
$totalMemoryCharacters = 0;
$totalDifference = 0;
while (!$input->eof()) {
    $line = trim($input->current());
    $input->next();
    $totalDifference += ((strlen(addslashes($line)) + 2) - strlen($line));
}
echo 'The difference in number of characters in original and encoded string is ' . $totalDifference . PHP_EOL;
