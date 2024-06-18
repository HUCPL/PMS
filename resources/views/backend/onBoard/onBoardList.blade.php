@extends('backend.layout.main')
@push('title')
    <title>Admin|OnBoard List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- include summernote css/js -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.css" rel="stylesheet">
    <style>
        /* .label {
          padding: 4px 6px;
          line-height: 190%;
          outline-style: none;
          transition: all .6s;
        }  
        .hiddenCB input[type="checkbox"],
        .hiddenCB input[type="radio"] {
          display: none;
        }
      
        .label {
          cursor: pointer;
          color:#8592A3;
          border: 1px solid #8592A3;
          border-radius:5px;
          padding-left:20px;
          padding-right:20px;
          margin-top: 1%;
        }
      
        .hiddenCB input[type="checkbox"]+label:hover{
          background: #696CFF;
          border:none;
          color:white;
        }
      
        .hiddenCB input[type="checkbox"]:checked+label {
          background: #696CFF;
          border:none;
          color:white;
        } */
    
      .hiddenCB input[type="checkbox"]:checked+label:hover{
        background: #696CFF;
        border:none;
        color:white;
      }
      .scrl::-webkit-scrollbar {
        width: 4px;
      }
      
      .scrl::-webkit-scrollbar-track{
        box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius:10px; 
      }
      
      .scrl::-webkit-scrollbar-thumb {
        background-color: #696CFF;
        border-radius:10px; 
        /* outline: 1px solid rgb(21, 73, 124); */
      }
      .mc table tr td{ font-size:12px}
      .mc table tr td:first-child{ width:200px; }
      /* .viewModelTabsDesign .modal-content{
        background: #fef5f5;
       
      } */
      .mc
      {
        background: #fef5f5;
      }
      .mc .cc .cr
      {
        box-sizing: border-box;
          padding: 20px; background:#fff;
          border-radius: 10px;
          margin-bottom: 40px;}
          .viewModelTabsDesign .container .row h6{ padding-left: 0px;
          margin-bottom: 18px;
          font-weight: bold;
          color: c90908;
          font-size: 15px;}
          .viewModelTabsDesign .modal-title{ margin-left:13px}
          .viewModelTabsDesign .container .row:last-child {
          margin-bottom: 0px;
      }
      .staticHeight img
      {
          max-height: 300px;
          height:100%;
          object-fit: cover;

      }
    </style>
    <style>
      .check {
          height:100px;
          overflow-y: overlay;
          /* padding-top:20px;*/
          overflow-x: hidden;
      }
      .hideInput9876 input{ display: none}
      .hideInput9876 label{margin-right: 17px}
      .hideInput9876 .col-md-4{ text-wrap: nowrap; margin-bottom: 5px}
      .check input[type="checkbox"] {
          visibility: hidden;
      }
     .check {flex-wrap: wrap;}
     .check > div { margin-left: 10px}
     .check input[type="checkbox"]+label:before {
          border: 1px solid #d61b1a;
          border-radius: 3px;
          content: "\00a0";
          display: inline-block;
          font: 16px/1em sans-serif;
          height: 16px;
          margin: 0 .25em 0 0;
          padding: 0;
          vertical-align: top;
          width: 16px;
          box-shadow: 0 0.125rem 0.25rem 0 rgba(105, 108, 255, 0.4);
      }
      .check input[type="checkbox"]:checked+label:before {
          background: #d61b1a;
          color: white;
          content: "\2713";
          text-align: center;
      }
      .scrl::-webkit-scrollbar {
    width: 4px;
  }
  .scrl::-webkit-scrollbar-track{
    box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    border-radius:10px; 
  }
  .scrl::-webkit-scrollbar-thumb {
    background-color: #d61b1a;
    border-radius:10px; 
    /* outline: 1px solid rgb(21, 73, 124); */
  }
  .dnone
  {
    display: none;
  }

  #propImages > div, #inspImages > div{
    position: relative;
    height: 0;
    padding-bottom: 57%; /* Set the desired aspect ratio (e.g., 4:3 = 75%) */
    overflow: hidden;
}

#propImages > div img, #inspImages > div img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover; /* Maintain aspect ratio and cover container */
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
<style>

