@extends('rentalys.layout.main')
@push('title')
    <title>Rentalys|Properties</title>
@endpush
@section('main-content')
<style>
    .dropdown_new.explore__form-checkbox-list.full-filter.listcss.filter-block {
        position: relative;
        top: -15px;
        z-index: 2;
        width: 100%;
    }

    .dropdown_new.explore__form-checkbox-list.full-filter.filter-block {
        width: 20%;
    }

    .form-group.bed {
        font-size: 21px;
        position: relative;
        right: 42px;
        line-height: 11px;
    }

    .hig {
        height: 41px !important;
    }

    .listcss {
        padding: 20px 60px 0px 60px;
    }

    .explore__form-checkbox-list.full-filter {
        opacity: 0;
        z-index: 9;
        visibility: hidden;
        background: #fff;
        border-radius: 6px;
        padding: 8px 60px 0px 60px;
        box-shadow: 0 1px 10px 0 rgba(0, 0, 0, 0.2);
        width: auto !important;
    }

    @media screen and (min-device-width: 481px) and (max-device-width: 768px) {
        .dropdown_1.explore__form-checkbox-list.full-filter.listcss.filter-block {
            position: absolute;
            top: 470px;
            z-index: 2;
            width: 82%;
        }
    }

    .input-group {
        border-radius: 3px;
        background-color: #ffffff;
        border: 0px solid #e1e5ee !important;
        transition: 0.4s;
    }
</style>
<div class="breadcrumb-wrap breadcrumb-wrap-2">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="https://rentalys.hucpl.com/rentalys">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">All Listing</li>
            </ol>
        </nav>
    </div>
</div>
<!--=====================================-->
<!--=   Grid     Start                  =-->
<!--=====================================-->

