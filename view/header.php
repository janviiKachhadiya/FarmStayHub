<?php
session_start();
if(isset($_SESSION['guest_id'])){
    $user_id = $_SESSION['guest_id'];
    $query_profile = "SELECT profile_image FROM guest WHERE id='$user_id'";
    $user_profile = $obj->query($query_profile, 1);
    $profile_picture = !empty($user_profile['profile_image']) ? $user_profile['profile_image'] : 'images.jfif';
}
?>
<!DOCTYPE html>
<html class="no-js" lang="en"> 
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <base  />
                <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <title>Farmstay Hub</title>
        <meta name="description" content="We have best Farmhouse in Surat, navsari, bardoli, sevani On Rent with Swimming Pool within affordable budget of yours. Here you can get top best farmhouses near by your location also with beautiful garden, pool, and many other facilities.">
        <meta name="keyword" content="farm house near me,farm house near mewith swimming pool, farm house surat, farm house rent in surat, farm house under 3000, rent farm,surat farm house, surat farm house contact number">
        <!-- Fav Icon -->    
        <link rel="icon" href="./favicon.png"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <link href="admin_asset/css/nishantcss.css" rel="stylesheet">   

        <link type="text/css" rel="stylesheet" href="assets/css/reset.css">
        <link type="text/css" rel="stylesheet" href="assets/css/plugins.css">
        <link type="text/css" rel="stylesheet" href="assets/css/themestyle.css">
        <link type="text/css" rel="stylesheet" href="assets/css/color.css">
        <link type="text/css" rel="stylesheet" href="assets/css/shop.css">
        <style>
            @media (max-width:479px) {
                .at-share-btn-elements{
                    width: 50%;
                    float: left;
                    margin-top: 10px;
                }
                .bottom-sheet{
                    display: block !important;
                }
            }
            .geodir-js-favorite_btn{
                display: none;
            }
            .profile-menu {
        position: relative;
        display: inline-block;
    }

    .profile-menu{
        margin-top:-50%;
        margin-right:0px !important;
    }

    .profile-menu .menu {
        display: none;
        position: absolute;
        background-color: white;
        min-width: 150px;
        left:-200%;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .profile-menu:hover .menu {
        display: block;
    }

    .profile-menu .menu a {
        color: black;
        text-align:left;
        padding: 12px 10px;
        text-decoration: none;
        display: block;
    }

    .profile-menu .menu a:hover {
        background-color: #f1f1f1;
    }
        </style>
    </head>
    <!-- page wrapper -->
        
<!-- Latest compiled and minified CSS -->

<body> 
    <div id="main">
    <div class="loader-wrap">
        <div class="loader-inner">
            <div class="loader-inner-cirle"></div>
        </div>
    </div>
    <header class="main-header">
        <a href="index.php" class="logo-holder" style="top: 17px">
            <img style="width:150px;height:auto" src = "../assest/images/new_logo.png" alt="Farmstay Hub" title = "Farmstay hub">  
        </a> 
        <div class="show-reg-form">
            <?php if (!isset($_SESSION['guest_id'])): ?>
                <!-- Display login link if guest_id is not set -->
                <i class="fal fa-user"></i>
                <a id="openLoginModal" href="#" style="color:gray;">
                    Login
                </a>
            <?php else: ?>
                <!-- Display profile image and Settings menu if guest_id is set -->
                <div class="profile-menu">
                    <img src="upload/<?php echo $profile_picture; ?>" alt="Profile Image" style="width: 40px; height: 40px; border-radius: 50%;" />
                    <div class="menu">
                        <a href="profile.php">Profile</a>
                        <a href="booking_detail.php">Booking Details</a>
                        <a href="Transaction_history.php">History</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="show-reg-form avatar-img d-xs-none d-xxs-none" data-srcav="assets/images/avatar/3.html"><i class="fal fa-solid fa-phone"></i>+91 96383 91345</div>
        <div class="show-reg-form avatar-img d-xs-none d-xxs-none" data-srcav="assets/images/avatar/3.html"><i class="fal fa-envelope"></i><a href="#0" class="__cf_email__" style="color: grey;">farmstayhub21@gmail.com</a></div>
        <div class="nav-holder main-menu">
            <nav>
                <ul class="no-list-style">
                    <li><a class="" href="index.php"> Home </a></li>
                    <li> <a class="" href="aboutus.php"> About Us </a></li>
                    <li> <a class="" href="property.php"> Farmhouse</a></li> 
                    <li> <a class="" href="gallery.php"> Gallery</a></li>
                    <li> <a class="" href="contact.php"> Contact us </a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content card">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                    <!-- User Login Card -->
                    <div class="col-md-6">
                        <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Guest</h5>
                            <p class="card-text">If you are a regular user, log in here to access your account and make bookings.</p>
                            <a href="login.php" class="btn btn-primary">Click Here to Guest Login</a>
                        </div>
                        </div>
                    </div>
                    
                    <!-- Owner Login Card -->
                    <div class="col-md-6">
                        <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Owner</h5>
                            <p class="card-text">Property owners can log in here to manage their listings and bookings.</p>
                            <a href="../owner/index.php" class="btn btn-primary">Click Here to Owner Login</a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
<style type="text/css">
     .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0, 0, 0, 0.5); /* Black w/ opacity */
}

