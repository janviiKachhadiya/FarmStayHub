<?php
include('database.php');
include('header.php');
$sql = "SELECT * FROM property WHERE category = 'Private Farm'";
$data = $obj->query($sql, 2);
?>
        <div id="wrapper">
            <!-- content-->
            <div class="content">
                  
    <!--Inner Heading Start--> 
    <section class="parallax-section single-par" data-scrollax-parent="true">
        <div class="bg par-elem"  data-bg="../assest/images/bg/111.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay op7"></div>
        <div class="container">
            <div class="section-title center-align big-title">
                <h2><span>Farm houses</span></h2>
                <span class="section-separator"></span>
                <div class="breadcrumbs fl-wrap"><a href="../index.html">Home</a><a href="javascript:void(0)">Pages</a><span>Farm houses</span></div>
            </div>
        </div>
        <div class="header-sec-link">
            <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a> 
        </div> 
    </section> 
    <!--Inner Heading End-->  
      
                <!-- product page section start -->
                <section>
                <div class="container big-container">
                        <div class="section-title">
                            <h2><span>Most Popular Farmhouse</span></h2>
                            <div class="section-subtitle">Best Listings</div>
                            <span class="section-separator"></span> 
                        </div>
                                                <div class="grid-item-holder gallery-items fl-wrap">
                                <?php
                                    foreach($data as $row) {
                                ?>
                                    <div class="gallery-item villa">
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
                                                            <div class="reviews-count">48 reviews</div>
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
                                                        <p class="font-16 mt-5"></p>
                                                        <!--<div class="row">-->
                                                        <!--    <div class="col-md-6"> -->
                                                        <!--        <div class="mt-10 addthis_inline_share_toolbox_5oew"></div>-->
                                                        <!--    </div>-->
                                                        <!--    <div class="col-md-6">  -->
                                                        <!--        <a href="https://wa.me/+919638383991" class="font-16 border-radius-3 display-inline-block border mt-10 p-5 pl-15 pr-15 bg-success text-FFF">Book Now</a> -->
                                                        <!--    </div>-->
                                                        <!--</div> -->
                                                    </div> 
                                                    <div class="geodir-category-text fl-wrap"> 
                                                        <div class="facilities-list fl-wrap">
                                                            <div class="facilities-list-title">Facilities : </div>
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
                    </div>
                </section>
                <!-- product page section end -->
            </div>
        </div>
         
       

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
                                    <li><span><i class="fal fa-envelope"></i> Mail :</span><a href="cdn-cgi/l/email-protection.html#dab2b5b6b3bebba3bcbba8b7b2b5afa9bfe8eae8ea9abdb7bbb3b6f4b9b5b7" target="_blank"><span class="__cf_email__" data-cfemail="85edeae9ece1e4fce3e4f7e8edeaf0f6e0b7b5b7b5c5e2e8e4ece9abe6eae8">[email&#160;protected]</span></a></li>
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
                                <li><a href="index.php"> Home </a></li>
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
                <div class="copyright"> ©2022 Holiday Farmhouse all rights reserved. Developed by - <a href='' target='_blank' class="text-FFF">FarmStay Hub</a></div> 
                <div class="subfooter-nav">
                    <ul class="no-list-style">
                        <li><a href="../terms.html">Terms & Conditions</a></li> 
                        <li><a href="../policy.html">Privacy & Policy</a></li>
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
       
    <!-- Main JS -->
    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/main.html"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>  
 

<!-- Mirrored from holidayfarmhouse.in/property/private by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Aug 2024 06:17:35 GMT -->
</html>
