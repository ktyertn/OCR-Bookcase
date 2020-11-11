<?php
require_once "inc/mysql.php";
session_start();
ob_start();
$email  = $_SESSION["email"];
$user_id= $_SESSION["user_id"];

$id            =$_POST['id']               ?   $_POST['id']                 : NULL;
$isbn          =$_POST['isbn_code']        ?   $_POST['isbn_code']          : NULL;
$book_name     =$_POST['book_name']        ?   $_POST['book_name']          : NULL;
$writer_name   =$_POST['writer_name']      ?   $_POST['writer_name']        : NULL; 
$page_number   =$_POST['page_of_number']   ?   $_POST['page_of_number']     : NULL;
$publisher     =$_POST['publisher']        ?   $_POST['publisher']          : NULL;


$query="SELECT COUNT(*) FROM books WHERE userid=? AND time<0";
$stmt=$db->prepare($query);
$stmt->execute(array($user_id));
$result=$stmt->fetchColumn();
$count=$result[0];

$query="SELECT COUNT(*) FROM books WHERE userid=?";
$stmt=$db->prepare($query);
$stmt->execute(array($user_id));
$result=$stmt->fetchColumn();
$cnt=$result[0];

if($cnt<3){
    if($count==0){    
        echo "sd";
        $sql = "UPDATE books SET available=1, userid=?,time=7  WHERE id=?";
    
        $query = $db->prepare($sql);
        $add = $query->execute([
            $user_id,
            $id
        ]);
        
       
        $count=0;
    }

}
echo "<script>alert('dsafg')</script>";








?>