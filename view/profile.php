<?php
include('database.php');
include('header.php');
if(!isset($_SESSION['guest_id'])) {
    header("location:index.php");
    exit;
}
$admin_id = $_SESSION['guest_id'];
$query = "SELECT * FROM guest WHERE id='$admin_id'";
$user = $obj->query($query, 1);

if (isset($_POST['update_profile'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $city = $_POST['city'];
  $country = $_POST['country'];
  $phone = $_POST['phone'];
   // Update profile image if uploaded
   if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
    $imageName = $_FILES['profile_image']['name'];
    $imageTmpName = $_FILES['profile_image']['tmp_name'];
    $imageNewName = uniqid() . '-' . $imageName;
    $imagePath = 'upload/' . $imageNewName;
    move_uploaded_file($imageTmpName, $imagePath);
    $sql = "UPDATE guest SET profile_image='$imageNewName' WHERE id='$admin_id'";
    $obj->query($sql, 4);
}
  // Update admin profile details
  $sql = "UPDATE guest SET name='$name', email='$email', gender='$gender', city='$city', country='$country', contact='$phone'  WHERE id='$admin_id'";
  $obj->query($sql, 4);
  echo "<script>
    alert('Your profile has been updated successfully!');
    window.location.href = 'index.php';
    </script>";
    exit;
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
                    <h2><span>Profile</span></h2>
                    <div class="section-subtitle">Update Profile</div>
                    <span class="section-separator"></span> 
                </div>
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form class="forms-sample" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="w-100 pb-2" style="text-align:left;font-size:15px;">Profile Image</label>
                                        <input type="file" name="profile_image" class="file-upload-default d-none" accept="image/*">
                                        <div class="input-group col-xs-12 d-flex align-items-start" style="padding:0px;">
                                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" style="height:44px;">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" style="padding-right:25px;" type="button">Upload</button>
                                            </span>
                                        </div>
                                        <?php if (!empty($user['profile_image'])): ?>
                                            <img id="image-preview" src="upload/<?= $user['profile_image']; ?>" alt="Profile Image" style="max-width: 150px; margin-top: 10px;max-height:150px">
                                        <?php else: ?>
                                            <img id="image-preview" alt="No Profile Image" style="max-width: 150px; margin-top: 10px; display: none;">
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1" class="w-100 py-2" style="text-align:left;font-size:15px;">Name</label>
                                        <input type="text" class="form-control" name="name" value="<?= $user['name']; ?>" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail3" class="w-100 pb-2" style="text-align:left;font-size:15px;">Email address</label>
                                        <input type="email" class="form-control" name="email" value="<?= $user['email']; ?>" placeholder="Email" readonly>
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleSelectGender" class="w-100 pb-2" style="text-align:left;font-size:15px;">Gender</label>
                                    <select class="js-example-basic-single w-100 form-select p-2" name="gender" id="exampleSelectGender">
                                        <option value="">Select Gender...</option>
                                        <option value="male" <?= ($user['gender'] == 'male') ? 'selected' : ''; ?>>Male</option>
                                        <option value="female" <?= ($user['gender'] == 'female') ? 'selected' : ''; ?>>Female</option>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputCity1" class="w-100 pb-2" style="text-align:left;font-size:15px;">City</label>
                                        <input type="text" class="form-control" name="city" value="<?= $user['city']; ?>" placeholder="City">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputCountry1" class="w-100 pb-2" style="text-align:left;font-size:15px;">Country</label>
                                        <input type="text" class="form-control" name="country" value="<?= $user['country']; ?>" placeholder="Country">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPhone1" class="w-100 pb-2" style="text-align:left;font-size:15px;">Phone Number</label>
                                        <input type="number" class="form-control" name="phone" value="<?= $user['contact']; ?>" placeholder="Phone Number">
                                    </div>
                                    <button type="submit" name="update_profile" class="btn btn-primary" style="padding:10px 25px;">Save</button>
                                    <a href="update_password.php"><button type="button" name="update_password" class="btn btn-primary" style="padding:10px 25px;">Update Password</button></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.file-upload-browse').on('click', function() {
                    $('.file-upload-default').trigger('click');
                });

                $('.file-upload-default').on('change', function() {
                    var fileName = $(this).val().split('\\').pop();
                    $('.file-upload-info').val(fileName);
                });
            });
</script>

<?php include('footer.php'); ?>
