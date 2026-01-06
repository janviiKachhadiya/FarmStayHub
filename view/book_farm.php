<?php 
include('database.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include the PHPMailer files
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

session_start();
if (isset($_SESSION['guest_id'])) {
    $guest_id = $_SESSION['guest_id'];
    $query = "SELECT profile_image FROM guest WHERE id = '$guest_id'";
    $row = $obj->query($query, 1);
    $profile_picture = !empty($row['profile_image']) ? $row['profile_image'] : 'images.jfif'; // default profile pic
} else {
    $profile_picture = '';
}
$property_id  = $_GET['id'];
$sql = "SELECT * FROM property WHERE id = $property_id";
$data = $obj->query($sql, 1);
$business_day_price = $data['businessRate'];
$weekend_price = $data['weekendRate'];
if ($data) {
  $property = $data;
  $multiImages = explode(', ', $property['multiImage']);
}
$sql = "SELECT start_date, end_date FROM booking WHERE property_id = $property_id";
$bookedDates = $obj->query($sql, 2);
$disabledDates = [];
if ($bookedDates) {
    foreach ($bookedDates as $date) {
        $disabledDates[] = [
            'from' => $date['start_date'],
            'to' => $date['end_date']
        ];
    }
}
if(isset($_POST['book'])) {
    $guest_id=$_SESSION['guest_id'];
    $name = $_POST['fname'];
    $phone = $_POST['phone'];
    $person = $_POST['person'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $start_time = $_POST['checkintime'];
    $end_time = $_POST['checkouttime'];
    $startDateTime = new DateTime($start_date);
    $endDateTime = new DateTime($end_date);
    $amount = 0;
    while ($startDateTime <= $endDateTime) {
        if (in_array($startDateTime->format('N'), [6, 7])) {
            $amount += $weekend_price;
        } else {
            $amount += $business_day_price;
        }
        $startDateTime->modify('+1 day');
    }
    $validEmail="select * from guest where id='$guest_id'";
    $resValid=$obj->query($validEmail,1);
    $email = $resValid['email'];
    if(!isset($_SESSION['guest_id'])){
        header("location:login.php");
    }else{
        header("Location:payment.php?email=$email&property_id=$property_id&guest_id=$guest_id&name=$name&phone=$phone&person=$person&start_date=$start_date&end_date=$end_date&start_time=$start_time&end_time=$end_time&amount=$amount");
    }
    exit();
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en"> 
<!-- Mirrored from holidayfarmhouse.in/p/MTE=/nidhifarm by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Aug 2024 06:19:41 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <base  />
                <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <title>Farm House Booking</title>
        <meta name="description" content="We have best Farmhouse in Surat, navsari, bardoli, sevani On Rent with Swimming Pool within affordable budget of yours. Here you can get top best farmhouses near by your location also with beautiful garden, pool, and many other facilities.">
        <meta name="keyword" content="farm house near me,farm house near mewith swimming pool, farm house surat, farm house rent in surat, farm house under 3000, rent farm,surat farm house, surat farm house contact number">
        <!-- Fav Icon -->    
        <link rel="icon" href="./favicon.png"> 
        <link href="./admin_asset/css/nishantcss.css" rel="stylesheet">   

        <link type="text/css" rel="stylesheet" href="./assets/css/reset.css">
        <link type="text/css" rel="stylesheet" href="./assets/css/plugins.css">
        <link type="text/css" rel="stylesheet" href="./assets/css/themestyle.css">
        <link type="text/css" rel="stylesheet" href="./assets/css/color.css">
        <link type="text/css" rel="stylesheet" href="./assets/css/shop.css">
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
        </style>
    </head>
    <!-- page wrapper -->
      
<style>
    .amenities ul{
        list-style-position: inside;
    }
    .amenities ul li{
        text-align: left;
        padding: 8px;
    }
    .flatpickr-calendar{
        zoom: 1
    }
    .map-container iframe{
        height: 250px !important;
    }
    .flatpickr-day.prevMonthDay.flatpickr-disabled{
        color: #DFDFDF !important;
    }
    .flatpickr-day.prevMonthDay.flatpickr-disabled{
        color: grey !important;
        background: #fff !important;
        border: none !important;
    }
    .listing-property-heading{
        left: 100px;
        bottom: 100px;
        color: #fff;
        font-size: 22px;
        text-align: left;
    }
    .descri *{
        text-align: left;
        color: #666;
    }
    .descri ul{
        text-align: left;
        color: #666;
        list-style-position: inside;
        list-style-type: none;
    }
    .descri ul li{
        margin-bottom: 10px;
        position: relative;
        padding-left: 25px;
    }
    .descri ul li::before{
        position: absolute;
        left: 0px;
        top: -2px;
        content: url(./assets/images/right_arrow.png);
        width: 20px;
        height: 20px;
    }
    .list-single-main-item_content p{
        margin-left: 20px;
        text-align: left;
        color: #666;
        line-height: 20px;
    }
    .profile-menu{
        margin-top:-30%;
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
<link href="./assets/css/flatpickr.min.css" rel="stylesheet" /> 
<link href="./assets/css/jquery.timepicker.min.css" rel="stylesheet" /> 
<body> 
    <!-- main start  -->
    <div id="main">
            
    <!--loader-->
    <div class="loader-wrap">
        <div class="loader-inner">
            <div class="loader-inner-cirle"></div>
        </div>
    </div>
    <!--loader end-->
    <!-- header -->
    <header class="main-header">
        <!-- logo-->
        <a href="index.php" class="logo-holder" style="top: 17px">
            <img style="width:150px;height:auto" src = "../assest/images/new_logo.png" alt="Farmstay Hub" title = "Farmstay hub">   
        </a>
        <!-- logo end--> 
        <!-- header opt -->   
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
        <div class="show-reg-form avatar-img d-xs-none d-xxs-none" data-srcav="./assets/images/avatar/3.html"><i class="fal fa-phone"></i>+91 96383 83991</div>
        <div class="show-reg-form avatar-img d-xs-none d-xxs-none" data-srcav="./assets/images/avatar/3.html"><i class="fal fa-envelope"></i><a href="./cdn-cgi/l/email-protection.html" class="__cf_email__" data-cfemail="b6ded9dadfd2d7cfd0d7c4dbded9c3c5d384868486f6d1dbd7dfda98d5d9db">[email&#160;protected]</a></div>
        <!-- header opt end-->                                
        <!-- nav-button-wrap--> 
        <div class="nav-button-wrap color-bg">
            <div class="nav-button">
                <span></span><span></span><span></span>
            </div>
        </div>
        <!-- nav-button-wrap end-->
        <!--  navigation --> 
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
        <!-- navigation  end --> 
    </header>
    <!-- header end --> 
<style type="text/css">
     
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
    .card {
        border-radius: 15px;
        transition: all 0.3s ease-in-out;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card:hover {
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.4);
        }

        .close:focus{
           outline:0px !important; 
        }

        .card .btn {
        padding: 10px 20px;
        border-radius: 25px;
        }

        .modal-content {
        border-radius: 20px;
        padding: 20px;
        }

        .modal-header {
        border-bottom: none;
        }
</style>
        <!-- wrapper-->
        <div id="wrapper">
            <!-- content-->
            <div class="content">

                <!-- scroll-nav-wrapper end-->
                <div class="scroll-nav-wrapper fl-wrap"> 
                    <div class="container"> 
                        <nav class="scroll-nav scroll-init">
                            <ul class="no-list-style">
                                <li><a class="act-scrlink" href="book_farm.php#sec1"><i class="fal fa-images"></i> Gallery</a></li>
                                <li><a href="book_farm.php#sec2"><i class="fal fa-info"></i>Details</a></li>
                                <li><a href="book_farm.php#sec3"><i class="fal fa-video"></i>Video </a></li> 
                                <li><a href="book_farm.php#sec4"><i class="fal fa-calendar-check"></i>Calender</a></li> 
                                <li><a href="book_farm.php#sec6"><i class="fal fa-map-marker-alt"></i>Location</a></li> 
                            </ul>
                        </nav> 
                    </div>
                </div>
                <div class="ml-30 mr-30 ml-xs-15 mr-xs-15">
                    <div class="listing-carousel-wrap fl-wrap" id="sec1">
                    <div class="listing-carousel fl-wrap full-height lightgallery">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <?php foreach ($multiImages as $image): ?>
                                    <?php 
                                    // Trim and sanitize the image path
                                    $image = trim($image);
                                    // Check if the image path is not empty before rendering
                                    if (!empty($image)): 
                                    ?>
                                        <div class="swiper-slide hov_zoom mr-20">
                                            <img src="../owner/<?php echo htmlspecialchars($image); ?>" class="border" alt="Property Image">
                                            <a href="../owner/<?php echo htmlspecialchars($image); ?>" class="box-media-zoom popup-image">
                                                <i class="fal fa-search"></i>
                                            </a>    
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?> 
                            </div>
                        </div>
                        <div class="listing-carousel_pagination">
                            <div class="listing-carousel_pagination-wrap"></div>
                        </div>
                        <div class="listing-carousel-button listing-carousel-button-next"><i class="fas fa-caret-right"></i></div>
                        <div class="listing-carousel-button listing-carousel-button-prev"><i class="fas fa-caret-left"></i></div>
                    </div>
                </div>
                <!-- listing-carousel-wrap end-->  
                <section class="gray-bg no-top-padding">
                    <div class="container"> 
                        <div class="row">
                            <!-- list-single-main-wrapper-col -->
                            <div class="col-md-8">
                                <!-- list-single-main-wrapper -->
                                <div class="list-single-main-wrapper fl-wrap" id="sec2">
                                    <!-- list-single-header -->
                                    <div class="list-single-header list-single-header-inside block_box fl-wrap">
                                        <div class="list-single-header-item  fl-wrap">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h1><?php echo $property['name']; ?><span class="verified-badge"><i class="fal fa-check"></i></span></h1> 
                                                    <div class="geodir-category-location fl-wrap"><a href="javascript:void(0)"><i class="fas fa-map-marker-alt"></i><?php echo $property['location']; ?></a></div>
                                                </div> 
                                                <div class="col-md-4">
                                                    <div class="fl-wrap list-single-header-column  block_box">
                                                        <div class="listing-rating-count-wrap single-list-count">
                                                            <div class="review-score">4.6</div>
                                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="4"></div>
                                                            <br>
                                                            <div class="reviews-count">54 reviews</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="list-single-main-item fl-wrap block_box">
                                        <div class="list-single-main-item-title">
                                            <h3>Listing Features</h3>
                                        </div>
                                        <div class="list-single-main-item_content fl-wrap">
                                            <div class="listing-features fl-wrap">
                                                <ul class="no-list-style">  
                                                    <li><a href="javascript:void(0)"><i class="fa fa-motorcycle"></i> Free Parking</a></li>
                                                    <li><a href="javascript:void(0)"><i class="fa fa-cloud"></i> Air Conditioner</a></li>
                                                    <li><a href="javascript:void(0)"><i class="fas fa-swimmer"></i> Swimming Pool</a></li> 
                                                    <li><a href="javascript:void(0)"><i class="fa fa-paw"></i> Pet Friendly</a></li>
                                                    <li><a href="javascript:void(0)"><i class="fas fa-shower"></i> Shower</a></li>
                                                    <li><a href="javascript:void(0)"><i class="fal fa-smoking-ban"></i> Non-smoking Rooms</a></li>
                                                    <li><a href="javascript:void(0)"><i class="fas fa-bed"></i> Bedrooms</a></li>
                                                    <li><a href="javascript:void(0)"><i class="fas fa-utensils"></i> Kitchen</a></li>
                                                    <li><a href="javascript:void(0)"><i class="fas fa-temperature-high"></i> Refrigerator</a></li>
                                                    <li><a href="javascript:void(0)"><i class="fas fa-couch"></i> Sofa Chair</a></li>
                                                    <li><a href="javascript:void(0)"><i class="fas fa-bolt"></i> Electricity</a></li>
                                                </ul>
                                            </div>
                                            <div class="amenities">
                                                                                            </div>
                                        </div>
                                    </div>
                                    <!-- list-single-main-item end -->
                                    <div class="list-single-main-item fl-wrap block_box descri">
                                        <div class="list-single-main-item-title">
                                            <h3>Description</h3>
                                        </div>
                                        <div class="list-single-main-item_content fl-wrap">
                                            <p><strong>*&diams;️ Amenities &diams;️*</strong></p>
<ul>
<?php 
    $facilities = explode(', ', $property['facility']);
    foreach ($facilities as $facility) {
      echo "<li>$facility</li>";
    }
  ?>
</ul>
<p><?php echo $property['rules']; ?></p>
<p><?php echo $property['address']; ?></p>
<p><strong>Advance Booking is Compulsory<br />
*Booking : 9638383991*</strong></p>

<p><em>Thank You for connecting with farmstay hub.</em></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- list-single-main-wrapper-col end -->
                            <!-- list-single-sidebar -->
                            <div class="col-md-4">  
                                <div class="box-widget-item fl-wrap block_box">
                                    <div class="box-widget-item-header">
                                        <h3> Farmhouse Rent </h3>
                                    </div>
                                    <div class="box-widget opening-hours fl-wrap">
                                        <div class="box-widget-content">
                                            <ul class="no-list-style"> 
                                            <li class="mon font-15"><span class="opening-hours-day">Monday to Friday - 12 Hour </span><span class="opening-hours-time text-000 font-18">Rs.<?php echo $property['businessRate'];?>.00</span></li>
                                            <li class="mon font-15"><span class="opening-hours-day">Saturday & Sunday - 12 Hour </span><span class="opening-hours-time text-000 font-18">Rs.<?php echo $property['weekendRate'];?>.00</span></li></ul>
                                        </div>
                                    </div>
                                </div> 
                                <div class="list-single-main-item fl-wrap block_box" id="sec4">
                                    <div class="list-single-main-item-title">
                                        <h3>Book Farmhouse </h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap p-xs-10">
                                        <form class="add-comment custom-form" method="post" id="booking_form">  
                                            <div class="iframe-holder fl-wrap mb-15">
                                                <p class="text-left text-666 font-weight-700 mb-5">Select Booking Date*</p>
                                                <input name="date" type="hidden" class="flatpickr flatpickr-input form-control" id="checkin-date" readonly="readonly"> 
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="mb-10 font-14">
                                                <div id="selecteddate" style="display: none;background: #fa8763 !important" class="border-radius-2 text-FFF border p-10" ></div>
                                            </div>
                                            <input type="hidden" name="start_date" id="start_date">
                                            <input type="hidden" name="end_date" id="end_date">
                                            <p class="text-left text-666 font-weight-700 mb-5">Time Duration*</p>
                                            <div class="row" id="multidate" style="display: none">
                                                <div class="col-md-5 col-xs-5 pr-0">
                                                    <div class="listsearch-input-item clact date-container">
                                                        <select name="checkintimes" id="checkintimes" data-placeholder="Check In" class="chosen-select no-search-select" >
                                                            <option value="7:00 AM">7:00 AM</option>
                                                            <option value="7:00 PM">7:00 PM</option> 
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-xs-2 pt-15 text-center font-18">
                                                    To
                                                </div>
                                                <div class="col-md-5 col-xs-5 pl-0">
                                                    <div class="listsearch-input-item clact date-container">
                                                        <select name="checkouttimes" id="checkouttimes" data-placeholder="Check Out" class="chosen-select no-search-select" >
                                                            <option value="6:00 AM">6:00 AM</option>
                                                            <option value="6:00 PM">6:00 PM</option> 
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="singledate">
                                                <div class="col-md-5 col-xs-5 pr-0">
                                                    <div class="listsearch-input-item clact date-container">
                                                        <select name="checkintime" id="checkintime" data-placeholder="Check In" class="chosen-select no-search-select" >
                                                            <option value="7:00 AM">7:00 AM</option> 
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-xs-2 pt-15 text-center font-18">
                                                    To
                                                </div>
                                                <div class="col-md-5 col-xs-5 pl-0">
                                                    <div class="listsearch-input-item clact date-container">
                                                        <select name="checkouttime" id="checkouttime" data-placeholder="Check Out" class="chosen-select no-search-select" >
                                                            <option value="6:00 PM">6:00 PM</option> 
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="property_id" id="property_id" value="11" /> 
                                            <div class="input-item input-item-name ltn__custom-icon"> 
                                                <p class="text-left text-666 font-weight-700 mb-5">Your Name*</p>
                                                <label><i class="fal fa-user"></i></label>
                                                <input type="text" name="fname" placeholder="Type your name" required>
                                                <p class="error-text p-0 m-0"> 
                                                </p>
                                            </div> 
                                            <div class="input-item input-item-phone ltn__custom-icon">
                                                <p class="text-left text-666 font-weight-700 mb-5">Phone Number*</p>
                                                <label><i class="fal fa-phone"></i>  </label>
                                                <input type="number" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="phone" placeholder="Type your phone" required>
                                                <p class="error-text p-0 m-0"> 
                                                </p>
                                            </div>
                                            <div class="quantity fl-wrap">
                                                <span><i class="fal fa-user-plus"></i>Persons : </span>
                                                <div class="quantity-item">
                                                    <input type="button" value="-" class="minus">
                                                    <input type="text" name="person" id="person" title="Person" class="qty color-bg" data-min="1" data-max="100" data-step="1" value="1">
                                                    <input type="button" value="+" class="plus">
                                                </div>
                                                <p class="error-text p-0 m-0"> 
                                                </p>
                                            </div>
                                            <button name="book" style="background: #fa8763 !important;width: 300px" value="send" type="submit" class="btn dec_btn text-FFF color2-bg">Book Now <i class="fal fa-paper-plane"></i></button>
                                        </form> 
                                    </div>
                                </div>
                                <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap block_box" id="sec6">
                                    <div class="box-widget-item-header">
                                        <h3>Location / Contacts  </h3>
                                    </div>
                                    <div class="box-widget">
                                        <div class="map-container p-10 pr-20">
                                            <iframe src="<?php echo $property['locationLink'] ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                                        </div>
                                        <div class="box-widget-content bwc-nopad">
                                            <div class="list-author-widget-contacts list-item-widget-contacts bwc-padside">
                                                <ul class="no-list-style">
                                                    <li><span><i class="fal fa-map-marked-alt"></i> City :</span> <a href="javascript:void(0)"><?php echo $property['city'] ?></a></li>
                                                    <li><span><i class="fal fa-map-marker"></i> Address :</span> <a href="javascript:void(0)"><?php echo $property['address'] ?></a></li> 
                                                </ul>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <!--box-widget-item end --> 
                            </div>
                            <!-- list-single-sidebar end -->
                        </div>
                    </div>
                </section>
                <div class="bottom-sheet" style="display:none">
                    <div class="sheet-header">
                        <!--<div class="rent">-->
                        <!--    <div class="font-20 mt-10"><span class="font-16 text-666">From:</span> &#8377;7,540.00</div> -->
                        <!--</div>-->
                        <div>
                            <div class="mt-5 listing-rating card-popup-rainingvis" data-starrating2="4"></div>
                            <div class="reviews-count">32 reviews</div>
                        </div>
                        <div class="book-btn">
                                                        <a href="https://api.whatsapp.com/send?phone=919638383991&amp;text=Hello,%20I%20am%20interested%20in%20your%20Farm,%20%0a*nidhi%20farm*%20%0a%0ahttps://holidayfarmhouse.in/p/MTE=/nidhifarm%20%20%0a%0aPlease%20send%20more%20information%20about%20it.%20%0a%0aThanks!"
                               target="_blank" class="btn mt-5 p-2 display-inline-block text-FFF color2-bg"> Send Inquiry <i class="fal fa-paper-plane"></i></a> 
                        </div>
                    </div>
                    <div class="sheet-footer text-left">
                        <p>Inclusive of all taxes</p>
                        <p>By proceeding you agree with our <a href="terms.php" class="text-decoration-underline text-primary"><b>Terms & Conditions</b>.</a></p>
                    </div>
                </div>
                <section>
                    <div class="container big-container">
                        <div class="section-title">
                            <h2><span>Similar Farmhouse</span></h2>
                            <div class="section-subtitle">Best Listings</div>
                            <span class="section-separator"></span> 
                        </div> 
                        <div class="grid-item-holder gallery-items fl-wrap">
                                    <?php 
                                    $sql_property = "SELECT * FROM property WHERE status = 1 AND id != $property_id LIMIT 4";
                                    $data3 = $obj->query($sql_property,2);
                                    foreach($data3 as $row) {
                                    ?>

                                    <div class="gallery-item private">
                                        <!-- listing-item  -->
                                        <div class="listing-item">
                                            <article class="geodir-category-listing fl-wrap">
                                                <div class="geodir-category-img">
                                                    <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>Save</span></div>
                                                    <a href="book_farm.php?id=<?php echo $row['id']; ?>" class="geodir-category-img-wrap fl-wrap">
                                                        <img src="../owner/upload/<?php echo htmlspecialchars($row['image']); ?>" alt="royal arcade" style="height: 250px !important;object-fit: cover"  /> 
                                                    </a>  
                                                    <div class="geodir-category-opt">
                                                        <div class="listing-rating-count-wrap">
                                                            <div class="review-score">4.8</div>
                                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                            <br>
                                                            <div class="reviews-count">93 reviews</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="geodir-category-content fl-wrap title-sin_item mb-20">
                                                   <div class="geodir-category-content-title fl-wrap" style="height: 100px">
                                                        <div class="geodir-category-content-title-item">
                                                            <h3 class="title-sin_map font-20"><a href="book_farm.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a><span class="verified-badge"><i class="fal fa-check"></i></span></h3>
                                                            <div class="geodir-category-location fl-wrap text-transform-uppercase">
                                                                <a href="javascript:void(0)" ><i class="fas fa-map-marker-alt"></i><?php echo $row['location']; ?></a>
                                                                <!--<b>Discount :</b> 0 -->
                                                            </div>
                                                        </div>
                                                        <p class="font-16 mt-5">
                                                                &#8377;<?php echo $row['businessRate']; ?>
                                                               <small class="font-12">Mon-Fri 24Hour</small>
                                                        </p>
                                                    </div> 
                                                    <div class="geodir-category-text fl-wrap"> 
                                                        <div class="facilities-list fl-wrap"> 
                                                            <ul class="no-list-style"> 
                                                                <li class="tolt"  data-microtip-position="top" data-tooltip="Parking"><i class="fal fa-parking"></i></li>
                                                                <li class="tolt"  data-microtip-position="top" data-tooltip="Non-smoking Rooms"><i class="fal fa-smoking-ban"></i></li>
                                                                <li class="tolt"  data-microtip-position="top" data-tooltip="Bedrooms"><i class="fas fa-bed"></i></li>
                                                                <li class="tolt"  data-microtip-position="top" data-tooltip="Pets Friendly"><i class="fal fa-dog-leashed"></i></li>
                                                                <li class="tolt"  data-microtip-position="top" data-tooltip="Swimming Bath"><i class="fas fa-swimmer"></i></li> 
                                                                <li class="tolt"  data-microtip-position="top" data-tooltip="Shower"><i class="fas fa-shower"></i></li> 
                                                            </ul>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </article>
                                        </div>
                                        <!-- listing-item end -->                              
                                    </div> 
                                    <?php  } ?>
                                     
                        </div>
                        <a href="property.php" class="btn  dec_btn  color2-bg">Check Out All Properties Listing<i class="fal fa-arrow-alt-right"></i></a>
                    </div>
                </section> 
                <div class="limit-box fl-wrap"></div>
            </div>
            <!--content end-->
        </div>
        <!-- wrapper end--> 
         
       

    <!--footer -->
    <footer class="main-footer fl-wrap"> 
        <!-- footer-header end-->
        <!--footer-inner-->
        <div class="footer-inner fl-wrap">
            <div class="container">
                <div class="row">
                    <!-- footer-widget-->
                    <div class="col-md-8">
                        <div class="footer-widget fl-wrap"> 
                            <h3>About us</h3>
                            <div class="footer-contacts-widget fl-wrap"> 
                                <ul class="footer-contacts fl-wrap no-list-style">
                                    <li><span><i class="fal fa-envelope"></i> Mail :</span><a href="./cdn-cgi/l/email-protection.html#20484f4c494441594641524d484f5553451210121060474d41494c0e434f4d" target="_blank"><span class="__cf_email__" data-cfemail="234b4c4f4a47425a4542514e4b4c5650461113111363444e424a4f0d404c4e">[email&#160;protected]</span></a></li>
                                    <li><span><i class="fal fa-map-marker"></i> Address :</span><a href="javascript:void(0)" target="_blank">Holiday farmhouse, 50 Tirupati soc, Part 2, Surat, Gujarat 395013</a></li>
                                    <li><span><i class="fal fa-phone"></i> Phone :</span><a href="tel:+91 96383 83991">+91 96383 83991</a></li>
                                </ul>
                                <div class="footer-social">
                                    <h3>Follow us</h3> 
                                    <ul class="no-list-style">
                                        <li><a href="https://www.facebook.com/holliday.farmhouse/" title="Facebook"><i class="font-24 fab fa-facebook-f"></i></a></li>
                                        <li class="ml-10"><a href="https://www.instagram.com/holiday_farmhouse/" title="Instagram"><i class="font-24 fab fa-instagram"></i></a></li>
                                        <li class="ml-10"><a href="#" title="Twitter"><i class="font-24 fab fa-twitter"></i></a></li>
                                        <li class="ml-10"><a href="#" title="Linkedin"><i class="font-24 fab fa-linkedin"></i></a></li>
                                        <li class="ml-10"><a href="#https://www.youtube.com/@holidayfarmhouse" title="Youtube"><i class="font-24 fab fa-youtube"></i></a></li>
                                    </ul> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer-widget end--> 
                    <!-- footer-widget  -->
                    <div class="col-md-4">
                        <div class="footer-widget fl-wrap ">
                            <h3>Quick Links</h3>
                            <ul class="quick_link ml-lg-20 ml-md-20">
                                <li><a href="index.html"> Home </a></li>
                                <li> <a href="aboutus.php"> About Us </a></li>
                                <li> <a href="gallery.php"> Gallery</a></li>
                                <li> <a href="property.php"> Property </a></li> 
                                <li> <a href="contact.php"> Contact us </a></li>
                            </ul> 
                        </div>
                    </div>
                    <!-- footer-widget end-->
                </div>
            </div>
            <!-- footer bg-->
            <div class="footer-bg" data-ran="4"></div>
            <div class="footer-wave">
                <svg viewbox="0 0 100 25">
                <path fill="#fff" d="M0 30 V12 Q30 17 55 12 T100 11 V30z" />
                </svg>
            </div>
            <!-- footer bg  end-->
        </div>
        <!--footer-inner end -->
        <!--sub-footer-->
        <div class="sub-footer fl-wrap pb-40">
            <div class="container">
                <div class="copyright"> ©2023 Farmstay hub all rights reserved. </div> 
                <div class="subfooter-nav">
                    <ul class="no-list-style">
                        <li><a href="terms.php">Terms & Conditions</a></li> 
                        <li><a href="policy.php">Privacy & Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--sub-footer end -->
    </footer>
    <!--footer end -->   
    <a class="to-top"><i class="fas fa-caret-up"></i></a>
    <!--== End: Footer Section Wrapper ==--> 
      
    </div>
    <style>
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
    margin: 10% auto; /* Center the modal */
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
    position: absolute;
    right: 10px;
    top: 10px;
}

.modal-body {
    padding:30px 20px 20px; /* Padding inside modal body */
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
}

    </style>
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

    <!-- Main JS -->
    <script data-cfasync="false" src="./cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="./assets/js/main.html"></script>
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/scripts.js"></script>   
    <script src="./assets/js/flatpickr.min.js"></script>
    <script src="./assets/js/flatpickr.init.js"></script>  
    <link rel="stylesheet" type="text/css" href="../npmcdn.com/flatpickr%404.6.13/dist/themes/material_orange.css">
    <script>
         var disabledDates = <?php echo json_encode($disabledDates); ?>;
        // datetime picker config - [flatpickr]
        $("#checkin-date").flatpickr({
    onChange: function (selectedDates, dateStr, instance) {
        const $pos = dateStr.search(/to/);
        $('#selecteddate').html("Selected Date : " + dateStr).show(250);
        
        if ($pos !== -1) {
            const dates = dateStr.split(' to ');
            $("input[name='start_date']").val(dates[0]);
            $("input[name='end_date']").val(dates[1]);
            
            $('#multidate').show(250);
            $('#singledate').hide(250);
        } else {
            $("input[name='start_date']").val(dateStr);
            $("input[name='end_date']").val('');
            
            $('#multidate').hide(250);
            $('#singledate').show(250);
        }
    },
    inline: true,
    enableTime: false,
    mode: "range",
    minDate: "today",
    disable: disabledDates,
    dateFormat: "Y-m-d"
});
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
</body>
 

<!-- Mirrored from holidayfarmhouse.in/p/MTE=/nidhifarm by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Aug 2024 06:20:59 GMT -->
</html>
