<?php

namespace Function;

function my_sin($x) {
    return sin($x);
}

function my_cos($x) {
    return cos($x);
}

function my_tan($x) {
    return tan($x);
}

function my_tg($x) {
    return my_sin($x) / my_cos($x);
}

function my_pow($x, $y) {
    return pow($x, $y);
}

function my_factorial($n) {
    if ($n === 0 || $n === 1) {
        return 1;
    } else {
        return $n * my_factorial($n - 1);
    }
}

?>