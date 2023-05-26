<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('BASE', 'bdvat');

    $conn = new mysqli(HOST, USER, PASS, BASE);

    if ($conn->connect_errno) {
        die("Failed to connect to MySQL: " . $conn->connect_error);
    }
?>