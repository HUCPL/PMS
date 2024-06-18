@extends('rentalys.layout.main')
@push('title')
    <title>Rentalys|HomePage</title>
@endpush
@section('main-content')
<!--=====================================-->
<!--=   Main Banner     Start           =-->
<!--=====================================-->

<section class="main-banner-wrap1" style="background: #0e2e50;">
      <span class="banner-shape1">
        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 1000 100" preserveaspectratio="none">
          <path class="banner-shpape-fill"
                d="M500,97C126.7,96.3,0.8,19.8,0,0v100l1000,0V1C1000,19.4,873.3,97.8,500,97z">
          </path>
        </svg>
      </span>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="main-banner-box1">
                    <div class="listing-category-list wow fadeInUp" data-wow-delay=".6s">
                        <div class="search-radio">
                            <h1 class="item-title wow fadeInUp" data-wow-delay=".4s">Find the perfect place to Live
                                with your family
                            </h1>
                            <p> Find exclusive Genius rewards in every corner of the world! </p>
                        </div>
                    </div>

                    <div class="banner-search-wrap">
                        <div class="rld-main-search">
                            <form method="get" class="row" action="https://rentalys.hucpl.com/rentalys/property_search.html">

<div class="col-sm-12">
    <div class="box">
        <div class="box-top">
            <div class="rld-single-input item">
                <input type="text" required id="location" name="location"
                       placeholder="Where are you going?">
                <div id="map"></div>
                                </div>

            <div class="rld-single-input item" id="checkindate">
                <input type="text" id="check_in_input_id"
                       placeholder="Check-in : Check-out" name="check_in_out"
                       style="color: #7f767c"/>
            </div>
            <div class="rld-single-select ml-22">
                <div class="dropdown-filter-1  item">
                                                  <span>
                                                    <h6 class="fileter_drop"
                                                        style=""><span id="adultsnumber">0</span> Adults <span
                                                                id="adult-childern">0</span> children </h6>
                                                  </span>
                </div>
            </div>
            <div class="item rt-filter-btn">
                <div class="dropdown-filter-2 item">
                                                     <span class="">
                                                         <i class="fas fa-sliders-h"></i>
                                                     </span>
                </div>

                <div class="filter-button-area">
                    <button class="filter-btn" id="filterbtn" type="submit">
                        <span>Search</span>
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- New Filter Dropdown -->
        <div class=" dropdown_2 explore__form-checkbox-list  full-filter">
            <div class="row w-50 ">
                <div class="col-lg-4 col-md-6 py-1 ">
                    <div class="form-group bed">
                        <label class="item-bedrooms">Bed Room</label>
                        <div class="input-group mb-3">
                            <button type="button" onclick="decreaseValue(this)"
                                    class="input-group-text">-
                            </button>
                            <input type="text"
                                   class="form-control number text-center"
                                   value="" placeholder="0" name="bedroom">
                            <button type="button" onclick="increaseValue(this)"
                                    class="input-group-text">+
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 py-1">
                    <div class="form-group bed">
                        <label class="item-bedrooms">Bathroom</label>
                        <div class="input-group mb-3">
                            <button type="button" onclick="decreaseValue(this)"
                                    class="input-group-text">-
                            </button>
                            <input type="text"
                                   class="form-control number text-center"
                                   value="" placeholder="0" name="bathroom">
                            <button type="button" onclick="increaseValue(this)"
                                    class="input-group-text">+
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 py-1">
                    <div class="form-group bed">
                        <label class="item-bedrooms">Kitchen</label>
                        <div class="input-group mb-3">
                            <button type="button" onclick="decreaseValue(this)"
                                    class="input-group-text">-
                            </button>
                            <input type="text"
                                   class="form-control number text-center"
                                   value="" placeholder="0" name="kitchen">
                            <button type="button" onclick="increaseValue(this)"
                                    class="input-group-text">+
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Adult child dropdown -->
        <div class="dropdown_1 explore__form-checkbox-list full-filter">
            <div class="row">
                <div class="col-lg-12 col-md-12 py-1 ">
                    <div class="form-group bed row">
                        <div class="col-xl-6">
                            <label class="item-bedrooms">Adult</label>
                        </div>
                        <div class="col-xl-6">
                            <div class="input-group mb-3">
                                <button type="button" id="adult_dec"
                                        onclick="decreaseValue(this)"
                                        class="input-group-text">-
                                </button>
                                <input type="text"
                                       class="form-control number text-center"
                                       value="" placeholder="0" name="adult"
                                       id="adult">
                                <button type="button" id="adult_inc"
                                        onclick="increaseValue(this)"
                                        class="input-group-text">+
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 py-1 ">
                    <div class="form-group bed row">
                        <div class="col-xl-6">
                            <label class="item-bedrooms">Child</label>
                        </div>
                        <div class="col-xl-6">
                            <div class="input-group mb-3">
                                <button type="button" id="child_dec"
                                        onclick="decreaseValue(this)"
                                        class="input-group-text">-
                                </button>
                                <input type="text" readonly
                                       class="form-control text-center number"
                                       value="0"
                                       id="child"
                                       name="child_num">
                                <button type="button" id="child_inc"
                                        onclick="increaseValue(this)"
                                        class="input-group-text">+
                                </button>
                            </div>
                                                        </div>
                    </div>
                </div>
                <div id="child_age_group" class="row mb-3">
                                        </div>
            </div>
        </div>
    </div>
        </div>
    </form>                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="location-wrap1">

    <div class="container">
        <div class="row">
            <div class="item-heading-left">
                <span class="section-subtitle">Top Offers</span>
                <h5 class="section-title">Promotions, Deals and Special Offers for You</h5>
            </div>
            <div class="col-md-12 col-12">
                <div id="testimonial-slider" class="owl-carousel">
                                                <div class="testimonial"
                             style='background:url("assets/images/1.jpg")'>
                            <h5 class="ee"> The great getaway, your way</h5>
                            <p class="description">
                                                                    Save at least 15% on stays worldwide, from relaxing retreats to off-the-grid adventures
                                                                </p>
                            <div class="heading-button" style="text-align: left;margin: 0px;">
                                <a target="_blank" href="http://localhost:8086/rentalys/vinay_update_code/16/property-details.html" class="heading-btn item-btn-2">Explore
                                    More</a>
                            </div>
                        </div>
                                                <div class="testimonial"
                             style='background:url("assets/images/2.jpg")'>
                            <h5 class="ee"> Take your longest vacation yet</h5>
                            <p class="description">
                                                                    Browse properties offering long-term stays, many at reduced monthly rates.
                                                                </p>
                            <div class="heading-button" style="text-align: left;margin: 0px;">
                                <a target="_blank" href="http://localhost:8086/rentalys/vinay_update_code/16/property-details.html" class="heading-btn item-btn-2">Explore
                                    More</a>
                            </div>
                        </div>
                                                <div class="testimonial"
                             style='background:url("assets/images/3.jpg")'>
                            <h5 class="ee"> Fly away to your dream vacation</h5>
                            <p class="description">
                                                                    Get inspired – compare and book flights with flexibility
                                <br><br>                                </p>
                            <div class="heading-button" style="text-align: left;margin: 0px;">
                                <a target="_blank" href="http://localhost:8086/rentalys/vinay_update_code/16/property-details.html" class="heading-btn item-btn-2">Explore
                                    More</a>
                            </div>
                        </div>
                                        </div>
            </div>
        </div>
    </div>
