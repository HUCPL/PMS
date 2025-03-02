@extends('backend.layout.main')
@push('title')
    <title>Admin|Update Packages</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- include summernote css/js -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.css" rel="stylesheet">
@endpush
<style>
        .check {
            height:100px;
            overflow-y: overlay;
            /* padding-top:20px;*/
            overflow-x: hidden;
        }
        .hideInput9876 input{ display: none}
        .hideInput9876 label{margin-right: 17px}
        .hideInput9876 .col-md-4{ text-wrap: nowrap; margin-bottom: 5px}
        .check input[type="checkbox"] {
            visibility: hidden;
        }
       .check {flex-wrap: wrap;}
       .check > div { margin-left: 10px}
       .check input[type="checkbox"]+label:before {
            border: 1px solid #d61b1a;
            border-radius: 3px;
            content: "\00a0";
            display: inline-block;
            font: 16px/1em sans-serif;
            height: 16px;
            margin: 0 .25em 0 0;
            padding: 0;
            vertical-align: top;
            width: 16px;
            box-shadow: 0 0.125rem 0.25rem 0 rgba(105, 108, 255, 0.4);
        }
        .check input[type="checkbox"]:checked+label:before {
            background: #d61b1a;
            color: white;
            content: "\2713";
            text-align: center;
        }
        .scrl::-webkit-scrollbar {
      width: 4px;
    }
    .scrl::-webkit-scrollbar-track{
      box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
      border-radius:10px; 
    }
    .scrl::-webkit-scrollbar-thumb {
      background-color: #d61b1a;
      border-radius:10px; 
      /* outline: 1px solid rgb(21, 73, 124); */
    }
    .dnone
    {
      display: none;
    }
