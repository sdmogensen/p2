<?php

var_dump($_GET);

foreach($_GET as $key => $value) {
    if ($key == 'numWords') {
        # Some simple form validation
        if(trim($value == '')) {
            $error = 'Please fill out the number of words.';
            return;
        }
        else if(!ctype_digit($value)) {
            $error = 'Invalid number entered.';
            return;
        }
    }
}
