<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $('#child_dec').on('click', function () {
        const numberInput = this.parentElement.querySelector('.number');
        var value = parseInt(numberInput.value, 10) + 1;

        $('#dec_' + value).remove();

        console.log(value)
        $adult = document.getElementById('adult-childern');
        $adult.innerText = value - 1
    })
    $('#adult_dec').on('click', function () {
        const numberInput = this.parentElement.querySelector('.number');
        var value = parseInt(numberInput.value, 10) + 1;
        console.log(value)
        $adult = document.getElementById('adultsnumber');
        $adult.innerText = value - 1
    })
    $('#adult_inc').on('click', function () {
        const numberInput = this.parentElement.querySelector('.number');
        var value = parseInt(numberInput.value, 10);
        $adult = document.getElementById('adultsnumber');
        $adult.innerText = value
        console.log(value)
    })
    $('#child_inc').on('click', function () {
        const numberInput = this.parentElement.querySelector('.number');
        var value = parseInt(numberInput.value, 10);
        $child = document.getElementById('adult-childern');
        $child.innerText = value
        // console.log("hi")
        // console.log(value)
        // console.log($adult)
        var html = '';
        var option = '';

        for (let i = 1; i <= 17; i++) {
            option += `<option value="${i}"  data-key="${i}">${i}years old
                            </option>`

        }
        for (let j = 1; j <= value; j++) {
            html = `<div class="col-xl-6 mt-2" id="dec_${j}">
                        <select class="cus_select" name="child[${j}]">
                            <option value="" data-key="" slected>Age needed</option>
                            <option value="0" data-key="0">0 years old
                            </option>
                            <option value="1" data-key="1">1 year old
                            </option>
                            ${option}
                        </select>
                        <span class="spanvalidation fs-8 text-danger"></span>
                    </div>`

        }

        $('#child_age_group').append(html)
    })
    window.onclick = function () {

        ageValidation = document.getElementsByClassName('cus_select');
        if (ageValidation.length > 0) {

            for (let i = 0; i < ageValidation.length; i++) {
                if (ageValidation[i].value == "") {
                    // console.log("hii")
                    spanvalidation = document.getElementsByClassName('spanvalidation');
                    spanvalidation[i].innerText = `Please Select Age`;
                    btn = document.getElementById('filterbtn');
                    btn.setAttribute('disabled', 'disabled');
                } else {
                    spanvalidation = document.getElementsByClassName('spanvalidation');
                    spanvalidation[i].innerText = ``;
                    btn.removeAttribute('disabled');
                }
                // console.log(ageValidation[i].value)
            }
        } else {
            console.log("not Found");
        }

    }
</script>

<script type="text/javascript">
    $('#email_otp').on('change', function () {
        var email = $(this).val();
        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

        if (email.match(validRegex)) {
            $('#show_error_success').show();
            $('.loader').show()
            $('.heloe').hide();

            var route = "https://rentalys.hucpl.com/rentalys/email_opt.html",
                csrf_token = "tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE";

            $.ajax({
                url: route,
                method: "POST",
                data: {'_token': csrf_token, 'email': email},
                success: function (forget_result) {
                    $('.heloe').remove();
                    $('.loader').hide();

                    var response_msg = ` <span class="${(forget_result.type == 'success') ? 'bg-success' : 'bg-danger'} p-1 heloe text-white w-100" style=" border-radius: 5px;">
                                                                         <strong>${forget_result.message}</strong>
                                                                      </span>`;
                    $('#show_error_success').append(response_msg)
                }
            })
        }
    })
