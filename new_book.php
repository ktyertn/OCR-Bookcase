<?php
session_start();
ob_start();
$email  = $_SESSION["email"];
$user_id= $_SESSION["user_id"];
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
                    <h6 class="m-0 font-weight-bold text-primary">Yeni Kitap</h6>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">Id </th>
                                        <th class="text-center">ISBN Code </th>
                                        <th class="text-center">Book Name </th>
                                        <th class="text-center">Writer Name </th>
                                        <th class="text-center">Number of Page </th>
                                        <th class="text-center">Publisher </th>
                                        <th class="text-center">Get Book </th>



                                </thead>
                                <tbody>
                                    <?php
                                    $stmt = $db->query("SELECT id,isbn_code,book_name,writer_name,number_of_page,publisher FROM books Where available=0");
                                    $books = $stmt->fetchAll();
                                    foreach ($books as $row) {
                                        echo  "<tr>
                                    <td class='text-center'>" . $row['id'] . "       </td>
                                    <td class='text-center'>" . $row['isbn_code'] . "</td>
                                    <td class='text-center'>" . $row['book_name'] . "</td>
                                    <td class='text-center'>" . $row['writer_name'] . "</td>
                                    <td class='text-center'>" . $row['number_of_page'] . "</td>
                                    <td class='text-center'>" . $row['publisher'] . "</td>
                                    <td class='text-center'><button type='button' class='btn btn-primary'>Kitabı Al</button></td>
                                    
                                  
                                
                                    
                            
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
                <script>
                    $('.table tbody').on('click', '.btn', function() {
                        var currow = $(this).closest('tr');
                        var tid = currow.find('td:eq(0)').text();
                        var tisbn_code = currow.find('td:eq(1)').text();
                        var tbook_name = currow.find('td:eq(2)').text();
                        var twriter_name = currow.find('td:eq(3)').text();
                        var tnumber_of_page = currow.find('td:eq(4)').text();
                        var tpublisher = currow.find('td:eq(5)').text();
                        var result = tid + '\n' + tisbn_code;
                       // alert(result);
                        $.ajax({
                            type: "POST",
                            url: 'test.php',
                            data: {
                                id: tid ,
                                isbn_code:tisbn_code,
                                book_name:tbook_name,
                                writer_name:twriter_name,
                                number_of_page:tnumber_of_page,
                                publisher:tpublisher
                            },
                            dataType:'json',
                            success: function(data) {
                                //alert(data);
                            },
                            error: function(xhr, status, error) {
                                var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                            }
                        });

                    })
             
                </script>
                

                <!-- End of Footer -->

            </div>


        </div>

        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>




<?php


session_start();
ob_start();
$email  = $_SESSION["email"];
$user_id= $_SESSION["id"];
?>
</body>

</html>