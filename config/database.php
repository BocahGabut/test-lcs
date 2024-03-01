<?php

$DB_HOST = 'localhost';
$DB_DATABASE = 'test_lcs';
$DB_USERNAME = 'bocahgabut';
$DB_PASSWORD = '';

$db = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);

if ($db->connect_error) {
    echo "koneksi database error";
    die("koneksi database error");
}