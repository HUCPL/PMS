@extends('frontend.layout.main')
@push('title')
<title>Property Management System</title>
@endpush
@section('main-content')
<div class="ltn__utilize-overlay"></div>
<div class="ltn__slider-area ltn__slider-3  section-bg-1">
    <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1">
        <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3-normal ltn__slide-item-3">
            <div class="ltn__slide-item-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 align-self-center">
                            <div class="slide-item-info">
                                <div class="slide-item-info-inner ltn__slide-animation">
                                    <div class="slide-video mb-50 d-none">
                                    <a class="ltn__video-icon-2 ltn__video-icon-2-border" href="#" data-rel="lightcase:myCollection">
                                      <i class="fa fa-play"></i>
                                    </a>
                                    </div>
                                    <h6 class="slide-sub-title white-color--- animated"><span><i class="fas fa-home"></i></span> </h6>
                                     Property Management System 
                                    <h1 class="slide-title animated">  Manage, Rent <span style="color:#d40101"> and  </span>Maintain <br> <span style="color:#d40101">    your property like never before.</span>    </h1>
                                    <div class="slide-brief animated">
                                        <p> Experience complete control over your property with our exclusive PMS.</p>
                                    </div>
                                    <div class="btn-wrapper animated">
                                        <a href="#" class="theme-btn-1 btn btn-effect-1">Make An Enquiry</a>
                                        <a class="ltn__video-play-btn bg-white" href="#" data-rel="lightcase">
                                            <i class="icon-play  ltn__secondary-color"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item-img">
                                <img src="{{ asset('fontassets/img/w44.png')}}" alt="#">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ltn__slide-item ltn__slide-item-2  ltn__slide-item-3-normal ltn__slide-item-3">
            <div class="ltn__slide-item-inner  text-right text-end">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 align-self-center">
                            <div class="slide-item-info">
                                <div class="slide-item-info-inner ltn__slide-animation">
                                    <h6 class="slide-sub-title white-color--- animated"><span><i class="fas fa-home"></i></span> Real Estate Agency</h6>
                                    <h1 class="slide-title animated ">The Right Place <br>of  <span style="color: #d40101;">House Finding</span></h1>
                                    <div class="slide-brief animated">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                    </div>
                                    <div class="btn-wrapper animated">
                                        <a href="#" class="theme-btn-1 btn btn-effect-1">OUR SERVICES</a>
                                        <a href="#" class="btn btn-transparent btn-effect-3">LEARN MORE</a>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item-img slide-img-left">
                                <img src="{{ asset('fontassets/img/pr2.png')}}" alt="#">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
