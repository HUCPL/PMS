@extends('backend.layout.main')
@push('title')
    <title>Admin|Edit Sub Unit Property</title>
    <!-- include summernote css/js -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.css" rel="stylesheet">
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
  .bootstrap-tagsinput .tag 
  {
    background: #D61B1A !important;
    border-color: #D61B1A !important;
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
                    <div class="d-flex p-4 justify-content-end" style="width: 88%; margin: 0px auto; padding-right: 0px !important;">
                            @if (Auth::user()->role_as == 10) 
                                <a href="{{ route('propertyOnBoardList') }}" class="btn btn-primary" >onBoard List</a>
                            @elseif (Auth::user()->role_as == 5)
                                <a href="{{ route('propertyList') }}" class="btn btn-primary" >onBoard List</a>
                            @endif
                    </div>
                    @if (Auth::user()->role_as == 10)  
                    <form class="" action="{{ route('editSubUnitOnBoard') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    @elseif (Auth::user()->role_as == 5)
                    <form class="" action="{{ route('editSubUnitOnBoard') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    @endif
                    
                        <div class="legendForm card-body demo-vertical-spacing demo-only-element">
                            <legend><b style="font-size:0.75rem"><i class="fa-regular fa-building"></i>EDIT SUB UNITS </b> </legend> 
                            <div class="row">
                                
                                <input type="hidden" name="id" value="{{ $updatesubUnit->id }}">
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                    <label for="propertySize" class="form-label">Units</label>
                                    <select name="unitID" id="lBox" class="form-control" readonly required>
                                        @if ($rentUnit->isNotEmpty()) 
                                            @foreach ($rentUnit as $propUnits)
                                            <option value="{{ $propUnits->id }}" @if($updatesubUnit->unitID == $propUnits->id ) {{ 'selected' }} @endif>{{ $propUnits->unit_name }}</option>
                                            @endforeach
                                        @else
                                            <option value="">Please first add Units</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                    <label for="propertySize" class="form-label">Sub UNIT NAME</label>
                                    <input type="text" placeholder="" name="unitname" value="{{ $updatesubUnit->unit_name }}"  class="form-control">
                                </div>
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                    <label for="propertySize" class="form-label">Appartements</label>
                                    <input type="number" placeholder="200" name="apprtment" value="{{ $updatesubUnit->appartments }}"    min="0" class="form-control">
                                </div>
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                    <label for="propcats" class="form-label">Rooms NO</label>
                                    <input type="number" class="form-control" value="{{ $updatesubUnit->rooms_no }}" min="0"  name="roomsno">
                                </div>
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                    <label for="language" class="form-label">Sqr_meter</label>
                                    <input type="number" class="form-control" min="0" value="{{ $updatesubUnit->sqr_meter }}"  id="sqrmt" name="sqr_meter"  > 
                                </div>
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                    <label for="language" class="form-label">Sqr_feet</label>
                                    <input type="number" placeholder="200" name="sqr_feet" id="sqrft" value="{{ $updatesubUnit->sqr_feet }}" min="0"  class="form-control" readonly>
                                </div>
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                    <label for="language" class="form-label">Area</label>
                                    <input type="number" placeholder="200" name="area" value="{{ $updatesubUnit->area }}" min="0"  class="form-control">
                                </div>
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                    <label for="language" class="form-label">Bath Rooms</label>
                                    <input type="number" placeholder="200" name="bath" value="{{ $updatesubUnit->bath }}" min="0" class="form-control">
                                </div> 
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                    <label for="language" class="form-label">Features</label>
                                    <input type="text" placeholder="" name="features" value="{{ $updatesubUnit->features }}" data-role="tagsinput" min="0" class="form-control">
                                </div>
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                    <label for="language" class="form-label">BHK Type</label>
                                    <input type="number" placeholder="200" name="bhk" value="{{ $updatesubUnit->bhk }}" min="0" class="form-control">
                                </div>
                                <div class="mb-3 InputeFlexToChangeFields col-md-6">
                                    <label for="language" class="form-label">Ac</label>
                                    <select name="ac" id="ac"   class="form-control">
                                        <option value="0" @if($updatesubUnit->isAc == 0 ) {{ 'selected' }} @endif>Yes</option>
                                        <option value="1" @if($updatesubUnit->isAc == 1 ) {{ 'selected' }} @endif>No</option>
                                    </select>
                                </div>
                                <div class="mb-3 InputeFlexToChangeFields col-md-6">
                                    <label for="language" class="form-label">Furnished</label>
                                    <select name="furnished" id="furnished"   class="form-control">
                                        <option value="0" @if($updatesubUnit->isFurnished == 0 ) {{ 'selected' }} @endif>Fully Furnished </option>
                                        <option value="1" @if($updatesubUnit->isFurnished == 1 ) {{ 'selected' }} @endif>Semi Furnished </option>
                                        <option value="2" @if($updatesubUnit->isFurnished == 2 ) {{ 'selected' }} @endif>Not Furnished</option>
                                    </select>
                                </div>
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                  <label for="language" class="form-label">GENERAL RENT</label>
                                  <input type="number" placeholder="200" value="{{ $updatesubUnit->general_rent }}" name="general" min="0"  class="form-control">
                                </div>
                              <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                  <label for="language" class="form-label">SECURITY DEPOSITE</label>
                                  <input type="number" placeholder="200" value="{{ $updatesubUnit->security_deposite }}" name="securitydeposite" min="0"  class="form-control">
                              </div>
                              <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                  <label for="language" class="form-label">LATE FEES</label>
                                  <input type="number" placeholder="200" value="{{ $updatesubUnit->late_fees }}" name="latefees" min="0" class="form-control">
                              </div> 
                              <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                  <label for="language" class="form-label">ADULT</label>
                                  <input type="number" placeholder="200" value="{{ $updatesubUnit->adult }}" name="adult" min="0" class="form-control">
                              </div>
                              <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                  <label for="language" class="form-label">CHILD</label>
                                  <input type="number" placeholder="200" value="{{ $updatesubUnit->child }}" name="child" min="0" class="form-control">
                              </div>
                              <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                  <label for="language" class="form-label">RENT TYPE</label>
                                  <select name="rentype" id="rentype"   class="form-control">
                                  <option value="0" @if($updatesubUnit->rent_type == 0) selected @endif>Monthly</option>
                                  <option value="1" @if($updatesubUnit->rent_type == 1) selected @endif>Yearly</option>
                                  <option value="2" @if($updatesubUnit->rent_type == 2) selected @endif>Custom</option>
                                  </select>
                              </div>
                              <div class="mb-3  InputeFlexToChangeFields col-md-6 customfield" style="display:none;">
                                  <label for="language" class="form-label ">LEASE START DATE</label>
                                  <input type="date"  name="leasestartdate"  value="{{ $updatesubUnit->lease_start_date }}" class="form-control" >
                              </div>  
                              <div class="mb-3  InputeFlexToChangeFields col-md-6 customfield" style="display:none;">
                                  <label for="language" class="form-label ">LEASE END DATE</label>
                                  <input type="date"  name="leaseenddate"  value="{{ $updatesubUnit->lease_end_date }}" class="form-control" >
                              </div>  
                              <div class="mb-3  InputeFlexToChangeFields col-md-6 customfield" style="display:none;">
                                  <label for="language" class="form-label ">PAY DUE DATE</label>
                                  <input type="date"  name="Payduedate" value="{{ $updatesubUnit->pay_due_date }}"  class="form-control" >
                              </div>
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                    <label for="language" class="form-label">Images</label>
                                    <input type="file" placeholder="200" name="propertyDocuments[]"  class="form-control" multiple>
                                </div>     
                            </div>
                        </div>
                        <div class="mt-2 legendFormSubBTN">
                         <div class="d-flex justify-content-between">
                        <input type="submit" class="btn btn-primary me-2" value="Update">
                      </form>
                      {{-- <a href="{{ route('subUnitOnBoard') }}" class="btn btn-primary me-2">Next</a> --}}
                    </div>
                </div>
                    </form>
              </div>
              <div class="col-md-12">
                {{-- <div class="card mb-4" style="overflow:scroll; -">
                  <h5 class="card-header">Unit Lists</h5>
                  <div class="card-body demo-vertical-spacing demo-only-element">
                    @if ($propertyUnit->isNotEmpty())
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">SrNo.</th>
                            <th scope="col" style="white-space: nowrap">Sub Unit Name</th>
                            <th scope="col" style="white-space: nowrap">Unit Name</th>
                            <th scope="col">Property Name</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                          @php
                           $i = 1;
                          @endphp
                          @foreach ($propertyUnit as $unitList)
                            <tr>
                              <th scope="row" style="font-size:1rem">{{ $i++ }}</th>
                              <td style="font-size:1rem">{{ $unitList->unit_name }}</td>
                              <td style="font-size:1rem">{{ $unitList->units->unit_name }}</td>
                              <td style="font-size:1rem">   @if(!empty($unitList->property->propertyName))
                                {{  $unitList->property->propertyName }}
                                @endif</td>
                              <td><a class="btn btn-danger" style="color:white;" href="{{ route('deleteSubUnitsOnBoard',['id'=>$unitList->id]) }}"><i class="fa-solid fa-trash"></i></a>&nbsp;<a class="btn btn-primary" style="color:white;" href="{{ route('updateSubUnitOnBoard',['id'=>$unitList->id,'ppid'=>$unitList->propID]) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-danger text-center">Sorry  Unit  Not Exist</div>
                    @endif
                  </div>
                  {{ $propertyUnit->links() }}
                </div> --}}
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
  <!--<div class="modal fade viewModelTabsDesign" id="exLargeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header" >
          <h5 class="modal-title" id="exampleModalLabel4">Property Details</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body mc">
          @if (Auth::user()->role_as == 10)  
          <form class="" action="{{ route('addPropertyUnit') }}" method="post" enctype="multipart/form-data">
              @csrf
          @elseif (Auth::user()->role_as == 5)
          <form class="" action="{{ route('addPropertyUnit') }}" method="post" enctype="multipart/form-data">
              @csrf
          @endif
          
              <div class="legendForm card-body demo-vertical-spacing demo-only-element">
                  <legend><b style="font-size:0.75rem"><i class="fa-regular fa-building"></i>PROPERTY UNITS </b> </legend> 
                  <div class="row">
                      {{-- <div class="mb-3  InputeFlexToChangeFields col-md-6">
                          <label for="propertySize" class="form-label">Owner</label>
                          <select name="Owner" id="Cusid" class="form-control">
                              <option value="">Select Owner</option>
                              @foreach ($ownerDetails as $ownerItem) 
                              <option value="{{ $ownerItem->id }}" @if (session('ownerID') == $ownerItem->id)
                                   {{ 'selected' }}
                              @endif >{{ $ownerItem->name }}</option>
                              @endforeach
                          </select>
                      </div> --}}
                      {{-- <input type="text" value="@if (Session::has('propid')){{ Session::get('propid') }}
                      @endif"> --}}
                   
                      {{-- <div class="mb-3  InputeFlexToChangeFields col-md-6">
                          <label for="propertySize" class="form-label">Property</label>
                          <select name="property" id="lBox" class="form-control">
                              <option value="">Select Property</option>
                          </select>
                      </div> --}}
                      <div class="mb-3  InputeFlexToChangeFields col-md-6">
                          <label for="propertySize" class="form-label">UNIT NAME</label>
                          <input type="text" placeholder="" name="unitname" id="unitname"  class="form-control">
                      </div>
                      <div class="mb-3  InputeFlexToChangeFields col-md-6">
                          <label for="propertySize" class="form-label">BED ROOM</label>
                          <input type="number" placeholder="200" name="bedroom" id="bedroom"    min="0" class="form-control">
                      </div>
                      <div class="mb-3  InputeFlexToChangeFields col-md-6">
                          <label for="propcats" class="form-label">BATH</label>
                          <input type="number" class="form-control" min="0"  name="BATH" id="bath">
                      </div>
                      <div class="mb-3  InputeFlexToChangeFields col-md-6">
                          <label for="language" class="form-label">KITCHEN</label>
                          <input type="number" class="form-control" min="0"  name="kitchen" id="kitchen" > 
                      </div>
                      <div class="mb-3  InputeFlexToChangeFields col-md-6">
                          <label for="language" class="form-label">GENERAL RENT</label>
                          <input type="number" placeholder="200" name="general" min="0" id="general"  class="form-control">
                      </div>
                      <div class="mb-3  InputeFlexToChangeFields col-md-6">
                          <label for="language" class="form-label">SECURITY DEPOSITE</label>
                          <input type="number" placeholder="200" name="securitydeposite" min="0"  class="form-control">
                      </div>
                      <div class="mb-3  InputeFlexToChangeFields col-md-6">
                          <label for="language" class="form-label">LATE FEES</label>
                          <input type="number" placeholder="200" name="latefees" min="0" class="form-control">
                      </div> 
                      <div class="mb-3  InputeFlexToChangeFields col-md-6">
                          <label for="language" class="form-label">ADULT</label>
                          <input type="number" placeholder="200" name="adult" min="0" class="form-control">
                      </div>
                      <div class="mb-3  InputeFlexToChangeFields col-md-6">
                          <label for="language" class="form-label">CHILD</label>
                          <input type="number" placeholder="200" name="child" min="0" class="form-control">
                      </div>
                      <div class="mb-3  InputeFlexToChangeFields col-md-6">
                          <label for="language" class="form-label">RENT TYPE</label>
                          <select name="rentype" id="rentype"   class="form-control">
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
                      <div class="mb-3  InputeFlexToChangeFields col-md-6" id="unitimage">
                          
                      </div>
                  </div>
              </div>
              <div class="mt-2 legendFormSubBTN ">
              <input type="submit" class="btn btn-primary me-2" value="Save changes">
              </form>
        </div>
      </div>
    </div>
  </div>-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        Cusid = document.getElementById('Cusid');
        if(Cusid)
        {
            depart = document.getElementById('depart');
            Cusid.addEventListener('change',function(e){
                    e.preventDefault();
                    propcats = Cusid.value
                    rute = "{{ url('v-ownerID/')}}/"+propcats
                    $.ajax({
                    type: "GET",
                    url:rute,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $("#lBox").html(response);
                        console.log(response)
                    },
                })  
            })
        }
    })
</script>

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
<script>
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
</script>
@endsection 