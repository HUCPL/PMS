@extends('rentalys.layout.main')
@push('title')
    <title>Rentalys|Contact US</title>
@endpush
@section('main-content')
<div class="breadcrumb-wrap">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="https://rentalys.hucpl.com/rentalys">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
        </nav>
    </div>
</div>
<!--=====================================-->
<!--=   contact    Start                =-->
<!--=====================================-->

<section class="contact-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                                        <div class="contact-box1">
                        <div class="contact-img">
                            <img src="public/storage/files/cms/contact/2311689835474.png" alt="contact"
                                 height="502"
                                 width="607">
                        </div>
                        <div class="contact-content">
                            <h3 class="contact-title">Office Information</h3>
                            <div class="contact-list">
                                <ul>
                                    <li>Homlisti Real Estate Agency</li>
                                    <li>(United Estate Of America) Co., Ltd.
#25 Jocker Goru Zhong Road,</li>

                                    <li>200026</li>

                                </ul>
                            </div>
                            <div class="phone-box">
                                <div class="item-lebel">Emergency Call :</div>
                                <div class="phone-number">+86 21 6137 9292</div>
                                <div class="item-icon"><i class="fas fa-phone-alt"></i></div>
                            </div>
                        </div>
                    </div>
                                </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-box2">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d116878.45300534296!2d90.4195470442074!3d23.731268144494663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1635221509729!5m2!1sen!2sbd" width="600" height="550" style="border:0;" allowfullscreen=""
                            loading="lazy"></iframe>
                    <div class="contact-content">
                        <h3 class="contact-title">Quick Contact</h3>
                        <p>Quick Contact
Borem ipsum dolor sit amet conse ctetur adipisicing elit sed do eiusmod Eorem ipsum dolor sit amet conse ctetur.
                        </p>
                        <form action="https://rentalys.hucpl.com/rentalys/enquiry" class="contact-box " method="post"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE">                                <div class="row">
                                <div class="form-group col-lg-6">
                                    <label>Name *</label>
                                    <input type="text" class="form-control" name="name" placeholder="First Name*"
                                           data-error="First Name is required" required="">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Phone *</label>
                                    <input type="tel" class="form-control" name="mobile_no" placeholder="Mobile_no"
                                           data-error="Phone is required" required="">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Email *</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email"
                                           data-error="Phone is required" required="">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Message *</label>
                                    <textarea name="message" id="message" class="form-text" placeholder="Message"
                                              cols="30" rows="5" data-error="Message Name is required"
                                              required=""></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <button type="submit" class="item-btn">Send message</button>
                                </div>
                            </div>
                            <div class="form-response"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
