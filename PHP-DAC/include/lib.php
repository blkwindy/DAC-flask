<?php

define('SESSION', 'SESSION');

function session($get = true) {
    if ($get) {
        $x = $_COOKIE[SESSION];
        $x = json_decode($x, false);
        return $x;
    } else {
        setcookie(SESSION, null, -1);
    }
}

function unauth() {
    setcookie(SESSION, NULL, -1);
}

function error($message) {
    include('error.php');
    die();
}

function auth($username,$a,$b,$c,$d,$e) {
    $x = [
        'user' => $username,
        'perm' => [
            'a.php' => $a,
            'b.php' => $b,
            'c.php' => $c,
            'd.php' => $d,
            'e.php' => $e,
            'profile.php' => true
        ]
    ];
    $x = json_encode($x);
    setcookie(SESSION, $x);
}

function check($user, $key) {
    $key = basename($key);
    $sess = @session();
    if ($sess == NULL)
        error("Error: please login first\n");
    $sessUser = $sess->user;
    $sessPerm = $sess->perm->$key;
    if ($user != NULL && $sessUser != $user)
        error("Error: expect user '$user' but got '$sessUser'\n");
    if (!$sessPerm)
        error("Error: user '$sessUser' is not allowed to access '$key'\n");
}
