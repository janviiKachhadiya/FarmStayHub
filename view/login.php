<?php
include('database.php');
session_start();

// If the guest is already logged in, redirect to index
if(isset($_SESSION['guest_id'])){
    header("location:index.php");
}

$emailError = $passwordError = "";
$email = $password = "";

if(isset($_POST['login'])){
    // Collect input data
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $isValid = true;

    // Check if email is not empty and is in a valid format
    if (empty($email)) {
        $emailError = "Email field cannot be empty.";
        $isValid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Please enter a valid email address.";
        $isValid = false;
    }

    // Check if password is not empty
    if (empty($password)) {
      $passwordError = "Password field cannot be empty.";
      $isValid = false;
    } elseif (strlen($password) < 8) {
        $passwordError = "Password must be at least 8 characters long.";
        $isValid = false;
    }

    // If everything is valid, proceed with the query
    if ($isValid) {
        $sql = "SELECT * FROM guest WHERE email='$email' AND password='$password'";
        $cnt = $obj->query($sql, 5);

        if ($cnt == 0) {
            $passwordError = "Invalid email or password.";
        } else {
            $row = $obj->query($sql, 1);
            $_SESSION['guest_id'] = $row['id'];
            header("location:index.php");
        }
    }
}
?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Farmstay Hub</title>
  <link rel="stylesheet" href="../assest/vendors/feather/feather.css">
  <link rel="stylesheet" href="../assest/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../assest/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../assest/css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="favicon.png" />
  <style>
    .error {
      color: red;
      font-size: 14px;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h3 style="align-items: center;text-align: center;font-weight: bold;">Guest Login</h3>
              <form class="pt-3" method="post">
                <!-- Email Input Field -->
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                  <!-- Display Email Error -->
                  <span class="error"><?php echo $emailError; ?></span>
                </div>
                
                <!-- Password Input Field -->
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password" value="<?php echo htmlspecialchars($password); ?>">
                  <!-- Display Password Error -->
                  <span class="error"><?php echo $passwordError; ?></span>
                </div>
                
                <div class="mt-3">
                  <input type="submit" name="login" value="Log in" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" style="background:#3b71fe;border-color:#3b71fe;">
                </div>
                
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.php" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <!-- Scripts -->
  <script src="../assest/vendors/js/vendor.bundle.base.js"></script>
  <script src="../assest/js/off-canvas.js"></script>
  <script src="../assest/js/hoverable-collapse.js"></script>
  <script src="../assest/js/template.js"></script>
  <script src="../assest/js/settings.js"></script>
  <script src="../assest/js/todolist.js"></script>
</body>

</html>

