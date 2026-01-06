<?php 
include('database.php');
include('header.php');
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
                <h2><span>Contact Us</span></h2>
                <span class="section-separator"></span>
                <div class="breadcrumbs fl-wrap"><a href="index.html">Home</a><a href="javascript:void(0)">Pages</a><span>Contact Us</span></div>
            </div>
        </div>
        <div class="header-sec-link">
            <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a> 
        </div> 
    </section> 
    <!--Inner Heading End-->  
       
                <section   id="sec1" data-scrollax-parent="true">
                    <div class="container">
                        <!--about-wrap -->
                        <div class="about-wrap">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="ab_text-title fl-wrap">
                                        <h3>Get in Touch</h3>
                                        <span class="section-separator fl-sec-sep"></span>
                                    </div>
                                    <!--box-widget-item -->                                       
                                    <div class="box-widget-item fl-wrap block_box">
                                        <div class="box-widget">
                                            <div class="box-widget-content bwc-nopad">
                                                <div class="list-author-widget-contacts list-item-widget-contacts bwc-padside">
                                                    <ul class="no-list-style">
                                                        <li><span><i class="fal fa-map-marker"></i> Address :</span> <a href="#singleMap" class="custom-scroll-link">Farmhousestay Hub, 50 Tirupati soc, Part 2, Surat, Gujarat 395013</a></li>
                                                        <li><span><i class="fal fa-phone"></i> Phone :</span> <a href="tel:+91 96383 83991">+91 96383 83991</a></li>
                                                        <li><span><i class="fal fa-envelope"></i> Mail :</span><span class="__cf_email__" style="color: grey;">farmstayhub21@gmail.com</span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="list-widget-social bottom-bcw-box  fl-wrap">
                                                    <ul class="no-list-style">
                                                        <li><a href="https://www.facebook.com/holliday.farmhouse/" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href="https://www.instagram.com/holiday_farmhouse/" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                                        <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                                        <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                                        <li><a href="#https://www.youtube.com/@holidayfarmhouse" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--box-widget-item end -->                                           
                                </div>
                                <div class="col-md-8">
                                    <div class="ab_text">
                                        <div class="ab_text-title fl-wrap">
                                            <h3>Drop us a line</h3>
                                            <span class="section-separator fl-sec-sep"></span>
                                        </div> 
                                        <div id="contact-form">
                                            <div id="message"></div>
                                            <form  method="post" class="custom-form" name="contactform" >
                                                <style>
                                                    .error-text + p{
                                                        color: red !important;
                                                    }
                                                </style>
                                                 

                                                 
                                                <fieldset>
                                                    <label><i class="fal fa-user"></i></label>
                                                    <input required="" type="text" name="fname" id="fname" placeholder="Your Name *" value=""/>
                                                    <p class="error-text p-0 m-0"> 
                                                         
                                                    </p>
                                                    <div class="clearfix"></div>
                                                    <label><i class="fal fa-envelope"></i>  </label>
                                                    <input type="email" name="email" id="email" placeholder="Email Address" value=""/>
                                                    <p class="error-text p-0 m-0"> 
                                                         
                                                    </p>
                                                    <label><i class="fal fa-phone"></i>  </label>
                                                    <input required="" type="text" name="phone" id="phone" placeholder="Enter Phone*" value=""/>
                                                    <p class="error-text p-0 m-0"> 
                                                         
                                                    </p>
                                                    <textarea name="message"  id="comments" cols="40" rows="3" placeholder="Your Message"></textarea>
                                                    <p class="error-text p-0 m-0"> 
                                                         
                                                    </p>
                                                </fieldset>
                                                <button class="btn float-btn color2-bg" name="send" type="submit" value="send" id="submit">Send Message<i class="fal fa-paper-plane"></i></button>
                                            </form>
                                        </div>
                                        <!-- contact form  end--> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- about-wrap end  --> 
                    </div>
                </section>
                <section class="no-padding-section">
                    <div class="map-container" id="singleMap">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2886.928670619684!2d-79.37927828511964!3d43.649652360679184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d4cb3266955555%3A0x8711c2ef174f54b8!2s18%20King%20St%20E%20Suite%201400%2C%20Toronto%2C%20ON%20M5C%201C4%2C%20Canada!5e0!3m2!1sen!2sin!4v1647704176643!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> 
                    </div>
                </section> 
            </div>
        </div>
         
       

<?php 
include('footer.php');
?> 
         
    </div>
       
    <!-- Main JS -->
    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/main.html"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
    <style>
        /*captcha css*/
        iframe{width: 100%}
        canvas {
            display: none;
        } 
        .block {
            display: block;
        }
    </style>
</body>  
 

<!-- Mirrored from holidayfarmhouse.in/contact by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Aug 2024 06:17:35 GMT -->
</html>