</section>

<section class="location-wrap1 pb-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-7">
                <div class="item-heading-left">
                    <span class="section-subtitle">Top Areas</span>
                    <h5 class="section-title">Trending destination</h5>
                </div>
            </div>
            <div class="col-lg-6 col-md-5">
                <!--<div class="heading-button">-->
                <!--    <a href="#" class="heading-btn item-btn-2">Explore More</a>-->
                <!--</div>-->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="row">


                    
                                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="location-box3 wow zoomIn" data-wow-delay=".2s">
                                    <div class="item-img">
                                        <a href="#"><img src="{{ url('/assets/images/1.jpg') }}"
                                                    alt="location"></a>
                                    </div>
                                    <div class="item-content">
                                        <div class="content-body">
                                            <div class="item-title">
                                                <h3>
                                                    <a href="#">Preskil island</a>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="location-button">
                                            <a href="#" class="location-btn"><i class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    
                                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="location-box3 wow zoomIn" data-wow-delay=".2s">
                                    <div class="item-img">
                                        <a href="#"><img
                                                    src="{{ url('/assets/images/1.jpg') }}"
                                                    alt="location"></a>
                                    </div>
                                    <div class="item-content">
                                        <div class="content-body">
                                            <div class="item-title">
                                                <h3>
                                                    <a href="#">Astroea Beach Hotel</a>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="location-button">
                                            <a href="#" class="location-btn"><i class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    
                                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="location-box3 wow zoomIn" data-wow-delay=".2s">
                                    <div class="item-img">
                                        <a href="#"><img
                                                    src="{{ url('/assets/images/1.jpg') }}"
                                                    alt="location"></a>
                                    </div>
                                    <div class="item-content">
                                        <div class="content-body">
                                            <div class="item-title">
                                                <h3>
                                                    <a href="#">Coco Villa</a>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="location-button">
                                            <a href="#" class="location-btn"><i class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    
                                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="location-box3 wow zoomIn" data-wow-delay=".2s">
                                    <div class="item-img">
                                        <a href="#"><img
                                                    src="{{ url('/assets/images/1.jpg') }}"
                                                    alt="location"></a>
                                    </div>
                                    <div class="item-content">
                                        <div class="content-body">
                                            <div class="item-title">
                                                <h3>
                                                    <a href="#">Baywatch Apartment</a>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="location-button">
                                            <a href="#" class="location-btn"><i class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    
                                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="location-box3 wow zoomIn" data-wow-delay=".2s">
                                    <div class="item-img">
                                        <a href="#"><img
                                                    src="{{ url('/assets/images/1.jpg') }}"
                                                    alt="location"></a>
                                    </div>
                                    <div class="item-content">
                                        <div class="content-body">
                                            <div class="item-title">
                                                <h3>
                                                    <a href="3">Dinarobin Beachcomber Golf Resort &amp; Spa</a>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="location-button">
                                            <a href="#" class="location-btn"><i class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    

                    <div class="col-lg-12">
                        <div class="item-heading-left">
                            <span class="section-subtitle"> Explore Mauritius</span>
                            <h5 class="section-title"> These popular destinations have a lot to offer</h5>
                        </div>
                    </div>


                    <div class="slider wow fadeInUp">
                        <button class="slider__control prev"><i class="fas fa-chevron-left"></i></button>
                        <button class="slider__control next"><i class="fas fa-chevron-right"></i></button>
                        <div class="slider__container" data-multislide="false" data-step="4">
                            
                            
                            
                            
                            

                                                                <div class="slider__item">
                                    <a href="2/propertyList.html">
                                        <img src="{{ url('/assets/images/4.webp') }}"
                                             alt="" width="100%" height="200px">
                                        <p> Hotels<br>
                                            7 properties
                                        </p>
                                    </a>
                                </div>
                                                                <div class="slider__item">
                                    <a href="3/propertyList.html">
                                        <img src="{{ url('/assets/images/5.jpeg') }}"
                                             alt="" width="100%" height="200px">
                                        <p> Apartments<br>
                                            5 properties
                                        </p>
                                    </a>
                                </div>
                                                                <div class="slider__item">
                                    <a href="4/propertyList.html">
                                        <img src="{{ url('/assets/images/4.webp') }}"
                                             alt="" width="100%" height="200px">
                                        <p> Resorst<br>
                                            3 properties
                                        </p>
                                    </a>
                                </div>
                                                                <div class="slider__item">
                                    <a href="5/propertyList.html">
                                        <img src="{{ url('/assets/images/5.jpeg') }}"
                                             alt="" width="100%" height="200px">
                                        <p> Villas<br>
                                            4 properties
                                        </p>
                                    </a>
                                </div>
                                                                <div class="slider__item">
                                    <a href="6/propertyList.html">
                                        <img src="{{ url('/assets/images/5.jpeg') }}"
                                             alt="" width="100%" height="200px">
                                        <p> Cabins<br>
                                            3 properties
                                        </p>
                                    </a>
                                </div>
                                                                <div class="slider__item">
                                    <a href="7/propertyList.html">
                                        <img src="{{ url('/assets/images/4.webp') }}"
                                             alt="" width="100%" height="200px">
                                        <p> Cottages<br>
                                            3 properties
                                        </p>
                                    </a>
                                </div>
                                                                <div class="slider__item">
                                    <a href="8/propertyList.html">
                                        <img src="{{ url('/assets/images/5.jpeg') }}"
                                             alt="" width="100%" height="200px">
                                        <p> Glamping<br>
                                            3 properties
                                        </p>
                                    </a>
                                </div>
                                                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="feature-wrap2 rt-feature-slide-wrap" style=" margin-top: 20px;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="item-heading-left">
                    <span class="section-subtitle"> Explore Mauritius</span>
                    <h5 class="section-title" style="color: #0e2e50;">Stay at our top unique properties</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="slide-container swiper p-0 m-auto mt-4">
    <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">
        <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="{{ asset('assets/images/6.jpg') }}"
                                 alt="" class="card-img">
                        </div>
                    </div>
                    <div class="card-content">
                        <h2 class="name">
                            <a style="color: #002f50"
                               href="1/property-details.html">
                                Preskil island
                            </a>
                        </h2>
                        <p class="description">Mauritius
                            , Port Louis</p>
                        <div class="rating-content">
                            <span class="price"> $ 12000.00<span><i> /</i> Month</span></span>
                        </div>
                    </div>
                </div>
                                                        <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="{{ asset('assets/images/7.jpg') }}"
                                 alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h2 class="name">
                            <a style="color: #002f50"
                               href="#">
                                Astroea Beach Hotel
                            </a>
                        </h2>
                        <p class="description">Mauritius
                            , Grand Port</p>
                        <div class="rating-content">
                            <span class="price"> $ 10000.00<span><i> /</i> Month</span></span>
                        </div>
                    </div>
                </div>
                                                        <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="{{ asset('assets/images/8.jpg') }}"
                                 alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h2 class="name">
                            <a style="color: #002f50"
                               href="3/property-details.html">
                                Coco Villa
                            </a>
                        </h2>
                        <p class="description">Mauritius
                            , Floreal</p>
                        <div class="rating-content">
                            <span class="price"> $ 15000.00<span><i> /</i> Month</span></span>
                        </div>
                    </div>
                </div>
                                                        <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="{{ asset('assets/images/6.jpg') }}"
                                 alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h2 class="name">
                            <a style="color: #002f50"
                               href="#">
                                Baywatch Apartment
                            </a>
                        </h2>
                        <p class="description">Mauritius
                            , Floreal</p>
                        <div class="rating-content">
                            <span class="price"> $ 12000.00<span><i> /</i> Month</span></span>
                        </div>
                    </div>
                </div>
                                                        <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="{{ asset('assets/images/8.jpg') }}"
                                 alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h2 class="name">
                            <a style="color: #002f50"
                               href="#">
                                Dinarobin Beachcomber ...
                            </a>
                        </h2>
                        <p class="description">Mauritius
                            , Pamplempousses</p>
                        <div class="rating-content">
                            <span class="price"> $ 18000.00<span><i> /</i> Month</span></span>
                        </div>
                    </div>
                </div>
                                                        <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="{{ asset('assets/images/6.jpg') }}"
                                 alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h2 class="name">
                            <a style="color: #002f50"
                               href="6/property-details.html">
                                Villas Vetiver
                            </a>
                        </h2>
                        <p class="description">Mauritius
                            , Plaines Wilhelm</p>
                        <div class="rating-content">
                            <span class="price"> $ 14000.00<span><i> /</i> Month</span></span>
                        </div>
                    </div>
                </div>
                                                        <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="{{ asset('assets/images/7.jpg') }}"
                                 alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h2 class="name">
                            <a style="color: #002f50"
                               href="#">
                                Otenic, Eco Tent Exper...
                            </a>
                        </h2>
                        <p class="description">Mauritius
                            , Pamplempousses</p>
                        <div class="rating-content">
                            <span class="price"> $ 15000.00<span><i> /</i> Month</span></span>
                        </div>
                    </div>
                </div>
                                                        <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="{{ asset('assets/images/7.jpg') }}"
                                 alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h2 class="name">
                            <a style="color: #002f50"
                               href="#">
                                Bubble Lodge Ile aux C...
                            </a>
                        </h2>
                        <p class="description">Mauritius
                            , Pamplempousses</p>
                        <div class="rating-content">
                            <span class="price"> $ 18000.00<span><i> /</i> Month</span></span>
                        </div>
                    </div>
                </div>
                                                        <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="{{ asset('assets/images/8.jpg') }}"
                                 alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h2 class="name">
                            <a style="color: #002f50"
                               href="#">
                                Latitude
                            </a>
                        </h2>
                        <p class="description">Mauritius
                            , Moka</p>
                        <div class="rating-content">
                            <span class="price"> $ 78000.00<span><i> /</i> Month</span></span>
                        </div>
                    </div>
                </div>
                                                        <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="{{ asset('assets/images/6.jpg') }}"
                                 alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h2 class="name">
                            <a style="color: #002f50"
                               href="#">
                                Marguery Villas
                            </a>
                        </h2>
                        <p class="description">Mauritius
                            , Rodrigues</p>
                        <div class="rating-content">
                            <span class="price"> $ 6800.00<span><i> /</i> Month</span></span>
                        </div>
                    </div>
                </div>
                                                        <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="{{ asset('assets/images/7.jpg') }}"
                                 alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h2 class="name">
                            <a style="color: #002f50"
                               href="#">
                                Shandrani Beachcomber ...
                            </a>
                        </h2>
                        <p class="description">Mauritius
                            , Riviere du Rempart</p>
                        <div class="rating-content">
                            <span class="price"> $ 8900.00<span><i> /</i> Month</span></span>
                        </div>
                    </div>
                </div>
                                                        <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="{{ asset('assets/images/8.jpg') }}"
                                 alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h2 class="name">
                            <a style="color: #002f50"
                               href="#">
                                Pearle Beach Resort
                            </a>
                        </h2>
                        <p class="description">Mauritius
                            , Rodrigues</p>
                        <div class="rating-content">
                            <span class="price"> $ 8000.00<span><i> /</i> Month</span></span>
                        </div>
                    </div>
                </div>
                                                        <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="{{ asset('assets/images/6.jpg') }}"
                                 alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h2 class="name">
                            <a style="color: #002f50"
                               href="#">
                                Luxe Exotica Apartment...
                            </a>
                        </h2>
                        <p class="description">Mauritius
                            , Moka</p>
                        <div class="rating-content">
                            <span class="price"> $ 9000.00<span><i> /</i> Month</span></span>
                        </div>
                    </div>
                </div>
                                                        <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="{{ asset('assets/images/7.jpg') }}"
                                 alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h2 class="name">
                            <a style="color: #002f50"
                               href="#">
                                Be Cosy Apart Hotel
                            </a>
                        </h2>
                        <p class="description">Mauritius
                            , Savanne</p>
                        <div class="rating-content">
                            <span class="price"> $ 12000.00<span><i> /</i> Month</span></span>
                        </div>
                    </div>
                </div>
                                                        <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="{{ asset('assets/images/8.jpg') }}"
                                 alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h2 class="name">
                            <a style="color: #002f50"
                               href="#">
                                Blue Apartments
                            </a>
                        </h2>
                        <p class="description">Mauritius
                            , Flacq</p>
                        <div class="rating-content">
                            <span class="price"> $ 12000.00<span><i> /</i> Month</span></span>
                        </div>
                    </div>
                </div>
                                                        <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="{{ asset('assets/images/6.jpg') }}"
                                 alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h2 class="name">
                            <a style="color: #002f50"
                               href="#">
                                Laguna Beach Hotel
                            </a>
                        </h2>
                        <p class="description">Mauritius
                            , Grand Port</p>
                        <div class="rating-content">
                            <span class="price"> $ 17000.00<span><i> /</i> Month</span></span>
                        </div>
                    </div>
                </div>
                                                        <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="{{ asset('assets/images/7.jpg') }}"
                                 alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h2 class="name">
                            <a style="color: #002f50"
                               href="#">
                                Green Cottage Chamarel
                            </a>
                        </h2>
                        <p class="description">Mauritius
                            , Port Louis</p>
                        <div class="rating-content">
                            <span class="price"> $ 22000.00<span><i> /</i> Month</span></span>
                        </div>
                    </div>
                </div>
                                                        <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="{{ asset('assets/images/8.jpg') }}"
                                 alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h2 class="name">
                            <a style="color: #002f50"
                               href="#">
                                L&#039;Oiseau de L&#039;Ocean To...
                            </a>
                        </h2>
                        <p class="description">Mauritius
                            , Rose Hill</p>
                        <div class="rating-content">
                            <span class="price"> $ 17000.00<span><i> /</i> Month</span></span>
                        </div>
                    </div>
                </div>
                                                        <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="{{ asset('assets/images/6.jpg') }}"
                                 alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h2 class="name">
                            <a style="color: #002f50"
                               href="#">
                                Domaine de Grand Baie
                            </a>
                        </h2>
                        <p class="description">Mauritius
                            , Savanne</p>
                        <div class="rating-content">
                            <span class="price"> $ 19000.00<span><i> /</i> Month</span></span>
                        </div>
                    </div>
                </div>
                                                        <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="{{ asset('assets/images/7.jpg') }}"
                                 alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h2 class="name">
                            <a style="color: #002f50"
                               href="#">
                                Bubble Lodge Bois Ché...
                            </a>
                        </h2>
                        <p class="description">Mauritius
                            , Moka</p>
                        <div class="rating-content">
                            <span class="price"> $ 15000.00<span><i> /</i> Month</span></span>
                        </div>
                    </div>
                </div>
                                                        <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="{{ asset('assets/images/8.jpg') }}"
                                 alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h2 class="name">
                            <a style="color: #002f50"
                               href="#">
                                Veranda Tamarin Hotel
                            </a>
                        </h2>
                        <p class="description">Mauritius
                            , Rodrigues</p>
                        <div class="rating-content">
                            <span class="price"> $ 16000.00<span><i> /</i> Month</span></span>
                        </div>
                    </div>
                </div>
                                                        <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="{{ asset('assets/images/6.jpg') }}"
                                 alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h2 class="name">
                            <a style="color: #002f50"
                               href="#">
                                Be Cosy Apart Hotel
                            </a>
                        </h2>
                        <p class="description">Mauritius
                            , Floreal</p>
                        <div class="rating-content">
                            <span class="price"> $ 18000.00<span><i> /</i> Month</span></span>
                        </div>
                    </div>
                </div>
                                                        <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="{{ asset('assets/images/7.jpg') }}"
                                 alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h2 class="name">
                            <a style="color: #002f50"
                               href="#">
                                Kanchan Property
                            </a>
                        </h2>
                        <p class="description">Mauritius
                            , Floreal</p>
                        <div class="rating-content">
                            <span class="price"> $ 20000.00<span><i> /</i> Month</span></span>
                        </div>
                    </div>
                </div>
                        </div>
    </div>

    <div class="swiper-button-next swiper-navBtn"></div>
    <div class="swiper-button-prev swiper-navBtn"></div>
    <div class="swiper-pagination"></div>