</style>
@section('content-wrapper')
<div class="content-wrapper">
    <!-- Content -->
    
 <!-- Include jQuery (required by Summernote) -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <!-- Include Summernote JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.js"></script>

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            
            <!-- Basic -->
            <div class="col-md-12">  
            <div class="card mb-4" style="overflow:scroll; -">
                {{-- <div class="d-flex p-4 justify-content-start">
                      <h5 class="card-header">Users Lists</h5>
                </div> --}}
                <div class="d-flex p-4 justify-content-end">
                  @if (Auth::user()->role_as == 2)
                        <a href="#" class="btn btn-primary">Filter</a>
                  @elseif (Auth::user()->role_as == 10)
                        <a href="{{ route('propertyOnBoard') }}" class="btn btn-primary">Add onBoard</a>
                  @elseif (Auth::user()->role_as == 5)  
                         <a href="{{ route('addProperty') }}" class="btn btn-primary">Add onBoard</a>    
                  @endif      
                </div>
              <div class="card-body demo-vertical-spacing demo-only-element">
                {{-- @if ($userDetails->isNotEmpty()) --}}
                @if ($onBoardProperties->isNotEmpty())
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">SrNo.</th>
                      <th scope="col" style="white-space: nowrap">Owner Name</th>
                      <th scope="col">Property Name</th>
                      <th scope="col">Aggrement_ID</th>
                      {{-- <th scope="col">Aggrement_from</th>
                      <th scope="col">Aggrement_to</th> --}}
                      <th scope="col">Packages</th>
                      <th scope="col">Status</th>
                      @if (!isset($key))
                      <th scope="col">Property_for</th>
                      @else
                      <th scope="col">City</th>
                      @endif
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                    @php
                     $i = 1;
                    @endphp
                    @foreach ($onBoardProperties as $onBoard)
                         {{-- <a data-units="@if(!empty($onBoard->units)){{print_r($onBoard->units)}}@endif" href="#">@if(!empty($onBoard->units))
                             @foreach ($onBoard->units as $itemUnits)
                                    {{ $itemUnits->unit_name}}<br>
                             @endforeach
                          @endif</a> --}}
                      <tr>
                         @if (!empty($onBoard->units->unit_name))
                            {{  $onBoard->units->unit_name }}<br>
                         @endif
                         @if (!empty($onBoard->subUnits->unit_name))
                         {{  $onBoard->subUnits->unit_name }}<br>
                         @endif
                        <th scope="row" style="font-size:1rem">{{ $i++ }}</th>
                        <td style="font-size:1rem">
                            @if(!empty($onBoard->ownerDetails->name))
                               {{ $onBoard->ownerDetails->name}} 
                            @endif
                            </td>
                        <td style="font-size:1rem">{{ $onBoard->propertyName }}</td>
                        <td style="font-size:1rem">{{ $onBoard->aggrement_id }}</td>
                        {{-- <td style="font-size:1rem">{{ $onBoard->aggrement_start_date }}</td>
                        <td style="font-size:1rem">{{ $onBoard->aggrement_end_date }}</td> --}}
                        <td style="font-size:1rem">
                          @if (!empty($onBoard->packages->packages_name))
                              {{ $onBoard->packages->packages_name }}
                          @else
                              No Packages
                          @endif
                        </td>
                        <td style="font-size:1rem">
                          @if ($onBoard->isApproved == 1)
                              <span style="color:#ffab00;"><a style="cursor:pointer;white-space:nowrap;">Under Reviews</a></span>
                          @elseif ($onBoard->isApproved == 0)
                          <span style="color:green;"><a style="cursor:pointer;white-space:nowrap;">Apprroved</a></span>
                          @elseif ($onBoard->isApproved == 2)
                          <span style="color:red;"><a style="cursor:pointer;white-space:nowrap;">Not Approved</a></span>
                          @endif
                        </td>
                        @if (!isset($key))
                        <td style="font-size:1rem">
                            @if ($onBoard->property_for == 0)
                                Rent
                            @elseif ($onBoard->property_for == 1)
                                Pms
                            @elseif($onBoard->property_for == 2)  
                                Both  
                            @endif
                        </td>
                        @else
                        <td style="font-size:1rem">
                          {{ $onBoard->city }}
                        </td>
                        @endif
                        {{-- <td style="font-size:1rem">
                          @if ($onBoard->file_path != 'No Url') 
                            <img src="{{url('/').$onBoard->file_path }}" style="width:40px; height:40px;">
                          @else
                              No Image
                          @endif
                        </td> --}}
                        {{-- site-engineer --}}
                        <td style="white-space: nowrap;">
                          <div class="d-flex flex-lg-wrap justify-around">
                          @if (Auth::user()->role_as == 10)
                          <a class="btn btn-danger mb-2" style="color:white;" href="{{ route('deletePropertyOnBoard',['id'=>$onBoard->id])}}"><i class="fa-solid fa-trash "></i></a>&nbsp;
                            <a href="{{ route('updatePropertyOnBoard',['id'=>$onBoard->id]) }}" class="btn btn-primary mb-2 edituser" style="color:white;" ><i class="fa-solid fa-pen-to-square"></i></a>
                          @endif
                          @if (Auth::user()->role_as == 2 || Auth::user()->role_as == 10)
                          <a class="btn btn-warning siteenginner mb-2" style="color:white; margin-left:3px;" href="#" data-bs-toggle="modal"                        data-bs-target="#exLargeModal" data-propname="{{ $onBoard->propertyName }}"  data-propType = "{{ $onBoard->masterCategory->category_name }}" data-propaddress="{{ $onBoard->propertyAddress }}" data-propcountry="{{ $onBoard->country }}" data-propstate="{{ $onBoard->state }}" data-propcity = "{{ $onBoard->city }}" data-sqrmeter = "{{ $onBoard->sqr_meter }}" data-sqrfeet = "{{ $onBoard->sqr_feet }}" data-constyear = "{{ $onBoard->construction_year }}" data-renovyear = "{{ $onBoard->renovation_year }}" data-proproom ="{{ $onBoard->rooms }}" data-floor="{{ $onBoard->floor }}" data-proputl = "{{ $onBoard->property_utility }}" data-propoutdoorfeatures = "{{ $onBoard->outdoor_features	}}" data-indoorfeatures = "{{ $onBoard->indoor_feature }}" data-aggrementstart = "{{ $onBoard->aggrement_start_date }}" data-aggreenddate="{{ $onBoard->aggrement_end_date }}" data-propphone="{{ $onBoard->phone }}" data-propemail = "{{ $onBoard->email }}" data-nearby = "{{ $onBoard->near_by }}" data-ownername="{{ $onBoard->ownerDetails->name }}" data-owneremail= "{{ $onBoard->ownerDetails->email }}" data-ownerphone="{{ $onBoard->ownerDetails->number }}" data-proppincode = "{{ $onBoard->zipcode }}" data-propfor = "{{ $onBoard->property_for }}" data-packages=@if(!empty($onBoard->packages->packages_name)){{ $onBoard->packages->packages_name }} @else {{ 'No Package' }} @endif data-packtype = "@if(!empty($onBoard->packages->packages_type)){{ $onBoard->packages->packages_type }} @else {{ 'No Package' }} @endif" data-services="@if(!empty($onBoard->packages->services)){{ $onBoard->packages->services }} @else {{ 'No Package' }} @endif" data-pacamount="@if(!empty($onBoard->packages->amount)){{ $onBoard->packages->amount }} @else {{ 'No Package' }} @endif" data-units="@if(!empty($onBoard->units)){{ $onBoard->units }}@endif" ><i class="fa-solid fa-eye"></i></a>&nbsp;
                            <a  class="btn btn-primary approveProperty mb-2" style="color:white;" data-owner="{{ $onBoard->OwnerID  }}" data-remarks = "{{$onBoard->remarks}}" data-isApproved = "{{$onBoard->isApproved}}" data-id = "{{ $onBoard->id }}" data-aggdate="{{ $onBoard->construction_year }}" data-addend="{{ $onBoard->renovation_year }}"  data-packagesID="@if(!empty($onBoard->packages->packages_name)){{ $onBoard->packages->packages_name }} @else {{ 'No Package' }} @endif" data-bs-toggle="modal" data-properID="{{ $onBoard->id }}" data-pacamount="@if(!empty($onBoard->packages->amount)){{ $onBoard->packages->amount }} @else {{ 'No Package' }} @endif" 
                            data-bs-target="#updatelargeModal"><i class="fa-solid fa-person-circle-check"></i></a>&nbsp;
                            <!-- inspection Modal link -->
                            @if (Auth::user()->role_as == 10)
                            <a  class="btn btn-primary inspectionImages mb-2" style="color:white;" data-propImages="{{ $onBoard->file_path }}"
                              data-propInspection ="@if(!empty($onBoard->insp_file_path)){{ $onBoard->insp_file_path }}@endif" data-bs-toggle="modal" data-bs-target="#exxLargeModal"><i class="fa-solid fa-circle-info" ></i></a>
                            @endif
                            <!-- Inspection Modal End Here --> 
                            @elseif (Auth::user()->role_as == 5)
                        <a class="btn btn-danger" style="color:white;" href="{{ route('deleteProperty',['id'=>$onBoard->id])}}"><i class="fa-solid fa-trash"></i></a>&nbsp;
                          <a href="{{ route('updateProperty',['id'=>$onBoard->id]) }}" class="btn btn-primary edituser" style="color:white;" ><i class="fa-solid fa-circle-info"></i></a><br>
                          
                        </div>
                        
                        @endif
                       <br> <div class="mx-4" style="width:100%;">
                         <a href="{{route('propertyUnit',['prop'=>$onBoard->propUniqueID])}}" class="btn btn-primary">
                              Add Units
                          </a>
                        </div>
                        </td>
                       
                      </tr>
                    @endforeach
                  </tbody>
              </table>
                @else
                    <div class="alert alert-danger">!Sorry No Property Exist</div>
                @endif
                {{-- @else
                <div class="alert alert-danger" >Sorry User Detail  Not Exist</div>
                @endif --}}
              </div>
              {{ $onBoardProperties->links() }}
            </div>
          </div> 
      </div>
    </div>
    <!-- / Content -->

    <!-- Footer -->
    <footer class="content-footer footer bg-footer-theme">
      <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
          ©
          <script>
            document.write(new Date().getFullYear());
          </script>
          , made with ❤️ by
          <a href="#" target="_blank" class="footer-link fw-bolder">SkyLabs Solution Pvt. Ltd</a>
        </div>
        {{-- <div>
          <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
          <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

          <a
            href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
            target="_blank"
            class="footer-link me-4"
            >Documentation</a
          >

          <a
            href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
            target="_blank"
            class="footer-link me-4"
            >Support</a
          >
        </div> --}}
      </div>
    </footer>
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>
  </div>

  <div class="col-lg-4 col-md-6">
    <div class="mt-3">
      <!-- Modal -->
      <div class="modal fade" id="updatelargeModal" tabindex="-1" aria-hidden="true">
        <form action="{{ route('seUpdateStatus') }}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCenterTitle">Inspection</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <div class="row g-2">
               
                @if (Auth::user()->role_as == 10 || Auth::user()->role_as == 4)
                <div class="mb-3 col-md-12">
                  <label for="language" class="form-label">isApproved</label>
                  <select class="select2 form-select" name="approved" id="approves" required>
                    <option value="">isApproved</option>
                    <option value="0">Approved</option>
                    <option value="2">disApproved</option>
                    <option value="1">underReviews</option>
                  </select>
                </div>
                @endif
                {{-- <div class="row"> --}}
                  <div class="mb-3 col-md-12">
                    <label for="email" class="form-label">Remarks</label>
                    <textarea
                      class="form-control"
                      type="text"
                      id="remarks"
                      name="remarks"
                      required
                    ></textarea>
                  </div>
                  <div class="col-md-12">
                    <label class="form-label" for="basic-default-password12">Image</label>
                    <div class="input-group" >
                        <input type="file" name="inspImages[]" class="form-control" multiple>
                    </div>
                  </div>
                  {{-- <div class="mb-3 col-md-12">
                    <label for="" class="form-label">Package</label>
                    <input type="text" id="package" class="form-control" readonly>
                  </div> --}}
                  <div class="mb-3 col-md-12">
                  <label for="" class="form-label">Packages</label>
                  <select class="form-control"   name="packages"  required>
                    @foreach ($packages as $itempac)<option value='{{ $itempac->package_id }}'>{{ $itempac->packages_name }}</option> @endforeach
                  </select>
                  </div>
                    <!--<div class="row">-->
                    <!--  <div class="col-md-6">-->
                    <!--    <label class="form-label">Services</label>-->
                    <!--    <div class="mb-3  InputeFlexToChangeFields col-md-12">-->
                            <!-- <label for="language" class="form-label">inDoor Features</label><br> -->
                    <!--        <div  class="" >-->
                    <!--            <div class="check scrl" style="overflow-y: scroll; width:100%;height:140px;flex-wrap:wrap;" id="lBox3" >-->
                    <!--                <div class="hideInput9876" style="display:flex;flex-wrap:wrap;">-->
                    <!--                  <div class="row" style="width:100%;">-->
                    <!--                    @foreach ($services as $sritem)-->
                    <!--                    <div class="col-lg-3 col-md-4">-->
                    <!--                      <div>-->
                    <!--                        <input type="checkbox" name="servcies[]" id="{{ $sritem->id }}" class="proputl srvcheck clickServices" value="{{$sritem->id}}"/><label for="{{ $sritem->id }}"  class="label">{{ $sritem->service_name }}</label></div>-->
                    <!--                    </div>-->
                    <!--                    @endforeach-->
                    <!--                  </div>-->
                    <!--                  @foreach ($services as $deptser)-->
                    <!--                    <input type="hidden" value="{{ $deptser->amount }}" class="servamount">-->
                    <!--                  @endforeach-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--  </div>-->
                    <!--  <div class="col-md-6">-->
                    <!--      <label class="form-label">Sub Services </label>-->
                    <!--      <div class="mb-3  InputeFlexToChangeFields col-md-12">-->
                            <!-- <label for="language" class="form-label">inDoor Features</label><br> -->
                    <!--          <div  class=""  id="lBox3">-->
                    <!--              <div class="check hideInput9876 scrl" style="overflow-y: scroll; width:100%;height:140px;">-->
                    <!--                <div style="" >-->
                    <!--                  {{--  --}}-->
                    <!--                  <div class="row" id="IBox">-->
                    <!--                      @foreach ($subServices as $subitem)-->
                    <!--                          <div class="col-lg-3 col-md-4 rmv dnone"  data-pid="{{ $subitem->parent_id }}">-->
                    <!--                            <input type="checkbox" name="subservcies[]" id="subs{{ $subitem->id }}" class="proputl subservices sserv" value="{{ $subitem->id }}"/><label for="subs{{ $subitem->id }}"  class="label">{{ $subitem->service_name }}</label>-->
                    <!--                          </div>-->
                    <!--                          <input type="hidden" class="parent_id" value="{{ $subitem->parent_id }}">-->
                    <!--                          <input type="hidden" class="subamount" value="{{ $subitem->amount }}">-->
                    <!--                      @endforeach-->
                    <!--                  </div>-->
                    <!--                </div>-->
                    <!--              </div>-->
                    <!--          </div>-->
                    <!--      </div>  -->
                    <!--  </div>-->
                    <!--</div>-->
                    <input type="hidden" name="propid" id="proid">
                  <input type="hidden" name="id" id="id">
                  <input type="hidden" name="ownerId" id="ownerId"><br>
                  <div class="row">
                    <div class="mb-3 col-md-6">
                      <label for="language" class="form-label">Aggrement_Start_Date</label>
                      <input type="date" id="aggstart" name="aggstart" class="form-control">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="language" class="form-label">Aggrement_End_Date</label>
                        <input type="date" id="aggends" name="aggend" class="form-control">
                    </div>
                    <!--<div class="mb-3 col-md-6">-->
                    <!--    <label for="language" class="form-label">Amount</label>-->
                    <!--    <input type="text" id="packageAmount"  class="form-control" readonly>-->
                    <!--</div>-->
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Save">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  </div>  
  {{-- modal Start here --}}
  <div class="modal fade" id="updatelargeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel3">View</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <form id="" action="{{ route('updateUser') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <!-- Account -->
                <div class="card-body">
                  <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img
                      id="updateimagePView"
                      src="{{ asset('/assets/img/avatars/1.png') }}"
                      alt="user-avatar"
                      class="d-block rounded"
                      height="100"
                      width="100"
                     
                    />
                    <div class="button-wrapper">
                      <label for="updateupload" class="btn btn-primary me-2 mb-4" tabindex="0">
                        <span class="d-none d-sm-block">Upload photo</span>
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <input
                          type="file"
                          id="updateupload"
                          class="account-file-input"
                          hidden
                          accept="image/png,image/jpeg"
                          name = "profileimage"
                        />
                      </label>
                      {{-- <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                      </button> --}}
                      <p class="text-muted mb-0">Allowed JPG, GIF or PNG.
                         {{-- Max size of 800K --}}
                      </p>
                    </div>
                  </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <div class="row">
                      <div class="mb-3 col-md-6">
                        <label for="firstName" class="form-label">Full Name</label>
                        <input
                          class="form-control"
                          type="text"
                          id="updatename"
                          name="fullname"
                          value="John"
                          placeholder="kamal"
                          autofocus
                          required
                        />
                      </div>
                      {{-- <div class="mb-3 col-md-6">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input class="form-control" type="text" name="lastName" id="lastName" value="Doe" />
                      </div> --}}
                      <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input
                          class="form-control"
                          type="text"
                          id="updateemail"
                          name="email"
                          required
                        />
                      </div>
                      {{-- <div class="mb-3 col-md-6">
                        <label for="organization" class="form-label">Organization</label>
                        <input
                          type="text"
                          class="form-control"
                          id="organization"
                          name="organization"
                          value="ThemeSelection"
                        />
                      </div> --}}
                      <div class="mb-3 col-md-6">
                        <label class="form-label" for="phoneNumber">Phone Number</label>
                        <div class="input-group input-group-merge">
                          {{-- <span class="input-group-text">US (+1)</span> --}}
                          <input
                            type="text"
                            id="updatephoneNumber"
                            name="phoneNumber"
                            class="form-control"
                            placeholder="202 555 0111"
                            required
                          />
                        </div>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="updateeaddress" name="address" placeholder="Address" required />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label" for="country">Country</label>
                        <select  class="select2 form-select" name="country" onchange="print_stat('stat',this.selectedIndex)" id="countr" required>
                        
                        </select>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="state" class="form-label">State</label>
                        <select  class="select2 form-select" id="stat" name="state" required>
                        </select>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="language" class="form-label">City</label>
                        <input type="text" placeholder="City Here..." name="city" id="updatecity" required class="form-control">
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="zipCode" class="form-label">Zip Code</label>
                        <input
                          type="text"
                          class="form-control"
                          id="updatezipCode"
                          name="zipCode"
                          placeholder="231465"
                          maxlength="6"
                          required
                        />
                      </div>
                      <input type="hidden" id="id" name="id">
                      <div class="mb-3 col-md-6">
                        <label for="language" class="form-label">Give Permission</label>
                        <select  class="select2 form-select" name="role" id="updaterole" required>
                          <option value="">Select Permission</option>
                          <option value="0">Admin</option>
                          <option value="1">Customber/tenant</option>
                          <option value="2">Site Engineer</option>
                          <option value="3">Vendor</option>
                          <option value="4">Support/Help Desk</option>
                        </select>
                      </div>
                    </div>
                    {{-- <div class="mt-2">
                      <button type="submit" class="btn btn-primary me-2">Save changes</button>
                      <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                    </div> --}}
                </div>
                <!-- /Account -->
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Cancel
            </button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
   </div> 
  {{-- modal end here --}}
  <!-- Extra Large Modal -->
