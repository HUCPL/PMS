@extends('backend.layout.main')
@push('title')
    <title>Admin|Feature List</title>
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
 <form action="{{ route('addFeatureList') }}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
         <!-- Basic -->
         <div class="col-md-6">
            <div class="card mb-4">
              <h5 class="card-header">Feature Name</h5>
              <div class="card-body demo-vertical-spacing demo-only-element">
                <div class="input-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Features Name"
                    name="featurename"
                    aria-label="Username"
                    aria-describedby="basic-addon11"
                    required
                  />
                </div>
                {{-- <div class="form-password-toggle">
                  <label class="form-label" for="basic-default-password12">Select Parent Categories</label>
                  <div class="input-group">
                    <select  class="form-control" name="parentcategory" required>
                        <option value="0" selected >No Parent Category</option>
                        @foreach ($Categories as $catItmes)
                            <option value="{{ $catItmes->category_id }}" >{{ $catItmes->category_name }}</option>
                        @endforeach
                    </select>
                  </div>
                </div> --}}
                <div class="form-password-toggle">
                  <label class="form-label" for="basic-default-password12">Select Property Type</label>
                  <div class="input-group">
                    <select  class="form-control" name="category"  required>
                      @if ($categoriesDetails->isNotEmpty())
                      @foreach ($categoriesDetails as $categoryItem)
                      <option value="{{ $categoryItem->category_id }}">{{ $categoryItem->category_name }}</option>
                      @endforeach
                      @else
                        <option value="">Please first add Property Type</option>
                      @endif
                    </select>
                  </div>
                </div>
                {{-- <div class="form-password-toggle">
                    <label class="form-label" for="basic-default-password12">Feature Tags</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="feature Tags"                 
                    name="tags"
                    aria-label="Recipient's username"
                    aria-describedby="basic-addon13"
                    data-role="tagsinput"
                  />
                </div> --}}
               
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
            <div class="card mb-4" style="overflow:scroll; -">
              <h5 class="card-header">Feature Lists</h5>
              <div class="card-body demo-vertical-spacing demo-only-element">
                @if ($featureList->isNotEmpty())
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">SrNo.</th>
                        <th scope="col" style="white-space: nowrap">Feature Name</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                      @php
                       $i = 1;
                      @endphp
                      @foreach ($featureList as $features)
                        <tr>
                          <th scope="row" style="font-size:1rem">{{ $i++ }}</th>
                          <td style="font-size:1rem">{{ $features->features_name }}</td>
                          <td style="font-size:1rem">{{ $features->masterCategory->category_name}}</td>
                          {{-- <td style="font-size:1rem">
                            @if (!empty($features->tags))
                                {{ $features->tags }}
                            @else
                                No Tags
                            @endif
                          </td> --}}
                          <td><a class="btn btn-danger" style="color:white;" href="{{ route('deleteFeatureList',['id'=>$features->	features_id]) }}"><i class="fa-solid fa-trash"></i></a>&nbsp;<a class="btn btn-primary featuresUpdate" style="color:white;" data-bs-toggle="modal" data-bs-target="#modalCenter" data-name="{{ $features->features_name }}" data-category = "{{ $features->master_category}}" data-id="{{ $features->features_id }}" ><i class="fa-solid fa-pen-to-square"></i></a></td>
                        </tr>
                      @endforeach
                      
                      
                    </tbody>
                </table>
                @else
                <div class="alert alert-danger text-center">Sorry Features Not Exist</div>
                @endif
              </div>
              {{ $featureList->links() }}
            </div>
          </div>
        </form>
         
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
{{-- Modal  --}}
<!-- Vertically Centered Modal -->
<div class="col-lg-4 col-md-6">
  <div class="mt-3">
    <!-- Modal -->
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
      <form action="{{ route('updateFeatureList') }}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">Make Changes in Feature List</h5>
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
                  id="featurename"
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
          <input type="hidden" name="id" id="id">
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