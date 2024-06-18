@extends('backend.layout.main')
@push('title')
    <title>Admin|Product Category</title>
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
 <form action="{{ route('addVendorCategory') }}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
         <!-- Basic -->
         <div class="col-md-6">
            <div class="card mb-4">
              <h5 class="card-header">Category Name</h5>
              <div class="card-body demo-vertical-spacing demo-only-element">
                <div class="input-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Category Name"
                    name="categoryname"
                    aria-label="Username"
                    aria-describedby="basic-addon11"
                    required
                  />
                </div>
                <div class="col mb-0" >
                  <label class="form-label" for="basic-default-password12">Brand</label>
                  <div class="input-group">
                    <select  class="form-control" name="brandId" required>
                           <option value="0" selected>No Parent</option>
                        @foreach ($brands as $branddetails)
                            <option value="{{ $branddetails->brandID }}">{{ $branddetails->brandName }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="input-group">
                  <input
                    type="submit"
                    class="btn btn-primary"
                    value="save"
                  />
                </div>
              </div>
            </div>
          </div>

          <!-- Merged -->
          <div class="col-md-6">
            <div class="card mb-4">
              <h5 class="card-header">Category Image</h5>
              <div class="card-body demo-vertical-spacing demo-only-element">
                <div class="input-group input-group-merge">
                  {{-- <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span> --}}
                  <input
                    type="file"
                    class="form-control"
                    placeholder=""
                    aria-label=""
                    id="mainImages"
                    name="categoryImage"
                    aria-describedby="basic-addon-search31"
                    style="display:none;"
                  />
                  <label for="mainImages" id="imageLabel">
                    <img src="{{ asset('assets/img/images/product.png') }}" id="primaryImage" style="width:100%; height:100%; border-radius:8px;">
                  </label>
                  {{-- @error('categoryImage')
                    <span class="alert alert-danger">
                          {{ $message }}
                    </span>
                  @enderror --}}
                </div>
              </div>
            </div>
          </div>
        </form>
          <div class="col-md-12">
            <div class="card mb-4" style="overflow:scroll; -">
              <h5 class="card-header">Category Lists</h5>
              <div class="card-body demo-vertical-spacing demo-only-element">
                @if ($categoriesDetails->isNotEmpty())
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">SrNo.</th>
                        <th scope="col" style="white-space: nowrap">Category Name</th>
                        <th scope="col" style="white-space: nowrap">Brand</th>
                        <th scope="col">Image</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                       $i = 1;
                      @endphp
                      @foreach ($categoriesDetails as $categoryDetails)
                        <tr>
                          <th scope="row" style="font-size:1rem">{{ $i++ }}</th>
                          <td style="font-size:1rem">{{ $categoryDetails->categoryName }}</td>
                          <td style="font-size:1rem">@if (!empty($categoryDetails->brandName->brandName))
                              {{ $categoryDetails->brandName->brandName }}
                          @else
                            No Brand    
                          @endif</td>
                          <td style="font-size:1rem">
                            @if (!empty($categoryDetails->file_path)) 
                              <img src="{{$categoryDetails->file_path }}" style="width:40px; height:40px;">
                            @else
                                No Image
                            @endif
                          </td>
                          <td><a class="btn btn-danger" style="color:white;" href="{{ route('deleteVendorCategory',['id'=> $categoryDetails->CategoryID])}}"><i class="fa-solid fa-trash"></i></a>&nbsp;<a class="btn btn-primary edtbtns" style="color:white;" data-bs-toggle="modal" data-bs-target="#modalCenter" data-name="{{ $categoryDetails->categoryName }}" data-imagepath="{{ $categoryDetails->file_path }}"  data-id="{{ $categoryDetails->CategoryID }}" data-brandid = @if (!empty($categoryDetails->brandID))
                            {{ $categoryDetails->brandID }}@else {{ 0 }} @endif><i class="fa-solid fa-pen-to-square"></i></a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                
                @else
                    <div class="alert alert-danger text-center">Sorry Category Not Exist</div>
                @endif
              </div>
              {{ $categoriesDetails->links() }}
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
      <form action="{{ route('updateVendorCategory') }}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">Make Changes in Category</h5>
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
                  id="categoryname"
                  class="form-control"
                  placeholder="Category Name"
                  name="categoryname"
                  reuired
                />
              </div>
            </div>
            <div class="row g-2">
              <div class="col mb-0">
                <label class="form-label" for="basic-default-password12">Brand</label>
                <div class="input-group">
                  <select  class="form-control" name="brandId" id="brand" required>
                       <option value="0">No Brand</option>
                        @foreach ($brands as $branddetails)
                        <option value="{{ $branddetails->brandID }}">{{ $branddetails->brandName }}</option>
                        @endforeach
                  </select>
                </div>
              </div>
              <div class="col mb-0">
                <label for="dobWithTitle" class="form-label">Category Image</label>
                <input
                  type="file"
                  id="categoryImage"
                  class="form-control"
                  name="categoryImage"
                />
              </div>
              <input type="hidden" name="id" id="id">
            </div>
            <div class="row g-2 mt-2" id="existimage">
              
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
@endsection