<div class="modal fade viewModelTabsDesign" id="exLargeModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #fef5f5;">
        <h5 class="modal-title" id="exampleModalLabel4">Property Details</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body mc" id="invoice" >
        <div class="row mx-2 my-2">
              <div class="col-6">
              </div>
              <div class="d-flex flex-column">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('assets/images/ll.png') }}" alt="" width="100px" height="100px">
                </div>
                 <div class="d-flex justify-content-center flex-column">
                   <h1 class="text-center">Prime Property Management</h1>
                 </div>
              </div>
        </div>
        <div class="container cc" >
          <div class="row cr">
              <table class="table table-responsive ">
                  <thead>
                    <tr>
                      <h6>PROPERTY</h6>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>PROPERTY NAME</td>
                      <td id="proppname"><td><i class="fa-solid fa-pen-to-square"></i></td></tr>
                    <tr>
                      <td>PROPER TYPE</td>
                      <td id="proppType"><td><i class="fa-solid fa-pen-to-square"></i></td></tr>  
                    <tr>
                      <td>ADDRESS</td>
                      <td id="proppaddress"><td><i class="fa-solid fa-pen-to-square"></i></td></tr>
                    <tr>
                      <td>COUNTRY</td>
                      <td id="proppcountry"><td><i class="fa-solid fa-pen-to-square"></i></td></tr>
                    <tr>
                      <td>STATE</td>
                      <td id="proppstate"><td><i class="fa-solid fa-pen-to-square"></i></td></tr>
                    <tr>
                      <td>CITY</td>
                      <td id="proppcity"><td><i class="fa-solid fa-pen-to-square"></i></td></tr>
                    <tr>
                      <td>PINCODE</td>
                      <td id="proppincode"><td><i class="fa-solid fa-pen-to-square"></i></td></tr>
                    <tr>
                      <td>PROPERTY FOR</td>
                      <td id="propfor"><td><i class="fa-solid fa-pen-to-square"></i></td></tr>
                    <tr>
                      <td>PHONE</td>
                      <td id="propPhone"><td><i class="fa-solid fa-pen-to-square"></i></td></tr>
                    <tr>
                      <td>EMAIL</td>
                      <td id="propPEmail"><td><i class="fa-solid fa-pen-to-square"></i></td></tr>
                  </tbody>
              </table>
          </div>
          <div class="row cr my-4">
            <table class="table table-responsive ">
                <thead>
                  <tr>
                    <h6>Packages</h6>
                  </tr>
                </thead>
                <tbody>
                   <tr>
                      <td>Packages Name</td>
                      <td id="packagesName"></td>
                      <td><i class="fa-solid fa-pen-to-square"></i></td>
                   </tr>
                  <tr>
                    <td>PROPERTY TYPE</td>
                    <td id="packagesType"></td>
                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                  </tr>  
                  <tr>
                    <td>Services</td>
                    <td id="pacServices"></td>
                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                  </tr>
                  <tr>
                    <td>Package Amount</td>
                    <td id="pacamount"></td>
                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                  </tr>
                </tbody>
              </table>
          </div>
          <div class="row cr">
              <table class="table table-responsive">
                  <thead>
                    <tr>
                      <h6>PROPERTY DETAILS</h6>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>SQR_METER</td>
                      <td id="sqrmeter"><td><i class="fa-solid fa-pen-to-square"></i></td></tr>
                    <tr>
                      <td>SQR_FEET</td>
                      <td id="sqrfeet"><td><i class="fa-solid fa-pen-to-square"></i></td></tr>
                    <tr>
                      <td>PROPERTY ROOM</td>
                      <td id="proom">Thornton<td><i class="fa-solid fa-pen-to-square"></i></td></tr>
                    <tr>
                      <td>PROPERTY FLOOR</td>
                      <td id="pfloor"><td><i class="fa-solid fa-pen-to-square"></i></td></tr>
                    <tr>
                      <td>START DATE</td>
                      <td id="pastartdate"><td><i class="fa-solid fa-pen-to-square"></i></td></tr>
                    <tr>
                      <td>END DATE</td>
                      <td id="paenddate"><td><i class="fa-solid fa-pen-to-square"></i></td></tr>
                    <tr>
                      <td>Construction</td>
                      <td id="consdate"><td><i class="fa-solid fa-pen-to-square"></i></td></tr>
                    <tr>
                      <td>RENOVATION</td>
                      <td id="rendate"><td><i class="fa-solid fa-pen-to-square"></i></td></tr>
                    {{-- <tr>
                      <td>PROPERTY IMAGES</td>
                      <td id="prop"><td><i class="fa-solid fa-pen-to-square"></i></td></tr> --}}
                    <tr>
                      <td>PHONE</td>
                      <td id="pphone"><td><i class="fa-solid fa-pen-to-square"></i></td></tr>
                    <tr>
                      <td>EMAIL</td>
                      <td id="pemail"><td><i class="fa-solid fa-pen-to-square"></i></td></tr>
                  </tbody>
                </table>
          </div>
          <div class="row cr">
              <table class="table table-responsive">
                  <thead>
                    <tr>
                      <h6>PROPERTY FACILITY</h6>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Property Facility Type</td>
                      <td id="propfac"><td><i class="fa-solid fa-pen-to-square"></i></td></tr>
                  </tbody>
                </table>
          </div>
          <div class="row cr">
              <table class="table table-responsive">
                  <tbody>
                      <tr><h6>OutDoor Features</h6> </tr>
                      <tr>
                          <td>OutDoor Features Type</td>
                          <td id="propout"></td>
                      </tr>
                  </tbody>
              </table>
          </div>
          <div class="row cr">
              <table class="table table-responsive">
                  <thead>
                    <tr>
                      <h6>IntDoor Features</h6>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>IntDoor Features</td>
                      <td id="propin"><td><i class="fa-solid fa-pen-to-square"></i></td></tr>
                  </tbody>
                </table>
          </div>
          <div class="row cr">
              <table class="table table-responsive">
                  <thead>
                    <tr>
                      <h6>Near by</h6>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Park</td>
                      <td id="nearby"><td><i class="fa-solid fa-pen-to-square"></i></td></tr>
                  </tbody>
                </table>
          </div>
          <div class="row cr">
            <table class="table table-responsive">
                <thead>
                  <tr>
                    <h6>Units</h6>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>DemoData</td>
                    <td id="nearby"></td>
                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                  </tr>
                </tbody>
              </table>
        </div>
        </div><br>
      </div>
      <div class="d-flex justify-content-center" style="background:#fef5f5;">
        <button id="download-button" class="btn btn-primary my-4" >Download pdf</button>
      </div>
      
    </div>
  </div>