<div class="ltn__about-us-area pt-120 pb-90 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="about-us-img-wrap about-img-left">
                    <img src="{{ asset('fontassets/img/pms33.png')}}" alt="About Us Image">                       
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="about-us-info-wrap">
                    <div class="section-title-area ltn__section-title-2--- mb-20">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color"> About us</h6>
                      <!--   <h1 class="section-title">The Leading Real Estate
                           <span style="color:#00c194"> Rental Marketplace.</span></h1>   -->   
                           <p>Prime Property Management is a leading property management system company in Mauritius. We offer innovative solutions for property owners and real estate professionals, including tenant screening, rent collection, maintenance coordination, and financial reporting. Our experienced team prioritizes transparency, integrity, and professionalism to ensure client satisfaction. Simplify property management with Prime Property Management.</p>                       
                    </div>
                     <ul class="ltn__list-item-half clearfix">
                        <li>
                            <i class="flaticon-home-2"></i>
                            Centralised Property Data
                        </li>

                         <li>
                            <i class="flaticon-secure"></i>
                           Maintenance Management


                        </li>
                        <li>
                            <i class="flaticon-mountain"></i>
                           Streamlined Property Operations

                        </li>
                        <li>
                            <i class="flaticon-heart"></i>
                           Efficient Tenant Management

                        </li>
                       
                    </ul> 
                   <!--  <div class="ltn__callout bg-overlay-theme-05  mt-30">
                        <p>"Enimad minim veniam quis nostrud exercitation <br>
                            llamco laboris. Lorem ipsum dolor sit amet" </p>
                    </div> -->
                    <div class="btn-wrapper animated">
                        <a href="#" class="theme-btn-1 btn btn-effect-1">  About us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ltn__category-area ltn__product-gutter section-bg-1--- pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2--- text-center">
                    <h1 class="section-title">Why<span>Choose Us</span></h1>
                    <h6 class="graypara">Unparalleled expertise, best in class services and commitment to ease your hassle.</h6>
                 </div>
            </div>
        </div>
        <div class="row ltn__category-slider-active--- slick-arrow-1 justify-content-center">
            <div class="col-md-4 col-sm-6 col-6">
                <div class="ltn__category-item ltn__category-item-5 ltn__category-item-5-2 text-center---">
                    <a href="#">
                        <span class="category-number">01</span>
                        <span class="category-title">Streamlined Operations:</span>
                        <span class="category-brief">
                          Optimize your property management processes with our seamless and efficient system, streamlining tasks and saving you time, so you can focus on growing your property portfolio.
                        </span>
                        <span class="category-btn d-none"><i class="flaticon-right-arrow"></i></span>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-6">
                <div class="ltn__category-item ltn__category-item-5 ltn__category-item-5-2 text-center---">
                    <a href="#">
                        <span class="category-number">02</span>
                        <span class="category-title">Enhanced Experience: </span>
                        <span class="category-brief">
                          Elevate tenant satisfaction with our user-friendly platform, offering convenient online rent payments, prompt communication, and simplified processes that enhance the overall tenant experience.
                        </span>
                        <span class="category-btn d-none"><i class="flaticon-right-arrow"></i></span>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-6">
                <div class="ltn__category-item ltn__category-item-5 ltn__category-item-5-2 text-center---">
                    <a href="#">
                        <span class="category-number">03</span>
                        <span class="category-title"> Scalable Solution:</span>
                        <span class="category-brief">
                          Our flexible and customizable platform grows with your property portfolio, adapting to your evolving needs. Scale effortlessly and customize the system to match your unique  requirements.
                        </span>
                        <span class="category-btn d-none"><i class="flaticon-right-arrow"></i></span>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-6">
                <div class="ltn__category-item ltn__category-item-5 ltn__category-item-5-2 text-center---">
                    <a href="#">
                        <span class="category-number">04</span>
                        <span class="category-title">Financial Control:</span>
                        <span class="category-brief">
                           Take charge of your property's financial health with our powerful tools, empowering you to effortlessly track income, expenses, and generate comprehensive reports for informed financial decision-making.
                        </span>
                        <span class="category-btn d-none"><i class="flaticon-right-arrow"></i></span>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-6">
                <div class="ltn__category-item ltn__category-item-5 ltn__category-item-5-2 text-center---">
                    <a href="#">
                        <span class="category-number">05</span>
                        <span class="category-title">Efficient Maintenance: </span>
                        <span class="category-brief">
                          Simplify maintenance management with our automated work order system, enabling quick task assignment, seamless communication, and timely resolution of maintenance requests, ensuring hassle-free property maintenance.
                        </span>
                        <span class="category-btn fd-none"><i class="flaticon-right-arrow"></i></span>
                    </a>
                </div>
            </div>               
            <div class="col-md-4 col-sm-6 col-6">
                <div class="ltn__category-item ltn__category-item-5 ltn__category-item-5-2 text-center---">
                    <a href="#">
                        <span class="category-number">06</span>
                        <span class="category-title">Actionable Insights:</span>
                        <span class="category-brief">
                         Gain valuable insights into your property's performance with our robust analytics, providing actionable data on occupancy rates, rental arrears, and maintenance costs, empowering you to make informed business decisions.
                        </span>
                        <span class="category-btn d-none"><i class="flaticon-right-arrow"></i></span>
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</div> 
<div class="ltn__product-slider-area ltn__product-gutter  pb-90 plr--7">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2--- text-center">
                    <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color"> Our Services</h6>
                    <h1 class="section-title"> We are the best  <span> At</span></h1>
                </div>
            </div>
        </div>
        <div class="row ltn__product-slider-item-four-active-full-width slick-arrow-1">
            <div class="col-lg-12">
                <div class="ltn__product-item ltn__product-item-4 text-center---">
                    <div class="product-img">
                        <a href="#"><img src="{{ asset('fontassets/img/product-3/1.jpg')}}" alt="#"></a>
                        <div class="product-badge">
                            <ul>
                                <li class="sale-badge bg-green"> Property On Boarding </li>
                            </ul>
                        </div>
                        <div class="product-img-location-gallery">
                            <div class="product-img-location">
                                <ul>
                                    <li>
                                        <a href="#"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                    </li>
                                </ul>
                            </div>
                          <!--   <div class="product-img-gallery">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fas fa-camera"></i> 4</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fas fa-film"></i> 2</a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-price">
                            <!-- <span>$34,900<label>/Month</label></span> -->
                        </div>
                        <h2 class="product-title"><a href="#"> Property On Boarding </a></h2>
                        <div class="product-description">
                            <p>Beautiful Huge 1 Family House In Heart Of <br>
                                Westbury. Newly Renovated With New Wood</p>
                        </div>
                        <!--<ul class="ltn__list-item-2 ltn__list-item-2-before">-->
                        <!--    <li><span>3 <i class="flaticon-bed"></i></span>-->
                        <!--        Bedrooms-->
                        <!--    </li>-->
                        <!--    <li><span>2 <i class="flaticon-clean"></i></span>-->
                        <!--        Bathrooms-->
                        <!--    </li>-->
                        <!--    <li><span>3450 <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>-->
                        <!--        square Ft-->
                        <!--    </li>-->
                        <!--</ul>-->
                    </div>
                  
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__product-item ltn__product-item-4 text-center---">
                    <div class="product-img">
                        <a href="#"><img src="{{ asset('fontassets/img/product-3/2.jpg')}}" alt="#"></a>
                        <div class="product-badge">
                            <ul>
                                <li class="sale-badge bg-green---"> Tenant Discovery</li>
                            </ul>
                        </div>
                        <div class="product-img-location-gallery">
                            <div class="product-img-location">
                                <ul>
                                    <li>
                                        <a href="#"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                    </li>
                                </ul>
                            </div>
                          <!--<div class="product-img-gallery">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fas fa-camera"></i> 4</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fas fa-film"></i> 2</a>
                                    </li>
                                </ul>
                            </div>-->
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-price">
                            <!-- <span>$34,900<label>/Month</label></span> -->
                        </div>
                        <h2 class="product-title">
                            <a href="#">Tenant Discovery</a></h2>
                        <div class="product-description">
                            <p>Beautiful Huge 1 Family House In Heart Of <br>
                                Westbury. Newly Renovated With New Wood</p>
                        </div>
                        <!--<ul class="ltn__list-item-2 ltn__list-item-2-before">-->
                        <!--    <li><span>3 <i class="flaticon-bed"></i></span>-->
                        <!--        Bedrooms-->
                        <!--    </li>-->
                        <!--    <li><span>2 <i class="flaticon-clean"></i></span>-->
                        <!--        Bathrooms-->
                        <!--    </li>-->
                        <!--    <li><span>3450 <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>-->
                        <!--        square Ft-->
                        <!--    </li>-->
                        <!--</ul>-->
                    </div>
                  
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__product-item ltn__product-item-4 text-center---">
                    <div class="product-img">
                        <a href="#"><img src="{{ asset('fontassets/img/product-3/3.jpg')}}" alt="#"></a>
                        <div class="product-badge">
                            <ul>
                                <li class="sale-badge bg-green"> Tenant On Board</li>
                            </ul>
                        </div>
                        <div class="product-img-location-gallery">
                            <div class="product-img-location">
                                <ul>
                                    <li>
                                        <a href="#"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-img-gallery">
                           <!--      <ul>
                                    <li>
                                        <a href="#"><i class="fas fa-camera"></i> 4</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fas fa-film"></i> 2</a>
                                    </li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-price">
                            <!-- <span>$34,900<label>/Month</label></span> -->
                        </div>
                        <h2 class="product-title"><a href="#">Tenant On Board </a></h2>
                        <div class="product-description">
                            <p>Beautiful Huge 1 Family House In Heart Of <br>
                                Westbury. Newly Renovated With New Wood</p>
                        </div>
                        <!--<ul class="ltn__list-item-2 ltn__list-item-2-before">-->
                        <!--    <li><span>3 <i class="flaticon-bed"></i></span>-->
                        <!--        Bedrooms-->
                        <!--    </li>-->
                        <!--    <li><span>2 <i class="flaticon-clean"></i></span>-->
                        <!--        Bathrooms-->
                        <!--    </li>-->
                        <!--    <li><span>3450 <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>-->
                        <!--        square Ft-->
                        <!--    </li>-->
                        <!--</ul>-->
                    </div>
                   
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__product-item ltn__product-item-4 text-center---">
                    <div class="product-img">
                        <a href="#"><img src="{{ asset('fontassets/img/product-3/4.jpg')}}" alt="#"></a>
                        <div class="product-badge">
                            <ul>
                                <li class="sale-badge bg-green"> Property Inspections and Reports</li>
                            </ul>
                        </div>
                        <div class="product-img-location-gallery">
                            <div class="product-img-location">
                                <ul>
                                    <li>
                                        <a href="#"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-img-gallery">
                            <!--     
                                 <ul>
                                    <li>
                                        <a href="#"><i class="fas fa-camera"></i> 4</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fas fa-film"></i> 2</a>
                                    </li>
                                </ul> 
                            -->
                            </div>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-price">
                            <!-- <span>$34,900<label>/Month</label></span> -->
                        </div>
                        <h2 class="product-title"><a href="#">Property Inspections  </a></h2>
                        <div class="product-description">
                            <p>Beautiful Huge 1 Family House In Heart Of <br>
                                Westbury. Newly Renovated With New Wood</p>
                        </div>
                        
                        <!--<ul class="ltn__list-item-2 ltn__list-item-2-before">-->
                        <!--    <li><span>3 <i class="flaticon-bed"></i></span>-->
                        <!--        Bedrooms-->
                        <!--    </li>-->
                        <!--    <li><span>2 <i class="flaticon-clean"></i></span>-->
                        <!--        Bathrooms-->
                        <!--    </li>-->
                        <!--    <li><span>3450 <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>-->
                        <!--        square Ft-->
                        <!--    </li>-->
                        <!--
                        </ul>-->
                    </div>                     
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__product-item ltn__product-item-4 text-center---">
                    <div class="product-img">
                        <a href="#"><img src="{{ asset('fontassets/img/product-3/5.jpg')}}" alt="#"></a>
                        <div class="product-badge">
                            <ul>
                                <li class="sale-badge bg-green"> Personalised Dashboard For Owner and Tenant</li>
                            </ul>
                        </div>
                        <div class="product-img-location-gallery">
                            <div class="product-img-location">
                                <ul>
                                    <li>
                                        <a href="#"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                    </li>
                                </ul>
                            </div>
                           <!--  <div class="product-img-gallery">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fas fa-camera"></i> 4</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fas fa-film"></i> 2</a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-price">
                            <!-- <span>$34,900<label>/Month</label></span> -->
                        </div>
                        <h2 class="product-title"><a href="#">Beautiful Flat in Manhattan </a></h2>
                        <div class="product-description">
                            <p>Beautiful Huge 1 Family House In Heart Of <br>
                                Westbury. Newly Renovated With New Wood</p>
                        </div>
                        <!--<ul class="ltn__list-item-2 ltn__list-item-2-before">-->
                        <!--    <li><span>3 <i class="flaticon-bed"></i></span>-->
                        <!--        Bedrooms-->
                        <!--    </li>-->
                        <!--    <li><span>2 <i class="flaticon-clean"></i></span>-->
                        <!--        Bathrooms-->
                        <!--    </li>-->
                        <!--    <li><span>3450 <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>-->
                        <!--        square Ft-->
                        <!--    </li>-->
                        <!--</ul>-->
                    </div>
                 
                </div>
            </div>        
        </div>
    </div>
