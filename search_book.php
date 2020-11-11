<?php
session_start();
ob_start();

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
                    <span>Üyelik İşlemleri</span>
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

                <div class="panel-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kitap Arama</h6>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th >Id</th>
                                        <th >ISBN Code</th>
                                        <th >Book Name</th>
                                        <th >Writer Name</th>
                                        <th >Number of Page</th>
                                        <th >Publisher</th>



                                </thead>
                                <tbody>
                                    <?php
                                    $stmt = $db->query("SELECT id,isbn_code,book_name,writer_name,number_of_page,publisher FROM books");
                                    while ($row = $stmt->fetch()) {
                                        echo  "<tr>
                                    <td>" . $row['id'] . "</td>
                                    <td>" . $row['isbn_code'] . "</td>
                                    <td>" . $row['book_name'] . "</td>
                                    <td>" . $row['writer_name'] . "</td>
                                    <td>" . $row['number_of_page'] . "</td>
                                    <td>" . $row['publisher'] . "</td>
                                  
                                
                                    
                            
                                    </tr>";
                                    }


                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                


                <?php
                require_once __ROOT__ . "/layouts/footer.php";
                ?>
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