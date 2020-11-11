<?php
session_start();
ob_start();
//echo $_SESSION["email"];
require_once "layouts/header.php";
require_once "upload.php";

if (isset($_POST['time'])) {
    
    try {
        $time=$_POST['time'];
        $query = "UPDATE books SET time=time-$time WHERE available=1";
        $stmt = $db->prepare($query);

        $stmt->execute(array($des));
        $stmt->errorInfo();
    } catch (PDOException $er) {
        print $er->getMessage();
    }
    echo '<script type=text/javascript>alert("' . $time . ' gün atlandı");</script>';
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
                <div class="sidebar-brand-text mx-3">Kitaplık</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="welcome.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Mainpage</span>
                </a>
                <hr class="sidebar-divider my-0">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Admin Operations</span>
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
                    <span>Logout</span>
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
                        <h6 class="m-0 font-weight-bold text-primary">Zaman Atlama</h6>
                    </div>
                    <div class="container col-sm-12">
                        <center>
                            <h6>Atlanacak gün sayısını giriniz!</h6>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm"></div>
                                    <div class="col-sm">
                                        <div class="custom-file">
                                            <input type="number" name="time" id="time" class="form-control" placeholder="Time" aria-label="Atlanacak zaman gün sayısı giriniz." aria-describedby="basic-addon2" required>


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