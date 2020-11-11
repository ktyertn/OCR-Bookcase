<?php
session_start();
ob_start();
//echo $_SESSION["email"];
require_once "layouts/header.php";
require_once "upload.php";
require_once "inc/mysql.php";


if(isset($_POST['id'])){
    $deneme="";
    $id=$_POST['id'];
    $query="SELECT book_name FROM books WHERE userid=?";
    $stmt=$db->prepare($query);
    $stmt->execute(array($id));
    $result=$stmt->fetchAll();
    foreach($result as $row){
      $deneme=$deneme.$row['book_name'].'\n';
        }
    echo '<script type=text/javascript>alert("'.$deneme.'");</script>';
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
                    <span>Admin İşlemleri</span>
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
                        <h6 class="m-0 font-weight-bold text-primary">Kullanıcı Listeleme</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Second Name</th>
                                     



                                </thead>
                                <tbody>
                                    <?php
                                    $stmt = $db->query("SELECT * FROM users");
                                    while ($row = $stmt->fetch()) {
                                        echo  "<tr>
                                    <td>" . $row['id'] . "</td>
                                    <td>" . $row['name'] . "</td>
                                    <td>" . $row['second_name'] . "</td>
                                    
                                   
                                  
                                
                                    
                            
                                    </tr>";
                                    }


                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Kitap Listeleme</h6>
                    </div>
                    <div class="container col-sm-12">
                        <center>
                            <h6>Kitaplarını görmek istediğiniz kullanıcının idsini giriniz!</h4>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm"></div>
                                    <div class="col-sm">
                                        <div class="custom-file">
                                            <input type="number" name="id" id="id" class="form-control" placeholder="ID" aria-label="Atlanacak zaman gün sayısı giriniz." aria-describedby="basic-addon2" required>


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
<script>
    $('.table tbody').on('click', '.btn', function() {
        var currow = $(this).closest('tr');
        var tid = currow.find('td:eq(0)').text();
        var tname = currow.find('td:eq(1)').text();
        var tsecondname= currow.find('td:eq(2)').text();
        // alert(result);
        $.ajax({
            type: "POST",
            url: 'book_list.php',
            data: {
                id: tid,
                name: tname,
                secondname: tsecond_name
            },
            dataType: 'json',
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