<?php
session_start();
ob_start();
$email= $_SESSION["email"];
$user_id=$_SESSION['user_id'];
require_once "layouts/header.php";
require_once "upload.php";
    
?>
<?php
require_once "inc/mysql.php";

$isbn = "ISBN";
if (isset($_FILES['image'])) {
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($file_tmp, "images/" . $file_name);
    


    shell_exec('"C:\\Program Files\\Tesseract-OCR\\tesseract" "C:\\Appserv\\www\\yazlab\\images\\' . $file_name . '" out');




    $myfile = fopen("out.txt", "r") or die("Unable to open file!");
    $last_isbn="null";
    while (!feof($myfile)) {
        $line = fgets($myfile);

        $konum = strpos($line, $isbn);
        if ($konum === false) {
        } else {
            $last_isbn=$line;
            
        break;
        }
    }
    //echo fread($myfile, filesize("out.txt"));
    fclose($myfile);
    
    $des=$last_isbn;
    $des = preg_replace('~[\r\n]~', '', $des);
    
    //echo json_encode($des);

    $book_name=NULL;

    try{
        $query="SELECT book_name FROM books WHERE isbn_code=? AND userid=? LIMIT 1";
        $stmt=$db->prepare($query);
        $stmt->execute(array($des,$user_id));
        $result=$stmt->fetchColumn();
        $book_name=$result;

        if($book_name==NULL){
            echo '<script type=text/javascript>alert("İade etmek istediğiniz kitap bulunamadı!");</script>';
        }else{
            echo '<script type=text/javascript>alert("'.$book_name. ' adlı kitabı başarı ile iade ettiniz");</script>';
           
            $query="UPDATE books SET available=0 , userid=0,time=0  WHERE userid=$user_id AND isbn_code=?";
            $stmt=$db->prepare($query);
            
            $stmt->execute(array($des));
            $stmt->errorInfo();
        }
        
       

    }catch(PDOException $er){
        print $er-> getMessage();
    }
    
}
?>

</html>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon ">
                    <i class="fas fa-home"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Kütüphane</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="welcome.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Anasayfa</span>
                </a>
                <hr class="sidebar-divider my-0">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Üye İşlemleri</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="search_book.php">Kitap Arama</a>
                        <a class="collapse-item" href="new_book.php"   >Yeni Kitap</a>
                        <a class="collapse-item" href="give_book.php"  >Kitap İade</a>
                    </div>
                </div>
                <hr class="sidebar-divider my-0">

                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-power-off"></i>
                    <span>Çıkış</span>
                </a>



                <hr class="sidebar-divider">




        </ul>
        <!-- End of Sidebar -->

         <!-- Content Wrapper -->
         <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div class="col-md-12" id="header">




    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kitap İade</h6>
        </div>
        <div>
            <div class="container col-sm-12">
                <center>
                    <h3>ISBN Kodunun Fotoğrafı</h3>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm"></div>
                            <div class="col-sm">
                                <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input btn-primary" id="customFile" style=" padding: 2rem 2rem;" required readonly>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            <div class="col-sm"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                        <input type="submit" class="btn btn-primary" />
                            </div>
                        </div>
                       
                    </form>
                </center>
            </div>
            



        </div>


    </div>

    <?php
    require_once __ROOT__ . "/layouts/footer.php";
    ?>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <!-- End of Footer -->

</div>


</div>

<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>





</body>

</html>
<script>

$('#customFile').on('change',function(){
    //get the file name
    var fileName = $(this).val();
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
})

</script>
