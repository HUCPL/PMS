<header class="ltn__header-area ltn__header-5 ltn__header-transparent--- gradient-color-4---">
    <div class="ltn__header-top-area section-bg-6 top-area-color-white---">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <div class="ltn__top-bar-menu">
              <ul>
                <li><a href="#"><i class="icon-mail"></i> info@property.com</a></li>
                <li><a href="#"><i class="icon-placeholder"></i> New Delhi, India</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-5">
            <div class="top-bar-right text-end">
              <div class="ltn__top-bar-menu">
                <ul>                     
                  <li>
                    <div class="ltn__social-media">
                      <ul>
                        <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" title="Dribbble"><i class="fab fa-dribbble"></i></a></li>
                      </ul>
                    </div>
                  </li>
                </ul> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="site-logo-wrap">
              <div class="site-logo">
                <a href="{{ route('homePage') }}">
                  @if (!empty($generaldata))
                    <img src="{{ $generaldata->adminlogo_path}}" alt="Logo" style="height:90px;">
                  @else
                    PMS 
                  @endif
                 </a>
              </div>
              <div class="get-support clearfix d-none">
                <div class="get-support-icon"><i class="icon-call"></i></div>
                <div class="get-support-info">
                  <h6>Get Support</h6>
                  <h4><a href="tel:+123456789">123-456-789-10</a></h4>
                </div>
              </div>
            </div>
          </div>
          <div class="col header-menu-column">
            <div class="header-menu d-none d-xl-block">
              <nav>
                <div class="ltn__main-menu">
                  <ul>
                    <li><a href="{{ route('homePage') }}">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="#">Resources</a>
                      <ul>
                        <li><a href="faq.php">FAQ</a></li>
                        <li><a href="#">Refer</a></li>
                      </ul>
                    </li>                        
                    <li><a href="contact.php">Contact</a></li>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
          <div class="col ltn__header-options ltn__header-options-2 mb-sm-20">
            <div class="header-search-wrap">
              <div class="header-search-1">
                <div class="search-icon"><i class="icon-search for-search-show"></i><i class="icon-cancel  for-search-close"></i></div>
              </div>
              <div class="header-search-1-form">
                <form id="#" method="get" action="#"><input type="text" name="search" value="" placeholder="Search here..." /><button type="submit"><span><i class="icon-search"></i></span></button></form>
              </div>
            </div>
            <div class="ltn__drop-menu user-menu">
              <ul>
                <li><a href="#"><i class="icon-user"></i></a>
                  <ul>
                    @if (Auth::check())
                       <li><a href="{{ route('adminlogout') }}">Logout</a></li>
                    @else
                        {{-- <li><a href="{{ route('ownerLogin') }}">Login</a></li>
                        <li><a href="{{ route('superVisorLogin') }}">superVisor</a></li>
                        <li><a href="{{ route('siteengineerLogin') }}">SiteEngineer</a></li>
                        <li><a href="{{ route('housekeeperLogin') }}">HouseKeeper</a></li> --}}
                        <li><a href="{{ route('vendorLogin') }}">Login</a></li>
                        <li><a href="{{ route('registerPage') }}">Register</a></li>
                        {{-- <li><a href="{{ route('helpDeskLogin') }}">HelpDesk</a></li>                        --}}
                    @endif
                  </ul>
                </li>
              </ul>
            </div>
            <div class="mobile-menu-toggle d-xl-none"><a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle"><svg viewBox="0 0 800 600">
                  <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                  <path d="M300,320 L540,320" id="middle"></path>
                  <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                </svg></a>
              </div>
          </div>
        </div>
      </div>
    </div>
  </header>