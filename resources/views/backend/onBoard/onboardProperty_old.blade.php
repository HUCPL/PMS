@extends('backend.layout.main')
@push('title')
    <title>Admin|onBoard Property</title>
  
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
                  <div class="d-flex p-4 justify-content-end">
                          <a href="{{ route('propertyOnBoardList') }}" class="btn btn-primary" >onBoard List</a>
                  </div>
                  <form action="{{ route('addPropertiesOnBoard') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card-body demo-vertical-spacing demo-only-element">
                  <div class="row">
                    <div class="mb-3 col-md-6">
                      <label for="propertyName" class="form-label">Property Name</label>
                      <input
                        class="form-control"
                        type="text"
                        id="propertyName"
                        name="propertyname"
                        value=""
                        autofocus
                        required
                      />
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="propcats" class="form-label">Owner Name</label>
                      <select  class="select2 form-select propcat"  name="owner"  required>
                        
                        @if ($onwerDetails->isNotEmpty())
                          <option value="">No Owner</option>
                         @foreach ($onwerDetails as $ownernames)     
                           <option value="{{ $ownernames->owner_id }}">{{ $ownernames->ownerName }}</option>
                         @endforeach
                        @else     
                         <option value="">First Add Owner Details</option>
                        @endif
                      </select>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="language" class="form-label">Property_For</label>
                      <select id="language" class="select2 form-select" name="property_for" required>
                        <option value="">Select</option>
                        <option value="0">Rent</option>
                        <option value="1">PMS</option>
                        <option value="2">Both</option>
                      </select>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="language" class="form-label">Sqr_Meter</label>
                      <input type="number" placeholder="200" name="sqr_meter" required class="form-control">
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="language" class="form-label">Sqr_Feet</label>
                      <input type="number" placeholder="200" name="sqr_Feet" required class="form-control">
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="language" class="form-label">Construction Date</label>
                      <input type="date" placeholder="200" name="cons_date" required class="form-control">
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="language" class="form-label">Renovation Date</label>
                      <input type="date" placeholder="200" name="renova_date" required class="form-control">
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="language" class="form-label">Start Date</label>
                      <input type="date" placeholder="200" name="start_date" required class="form-control">
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="language" class="form-label">End Date</label>
                      <input type="date" placeholder="200" name="end_date" required class="form-control">
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="language" class="form-label">Rooms</label>
                      <input type="number" placeholder="20" name="rooms" required class="form-control">
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="language" class="form-label">Floor</label>
                      <input type="number" placeholder="20" name="Floor" required class="form-control">
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="language" class="form-label">Property Images</label>
                      <input type="file" placeholder="20" name="propertyImages[]" required class="form-control" accept="image/png, image/gif, image/jpeg" multiple>
                    </div>
                    {{-- <div class="mb-3 col-md-6">
                      <label for="language" class="form-label">Property Videos</label>
                      <input type="file" placeholder="20" name="propertyVideos" required class="form-control" multiple>
                    </div> --}}
                    <div class="mb-3 col-md-6">
                      <label for="propcats" class="form-label">Category</label>
                      <select id="propcats" class="select2 form-select propcat"  name="category"  required>
                        
                        @if ($categoriesDetails->isNotEmpty())
                          <option value="">No Category</option>
                         @foreach ($categoriesDetails as $categoriesnames)     
                           <option value="{{ $categoriesnames->category_id }}">{{ $categoriesnames->category_name }}</option>
                         @endforeach
                        @else     
                         <option value="">No Categories</option>
                        @endif
                      </select>
                    </div>
                    <div class="mb-3 col-md-12 hiddenCB">
                      <label for="language" class="form-label">Property Utility</label><br>
                      <div  class="scrl" style="overflow-y: scroll; width:100%;height:60px;" id="lBox2">
                        Please select category
                      </div>
                    </div>
                    <div class="mb-3 col-md-12 hiddenCB">
                      <label for="language" class="form-label">OutDoor Features</label><br>
                      <div  class="scrl" style="overflow-y: scroll; width:100%;height:60px;" id="lBox">
                        Please select category
                      </div>
                    </div>
                    <div class="mb-3 col-md-12 hiddenCB">
                      <label for="language" class="form-label">inDoor Features</label><br>
                      <div  class="scrl" style="overflow-y: scroll; width:100%;height:60px;" id="lBox3">
                        Please select category 
                      </div>
                    </div>
                    <div class="mt-2">
                    <input type="submit" class="btn btn-primary me-2" value="Save">
                    </div>
                  {{-- <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                  </div> --}}
                 </div>
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
{{-- Modal  --}}
<!-- Vertically Centered Modal -->

    <!-- Button trigger modal -->
    {{-- <button
      
    >
      Launch modal
    </button> --}}

    <!-- Modal -->
   <!--- Modal for Update User -->
   <!--- Modal for Update End Here-->
      {{-- <script>
         print_state("state")
      </script> --}}
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
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
</script>
@endsection