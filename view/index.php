<?php
include('database.php');
include('header.php');
?>
        <!-- header end-->
        <!-- wrapper-->
        <div id="wrapper">
            <!-- content-->
            <div class="content">
                <!--Hero slider-->
                <section class="hero-section"   data-scrollax-parent="true">
    <div class="bg-tabs-wrap">
        <div class="bg-parallax-wrap" data-scrollax="properties: { translateY: '200px' }">
            <!--ms-container-->
            <div class="slideshow-container" data-scrollax="properties: { translateY: '300px' }" >
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                        $sql_slider = "select * from slider where status=1";
                        $data1 = $obj->query($sql_slider,2);
                        foreach($data1 as $row) {
                        ?>
                                 <!--ms_item-->
                                <div class="swiper-slide">
                                    <div class="ms-item_fs fl-wrap full-height">
                                        <div class="bg" data-bg="../admin/upload/<?php echo htmlspecialchars($row['image']); ?>"></div>
                                        <div class="overlay op7"></div>
                                    </div>
                                </div>
                                <?php } ?>    
                                <!--ms_item end--> 
                        </div>
                </div>
            </div>
            <!--ms-container end-->
        </div>
    </div>
    <div class="container small-container">
        <div class="intro-item fl-wrap"> 
            <div class="bubbles">
                <h1>Explore Best Farmhouse</h1>
            </div>
            <h3>Find some of the best tips from around the city from our partners and friends.</h3>
        </div>
        <!-- main-search-input-tabs-->
        <div class="main-search-input-tabs  tabs-act fl-wrap">                   
            <div class="tabs-container fl-wrap"> 
                <div class="tab">
                    <div id="tab-inpt4" class="tab-content first-tab">
                        <div class="main-search-input-wrap fl-wrap">
                            <div class="main-search-input fl-wrap">
                                <form method="get" action="find_property.php">
                                    <div class="main-search-input-item location autocomplete-container">
                                        <select name="city" data-placeholder="City" class="chosen-select no-radius" >
                                            <option value="">Select City</option> 
                                            <?php 
                                                $sql_city = "select * from city";
                                                $data2 = $obj->query($sql_city,2);
                                                foreach ($data2 as $row) {
                                            ?>
                                            <option value="<?php echo $row['city'];?>"><?php echo $row['city']; ?></option>  
                                            <?php } ?>
                                        </select>
                                    </div> 
                                    <div class="main-search-input-item location autocomplete-container">
                                        <select name="category" data-placeholder="Category" class="chosen-select no-radius" >
                                            <option value="">Select Category</option> 
                                            <?php 
                                                $sql_category = "select * from category";
                                                $data2 = $obj->query($sql_category,2);
                                                foreach ($data2 as $row) {
                                            ?>
                                            <option value="<?php echo $row['category'];?>"><?php echo $row['category']; ?></option>  
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="main-search-input-item">
                                        <label><i class="fal fa-user-friends"></i></label>
                                        <input type="number" placeholder="Persons"/>
                                    </div> 
                                    <button type="submit" value="send" name="search" class="main-search-button color2-bg">Search <i class="far fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>                               
            </div>
        </div>
        <!-- main-search-input-tabs end-->
        <div class="hero-categories fl-wrap">
            <h4 class="hero-categories_title font-18">Just looking around ? Use quick search by category :</h4>
            <ul class="no-list-style">
                <li class="bg-rgba-black-04 p-15 border-radius-10 font-15" style="width: 130px;"><a href="farmhouse.php"><i class="fal fa-home text-FFF"></i><span>Farmhouse</span></a></li> 
                <li class="bg-rgba-black-04 p-15 border-radius-10 font-15" style="width: 130px;"><a href="villa.php"><i class="fal fa-city text-FFF"></i><span>Villa</span></a></li> 
                <li class="bg-rgba-black-04 p-15 border-radius-10 font-15 mt-xs-10" style="width: 130px;"><a href="private.php"><i class="fal fa-car-building text-FFF"></i><span>Private Farm</span></a></li> 
            </ul>
        </div> 
    </div>
    <div class="header-sec-link">
        <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a> 
    </div>
</section>  

                <!--  section  -->
                <!--section end-->

                <!--section end-->  
                <section id="sec1">
                    <div class="container-fluid">
                        <div class="section-title">
                            <h2><span>Most Popular Farmhouse</span></h2>
                            <div class="section-subtitle">Best Listings</div>
                            <span class="section-separator"></span> 
                        </div>
                        <!--                        <div class="listing-filters gallery-filters fl-wrap">
                                                    <a href="javascript:void(0)" class="gallery-filter  gallery-filter-active" data-filter="*">All Property</a>
                                                    <a href="javascript:void(0)" class="gallery-filter" data-filter=".farmhouse">Farmhouse </a>
                                                    <a href="javascript:void(0)" class="gallery-filter" data-filter=".villa">Villa</a> 
                                                    <a href="javascript:void(0)" class="gallery-filter" data-filter=".weekend">Private Farm</a>
                                                </div>-->
                        <div class="grid-item-holder gallery-items fl-wrap">
                                    <?php 
                                    $sql_property = "SELECT * FROM property WHERE status = 1 LIMIT 8";
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
                        <a href="property.php" class="btn dec_btn text-FFF color2-bg">Check Out All Listing<i class="fal fa-arrow-alt-right"></i></a>
                    </div>
                </section>
                <!--section end-->   
                <section class="parallax-section small-par" data-scrollax-parent="true">
                    <div class="bg par-elem "  data-bg="../assest/images/bg/111.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
                    <div class="overlay  op7"></div>
                    <div class="container">
                        <div class=" single-facts single-facts_2 fl-wrap">
                            <!-- inline-facts -->
                            <div class="inline-facts-wrap">
                                <div class="inline-facts">
                                    <div class="milestone-counter">
                                        <div class="stats animaper">
                                            <div class="num" data-content="0" data-num="1254">1254</div>
                                        </div>
                                    </div>
                                    <h6>New Visiters Every Week</h6>
                                </div>
                            </div>
                            <!-- inline-facts end -->
                            <!-- inline-facts  -->
                            <div class="inline-facts-wrap">
                                <div class="inline-facts">
                                    <div class="milestone-counter">
                                        <div class="stats animaper">
                                            <div class="num" data-content="0" data-num="12168">12168</div>
                                        </div>
                                    </div>
                                    <h6>Happy customers every year</h6>
                                </div>
                            </div>
                            <!-- inline-facts end -->
                            <!-- inline-facts  -->
                            <div class="inline-facts-wrap">
                                <div class="inline-facts">
                                    <div class="milestone-counter">
                                        <div class="stats animaper">
                                            <div class="num" data-content="0" data-num="2172">2172</div>
                                        </div>
                                    </div>
                                    <h6>Won Amazing Awards</h6>
                                </div>
                            </div>
                            <!-- inline-facts end -->
                            <!-- inline-facts  -->
                            <div class="inline-facts-wrap">
                                <div class="inline-facts">
                                    <div class="milestone-counter">
                                        <div class="stats animaper">
                                            <div class="num" data-content="0" data-num="732">732</div>
                                        </div>
                                    </div>
                                    <h6>New Listing Every Week</h6>
                                </div>
                            </div>
                            <!-- inline-facts end -->
                        </div>
                    </div>
                </section>
                <!--section  -->
                <section class="pb-0">
                    <div class="container">
                        <div class="section-title">
                            <h2> Testimonials</h2>
                            <div class="section-subtitle">Clients Reviews</div>
                            <span class="section-separator"></span>
                            <p>A testimonial is effectively a review or recommendation from a client, letting other people know how your property or services benefitted them.</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="testimonilas-carousel-wrap fl-wrap">
                        <div class="listing-carousel-button listing-carousel-button-next"><i class="fas fa-caret-right"></i></div>
                        <div class="listing-carousel-button listing-carousel-button-prev"><i class="fas fa-caret-left"></i></div>
                        <div class="testimonilas-carousel">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                                                                <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="admin_asset/review/1674812943.png" alt=" Vaibhav Akabari" title=" Vaibhav Akabari" > </div>
                                                    <div class="testimonilas-text fl-wrap">
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <p>"Amazing service with good quality and Best Farm House for Rent in surat."</p> 
                                                        <div class="testimonilas-avatar fl-wrap">
                                                            <h3> Vaibhav Akabari</h3>
                                                            <h4> 
                                                                27-Feb-2022                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="admin_asset/review/1674813482.png" alt="Savan Nagani" title="Savan Nagani" > </div>
                                                    <div class="testimonilas-text fl-wrap">
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <p>"This site help me to find best farm house."</p> 
                                                        <div class="testimonilas-avatar fl-wrap">
                                                            <h3>Savan Nagani</h3>
                                                            <h4> 
                                                                01-Jan-2022                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item end--> 
                                                                                        <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="admin_asset/review/1674813552.png" alt="pratik ramani" title="pratik ramani" > </div>
                                                    <div class="testimonilas-text fl-wrap">
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <p>"Excellent farm and good service ???????? …"</p> 
                                                        <div class="testimonilas-avatar fl-wrap">
                                                            <h3>pratik ramani</h3>
                                                            <h4> 
                                                                10-May-2022                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item end--> 
                                                                                        <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="admin_asset/review/1674813686.png" alt="Kaushik Savani" title="Kaushik Savani" > </div>
                                                    <div class="testimonilas-text fl-wrap">
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <p>"Very fantastic service and property for weekend home."</p> 
                                                        <div class="testimonilas-avatar fl-wrap">
                                                            <h3>Kaushik Savani</h3>
                                                            <h4> 
                                                                20-Jan-2023                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item end-->
                                                                                        <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="admin_asset/review/1674814166.png" alt="Dhruvi Patel" title="Dhruvi Patel" > </div>
                                                    <div class="testimonilas-text fl-wrap">
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <p>"Amazing experience.! Going to book again from holidayfarmhouse for sure ! executives are very sweet and co-operating.??"</p> 
                                                        <div class="testimonilas-avatar fl-wrap">
                                                            <h3>Dhruvi Patel</h3>
                                                            <h4> 
                                                                12-Dec-2022                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item end--> 
                                                                                        <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="admin_asset/review/1674814247.png" alt="Rutvik Patel" title="Rutvik Patel" > </div>
                                                    <div class="testimonilas-text fl-wrap">
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <p>"I had Great experience with holiday farm ! The staff is very friendly and they give all the information you may require about the Farms !"</p> 
                                                        <div class="testimonilas-avatar fl-wrap">
                                                            <h3>Rutvik Patel</h3>
                                                            <h4> 
                                                                02-Jun-2022                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item end--> 
                                                                                        <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="admin_asset/review/1674814351.png" alt="Krunal Singh" title="Krunal Singh" > </div>
                                                    <div class="testimonilas-text fl-wrap">
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <p>"I really appreciate the support of the holiday farm as they have provide me the best assistance ,i will highly recommended to book Farmhouse from holiday farmhouse app"</p> 
                                                        <div class="testimonilas-avatar fl-wrap">
                                                            <h3>Krunal Singh</h3>
                                                            <h4> 
                                                                11-Nov-2022                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item end--> 
                                                                                        <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="admin_asset/review/1674814448.png" alt="Krunal Singh" title="Krunal Singh" > </div>
                                                    <div class="testimonilas-text fl-wrap">
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <p>"I really appreciate the support of the holiday farm as they have provide me the best assistance ,i will highly recommended to book Farmhouse from holiday farmhouse app"</p> 
                                                        <div class="testimonilas-avatar fl-wrap">
                                                            <h3>Krunal Singh</h3>
                                                            <h4> 
                                                                20-Apr-2022                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item end--> 
                                                                                        <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="admin_asset/review/1674814584.png" alt="Deepesh Jain" title="Deepesh Jain" > </div>
                                                    <div class="testimonilas-text fl-wrap">
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <p>"Thank You holiday farmhouse for the lovely experience at sontorini farm.am going to visit again soon......."</p> 
                                                        <div class="testimonilas-avatar fl-wrap">
                                                            <h3>Deepesh Jain</h3>
                                                            <h4> 
                                                                10-Aug-2022                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item end--> 
                                                                                        <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="admin_asset/review/1674814835.png" alt="Lily Patra" title="Lily Patra" > </div>
                                                    <div class="testimonilas-text fl-wrap">
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <p>"i love the support of holiday farmhouse team really appreciate providing  very good Farm , i recommend it strongly."</p> 
                                                        <div class="testimonilas-avatar fl-wrap">
                                                            <h3>Lily Patra</h3>
                                                            <h4> 
                                                                11-Dec-2022                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item end--> 
                                                                                        <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="admin_asset/review/1674814922.png" alt="Arbind Patra" title="Arbind Patra" > </div>
                                                    <div class="testimonilas-text fl-wrap">
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <p>"I like the assistance of the holiday farmhouse they really provide very good farm , i ll recommend to book farm from holiday farmhouse app"</p> 
                                                        <div class="testimonilas-avatar fl-wrap">
                                                            <h3>Arbind Patra</h3>
                                                            <h4> 
                                                                06-Jan-2023                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item end-->                     
                                            <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="admin_asset/review/1674815176.png" alt="Tarun Wadhwa" title="Tarun Wadhwa" > </div>
                                                    <div class="testimonilas-text fl-wrap">
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <p>"It's very affordable and amazing with their services. Having a huge area and with too many facilities make it sense to visit again and I am doing it. And it's one of the rarest company I have seen with this ideas because as we see normal farmhouse booking with agents or brokers but the company like this it's very unique. Too much satisfied with their services and facilities."</p> 
                                                        <div class="testimonilas-avatar fl-wrap">
                                                            <h3>Tarun Wadhwa</h3>
                                                            <h4> 
                                                                10-Jan-2023                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item end--> 
                                                                                        <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="admin_asset/review/1674815252.png" alt="shah charlin" title="shah charlin" > </div>
                                                    <div class="testimonilas-text fl-wrap">
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <p>"Its realy very good experience of holiday farmhouse as they are realy very great coordinate at the place as well and staff is also very good... Thanx  holiday farmhouse for making my small trip enjoyable..."</p> 
                                                        <div class="testimonilas-avatar fl-wrap">
                                                            <h3>shah charlin</h3>
                                                            <h4> 
                                                                11-Jan-2023                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item end--> 
                                                                                        <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="admin_asset/review/1674815316.png" alt="Jainex Rathod" title="Jainex Rathod" > </div>
                                                    <div class="testimonilas-text fl-wrap">
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <p>"Best place for book your farm. Good supportive staff and will give you best farm. Book your farm from here to get awesome farm. Recommended it."</p> 
                                                        <div class="testimonilas-avatar fl-wrap">
                                                            <h3>Jainex Rathod</h3>
                                                            <h4> 
                                                                12-Jan-2023                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item end--> 
                                                                                        <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="admin_asset/review/1674815431.png" alt="Happy Dantkodiya " title="Happy Dantkodiya " > </div>
                                                    <div class="testimonilas-text fl-wrap">
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <p>"My experience with holiday farmhouse  was brilliant it was amazing experience of my life u really loved it  and "thank you" farm house for making my holidays wonderful."</p> 
                                                        <div class="testimonilas-avatar fl-wrap">
                                                            <h3>Happy Dantkodiya </h3>
                                                            <h4> 
                                                                13-Jan-2023                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item end-->   
                                                                                        <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="admin_asset/review/1674815595.png" alt="Nirbhay Naik" title="Nirbhay Naik" > </div>
                                                    <div class="testimonilas-text fl-wrap">
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <p>"best Farmhouse On Rent in surat  i spent my holidays near by surat location they provide best farmhouse villa with swimming pool with reasonable price"</p> 
                                                        <div class="testimonilas-avatar fl-wrap">
                                                            <h3>Nirbhay Naik</h3>
                                                            <h4> 
                                                                30-Nov-2022                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item end--> 
                                                                                        <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="admin_asset/review/1674815831.png" alt="Yusra Memon" title="Yusra Memon" > </div>
                                                    <div class="testimonilas-text fl-wrap">
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <p>"The best place for jewellery in Gujarat without doubt! Absolutely love the collection! So many options to choose from and the quality is top notch. They have very unique designs with good value for money. The whole team is extremely helpful and professional and will answer to any queries you have ??"</p> 
                                                        <div class="testimonilas-avatar fl-wrap">
                                                            <h3>Yusra Memon</h3>
                                                            <h4> 
                                                                24-Oct-2022                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item end--> 
                                                                                        <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="admin_asset/review/1674815955.png" alt="laxman suryavanshi" title="laxman suryavanshi" > </div>
                                                    <div class="testimonilas-text fl-wrap">
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <p>"we booked 02 bhk villa for 01 days. we are total 08 family members. we got best luxury villa & excellent service in our budget. Thanks to Farm on Rent."</p> 
                                                        <div class="testimonilas-avatar fl-wrap">
                                                            <h3>laxman suryavanshi</h3>
                                                            <h4> 
                                                                22-Sep-2022                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item end--> 
                                                                                        <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="admin_asset/review/1674816028.png" alt="Ankit Gheewala" title="Ankit Gheewala" > </div>
                                                    <div class="testimonilas-text fl-wrap">
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <p>"Superb Villa. Excellent Service. We got best villa in our budget. Thanks to holiday farmhouse."</p> 
                                                        <div class="testimonilas-avatar fl-wrap">
                                                            <h3>Ankit Gheewala</h3>
                                                            <h4> 
                                                                02-Feb-2022                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item end--> 
                                                                                        <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="admin_asset/review/1674816297.png" alt="Gops Kakani" title="Gops Kakani" > </div>
                                                    <div class="testimonilas-text fl-wrap">
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <p>"Every one enjoyed ..house was good all arrangements perfect ,beach beautiful , awesome ambience.food tasty... hospitality pleasent .."</p> 
                                                        <div class="testimonilas-avatar fl-wrap">
                                                            <h3>Gops Kakani</h3>
                                                            <h4> 
                                                                11-Jun-2022                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item end--> 
                                                                                        <!--testi-item-->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="admin_asset/review/1674816903.png" alt="huzefa zaif" title="huzefa zaif" > </div>
                                                    <div class="testimonilas-text fl-wrap">
                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                        <p>"Their farm house has beautiful ambiance and with excellent service, highly recommend for weekend family holidays."</p> 
                                                        <div class="testimonilas-avatar fl-wrap">
                                                            <h3>huzefa zaif</h3>
                                                            <h4> 
                                                                11-Dec-2022                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--testi-item end--> 
                                    </div>
                            </div>
                        </div>
                    </div><style>.testimonilas-carousel .swiper-slide{
                        padding:30px 0px 0px !important;
                    }</style>
                </section>
                <!--section end-->                 
            </div>
            <!--content end-->
        </div>
        <!-- wrapper end-->

         
<?php 
include('footer.php');
?>
           
    </div> 
    <!-- Main end -->
    <!--=============== scripts  ===============-->
       
    <!-- Main JS -->
    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/main.html"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </style>
</body>  

<!-- Mirrored from holidayfarmhouse.in/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Aug 2024 06:16:26 GMT -->
</html>