</script>
<footer class="footer-area">
    <div class="footer-top footer-top-style">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-logo-area footer-logo-area-2">
                        <div class="item-logo">
                            <img src="{{ asset('ren/frontend/img/logo.png') }}" width="157" height="40" alt="logo"
                                 class="img-fluid">
                        </div>
                        <p>Core ipsum dolor sit amet consent turad pis icing elit, sed do usermod tempor inci didunt ut
                            labore et
                            dolor.pisicing elit, sed do usermod temper inc </p>
                        <div class="item-social">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://vimeo.com/" target="_blank">
                                        <i class="fab fa-vimeo-v"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.pinterest.com/" target="_blank">
                                        <i class="fab fa-pinterest-p"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://web.whatsapp.com/" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-link footer-link-style-2">
                        <div class="footer-title footer-title-style2">
                            <h3>Quick Links</h3>
                        </div>
                        <div class="item-link">
                            <ul>
                                <li>
                                    <a href="#">About Us </a>
                                </li>
                                <li>
                                    <a href="#">Blogs & Articles </a>
                                </li>
                                <li>
                                    <a href="#">Terms & Conditions</a>
                                </li>
                                <li>
                                    <a href="#">Privacy Policy </a>
                                </li>
                                <li>
                                    <a href="#">Contact Us </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-insta">
                        <div class="footer-title footer-title-style2">
                            <h3>Instagram</h3>
                        </div>
                        <div class="insta-link">
                            <ul>
                                <li>
                                    <div class="item-img">
                                        <a href="https://www.instagram.com/" class="insta-pic">
                                            <img src="{{ asset('ren/frontend/img/instagram/insta1.jpg')}}" width="86"
                                                 height="73" alt="instagram">
                                        </a>
                                        <div class="item-overlay">
                                            <a href="https://www.instagram.com/" target="_blank">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-img">
                                        <a href="https://www.instagram.com/" class="insta-pic">
                                            <img src="{{ asset('ren/frontend/img/instagram/insta2.jpg')}}" width="86"
                                                 height="73" alt="instagram">
                                        </a>
                                        <div class="item-overlay">
                                            <a href="https://www.instagram.com/" target="_blank">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-img">
                                        <a href="https://www.instagram.com/" class="insta-pic">
                                            <img src="{{ asset('ren/frontend/img/instagram/insta3.jpg')}}" width="86"
                                                 height="73" alt="instagram">
                                        </a>
                                        <div class="item-overlay">
                                            <a href="https://www.instagram.com/" target="_blank">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-img">
                                        <a href="https://www.instagram.com/" class="insta-pic">
                                            <img src="{{ asset('ren/frontend/img/instagram/insta4.jpg')}}" width="86"
                                                 height="73" alt="instagram">
                                        </a>
                                        <div class="item-overlay">
                                            <a href="https://www.instagram.com/" target="_blank">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-img">
                                        <a href="https://www.instagram.com/" class="insta-pic">
                                            <img src="{{ asset('ren/frontend/img/instagram/insta5.jpg')}}" width="86"
                                                 height="73" alt="instagram">
                                        </a>
                                        <div class="item-overlay">
                                            <a href="https://www.instagram.com/" target="_blank">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-img">
                                        <a href="https://www.instagram.com/" class="insta-pic">
                                            <img src="{{ asset('ren/frontend/img/instagram/insta6.jpg')}}" width="86"
                                                 height="73" alt="instagram">
                                        </a>
                                        <div class="item-overlay">
                                            <a href="https://www.instagram.com/" target="_blank">undefined<i
                                                        class="fab fa-instagram"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-contact footer-contact-style-2">
                        <div class="footer-title footer-title-style2">
                            <h3>Contact</h3>
                        </div>
                        <div class="footer-location">
                            <ul>
                                <li class="item-map">
                                    <i class="fas fa-map-marker-alt"></i>4th Floor, MTML Square, 63 Cybercity, 72201
                                    Ebene, Mauritius

                                </li>
                                <li>
                                    <a href="https://rentalys.hucpl.com/cdn-cgi/l/email-protection#8fe6e1e9e0cfeaf7eee2ffe3eaa1ece0e2">
                                        <i class="fas fa-envelope"></i><span class="__cf_email__" data-cfemail="1c75727a735c6e7972687d70656f327f7371">[email&#160;protected]</span> </a>
                                </li>
                                <li>
                                    <a href="tel:+123596000">
                                        <i class="fas fa-phone-alt"></i>(230) 467 7914 </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom footer-bottom-style-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright-area1">
                        <ul>
                            <li>
                                <a href="#">Terms of Use</a>
                            </li>
                            <li>
                                <a href="#">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="copyright-area2">
                        <p class="fotterlinespan">Copyright &copy; <script>new Date().getFullYear()>2017&&document.write(+new Date().getFullYear());</script> - SkyLabs Solution Pvt. Ltd</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<a href="javascript:void(0)" id="back-to-top">
    <i class="fas fa-angle-double-up"></i>
</a>
</div>
<div id="template-search" class="template-search">
    <button type="button" class="close">×</button>
    <form class="search-form">
        <input type="search" value="" placeholder="Search">
        <button type="submit" class="search-btn btn-ghost style-1">
            <i class="flaticon-search"></i>
        </button>
    </form>
</div>

<!-- Chanchal Code Replace to HTTP TO HTTPS  Start -->
{{-- <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
    if (location.protocol!== 'https:' && location.href.startsWith('http://')) {
        location.replace(`https:${location.href.substring(location.protocol.length)}`);
    }
</script> --}}
<!-- Chanchal Code Replace to HTTP TO HTTPS End -->



<script>
    const sliders = [...document.querySelectorAll(".slider__container")];
    const sliderControlPrev = [...document.querySelectorAll(".slider__control.prev")];
    const sliderControlNext = [...document.querySelectorAll(".slider__control.next")];

    sliders.forEach((slider, i) => {
        let isDragStart = false,
            isDragging = false,
            isSlide = false,
            prevPageX,
            prevScrollLeft,
            positionDiff;

        const sliderItem = slider.querySelector(".slider__item");
        var isMultislide = (slider.dataset.multislide === 'true');

        sliderControlPrev[i].addEventListener('click', () => {
            if (isSlide) return;
            isSlide = true;
            let slideWidth = isMultislide ? slider.clientWidth : sliderItem.clientWidth;
            slider.scrollLeft += -slideWidth;
            setTimeout(function () {
                isSlide = false;
            }, 700);
        });

        sliderControlNext[i].addEventListener('click', () => {
            if (isSlide) return;
            isSlide = true;
            let slideWidth = isMultislide ? slider.clientWidth : sliderItem.clientWidth;
            slider.scrollLeft += slideWidth;
            setTimeout(function () {
                isSlide = false;
            }, 700);
        });

        function autoSlide() {
            if (slider.scrollLeft - (slider.scrollWidth - slider.clientWidth) > -1 || slider.scrollLeft <= 0) return;
            positionDiff = Math.abs(positionDiff);
            let slideWidth = isMultislide ? slider.clientWidth : sliderItem.clientWidth;
            let valDifference = slideWidth - positionDiff;
            if (slider.scrollLeft > prevScrollLeft) {
                return slider.scrollLeft += positionDiff > slideWidth / 5 ? valDifference : -positionDiff;
            }
            slider.scrollLeft -= positionDiff > slideWidth / 5 ? valDifference : -positionDiff;
        }

        function dragStart(e) {
            if (isSlide) return;
            isSlide = true;
            isDragStart = true;
            prevPageX = e.pageX || e.touches[0].pageX;
            prevScrollLeft = slider.scrollLeft;
            setTimeout(function () {
                isSlide = false;
            }, 700);
        }

        function dragging(e) {
            if (!isDragStart) return;
            e.preventDefault();
            isDragging = true;
            slider.classList.add("dragging");
            positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
            slider.scrollLeft = prevScrollLeft - positionDiff;
        }

        function dragStop() {
            isDragStart = false;
            slider.classList.remove("dragging");
            if (!isDragging) return;
            isDragging = false;
            autoSlide();
        }

        addEventListener("resize", autoSlide);
        slider.addEventListener("mousedown", dragStart);
        slider.addEventListener("touchstart", dragStart);
        slider.addEventListener("mousemove", dragging);
        slider.addEventListener("touchmove", dragging);
        slider.addEventListener("mouseup", dragStop);
        slider.addEventListener("touchend", dragStop);
        slider.addEventListener("mouseleave", dragStop);
    });
</script>
<script src="{{ asset('ren/frontend/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{ asset('ren/frontend/js/popper.min.js')}}"></script>
<script src="{{ asset('ren/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('ren/frontend/js/wow.min.js')}}"></script>
<script src="{{ asset('ren/frontend/vendor/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{ asset('ren/frontend/js/swiper-bundle.min.js')}}"></script>
<script src="{{ asset('ren/frontend/js/jquery.appear.min.js')}}"></script>
<script src="{{ asset('ren/frontend/js/jquery.magnific-popup.min.js')}}"></script>

<script src="{{ asset('ren/frontend/js/jquery.nice-select.min.js')}}"></script>

<script src="{{ asset('ren/frontend/js/parallaxie.js')}}"></script>
<script src="{{ asset('ren/frontend/js/tween-max.js')}}"></script>
<script src="{{ asset('ren/frontend/js/appear.min.js')}}"></script>
<script src="{{ asset('ren/frontend/js/isotope.pkgd.min.js')}}"></script>
<script src="{{ asset('ren/frontend/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{ asset('ren/frontend/vendor/noUiSlider/nouislider.min.js')}}"></script>
<script src="{{ asset('ren/frontend/vendor/noUiSlider/wNumb.js')}}"></script>
<script src="{{ asset('ren/frontend/js/validator.min.js')}}"></script>
<script src="{{ asset('ren/frontend/js/pannellum.js')}}"></script>
<script src="{{ asset('ren/frontend/js/jquery.zoom.min.js')}}"></script>
<script src="{{ asset('ren/frontend/js/main.js')}}"></script>


<script src="{{ asset('ren/frontend/js/custom.js')}}"></script>


<script src="../unpkg.com/gijgo%401.9.11/js/gijgo.min.html" type="text/javascript"></script>

<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&amp;key=AIzaSyBRuKCcoasqUoVIEyaM7ouVZV1KpZAcz8s"></script>
<script type="text/javascript" src="public/frontend/js/location_map.js"></script>


<script type="text/javascript" src="../../cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="../../cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="../../cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>



<script type="text/javascript"
        src="../../cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>

<!-- News Latter Message Show -->


<!-- News Latter Message Show -->


<!--  new code -->
<script>
    function property_compare(that) {
        var property_id = that.getAttribute('data-property_id'),
            system_ip = that.getAttribute('data-system_ip'),
            route = that.getAttribute('data-route'),
            csrf_token = "tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE";

        $.ajax({
            url: route,
            method: "POST",
            data: {
                '_token': csrf_token,
                'property_id': property_id,
                'system_ip': system_ip
            },
            success: function (return_data) {
                if (return_data.type == 'success') {
                    Swal.fire(
                        'Property Compare!',
                        return_data.message,
                        'success'
                    )
                } else if (return_data.type == 'error') {
                    Swal.fire(
                        'Property Compare!',
                        return_data.message,
                        'warning'
                    )
                }
            },
            error: function (e) {
                console.log(e)
            }
        });
    }

    function remove_compare(that) {
        var property_id = that.getAttribute('data-property_id'),
            system_ip = that.getAttribute('data-system_ip'),
            route = that.getAttribute('data-route'),
            csrf_token = "tQUYl1vXCPIteWknYqEt1pkYqemKnRXwzhZwqaGE";

        $.ajax({
            url: route,
            method: "POST",
            data: {
                '_token': csrf_token,
                'property_id': property_id,
                'system_ip': system_ip
            },
            success: function (return_data) {
                if (return_data.type == 'success') {
                    Swal.fire(
                        'Property Compare!',
                        return_data.message,
                        'success'
                    )
                    window.location.reload()
                } else if (return_data.type == 'error') {
                    Swal.fire(
                        'Property Compare!',
                        return_data.message,
                        'warning'
                    )
                }
            },
            error: function (e) {
                console.log(e)
            }
        });
    }
</script>

<!-- date range in date-picker -->
<script type="text/javascript">
    // $('#checkindate').on('click',function (){
    //     console.log('hello');
    // })


    $('#checkindate').daterangepicker({
        minDate: new Date(),
        autoApply: true,
    });

    $('#checkindate').on('apply.daterangepicker', function (ev, picker) {
        var choose_date = picker.startDate.format('YYYY-MM-DD') + " to " + picker.endDate.format('YYYY-MM-DD')
        $('#check_in_input_id').val(choose_date)
    });

    function add_wishlist(that) {
        let product_id = $(that).attr('data-product-id')
        let product_unit_id = $(that).attr('data-product-unit-id')
        let register_id = $(that).attr('data-user-id')
        let route = $(that).attr('data-route')
        let token = $(that).attr('data-token')

        // console.log(product_id + '/' + product_unit_id + '/' + register_id)

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success mx-3',
                cancelButton: 'btn btn-danger mx-3'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, add it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: route,
                    method: 'POST',
                    data: {
                        "_token": token,
                        'property_id': product_id,
                        'property_unit_id': product_unit_id,
                        'register_user_id': register_id
                    },
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (data) {
                        swalWithBootstrapButtons.fire(
                            'Success!',
                            'This property has been added.',
                            'success'
                        )
                        window.location.reload();
                        $(that).attr('data-bs-original-title', data.message)
                        $(that).attr('href', data.url)
                    }
                })

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'This property not add :)',
                    'error'
                )
            }
        })

    }

    function remove_wishlist(that) {
        let product_id = $(that).attr('data-product-id')
        let product_unit_id = $(that).attr('data-product-unit-id')
        let register_id = $(that).attr('data-user-id')
        let route = $(that).attr('data-route')
        let token = $(that).attr('data-token')

        // console.log(product_id + '/' + product_unit_id + '/' + register_id)

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success mx-3',
                cancelButton: 'btn btn-danger mx-3'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: route,
                    method: 'POST',
                    data: {
                        "_token": token,
                        'property_id': product_id,
                        'property_unit_id': product_unit_id,
                        'register_user_id': register_id
                    },
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (data) {
                        swalWithBootstrapButtons.fire(
                            'Success!',
                            'This property has been added.',
                            'success'
                        )
                        window.location.reload();
                        $(that).attr('data-bs-original-title', data.message)
                        $(that).attr('href', data.url)
                    }
                })

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'This property not add :)',
                    'error'
                )
            }
        })

    }

    function add_cart(that) {
        let product_id = $(that).attr('data-product-id')
        let product_unit_id = $(that).attr('data-product-unit-id')
        let register_id = $(that).attr('data-user-id')
        let route = $(that).attr('data-route')
        let token = $(that).attr('data-token')

        $.ajax({
            url: route,
            method: 'POST',
            data: {
                "_token": token,
                'property_id': product_id,
                'property_unit_id': product_unit_id,
                'register_user_id': register_id
            },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                $(that).attr('data-bs-original-title', data.message)
                $(that).attr('href', data.url)
                $('.count_add1').text(data.count_cart)
            }
        })
    }

