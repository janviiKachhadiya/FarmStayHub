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
                <h2><span>Gallery</span></h2>
                <span class="section-separator"></span>
                <div class="breadcrumbs fl-wrap"><a href="index.html">Home</a><a href="javascript:void(0)">Pages</a><span>Gallery</span></div>
            </div>
        </div>
        <div class="header-sec-link">
            <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a> 
        </div> 
    </section> 
    <!--Inner Heading End-->  
                    <!-- gallery-style-two -->
                <section class="gray-bg small-padding no-top-padding-sec" id="sec1">
                    <div class="container"  style="margin-top:50px">
                        <div class="section-title pt-3 mt-5">
                            <h2><span>Latest Gallery</span></h2>
                            <div class="section-subtitle">Checkout our Latest Gallery</div>
                            <span class="section-separator"></span> 
                        </div>  
                        <div class="fl-wrap">
                            <div class="row"> 
                                <div class="col-md-12"> 
                                    <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic">
                                        <!-- shop-item  -->
                                        <?php 
                                            $sql_property = "SELECT * FROM property WHERE status = 1";
                                            $data = $obj->query($sql_property,2);
                                            foreach($data as $row) {
                                        ?>
                                                <div class="shop-item">
                                                    <div class="shop-item-media">
                                                        <a href="../owner/upload/<?php echo htmlspecialchars($row['image']); ?>" target="_blank">
                                                            <img src="../owner/upload/<?php echo htmlspecialchars($row['image']); ?>" alt="">
                                                            <div class="overlay"></div>
                                                        </a> 
                                                        <div class="add-tocart color-bg"><a class="text-FFF" href="../owner/upload/<?php echo htmlspecialchars($row['image']); ?>" target="_blank">Full Screen View</a></div>
                                                        <div class="geodir-category-opt">
                                                            <div class="listing-rating-count-wrap">
                                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="4"></div>
                                                                <br>
                                                                <div class="reviews-count">14 reviews</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="shop-item_title">
                                                        <h4><a href="javascript:void(0)" class="text-transform-capitalize"><?php echo $row['name']; ?></a></h4>  
                                                    </div>
                                                </div>
                                                 <!-- shop-item end -->    
                                        <?php } ?>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </section> 
                <!-- gallery-style-two end --> 
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
</body>  
 

<!-- Mirrored from holidayfarmhouse.in/gallery by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Aug 2024 06:17:35 GMT -->
</html>