</div>
{{-- inspection Modal --}}
<div class="modal fade viewModelTabsDesign" id="exxLargeModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #fef5f5;">
        <h5 class="modal-title" id="exampleModalLabel4">Property Inspection Details</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body mc" id="inspectionpdf" >
        <div class="row mx-2 my-2">
              <div class="col-6">
              </div>
              <div class="d-flex flex-column">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('assets/images/ll.png') }}" alt="" width="100px" height="100px">
                </div>
                 <div class="d-flex justify-content-center flex-column">
                   <h1 class="text-center">Prime Property Management</h1>
                 </div>
              </div>
        </div>
        <div class="container cc mt-4" >

          {{-- <div class="compOuterDiv" style="min-width: 800px; width:100%; overflow-x:scroll"> --}}
            <div class="row align-center staticHeight">
              <div class="col-6 border-end border-md">
                       <h1 class="text-center fs-4 whitespace-nowrap">Property Images</h1>
                       <div id="propImages">
                         
                       </div>
              </div>
              <div class="col-6">
                      <h1 class="text-center fs-4 whitespace-nowrap">Inspection Images</h1>
                      <div id="inspImages">
                         
                      </div>
              </div>
            </div>
          {{-- </div><!--end of compOuterDiv--> --}}

           
        </div><br>
      </div>
      <div class="d-flex justify-content-center" style="background:#fef5f5;">
        <button id="download-button-inspection" class="btn btn-primary my-4" >Download pdf</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
