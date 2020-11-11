<?php
require_once 'mysql.php';
if (isset($_POST['submit'])) {
    $name       = $_POST['firstName'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $lastName   = $_POST['lastName'];
    $sql = "INSERT INTO users (name,second_name,e_mail,password)
     VALUES ('$name','$lastName','$email','$password')";
     $query = $db->prepare($sql);
     $add = $query->execute([
         $name,
         $lastName,
         $email,
         $password,
     ]);

     if($add){
         $result['success'] = 'Başarılı!';
     }else{
         $result['error'] = 'Formunuz gönderilirken bir hata oluştu lütfen tekrar deneyiniz!';
     }
    }
echo json_encode($result);




?>

