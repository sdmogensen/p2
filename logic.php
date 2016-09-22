<?php

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

if (array_key_exists('numWords', $_GET)) {
    $value = $_GET['numWords'];

    # Some form validation
    if(trim($value == '')) {
        $error = 'Please fill out the number of words.';
        return;
    }
    else if(!ctype_digit($value) or $value > 9 or $value < 1) {
        $error = 'Invalid number entered.';
        return;
    }
    else {
        # Only set the $numWords variable if the input is ok
        $numWords = $value;
        $file = fopen("words", "r");
        if (!$file) {
            $error = 'Unable to load word list on server, sorry :(';
            return;
        }
        $words = [];
        $i = 0;
        while (($data = fgetcsv($file)) !== false) {
            $words[$i] = $data[0];
            $i++;
        }
        fclose($file);

        $wordCount = count($words);
        $password = '';

        for ($i = 0; $i < $numWords; $i++) {
            $password .= $words[rand(0, $wordCount - 1)];
            if ($i < $numWords - 1) {
                $password .= '-';
            }
        }
        if ($number) {
            $password .= rand(0,9);
        }
        if ($symbol) {
            $symbols = [ '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_',
            '+', '=', ';', ':', '<', '>', '?', '/', '\\', '|' ];
            $password .= $symbols[rand(0, count($symbols) - 1)];
        }
    }
}