</div>

<!--=====================================-->
<!--=   Testimonial     Start           =-->
<!--=====================================-->


<section class="progress-bar-wrap1 counter-appear">
    <div class="shape-img1 wow fadeInLeft" data-wow-delay=".4s"
         style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
        <img src="{{ asset('ren/frontend/img/figure/counter-bg-2.png') }}" alt="progress">
    </div>
    <div class="container">
        <div class="item-heading-bar">
            <h1 class="item-title">Real Estate by Rentlays Property</h1>
            <p>In 2022 things look like this percentage</p>
        </div>
    </div>
</section>

<section class="testimonial-wrap3">
    <div class="container">

        <div class="item-heading-bar">

            <h5 class="item-title" style="color: #0e2e50;">Stay at our top unique properties</h5>
        </div>

        <div class="testimonial-layout3 swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                            <div class="item-img">
                                <img src="{{ url('/assets/images/6.jpg') }}" width="74"
                                     height="74" alt="slider">
                            </div>
                            <div class="testimonial-content">
                                <h3 class="item-title">Ghis</h3>
                                <div class="item-subtitle">United Arab Emirates</div>
                                <div class="rtin-content">
                                  <span>“10
                                        This is the best accomodation so far, comparing with others at the island.
                                        Excellent location, comfortable, , and most important thing is hospitality.
                                        The beautiful blue beach is just few steps away.
                                        Bravo to Hans, Jefferson and all the others.
                                        To Vicky, chef, goes golden medal!
                                        Prestige!”
                                  </span>
                                    <div class="item-icon">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                <div class="swiper-slide">
                            <div class="item-img">
                                <img src="{{ url('/assets/images/7.jpg') }}" width="74"
                                     height="74" alt="slider">
                            </div>
                            <div class="testimonial-content">
                                <h3 class="item-title">Hery</h3>
                                <div class="item-subtitle">United States of America</div>
                                <div class="rtin-content">
                                  <span>“It is 15mn from airport.The location is 50m from the beach which was great.The staff is amazing and breakfast is enough.It is really good value for money.I am planning to come back there again next week.I really recommand it for a relax stay in Mauritius Island.”
                                  </span>
                                    <div class="item-icon">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                
            </div>
            <!-- navigation buttons -->
            <div class="swiper-button-prev testimonial-btn"></div>
            <div class="swiper-button-next testimonial-btn"></div>
        </div>
    </div>
    <!-- Slider main container -->
