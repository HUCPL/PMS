@extends('backend.layout.main')
@push('title')
    <title>Admin|Sub Unit Property</title>
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
                    <form class="" action="{{ route('addSubUnitOnBoard') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    @elseif (Auth::user()->role_as == 5)
                    <form class="" action="{{ route('addSubUnitOnBoard') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    @endif
                    
                        <div class="legendForm card-body demo-vertical-spacing demo-only-element">
                            <legend><b style="font-size:0.75rem"><i class="fa-regular fa-building"></i>PROPERTY SUB UNITS </b> </legend> 
                            <div class="row">
                                @if (isset($propid))
                                  <input type="hidden" value="{{ $propid }}" name="propid">  
                                @else
                                @if (Auth::user()->role_as == 10)
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                   <label for="propertySize" class="form-label">Owner</label>
                                   <select name="Owner" id="Cusid" class="form-control">
                                       <option value="">Select Owner</option>
                                       @foreach ($ownerDetails as $ownerItem) 
                                       <option value="{{ $ownerItem->id }}" @if (session('ownerID') == $ownerItem->id)
                                           {{ 'selected' }}
                                       @endif >{{ $ownerItem->name }}</option>
                                       @endforeach
                                   </select>
                                </div>
                                 <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                   <label for="propertySize" class="form-label">Property</label>
                                   <select  id="prpid" name="propid" class="form-control" required>
                                       <option value=""> Please first select owner</option>
                                   </select>
                               </div>
                               @endif
                               @if (Auth::user()->role_as == 5)
                               <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                   <label for="propertySize" class="form-label">Property</label>
                                   <select  id="prpid"  name="propid" class="form-control">
                                    <option value="">Select Property</option>
                                     @foreach ($onBoardProperties as $propItem)
                                        <option value="{{ $propItem->propUniqueID }}">{{ $propItem->propertyName }}</option>
                                     @endforeach
                                   </select>
                               </div>
                               @endif
                                @endif
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                    <label for="propertySize" class="form-label">Units</label>
                                    <select name="unitID" id="lBoccc" class="form-control" readonly required>
                                        @if(isset($propid))
                                          @if ($rentUnit->isNotEmpty()) 
                                              @foreach ($rentUnit as $propUnits)
                                              <option value="{{ $propUnits->id }}">{{ $propUnits->unit_name }}</option>
                                              @endforeach
                                          @else
                                              <option value="">Please first add Units</option>
                                          @endif
                                        @else
                                              <option value="">Please first Select Property</option>
                                        @endif  
                                    </select>
                                </div>
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                    <label for="propertySize" class="form-label">Sub UNIT NAME</label>
                                    <input type="text" placeholder="" name="unitname"  class="form-control">
                                </div>
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                    <label for="propertySize" class="form-label">Appartements</label>
                                    <input type="number" placeholder="200" name="apprtment"    min="0" class="form-control">
                                </div>
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                    <label for="propcats" class="form-label">Rooms NO</label>
                                    <input type="number" class="form-control" min="0"  name="roomsno">
                                </div>
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                    <label for="language" class="form-label">Sqr_meter</label>
                                    <input type="number" class="form-control" min="0" id="sqrmt" name="sqr_meter"  > 
                                </div>
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                    <label for="language" class="form-label">Sqr_feet</label>
                                    <input type="number" placeholder="" id="sqrft" name="sqr_feet"  min="0"  class="form-control" readonly>
                                </div>
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                    <label for="language" class="form-label">Area</label>
                                    <input type="number" placeholder="" name="area" min="0"  class="form-control">
                                </div>
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                    <label for="language" class="form-label">Bath Rooms</label>
                                    <input type="number" placeholder="" name="bath" min="0" class="form-control">
                                </div> 
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                    <label for="language" class="form-label">Features</label>
                                    <input type="text" placeholder="" name="features" data-role="tagsinput" min="0" class="form-control">
                                </div>
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                  <label for="language" class="form-label">Special Features</label>
                                  <input type="text" placeholder="" name="special_features" data-role="tagsinput" min="0" class="form-control">
                                </div>
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                    <label for="language" class="form-label">BHK Type</label>
                                    <input type="number" placeholder="200" name="bhk" min="0" class="form-control">
                                </div>
                                <div class="mb-3 InputeFlexToChangeFields col-md-6">
                                    <label for="language" class="form-label">Ac</label>
                                    <select name="ac" id="ac"   class="form-control">
                                        <option value="0">Yes</option>
                                        <option value="1">No</option>
                                    </select>
                                </div>
                                <div class="mb-3 InputeFlexToChangeFields col-md-6">
                                    <label for="language" class="form-label">Furnished</label>
                                    <select name="furnished" id="furnished"   class="form-control">
                                        <option value="0">Fully Furnished</option>
                                        <option value="1">Semi Furnished</option>
                                        <option value="2">Not Furnished</option>
                                    </select>
                                </div>
                                {{-- <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                  <label for="language" class="form-label">GENERAL RENT</label>
                                  <input type="number" placeholder="200" name="general" min="0"  class="form-control">
                              </div>
                              <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                  <label for="language" class="form-label">SECURITY DEPOSITE</label>
                                  <input type="number" placeholder="200" name="securitydeposite" min="0"  class="form-control">
                              </div> --}}
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
                              {{-- <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                  <label for="language" class="form-label">RENT TYPE</label>
                                  <select name="rentype" id="rentype"   class="form-control">
                                  <option value="0">Monthly</option>
                                  <option value="1">Yearly</option>
                                  <option value="2">Custom</option>
                                  </select>
                              </div> --}}
                              {{-- <div class="mb-3  InputeFlexToChangeFields col-md-6 customfield" style="display:none;">
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
                              </div> --}}
                                <div class="mb-3  InputeFlexToChangeFields col-md-6">
                                    <label for="language" class="form-label">Images</label>
                                    <input type="file" placeholder="200" name="propertyDocuments[]"  class="form-control" multiple>
                                </div>     
                            </div>
                        </div>
                        <div class="mt-2 legendFormSubBTN ">
                         <div class="d-flex justify-content-between">
                        <input type="submit" class="btn btn-primary me-2" value="Save">
                      </form>
                      {{-- <a href="{{ route('subUnitOnBoard') }}" class="btn btn-primary me-2">Next</a> --}}
                    </div>
                </div>
                    </form>
              </div>
              <div class="col-md-12">
                <div class="card mb-4" style="overflow:scroll; -">
                  <h5 class="card-header">Sub Unit Lists</h5>
                  <div class="card-body demo-vertical-spacing demo-only-element">
                    @if ($propertyUnit->isNotEmpty())
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">SrNo.</th>
                            <th scope="col" style="white-space: nowrap">Sub Unit Name</th>
                            <th scope="col" style="white-space: nowrap">Unit Name</th>
                            {{-- <th scope="col">Property Name</th> --}}
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
                              <td style="font-size:1rem">
                                @if (!empty($unitList->units->unit_name))
                                {{ $unitList->units->unit_name }}
                                @else
                                 NO Unit 
                                @endif
                                </td>
                              {{-- <td style="font-size:1rem">
                                @if (!empty($unitList->property->propertyName))
                                  {{$unitList->property->propertyName}}
                                @else
                                  NO Property 
                                @endif
                                </td> --}}
                              <td><a class="btn btn-danger" style="color:white;" href="{{ route('deleteSubUnitsOnBoard',['id'=>$unitList->id]) }}"><i class="fa-solid fa-trash"></i></a>&nbsp;<a class="btn btn-primary" style="color:white;" href="{{ route('updateSubUnitOnBoard',['id'=>$unitList->id,'ppid'=>$unitList->propID]) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-danger text-center">Sorry Sub Units  Not Exist</div>
                    @endif
                  </div>
                  {{ $propertyUnit->links() }}
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
      </div>
    </footer>
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>
  </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        Cusid = document.getElementById('Cusid');
        prpid = document.getElementById('prpid');
        if(Cusid)
        {
            depart = document.getElementById('depart');
            Cusid.addEventListener('change',function(e){
                    e.preventDefault();
                    propcats = Cusid.value
                    rute = "{{ url('vv-ownerID/')}}/"+propcats
                    $.ajax({
                    type: "GET",
                    url:rute,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $("#prpid").html(response);
                        console.log(response)
                    },
                })  
            })
        }
        if(prpid)
        {
          prpid.addEventListener('change',function(e){
                    e.preventDefault();
                    propcat = prpid.value
                    rute = "{{ url('aj-unit/')}}/"+propcat
                    $.ajax({
                    type: "GET",
                    url:rute,
                    processData:false,
                    contentType:false,
                    success: function (response) {
                        $("#lBoccc").html(response);
                        console.log(response)
                    },
                })  
           })
        }
    })
</script>
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
@endsection 