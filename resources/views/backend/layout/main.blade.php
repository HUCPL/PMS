<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    @stack('title')

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ secure_asset('assets/vendor/fonts/boxicons.css') }}" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ secure_asset('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ secure_asset('assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ secure_asset('assets/css/demo.css')}}" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ secure_asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{ secure_asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
    <link rel="stylesheet" href="{{ secure_asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/css/tags.css') }}">
    <!-- Page CSS -->
    
    <!-- Helpers -->
   
    {{-- tags --}}
    <script src="{{ secure_asset('assets/vendor/js/helpers.js')}}"></script>
    <script src="{{ secure_asset('assets/js/tag.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    {{-- end tags js and css here --}}
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ secure_asset('assets/js/config.js')}}"></script>
   <script src="{{ secure_asset('assets/js/country.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  @laravelPWA
  <body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="{{ route('dashboard') }}" class="app-brand-link">
            <img src="{{ $generaldata->adminlogo_path }}" style="width:120px" alt="logo" />
          </a>
          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>
        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item active">
          <!-- Layouts -->
          {{-- <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Layouts">Layouts</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item">
                <a href="layouts-without-menu.html" class="menu-link">
                  <div data-i18n="Without menu">Without menu</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="layouts-without-navbar.html" class="menu-link">
                  <div data-i18n="Without navbar">Without navbar</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="layouts-container.html" class="menu-link">
                  <div data-i18n="Container">Container</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="layouts-fluid.html" class="menu-link">
                  <div data-i18n="Fluid">Fluid</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="layouts-blank.html" class="menu-link">
                  <div data-i18n="Blank">Blank</div>
                </a>
              </li>
            </ul>
          </li> --}}
          <!--products -->
          @if (Auth::user()->role_as == 10)
            {{-- <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Master</span>
            </li> --}}
            <li class="menu-item active">
              <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            {{-- <li class="menu-item ">
              <a href="{{ route('permmission') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Analytics">Permission</div>
              </a>
            </li> --}}
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings" style="white-space:nowrap;">Property Master</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('masterCategoryPage') }}" class="menu-link">
                    <div data-i18n="Notifications">Property Type</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('featureList') }}" class="menu-link">
                    <div data-i18n="Notifications">Property facilities</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('propertyOutdoor') }}" class="menu-link">
                    <div data-i18n="Notifications">Outdoor Features</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('propertyIndoor') }}" class="menu-link">
                    <div data-i18n="Notifications">Indoor Features</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings" style="white-space:nowrap;">Services Master</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('department') }}" class="menu-link">
                    <div data-i18n="Notifications">Departments</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('services') }}" class="menu-link">
                    <div data-i18n="Notifications">Services</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings" style="white-space:nowrap;">Property Features</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('features') }}" class="menu-link">
                    <div data-i18n="Notifications">Manage Features</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('featuresFilter',['key'=> '0']) }}" class="menu-link">
                    <div data-i18n="Notifications">All Features</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('featuresFilter',['key'=> '1']) }}" class="menu-link">
                    <div data-i18n="Notifications">Features List</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('featuresFilter',['key'=> '2']) }}" class="menu-link">
                    <div data-i18n="Notifications">Special Features List</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('featuresTrashList') }}" class="menu-link">
                    <div data-i18n="Notifications">Features Trash List</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings" style="white-space:nowrap;">Packages</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('packagesList') }}" class="menu-link">
                    <div data-i18n="Notifications">Packages List</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('packages') }}" class="menu-link">
                    <div data-i18n="Notifications">Add Packages</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Authentications">Users Master</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('usersMangement') }}" class="menu-link">
                    <div data-i18n="Basic">Manage Users</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('ownerList') }}" class="menu-link">
                    <div data-i18n="Basic">Owner List</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('helpDeskList') }}" class="menu-link">
                    <div data-i18n="Basic">Support/HelpDesk List</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('siteEngineerList') }}" class="menu-link">
                    <div data-i18n="Basic">siteEngineer List</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('superVisorList') }}" class="menu-link">
                    <div data-i18n="Basic">Supervisor List</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('vendorList') }}" class="menu-link">
                    <div data-i18n="Basic">Vendor List</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings" style="white-space:nowrap;">Property On Board</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('ownerDetails') }}" class="menu-link">
                    <div data-i18n="Notifications">Owner Details</div>
                  </a>
                </li> 
                <li class="menu-item">
                  <a href="{{ route('propertyOnBoard') }}" class="menu-link">
                    <div data-i18n="Notifications">Add New Property</div>
                  </a>
                </li> 
                <li class="menu-item">
                  <a href="{{ route('propertyOnBoardList') }}" class="menu-link">
                    <div data-i18n="Notifications">Property List</div>
                  </a>
                </li> 
                <!--<li class="menu-item">-->
                <!--  <a href="{{ route('unitOnBoard') }}" class="menu-link">-->
                <!--    <div data-i18n="Notifications">Unit On Board</div>-->
                <!--  </a>-->
                <!--</li> -->
                <!--<li class="menu-item">-->
                <!--  <a href="{{ route('subUnitOnBoard') }}" class="menu-link">-->
                <!--    <div data-i18n="Notifications">Sub Unit On Board</div>-->
                <!--  </a>-->
                <!--</li> -->
                <li class="menu-item">
                  <a href="{{ route('approvedPropList') }}" class="menu-link">
                    <div data-i18n="Notifications">Approved Property List</div>
                  </a>
                </li>    
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings" style="white-space:nowrap;">Properties</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('propertyOnBoardList') }}" class="menu-link">
                    <div data-i18n="Notifications">All Properties</div>
                  </a>
                </li> 
                <li class="menu-item">
                  <a href="{{ route('pmsPropList') }}" class="menu-link">
                    <div data-i18n="Notifications">PMS Property</div>
                  </a>
                </li> 
                <li class="menu-item">
                  <a href="{{ route('rentPropList') }}" class="menu-link">
                    <div data-i18n="Notifications">Rent Property</div>
                  </a>
                </li>   
              </ul>
            </li>
            <!--<li class="menu-item">-->
            <!--  <a href="javascript:void(0);" class="menu-link menu-toggle">-->
            <!--    <i class="menu-icon tf-icons bx bx-dock-top"></i>-->
            <!--    <div data-i18n="Account Settings" style="white-space:nowrap;">Task/Queries</div>-->
            <!--  </a>-->
            <!--  <ul class="menu-sub">-->
            <!--    <li class="menu-item">-->
            <!--      <a href="{{ route('superAdminraiseTicket') }}" class="menu-link">-->
            <!--        <div data-i18n="Notifications">Manage Tickets</div>-->
            <!--      </a>-->
            <!--    </li>-->
            <!--    <li class="menu-item">-->
            <!--      <a href="{{ route('hepldeskrassignedTickets') }}" class="menu-link">-->
            <!--        <div data-i18n="Notifications">Assigned tickets</div>-->
            <!--      </a>-->
            <!--    </li>-->
            <!--  </ul>-->
            <!--</li>-->
            {{-- inventary --}}
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings" style="white-space:nowrap;">Inventory</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('productsBrand') }}" class="menu-link">
                    <div data-i18n="Notifications">Brands</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('vendorCategory') }}" class="menu-link">
                    <div data-i18n="Notifications">Category</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('vendorSubCategory') }}" class="menu-link">
                    <div data-i18n="Notifications">Sub Category</div>
                  </a>
                </li>
                <!--<li class="menu-item">-->
                <!--  <a href="#" class="menu-link">-->
                <!--    <div data-i18n="Notifications">Products List</div>-->
                <!--  </a>-->
                <!--</li>-->
                <li class="menu-item">
                  <a href="{{ route('vendorProducts') }}" class="menu-link">
                    <div data-i18n="Notifications">Add New Product</div>
                  </a>
                </li>
              </ul>
            </li>
            {{-- inventory end here --}}
            {{-- <li class="menu-item">
              <a href="{{ route('superAdminraiseTicket') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Analytics">Raised Ticket</div>
              </a>
            </li> --}}
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings" style="white-space:nowrap;">CMS</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('generalSetting') }}" class="menu-link">
                    <div data-i18n="Notifications">General Settings</div>
                  </a>
                </li>
                <!--<li class="menu-item">-->
                <!--  <a href="#" class="menu-link">-->
                <!--    <div data-i18n="Notifications">About US</div>-->
                <!--  </a>-->
                <!--</li>-->
                <!--<li class="menu-item">-->
                <!--  <a href="#" class="menu-link">-->
                <!--    <div data-i18n="Notifications">Contact Us</div>-->
                <!--  </a>-->
                <!--</li>-->

              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings" style="white-space:nowrap;">Recycle Bin</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('usersTrash') }}" class="menu-link">
                    <div data-i18n="Notifications">Users Trash List</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('propertyTrash') }}" class="menu-link">
                    <div data-i18n="Notifications">Property Trash List</div>
                  </a>
                </li>
              </ul>
            </li>
            <!--<li class="menu-item">-->
            <!--  <a href="{{ route('ownerExpenses') }}" class="menu-link">-->
            <!--    <i class="menu-icon tf-icons bx bx-dock-top"></i>-->
            <!--    <div data-i18n="Analytics">Assign To User</div>-->
            <!--  </a>-->
            <!--</li>-->
          @endif 
          @if (Auth::user()->role_as == 3)
            <li class="menu-item active">
              <a href="{{ route('vendorDashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings" style="white-space:nowrap;">Inventory</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div data-i18n="Notifications">Category</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div data-i18n="Notifications">Sub Category</div>
                  </a>
                </li>
                <!--<li class="menu-item">-->
                <!--  <a href="#" class="menu-link">-->
                <!--    <div data-i18n="Notifications">Products List</div>-->
                <!--  </a>-->
                <!--</li>-->
                <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div data-i18n="Notifications">Add New Product</div>
                  </a>
                </li>
              </ul>
            </li>
          @endif
          @if (Auth::user()->role_as == 2)
            <li class="menu-item active">
              <a href="{{ route('siteEngineerDashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings" style="white-space:nowrap;">Property On board</div>
              </a>
              <ul class="menu-sub"> 
                <li class="menu-item">
                  <a href="{{ route('seOnBoardList') }}" class="menu-link">
                    <div data-i18n="Notifications">onBoardList</div>
                  </a>
                </li>   
              </ul>
            </li>
            {{-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Authentications">Assign Tickets</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('siteEngineer') }}" class="menu-link">
                    <div data-i18n="Basic">assign</div>
                  </a>
                </li>
              </ul>
            </li> --}}
          @endif
          @if (Auth::user()->role_as == 4)
            <li class="menu-item active">
              <a href="{{ route('helpDeskDashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Authentications">Tickets</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('hepldeskraiseTicket') }}" class="menu-link">
                    {{-- <i class="menu-icon tf-icons bx bx-dock-top"></i> --}}
                    <div data-i18n="Analytics">Manage Tickets</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('hepldeskrassignedTickets') }}" class="menu-link">
                    <div data-i18n="Basic">Assigned Tickets</div>
                  </a>
                </li>
              </ul>
            </li>
          @endif
          @if (Auth::user()->role_as == 5)
            <li class="menu-item active">
              <a href="{{ route('ownerDashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
                
              </a>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings" style="white-space:nowrap;">Properties</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('propertyList') }}" class="menu-link">
                    <div data-i18n="Notifications">Property List</div>
                  </a>
                </li> 
                <li class="menu-item">
                  <a href="{{ route('addProperty') }}" class="menu-link">
                    <div data-i18n="Notifications">Add New Property</div>
                  </a>
                </li>  
                {{-- <li class="menu-item">
                  <a href="{{ route('unitOnBoard') }}" class="menu-link">
                    <div data-i18n="Notifications">Unit On Board</div>
                  </a>
                </li> 
                <li class="menu-item">
                  <a href="{{ route('subUnitOnBoard') }}" class="menu-link">
                    <div data-i18n="Notifications">Sub Unit On Board</div>
                  </a>
                </li>  --}}
              </ul>
            </li>
            <!--<li class="menu-item">-->
            <!--  <a href="{{ route('ownerExpenses') }}" class="menu-link">-->
            <!--    <i class="menu-icon tf-icons bx bx-dock-top"></i>-->
            <!--    <div data-i18n="Analytics">Expenses</div>-->
            <!--  </a>-->
            <!--</li>-->
            <!--<li class="menu-item">-->
            <!--  <a href="{{ route('raiseTicket') }}" class="menu-link">-->
            <!--    <i class="menu-icon tf-icons bx bx-dock-top"></i>-->
            <!--    <div data-i18n="Analytics">Raised Ticket</div>-->
            <!--  </a>-->
            <!--</li>-->
          @endif
          @if (Auth::user()->role_as == 6)
            <li class="menu-item active">
              <a href="{{ route('housekeeperDashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Authentications">HouseKeeper</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('helpDesk') }}" class="menu-link">
                    <div data-i18n="Basic">Requests</div>
                  </a>
                </li>
              </ul>
            </li>
          @endif
          @if (Auth::user()->role_as == 7)
            <li class="menu-item active">
              <a href="{{ route('superVisorDashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            {{-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Authentications">Properties</div>
              </a>
              <!--<ul class="menu-sub">-->
              <!--  <li class="menu-item">-->
              <!--    <a href="#" class="menu-link">-->
              <!--      <div data-i18n="Basic">Assigned Properies</div>-->
              <!--    </a>-->
              <!--  </li>-->
              <!--</ul>-->
            </li> --}}
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings" style="white-space:nowrap;">Inventory</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div data-i18n="Notifications">Category</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div data-i18n="Notifications">Sub Category</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div data-i18n="Notifications">Products List</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div data-i18n="Notifications">Add New Product</div>
                  </a>
                </li>
              </ul>
            </li>
          @endif 
          @if (!empty($prm))  
            @foreach (explode(',',$prm->page_ID) as $itemID) 
              @if ($itemID == 1)
              <li class="menu-item ">
                <a href="#" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-dock-top"></i>
                  <div data-i18n="Analytics">
                    propertyMaster
                  </div>
                </a>
              </li>
              @elseif ($itemID == 2)
              <li class="menu-item ">
                <a href="#" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-dock-top"></i>
                  <div data-i18n="Analytics">
                    Services Master
                  </div>
                </a>
              </li>
              @elseif ($itemID == 3)
              <li class="menu-item ">
                <a href="#" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-dock-top"></i>
                  <div data-i18n="Analytics">
                    User Master
                  </div>
                </a>
              </li>
              @elseif ($itemID == 4)
              <li class="menu-item ">
                <a href="#" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-dock-top"></i>
                  <div data-i18n="Analytics">
                    Property On Board
                  </div>
                </a>
              </li>        
              @endif
            @endforeach
          @endif
          <li class="menu-header small text-uppercase"><span class="menu-header-text">Accounts</span></li>
          <!-- Forms -->
          {{-- <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="fa-solid fa-gears menu-icon tf-icons"></i>
              <i class="menu-icon tf-icons bx bx-detail"></i>
              <div data-i18n="Form Elements">Account Settings</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="#" class="menu-link">
                  <div data-i18n="Basic Inputs">Account Details</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="#" class="menu-link">
                  <div data-i18n="Input groups">Change Password</div>
                </a>
              </li>
            </ul>
          </li> --}}
          {{-- <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-detail"></i>
              <div data-i18n="Form Layouts">Form Layouts</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="form-layouts-vertical.html" class="menu-link">
                  <div data-i18n="Vertical Form">Vertical Form</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="form-layouts-horizontal.html" class="menu-link">
                  <div data-i18n="Horizontal Form">Horizontal Form</div>
                </a>
              </li>
            </ul>
            </li> --}}
          <!-- Tables -->
          <li class="menu-item">
            <a href="{{ route('adminlogout') }}" class="menu-link">
              <i class="fa-solid fa-right-from-bracket menu-icon tf-icons"></i>
              {{-- <i class="menu-icon tf-icons bx bx-table"></i> --}}
              <div data-i18n="Tables">Logout</div>
            </a>
          </li>
          
          <!-- Misc -->
          {{-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
          <li class="menu-item">
            <a
              href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
              target="_blank"
              class="menu-link"
            >
              <i class="menu-icon tf-icons bx bx-support"></i>
              <div data-i18n="Support">Support</div>
            </a>
          </li>
          <li class="menu-item">
            <a
              href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
              target="_blank"
              class="menu-link"
            >
              <i class="menu-icon tf-icons bx bx-file"></i>
              <div data-i18n="Documentation">Documentation</div>
            </a>
          </li> --}}
        </ul>
      </aside>
      <!-- / Menu -->
 
            <!-- Layout container -->
            <div class="layout-page">
                @include('backend.layout.includes.navbar')
                @yield('content-wrapper')
            <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        <!-- / Layout wrapper -->
        <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ secure_asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{ secure_asset('assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ secure_asset('assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{ secure_asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{ secure_asset('assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ secure_asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{ secure_asset('assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{ secure_asset('assets/js/dashboards-analytics.js')}}"></script>
   / <script src="{{ secure_asset('assets/js/update.js')}}"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (Session::has('adminsuccess'))
    {{-- {{ Session::get("adminsuccess") }} --}}
    <script>
       toastr.options = {
            'progressBar' :true,
            'closeButton':true
          }
      toastr.success('{{ Session::get("adminsuccess") }}',{timeOut:12000})
    </script>
  @endif
  @if (Session::has('adminerror'))
        <script>
              toastr.options = {
                'progressBar' :true,
                'closeButton':true
              }
             toastr.error("{{ Session::get('adminerror') }}",{timeOut:12000})
        </script>
    @endif
  </body>
</html>