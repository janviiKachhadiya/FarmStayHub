<?php
include('database.php');
include('header.php');
if(!isset($_SESSION['guest_id'])) {
    header("location:index.php");
    exit;
}
$errors = [];
$row = [];

// Fetch existing admin data if user_id is provided
if (isset($_SESSION['guest_id'])) {
    $user_id = $_SESSION['guest_id'];
    $sql_select = "SELECT * FROM guest WHERE id = " . $user_id;
    $row = $obj->query($sql_select, 1);
}
// Handle form submission
if (isset($_POST['save'])) {
    
    $c_password = trim($_POST['c_password']);
    $n_password = trim($_POST['n_password']);
    $password = trim($_POST['password']);

    // Validate password
    if (empty($password) || strlen($password) < 8) {
        $errors['password'] = "Password must be at least 8 characters long.";
    }

    if (empty($n_password) || strlen($n_password) < 8) {
        $errors['n_password'] = "Password must be at least 8 characters long.";
    }

    if (empty($c_password) || strlen($c_password) < 8) {
        $errors['c_password'] = "Password must be at least 8 characters long.";
    }
     
    if($row['password']!=$password){
        $errors['password'] = "Password are not match with Your Old Password.";
    }

    if ($password == $n_password) {
        $errors['n_password'] = "Password and New Password must be Different.";
    }

    if ($c_password != $n_password) {
        $errors['c_password'] = "New Password and Confirm Password must be Same.";
    }
    if (empty($errors)) {
        if (isset($_SESSION['guest_id'])) {
            $user_id = $_SESSION['guest_id'];
            $sql_insert = "UPDATE guest SET password='$c_password' WHERE id=" .$user_id;
            $res = $obj->query($sql_insert, 4);
            echo $res;
            if ($res) {
                echo "<script>
                alert('Your Password Updated!');
                window.location.href = 'index.php';
                </script>";
                exit;
            } else {
                echo "Failure";
            }
        }
    }
}
?>
<div id="wrapper">
    <style>
        #main{
            opacity: 1 !important;
        }
        .loader-wrap{
            display:none;
        }
    </style>
    <!-- Main Content -->
    <div class="content">
        <div class="container">
            <section>
                <div class="section-title" >
                    <h2><span>Update Password</span></h2>
                    <div class="section-subtitle">Update Password</div>
                    <span class="section-separator"></span> 
                </div>
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form class="forms-sample" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                <label for="exampleInputPassword1" class="w-100 pb-2" style="text-align:left;font-size:15px;">Old Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Old Password" name="password">
                                <?php if (isset($errors['password'])): ?>
                                    <div class="error-message text-danger"><?php echo $errors['password']; ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword2" class="w-100 pb-2" style="text-align:left;font-size:15px;">New Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="New Password" name="n_password">
                                <?php if (isset($errors['n_password'])): ?>
                                    <div class="error-message text-danger"><?php echo $errors['n_password']; ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword3" class="w-100 pb-2" style="text-align:left;font-size:15px;">Confirm Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Confirm Password" name="c_password">
                                <?php if (isset($errors['c_password'])): ?>
                                    <div class="error-message text-danger"><?php echo $errors['c_password']; ?></div>
                                <?php endif; ?>
                            </div>
                                    <button type="submit" name="save" class="btn btn-primary" style="padding:10px 25px;">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php include('footer.php'); ?>
