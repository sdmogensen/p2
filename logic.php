<?php

if (array_key_exists('numWords', $_GET)) {
    $value = $_GET['numWords'];
    
    if(trim($value == '')) {
        $error = 'Please fill out the number of words.';
        return;
    }
    else if(!ctype_digit($value) or $value > 9 or $value < 1) {
        $error = 'Invalid number entered.';
        return;
    }
    else {
        $numWords = $value;
    }
}

if (array_key_exists('number', $_GET) and $_GET['number'] == 'yes') {
    $number = true;
}
else {
    $number = false;
}
if (array_key_exists('symbol', $_GET) and $_GET['symbol'] == 'yes') {
    $symbol = true;
}
else {
    $symbol = false;
}

if (isset($numWords)) {
    $words = [ 'correct', 'battery', 'horse', 'staple' ];

    $symbols = [ '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '+', '=', ';', ':', '<', '>', '?', '/', '\\', '|' ];

    $wordCount = count($words);
    $password = '';

    for ($i = 0; $i < $numWords; $i++) {
        $password = $password.$words[rand(0, $wordCount - 1)];
        if ($i < $numWords - 1) {
            $password .= '-';
        }
    }
    if ($number) {
        $password .= rand(0,9);
    }
    if ($symbol) {
        $password .= $symbols[rand(0, count($symbols) - 1)];
    }
}
