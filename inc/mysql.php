<?php

$host = 'localhost';
$username = 'root';
$password = 'password';
$dbname = 'iso';

try{    
    $db = new PDO("mysql:host=". $host .";dbname=". $dbname .";charset=utf8", $username, $password);
}
catch (PDOException $e){
    echo $e->getMessage();
}

?>