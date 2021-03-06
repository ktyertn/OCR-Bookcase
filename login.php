<!DOCTYPE html>
<html lang="en">

<?php
session_start();
ob_start();
define('__ROOT__', dirname(__FILE__));
define('LINK', 'http://localhost:80/yazlab');

require_once __ROOT__ . "/layouts/header.php";

?>
<?php
if (isset($_POST['login_button'])) {
  $user_email = isset($_POST['user_email']) ? $_POST['user_email'] : NULL;
  $user_pass  = isset($_POST['user_pass']) ? $_POST['user_pass'] : NULL;

  if ($user_email == NULL) {
    $msg = 'E Mail kısmını boş bırakmayınız!';
    echo $msg;
  } else if ($user_pass == NULL) {
    $msg = 'Şifre kısmını boş bırakmayınız!';
    echo $msg;
  } else {
    
    $query=$db->prepare('SELECT * FROM users WHERE e_mail = ? AND password = ?');
    $query->execute([$user_email, $user_pass]);
    $user_info=$query->fetch(PDO::FETCH_ASSOC);
    $user_id=$user_info['id'];
    $user_tmp=$user_info['e_mail'];
    $_SESSION["email"] = $user_email;
    $_SESSION["user_id"]    = $user_id;
    if($user_email==$user_tmp){
      header('location:' . LINK . '/welcome.php');
    }
    
  
  }
}

?>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" method="POST">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="user_email">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="user_pass">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <input href="index.php" class="btn btn-primary btn-user btn-block" type="submit" name="login_button">

                    </input>


                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <?php
  require_once __ROOT__ . "/layouts/footer.php";
  ?>

</body>

</html>