<section class="grid-wrap3">
    <div class="container">
        <div class="row gutters-40">
            <div class="col-lg-4 widget-break-lg sidebar-widget">

                <div class="widget widget-advanced-search">
                    <h3 class="widget-subtitle">Advanced Search</h3>
                    <form method="get" action="#" class="map-forms map-form-style-2">

                        <input type="text" class="form-control item" id="location"
                               placeholder="Where are you going?" name="location">
                        <div id="map"></div>

                        <div class="row">
                            <!-- Adult  Child Select -->
                            <div class="col-lg-12 ">
                                <input type="readonly" name="adult_child_data" class="dropdown-filter-1 item"
                                       id="adult_child_data"
                                       readonly
                                       onclick="get_change_data('ad_ch')"
                                       style="border: 1px solid #E9E7E7;margin-top: 9px;width: 100%;"
                                       placeholder="0 Adult 0 Child"/>

                                <div class="dropdown_1 dropdown_new explore__form-checkbox-list full-filter listcss p-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row p-0">
                                                <label class="item-bedrooms">Adult</label>
                                                <div class="input-group">
                                                    <div class="item-bedrooms">
                                                        <button type="button" onclick="decreaseValue(this)"
                                                                class="col-2 float-start input-group-text">-
                                                        </button>

                                                        <input type="text" style="width: 65%"
                                                               class="col-8 float-start form-control hig number text-center"
                                                               placeholder="0 Adult"
                                                               id="adult"
                                                               name="adult">

                                                        <button type="button" onclick="increaseValue(this)"
                                                                class="input-group-text">+
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row p-0">
                                                <label class="item-bedrooms">Children</label>
                                                <div class="input-group">
                                                    <div class="item-bedrooms">
                                                        <button type="button" onclick="decreaseValue(this)"
                                                                class="col-2 float-start input-group-text">-
                                                        </button>

                                                        <input type="text" style="width: 65%"
                                                               class="col-8 float-start form-control hig number text-center"
                                                               placeholder="0 Child"
                                                               id="child"
                                                               name="child">

                                                        <button type="button" onclick="increaseValue(this)"
                                                                class="input-group-text">+
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Adult  Child Select -->

                            <!--  Bed Room Bathroom Kitchen  Select -->
                            <div class="col-lg-12 ">
                                <input type="text" id="input_bath_show" readonly name="input_bath_show"
                                       onclick="get_change_data('be_ba_ki')" class="dropdown-filter-2 item"
                                       style="border: 1px solid #E9E7E7;margin-top: 9px;width: 100%;"
                                       placeholder="0 Bed-Room 0 Bathroom 0Kitchen "/>

                                <div class="dropdown_2 dropdown_new explore__form-checkbox-list full-filter listcss p-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row p-0">
                                                <label class="item-bedrooms">Bed Room</label>
                                                <div class="input-group">
                                                    <div class="item-bedrooms">
                                                        <button type="button" onclick="decreaseValue(this)"
                                                                class="col-2 float-start input-group-text">-
                                                        </button>

                                                        <input type="text" style="width: 65%"
                                                               id="bedroom"
                                                               class="col-8 float-start form-control hig number text-center"
                                                               placeholder="0 Bed Room"
                                                               name="bedroom">

                                                        <button type="button" onclick="increaseValue(this)"
                                                                class="input-group-text">+
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row p-0">
                                                <label class="item-bedrooms">Bathroom</label>
                                                <div class="input-group">
                                                    <div class="item-bedrooms">
                                                        <button type="button" onclick="decreaseValue(this)"
                                                                class="col-2 float-start input-group-text">-
                                                        </button>

                                                        <input type="text" style="width: 65%"

                                                               id="bathroom"
                                                               class="col-8 float-start form-control hig number text-center"
                                                               placeholder="0 Bathroom"
                                                               name="bathroom">

                                                        <button type="button" onclick="increaseValue(this)"
                                                                class="input-group-text">+
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row p-0">
                                                <label class="item-bedrooms">Kitchen</label>
                                                <div class="input-group">
                                                    <div class="item-bedrooms">
                                                        <button type="button" onclick="decreaseValue(this)"
                                                                class="col-2 float-start input-group-text">-
                                                        </button>

                                                        <input type="text" style="width: 65%"
                                                               id="kitchen"
                                                               class="col-8 float-start form-control hig number text-center"
                                                               placeholder="0 Kitchen"
                                                               name="kitchen">

                                                        <button type="button" onclick="increaseValue(this)"
                                                                class="input-group-text">+
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  Bed Room Bathroom Kitchen  Select --> 
                        </div>

                        <div class="rld-main-search rld-main-search3">
                            <div class="filter-button">
                                <button type="submit" class="filter-btn1 search-btn">Search<i
                                            class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="widget widget-listing-box1">
                    <h3 class="widget-subtitle">Latest Listing</h3>
                                                                        
                                                        <div class="item-img">
                                <a target="_blank"
                                   href="24/property-details.html"><img
                                            src="{{ asset('assets/images/6.jpg') }}"
                                            alt="widget"
                                            width="540" height="360"></a>
                                <div class="item-category-box1">
                                    <div class="item-category">For Rent</div>
                                </div>
                            </div>
                            <div class="widget-content ">
                                <h4 class="item-title">
                                    <a target="_blank"
                                       href="#">Be Cosy Apart Hotel</a>
                                </h4>
                                <div class="location-area">
                                    <i class="flaticon-maps-and-flags"></i>
                                    ,
                                    Floreal,
                                    Mauritius
                                </div>
                                <div class="item-price">$ 18000.00
                                    <span>/mo</span></div>
                            </div>
                                                                            
                                                        <div class="widget-listing no-brd">
                                <div class="item-img">
                                    <a target="_blank"
                                       href="#">
                                        <img src="{{ asset('assets/images/7.jpg') }}"
                                             alt="widget" width="120" height="102">
                                    </a>
                                </div>
                                <div class="item-content">
                                    <h5 class="item-title">
                                        <a target="_blank"
                                           href="#">Otenic, Eco Tent Experience</a>
                                    </h5>
                                    <div class="location-area">
                                        <i class="flaticon-maps-and-flags"></i>Mauritius
                                    </div>
                                    <div class="item-price">$ 15000.00
                                        <span>/mo</span></div>
                                </div>
                            </div>
                                                                            
                                                        <div class="widget-listing no-brd">
                                <div class="item-img">
                                    <a target="_blank"
                                       href="15/property-details.html">
                                        <img src="{{ asset('assets/images/7.jpg') }}"
                                             alt="widget" width="120" height="102">
                                    </a>
                                </div>
                                <div class="item-content">
                                    <h5 class="item-title">
                                        <a target="_blank"
                                           href="#">Be Cosy Apart Hotel</a>
                                    </h5>
                                    <div class="location-area">
                                        <i class="flaticon-maps-and-flags"></i>Mauritius
                                    </div>
                                    <div class="item-price">$ 12000.00
                                        <span>/mo</span></div>
                                </div>
                            </div>
                                                                            
                                                        <div class="widget-listing no-brd">
                                <div class="item-img">
                                    <a target="_blank"
                                       href="1/property-details.html">
                                        <img src="{{ asset('assets/images/8.jpg') }}"
                                             alt="widget" width="120" height="102">
                                    </a>
                                </div>
                                <div class="item-content">
                                    <h5 class="item-title">
                                        <a target="_blank"
                                           href="#">Preskil island</a>
                                    </h5>
                                    <div class="location-area">
                                        <i class="flaticon-maps-and-flags"></i>Mauritius
                                    </div>
                                    <div class="item-price">$ 12000.00
                                        <span>/mo</span></div>
                                </div>
                            </div>
                                                                    </div>

                <div class="widget widget-post">
                    <div class="item-img">
                        <img src="{{ asset('ren/frontend/img/blog/widget5.jpg') }}" alt="widget" width="690" height="850">
                        <div class="circle-shape">
                            <span class="item-shape"></span>
                        </div>
                    </div>
                    <div class="item-content">
                        <h4 class="item-title">Find Your Dream House</h4>
                        <div class="item-price">$2,999</div>
                        <div class="post-button"><a href="#" class="item-btn">Shop Now</a></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="item-shorting-box">
                            <div class="shorting-title">
                                
                            </div>
                            <div class="item-shorting-box-2">
                                <!-- <div class="by-shorting">
                                    <div class="shorting">Sort by:</div>
                                    <select class="select single-select mr-0">
                                        <option value="1">Default</option>
                                        <option value="2">High Price</option>
                                        <option value="3">Medium Price</option>
                                        <option value="3">Low Price</option>
                                    </select>
                                </div> -->
                                <div class="grid-button">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#mylisting"><i
                                                        class="fas fa-th"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#reviews"><i
                                                        class="fas fa-list-ul"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Property Listing -->
                <div class="tab-style-1 tab-style-3">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade" id="mylisting" role="tabpanel">
                            <div class="row">
                                    @if ($properties->isNotEmpty())
                                     @foreach ($properties as $propList) 
                                        <div class="col-lg-6 col-md-6">
                                            <div class="property-box2 wow animated fadeInUp" data-wow-delay=".3s">
                                                <div class="item-img">
                                                    <a href="#"><img
                                                                src="{{ url('/assets/images/1.jpg') }}"
                                                                alt="blog" width="510" height="340"></a>
                                                    <div class="item-category-box1">
                                                        <div class="item-category">For Rent</div>
                                                    </div>
                                                    <div class="rent-price">
                                                        <div class="item-price">$15,000<span><i>/</i>mo</span></div>
                                                    </div>
                                                    <div class="react-icon">
                                                        <ul>
                                                            <li>
                                                                <a data-bs-toggle="tooltip"
                                                                    onclick="add_wishlist(this)"
                                                                    data-product-id="1"
                                                                    data-route="add-wishlist.html"
                                                                    data-product-unit-id=""
                                                                    data-user-id=''
                                                                    data-token='tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE'
                                                                    data-bs-placement="bottom" title="Favourites">
                                                                    <i class="flaticon-heart"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a data-bs-toggle="tooltip"
                                                                    onclick="property_compare(this)"
                                                                    data-bs-placement="bottom"
                                                                    data-property_id="1"
                                                                    data-system_ip="122.161.49.133"
                                                                    data-route="property_compare.html"
                                                                    title="Compare" class="side-btn">
                                                                    <i class="flaticon-left-and-right-arrows"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="item-category10"><a href="#">Appartment</a></div>
                                                <div class="item-content">
                                                    <div class="verified-area">
                                                        <h3 class="item-title"><a
                                                                    href="#">{{ $propList->propertyAddresss }}</a>
                                                        </h3>
                                                    </div>
                                                    <div class="location-area"><i
                                                                class="flaticon-maps-and-flags"></i>Mauritius
                                                        , Port Louis
                                                    </div>
                                                    <div class="item-categoery3">
                                                        <ul>
                                                            <li>
                                                                <i class="flaticon-bed"></i>Beds: 02
                                                            </li>
                                                            <li><i class="flaticon-shower"></i>Baths: 02</li>
                                                            <li><i class="flaticon-two-overlapping-square"></i>931 Sqft
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     @endforeach
                                    @else
                                        
                                    @endif                                   
                                   

                                                                            
                                    {{-- <div class="col-lg-6 col-md-6">
                                        <div class="property-box2 wow animated fadeInUp" data-wow-delay=".3s">
                                            <div class="item-img">
                                                <a href="2/property-details.html"><img
                                                            src="{{ asset('assets/images/7.jpg') }}"
                                                            alt="blog" width="510" height="340"></a>
                                                <div class="item-category-box1">
                                                    <div class="item-category">For Rent</div>
                                                </div>
                                                <div class="rent-price">
                                                    <div class="item-price">$15,000<span><i>/</i>mo</span></div>
                                                </div>
                                                <div class="react-icon">
                                                    <ul>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="add_wishlist(this)"
                                                               data-product-id="2"
                                                               data-route="add-wishlist.html"
                                                               data-product-unit-id=""
                                                               data-user-id=''
                                                               data-token='tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE'
                                                               data-bs-placement="bottom" title="Favourites">
                                                                <i class="flaticon-heart"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="property_compare(this)"
                                                               data-bs-placement="bottom"
                                                               data-property_id="2"
                                                               data-system_ip="122.161.49.133"
                                                               data-route="property_compare.html"
                                                               title="Compare" class="side-btn">
                                                                <i class="flaticon-left-and-right-arrows"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="item-category10"><a href="#">Appartment</a></div>
                                            <div class="item-content">
                                                <div class="verified-area">
                                                    <h3 class="item-title"><a
                                                                href="2/property-details.html">Astroea Beach Hotel</a>
                                                    </h3>
                                                </div>
                                                <div class="location-area"><i
                                                            class="flaticon-maps-and-flags"></i>Mauritius
                                                    , Grand Port
                                                </div>
                                                <div class="item-categoery3">
                                                    <ul>
                                                        <li>
                                                            <i class="flaticon-bed"></i>Beds: 01
                                                        </li>
                                                        <li><i class="flaticon-shower"></i>Baths: 02</li>
                                                        <li><i class="flaticon-two-overlapping-square"></i>931 Sqft
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                                                            
                                    {{-- <div class="col-lg-6 col-md-6">
                                        <div class="property-box2 wow animated fadeInUp" data-wow-delay=".3s">
                                            <div class="item-img">
                                                <a href="3/property-details.html"><img
                                                            src="public/storage/files/Property/1761691996846.jpg"
                                                            alt="blog" width="510" height="340"></a>
                                                <div class="item-category-box1">
                                                    <div class="item-category">For Rent</div>
                                                </div>
                                                <div class="rent-price">
                                                    <div class="item-price">$15,000<span><i>/</i>mo</span></div>
                                                </div>
                                                <div class="react-icon">
                                                    <ul>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="add_wishlist(this)"
                                                               data-product-id="3"
                                                               data-route="add-wishlist.html"
                                                               data-product-unit-id=""
                                                               data-user-id=''
                                                               data-token='tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE'
                                                               data-bs-placement="bottom" title="Favourites">
                                                                <i class="flaticon-heart"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="property_compare(this)"
                                                               data-bs-placement="bottom"
                                                               data-property_id="3"
                                                               data-system_ip="122.161.49.133"
                                                               data-route="property_compare.html"
                                                               title="Compare" class="side-btn">
                                                                <i class="flaticon-left-and-right-arrows"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="item-category10"><a href="#">Appartment</a></div>
                                            <div class="item-content">
                                                <div class="verified-area">
                                                    <h3 class="item-title"><a
                                                                href="3/property-details.html">Coco Villa</a>
                                                    </h3>
                                                </div>
                                                <div class="location-area"><i
                                                            class="flaticon-maps-and-flags"></i>Mauritius
                                                    , Floreal
                                                </div>
                                                <div class="item-categoery3">
                                                    <ul>
                                                        <li>
                                                            <i class="flaticon-bed"></i>Beds: 01
                                                        </li>
                                                        <li><i class="flaticon-shower"></i>Baths: 02</li>
                                                        <li><i class="flaticon-two-overlapping-square"></i>931 Sqft
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                                                            
                                    {{-- <div class="col-lg-6 col-md-6">
                                        <div class="property-box2 wow animated fadeInUp" data-wow-delay=".3s">
                                            <div class="item-img">
                                                <a href="4/property-details.html"><img
                                                            src="public/storage/files/Property/9421691997738.jpg"
                                                            alt="blog" width="510" height="340"></a>
                                                <div class="item-category-box1">
                                                    <div class="item-category">For Rent</div>
                                                </div>
                                                <div class="rent-price">
                                                    <div class="item-price">$15,000<span><i>/</i>mo</span></div>
                                                </div>
                                                <div class="react-icon">
                                                    <ul>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="add_wishlist(this)"
                                                               data-product-id="4"
                                                               data-route="add-wishlist.html"
                                                               data-product-unit-id=""
                                                               data-user-id=''
                                                               data-token='tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE'
                                                               data-bs-placement="bottom" title="Favourites">
                                                                <i class="flaticon-heart"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="property_compare(this)"
                                                               data-bs-placement="bottom"
                                                               data-property_id="4"
                                                               data-system_ip="122.161.49.133"
                                                               data-route="property_compare.html"
                                                               title="Compare" class="side-btn">
                                                                <i class="flaticon-left-and-right-arrows"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="item-category10"><a href="#">Appartment</a></div>
                                            <div class="item-content">
                                                <div class="verified-area">
                                                    <h3 class="item-title"><a
                                                                href="4/property-details.html">Baywatch Apartment</a>
                                                    </h3>
                                                </div>
                                                <div class="location-area"><i
                                                            class="flaticon-maps-and-flags"></i>Mauritius
                                                    , Floreal
                                                </div>
                                                <div class="item-categoery3">
                                                    <ul>
                                                        <li>
                                                            <i class="flaticon-bed"></i>Beds: 01
                                                        </li>
                                                        <li><i class="flaticon-shower"></i>Baths: 02</li>
                                                        <li><i class="flaticon-two-overlapping-square"></i>931 Sqft
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                                                            
                                    {{-- <div class="col-lg-6 col-md-6">
                                        <div class="property-box2 wow animated fadeInUp" data-wow-delay=".3s">
                                            <div class="item-img">
                                                <a href="5/property-details.html"><img
                                                            src="public/storage/files/Property/5911691998489.jpg"
                                                            alt="blog" width="510" height="340"></a>
                                                <div class="item-category-box1">
                                                    <div class="item-category">For Rent</div>
                                                </div>
                                                <div class="rent-price">
                                                    <div class="item-price">$15,000<span><i>/</i>mo</span></div>
                                                </div>
                                                <div class="react-icon">
                                                    <ul>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="add_wishlist(this)"
                                                               data-product-id="5"
                                                               data-route="add-wishlist.html"
                                                               data-product-unit-id=""
                                                               data-user-id=''
                                                               data-token='tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE'
                                                               data-bs-placement="bottom" title="Favourites">
                                                                <i class="flaticon-heart"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="property_compare(this)"
                                                               data-bs-placement="bottom"
                                                               data-property_id="5"
                                                               data-system_ip="122.161.49.133"
                                                               data-route="property_compare.html"
                                                               title="Compare" class="side-btn">
                                                                <i class="flaticon-left-and-right-arrows"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="item-category10"><a href="#">Appartment</a></div>
                                            <div class="item-content">
                                                <div class="verified-area">
                                                    <h3 class="item-title"><a
                                                                href="5/property-details.html">Dinarobin Beachcomber Golf Resort &amp; Spa</a>
                                                    </h3>
                                                </div>
                                                <div class="location-area"><i
                                                            class="flaticon-maps-and-flags"></i>Mauritius
                                                    , Pamplempousses
                                                </div>
                                                <div class="item-categoery3">
                                                    <ul>
                                                        <li>
                                                            <i class="flaticon-bed"></i>Beds: 01
                                                        </li>
                                                        <li><i class="flaticon-shower"></i>Baths: 02</li>
                                                        <li><i class="flaticon-two-overlapping-square"></i>931 Sqft
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                                                            
                                    {{-- <div class="col-lg-6 col-md-6">
                                        <div class="property-box2 wow animated fadeInUp" data-wow-delay=".3s">
                                            <div class="item-img">
                                                <a href="6/property-details.html"><img
                                                            src="public/storage/files/Property/7801692003028.jpg"
                                                            alt="blog" width="510" height="340"></a>
                                                <div class="item-category-box1">
                                                    <div class="item-category">For Rent</div>
                                                </div>
                                                <div class="rent-price">
                                                    <div class="item-price">$15,000<span><i>/</i>mo</span></div>
                                                </div>
                                                <div class="react-icon">
                                                    <ul>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="add_wishlist(this)"
                                                               data-product-id="6"
                                                               data-route="add-wishlist.html"
                                                               data-product-unit-id=""
                                                               data-user-id=''
                                                               data-token='tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE'
                                                               data-bs-placement="bottom" title="Favourites">
                                                                <i class="flaticon-heart"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="property_compare(this)"
                                                               data-bs-placement="bottom"
                                                               data-property_id="6"
                                                               data-system_ip="122.161.49.133"
                                                               data-route="property_compare.html"
                                                               title="Compare" class="side-btn">
                                                                <i class="flaticon-left-and-right-arrows"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="item-category10"><a href="#">Appartment</a></div>
                                            <div class="item-content">
                                                <div class="verified-area">
                                                    <h3 class="item-title"><a
                                                                href="6/property-details.html">Villas Vetiver</a>
                                                    </h3>
                                                </div>
                                                <div class="location-area"><i
                                                            class="flaticon-maps-and-flags"></i>Mauritius
                                                    , Plaines Wilhelm
                                                </div>
                                                <div class="item-categoery3">
                                                    <ul>
                                                        <li>
                                                            <i class="flaticon-bed"></i>Beds: 01
                                                        </li>
                                                        <li><i class="flaticon-shower"></i>Baths: 02</li>
                                                        <li><i class="flaticon-two-overlapping-square"></i>931 Sqft
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                                                            
                                    {{-- <div class="col-lg-6 col-md-6">
                                        <div class="property-box2 wow animated fadeInUp" data-wow-delay=".3s">
                                            <div class="item-img">
                                                <a href="7/property-details.html"><img
                                                            src="public/storage/files/Property/4521692004210.jpg"
                                                            alt="blog" width="510" height="340"></a>
                                                <div class="item-category-box1">
                                                    <div class="item-category">For Rent</div>
                                                </div>
                                                <div class="rent-price">
                                                    <div class="item-price">$15,000<span><i>/</i>mo</span></div>
                                                </div>
                                                <div class="react-icon">
                                                    <ul>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="add_wishlist(this)"
                                                               data-product-id="7"
                                                               data-route="add-wishlist.html"
                                                               data-product-unit-id=""
                                                               data-user-id=''
                                                               data-token='tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE'
                                                               data-bs-placement="bottom" title="Favourites">
                                                                <i class="flaticon-heart"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="property_compare(this)"
                                                               data-bs-placement="bottom"
                                                               data-property_id="7"
                                                               data-system_ip="122.161.49.133"
                                                               data-route="property_compare.html"
                                                               title="Compare" class="side-btn">
                                                                <i class="flaticon-left-and-right-arrows"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="item-category10"><a href="#">Appartment</a></div>
                                            <div class="item-content">
                                                <div class="verified-area">
                                                    <h3 class="item-title"><a
                                                                href="7/property-details.html">Otenic, Eco Tent Experience</a>
                                                    </h3>
                                                </div>
                                                <div class="location-area"><i
                                                            class="flaticon-maps-and-flags"></i>Mauritius
                                                    , Pamplempousses
                                                </div>
                                                <div class="item-categoery3">
                                                    <ul>
                                                        <li>
                                                            <i class="flaticon-bed"></i>Beds: 01
                                                        </li>
                                                        <li><i class="flaticon-shower"></i>Baths: 02</li>
                                                        <li><i class="flaticon-two-overlapping-square"></i>931 Sqft
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                                                            
                                    {{-- <div class="col-lg-6 col-md-6">
                                        <div class="property-box2 wow animated fadeInUp" data-wow-delay=".3s">
                                            <div class="item-img">
                                                <a href="18/property-details.html"><img
                                                            src="public/storage/files/Property/7341692010123.jpg"
                                                            alt="blog" width="510" height="340"></a>
                                                <div class="item-category-box1">
                                                    <div class="item-category">For Rent</div>
                                                </div>
                                                <div class="rent-price">
                                                    <div class="item-price">$15,000<span><i>/</i>mo</span></div>
                                                </div>
                                                <div class="react-icon">
                                                    <ul>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="add_wishlist(this)"
                                                               data-product-id="18"
                                                               data-route="add-wishlist.html"
                                                               data-product-unit-id=""
                                                               data-user-id=''
                                                               data-token='tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE'
                                                               data-bs-placement="bottom" title="Favourites">
                                                                <i class="flaticon-heart"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="property_compare(this)"
                                                               data-bs-placement="bottom"
                                                               data-property_id="18"
                                                               data-system_ip="122.161.49.133"
                                                               data-route="property_compare.html"
                                                               title="Compare" class="side-btn">
                                                                <i class="flaticon-left-and-right-arrows"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="item-category10"><a href="#">Appartment</a></div>
                                            <div class="item-content">
                                                <div class="verified-area">
                                                    <h3 class="item-title"><a
                                                                href="18/property-details.html">Bubble Lodge Ile aux Cerfs Island</a>
                                                    </h3>
                                                </div>
                                                <div class="location-area"><i
                                                            class="flaticon-maps-and-flags"></i>Mauritius
                                                    , Pamplempousses
                                                </div>
                                                <div class="item-categoery3">
                                                    <ul>
                                                        <li>
                                                            <i class="flaticon-bed"></i>Beds: 01
                                                        </li>
                                                        <li><i class="flaticon-shower"></i>Baths: 02</li>
                                                        <li><i class="flaticon-two-overlapping-square"></i>931 Sqft
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                                                            
                                    {{-- <div class="col-lg-6 col-md-6">
                                        <div class="property-box2 wow animated fadeInUp" data-wow-delay=".3s">
                                            <div class="item-img">
                                                <a href="10/property-details.html"><img
                                                            src="public/storage/files/Property/9481692006607.jpg"
                                                            alt="blog" width="510" height="340"></a>
                                                <div class="item-category-box1">
                                                    <div class="item-category">For Rent</div>
                                                </div>
                                                <div class="rent-price">
                                                    <div class="item-price">$15,000<span><i>/</i>mo</span></div>
                                                </div>
                                                <div class="react-icon">
                                                    <ul>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="add_wishlist(this)"
                                                               data-product-id="10"
                                                               data-route="add-wishlist.html"
                                                               data-product-unit-id=""
                                                               data-user-id=''
                                                               data-token='tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE'
                                                               data-bs-placement="bottom" title="Favourites">
                                                                <i class="flaticon-heart"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="property_compare(this)"
                                                               data-bs-placement="bottom"
                                                               data-property_id="10"
                                                               data-system_ip="122.161.49.133"
                                                               data-route="property_compare.html"
                                                               title="Compare" class="side-btn">
                                                                <i class="flaticon-left-and-right-arrows"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="item-category10"><a href="#">Appartment</a></div>
                                            <div class="item-content">
                                                <div class="verified-area">
                                                    <h3 class="item-title"><a
                                                                href="10/property-details.html">Latitude</a>
                                                    </h3>
                                                </div>
                                                <div class="location-area"><i
                                                            class="flaticon-maps-and-flags"></i>Mauritius
                                                    , Moka
                                                </div>
                                                <div class="item-categoery3">
                                                    <ul>
                                                        <li>
                                                            <i class="flaticon-bed"></i>Beds: 01
                                                        </li>
                                                        <li><i class="flaticon-shower"></i>Baths: 02</li>
                                                        <li><i class="flaticon-two-overlapping-square"></i>931 Sqft
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                                                            
                                    {{-- <div class="col-lg-6 col-md-6">
                                        <div class="property-box2 wow animated fadeInUp" data-wow-delay=".3s">
                                            <div class="item-img">
                                                <a href="11/property-details.html"><img
                                                            src="public/storage/files/Property/5981692006935.jpg"
                                                            alt="blog" width="510" height="340"></a>
                                                <div class="item-category-box1">
                                                    <div class="item-category">For Rent</div>
                                                </div>
                                                <div class="rent-price">
                                                    <div class="item-price">$15,000<span><i>/</i>mo</span></div>
                                                </div>
                                                <div class="react-icon">
                                                    <ul>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="add_wishlist(this)"
                                                               data-product-id="11"
                                                               data-route="add-wishlist.html"
                                                               data-product-unit-id=""
                                                               data-user-id=''
                                                               data-token='tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE'
                                                               data-bs-placement="bottom" title="Favourites">
                                                                <i class="flaticon-heart"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="property_compare(this)"
                                                               data-bs-placement="bottom"
                                                               data-property_id="11"
                                                               data-system_ip="122.161.49.133"
                                                               data-route="property_compare.html"
                                                               title="Compare" class="side-btn">
                                                                <i class="flaticon-left-and-right-arrows"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="item-category10"><a href="#">Appartment</a></div>
                                            <div class="item-content">
                                                <div class="verified-area">
                                                    <h3 class="item-title"><a
                                                                href="11/property-details.html">Marguery Villas</a>
                                                    </h3>
                                                </div>
                                                <div class="location-area"><i
                                                            class="flaticon-maps-and-flags"></i>Mauritius
                                                    , Rodrigues
                                                </div>
                                                <div class="item-categoery3">
                                                    <ul>
                                                        <li>
                                                            <i class="flaticon-bed"></i>Beds: 01
                                                        </li>
                                                        <li><i class="flaticon-shower"></i>Baths: 02</li>
                                                        <li><i class="flaticon-two-overlapping-square"></i>931 Sqft
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                                                </div>
                            <div class="paginate">
                                <div class="pagination-style-1">
                             <ul class="pagination">

                        <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
        
                                                                                                                <li class="page-item ">
                            <a class="page-link active">1</a>
                        </li>
                                                                                            <li class="page-item">
                            <a class="page-link" href="propertyList4658.html?page=2">2</a>
                        </li>
                                                                                            <li class="page-item">
                            <a class="page-link" href="propertyList9ba9.html?page=3">3</a>
                        </li>
                                                                    
                        <li class="page-item">
                <a class="page-link" href="propertyList4658.html?page=2" rel="next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
                </ul>
</div>

                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="reviews" role="tabpanel">
                            <div class="row">

                                                                            
                                    <div class="col-lg-12">
                                        <div class="property-box2 property-box4 wow animated fadeInUp"
                                             data-wow-delay=".6s">
                                            <div class="item-img">
                                                <a href="1/property-details.html"><img
                                                            src="{{ asset('assets/images/6.jpg') }}"
                                                            alt="blog" width="250" height="200"></a>
                                                <div class="item-category-box1">
                                                    <div class="item-category">For Rent</div>
                                                </div>
                                            </div>
                                            <div class="item-content item-content-property">
                                                <div class="item-category10"><a href="#">Appartment</a></div>
                                                <div class="react-icon react-icon-2">
                                                    <ul>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="add_wishlist(this)"
                                                               data-product-id="1"
                                                               data-route="add-wishlist.html"
                                                               data-product-unit-id=""
                                                               data-user-id=''
                                                               data-token='tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE'
                                                               data-bs-placement="bottom" title="Favourites">
                                                                <i class="flaticon-heart"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="property_compare(this)"
                                                               data-bs-placement="bottom"
                                                               data-property_id="1"
                                                               data-system_ip="122.161.49.133"
                                                               data-route="property_compare.html"
                                                               title="Compare" class="side-btn">
                                                                <i class="flaticon-left-and-right-arrows"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="verified-area">
                                                    <h3 class="item-title"><a
                                                                href="#">Preskil island</a>
                                                    </h3>
                                                </div>
                                                <div class="location-area"><i
                                                            class="flaticon-maps-and-flags"></i>Mauritius
                                                    , Port Louis
                                                </div>
                                                <div class="item-categoery3">
                                                    <ul>
                                                        <li>
                                                            <i class="flaticon-bed"></i>Beds:02
                                                        </li>
                                                        <li><i class="flaticon-shower"></i>Baths: 02</li>
                                                        <li><i class="flaticon-two-overlapping-square"></i>931 Sqft
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                                            
                                    <div class="col-lg-12">
                                        <div class="property-box2 property-box4 wow animated fadeInUp"
                                             data-wow-delay=".6s">
                                            <div class="item-img">
                                                <a href="#"><img
                                                            src="{{ asset('assets/images/7.jpg') }}"
                                                            alt="blog" width="250" height="200"></a>
                                                <div class="item-category-box1">
                                                    <div class="item-category">For Rent</div>
                                                </div>
                                            </div>
                                            <div class="item-content item-content-property">
                                                <div class="item-category10"><a href="#">Appartment</a></div>
                                                <div class="react-icon react-icon-2">
                                                    <ul>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="add_wishlist(this)"
                                                               data-product-id="2"
                                                               data-route="add-wishlist.html"
                                                               data-product-unit-id=""
                                                               data-user-id=''
                                                               data-token='tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE'
                                                               data-bs-placement="bottom" title="Favourites">
                                                                <i class="flaticon-heart"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="property_compare(this)"
                                                               data-bs-placement="bottom"
                                                               data-property_id="2"
                                                               data-system_ip="122.161.49.133"
                                                               data-route="property_compare.html"
                                                               title="Compare" class="side-btn">
                                                                <i class="flaticon-left-and-right-arrows"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="verified-area">
                                                    <h3 class="item-title"><a
                                                                href="#">Astroea Beach Hotel</a>
                                                    </h3>
                                                </div>
                                                <div class="location-area"><i
                                                            class="flaticon-maps-and-flags"></i>Mauritius
                                                    , Grand Port
                                                </div>
                                                <div class="item-categoery3">
                                                    <ul>
                                                        <li>
                                                            <i class="flaticon-bed"></i>Beds:01
                                                        </li>
                                                        <li><i class="flaticon-shower"></i>Baths: 02</li>
                                                        <li><i class="flaticon-two-overlapping-square"></i>931 Sqft
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                                            
                                    <div class="col-lg-12">
                                        <div class="property-box2 property-box4 wow animated fadeInUp"
                                             data-wow-delay=".6s">
                                            <div class="item-img">
                                                <a href="#"><img
                                                            src="{{ asset('assets/images/8.jpg') }}"
                                                            alt="blog" width="250" height="200"></a>
                                                <div class="item-category-box1">
                                                    <div class="item-category">For Rent</div>
                                                </div>
                                            </div>
                                            <div class="item-content item-content-property">
                                                <div class="item-category10"><a href="#">Appartment</a></div>
                                                <div class="react-icon react-icon-2">
                                                    <ul>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="add_wishlist(this)"
                                                               data-product-id="3"
                                                               data-route="add-wishlist.html"
                                                               data-product-unit-id=""
                                                               data-user-id=''
                                                               data-token='tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE'
                                                               data-bs-placement="bottom" title="Favourites">
                                                                <i class="flaticon-heart"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="property_compare(this)"
                                                               data-bs-placement="bottom"
                                                               data-property_id="3"
                                                               data-system_ip="122.161.49.133"
                                                               data-route="property_compare.html"
                                                               title="Compare" class="side-btn">
                                                                <i class="flaticon-left-and-right-arrows"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="verified-area">
                                                    <h3 class="item-title"><a
                                                                href="#">Coco Villa</a>
                                                    </h3>
                                                </div>
                                                <div class="location-area"><i
                                                            class="flaticon-maps-and-flags"></i>Mauritius
                                                    , Floreal
                                                </div>
                                                <div class="item-categoery3">
                                                    <ul>
                                                        <li>
                                                            <i class="flaticon-bed"></i>Beds:01
                                                        </li>
                                                        <li><i class="flaticon-shower"></i>Baths: 02</li>
                                                        <li><i class="flaticon-two-overlapping-square"></i>931 Sqft
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                                            
                                    <div class="col-lg-12">
                                        <div class="property-box2 property-box4 wow animated fadeInUp"
                                             data-wow-delay=".6s">
                                            <div class="item-img">
                                                <a href="#"><img
                                                            src="{{ asset('assets/images/6.jpg') }}"
                                                            alt="blog" width="250" height="200"></a>
                                                <div class="item-category-box1">
                                                    <div class="item-category">For Rent</div>
                                                </div>
                                            </div>
                                            <div class="item-content item-content-property">
                                                <div class="item-category10"><a href="#">Appartment</a></div>
                                                <div class="react-icon react-icon-2">
                                                    <ul>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="add_wishlist(this)"
                                                               data-product-id="4"
                                                               data-route="add-wishlist.html"
                                                               data-product-unit-id=""
                                                               data-user-id=''
                                                               data-token='tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE'
                                                               data-bs-placement="bottom" title="Favourites">
                                                                <i class="flaticon-heart"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="property_compare(this)"
                                                               data-bs-placement="bottom"
                                                               data-property_id="4"
                                                               data-system_ip="122.161.49.133"
                                                               data-route="property_compare.html"
                                                               title="Compare" class="side-btn">
                                                                <i class="flaticon-left-and-right-arrows"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="verified-area">
                                                    <h3 class="item-title"><a
                                                                href="#">Baywatch Apartment</a>
                                                    </h3>
                                                </div>
                                                <div class="location-area"><i
                                                            class="flaticon-maps-and-flags"></i>Mauritius
                                                    , Floreal
                                                </div>
                                                <div class="item-categoery3">
                                                    <ul>
                                                        <li>
                                                            <i class="flaticon-bed"></i>Beds:01
                                                        </li>
                                                        <li><i class="flaticon-shower"></i>Baths: 02</li>
                                                        <li><i class="flaticon-two-overlapping-square"></i>931 Sqft
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                                            
                                    <div class="col-lg-12">
                                        <div class="property-box2 property-box4 wow animated fadeInUp"
                                             data-wow-delay=".6s">
                                            <div class="item-img">
                                                <a href="5/property-details.html"><img
                                                            src="{{ asset('assets/images/6.jpg') }}"
                                                            alt="blog" width="250" height="200"></a>
                                                <div class="item-category-box1">
                                                    <div class="item-category">For Rent</div>
                                                </div>
                                            </div>
                                            <div class="item-content item-content-property">
                                                <div class="item-category10"><a href="#">Appartment</a></div>
                                                <div class="react-icon react-icon-2">
                                                    <ul>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="add_wishlist(this)"
                                                               data-product-id="5"
                                                               data-route="add-wishlist.html"
                                                               data-product-unit-id=""
                                                               data-user-id=''
                                                               data-token='tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE'
                                                               data-bs-placement="bottom" title="Favourites">
                                                                <i class="flaticon-heart"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="property_compare(this)"
                                                               data-bs-placement="bottom"
                                                               data-property_id="5"
                                                               data-system_ip="122.161.49.133"
                                                               data-route="property_compare.html"
                                                               title="Compare" class="side-btn">
                                                                <i class="flaticon-left-and-right-arrows"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="verified-area">
                                                    <h3 class="item-title"><a
                                                                href="#">Dinarobin Beachcomber Golf Resort &amp; Spa</a>
                                                    </h3>
                                                </div>
                                                <div class="location-area"><i
                                                            class="flaticon-maps-and-flags"></i>Mauritius
                                                    , Pamplempousses
                                                </div>
                                                <div class="item-categoery3">
                                                    <ul>
                                                        <li>
                                                            <i class="flaticon-bed"></i>Beds:01
                                                        </li>
                                                        <li><i class="flaticon-shower"></i>Baths: 02</li>
                                                        <li><i class="flaticon-two-overlapping-square"></i>931 Sqft
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                                            
                                    <div class="col-lg-12">
                                        <div class="property-box2 property-box4 wow animated fadeInUp"
                                             data-wow-delay=".6s">
                                            <div class="item-img">
                                                <a href="#"><img
                                                            src="{{ asset('assets/images/8.jpg') }}"
                                                            alt="blog" width="250" height="200"></a>
                                                <div class="item-category-box1">
                                                    <div class="item-category">For Rent</div>
                                                </div>
                                            </div>
                                            <div class="item-content item-content-property">
                                                <div class="item-category10"><a href="#">Appartment</a></div>
                                                <div class="react-icon react-icon-2">
                                                    <ul>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="add_wishlist(this)"
                                                               data-product-id="6"
                                                               data-route="add-wishlist.html"
                                                               data-product-unit-id=""
                                                               data-user-id=''
                                                               data-token='tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE'
                                                               data-bs-placement="bottom" title="Favourites">
                                                                <i class="flaticon-heart"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="property_compare(this)"
                                                               data-bs-placement="bottom"
                                                               data-property_id="6"
                                                               data-system_ip="122.161.49.133"
                                                               data-route="property_compare.html"
                                                               title="Compare" class="side-btn">
                                                                <i class="flaticon-left-and-right-arrows"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="verified-area">
                                                    <h3 class="item-title"><a
                                                                href="#">Villas Vetiver</a>
                                                    </h3>
                                                </div>
                                                <div class="location-area"><i
                                                            class="flaticon-maps-and-flags"></i>Mauritius
                                                    , Plaines Wilhelm
                                                </div>
                                                <div class="item-categoery3">
                                                    <ul>
                                                        <li>
                                                            <i class="flaticon-bed"></i>Beds:01
                                                        </li>
                                                        <li><i class="flaticon-shower"></i>Baths: 02</li>
                                                        <li><i class="flaticon-two-overlapping-square"></i>931 Sqft
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                                            
                                    <div class="col-lg-12">
                                        <div class="property-box2 property-box4 wow animated fadeInUp"
                                             data-wow-delay=".6s">
                                            <div class="item-img">
                                                <a href="#"><img
                                                            src="{{ asset('assets/images/6.jpg') }}"
                                                            alt="blog" width="250" height="200"></a>
                                                <div class="item-category-box1">
                                                    <div class="item-category">For Rent</div>
                                                </div>
                                            </div>
                                            <div class="item-content item-content-property">
                                                <div class="item-category10"><a href="#">Appartment</a></div>
                                                <div class="react-icon react-icon-2">
                                                    <ul>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="add_wishlist(this)"
                                                               data-product-id="7"
                                                               data-route="add-wishlist.html"
                                                               data-product-unit-id=""
                                                               data-user-id=''
                                                               data-token='tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE'
                                                               data-bs-placement="bottom" title="Favourites">
                                                                <i class="flaticon-heart"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="property_compare(this)"
                                                               data-bs-placement="bottom"
                                                               data-property_id="7"
                                                               data-system_ip="122.161.49.133"
                                                               data-route="property_compare.html"
                                                               title="Compare" class="side-btn">
                                                                <i class="flaticon-left-and-right-arrows"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="verified-area">
                                                    <h3 class="item-title"><a
                                                                href="#">Otenic, Eco Tent Experience</a>
                                                    </h3>
                                                </div>
                                                <div class="location-area"><i
                                                            class="flaticon-maps-and-flags"></i>Mauritius
                                                    , Pamplempousses
                                                </div>
                                                <div class="item-categoery3">
                                                    <ul>
                                                        <li>
                                                            <i class="flaticon-bed"></i>Beds:01
                                                        </li>
                                                        <li><i class="flaticon-shower"></i>Baths: 02</li>
                                                        <li><i class="flaticon-two-overlapping-square"></i>931 Sqft
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                                            
                                    <div class="col-lg-12">
                                        <div class="property-box2 property-box4 wow animated fadeInUp"
                                             data-wow-delay=".6s">
                                            <div class="item-img">
                                                <a href="#"><img
                                                            src="{{ asset('assets/images/7.jpg') }}"
                                                            alt="blog" width="250" height="200"></a>
                                                <div class="item-category-box1">
                                                    <div class="item-category">For Rent</div>
                                                </div>
                                            </div>
                                            <div class="item-content item-content-property">
                                                <div class="item-category10"><a href="#">Appartment</a></div>
                                                <div class="react-icon react-icon-2">
                                                    <ul>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="add_wishlist(this)"
                                                               data-product-id="18"
                                                               data-route="add-wishlist.html"
                                                               data-product-unit-id=""
                                                               data-user-id=''
                                                               data-token='tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE'
                                                               data-bs-placement="bottom" title="Favourites">
                                                                <i class="flaticon-heart"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="property_compare(this)"
                                                               data-bs-placement="bottom"
                                                               data-property_id="18"
                                                               data-system_ip="122.161.49.133"
                                                               data-route="property_compare.html"
                                                               title="Compare" class="side-btn">
                                                                <i class="flaticon-left-and-right-arrows"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="verified-area">
                                                    <h3 class="item-title"><a
                                                                href="#">Bubble Lodge Ile aux Cerfs Island</a>
                                                    </h3>
                                                </div>
                                                <div class="location-area"><i
                                                            class="flaticon-maps-and-flags"></i>Mauritius
                                                    , Pamplempousses
                                                </div>
                                                <div class="item-categoery3">
                                                    <ul>
                                                        <li>
                                                            <i class="flaticon-bed"></i>Beds:01
                                                        </li>
                                                        <li><i class="flaticon-shower"></i>Baths: 02</li>
                                                        <li><i class="flaticon-two-overlapping-square"></i>931 Sqft
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                                            
                                    <div class="col-lg-12">
                                        <div class="property-box2 property-box4 wow animated fadeInUp"
                                             data-wow-delay=".6s">
                                            <div class="item-img">
                                                <a href="10/property-details.html"><img
                                                            src="{{ asset('assets/images/8.jpg') }}"
                                                            alt="blog" width="250" height="200"></a>
                                                <div class="item-category-box1">
                                                    <div class="item-category">For Rent</div>
                                                </div>
                                            </div>
                                            <div class="item-content item-content-property">
                                                <div class="item-category10"><a href="#">Appartment</a></div>
                                                <div class="react-icon react-icon-2">
                                                    <ul>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="add_wishlist(this)"
                                                               data-product-id="10"
                                                               data-route="add-wishlist.html"
                                                               data-product-unit-id=""
                                                               data-user-id=''
                                                               data-token='tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE'
                                                               data-bs-placement="bottom" title="Favourites">
                                                                <i class="flaticon-heart"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="property_compare(this)"
                                                               data-bs-placement="bottom"
                                                               data-property_id="10"
                                                               data-system_ip="122.161.49.133"
                                                               data-route="property_compare.html"
                                                               title="Compare" class="side-btn">
                                                                <i class="flaticon-left-and-right-arrows"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="verified-area">
                                                    <h3 class="item-title"><a
                                                                href="#">Latitude</a>
                                                    </h3>
                                                </div>
                                                <div class="location-area"><i
                                                            class="flaticon-maps-and-flags"></i>Mauritius
                                                    , Moka
                                                </div>
                                                <div class="item-categoery3">
                                                    <ul>
                                                        <li>
                                                            <i class="flaticon-bed"></i>Beds:01
                                                        </li>
                                                        <li><i class="flaticon-shower"></i>Baths: 02</li>
                                                        <li><i class="flaticon-two-overlapping-square"></i>931 Sqft
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                                            
                                    <div class="col-lg-12">
                                        <div class="property-box2 property-box4 wow animated fadeInUp"
                                             data-wow-delay=".6s">
                                            <div class="item-img">
                                                <a href="#"><img
                                                            src="{{ asset('assets/images/8.jpg') }}"
                                                            alt="blog" width="250" height="200"></a>
                                                <div class="item-category-box1">
                                                    <div class="item-category">For Rent</div>
                                                </div>
                                            </div>
                                            <div class="item-content item-content-property">
                                                <div class="item-category10"><a href="#">Appartment</a></div>
                                                <div class="react-icon react-icon-2">
                                                    <ul>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="add_wishlist(this)"
                                                               data-product-id="11"
                                                               data-route="add-wishlist.html"
                                                               data-product-unit-id=""
                                                               data-user-id=''
                                                               data-token='tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE'
                                                               data-bs-placement="bottom" title="Favourites">
                                                                <i class="flaticon-heart"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-bs-toggle="tooltip"
                                                               onclick="property_compare(this)"
                                                               data-bs-placement="bottom"
                                                               data-property_id="11"
                                                               data-system_ip="122.161.49.133"
                                                               data-route="property_compare.html"
                                                               title="Compare" class="side-btn">
                                                                <i class="flaticon-left-and-right-arrows"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="verified-area">
                                                    <h3 class="item-title"><a
                                                                href="#">Marguery Villas</a>
                                                    </h3>
                                                </div>
                                                <div class="location-area"><i
                                                            class="flaticon-maps-and-flags"></i>Mauritius
                                                    , Rodrigues
                                                </div>
                                                <div class="item-categoery3">
                                                    <ul>
                                                        <li>
                                                            <i class="flaticon-bed"></i>Beds:01
                                                        </li>
                                                        <li><i class="flaticon-shower"></i>Baths: 02</li>
                                                        <li><i class="flaticon-two-overlapping-square"></i>931 Sqft
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                            <style>
                                .paginate > nav > div > div > span > a > svg {
                                    height: 35px !important;
                                }


                                .paginate > nav > div > div > span > span > span > svg {
                                    height: 35px !important;
                                }

                                .flex.justify-between .flex-1 {
                                    display: none !important;
                                }
                            </style>
                            <div class="paginate">
                                <div class="pagination-style-1">
    <ul class="pagination">

                        <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
        
                                                                                                                <li class="page-item ">
                            <a class="page-link active">1</a>
                        </li>
                                                                                            <li class="page-item">
                            <a class="page-link" href="propertyList4658.html?page=2">2</a>
                        </li>
                                                                                            <li class="page-item">
                            <a class="page-link" href="propertyList9ba9.html?page=3">3</a>
                        </li>
                                                                    
                        <li class="page-item">
                <a class="page-link" href="propertyList4658.html?page=2" rel="next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
                </ul>
</div>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Property Listing  -->
            </div>
        </div>
    </div>
</section>
<!--=====================================-->
<!--=   Newsletter     Start            =-->
<!--=====================================-->

<section class="newsletter-wrap1">
    
    
    
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="newsletter-layout1">
                    <div class="item-heading">
                        <h2 class="item-title">Sign up for newsletter </h2>
                        <h3 class="item-subtitle">Get latest news and update</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-7" id="newslatter">
                <form action="https://rentalys.hucpl.com/rentalys/news_latter.html#newslatter" method="post">
                    <input type="hidden" name="_token" value="tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE">                        <div class="newsletter-form">
                        <div class="input-group">
                            <input type="text" style="height:60px !important;" name="email" class="form-control"
                                   placeholder="Enter e-mail addess">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Subscribe</button>
                            </div>
                        </div>
                                                </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
