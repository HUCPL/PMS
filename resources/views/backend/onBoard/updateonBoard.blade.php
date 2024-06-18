@extends('backend.layout.main')
@push('title')
    <title>Admin|onBoard Property</title>
  
    <!-- include summernote css/js -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.css" rel="stylesheet"> --}}
@endpush
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
@section('content-wrapper')
<div class="content-wrapper">
    <!-- Content -->
    
 <!-- Include jQuery (required by Summernote) -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <!-- Include Summernote JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.js"></script>

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic -->
        {{-- <div class="col-md-12">
           <div class="card mb-4"> --}}
            <div class="row">
              <!-- Basic -->
              <div class="col-md-12">  
              <div class="card mb-4" style="overflow:scroll; -">
                  {{-- <div class="d-flex p-4 justify-content-start">
                        <h5 class="card-header">Users Lists</h5>
                  </div> --}}
                  <div class="d-flex p-4 justify-content-end" style="width: 88%;
    margin: 0px auto;
    padding-right: 0px !important;">
                        @if (Auth::user()->role_as==10)
                          <a href="{{ route('propertyOnBoardList') }}" class="btn btn-primary" >onBoard List</a>
                         @elseif (Auth::user()->role_as==5) 
                         <a href="{{ route('propertyList') }}" class="btn btn-primary" >onBoard List</a>
                         @endif
                  </div>
                  @if (Auth::user()->role_as==10)
                    <form class="" action="{{ route('updateOnBoard',['id'=>$updateOnBaord->id]) }}" method="post" enctype="multipart/form-data">
                      @csrf
                  @elseif (Auth::user()->role_as==5)
                    <form class="" action="{{ route('updatePropertyDetails',['id'=>$updateOnBaord->id]) }}" method="post" enctype="multipart/form-data">
                      @csrf
                  @endif
                    
                    <div class="legendForm card-body demo-vertical-spacing demo-only-element">
                      <legend><b style="font-size:0.75rem"><i class="fa-regular fa-building"></i> PROPERTY </b> </legend> 
                      <div class="row">
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <div class="d-flex">
                              
                            </div>
                            <label for="propertyName" class="form-label">Property Name </label>
                            <input
                              class="form-control"
                              type="text"
                              id="propertyName"
                              name="propertyname"
                              value="{{ $updateOnBaord->propertyName }}"
                              autofocus
                              required
                            />
                          </div>
                          <div class="mb-3 col-md-6 InputeFlexToChangeFields position-relative">
                        @if (Auth::user()->role_as==10)
                          <a class="btn btn-primary" style="position: absolute;
                            right: 16px;
                            z-index: 9;
                            height: 26px;
                            line-height: 12px;
                            color:white;
                            font-size: 13px;"  data-bs-toggle="modal" data-bs-target="#modalCenter" >Add</a>
                         @endif     
                            <label for="propcats" class="form-label">Category</label>
                            <select id="propcats" class="select2 form-select propcat position-relative"  name="category"  required>
                              @if ($categoriesDetails->isNotEmpty())
                              <option value="">No Category</option>
                              @foreach ($categoriesDetails as $categoriesnames)     
                                <option value="{{ $categoriesnames->category_id }}" @if($categoriesnames->category_id == $updateOnBaord->propertyCategory) ? selected @endif>{{ $categoriesnames->category_name }}</option>
                              @endforeach
                              @else     
                              <option value="">No Categories</option>
                              @endif
                            </select>
                          </div>
                          @if (Auth::user()->role_as == 10)
                              
                          <div class="mb-3   col-md-6 InputeFlexToChangeFields position-relative">
                            <a class="btn btn-primary" style="position:absolute;right: 16px;
                              z-index: 9;
                              height: 26px;
                              line-height: 12px;
                              color:white;
                              font-size: 13px;" data-bs-toggle="modal"
                              data-bs-target="#largeModal">Add</a>

                              <label for="propcats" class="form-label">Owner Name</label>
                              <select  class="select2 form-select propcat"  name="owner"  required>
                                
                                @if ($onwerDetails->isNotEmpty())
                                  <option value="">No Owner</option>
                                @foreach ($onwerDetails as $ownernames)     
                                  <option value="{{ $ownernames->id }}"  @if($ownernames->id == $updateOnBaord->OwnerID) ? selected @endif>{{ $ownernames->name }}</option>
                                @endforeach
                                @else     
                                <option value="">First Add Owner Details</option>
                                @endif
                              </select>
                          </div>
                          <input type="hidden" id="oowner" value="{{ Auth::user()->role_as }}">
                          @elseif (Auth::user()->role_as == 5)
                              <input type="hidden" name="owner" value="{{ Auth::Id() }}">
                              <input type="hidden" id="oowner" value="{{ Auth::user()->role_as }}">
                          @endif
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="propertyAddress" class="form-label">Address </label>
                            <input
                              class="form-control"
                              type="text"
                              id="propertyAddress"
                              name="propertyAddress"
                              value="{{ $updateOnBaord->propertyAddress }}"
                              autofocus
                              required
                            />
                          </div>
                        
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="city" class="form-label">Country</label>
                            {{-- <input
                              class="form-control"
                              type="text"
                              id="countries"
                              name="country"
                              value="" 
                              autofocus
                              required
                            /> --}} 
                            @php
                                $country = DB::table('countries')->get();
                                $state = DB::table('states')->get();
                                $city = DB::table('cities')->get();
                            @endphp
                            <select  id="country" class="form-control chosen-select" name="country">

                              <option value="">Please Select Country</option>
                              @foreach ($country as $countryitem)
                                <option value="{{ $countryitem->id }}"  @if($countryitem->id == $updateOnBaord->country) selected @endif>{{ $countryitem->name }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="State" class="form-label">State</label>
                            <select id="stateresult" class="form-control chosen-select onchangestate"  name="state">
                              @foreach ($country as $stateitem)
                                <option value="{{ $countryitem->id }}"  @if($stateitem->id == $updateOnBaord->state) selected @endif>{{ $stateitem->name }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="city" class="form-label">City</label>
                            <select id="getcity" class="form-control chosen-select" name="city">
                              @foreach ($city as $cityitem)
                                <option value="{{ $countryitem->id }}"  @if($cityitem->name == $updateOnBaord->city) selected @endif>{{ $stateitem->name }}</option>
                              @endforeach
                              <!-- Cities will populate based on the selected state -->
                            </select>
                          </div>
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="Pincode" class="form-label">Pincode</label>
                            <div class="form-control" style="border: none; padding:0px">
                            <input
                              class="form-control"
                              type="text"
                              id="Pincode"
                              name="pincode"
                              value="{{ $updateOnBaord->zipcode }}"
                              autofocus
                              required
                            />
                            <span id="PincodeSpan"></span>
                            </div>
                          </div>
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="language" class="form-label">Property For</label>
                            <select id="propertyFor" class="select2 form-select" name="property_for" required>
                              <option value="">Select</option>
                              <option value="0" @if($updateOnBaord->property_for==0) ? selected @endif>Rent</option>
                              <option value="1" @if($updateOnBaord->property_for==1) ? selected @endif>PMS</option>
                              <option value="2" @if($updateOnBaord->property_for==2) ? selected @endif>Both</option>
                            </select>
                          </div>

                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="State" class="form-label">Phone </label>
                            <div class="form-control" style="border: none; padding:0px">
                            <input
                              class="form-control"
                              type="text"
                              id="Number"
                              name="Number"
                              value="{{$updateOnBaord->phone}}"
                              autofocus
                              required
                            />
                            <span id="NumberSpan"></span>
                            </div>
                          </div>
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="State" class="form-label">Email</label>
                            <div class="form-control" style="border: none; padding:0px">
                            <input
                              class="form-control"
                              type="text"
                              id="emailInput"
                              name="email"
                              value="{{ $updateOnBaord->email }}"
                              autofocus
                              required
                            />
                            <span id="emailSpan"></span>
                            </div>
                          </div>  
                          <!--<div class="mb-3  InputeFlexToChangeFields col-md-6">-->
                          <!--  <label for="State" class="form-label">Packages</label>-->
                          <!--  <select class="form-control"  id="package" name="packages"  required>-->
                          <!--    @foreach ($packages as $itempac)-->
                          <!--        <option value="{{ $itempac->id }}" @if( $updateOnBaord->packagesID == $itempac->id ) selected @endif>{{ $itempac->packages_name }}</option>-->
                          <!--    @endforeach-->
                          <!--  </select>-->
                          <!--</div>   -->
                      </div>
                    </div>
                    {{-- <div class="legendForm card-body demo-vertical-spacing demo-only-element" id="propUnit" style="display:none">
                      <legend><b style="font-size:0.75rem"><i class="fa-regular fa-building"></i>PROPERTY UNITS </b> </legend> 
                      <div class="row">
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="propertySize" class="form-label">UNIT NAME</label>
                            <input type="text" placeholder="200"  class="form-control">
                          </div>
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="propertySize" class="form-label">BED ROOM</label>
                            <input type="number" placeholder="200" class="form-control">
                          </div>
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="propcats" class="form-label">BATH</label>
                            <input type="number" class="form-control>
                            <select  >
                              
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                            </select>
                          </div>
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="language" class="form-label">KITCHEN</label>
                            <input type="number" class="form-control"  name="kitchen" > 
                          </div>
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="language" class="form-label">GENERAL SECURITY</label>
                            <input type="number" placeholder="200" name="g class="form-control">
                          </div>
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="language" class="form-label">LATE FEES</label>
                            <input type="number" placeholder="200" name="la class="form-control">
                          </div> 
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="language" class="form-label">ADULT</label>
                            <input type="number" placeholder="200" name= class="form-control">
                          </div>
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="language" class="form-label">CHILD</label>
                            <input type="number" placeholder="200" name= class="form-control">
                          </div>
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="language" class="form-label">RENT TYPE</label>
                            <select name="rentype" id="rentype"  class="form-control">
                               <option value="0">Monthly</option>
                               <option value="1">Yearly</option>
                               <option value="2">Custom</option>
                            </select>
                          </div>
                          <div class="mb-3  InputeFlexToChangeFields col-md-6 customfield" style="display:none;">
                            <label for="language" class="form-label ">LEASE START DATE</label>
                            <input type="date"  name="leasestartdate"  class="form-control" multiple>
                          </div>  
                          <div class="mb-3  InputeFlexToChangeFields col-md-6 customfield" style="display:none;">
                            <label for="language" class="form-label ">LEASE END DATE</label>
                            <input type="date"  name="leaseenddate"  class="form-control" multiple>
                          </div>  
                          <div class="mb-3  InputeFlexToChangeFields col-md-6 customfield" style="display:none;">
                            <label for="language" class="form-label ">PAY DUE DATE</label>
                            <input type="date"  name="Payduedate"  class="form-control" multiple>
                          </div>
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="language" class="form-label">Images</label>
                            <input type="file" placeholder="200" name="propertyDocuments[]"  class="form-control" multiple>
                          </div>     
                      </div>
                    </div> --}}
                    <div class="legendForm card-body demo-vertical-spacing demo-only-element">
                      <legend><b style="font-size:0.75rem"><i class="fa-regular fa-building"></i>PROPERTY DETAILS </b> </legend> 
                      <div class="row">
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="propertySize" class="form-label">Sqr_meter</label>
                            <input type="number" placeholder="200" id="sqrmt" value="{{ $updateOnBaord->sqr_meter }}" name="sqr_meter" required class="form-control">
                          </div>
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="propertySize" class="form-label">Sqr_feet</label>
                            <input type="number" placeholder="200" name="sqr_Feet" value="{{ $updateOnBaord->sqr_feet }}" required id="sqrft" class="form-control" readonly>
                          </div>
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="propcats" class="form-label">Property Room</label>
                            <input type="number" class="form-control"  value="{{ $updateOnBaord->rooms }}" name="rooms"  required>
                            {{-- <select  >
                              
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                            </select> --}}
                          </div>
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="language" class="form-label">Property Floor</label>
                            <input type="number" class="form-control"  name="Floor" value="{{ $updateOnBaord->floor }}"  required> 
                          </div>
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="language" class="form-label">Start Date</label>
                            <input type="date" placeholder="200" name="start_date" id="txtFrom" value="{{ $updateOnBaord->aggrement_start_date }}" required class="form-control">
                          </div>
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="language" class="form-label">End Date</label>
                            <input type="date" placeholder="200" name="end_date" id="txtTo" value="{{ $updateOnBaord->aggrement_end_date }}" required class="form-control">
                          </div> 
                          <!--<div class="mb-3  InputeFlexToChangeFields col-md-6">-->
                          <!--  <label for="language" class="form-label">Construction</label>-->
                          <!--  <input type="date" placeholder="200" name="cons_date" value="{{ $updateOnBaord->construction_year }}" required class="form-control">-->
                          <!--</div>-->
                          <!--<div class="mb-3  InputeFlexToChangeFields col-md-6">-->
                          <!--  <label for="language" class="form-label">Renovation</label>-->
                          <!--  <input type="date" placeholder="200" name="renova_date" value="{{ $updateOnBaord->renovation_year }}" required class="form-control">-->
                          <!--</div>-->
                          <div class="mb-3  InputeFlexToChangeFields col-md-6">
                            <label for="language" class="form-label">Property Images</label>
                            <input type="file" placeholder="200" name="propertyImages[]" class="form-control" multiple>
                          </div>   
                      </div>
                    </div>
                    <div class="legendForm card-body demo-vertical-spacing demo-only-element">
                      <legend><b style="font-size:0.75rem"><i class="fa-regular fa-building"></i>PROPERTY FACILITY </b> </legend> 
                      <div class="row">
                          
                          
                          
                          <div class="mb-3  InputeFlexToChangeFields col-md-12 hiddenCB">
                            <!-- <label for="language" class="form-label">Property Utility</label><br> -->
                            <div  class="scrl" style="overflow-y: scroll; width:100%;height:60px;" id="lBox2">
                              Please select category
                            </div>
                          </div>
                          <a class="btn btn-primary" style=" height:30px; width:30px; margin-left:10px; display:flex;color:white; justify-content:center;align-items:center;" data-bs-toggle="modal" data-bs-target="#modalCenterfac"><i style="font-size:17px" class="fa-solid fa-plus"></i></a>
                          
                      </div>
                    </div>
                    <div class="legendForm card-body demo-vertical-spacing demo-only-element">
                      <legend><b style="font-size:0.75rem"><i class="fa-regular fa-building"></i>OutDoor Features</b> </legend> 
                      <div class="row">
                          
                     
                          
                          
                          <div class="mb-3  InputeFlexToChangeFields col-md-12 hiddenCB">
                            <!-- <label for="language" class="form-label">OutDoor Features</label><br> -->
                            <div  class="scrl" style="overflow-y: scroll; width:100%;height:60px;" id="lBox">
                              Please select category
                            </div>
                          </div>
                          <a class="btn btn-primary" style=" height:30px; width:30px; margin-left:10px; display:flex;color:white; justify-content:center;align-items:center;" data-bs-toggle="modal" data-bs-target="#modalCenteroutdoor"><i style="font-size:17px" class="fa-solid fa-plus"></i></a>
                         
                      </div>
                    </div>
                    <div class="legendForm card-body demo-vertical-spacing demo-only-element">
                      <legend><b style="font-size:0.75rem"><i class="fa-regular fa-building"></i>inDoor Features</b> </legend> 
                      <div class="row">
                          
                          <div class="mb-3  InputeFlexToChangeFields col-md-12 hiddenCB">
                            <!-- <label for="language" class="form-label">inDoor Features</label><br> -->
                            <div  class="scrl" style="overflow-y: scroll; width:100%;height:60px;" id="lBox3">
                              Please select category 
                            </div>
                          </div>
                          <a class="btn btn-primary" style=" height:30px; width:30px; margin-left:10px; display:flex;color:white; justify-content:center;align-items:center;" data-bs-toggle="modal" data-bs-target="#modalCenterindoor"><i style="font-size:17px" class="fa-solid fa-plus"></i></a>
                          
                        
                      </div>
                    </div>
                    <div class="legendForm card-body demo-vertical-spacing demo-only-element">
                      <legend><b style="font-size:0.75rem"><i class="fa-regular fa-building"></i>Near by</b> </legend> 
                      <div class="row">
                           @foreach (explode(',',$updateOnBaord->near_by) as $nearby)
                              <div class="col-md-4">
                                <div class="form-check d-flex checkboxcontaniner align-items-center mb-3">
                                  <input class="form-check-input" type="checkbox" name="nearby[]" checked  value="{{ $nearby }}" >
                                  <label class="form-check-label mx-3" for="flexCheckDefault">
                                    {{ $nearby }}
                                  </label>
                                  {{-- <input type="text" style="max-width:200px" value="{{ $nearby }}" class="form-control attchvalue" readonly/> --}}
                                </div>
                              </div>
                           @endforeach
                          <div class="col-md-4">
                                <div class="form-check d-flex checkboxcontaniner align-items-center mb-3">
                                  <input class="form-check-input attch" type="checkbox" name="nearby[]"  value="park" >
                                  <label class="form-check-label mx-3" for="flexCheckDefault">
                                    Park
                                  </label>
                                  <input type="text" style="max-width:200px"  class="form-control attchvalue" />
                                </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-check d-flex checkboxcontaniner align-items-center mb-3">
                              <input class="form-check-input attch" type="checkbox" name="nearby[]" value="busStation" id="flexCheckDefault">
                              <label class="form-check-label mx-3" for="flexCheckDefault">
                                Bus Station
                              </label>
                              <input type="text" style="max-width:200px"  class="form-control attchvalue" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-check d-flex checkboxcontaniner align-items-center mb-3">
                              <input class="form-check-input attch" type="checkbox" name="nearby[]" value="metroStation" id="flexCheckDefault">
                              <label class="form-check-label mx-3" for="flexCheckDefault">
                                Metro Station
                              </label>
                              <input type="text" style="max-width:200px"  class="form-control attchvalue" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-check d-flex checkboxcontaniner align-items-center mb-3">
                              <input class="form-check-input attch" type="checkbox" name="nearby[]" value="mall" id="flexCheckDefault">
                              <label class="form-check-label mx-3" for="flexCheckDefault">
                                Mall
                              </label>
                              <input type="text" style="max-width:200px" class="form-control attchvalue" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-check d-flex checkboxcontaniner align-items-center mb-3">
                              <input class="form-check-input attch" type="checkbox" name="nearby[]" value="cafe" id="flexCheckDefault">
                              <label class="form-check-label mx-3" for="flexCheckDefault">
                                Cafe
                              </label>
                              <input type="text" style="max-width:200px"  class="form-control attchvalue" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-check d-flex checkboxcontaniner align-items-center mb-3">
                              <input class="form-check-input attch" type="checkbox" name="nearby[]" value="Market" id="flexCheckDefault">
                              <label class="form-check-label mx-3" for="flexCheckDefault">
                                Market
                              </label>
                              <input type="text" style="max-width:200px" class="form-control attchvalue" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-check d-flex checkboxcontaniner align-items-center mb-3">
                              <input class="form-check-input attch" type="checkbox" name="nearby[]" value="PoliceStation" id="flexCheckDefault">
                              <label class="form-check-label mx-3" for="flexCheckDefault">
                                Police station
                              </label>
                              <input type="text" style="max-width:200px" class="form-control attchvalue" />
                            </div>
                          </div>
                          <input type="hidden" id="upoutdoor" value="{{ $updateOnBaord->outdoor_features }}">
                          <input type="hidden" id="upindoor" value="{{ $updateOnBaord->indoor_feature }}">
                          <input type="hidden" id="upprop" value="{{ $updateOnBaord->property_utility }}">
                          <div class="col-md-4">
                            <div class="form-check d-flex checkboxcontaniner align-items-center mb-3">
                              <input class="form-check-input attch" type="checkbox" name="nearby[]" value="Market" id="flexCheckDefault">
                              <label class="form-check-label mx-3" for="flexCheckDefault">
                                Market
                              </label>
                              <input type="text" style="max-width:200px"  class="form-control attchvalue" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-check d-flex checkboxcontaniner align-items-center mb-3">
                              <input class="form-check-input attch" type="checkbox" name="nearby[]" value="Hospital" id="flexCheckDefault">
                              <label class="form-check-label mx-3" for="flexCheckDefault">
                                Hospital
                              </label>
                              <input type="text" style="max-width:200px"  class="form-control attchvalue" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-check d-flex checkboxcontaniner align-items-center mb-3">
                              <input class="form-check-input attch" type="checkbox" name="nearby[]" value="Airport" id="flexCheckDefault">
                              <label class="form-check-label mx-3" for="flexCheckDefault">
                                Airport
                              </label>
                              <input type="text" style="max-width:200px"  class="form-control attchvalue" />
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="mt-2 legendFormSubBTN ">
                      <input type="submit" class="btn btn-primary me-2" value="Save">
                    </div>
              </div>

              
            </div> 
           {{-- </div>
           </div> --}}
         <!-- Merged -->
       </form>
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
 <!-- category Modal -->
 <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
  <form action="{{ route('masterCategory') }}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCenterTitle">Add New Categories</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <div class="row g-2">
          <div class="col mb-0">
            <label for="nameWithTitle" class="form-label">Category Name</label>
            <input
              type="text"
              {{-- id="propcategoryname" --}}
              class="form-control"
              placeholder="Category Name"
              name="categoryname"
              reuired
            />
          </div>
          <div class="col mb-0"  id="taggs">
            <label for="emailWithTitle" class="form-label">Category Tags</label>
            <input
              type="text"
              placeholder="Category Tags"
              class="form-control"
              name="tags"
              data-role="tagsinput"
            />
          </div>
        </div>
        <div class="row g-2">
          <div class="col mb-0" id="isfeatured">
            <label class="form-label" for="basic-default-password12">isFeatured</label>
            <div class="input-group">
              <select  class="form-control" name="isfeatured" required>
                  <option value="1" selected>No</option>
                  <option value="0">yes</option>
              </select>
            </div>
          </div>
          <div class="col mb-0">
            <label for="dobWithTitle" class="form-label">Category Image</label>
            <input
              type="file"
              {{-- id="categoryImage" --}}
              class="form-control"
              name="categoryImage"
            />
          </div>
          {{-- <input type="hidden" name="id" id="id"> --}}
        </div>
        {{-- <div class="row g-2 mt-2" id="existimage">
          
        </div> --}}
      </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          Close
        </button> --}}
        <input type="submit" class="btn btn-primary" value="Save changes">
      </form>
      </div>
    </div>
  </div>
