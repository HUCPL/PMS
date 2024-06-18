
<div id="preloader"></div>
<div class="wrapper" id="wrapper">
    <header class="header">
        <div id="rt-sticky-placeholder"></div>
        <div id="header-menu" class="header-menu menu-layout1">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo-area">
                            <a href="{{ route('indexPage') }}" class="temp-logo">
                                <img src="{{ asset('ren/frontend/img/logo.png') }}" alt="logo" class="img-fluid hlogo">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-flex justify-content-center position-static">
                        <nav id="dropdown" class="template-main-menu">
                            <ul>
                                <li>
                                    {{-- class="active" --}}
                                    <a href="{{ route('indexPage') }}" @if(request()->url() == url('/')) class="active" @endif >Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('aboutUS') }}"
                                    @if(request()->url() == url('rentalys/about-us')) class="active" @endif>About</a>
                                </li>
                                <li>
                                    <a href="{{ route('properties') }}"
                                    @if(request()->url() == url('rentalys/properties')) class="active" @endif>Property</a>
                                </li>
                                <li>
                                    <a href="{{ route('agentsPage') }}"
                                    @if(request()->url() == url('rentalys/agents')) class="active" @endif>Agents</a>
                                </li>
                                <li class="position-static hide-on-mobile-menu">
                                    <a href="{{ route('blogsPage') }}"
                                    @if(request()->url() == url('rentalys/blogs')) class="active" @endif>Blog</a>
                                </li>
                                <li>
                                    <a href="{{ route('contactPage') }}"
                                    @if(request()->url() == url('rentalys/contact')) class="active" @endif>Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-xl-4 col-lg-4 d-flex justify-content-end">
                        <div class="header-action-layout1">
                            <ul class="action-list">
                                <li class="action-item-style wish-btn">
                                    <a href="{{ route('comparePage') }}" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                       title="" class="side-btn" data-bs-original-title="Compare"
                                       aria-label="Compare">
                                        <i class="flaticon-left-and-right-arrows"></i>
                                    </a>
                                </li>

                                <li class="action-item-style wish-btn">
                                    <a href="{{ route('wishList') }}" data-bs-toggle="tooltip"
                                       data-bs-placement="bottom" title="Wishlist">
                                        <i class="flaticon-heart"></i>
                                        <div class="item-count">
                                             0
                                        </div>
                                    </a>
                                </li>

                                <li class="action-item-style my-account">
                                    <a href="{{ route('rentalysLogin') }}"
                                       data-bs-toggle="tooltip" data-bs-placement="bottom"
                                       title="Sign In">
                                        <i class="flaticon-user-1"></i>
                                    </a>
                                </li>

                                <li class="action-item-style left-right-btn d-none">
                                    <a href="#" data-bs-toggle="tooltip"
                                       data-bs-placement="bottom" title="Logout">
                                        <i class="fa fa-power-off"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <div class="rt-header-menu mean-container position-relative" id="meanmenu">
        <div class="mean-bar">
            <a href="#">
                <img src="{{ asset('ren/frontend/img/logo.png') }}" alt='logo' class='img-fluid'>
            </a>
            <div class="mean-bar--right">
                <div class="actions search">
                    <a href="#template-search" class="item-icon" title="Search">
                        <i class="fas fa-search"></i>
                    </a>
                </div>
                <div class="actions user">
                    <a href="#">
                        <i class="flaticon-user"></i>
                    </a>
                </div>
                <span class="sidebarBtn">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
          </span>
            </div>
        </div>

        <div class="rt-slide-nav">
            <div class="offscreen-navigation">
                <nav class="menu-main-primary-container">
                    <ul class="menu">
                        <li class="list">
                            <a class="animation" href="https://rentalys.hucpl.com/rentalys">Home</a>
                        </li>
                        <li class="list ">
                            <a class="animation" href="about.html">About</a>
                        </li>
                        <li class="list">
                            <a class="animation" href="propertyList.html">Property</a>
                        </li>
                        <li class="list ">
                            <a class="animation" href="agents.html">Agents</a>
                        </li>
                        <li class="list ">
                            <a class="animation" href="blog.html">Blog</a>
                        </li>
                        <li class="list ">
                            <a class="animation" href="contact.html">Contact us</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <style>
        .filter-btn {
            display: inline-block;
            background-color: var(--rt-primary-color);
            color: #ffffff;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            padding: 0px 18px;
            line-height: 60px;
            margin-right: -16px;
            transition: none !important;
            border-radius: 0px 6px 6px 0px;
            border: 0px;
        }
    
    
        .fileter_drop {
            position: relative;
            top: 18px;
            left: 1px;
            color: #7f767c;
            /*color: #020000;*/
            cursor: pointer;
        }
    
        h6 {
            font-size: 15px;
            line-height: 24px;
            padding: 0px 10px;
        }
    
        .explore__form-checkbox-list.full-filter {
            opacity: 0;
            -webkit-transition: none !important;
            /* transition: 0.8s; */
            z-index: 9;
            visibility: hidden;
            position: absolute;
            background: #fff;
            border-radius: 6px;
            padding: 20px 60px 30px 60px;
            box-shadow: 0 1px 10px 0 rgba(0, 0, 0, 0.2);
        }
    
        .slider__control.prev {
            left: -15px;
            top: 102px;
        }
    
        .slider__control.next {
            right: -15px;
            top: 102px;
        }
    
        .dropdown_1.explore__form-checkbox-list.full-filter.filter-block {
            width: 50% !important;
            position: absolute;
            left: 452px;
        }
    
    
        .testimonial {
            box-shadow: 0px 1px 6px 3px rgba(0, 0, 0, 0.05);
            padding: 30px 30px 1px 38px;
            margin: 13px 15px 30px 15px;
            overflow: hidden;
            position: relative;
            border-radius: 7px;
        }
    
        .testimonial:before {
            content: "";
            position: absolute;
            bottom: -4px;
            left: -17px;
            border-left: 25px solid transparent;
            border-right: 25px solid transparent;
            transform: rotate(45deg);
        }
    
        .testimonial:after {
            content: "";
            position: absolute;
            top: -4px;
            left: -17px;
            border-left: 25px solid transparent;
            border-right: 25px solid transparent;
            transform: rotate(135deg);
        }
    
        .testimonial .pic {
            display: inline-block;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            position: absolute;
            top: 60px;
            left: 20px;
        }
    
        .testimonial .pic img {
            width: 100%;
            height: auto;
        }
    
        .testimonial .description {
            font-size: 15px;
            letter-spacing: 1px;
            color: #fff;
            line-height: 25px;
            margin-bottom: 15px;
        }
    
        .testimonial .title {
            display: inline-block;
            font-size: 20px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #29D18B;
            margin: 0;
        }
    
        .testimonial .post {
            display: inline-block;
            font-size: 17px;
            color: #29D18B;
            font-style: italic;
        }
    
        .owl-theme .owl-controls .owl-page span {
            border: 2px solid #2A3D7D;
            background: #fff !important;
            border-radius: 0 !important;
            opacity: 1;
        }
    
        .owl-theme .owl-controls .owl-page.active span,
        .owl-theme .owl-controls .owl-page:hover span {
            background: #29D18B !important;
            border-color: #29D18B;
        }
    
        @media only screen and (max-width: 767px) {
            .testimonial {
                padding: 20px;
                text-align: center;
            }
    
            .testimonial .pic {
                display: block;
                position: static;
                margin: 0 auto 15px;
            }
        }
    
        .owl-carousel .owl-dots.disabled, .owl-carousel .owl-nav.disabled {
            display: inline-block;
        }
    
        .owl-dots {
            display: none;
        }
    
        .owl-prev {
            text-align: center !important;
            position: relative;
            left: 520px;
            background: #0E2E50 !important;
            width: 27px;
            color: white !important;
            font-size: 20px !important;
            border-radius: 7px;
            top: -30px;
        }
    
        .owl-next {
            text-align: center !important;
            position: relative;
            left: 510px;
            background: #0E2E50 !important;
            margin: 20px !important;
            width: 27px;
            color: white !important;
            font-size: 20px !important;
            border-radius: 7px;
            top: -30px;
        }
    
        #testimonial-slider {
            height: 242px;
            overflow: hidden;
        }
    
        .testimonial {;
        }
    
        .ee {
            color: white;
        }
    
    
        .dropdown_1.explore__form-checkbox-list.full-filter.filter-block {
            width: 34% !important;
            position: absolute;
            left: 521px;
        }
    
    
        .explore__form-checkbox-list.full-filter {
            opacity: 0;
            -webkit-transition: none !important;
            /* transition: 0.8s; */
            z-index: 9;
            visibility: hidden;
            position: absolute;
            background: #fff;
            border-radius: 6px;
            padding: 20px 30px 30px 30px;
            box-shadow: 0 1px 10px 0 rgba(0, 0, 0, 0.2);
        }
    
        .cus_select {
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            border: #e8ecef 1px solid;
        }
    
    
    </style>