</style>
@section('content-wrapper')
<div class="content-wrapper">
    <!-- Content -->
    
 <!-- Include jQuery (required by Summernote) -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <!-- Include Summernote JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.js"></script>
 <form action="{{ route('updatePackages') }}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
         <!-- Basic -->
         <div class="col-md-12">
            <div class="card mb-4">
              
              <h5 class="card-header">Packages</h5>
              <div class="card-body demo-vertical-spacing demo-only-element">
                <div class="row">
                  <div class="col-md-6">
                    <label class="form-label">Package Name</label>
                    <div class="input-group">
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Name"
                        name="package_name"
                        aria-label="Username"
                        aria-describedby="basic-addon11"
                        value="{{ $packages->packages_name }}"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="basic-default-password12">Service Provider</label>
                    <div class="input-group" >
                      <select  class="form-control" name="servicefor"  required>
                          <option value="0" @if ($packages->provider == 0) selected @endif>inHouse</option> 
                          <option value="1" @if ($packages->provider == 1) selected @endif>Vendor</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label class="form-label">Services</label>
                    <div class="mb-3  InputeFlexToChangeFields col-md-12">
                        <!-- <label for="language" class="form-label">inDoor Features</label><br> -->
                        <div  class="" >
                            <div class="check scrl" style="overflow-y: scroll; width:100%;height:180px;flex-wrap:wrap;" id="lBox3" >
                                <div class="hideInput9876" style="display:flex;flex-wrap:wrap;">
                                  <div class="row" style="width:100%;">
                                    @php
                                        $countServices = explode(',',$packages->services);
                                        $countSubServices = explode(',',$packages->subServices);
                                    @endphp
                                    @foreach ($services as $sritem)
                                    <div class="col-lg-3 col-md-4">
                                      <div>
                                        <input type="checkbox" name="servcies[]" id="{{ $sritem->id }}" class="proputl srvcheck clickServices" value="{{$sritem->id}}"
                                                            @if (in_array($sritem->id, $countServices))
                                                                checked
                                                            @endif
                                            />
                                            <label for="{{ $sritem->id }}"  class="label">{{ $sritem->service_name }}</label>
                                        </div>
                                    </div>
                                    @endforeach  
                                  </div>
                                  @foreach ($services as $deptser)
                                    <input type="hidden" value="{{ $deptser->amount }}" class="deptsers">
                                  @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                      <label class="form-label">Sub Services </label>
                      <div class="mb-3  InputeFlexToChangeFields col-md-12">
                        <!-- <label for="language" class="form-label">inDoor Features</label><br> -->
                          <div  class=""  id="lBox3">
                              <div class="check hideInput9876 scrl" style="overflow-y: scroll; width:100%;height:180px;">
                                <div style="" >
                                  {{--  --}}
                                  <div class="row" id="IBox">
                                      @foreach ($subServices as $subitem)
                                          <div class="col-lg-3 col-md-4 rmv dnone"  data-pid="{{ $subitem->parent_id }}">
                                            <input type="checkbox" name="subservcies[]" id="subs{{ $subitem->id }}" class="proputl ss subservices" value="{{ $subitem->id }}"
                                                    @if (in_array($subitem->id, $countSubServices))
                                                        {{ 'checked' }}
                                                    @endif
                                            /><label for="subs{{ $subitem->id }}"  class="label">{{ $subitem->service_name }}</label>
                                          </div>
                                          <input type="hidden" class="parent_id" value="{{ $subitem->parent_id }}">
                                          <input type="hidden" class="subamount" value="{{ $subitem->amount }}">
                                      @endforeach
                                  </div>
                                </div>
                              </div>
                          </div>
                      </div>  
                  </div>
                </div>
                <div class="input-group">
                    <a data-bs-toggle="modal" data-bs-target="#modalCenterser"
                       class="btn btn-primary"
                       style="color:white;"
                    >Add Services</a>
                  </div>
                <div class="form-password-toggle">
                  <label class="form-label" for="basic-default-password12">Amount &nbsp;&nbsp;<span style="font-size:10px;">(optional)</span></label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-indian-rupee-sign"></i></span>
                    <input
                      type="number"
                      class="form-control"
                      placeholder="Package Amount"
                      aria-label="Amount (to the nearest dollar)"
                      name="amount"
                      id="tamount"
                      value=" @if(!empty($packages->amount)) {{$packages->amount }} @endif"
                    />
                    {{ $packages->amount }}
                    <span class="input-group-text">.00</span>
                  </div>
                </div>
                <input type="hidden" value="{{ $packages->package_id }}" name="id">
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
<!-- Modal -->
<div class="modal fade" id="modalCenterser" tabindex="-1" aria-hidden="true">
    <form action="{{ route('addServices') }}" method="post" enctype="multipart/form-data">
      @csrf
          <div class="modal-body">
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
                      <label for="nameWithTitle" class="form-label">Service Name</label>
                      <input
                        type="text"
                        id="servicename"
                        class="form-control"
                        placeholder="Service Name"
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
                            @foreach ($services as $servicesItem) 
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
        </form>
      </div>
    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script>
  deptser = document.getElementsByClassName('deptsers');
  tamount = document.getElementById('tamount')
  subamount = document.getElementsByClassName('subamount');
  ss = document.getElementsByClassName('ss');
  clickServices = document.getElementsByClassName('clickServices');
  total = 0
  for (let kk = 0; kk < clickServices.length; kk++) {
    clickServices[kk].addEventListener('click',function(e){
          total = total + parseInt(deptser[kk].value)
          final = total
          tamount.value = final
          
    })
  }
</script> --}}
<script>
  srvcheck = document.getElementsByClassName('srvcheck')
  parentid = document.getElementsByClassName('parent_id')
  rmv = document.getElementsByClassName('rmv');
  if(srvcheck.length > 0)
  {
     for (let sr = 0; sr < srvcheck.length; sr++) {
         srvcheck[sr].addEventListener('click',function(e){
                if(rmv.length > 0)
                {
                    for (let pid = 0; pid < rmv.length; pid++) {
                             
                             if(rmv[pid].getAttribute('data-pid') == srvcheck[sr].value)
                             {
                               // console.log(srvcheck[sr].value)   
                               // console.log(rmv[pid].getAttribute('data-pid'))
                               rmv[pid].classList.toggle('dnone')
                             }
                    }
                }
         })
         if(srvcheck[sr].checked == true)
        {
            if(rmv.length > 0)
            {
                for (let pid = 0; pid < rmv.length; pid++) {
                            
                            if(rmv[pid].getAttribute('data-pid') == srvcheck[sr].value)
                            {
                            rmv[pid].classList.toggle('dnone')
                            }
                }
            }
        }
     }
  }
</script>
@endsection