const button = document.getElementById('download-button');
const buttonInsp = document.getElementById('download-button-inspection');
if(button)
{ 
  function generatePDF() {
    // Choose the element that your content will be rendered to.
    const element = document.getElementById('invoice');
    // Choose the element and save the PDF for your user.
    html2pdf().from(element).save();
  }
  button.addEventListener('click', generatePDF);
}
if(buttonInsp)
{

  function generateInspPDF() {
    // Choose the element that your content will be rendered to.
    const element = document.getElementById('inspectionpdf');
    // Choose the element and save the PDF for your user.
    html2pdf().from(element).save();
  }
  buttonInsp.addEventListener('click', generateInspPDF);
}
</script>
<script>
  srvcheck = document.getElementsByClassName('srvcheck')
  parentid = document.getElementsByClassName('parent_id')
  rmv = document.getElementsByClassName('rmv');
  if(srvcheck.length > 0)
  {
     for (let sr = 0; sr < srvcheck.length; sr++) {
         srvcheck[sr].addEventListener('click',function(e){
             if(rmv.length > 0)
             {
                 for (let pid = 0; pid < rmv.length; pid++) {
                          
                          if(rmv[pid].getAttribute('data-pid') == srvcheck[sr].value)
                          {
                            rmv[pid].classList.toggle('dnone')
                          }
                 }
             }
         })
     }
  }
</script>
{{-- for increase amount --}}
<script>
    servamount = document.getElementsByClassName('servamount');
    clickServices = document.getElementsByClassName('clickServices');
    tAmount = document.getElementById('packageAmount')
    sserv = document.getElementsByClassName('sserv')
    subamount = document.getElementsByClassName('subamount')
    serviceAmount = 0
    if(clickServices.length > 0 )
    {
      for (let srvam = 0; srvam < clickServices.length; srvam++) {
        clickServices[srvam].addEventListener('ontoggle',function(e){
                 if(servamount.length > 0)
                 {
                      serviceAmount = serviceAmount + parseInt(servamount[srvam].value)
                 }
                tAmount.value = serviceAmount
            })
       }
    }
</script>
<style>
  table .btn{ padding: 0.4375rem .5rem !important}
</style>
@endsection