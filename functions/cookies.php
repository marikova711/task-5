<?php
function set_cookies() {
    $p1 = $_COOKIE['COUNTER_CITIES'] ?? 0;
    $p2 = $_COOKIE['COUNTER_USERS'] ?? 0;
    $p3 = $_COOKIE['COUNTER_SEARCH'] ?? 0;

    setcookie("COUNTER_CITIES", $p1);
    setcookie("COUNTER_USERS", $p2);
    setcookie("COUNTER_SEARCH", $p3);
}
function get_cookie() {
    if ($_SERVER['REQUEST_URI'] == "/" || $_SERVER['REQUEST_URI'] == "/?page=1") {
        return $_COOKIE['COUNTER_CITIES'];
    } else if ($_SERVER['REQUEST_URI'] == "/?page=2") {
        return $_COOKIE['COUNTER_USERS'];
    } else if ($_SERVER['REQUEST_URI'] == "/?page=3") {
        return $_COOKIE['COUNTER_SEARCH'];
    }
}
function counter() {
    if ($_SERVER['REQUEST_URI'] == "/" || $_SERVER['REQUEST_URI'] == "/?page=1") {
        $_COOKIE['COUNTER_CITIES'] += 1;
    } else if ($_SERVER['REQUEST_URI'] == "/?page=2") {
        $_COOKIE['COUNTER_USERS'] += 1;
    } else if ($_SERVER['REQUEST_URI'] == "/?page=3") {
        $_COOKIE['COUNTER_SEARCH'] += 1;
    }
    set_cookies();
}

