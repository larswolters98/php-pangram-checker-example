<?php

/**
 * This function checks of the given sentence is a pangram.
 */
function check(string $sentence): string
{
    // Create an array of the alphabet
    $alphabet = range('a', 'z');

    $lowercase = strtolower($sentence);
    $trimmed = str_replace(' ', '', $lowercase);

    // Create an array of the sentence's characters
    $characters = str_split($trimmed);

    $matches = 0;

    // Loop through the sentence's characters and remove any matches from the alphabet array
    foreach ($characters as $character) {
        if (in_array($character, $alphabet)) {
            $alphabet = array_diff($alphabet, [$character]);
            $matches++;
        }
    }

    // If the alphabet array is empty, the sentence is a pangram
    $result = $matches === 26 ? 'is' : 'is not';

    return "\nThe sentence '$sentence' $result a pangram." . PHP_EOL;
}

$pangram1 = 'The quick brown fox jumps over the lazy dog.';
$pangram2 = 'The five boxing wizards jump quickly.';
$pangram3 = 'John quickly extemporized five tow bags.';

$normal = 'This is not a pangram by any stretch of the imagination.';

echo check($normal);