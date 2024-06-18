@extends('backend.layout.main')
@push('title')
    <title>Admin|Owner Details</title>
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
                        data-bs-target="#largeModal">Add New Owner</a>
                </div>
              <div class="card-body demo-vertical-spacing demo-only-element">
                @if ($ownerDetails->isNotEmpty())
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">SrNo.</th>
                        <th scope="col" style="white-space: nowrap">Owner Name</th>
                        <th scope="col">Owner Id</th>
                        <th scope="col">Address</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                      @php
                       $i = 1;
                      @endphp
                      @foreach ($ownerDetails as $users)
                        <tr>
                          <th scope="row" style="font-size:1rem">{{ $i++ }}</th>
                          <td style="font-size:1rem">{{ $users->name }}</td>
                          <td style="font-size:1rem">
                            {{ $users->Owner_id }}
                          </td>
                          <td style="font-size:1rem">
                            {{ $users->address }}
                          </td>
                          <td style="font-size:1rem">
                            {{ $users->email }}
                          </td>	
                          <td style="font-size:1rem">
                            {{ $users->number }}
                            
                          </td>	
                          <td style="white-space: nowrap;"><a class="btn btn-danger" style="color:white;" href="{{ route('deleteOwnerDetails',['id'=>$users->id]) }}"><i class="fa-solid fa-trash"></i></a>&nbsp;<a class="btn btn-primary editowner" style="color:white;" data-name="{{ $users->name }}" data-email = "{{ $users->email }}"  data-phone = "{{ $users->number }}" data-address="{{ $users->address }}"  data-country="{{ $users->country }}" data-state = "{{ $users->state }}" data-city="{{ $users->city }}" data-ownerid = "{{ $users->OwnerId }}" data-zipcode = "{{ $users->zipcode }}" data-id = "{{ $users->id }}" data-img= "{{ $users->image_path }}" data-bs-toggle="modal" data-bs-target="#updatelargeModal" ><i class="fa-solid fa-pen-to-square"></i></a></td>
                        </tr>
                      @endforeach
                     
                      
                    </tbody>
                </table>
                @else
                <div class="alert alert-danger" >Sorry Owner Detail  Not Exist</div>
                @endif
              </div>
              {{ $ownerDetails->links() }}
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
   <!--- Modal for Update User -->
   <div class="modal fade" id="updatelargeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel3">Update Owner Details</h5>
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
                        id="ownerimagePView"
                        src="{{ asset('assets/img/avatars/1.png') }}"
                        alt="user-avatar"
                        class="d-block rounded"
                        height="100"
                        width="100"
                       
                      />
                      <div class="button-wrapper">
                        <label for="ownerupload" class="btn btn-primary me-2 mb-4" tabindex="0">
                          <span class="d-none d-sm-block">Upload photo</span>
                          <i class="bx bx-upload d-block d-sm-none"></i>
                          <input
                            type="file"
                            id="ownerupload"
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
                            id="ownername"
                            name="fullname"
                            value="John"
                            autofocus
                            required
                          />
                        </div>
                        <input type="hidden" name="role" value="5">
                        <div class="mb-3 col-md-6">
                          <label for="email" class="form-label">E-mail</label>
                          <input
                            class="form-control"
                            type="text"
                            id="owneremail"
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
                              id="ownerphoneNumber"
                              name="phoneNumber"
                              class="form-control"
                              placeholder="202 555 0111"
                              required
                            />
                          </div>
                        </div>
                        <div class="mb-3 col-md-6">
                          <label for="address" class="form-label">Address</label>
                          <input type="text" class="form-control" id="owneraddress" name="address" placeholder="Address" required />
                        </div>
                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="country">Country</label>
                          {{-- <select  class="select2 form-select" name="country" onchange="print_state('state',this.selectedIndex)" id="country" required>
                          
                          </select> --}}
                          <input type="text" class="form-control" name="country" id="ownercountry" placeholder="country">
                        </div>
                        <div class="mb-3 col-md-6">
                          <label for="state" class="form-label">State</label>
                          {{-- <select  class="select2 form-select" id="state" name="state" required>owner
                          </select> --}}
                          <input type="text" class="form-control" name="state" id="ownerstate" placeholder="state">
                        </div>
                        <div class="mb-3 col-md-6">
                          <label for="language" class="form-label">City</label>
                          <input type="text" placeholder="City Here..." name="city" id="ownercity" required class="form-control">
                        </div>
                        <div class="mb-3 col-md-6">
                          <label for="zipCode" class="form-label">Zip Code</label>
                          <input
                            type="text"
                            class="form-control"
                            id="ownerzipCode"
                            name="zipCode"
                            placeholder="231465"
                            maxlength="6"
                            required
                          />
                        </div>
                        <input type="hidden" name="id" id="id">
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
@endsection