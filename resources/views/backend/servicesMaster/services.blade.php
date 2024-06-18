@extends('backend.layout.main')
@push('title')
    <title>Admin|Services</title>
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
 <form action="{{ route('addServices') }}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
         <!-- Basic -->
         <div class="col-md-6">
            <div class="card mb-4">
              <h5 class="card-header">Service Name</h5>
              <div class="card-body demo-vertical-spacing demo-only-element">
                <div class="input-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Services Name"
                    name="servicesname"
                    aria-label="Username"
                    aria-describedby="basic-addon11"
                    required
                  />
                </div>
                <div class="form-password-toggle">
                  <label class="form-label" for="basic-default-password12">Service Provider</label>
                  <div class="input-group" >
                    <select  class="form-control" name="servicefor"  required>
                        <option value="0">inHouse</option> 
                        <option value="1">Vendor</option>
                    </select>
                  </div>
                </div>
                <div class="form-password-toggle">
                  <label class="form-label" for="basic-default-password12">Parent Services</label>
                  <div class="input-group" >
                    <select  class="form-control" name="parent"  required>
                        <option>Please Select</option>
                        <option value="0">No Parent</option>
                        @foreach ($servicess as $servicesItem) 
                          <option value="{{ $servicesItem->id }}">{{ $servicesItem->service_name }}</option> 
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-password-toggle">
                  <label class="form-label" for="basic-default-password12">Amount &nbsp;&nbsp;<span style="font-size:10px;">(optional)</span></label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-indian-rupee-sign"></i></span>
                    <input
                      type="number"
                      class="form-control"
                      placeholder="Service Amount"
                      aria-label="Amount (to the nearest dollar)"
                      name="amount"
                    />
                    <span class="input-group-text">.00</span>
                  </div>
                </div>
                {{-- <div class="form-password-toggle">
                  <label class="form-label" for="basic-default-password12">Set Priority</label>
                  <div class="input-group" >
                    <select name="filterkey" class="form-control">
                      <option>Please Select</option>
                      <option value="0">low</option>
                      <option value="1">Normal</option>
                      <option value="2">High</option> 
                   </select>
                  </div>
                </div> --}}
               
                <div class="form-password-toggle">
                  <label class="form-label" for="basic-default-password12">Department</label>
                  <div class="input-group" id="deptselect">
                    <select  class="form-control" name="dept_id"  required>
                        @if ($departmentData->isNotEmpty())
                        @foreach ($departmentData as $dept)
                        <option value="{{ $dept->id }}">{{ $dept->dept_name }}</option> 
                        @endforeach
                        @else
                        <option value=" ">Please First Add DepartMents</option>  
                        @endif
                    </select>
                  </div>
                </div>
                <div class="form-password-toggle">
                  <label class="form-label" for="basic-default-password12">Service Description</label>
                  <div class="input-group" >
                    <textarea class="form-control" name="description" row="4" required></textarea>
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
              <h5 class="card-header">Service Image</h5>
              <div class="card-body demo-vertical-spacing demo-only-element">
                <div class="input-group input-group-merge">
                  {{-- <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span> --}}
                  <input
                    type="file"
                    class="form-control"
                    placeholder=""
                    aria-label=""
                    id="mainImages"
                    name="servicesImage"
                    aria-describedby="basic-addon-search31"
                    {{-- id="mImages" --}}
                    style="display: none;"
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
              <h5 class="card-header">Services Lists</h5>
              <div class="card-body demo-vertical-spacing demo-only-element">
                @if ($servicesData->isNotEmpty())
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">SrNo.</th>
                        <th scope="col" style="white-space: nowrap">Service Name</th>
                        <th scope="col">Service_Provider</th>
                        <th scope="col">Department</th>
                        <th scope="col">Parent Service</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Image</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      @php
                       $i = 1;
                      @endphp
                      @foreach ($servicesData as $services)
                        <tr>
                          <th scope="row" style="font-size:1rem">{{ $i++ }}</th>
                          <td style="font-size:1rem">{{ $services->service_name }}</td>
                          <td style="font-size:1rem">
                             @if ($services->for == 0)
                                 inHouse
                             @elseif ($services->for == 1)  
                                 Vendors  
                             @endif
                          </td>
                          <td style="font-size:1rem">
                            {{ $services->departmaents->dept_name }}
                          </td>
                          <td style="font-size:1rem">
                            @if (empty($services->parentservices->service_name))
                              No parent 
                            @else
                              {{ $services->parentservices->service_name }}
                            @endif
                          </td>
                          <td>
                            @if (empty($services->amount))
                                No Amount
                            @else
                              {{ $services->amount }}
                            @endif
                          </td>
                          <td style="font-size:1rem">
                            @if (!empty($services->img_path)) 
                              <img src="{{$services->img_path }}" style="width:40px; height:40px;">
                            @else
                                No Image
                            @endif
                          </td>
                          <td><a class="btn btn-danger" style="color:white;" href="{{ route('deleteServices',['id'=> $services->id]) }}"><i class="fa-solid fa-trash"></i></a>&nbsp;<a class="btn btn-primary updateservices" style="color:white;" data-bs-toggle="modal" data-bs-target="#modalCenter" data-name="{{ $services->service_name }}" data-imagepath="{{ $services->img_path }}" data-deptid = "{{ $services->dept_id }} " data-servicefor= "{{ $services->for }}" data-parent = "{{ $services->id }}" data-amount = "{{ $services->amount }}"  data-id="{{ $services->id }}" data-description = "{{ $services->description }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        </tr>
                      @endforeach
                    
                      
                    </tbody>
                </table>
                @else
                <div class="alert alert-danger">Sorry Services Not Exist</div>
                @endif
              </div>
              {{ $servicesData->links() }}
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
      <form action="{{ route('updateServices') }}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">Change services</h5>
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
                  id="servicename"
                  class="form-control"
                  placeholder="Category Name"
                  name="servicesname"
                  required
                />
              </div>
              <div class="form-password-toggle">
                <label class="form-label" for="basic-default-password12">Service Provider</label>
                <div class="input-group" >
                  <select  class="form-control" name="servicefor" id="servicefor"  required>
                      <option value="0">inHouse</option> 
                      <option value="1">Vendor</option>
                  </select>
                </div>
              </div>
              <div class="form-password-toggle">
                <label class="form-label" for="basic-default-password12">Parent Services</label>
                <div class="input-group" >
                  <select  class="form-control" name="parent" id="parent"  required>
                      <option>Please Select</option>
                      <option value="0">No Parent</option>
                      @foreach ($servicess as $servicesItem) 
                        <option value="{{ $servicesItem->id }}">{{ $servicesItem->service_name }}</option> 
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="form-password-toggle">
                <label class="form-label" for="basic-default-password12">Amount &nbsp;&nbsp;<span style="font-size:10px;">(optional)</span></label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fa-solid fa-indian-rupee-sign"></i></span>
                  <input
                    type="number"
                    class="form-control"
                    placeholder="Service Amount"
                    id="amount"
                    aria-label="Amount (to the nearest dollar)"
                    name="amount"
                  />
                  <span class="input-group-text">.00</span>
                </div>
              </div>
              <div class="form-password-toggle">
                <label class="form-label" for="basic-default-password12">Department</label>
                <div class="input-group" >
                  <select  class="form-control" name="dept_id" id="did"  required>
                    @foreach ($departmentData as $dept)
                      <option value="{{ $dept->id }}">{{ $dept->dept_name }}</option> 
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-password-toggle">
                <label class="form-label" for="basic-default-password12">Service Description</label>
                <div class="input-group" >
                  <textarea class="form-control" name="description" id="description" row="4" required></textarea>
                </div>
              </div>
              <div class="form-password-toggle">
                <label class="form-label" for="basic-default-password12">Service Image</label>
                <div class="input-group">
                  <input type="file" name="servicesImage" class="form-control">
                </div>
              </div>
              
            <div class="row g-2 mt-2" id="serviceimage">
              
            </div>
            <input type="hidden" name="id" id="id">
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