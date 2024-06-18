@extends('backend.layout.main')
@push('title')
    <title>Admin|Property Trash</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- include summernote css/js -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.css" rel="stylesheet">
    <style>
      .label {
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
      }
    
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
    </style>
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
                {{-- <div class="d-flex p-4 justify-content-end">
                  @if (Auth::user()->role_as == 2)
                        <a href="#" class="btn btn-primary">Filter</a>
                  @elseif (Auth::user()->role_as == 10)
                        <a href="{{ route('propertyOnBoard') }}" class="btn btn-primary"   >Add onBoard</a>
                  @elseif (Auth::user()->role_as == 5)  
                         <a href="{{ route('addProperty') }}" class="btn btn-primary"   >Add onBoard</a>    
                  @endif      
                </div> --}}
              <div class="card-body demo-vertical-spacing demo-only-element">
                {{-- @if ($userDetails->isNotEmpty()) --}}
                @if ($onBoardProperties->isNotEmpty())
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">SrNo.</th>
                 
                      <th scope="col">Property Name</th>
                      <th scope="col">Aggrement_ID</th>
                      <th scope="col">Aggrement_from</th>
                      <th scope="col">Aggrement_to</th>
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
                      <tr>
                        <th scope="row" style="font-size:1rem">{{ $i++ }}</th>
                        
                        <td style="font-size:1rem">{{ $onBoard->propertyName }}</td>
                        <td style="font-size:1rem">{{ $onBoard->aggrement_id }}</td>
                        <td style="font-size:1rem">{{ $onBoard->aggrement_start_date }}</td>
                        <td style="font-size:1rem">{{ $onBoard->aggrement_end_date }}</td>
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
                          @if (Auth::user()->role_as == 10)
                          <a href="{{ route('propertyTrashRestore',['id'=>$onBoard->id]) }}" class="btn btn-warning mb-2 " style="color:white;" ><i class="fa-solid fa-rotate-right"></i></a>&nbsp;
                          <a class="btn btn-danger mb-2" style="color:white;" href="{{ route('propertyForceDelete',['id'=>$onBoard->id])}}"><i class="fa-solid fa-trash"></i></a>
                          @endif 
                        </td>
                       
                      </tr>
                    @endforeach
                  </tbody>
              </table>
                @else
                    <div class="alert alert-danger">!Sorry No Trash Property Exist</div>
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
      <div class="modal fade " id="updatelargeModal" tabindex="-1" aria-hidden="true">
        <form action="{{ route('seUpdateStatus') }}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCenterTitle">isApproved</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <div class="row g-2">
                {{-- <div class="row"> --}}
                  <div class="mb-3 col-md-12">
                    <label for="language" class="form-label">isApproved</label>
                    <select class="select2 form-select" name="approved" id="approves" required>
                      <option value="">isApproved</option>
                      <option value="0">Approved</option>
                      <option value="2">disApproved</option>
                      <option value="1">underReviews</option>
                    </select>
                  </div>
                {{-- </div> --}}
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
                  {{-- </div> --}}
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
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              {{-- <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
              </button> --}}
              <input type="submit" class="btn btn-primary" value="Save changes">
  
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
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel4">Property Details</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
              <table class="table table-responsive ">
                  <thead>
                    <tr>
                      <h6>PROPERTY</h6>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>PROPERTY NAME</td>
                      <td id="proppname"></td>
                    </tr>
                    <tr>
                      <td>PROPER TYPE</td>
                      <td id="proppType"></td>
                    </tr>  
                    <tr>
                      <td>ADDRESS</td>
                      <td id="proppaddress"></td>
                    </tr>
                    <tr>
                      <td>COUNTRY</td>
                      <td id="proppcountry"></td>
                    </tr>
                    <tr>
                      <td>STATE</td>
                      <td id="proppstate"></td>
                    </tr>
                    <tr>
                      <td>CITY</td>
                      <td id="proppcity"></td>
                    </tr>
                    <tr>
                      <td>PINCODE</td>
                      <td id="proppincode"></td>
                    </tr>
                    <tr>
                      <td>PROPERTY FOR</td>
                      <td id="propfor"></td>
                    </tr>
                    <tr>
                      <td>PHONE</td>
                      <td id="propPhone"></td>
                    </tr>
                    <tr>
                      <td>EMAIL</td>
                      <td id="propPEmail"></td>
                    </tr>
                  </tbody>
                </table>
          </div>
          <div class="row">
              <table class="table table-responsive">
                  <thead>
                    <tr>
                      <h6>PROPERTY DETAILS</h6>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>SQR_METER</td>
                      <td id="sqrmeter"></td>
                    </tr>
                    <tr>
                      <td>SQR_FEET</td>
                      <td id="sqrfeet"></td>
                    </tr>
                    <tr>
                      <td>PROPERTY ROOM</td>
                      <td id="proom">Thornton</td>
                    </tr>
                    <tr>
                      <td>PROPERTY FLOOR</td>
                      <td id="pfloor"></td>
                    </tr>
                    <tr>
                      <td>START DATE</td>
                      <td id="pastartdate"></td>
                    </tr>
                    <tr>
                      <td>END DATE</td>
                      <td id="paenddate"></td>
                    </tr>
                    <tr>
                      <td>Construction</td>
                      <td id="consdate"></td>
                    </tr>
                    <tr>
                      <td>RENOVATION</td>
                      <td id="rendate"></td>
                    </tr>
                    {{-- <tr>
                      <td>PROPERTY IMAGES</td>
                      <td id="prop"></td>
                    </tr> --}}
                    <tr>
                      <td>PHONE</td>
                      <td id="pphone"></td>
                    </tr>
                    <tr>
                      <td>EMAIL</td>
                      <td id="pemail"></td>
                    </tr>
                  </tbody>
                </table>
          </div>
          <div class="row">
              <table class="table table-responsive">
                  <thead>
                    <tr>
                      <h6>PROPERTY FACILITY</h6>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Property Facility Type</td>
                      <td id="propfac"></td>
                    </tr>
                  </tbody>
                </table>
          </div>
          <div class="row">
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
          <div class="row">
              <table class="table table-responsive">
                  <thead>
                    <tr>
                      <h6>IntDoor Features</h6>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>IntDoor Features</td>
                      <td id="propin"></td>
                    </tr>
                  </tbody>
                </table>
          </div>
          <div class="row">
              <table class="table table-responsive">
                  <thead>
                    <tr>
                      <h6>Near by</h6>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Park</td>
                      <td id="nearby"></td>
                    </tr>
                  </tbody>
                </table>
          </div>
      </div>
      </div>
      
    </div>
  </div>
</div>
<style>
  .viewModelTabsDesign table tr td{ font-size:12px}
.viewModelTabsDesign table tr td:first-child{ width:200px; }
.viewModelTabsDesign .modal-content{
  background: #fef5f5;
}
.viewModelTabsDesign .container .row{
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
</style>
@endsection