</section>


<section class="blog-wrap1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-8">
                <div class="item-heading-left">
                    <span class="section-subtitle">What's New Trending</span>
                    <h2 class="section-title">Latest Blog & Posts</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-4">
                <div class="heading-button">
                    <a href="blog.html" class="heading-btn">See All Blogs</a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
                                                        <div class="col-lg-4 col-md-6">
                        <div class="blog-box1 wow fadeInUp" data-wow-delay=".4s">
                            <div class="item-img">
                                <a href="#">
                                    <img src="{{ url('/assets/images/7.jpg') }}" alt="blog"
                                         width="520" height="350">
                                </a>
                            </div>
                            <div class="thumbnail-date">
                                <div class="popup-date">
                                    <span class="day">
                                        16
                                    </span>
                                    <span class="month">May</span>
                                </div>
                            </div>
                            <div class="item-content">
                                <div class="entry-meta">
                                    <ul>
                                        <li>
                                            <a href="#">Explora Prestige</a>
                                        </li>
                                        <li>
                                            <a href="#">5 min</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="heading-title">
                                    <h3>
                                        <a href="#">Rue des corbiqueaux</a>
                                    </h3>
                                </div>
                                <div class="blog-button">
                                    <a href="#l" class="item-btn">Read More <i
                                                class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-6">
                        <div class="blog-box1 wow fadeInUp" data-wow-delay=".4s">
                            <div class="item-img">
                                <a href="#">
                                    <img src="{{ url('/assets/images/8.jpg') }}" alt="blog"
                                         width="520" height="350">
                                </a>
                            </div>
                            <div class="thumbnail-date">
                                <div class="popup-date">
                                    <span class="day">
                                        16
                                    </span>
                                    <span class="month">May</span>
                                </div>
                            </div>
                            <div class="item-content">
                                <div class="entry-meta">
                                    <ul>
                                        <li>
                                            <a href="#">Royal Road, Grand baie</a>
                                        </li>
                                        <li>
                                            <a href="#">5 min</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="heading-title">
                                    <h3>
                                        <a href="#">Domaine de Grand Baie</a>
                                    </h3>
                                </div>
                                <div class="blog-button">
                                    <a href="#" class="item-btn">Read More <i
                                                class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-6">
                        <div class="blog-box1 wow fadeInUp" data-wow-delay=".4s">
                            <div class="item-img">
                                <a href="#">
                                    <img src="{{ url('/assets/images/6.jpg') }}" alt="blog"
                                         width="520" height="350">
                                </a>
                            </div>
                            <div class="thumbnail-date">
                                <div class="popup-date">
                                    <span class="day">
                                        16
                                    </span>
                                    <span class="month">May</span>
                                </div>
                            </div>
                            <div class="item-content">
                                <div class="entry-meta">
                                    <ul>
                                        <li>
                                            <a href="#">Choisy road, Poste de flacq</a>
                                        </li>
                                        <li>
                                            <a href="#">5 min</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="heading-title">
                                    <h3>
                                        <a href="#">Constance Prince Maurice</a>
                                    </h3>
                                </div>
                                <div class="blog-button">
                                    <a href="blog-details/4.html" class="item-btn">Read More <i
                                                class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                                            </div>
    </div>
