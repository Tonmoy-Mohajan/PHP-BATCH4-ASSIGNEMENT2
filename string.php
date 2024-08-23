<?php

function count_vowels($str) {
    $vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
    $count = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        if (in_array($str[$i], $vowels)) {
            $count++;
        }
    }
    return $count;
}

function reverse_string($str) {
    return strrev($str);
}

function process_strings($strings) {
    foreach ($strings as $str) {
        $vowel_count = count_vowels($str);
        $reversed_str = reverse_string($str);
        echo "Original String: $str, Vowel Count: $vowel_count, Reversed String: $reversed_str\n\n";
    }
}

$strings = ["Hello", "World", "PHP", "Programming"];
process_strings($strings);

?>