</div>
<div class="ltn__counterup-area section-bg-1 pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-6 align-self-center">
                <div class="ltn__counterup-item text-color-white---">
                    <div class="counter-icon">
                        <i class="flaticon-select"></i>
                    </div>
                    <h1><span class="counter">7000</span><span class="counterUp-icon">+</span> </h1>
                    <h6>  Happy Customers</h6>
                </div>
            </div>
            <div class="col-md-3 col-6  align-self-center">
                <div class="ltn__counterup-item text-color-white---">
                    <div class="counter-icon">
                        <i class="flaticon-office"></i>
                    </div>
                    <h1><span class="counter">50</span><span class="counterUp-letter"></span><span class="counterUp-icon">+</span> </h1>
                    <h6> Customers from  Countries</h6>
                </div>
            </div>
            <div class="col-md-3 col-6  align-self-center">
                <div class="ltn__counterup-item text-color-white---">
                    <div class="counter-icon">
                        <i class="flaticon-excavator"></i>
                    </div>
                    <h1><span class="counter">1000</span><span class="counterUp-icon">+</span> </h1>
                    <h6> Properties </h6>
                </div>
            </div>
            <div class="col-md-3 col-6  align-self-center">
                <div class="ltn__counterup-item text-color-white---">
                    <div class="counter-icon">
                        <i class="flaticon-armchair"></i>
                    </div>
                    <h1><span class="counter">340</span><span class="counterUp-icon">+</span> </h1>
                    <h6> Service Partners</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ltn__video-popup-area ltn__video-popup-margin---">
    <div class="ltn__video-bg-img ltn__video-popup-height-600--- bg-overlay-black-30 bg-image bg-fixed ltn__animation-pulse1" data-bs-bg="img/bg/19.jpg">
        <a class="ltn__video-icon-2 ltn__video-icon-2-border---" href="#" data-rel="lightcase:myCollection">
            <i class="fa fa-play"></i>
        </a>
    </div>