</script>


<!-- index offer script -->
<script>
    $(document).ready(function () {
        $("#testimonial-slider").owlCarousel({
            items: 2,
            itemsDesktop: [1000, 2],
            itemsDesktopSmall: [990, 2],
            itemsTablet: [768, 1],
            pagination: true,
            navigation: true,
            slideSpeed: 1000,
            autoPlay: true,
            nav: true,
        });
    });
</script>

<!-- increase  decrease-->
<script>
    function increaseValue(button, limit) {
        const numberInput = button.parentElement.querySelector('.number');
        var value = parseInt(numberInput.value, 10);
        if (isNaN(value)) value = 0;
        if (limit && value >= limit) return;
        var change_data = numberInput.value = value + 1;
        property_list_search(change_data)

    }


    function decreaseValue(button) {
        const numberInput = button.parentElement.querySelector('.number');
        var value = parseInt(numberInput.value, 10);
        if (isNaN(value)) value = 0;
        if (value < 1) return;
        var change_data = numberInput.value = value - 1;

        property_list_search(change_data)
    }

    function property_list_search(that) {

        $('#adult_child_data').val()
        // console.log(that)
    }

    function get_change_data(that) {
        var kitchen = $('#kitchen').val(),
            bathroom = $('#bathroom').val(),
            bedroom = $('#bedroom').val(),

            adult = $('#adult').val(),
            child = $('#child').val();


        if (that == 'ad_ch') {
            let value_data = adult + ' Adult ' + child + ' Child';
            $('#adult_child_data').val(value_data)

        } else if (that == 'be_ba_ki') {
            let value_data = bedroom + ' Bad Room ' + bathroom + ' Bathroom ' + kitchen + ' kitchen';
            $('#input_bath_show').val(value_data)

        }


    }
</script>