.modal-dialog {
    position: relative;
    margin: 20% auto 0px;
    max-width: 800px; /* Max width for larger screens */
}

.modal-content {
    background-color: #fff; /* White background */
    border-radius: 5px; /* Rounded corners */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); /* Subtle shadow */
}

.modal-header {
    padding: 0px 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom:0px !important;
    position: absolute;
    right: 10px;
    top: 10px;
}

.modal-body {
    padding:45px 20px 20px; /* Padding inside modal body */
}

.row {
    display: flex; /* Flexbox layout */
    flex-wrap: wrap; /* Allow wrapping of columns */
}

.column {
    flex: 1; /* Grow to fill space */
    margin: 10px; /* Space between columns */
    min-width: 300px; /* Minimum width for each column */
}

.card {
    border: 1px solid #ddd; /* Light border */
    border-radius: 5px; /* Rounded corners */
    overflow: hidden; /* Hide overflow */
    background-color: #f8f9fa; /* Light background for cards */
}

.card-body {
    padding: 15px; /* Padding inside card body */
}

.card-title {
    font-size: 1.25rem; /* Font size for titles */
    margin-bottom: 10px; /* Margin below title */
}

.card-text {
    margin-bottom: 15px; /* Margin below text */
}

.btn {
    display: inline-block;
    padding: 10px 15px; /* Padding for buttons */
    background-color: #007bff; /* Primary button color */
    color: white; /* Button text color */
    text-decoration: none; /* No underline */
    border-radius: 5px; /* Rounded corners */
}

.btn:hover {
    background-color: #0056b3; /* Darker shade on hover */
}

.close {
    cursor: pointer;
    border:none;
    background:none;
    font-size:32px; /* Change cursor to pointer for close button */
}
.showLoginModel{
    display:block;
    z-index:99;
    opacity:1 !important; 
}

    .floating_action {
        bottom: 80px;
        position: fixed;
        margin: 1em;
        right: -5px;
        z-index: 999;
    }

    .ac_buttons {
        box-shadow: 0px 5px 11px -2px rgba(0, 0, 0, 0.18), 
            0px 4px 12px -7px rgba(0, 0, 0, 0.15);
        border-radius: 50%;
        display: block;
        width: 56px;
        /*line-height: 56px;*/
        text-align: center; 
        background: #384F95;
        height: 56px;
        color: white;
        margin: 20px auto 0;
        position: relative;
        -webkit-transition: all .1s ease-out;
        transition: all .1s ease-out;  
    }
    .ac_buttons i{
        font-size: 20px;
        line-height: 44px;
    }
    .ac_buttons:active, 
    .ac_buttons:focus, 
    .ac_buttons:hover {
        box-shadow: 0 0 4px rgba(0,0,0,.14),
            0 4px 8px rgba(0,0,0,.28);
        color: white;
    }

    .ac_buttons:not(:last-child) {
        width: 40px;
        height: 40px;
        margin: 20px auto 0;
        opacity: 0;
        -webkit-transform: translateY(50px);
        -ms-transform: translateY(50px);
        transform: translateY(50px);
    }

    .floating_action:hover 
    .ac_buttons:not(:last-child) {
        opacity: 1;
        -webkit-transform: none;
        -ms-transform: none;
        transform: none;
        margin: 15px auto 0;
    }

    /* Unessential styling for sliding up ac_buttons at differnt speeds */

    .ac_buttons:nth-last-child(1) {
        -webkit-transition-delay: 25ms;
        transition-delay: 25ms;
        background-image: url('https://cbwconline.com/IMG/Share.svg');
        background-size: contain;
    }

    .ac_buttons:not(:last-child):nth-last-child(2) {
        -webkit-transition-delay: 50ms;
        transition-delay: 20ms;
        background-image: url('../cbwconline.com/IMG/Facebook-Flat.html');
        background-size: contain;
    }

    .ac_buttons:not(:last-child):nth-last-child(3) {
        -webkit-transition-delay: 75ms;
        transition-delay: 40ms;
        background-image: url('../cbwconline.com/IMG/Twitter-Flat.html');
        background-size: contain;
    }

    .ac_buttons:not(:last-child):nth-last-child(4) {
        -webkit-transition-delay: 100ms;
        transition-delay: 60ms;
        background-image: url('https://cbwconline.com/IMG/Google Plus.svg');
        background-size: contain;
    }

    /* Show tooltip content on hover */

    [tooltip]:before {
        bottom: 25%;
        font-family: arial;
        font-weight: 600;
        border-radius: 2px;
        background: #585858;
        color: #fff;
        content: attr(tooltip);
        font-size: 12px;
        visibility: hidden;
        opacity: 0;
        padding: 5px 7px;
        margin-right: 12px;
        position: absolute;
        right: 100%;
        white-space: nowrap;
    }

    [tooltip]:hover:before,
    [tooltip]:hover:after {
        visibility: visible;
        opacity: 1;
    }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
   $(document).ready(function() {
    document.getElementById('openLoginModal').addEventListener('click', function() {
        $('#loginModal').addClass('showLoginModel');
    });
    document.querySelector('.close').addEventListener('click', function() {
      $('#loginModal').removeClass('showLoginModel');
    });
    $(window).on('click', function(event) {
        if ($(event.target).is('#loginModal.showLoginModel')) {
            $('#loginModal').removeClass('showLoginModel');// Hide the modal
        }
    });
});
</script> 

