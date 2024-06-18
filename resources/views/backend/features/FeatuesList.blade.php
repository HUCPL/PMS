@extends('backend.layout.main')
@push('title')
    <title>Admin|Master Category</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    
    <!-- include summernote css/js -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.css" rel="stylesheet">
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
          <div class="col-md-12">
            <div class="card mb-4" style="overflow:scroll; -">
              <h5 class="card-header">Features Lists</h5>
              <div class="card-body demo-vertical-spacing demo-only-element">
                @if ($features->isNotEmpty())
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">SrNo.</th>
                        <th scope="col" style="white-space: nowrap">Feature Name</th>
                        <th scope="col">isSpecialFeature</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                       $i = 1;
                      @endphp
                      @foreach ($features as $featuresDetails)
                        <tr>
                          <th scope="row" style="font-size:1rem">{{ $i++ }}</th>
                          <td style="font-size:1rem">{{ $featuresDetails->Features_Name }}</td>
                          <td style="font-size:1rem">
                            @if ($featuresDetails->isSpecialFeature == 1) 
                              <span class="btn btn-primary align-center">Yes</span>
                            @else
                               <span class="btn btn-warning">NO</span>
                            @endif
                          </td>
                          <td><a class="btn btn-danger" style="color:white;" href="{{ route('deleteFeature',['id'=> $featuresDetails->id]) }}"><i class="fa-solid fa-trash"></i></a>&nbsp;<a class="btn btn-primary edtbtns" style="color:white;" data-bs-toggle="modal" data-bs-target="#modalCenter" data-name="{{ $featuresDetails->Features_Name }}"  data-sfeatured = "{{ $featuresDetails->isSpecialFeature }}" data-id="{{ $featuresDetails->id }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                
                @else
                    <div class="alert alert-danger text-center">Sorry Features Not Exist</div>
                @endif
              </div>
              {{ $features->links() }}
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
        <div>
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
        </div>
      </div>
    </footer>
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>
  </div>
{{-- Modal  --}}
<!-- Vertically Centered Modal -->
<div class="col-lg-4 col-md-6">
  <div class="mt-3">
    <!-- Button trigger modal -->
    {{-- <button
      
    >
      Launch modal
    </button> --}}

    <!-- Modal -->
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
      <form action="{{ route('updateFeatures') }}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">Edit Features</h5>
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
                  id="categoryname"
                  class="form-control"
                  placeholder="Feature Name"
                  name="featurename"
                  reuired
                />
              </div>
              <div class="form-password-toggle">
                <label class="form-label" for="basic-default-password12">isSpecialFeature</label>
                <div class="input-group" >
                  <select  class="form-control" name="isSpecial" id="isSfeatured"  required>
                      <option value="0" selected>No</option>
                      <option value="1">yes</option>
                  </select>
                </div>
              </div>
            </div>
           <input type="hidden" name="id" id="id">
           {{-- <div class="row g-2 mt-2" id="existimage">
              
           </div> --}}
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
@endsection