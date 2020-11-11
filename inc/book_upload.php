<?php
require_once 'mysql.php';
if (isset($_POST['submit'])) {
  
  $isbn          =$_POST['ISBN']          ?   $_POST['ISBN'] : NULL;
  $book_name     =$_POST['book_name']     ?   $_POST['book_name'] : NULL;
  $writer_name   =$_POST['writer_name']   ?   $_POST['writer_name'] : NULL; 
  $page_number   =$_POST['page_number']   ?   $_POST['page_number'] : NULL;
  $publisher     =$_POST['publisher']     ?   $_POST['publisher'] : NULL;
  $publish_date  =$_POST['publish_date']  ?   $_POST['publish_date'] : NULL;
  $img_name      =$_POST['img_name']      ?   $_POST['img_name'] : NULL;
  
 echo $isbn.$book_name.$writer_name;
  // Prepared statement
  $query = "INSERT INTO books (
   isbn_code,
   book_name,
   writer_name,
   number_of_page,
   publisher,
   publish_date,
   img_name,
   available) 
   VALUES (?,?,?,?,?,?,?,?)";

  $statement = $db->prepare($query);
  $insert=$statement->execute([
    $isbn,
    $book_name,
    $writer_name,
    $page_number,
    $publisher,
    $publish_date,
    $img_name,
    0]);

     if($insert){
         $result['success'] = 'Başarılı!';
     }else{
        print_r($statement->errorInfo());
         $result['error'] = 'Formunuz gönderilirken bir hata oluştu lütfen tekrar deneyiniz!';
     }
    }
echo json_encode($result);
?>

