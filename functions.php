<?php

//dd function to debug
function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}



function isUrl($url) {
    return $_SERVER['REQUEST_URI'] == $url;
}