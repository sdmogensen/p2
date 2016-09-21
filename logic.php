<?php

var_dump($_GET);

foreach($_GET as $key => $value) {
    if ($key == 'numWords') {
        # Some simple form validation
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
    else if($key == 'number' and $value == 'yes') {
        $number = true;
    }
    else if($key == 'symbol' and $value == 'yes') {
        $symbol = true;
    }
}

if (isset($numWords)) {
    $words = [
        'correct',
        'battery',
        'horse',
        'staple'
        ];

    $symbols = [ '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '+', '=', ';', ':', '<', '>', '?', '/', '\\', '|' ];

    $password = '';

    for ($i = 0; $i < $numWords; $i++) {
        $password = $password.$words[rand(0, count($words) - 1)];
        if ($i < $numWords - 1) {
            $password .= '-';
        }
    }
}
