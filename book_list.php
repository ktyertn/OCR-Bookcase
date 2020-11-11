<?php
require_once "inc/mysql.php";
session_start();
ob_start();
$email  = $_SESSION["email"];
$user_id= $_SESSION["user_id"];

$id            =$_POST['id']               ?   $_POST['id']                 : NULL;
$name         =$_POST['name']              ?   $_POST['name']               : NULL;
$secondname   =$_POST['secondname']        ?   $_POST['secondname']         : NULL;



$query="SELECT book_name FROM books WHERE userid=?";
$stmt=$db->prepare($query);
$result=$stmt->execute(array($id));


echo "alert('$result')";
?>
