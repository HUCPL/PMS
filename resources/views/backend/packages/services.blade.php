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
              <h5 class="card-header">Add Services</h5>
              <div class="card-body demo-vertical-spacing demo-only-element">
                <label class="form-label">Service Name</label>
                <div class="input-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Name"
                    name="service_name"
                    aria-label="Username"
                    aria-describedby="basic-addon11"
                    required
                  />
                </div>
                <label class="form-label">Amount</label>
                <div class="input-group">
                  <input
                    type="number"
                    min="0"
                    class="form-control"
                    placeholder="Amount"
                    name="amount"
                    aria-label="Username"
                    aria-describedby="basic-addon11"
                    required
                  />
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
            <div class="card mb-4" style="overflow:scroll; -">
              <h5 class="card-header">Services Lists</h5>
              <div class="card-body demo-vertical-spacing demo-only-element">
                @if ($services->isNotEmpty())
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">SrNo.</th>
                        <th scope="col" style="white-space: nowrap">Service Name</th>
                        <th scope="col" style="white-space: nowrap">Amount</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                      @php
                       $i = 1;
                      @endphp
                      @foreach ($services as $service)
                        <tr>
                          <th scope="row" style="font-size:1rem">{{ $i++ }}</th>
                          <td style="font-size:1rem">{{ $service->services_name }}</td>
                          <td style="font-size:1rem">{{'Rs '.$service->amount}}</td>
                          <td><a class="btn btn-danger" style="color:white;" href="{{ route('deleteServices',['id'=>$service->id]) }}"><i class="fa-solid fa-trash"></i></a>&nbsp;<a class="btn btn-primary pacserUpdate" style="color:white;" data-bs-toggle="modal" data-bs-target="#modalCenter" data-name="{{ $service->services_name}}" data-amount="{{ $service->amount}}"  data-id="{{ $service->id  }}" ><i class="fa-solid fa-pen-to-square"></i></a></td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                @else
                <div class="alert alert-danger">Sorry Services Not Exist</div>
                @endif
              </div>
              {{$services->links() }}
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
            <h5 class="modal-title" id="modalCenterTitle">Edit Services</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="row g-2">
                <div class="card mb-4">
                    {{-- <h5 class="card-header">Add Services</h5> --}}
                    <div class="card-body demo-vertical-spacing demo-only-element">
                      <label class="form-label">Service Name</label>
                      <div class="input-group">
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Name"
                          name="service_name"
                          id="srname"
                          aria-label="Username"
                          aria-describedby="basic-addon11"
                          required
                        />
                      </div>
                      <label class="form-label">Amount</label>
                      <div class="input-group">
                        <input
                          type="number"
                          min="0"
                          id="amount"
                          class="form-control"
                          placeholder="Amount"
                          name="amount"
                          aria-label="Username"
                          aria-describedby="basic-addon11"
                          required
                        />
                      </div>
                      {{-- <div class="input-group">
                        <input
                          type="submit"
                          class="btn btn-primary"
                          value="save"
                        />
                      </div> --}}
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