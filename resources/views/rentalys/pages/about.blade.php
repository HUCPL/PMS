@extends('rentalys.layout.main')
@push('title')
    <title>Rentalys|About US</title>
@endpush
@section('main-content')
<div class="breadcrumb-wrap breadcrumb-wrap-2">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </nav>
    </div>
</div>
<section class="about-wrap2">
    <div class="container">
        <div class="row flex-row-reverse flex-lg-row">
            <div class="col-xl-6 col-lg-6">
                <div class="about-img">
                    <img src="{{ asset('ren/storage/files/cms/about/5931689853095.png') }}" alt="about" width="746"
                         height="587">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="about-box3 wow fadeInUp" data-wow-delay=".2s">
                    <span class="item-subtitle">About Us</span>
                    <h2 class="item-title">We&#039;re on a Mission to Change View of RealEstate Field.</h2>
                    <p style="text-align: justify;">To provide exceptional property management services that bring peace of mind to property owners and unforgettable rental experiences to customers, through personalized attention, seamless processes, and a commitment to excellences</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="why-choose-wrap1">
    <div class="shape-img1 wow fadeInRight animated" data-wow-delay=".3s"
         style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">
        
    </div>
    <div class="container">
        <div class="item-heading-center mb-20">
            <span class="section-subtitle">People Like Us</span>
            <h2 class="section-title"> Our Mission, vission, Value</h2>
            <div class="bg-title-wrap" style="display: block;">
                <span class="background-title solid"> Mission, vission, Value</span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="choose-box1 wow fadeInUp" data-wow-delay=".2s"
                     style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="choose-shape1">
                        <a href="#">
                            <img src="{{ asset('ren/frontend/img/mis.png')}}" alt="shape" width="59" height="63">
                        </a>
                    </div>
                    <h3 class="item-title">
                        <a href="#">Mission</a>
                    </h3>
                    <p>
                        This is mission of our comapny
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="choose-box1 wow fadeInUp" data-wow-delay=".4s"
                     style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                    <div class="choose-shape1">
                        <a href="index3.html"><img src="{{ asset('ren/frontend/img/vis.png')}}" alt="shape" width="59"
                                                   height="63"></a>
                    </div>
                    <h3 class="item-title">
                        <a href="#">Vision</a>
                    </h3>
                    <p>
                        To be the leading property management partner, recognized for our exceptional service, user-friendly platform, and dedication to creating delightful experiences for both property owners and customers. We aim to revolutionize the rental industry by offering effortless and personalized solutions that set the standard for excellence.
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="choose-box1 wow fadeInUp" data-wow-delay=".6s"
                     style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                    <div class="choose-shape1 choose-shape2">
                        <a href="index3.html">
                            <img src="{{ asset('ren/frontend/img/val.png')}}" alt="shape" width="59" height="63">
                        </a>
                    </div>
                    <h3 class="item-title"><a href="single-listing3.html">values</a></h3>
                    <p>when an unknown printer took galley and scrambled itmakepe spear survived not five
                        centuries</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="team-wrap1 team-wrap2">
    <div class="container">
        <div class="item-heading-center mb-20">
            <span class="section-subtitle">Expertise Is Here</span>
            <h2 class="section-title">Our Exclusive Agetns</h2>
            <div class="bg-title-wrap" style="display: block;">
                <span class="background-title solid">Our Agents</span>
            </div>
        </div>
        <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-box1 team-box2 wow fadeInUp" data-wow-delay=".6s">
                        <div class="item-img">
                            <a href="#">
                                <img src="{{ asset('ren/assets/images/no-image.jpg')}}" alt="team"
                                     height="240" width="240">
                            </a>
                            <div class="category-box">
                                <div class="item-category"><a href="#">08 Listings</a></div>
                            </div>
                        </div>
                        <div class="item-content">
                            <div class="item-title">
                                <h3><a href="#">John Supervisor</a></h3>
                                <h4 class="item-subtitle"><a href="#"></a></h4>
                            </div>
                            <div class="item-contact">
                                <div class="item-icon"><i class="fas fa-phone-alt"></i></div>
                                <div class="item-phn-no">Call: 7868777736</div>
                            </div>
                        </div>
                    </div>
                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-box1 team-box2 wow fadeInUp" data-wow-delay=".6s">
                        <div class="item-img">
                            <a href="#">
                                <img src="{{ asset('ren/assets/images/no-image.jpg')}}" alt="team"
                                     height="240" width="240">
                            </a>
                            <div class="category-box">
                                <div class="item-category"><a href="#">08 Listings</a></div>
                            </div>
                        </div>
                        <div class="item-content">
                            <div class="item-title">
                                <h3><a href="#">Chanchal Kumar</a></h3>
                                <h4 class="item-subtitle"><a href="#"></a></h4>
                            </div>
                            <div class="item-contact">
                                <div class="item-icon"><i class="fas fa-phone-alt"></i></div>
                                <div class="item-phn-no">Call: 8756435876</div>
                            </div>
                        </div>
                    </div>
                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-box1 team-box2 wow fadeInUp" data-wow-delay=".6s">
                        <div class="item-img">
                            <a href="#">
                                <img src="{{ asset('ren/assets/images/no-image.jpg')}}" alt="team"
                                     height="240" width="240">
                            </a>
                            <div class="category-box">
                                <div class="item-category"><a href="#">08 Listings</a></div>
                            </div>
                        </div>
                        <div class="item-content">
                            <div class="item-title">
                                <h3><a href="#">avnish hdfyfhg</a></h3>
                                <h4 class="item-subtitle"><a href="#"></a></h4>
                            </div>
                            <div class="item-contact">
                                <div class="item-icon"><i class="fas fa-phone-alt"></i></div>
                                <div class="item-phn-no">Call: 4567890890</div>
                            </div>
                        </div>
                    </div>
                </div>
                        </div>
    </div>
</section>

<section class="newsletter-wrap1">
    <div class="shape-img1">
        <img src="img/figure/shape13.html" alt="figure" width="356" height="130">
    </div>
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
