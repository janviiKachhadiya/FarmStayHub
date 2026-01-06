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
                <h2><span>Farm houses</span></h2>
                <span class="section-separator"></span>
                <div class="breadcrumbs fl-wrap"><a href="index.html">Home</a><a href="javascript:void(0)">Pages</a><span>Farm houses</span></div>
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
                                                    <div class="listing-filters gallery-filters fl-wrap">
                                <a href="javascript:void(0)" class="gallery-filter  gallery-filter-active" data-filter="*">All Property</a>
                                <a href="javascript:void(0)" class="gallery-filter" data-filter=".farmhouse">Farmhouse </a> 
                                <a href="javascript:void(0)" class="gallery-filter" data-filter=".villa">Villa</a> 
                                <a href="javascript:void(0)" class="gallery-filter" data-filter=".private">Private Farm</a>
                            </div>
                                                    <div class="grid-item-holder gallery-items fl-wrap">
                                    <?php 
                                        $sql_property = "SELECT * FROM property WHERE status = 1";
                                        $data = $obj->query($sql_property,2);
                                        foreach($data as $row) {
                                                $categoryClass = strtolower($row['category']); 
                                    ?>
                               
                                    <div class="gallery-item <?php echo $categoryClass; ?>">
                                        <!-- listing-item  -->
                                        <div class="listing-item">
                                            <article class="geodir-category-listing fl-wrap">
                                                <div class="geodir-category-img">
                                                    <div class="geodir-js-favorite_btn"><i class="fal fa-heart"></i><span>Save</span></div>
                                                    <a href="book_farm.php?id=<?php echo $row['id']; ?>" class="geodir-category-img-wrap fl-wrap">
                                                        <img src="../owner/upload/<?php echo htmlspecialchars($row['image']); ?>" alt="Avadh Kimberly" style="height: 250px !important;object-fit: cover"  /> 
                                                    </a>  
                                                    <div class="geodir-category-opt">
                                                        <div class="listing-rating-count-wrap">
                                                            <div class="review-score">4.8</div>
                                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                            <br>
                                                            <div class="reviews-count">80 reviews</div>
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
                                <?php } ?>
                        </div> 
                    </div>
                </section>
                <!-- product page section end -->
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
 

<!-- Mirrored from holidayfarmhouse.in/property by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Aug 2024 06:17:27 GMT -->
</html>