</div>
<div class="ltn__category-area section-bg-1-- ltn__primary-bg before-bg-1 bg-image bg-overlay-theme-black-5--0 pt-115 pb-90 d-none" data-bs-bg="{{ asset('fontassets/img/bg/5.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2 text-center">
                    <h1 class="section-title white-color">Top Categories</h1>
                </div>
            </div>
        </div>
        <div class="row ltn__category-slider-active slick-arrow-1">
            <div class="col-12">
                <div class="ltn__category-item ltn__category-item-4 text-center">
                    <div class="ltn__category-item-img">
                        <a href="#">
                            <i class="flaticon-car"></i>
                        </a>
                    </div>
                    <div class="ltn__category-item-name">
                        <h4><a href="#">Parking Space</a></h4>
                    </div>
                    <div class="ltn__category-item-btn">
                        <a href="#"><i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="ltn__category-item ltn__category-item-4 text-center">
                    <div class="ltn__category-item-img">
                        <a href="#">
                            <i class="flaticon-car"></i>
                        </a>
                    </div>
                    <div class="ltn__category-item-name">
                        <h4><a href="#">Parking Space</a></h4>
                    </div>
                    <div class="ltn__category-item-btn">
                        <a href="#"><i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="ltn__category-item ltn__category-item-4 text-center">
                    <div class="ltn__category-item-img">
                        <a href="#">
                            <i class="flaticon-car"></i>
                        </a>
                    </div>
                    <div class="ltn__category-item-name">
                        <h4><a href="#">Parking Space</a></h4>
                    </div>
                    <div class="ltn__category-item-btn">
                        <a href="#"><i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="ltn__category-item ltn__category-item-4 text-center">
                    <div class="ltn__category-item-img">
                        <a href="#">
                            <i class="flaticon-car"></i>
                        </a>
                    </div>
                    <div class="ltn__category-item-name">
                        <h4><a href="#">Parking Space</a></h4>
                    </div>
                    <div class="ltn__category-item-btn">
                        <a href="#"><i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="ltn__category-item ltn__category-item-4 text-center">
                    <div class="ltn__category-item-img">
                        <a href="#">
                            <i class="flaticon-car"></i>
                        </a>
                    </div>
                    <div class="ltn__category-item-name">
                        <h4><a href="#">Parking Space</a></h4>
                    </div>
                    <div class="ltn__category-item-btn">
                        <a href="#"><i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="ltn__category-item ltn__category-item-4 text-center">
                    <div class="ltn__category-item-img">
                        <a href="#">
                            <i class="flaticon-car"></i>
                        </a>
                    </div>
                    <div class="ltn__category-item-name">
                        <h4><a href="#">Parking Space</a></h4>
                    </div>
                    <div class="ltn__category-item-btn">
                        <a href="#"><i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ltn__testimonial-area section-bg-1--- bg-image-top pt-115 pb-70" data-bs-bg="img/bg/20.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2--- text-center">
                    <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Our Testimonial</h6>
                    <h1 class="section-title">Clients <span> Feedback </span></h1>
                </div>
            </div>
        </div>
        <div class="row ltn__testimonial-slider-2-active slick-arrow-1">
            <div class="col-lg-4">
                <div class="ltn__testimonial-item ltn__testimonial-item-7">
                    <div class="ltn__testimoni-info">
                        <p><i class="flaticon-left-quote-1"></i> 
                            Precious ipsum dolor sit amet
                            consectetur adipisicing elit, sed dos
                            mod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim ad min
                            veniam, quis nostrud Precious ips
                            um dolor sit amet, consecte</p>
                        <div class="ltn__testimoni-info-inner">
                            <div class="ltn__testimoni-img">
                                <img src="{{ asset('fontassets/img/testimonial/1.jpg')}}" alt="#">
                            </div>
                            <div class="ltn__testimoni-name-designation">
                                <h5>Jacob William</h5>
                                <label>Selling Agents</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ltn__testimonial-item ltn__testimonial-item-7">
                    <div class="ltn__testimoni-info">
                        <p><i class="flaticon-left-quote-1"></i> 
                            Precious ipsum dolor sit amet
                            consectetur adipisicing elit, sed dos
                            mod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim ad min
                            veniam, quis nostrud Precious ips
                            um dolor sit amet, consecte</p>
                        <div class="ltn__testimoni-info-inner">
                            <div class="ltn__testimoni-img">
                                <img src="{{ asset('fontassets/img/testimonial/2.jpg')}}" alt="#">
                            </div>
                            <div class="ltn__testimoni-name-designation">
                                <h5>Kelian Anderson</h5>
                                <label>Selling Agents</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ltn__testimonial-item ltn__testimonial-item-7">
                    <div class="ltn__testimoni-info">
                        <p><i class="flaticon-left-quote-1"></i> 
                            Precious ipsum dolor sit amet
                            consectetur adipisicing elit, sed dos
                            mod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim ad min
                            veniam, quis nostrud Precious ips
                            um dolor sit amet, consecte</p>
                        <div class="ltn__testimoni-info-inner">
                            <div class="ltn__testimoni-img">
                                <img src="{{ asset('fontassets/img/testimonial/3.jpg')}}" alt="#">
                            </div>
                            <div class="ltn__testimoni-name-designation">
                                <h5>Adam Joseph</h5>
                                <label>Selling Agents</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ltn__testimonial-item ltn__testimonial-item-7">
                    <div class="ltn__testimoni-info">
                        <p><i class="flaticon-left-quote-1"></i> 
                            Precious ipsum dolor sit amet
                            consectetur adipisicing elit, sed dos
                            mod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim ad min
                            veniam, quis nostrud Precious ips
                            um dolor sit amet, consecte</p>
                        <div class="ltn__testimoni-info-inner">
                            <div class="ltn__testimoni-img">
                                <img src="{{ asset('fontassets/img/testimonial/4.jpg')}}" alt="#">
                            </div>
                            <div class="ltn__testimoni-name-designation">
                                <h5>James Carter</h5>
                                <label>Selling Agents</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>             
        </div>
    </div>
