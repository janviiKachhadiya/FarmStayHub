<?php 
include('database.php');
session_start();
if(!isset($_SESSION['guest_id'])){
    header("location:login.php");
}
if (isset($_SESSION['guest_id'])) {
    $guest_id = $_SESSION['guest_id'];
    $query = "SELECT profile_image FROM guest WHERE id = '$guest_id'";
    $row = $obj->query($query, 1);
    $profile_picture = !empty($row['profile_image']) ? $row['profile_image'] : 'images.jfif'; // default profile pic
} else {
    $profile_picture = '';
}
$guest_id = $_SESSION['guest_id'];
$sql = "SELECT booking.*, property.name 
        FROM booking 
        JOIN property ON booking.property_id = property.id 
        WHERE booking.guest_id = $guest_id";
$data = $obj->query($sql, 2); 
 
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
        <a href="index.html" class="logo-holder" style="top: 17px">
            <img style="width:150px;height:auto" src = "../assest/images/new_logo.png" alt="Farmstay Hub" title = "Farmstay hub">  
        </a> 
        <div class="show-reg-form">
            <?php if (!isset($_SESSION['guest_id'])): ?>
                <!-- Display login link if guest_id is not set -->
                <i class="fal fa-user"></i>
                <a href="login.php" style="color: grey;">Login</a>
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
</style>
<!-- Main Content Wrapper -->
<div id="wrapper">
    <!-- Main Content -->
    <div class="content">
        
        <!-- Inner Heading Section Start -->
        <section class="parallax-section single-par" data-scrollax-parent="true">
            <div class="bg par-elem" data-bg="../assest/images/bg/111.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay op7"></div>
            <div class="container">
                <div class="section-title center-align big-title">
                    <h2><span>Booking Details</span></h2>
                    <span class="section-separator"></span>
                    <div class="breadcrumbs fl-wrap">
                        <a href="index.html">Home</a>
                        <a href="javascript:void(0)">Pages</a>
                        <span>Booking Details</span>
                    </div>
                </div>
            </div>
            <div class="header-sec-link">
                <a href="#sec1" class="custom-scroll-link">
                    <i class="fal fa-angle-double-down"></i>
                </a> 
            </div> 
        </section>
        <!-- Inner Heading Section End -->
        
        <!-- Booking Details Section Start -->
        <section id="sec1" data-scrollax-parent="true">
            <div class="container">
                <div class="about-wrap">
                <div class="row">
                        <div class="col-md-12">
                            <div class="ab_text">
                                <div class="ab_text-title fl-wrap">
                                    <h3>Your Booking Farms Details</h3>
                                    <span class="section-separator fl-sec-sep"></span>
                                </div> 
                                <!-- Booking Details Table -->
                                <table border="1" cellspacing="0" cellpadding="10">
                                <thead>
                                    <tr>
                                        <th>Property Name</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Person</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $daysFromNow = 2;
                                    $currentDate = new DateTime();
                                    $futureDate = $currentDate->add(new DateInterval('P' . $daysFromNow . 'D'))->format('Y-m-d');
                                    if (!empty($data)) {
                                        foreach ($data as $row) {
                                            $startDate = $row['start_date'];
                                            if ($startDate < $futureDate && $row['status']!='canceled') { ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                                                    <td><?php echo htmlspecialchars($startDate); ?></td>
                                                    <td><?php echo htmlspecialchars($row['end_date'] == '0000-00-00' ? $row['start_date'] : $row['end_date']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['start_time']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['end_time']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['person']); ?></td>    
                                                </tr>
                                            <?php }
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No booking records found.</td></tr>";
                                    } ?>
                            </tbody>
                        </table>

                                <!-- End of Booking Details Table -->
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:20px;">
                        <div class="col-md-12">
                            <div class="ab_text">
                                <div class="ab_text-title fl-wrap">
                                    <h3>Your Current Booking Farms Details</h3>
                                    <span class="section-separator fl-sec-sep"></span>
                                </div> 
                                <!-- Booking Details Table -->
                                <table border="1" cellspacing="0" cellpadding="10">
                                <thead>
                                    <tr>
                                        <th>Property Name</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Person</th>
                                        <th style="text-align:center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $daysFromNow = 2;
                                    $currentDate = new DateTime();
                                    $futureDate = $currentDate->add(new DateInterval('P' . $daysFromNow . 'D'))->format('Y-m-d');
                                    if (!empty($data)) {
                                        foreach ($data as $row) {
                                            $startDate = $row['start_date'];
                                            if ($startDate > $futureDate && $row['status']!='canceled') { ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                                                    <td><?php echo htmlspecialchars($startDate); ?></td>
                                                    <td><?php echo htmlspecialchars($row['end_date'] == '0000-00-00' ? $row['start_date'] : $row['end_date']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['start_time']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['end_time']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['person']); ?></td>
                                                    <td style="text-align:center;">
                                                        <button class="cancel-btn" data-id="<?php echo $row['id']; ?>" style="padding:5px 10px;cursor:pointer;background:#ff4747;border:1px solid white;color:white;border-radius:30px;">Cancel</button>
                                                    </td>
                                                </tr>
                                            <?php }
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No booking records found.</td></tr>";
                                    } ?>
                            </tbody>
                        </table>

                                <!-- End of Booking Details Table -->
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top:20px;">
                        <div class="col-md-12">
                            <div class="ab_text">
                                <div class="ab_text-title fl-wrap">
                                    <h3>Your Cancel Booking Farms Details</h3>
                                    <span class="section-separator fl-sec-sep"></span>
                                </div> 
                                <!-- Booking Details Table -->
                                <table border="1" cellspacing="0" cellpadding="10">
                                <thead>
                                    <tr>
                                        <th>Property Name</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Person</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($data)) {
                                        foreach ($data as $row) {
                                            if ($row['status']=='canceled') { ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                                                    <td><?php echo htmlspecialchars($startDate); ?></td>
                                                    <td><?php echo htmlspecialchars($row['end_date'] == '0000-00-00' ? $row['start_date'] : $row['end_date']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['start_time']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['end_time']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['person']); ?></td>
                                                </tr>
                                            <?php }
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No booking records found.</td></tr>";
                                    } ?>
                            </tbody>
                        </table>

                                <!-- End of Booking Details Table -->
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top:20px;">
                        <div class="col-md-12">
                            <div class="ab_text">
                                <div class="ab_text-title fl-wrap">
                                    <h3>Your All Farm Booking Details</h3>
                                    <span class="section-separator fl-sec-sep"></span>
                                </div> 
                                <!-- Booking Details Table -->
                                <table border="1" cellspacing="0" cellpadding="10">
                                <thead>
                                    <tr>
                                        <th>Property Name</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Person</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($data)) {
                                        foreach ($data as $row) {
                                            if ($row['status'] != 'canceled') { ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                                                    <td><?php echo htmlspecialchars($startDate); ?></td>
                                                    <td><?php echo htmlspecialchars($row['end_date'] == '0000-00-00' ? $row['start_date'] : $row['end_date']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['start_time']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['end_time']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['person']); ?></td>
                                                </tr>
                                            <?php }
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No booking records found.</td></tr>";
                                    } ?>
                            </tbody>
                        </table>

                                <!-- End of Booking Details Table -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="modal" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelModalLabel">Cancel Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="cancelForm">
                    <div class="form-group">
                        <label for="cancelReason" style="text-align: left;display: block;">Reason for cancellation:</label>
                        <textarea class="form-control" id="cancelReason" rows="3" required></textarea>
                    </div>
                    <input type="hidden" id="bookingId" name="booking_id" value="">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" style="padding: 10px 20px;" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" style="padding: 10px 20px;" class="btn btn-danger" id="confirmCancelBtn">Cancel Booking</button>
            </div>
        </div>
    </div>
</div>
<?php 
// Include footer file
include('footer.php'); 
?>

<!-- Scripts and Styling -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
<!-- <script src="assets/js/jquery.min.js"></script> -->
<script src="assets/js/plugins.js"></script>
<script src="assets/js/scripts.js"></script>
<script>
    $(document).ready(function(){
    $('.cancel-btn').click(function(){
        var bookingId = $(this).data('id');
        $('#bookingId').val(bookingId); // Add this line back if you need it
        $('#cancelModal').modal('show');
    });

    $('#confirmCancelBtn').click(function(){
        var bookingId = $('#bookingId').val();
        var reason = $('#cancelReason').val().trim();
        if (!reason) {
            alert("Please provide a cancellation reason.");
            return;
        }
        $.ajax({
            url: 'cancel_booking.php',
            method: 'POST',
            data: {
                booking_id: bookingId,
                reason: reason
            },
            success: function(response){
                $('#cancelModal').modal('hide');
                alert("Booking canceled successfully.");
                location.reload();
            },
            error: function(xhr, status, error){
                console.log("Error:", error);
                alert("There was an error cancelling the booking. Please try again.");
            }
        });
    });
});
</script>

<style>
    /* Styling the table for better presentation */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    .modal-backdrop{
        z-index:1 !important;
    }

    .modal .btn-danger {
    background-color: #ff4747;
    border-color: #ff4747;
    }

    .modal-header {
        background-color: #f5f5f5;
        border-bottom: 1px solid #e5e5e5;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #f1f1f1;
    }
</style>
</body>
</html>
