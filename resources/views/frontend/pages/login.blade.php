{{-- @extends('frontend.layout.main')
@push('title')
    <title>PMS|Login</title>
@endpush
@section('main-content')
<div class="ltn__utilize-overlay"></div>
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bs-bg="img/bg/14.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title"> Agent Login </h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="index.php"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li> Agent Login </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ltn__login-area pb-110">
    <div class="container">           
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="account-login-inner">
                    <form action="#" class="ltn__form-box contact-form-box">
                        <input type="text" name="firstname" placeholder="First Name" required>
                        <input type="password" name="confirmpassword" placeholder=" Password*" required>                         
                         <label class="checkbox-inline">
                            <input type="checkbox" value="">
                            I consent to Herboil processing my personal data in order to send personalized marketing material in accordance with the consent form and the privacy policy.
                        </label>
                        <br><br>
                        <div>
                            <button class="theme-btn-1 btn reverse-color btn-block" type="submit">CREATE ACCOUNT</button>
                        </div>                            
                    </form>                        
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
                        <h1>Looking for a dream home?</h1>
                        <p>We can help you realize your dream of a new home</p>
                    </div>
                    <div class="btn-wrapper">
                        <a class="btn btn-effect-3 btn-white" href="contact.php">Explore Properties <i class="icon-next"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection --}}
@extends('frontend.layout.main')
@push('title')
    <title>PMS|Login</title>
@endpush
@section('main-content')
<div class="ltn__utilize-overlay"></div>
<!-- <div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bs-bg="img/bg/14.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title"> Agent Login </h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li class="mt-0"><a href="index.php"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li class="mt-0"> Agent Login </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="ltn__login-area pb-110" >
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="account-login-inner">
                    <form action="#" class="ltn__form-box contact-form-box">
                        <img style="width:180px; display:block; margin:0px auto" src="{{ asset('fontassets/img/ll.png') }}" alt="logo" />
                        <h3 class="mb-0">Sign-In</h3>
                        <p class="mb-2" style="margin-top:10px; line-height:19px">Access the PMS portal using your email and password.</p>
                        <label>Email</label>
                        <input type="text" name="Enter Your Email" placeholder="First Name" required>
                        <div class="d-flex justify-content-between">
                        <label>Password</label>
                            <a hre="#" style="cursor:pointer">Forgot Password?</a>
                        </div>
                        <input type="password" name="confirmpassword" placeholder=" Enter Your Password" required>
                         <!-- <label class="checkbox-inline">
                            <input type="checkbox" value="">
                            I consent to Herboil processing my personal data in order to send personalized marketing material in accordance with the consent form and the privacy policy.
                        </label>
                        <br><br> -->
                        <div>
                            <button class="theme-btn-1 btn reverse-color btn-block" style="background:#d22e35; width:100%;height:44px; line-height:8px" type="submit">Login</button>
                        </div>
                        <div class="mt-5">
                            <div class="loginWithOpt position-relative">
                                <div class="line"></div>
                                <span>Login with</span>
                            </div>
                        </div>
                        <div class="loginWithImagges mt-4">
                            <a href="">
                                <img src="{{ asset('fontassets/img/google.jpg') }}" alt="google plus" />
                            </a>
                        </div>
                        <p class="text-center mt-2">Don't have account? <a href="#">Create an account</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ltn__call-to-action-area call-to-action-6 before-bg-bottom" data-bs-bg="{{ asset('fontassets/img/1.jpg') }}--">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="call-to-action-inner call-to-action-inner-6 ltn__secondary-bg position-relative text-center---">
                    <div class="coll-to-info text-color-white">
                        <h1>Looking for a dream home?</h1>
                        <p>We can help you realize your dream of a new home</p>
                    </div>
                    <div class="btn-wrapper">
                        <a class="btn btn-effect-3 btn-white" href="contact.php">Explore Properties <i class="icon-next"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    input[type="text"], input[type="email"], input[type="password"]{
        height:44px; margin-bottom:12px;
    }
    .line{ height:1px; width:165px; background:red; margin:0px auto; display:block}
    .loginWithOpt span{position: absolute;    transform: translate(-50%, -50%);
    top: 0px;
    left: 50%;
    background: #fff;
    padding: 0px 18px;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px; border-radius:10px; border-radius:16px}
    .loginWithImagges{ display:flex; justify-content:center; align-items:center}
    .loginWithImagges img{     height: 50px;
    width: 50px;
    border-radius: 50px;}
    .ltn__login-area {
        background:url({{ asset('fontassets/img/b-shapered.png') }});background-size:cover;
    }
    .contact-form-box{ background:#fff; padding:14px 40px 40px; border-radius:10px;}
    header, .before-bg-bottom, footer{ display:none;}
    .account-login-inner{    margin-top: 20px; border-radius:10px;
    margin-bottom: 20px;    width: 80%;
    margin: 20px auto;}
</style>
@endsection