</section>


<!--=====================================-->
<!--=   Banner     Start                =-->
<!--=====================================-->
<section class="banner-collection1 motion-effects-wrap" data-wow-delay=".2s">
    <div class="shape-img1">
        <img src="{{ asset('ren/frontend/img/svg/video-bg-2.svg')}}" alt="figure" height="149" width="230">
    </div>
    <div class="shape-img2">
        <img src="{{ asset('ren/frontend/img/svg/video-bg-2.svg')}}" alt="figure" height="149" width="230">
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-7">
                <div class="banner-box1">
                    <div class="item-img">
                        <img src="{{ asset('ren/frontend/img/banner/banner1.png') }}" alt="banner" height="252"
                             width="169" class="img-bg-space">
                        <div class="motion-effects3">
                            <img src="{{ asset('ren/frontend/img/figure/shape3.png')}}" alt="shape" height="113"
                                 width="113">
                        </div>
                        <div class="motion-effects4">
                            <img src="{{ asset('ren/frontend/img/figure/shape4.png')}}" alt="shape" height="157"
                                 width="154">
                        </div>
                        <div class="motion-effects5">
                            <img src="{{ asset('ren/frontend/img/figure/shape5.png')}}" alt="shape" height="91"
                                 width="102">
                        </div>
                    </div>
                    <div class="item-content">
                        <h2 class="heading-title">Become a Real Estate Agent</h2>
                        <p>We only work with the best companies around the globe to survey</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="banner-button">
                    <a href="#" class="banner-btn">Register Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection