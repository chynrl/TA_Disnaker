<?php

$hostname = 'localhost';
$user = 'root';
$password = '';
$db_name = 'db_nyarter_angkot';

$conn = mysqli_connect($hostname, $user, $password, $db_name);

function myquery($query){
    global $conn;
    $res = mysqli_query($conn, $query);
    $returns = [];

    while ($data = mysqli_fetch_assoc($res)){
        $returns[] = $data;
    }

    return $returns;
}
?>