</div>
{{-- category modal end here --}}
<!-- owner Modal -->
<div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel3">Add Owner</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form id="formAccountSettings" action="{{ route('addUser') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="card mb-4">
              <h5 class="card-header">Owner Details</h5>
              <!-- Account -->
              <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                  <img
                    id="imagePView"
                    src="../assets/img/avatars/1.png"
                    alt="user-avatar"
                    class="d-block rounded"
                    height="100"
                    width="100"
                   
                  />
                  <div class="button-wrapper">
                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                      <span class="d-none d-sm-block">Upload photo</span>
                      <i class="bx bx-upload d-block d-sm-none"></i>
                      <input
                        type="file"
                        id="upload"
                        class="account-file-input"
                        hidden
                        accept="image/png, image/jpeg"
                        name = "profileimage"
                      />
                    </label>
                    {{-- <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                      <i class="bx bx-reset d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Reset</span>
                    </button> 
                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG.
                       Max size of 800K
                    </p> --}}
                  </div>
                </div>
              </div>
              <hr class="my-0" />
              <div class="card-body">
               
                  <div class="row">
                    <div class="mb-3 col-md-6">
                      <label for="firstName" class="form-label">Owner Name</label>
                      <input
                        class="form-control"
                        type="text"
                        id="firstName"
                        name="fullname"
                        value="John"
                        autofocus
                        required
                      />
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="email" class="form-label">E-mail</label>
                      <input
                        class="form-control"
                        type="text"
                        id="email"
                        name="email"
                        value="john.doe@example.com"
                        placeholder="john.doe@example.com"
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
                          type="tel"
                          id="phoneNumber"
                          name="phoneNumber"
                          class="form-control"
                          placeholder="202 555 0111"
                          required
                        />
                        <input type="hidden" name="role" value="5">
                      </div>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="address" class="form-label">Address</label>
                      <input type="text" class="form-control" id="address" name="address" placeholder="Address" required />
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label" for="country">Country</label>
                      {{-- <select  class="select2 form-select" name="country" onchange="print_state('state',this.selectedIndex)" id="country" required>
                      
                      </select> --}}
                      <input type="text" class="form-control" name="country" id="country" placeholder="country">
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="state" class="form-label">State</label>
                      {{-- <select  class="select2 form-select" id="state" name="state" required>
                  
                      </select> --}}
                      <input type="text" class="form-control" name="state" id="state" placeholder="state">
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="language" class="form-label">City</label>
                      <input type="text" placeholder="City Here..." name="city" required class="form-control">
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="zipCode" class="form-label">Zip Code</label>
                      <input
                        type="text"
                        class="form-control"
                        id="zipCode"
                        name="zipCode"
                        placeholder="231465"
                        maxlength="6"
                        required
                      />
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="" class="form-label">Password</label>
                      <input
                        type="password"
                        class="form-control"
                        {{-- id="zipCode" --}}
                        name="password"
                        placeholder="******"
                        maxlength="6"
                        required
                      />
                    </div>
                    {{-- <div class="mb-3 col-md-6">
                      <label for="language" class="form-label">Give Permission</label>
                      <select id="language" class="select2 form-select" name="role" required>
                        <option value="">Select Permission</option>
                        <option value="0">Admin</option>
                        <option value="1">Customber/tenant</option>
                        <option value="2">Site Engineer</option>
                        <option value="3">Vendor</option>
                        <option value="4">Support/Help Desk</option>
                      </select>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="language" class="form-label">Passoword</label>
                      <input type="password" placeholder="Password Here..." name="password" required class="form-control">
                    </div> --}}
                    
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
          <button type="submit" class="btn btn-primary">Add Owner</button>
      </div>
  </form>
    </div>
  </div>
</div>
{{-- owner modal end here --}}
{{-- property fasility --}}
{{-- Modal  --}}
<!-- Vertically Centered Modal -->
<div class="col-lg-4 col-md-6">
  <div class="mt-3">
    <!-- Modal -->
    <div class="modal fade" id="modalCenterfac" tabindex="-1" aria-hidden="true">
      <form action="{{ route('owneraddFeatureList') }}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">Add new facility</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="row g-2">
              <div class="col mb-0">
                <label for="nameWithTitle" class="form-label">Feature Name</label>
                <input
                  type="text"
                  {{-- id="featurename" --}}
                  class="form-control"
                  placeholder="Feature Name"
                  name="featurename"
                  reuired
                />
              </div>
              <div class="col mb-0">
                <label class="form-label" for="basic-default-password12">Select Category</label>
                  <div class="input-group">
                    <select  class="form-control" name="category" id="featureCategory" required>
                      @foreach ($categoriesDetails as $categoryItem)
                         <option value="{{ $categoryItem->category_id }}">{{ $categoryItem->category_name }}</option>
                      @endforeach
                    </select>
                  </div>
              </div>
            </div>
          </div>
          {{-- <input type="hidden" name="id" id="id"> --}}
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
{{-- property fasicility end here --}}
  <!-- indoor Modal -->
  <div class="modal fade" id="modalCenterindoor" tabindex="-1" aria-hidden="true">
    <form action="{{ route('owneraddPropertyIndoor') }}" method="post" enctype="multipart/form-data">
      @csrf
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Make Changes in indoor List</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <div class="row g-2">
            <div class="col mb-0">
              <label for="nameWithTitle" class="form-label">indoor Name</label>
              <input
                type="text"
                {{-- id="indoorName" --}}
                class="form-control"
                placeholder="indoor Name"
                name="indoorname"
                reuired
              />
            </div>
            <div class="col mb-0">
              <label class="form-label" for="basic-default-password12">Select Category</label>
                <div class="input-group">
                  <select  class="form-control" name="category" id="indoorCategory" required>
                    @foreach ($categoriesDetails as $categoryItem)
                       <option value="{{ $categoryItem->category_id }}">{{ $categoryItem->category_name }}</option>
                    @endforeach
                  </select>
                </div>
            </div>
          </div>
        </div>
        {{-- <input type="hidden" name="id" id="id"> --}}
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
{{-- indoor features end here --}}
    <!-- Modal -->
    <div class="modal fade" id="modalCenteroutdoor" tabindex="-1" aria-hidden="true">
      <form action="{{ route('owneraddPropertyOutdoor') }}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">Outdoor features</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="row g-2">
              <div class="col mb-0">
                <label for="nameWithTitle" class="form-label">Outdoor Name</label>
                <input
                  type="text"
                  {{-- id="outdoorName" --}}
                  class="form-control"
                  placeholder="Outdoor Name"
                  name="outdoorname"
                  reuired
                />
              </div>
              <div class="col mb-0">
                <label class="form-label" for="basic-default-password12">Select Category</label>
                  <div class="input-group">
                    <select  class="form-control" name="category" id="outdoorCategory" required>
                      @foreach ($categoriesDetails as $categoryItem)
                         <option value="{{ $categoryItem->category_id }}">{{ $categoryItem->category_name }}</option>
                      @endforeach
                    </select>
                  </div>
              </div>
            </div>
          </div>
          {{-- <input type="hidden" name="id" id="id"> --}}
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
{{-- outdoor features add here --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@foreach ($categoriesDetails as $categoriesnames) 
@if($categoriesnames->category_id == $updateOnBaord->propertyCategory) 
<script>
    
    var propcats = document.getElementById('propcats').value;
    
    oowner = document.getElementById('oowner')
    if(oowner.value == 5)
    {
      rute = "{{ url('owner/featuresbycategories')}}/"+propcats
      rutesec ="{{ url('owner/proputlfeatures')}}/"+propcats
      rutethird = "{{ url('owner/indoorcatfeatures')}}/"+propcats
    }else if(oowner.value == 10)
    {

      rute = "{{ url('superadmin/featuresbycategories')}}/"+propcats
      rutesec ="{{ url('superadmin/proputlfeatures')}}/"+propcats
      rutethird = "{{ url('superadmin/indoorcatfeatures')}}/"+propcats
    }
    $.ajax({
        type: "GET",
        url:rute,
        processData: false,
        contentType: false,
        success: function (response) {
            $("#lBox").html(response); 
              // console.log(response)
              outdoor = document.getElementsByClassName('outdoor')
              upoutdoor = document.getElementById('upoutdoor').value.split(",")
              //outdoor
              if(outdoor.length > 0)
              {

                for (let t = 0; t < outdoor.length; t++) {
                  for (let i = 0; i < upoutdoor.length; i++) {
                        if(outdoor[t].value == upoutdoor[i])
                        {
                          outdoor[t].setAttribute('checked','checked')
                        }
                  }
                }
              }
        },
    });
    $.ajax({
        type: "GET",
        url:rutesec,
        processData: false,
        contentType: false,
        success: function (response) {
            $("#lBox2").html(response); 
              // console.log(response)
              proputl = document.getElementsByClassName('proputl')
              upprop = document.getElementById('upprop').value.split(",")
               //property utility
               if(proputl.length > 0)
               {
                  for (let j = 0; j < proputl.length; j++) {
                    for (let k = 0; k < upprop.length; k++){
                      if(proputl[j].value == upprop[k])
                      {
                        // console.log(proputl[j].value)
                        proputl[j].setAttribute('checked','checked')
                      }
                    }
                  }
               }
        },
    });
    $.ajax({
        type: "GET",
        url:rutethird,
        processData: false,
        contentType: false,
        success: function (response) {
            $("#lBox3").html(response); 
              // console.log(response)\
              //indoor
              indoor = document.getElementsByClassName('indoor')
              upindoor = document.getElementById('upindoor').value.split(",")
              if(indoor.length > 0)
              {
                for (let g = 0; g < indoor.length; g++) {
                     for (let h = 0; h < upindoor.length; h++) {
                        if(indoor[g].value == upindoor[h])
                        {
                           indoor[g].setAttribute('checked','checked')
                        }
                     }
                }
              }
        },
    });
</script>
@endif
@endforeach
<script>
    $(document).ready(function () {
        $(".propcat").change(function (event) {
            // event.preventDefault(); 
            var propcats = document.getElementById('propcats').value;
            oowner = document.getElementById('oowner')
            if(oowner.value == 5)
            {
              rute = "{{ url('owner/featuresbycategories')}}/"+propcats
              rutesec ="{{ url('owner/proputlfeatures')}}/"+propcats
              rutethird = "{{ url('owner/indoorcatfeatures')}}/"+propcats
            }else if(oowner.value == 10)
            {

              rute = "{{ url('superadmin/featuresbycategories')}}/"+propcats
              rutesec ="{{ url('superadmin/proputlfeatures')}}/"+propcats
              rutethird = "{{ url('superadmin/indoorcatfeatures')}}/"+propcats
            }
            $.ajax({
                type: "GET",
                url:rute,
                processData: false,
                contentType: false,
                success: function (response) {
                    $("#lBox").html(response); 
                    outdoor = document.getElementsByClassName('outdoor')
                    upoutdoor = document.getElementById('upoutdoor').value.split(",")
                    //outdoor
                    if(outdoor.length > 0)
                    {

                      for (let t = 0; t < outdoor.length; t++) {
                        for (let i = 0; i < upoutdoor.length; i++) {
                              if(outdoor[t].value == upoutdoor[i])
                              {
                                outdoor[t].setAttribute('checked','checked')
                              }
                        }
                      }
                    }
                },
            });
            $.ajax({
                type: "GET",
                url:rutesec,
                processData: false,
                contentType: false,
                success: function (response) {
                    $("#lBox2").html(response); 
                    proputl = document.getElementsByClassName('proputl')
                    upprop = document.getElementById('upprop').value.split(",")
                    //property utility
                    if(proputl.length > 0)
                    {
                        for (let j = 0; j < proputl.length; j++) {
                          for (let k = 0; k < upprop.length; k++){
                            if(proputl[j].value == upprop[k])
                            {
                              // console.log(proputl[j].value)
                              proputl[j].setAttribute('checked','checked')
                            }
                          }
                        }
                    }
                },
            });
            $.ajax({
                type: "GET",
                url:rutethird,
                processData: false,
                contentType: false,
                success: function (response) {
                    $("#lBox3").html(response); 
                    indoor = document.getElementsByClassName('indoor')
                    upindoor = document.getElementById('upindoor').value.split(",")
                    if(indoor.length > 0)
                    {
                      for (let g = 0; g < indoor.length; g++) {
                          for (let h = 0; h < upindoor.length; h++) {
                              if(indoor[g].value == upindoor[h])
                              {
                                indoor[g].setAttribute('checked','checked')
                              }
                          }
                      }
                    }
                },
            });
            
        });
    });
</script>

{{-- <script>
    $(document).ready(function () {
        $(".propcat").change(function (event) {
            // event.preventDefault(); 
            var propcats = document.getElementById('propcats').value;
            rute = "{{ url('superadmin/featuresbycategories')}}/"+propcats
            rutesec ="{{ url('superadmin/proputlfeatures')}}/"+propcats
            rutethird = "{{ url('superadmin/indoorcatfeatures')}}/"+propcats
            $.ajax({
                type: "GET",
                url:rute,
                processData: false,
                contentType: false,
                success: function (response) {
                    $("#lBox").html(response); 
                      console.log(response)
                },
            });
            $.ajax({
                type: "GET",
                url:rutesec,
                processData: false,
                contentType: false,
                success: function (response) {
                    $("#lBox2").html(response); 
                      console.log(response)
                },
            });
            $.ajax({
                type: "GET",
                url:rutethird,
                processData: false,
                contentType: false,
                success: function (response) {
                    $("#lBox3").html(response); 
                      console.log(response)
                },
            });
            
        });
    });
</script> --}}
<style>
  .InputeFlexToChangeFields label{ min-width:117px}
  .InputeFlexToChangeFields{display: flex;
    align-items: center;}
  .legendForm legend b{position: absolute;
    background: #fff;
    left: 20px;
    top: -13px;
    padding: 2px 13px;
    border-radius: 3px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    /* font-size: 12px !important; */
    font-weight: 400;
}
.legendForm{ box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; margin-bottom:0px; width:88%; margin:0px auto; margin-bottom:50px; position: relative}
.legendForm .card-body.demo-vertical-spacing.demo-only-element{box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    width: 100%; padding-top:40px;
    margin: 0px auto;}
    .fa-building{ font-size:16px; margin-right:6px}
    .checkboxcontaniner label{ min-width:110px}
    .form-check-input[type=checkbox] {
    border-radius: 10px;
    height: 17px;
    width: 30px;
}
.legendFormSubBTN{ width:88%; margin:0px auto;}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
<script>
  function checkFields() {
    emaill = document.getElementById('emailInput').value;
    numbere = document.getElementById('Number').value;
    pincodee = document.getElementById('Pincode').value;
    emailValid = validateEmail(emaill);
    numberValid = validateMobileNumber(numbere);
    pincodeValid = validateIndianPostalCode(pincodee);
    allValid = emailValid && numberValid && pincodeValid;
    if (allValid) {
      nextBtn.disabled = false;
    } else {
      nextBtn.disabled = true;
    }
  }
  nextBtn = document.getElementById('nextBtn');
  // email validation
  emailSpan = document.getElementById('emailSpan')
  emailFields = document.getElementById('emailInput')
  function validateEmail(email) {
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
  }
  emailFields.addEventListener('input',function(e){
    emailInput = document.getElementById('emailInput').value;
    if (validateEmail(emailInput)) {
      emailSpan.style.color = 'green'
      emailSpan.innerText = "Valid Email"
      nextBtn.disabled = false
    } else {
      emailSpan.style.color = 'red'
      emailSpan.innerText = "Invalid email"
      nextBtn.disabled = true
    }
    checkFields()
  })
  //Mobile Number Validation
  Numbers = document.getElementById('Number');
  NumberSpan = document.getElementById('NumberSpan');
  
  function validateMobileNumber(numbers) {
    const re = /^[0-9]{10}$/; // Assumes a 10-digit number without any formatting characters
    return re.test(numbers);
  }
  Numbers.addEventListener('input',function(e){
     const phoneNumber = document.getElementById('Number').value;
     if (validateMobileNumber(phoneNumber)) {
       NumberSpan.innerText = "Valid phone number"
       NumberSpan.style.color = "green";
       nextBtn.disabled = false
      // console.log('Valid phone number');
     } else {
       NumberSpan.innerText = "Invalid phone number"
       NumberSpan.style.color = "red"
       nextBtn.disabled = true
      // console.log('Invalid phone number');
     }
     checkFields()
  })
 //pincode Validation
 Pincode = document.getElementById('Pincode');
 PincodeSpan = document.getElementById('PincodeSpan');
 function validateIndianPostalCode(code) {
  const indianPinRegex = /^[1-9][0-9]{5}$/;
    return indianPinRegex.test(code);
  }
 Pincode.addEventListener('input',function(e){
   const indianPostalCode = document.getElementById('Pincode').value;
   if (validateIndianPostalCode(indianPostalCode)) {
     PincodeSpan.style.color = "green"
     PincodeSpan.innerText = "Valid Indian postal code"
     nextBtn.disabled = false
   } else {
     PincodeSpan.style.color = "red"
     PincodeSpan.innerText = "Invalid Indian postal code"
     nextBtn.disabled = true
   }
   checkFields()
 })
 //sqr feet calculation
 sqrmt = document.getElementById('sqrmt')
 sqrft = document.getElementById('sqrft')
 sqrmt.addEventListener('input',function(e){
   feet = sqrmt.value * Math.ceil(10.7639)
   sqrft.value = feet
 })
 if(sqrft)
 {
  console.log(sqrft.value)
   if(sqrft.value == 0)
   {
      nextBtn.disabled = true
   }else
   {
      nextBtn.disabled = false
   }
 }
 //start date to end  date
 function validateDates(startDate, endDate) {
  // Convert the date strings to Date objects
  const start = new Date(startDate);
  const end = new Date(endDate);

  // Check if the start date is greater than the end date
  if (start > end) {
    return false; 
  }else
  {
    return true; 
  }

 }

 // Example usage:
fromSpan = document.getElementById('fromSpan');
toSpan = document.getElementById('toSpan');
document.getElementById('txtFrom').addEventListener('input',function(e){
  const startDate = document.getElementById('txtFrom').value; // Replace with your start date
  const endDate = document.getElementById('txtTo').value; // Replace with your end date
  const isValid = validateDates(startDate,endDate);
  if (isValid) {
    fromSpan.innerText = 'Valid date range!'
    fromSpan.style.color = 'green'
    toSpan.innerText = 'Valid date range!'
    toSpan.style.color = 'green'
    nextBtn.disabled = false
  } else {
    fromSpan.innerText = 'Invalid date range!'
    fromSpan.style.color = 'red'
    toSpan.innerText = 'Invalid date range!'
    toSpan.style.color = 'red'
    nextBtn.disabled = true
  }
})
document.getElementById('txtTo').addEventListener('input',function(e){
  const startDate = document.getElementById('txtFrom').value; // Replace with your start date
  const endDate = document.getElementById('txtTo').value; // Replace with your end date
  const isValid = validateDates(startDate, endDate);
  if (isValid) {
    fromSpan.innerText = 'Valid date range!'
    fromSpan.style.color = 'green'
    toSpan.innerText = 'Valid date range!'
    toSpan.style.color = 'green'
    nextBtn.disabled = false
  } else {
    fromSpan.innerText = 'Invalid date range!'
    fromSpan.style.color = 'red'
    toSpan.innerText = 'Invalid date range!'
    toSpan.style.color = 'red'
    nextBtn.disabled = true
  }
  })

  // console.log(toDate)
</script>
<script>
  $(function(){
   $("#country").change(function(){
             var id = $(this).val();
             $.ajax({
                 method: "GET",
                 url: "{{ url('superadmin/getstate') }}/"+id,
                 success: function(data) {
                 $('#stateresult').html(data);
                 },
                 error: function(xhr, status, error) {
                     console.error(xhr.responseText);
                 }
             });
         }); 
     $(".onchangestate").change(function(){
       var id = $(this).val();
       $.ajax({
                 method: "GET",
                 url: "{{ url('superadmin/getcity') }}/"+id,
                 success: function(data) {
                 $('#getcity').html(data);
                 },
                 error: function(xhr, status, error) {
                     console.error(xhr.responseText);
                 }
             });
 
 
     });
  });
</script>
@endsection 