</div>
<div class="ltn__brand-logo-area ltn__brand-logo-1 section-bg-1 pt-290 pb-110 plr--9 d-none">
    <div class="container-fluid">
        <div class="row ltn__brand-logo-active">
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="{{ asset('fontassets/img/brand-logo/1.png')}}" alt="Brand Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="{{ asset('fontassets/img/brand-logo/2.png')}}" alt="Brand Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="{{ asset('fontassets/img/brand-logo/3.png')}}" alt="Brand Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="{{ asset('fontassets/img/brand-logo/4.png')}}" alt="Brand Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="{{ asset('fontassets/img/brand-logo/5.png')}}" alt="Brand Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__brand-logo-item">
                    <img src="{{ asset('fontassets/img/brand-logo/3.png')}}" alt="Brand Logo">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ltn__blog-area pt-115--- pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2--- text-center">
                    <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">News & Blogs</h6>
                    <h1 class="section-title">Latest <span>News Feeds</span></h1>
                </div>
            </div>
        </div>
        <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
            <div class="col-lg-12">
                <div class="ltn__blog-item ltn__blog-item-3">
                    <div class="ltn__blog-img">
                        <a href="#"><img src="{{ asset('fontassets/img/blog/1.jpg')}}" alt="#"></a>
                    </div>
                    <div class="ltn__blog-brief">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-author">
                                    <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                </li>
                                <li class="ltn__blog-tags">
                                    <a href="#"><i class="fas fa-tags"></i>Decorate</a>
                                </li>
                            </ul>
                        </div>
                        <h3 class="ltn__blog-title"><a href="#">10 Brilliant Ways To Decorate Your Home</a></h3>
                        <div class="ltn__blog-meta-btn">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2021</li>
                                </ul>
                            </div>
                            <div class="ltn__blog-btn">
                                <a href="#">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__blog-item ltn__blog-item-3">
                    <div class="ltn__blog-img">
                        <a href="#"><img src="{{ asset('fontassets/img/blog/2.jpg')}}" alt="#"></a>
                    </div>
                    <div class="ltn__blog-brief">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-author">
                                    <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                </li>
                                <li class="ltn__blog-tags">
                                    <a href="#"><i class="fas fa-tags"></i>Interior</a>
                                </li>
                            </ul>
                        </div>
                        <h3 class="ltn__blog-title"><a href="#">The Most Inspiring Interior Design Of 2021</a></h3>
                        <div class="ltn__blog-meta-btn">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>July 23, 2021</li>
                                </ul>
                            </div>
                            <div class="ltn__blog-btn">
                                <a href="#">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__blog-item ltn__blog-item-3">
                    <div class="ltn__blog-img">
                        <a href="#"><img src="{{ asset('fontassets/img/blog/3.jpg')}}" alt="#"></a>
                    </div>
                    <div class="ltn__blog-brief">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-author">
                                    <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                </li>
                                <li class="ltn__blog-tags">
                                    <a href="#"><i class="fas fa-tags"></i>Estate</a>
                                </li>
                            </ul>
                        </div>
                        <h3 class="ltn__blog-title"><a href="#">Recent Commercial Real Estate Transactions</a></h3>
                        <div class="ltn__blog-meta-btn">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>May 22, 2021</li>
                                </ul>
                            </div>
                            <div class="ltn__blog-btn">
                                <a href="#">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__blog-item ltn__blog-item-3">
                    <div class="ltn__blog-img">
                        <a href="#"><img src="{{ asset('fontassets/img/blog/4.jpg')}}" alt="#"></a>
                    </div>
                    <div class="ltn__blog-brief">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-author">
                                    <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                </li>
                                <li class="ltn__blog-tags">
                                    <a href="#"><i class="fas fa-tags"></i>Room</a>
                                </li>
                            </ul>
                        </div>
                        <h3 class="ltn__blog-title"><a href="#">Renovating a Living Room? Experts Share Their Secrets</a></h3>
                        <div class="ltn__blog-meta-btn">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2021</li>
                                </ul>
                            </div>
                            <div class="ltn__blog-btn">
                                <a href="#">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ltn__blog-item ltn__blog-item-3">
                    <div class="ltn__blog-img">
                        <a href="#"><img src="img/blog/5.jpg" alt="#"></a>
                    </div>
                    <div class="ltn__blog-brief">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-author">
                                    <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                </li>
                                <li class="ltn__blog-tags">
                                    <a href="#"><i class="fas fa-tags"></i>Trends</a>
                                </li>
                            </ul>
                        </div>
                        <h3 class="ltn__blog-title"><a href="#">7 home trends that will shape your house in 2021</a></h3>
                        <div class="ltn__blog-meta-btn">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2021</li>
                                </ul>
                            </div>
                            <div class="ltn__blog-btn">
                                <a href="#">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>           
        </div>
    </div>
</div>
<div class="ltn__call-to-action-area call-to-action-6 before-bg-bottom" data-bs-bg="img/1.jpg--">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="call-to-action-inner call-to-action-inner-6 ltn__secondary-bg position-relative text-center---">
                    <div class="coll-to-info text-color-white">
                        <h1>Discover a Seamless <br>Property Management Experience</h1>
                        <!-- <p>We can help you realize your dream of a new home</p> -->
                    </div>
                    <div class="btn-wrapper">
                        <a class="btn btn-effect-3 btn-white" href="#"> Contact Us <i class="icon-next"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection