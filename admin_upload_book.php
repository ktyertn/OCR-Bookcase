<?php
session_start();
ob_start();
//echo $_SESSION["email"];
require_once "layouts/header.php";
require_once "upload.php";
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
                    <span>Admin işlemleri</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="user_list.php">Kullanıcı Listele</a>
                        <a class="collapse-item" href="admin_add_book.php">Kitap Ekleme</a>
                        <a class="collapse-item" href="time.php">Zaman Atlama</a>
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
                        <h6 class="m-0 font-weight-bold text-primary">Kitap Ekleme</h6>
                    </div>
                    <div class="card-body">
                        <center>
                            <h3>Kitap Ekleme Formu</h3>
                        </center>
                            <?php
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
                               
                            }
                            echo"<div class='container'>
                                 <form action='inc/book_upload.php' method='POST'>
                                    <div class='form-group'>
                                        <label for='ISBN:'>ISBN Kodu:</label>
                                        <input class='form-control' type='text' name='ISBN' id='ISBN' value='".$last_isbn."' readonly>
                                    </div>
                                    <div class='form-group'>
                                        <label for='img_name:'>ISBN Kodunun Fotoğrafı:</label>
                                        <input class='form-control' type='text' name='img_name' id='img_name' value='".$file_name."' readonly>
                                    </div>
                                    <div class='form-group'>
                                        <label for='book_name:'>Kitap Adı:</label>
                                        <input class='form-control' type='text' name='book_name' id='book_name' required>
                                    </div>
                                    <div class='form-group'>
                                        <label for='writer_name:'>Yazar:</label>
                                        <input class='form-control' type='text' name='writer_name' id='writer_name' required>
                                    </div>
                                    <div class='form-group'>
                                        <label for='page_number:'>Sayfa Sayısı:</label>
                                        <input class='form-control' type='number' name='page_number' id='page_number' required>
                                    </div>
                                    <div class='form-group'>
                                        <label for='publisher:'>Yayınevi:</label>
                                        <input class='form-control' type='text' name='publisher' id='publisher' required>
                                    </div>
                                    <div class='form-group'>
                                        <label for='publish_date:'>Basım Yılı:</label>
                                        <input class='form-control' type='number' name='publish_date' id='publish_date' required>
                                    </div>
                                      <div class='form-group'>
                                        <center>
                                            <input id='submit' name='submit' class='btn btn-primary'  type='submit'>
                                        </center>
                                          
                                    </div>
                                    
                                </form>
                            </div>";
                            ?>

                        
                      
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
    $(document).ready(function() {
        $('featured_iso').DataTable();

    });
</script>