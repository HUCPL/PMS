@extends('backend.layout.main')
@push('title')
    <title>Admin|Assign</title>
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
            
            <!-- Basic -->
            <div class="col-md-12">  
            <div class="card mb-4" style="overflow:scroll; -">
                {{-- <div class="d-flex p-4 justify-content-start">
                      <h5 class="card-header">Users Lists</h5>
                </div> --}}
                <div class="d-flex p-4 justify-content-end">
                        <a href="#" class="btn btn-primary"   data-bs-toggle="modal"
                        data-bs-target="#largeModal">Assigned Property</a>
                </div>
              <div class="card-body demo-vertical-spacing demo-only-element">
                @if ($assignDetails->isNotEmpty())
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">SrNo.</th>
                        <th scope="col" style="white-space: nowrap">Property Name</th>
                        <th scope="col">Department Name</th>
                        <th scope="col">Services</th>
                        <th scope="col">superVisor</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                      @php
                       $i = 1;
                      @endphp
                      @foreach ($assignDetails as $users)
                        <tr>
                          <th scope="row" style="font-size:1rem">{{ $i++ }}</th>
                          <td style="font-size:1rem">
                            {{ $users->properties->propertyName }}
                          </td>
                          <td style="font-size:1rem">{{ $users->departments->dept_name }}</td>
                          <td style="font-size:1rem">
                            {{ $users->services->service_name }}
                          </td>
                          <td>
                            @if (!empty($users->superVisor->name))
                                  {{ $users->superVisor->name }}
                            @else
                                 No Supervisor assign
                            @endif
                          </td>
                          <td style="white-space: nowrap;"><a class="btn btn-danger" style="color:white;" href="{{ route('deleteAssign',['id'=>$users->id]) }}"><i class="fa-solid fa-trash"></i></a>&nbsp;<a class="btn btn-primary editAssign" style="color:white;" data-propid="{{ $users->propertyID  }}" data-deptID = "{{ $users->deptID }}"  data-serviceId = "{{ $users->servicesID }}" data-supervisor = "{{ $users->superVisorID }}"  data-id="{{ $users->id }}" data-bs-toggle="modal" data-bs-target="#updatelargeModal" ><i class="fa-solid fa-pen-to-square"></i></a></td>
                        </tr>
                      @endforeach
                     
                      
                    </tbody>
                </table>
                @else
                <div class="alert alert-danger" >No Property/Department/Services Assign To Anyone</div>
                @endif
              </div>
              {{ $assignDetails->links() }}
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
      </div>
    </footer>
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>
  </div>
{{-- Modal  --}}
<!-- Vertically Centered Modal -->
    <!-- Modal -->
    <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel3">Assign</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <form id="formAccountSettings" action="{{ route('addAssign') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card mb-4">
                    <h5 class="card-header">Please Select</h5>
                    <!-- Account -->
                    {{-- <div class="card-body">
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
                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button> 
                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG.
                             Max size of 800K
                          </p>
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" /> --}}
                    <div class="card-body">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="language" class="form-label">Property</label>
                            <select id="language" class="select2 form-select" name="propertyID" required>
                              <option value="">Select Property</option>
                              @foreach ($property as $propertyitems)
                                  <option value="{{ $propertyitems->id }}">{{ $propertyitems->propertyName }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="language" class="form-label">Departments</label>
                            <select  class="select2 form-select" name="dept" id="departments"  required>
                              <option value="">Select Departments</option>
                              @foreach ($departments as $departmentsitems)
                                  <option value="{{ $departmentsitems->id }}">{{ $departmentsitems->dept_name }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="srv" class="form-label">Services</label>
                            <select id="srv" class="select2 form-select" name="services" required>
                                <option>Please First Select Departments</option>
                            </select>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="language" class="form-label">Supervisor (optional)</label>
                            <select id="language" class="select2 form-select" name="superVisiorID" required>
                              <option value="">Select Supervisor</option>
                               @foreach ($supervisors as $supervisorsItems)
                                   <option value="{{ $supervisorsItems->id }}">{{ $supervisorsItems->name }}</option>
                               @endforeach
                            </select>
                          </div>
                        </div>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary">Assign</button>
            </div>
        </form>
          </div>
        </div>
    </div>
   <!--- Modal for Update User -->
   <div class="modal fade" id="updatelargeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel3">Assign</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <form id="formAccountSettings" action="{{ route('updateAssign') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <h5 class="card-header">Please Select</h5>
                <!-- Account -->
                {{-- <div class="card-body">
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
                      <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                      </button> 
                      <p class="text-muted mb-0">Allowed JPG, GIF or PNG.
                         Max size of 800K
                      </p>
                    </div>
                  </div>
                </div>
                <hr class="my-0" /> --}}
                <div class="card-body">
                    <div class="row">
                      <div class="mb-3 col-md-6">
                        <label for="language" class="form-label">Property</label>
                        <select class="select2 form-select" name="propertyID" id="propertyID" required>
                          <option value="">Select Property</option>
                          @foreach ($property as $propertyitems)
                              <option value="{{ $propertyitems->id }}">{{ $propertyitems->propertyName }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="language" class="form-label">Departments</label>
                        <select  class="select2 form-select" name="dept" id="department"  required>
                          <option value="">Select Departments</option>
                          @foreach ($departments as $departmentsitems)
                              <option value="{{ $departmentsitems->id }}">{{ $departmentsitems->dept_name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="language" class="form-label">Old Services</label>
                        <select  id="old_services" class="form-control" disabled>
                          @foreach ($servicess as $servicesssitems)
                              <option value="{{ $servicesssitems->id}}">{{ $servicesssitems->service_name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="language" class="form-label">Select New Services</label>
                        <select id="services" class="select2 form-select" name="services">
                            <option value="">Please First Select Departments</option>
                        </select>
                      </div>
                      <input type="hidden" name="id" id="id">
                      <div class="mb-3 col-md-6">
                        <label for="language" class="form-label">Supervisor (optional)</label>
                        <select id="superVisiorID" class="select2 form-select" name="superVisiorID">
                          <option value="">Select Supervisor</option>
                           @foreach ($supervisors as $supervisorsItems)
                               <option value="{{ $supervisorsItems->id }}">{{ $supervisorsItems->name }}</option>
                           @endforeach
                        </select>
                      </div>
                    </div>
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
   <!--- Modal for Update End Here-->
      {{-- <script>
         print_state("state")
      </script> --}}
      {{-- <script language="javascript">print_country("country");print_countr("countr");</script> --}}
<script>
    department = document.getElementById('departments')
    department.addEventListener('change',function(e){
        
        deptId = department.value
        // console.log("working")
        rute = "{{ url('superadmin/servicesbydept/')}}/"+deptId
        $.ajax({
                type: "GET",
                url:rute,
                processData: false,
                contentType: false,
                success: function (response) {
                    $("#srv").html(response); 
                      // console.log(response)
                },
            });
    })
</script>      
@endsection