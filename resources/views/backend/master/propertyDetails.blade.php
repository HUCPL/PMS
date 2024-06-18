@extends('backend.layout.main')
@push('title')
    <title>Admin|Property Details</title>
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
 <form action="{{ route('addpropertyDetails') }}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
         <!-- Basic -->
         <div class="col-md-4">
            <div class="card mb-4">
              <h5 class="card-header">Property Details</h5>
              <div class="card-body demo-vertical-spacing demo-only-element">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="firstName" class="form-label">Sqr_Meter</label>
                        <input
                          class="form-control"
                          type="number"
                          name="sqr_meter"
                          placeholder="40"
                          required
                        />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Sqr_Feet</label>
                        <input
                          class="form-control"
                          type="number"
                          name="sqr_feet"
                          placeholder="100"
                          required
                        />
                      </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="firstName" class="form-label">Construction_date</label>
                        <input
                          class="form-control"
                          type="date"
                          name="constructiondate"
                          required
                        />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Next_Renovation</label>
                        <input
                          class="form-control"
                          type="date"
                          name="nextrenovation"
                          required
                        />
                      </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="firstName" class="form-label">Rooms</label>
                        <input
                          class="form-control"
                          type="number"
                          name="rooms"
                          placeholder="4"
                          required
                        />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Floor</label>
                        <input
                          class="form-control"
                          type="number"
                          name="floor"
                          placeholder="5"
                          required
                        />
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
         <div class="col-md-8">
            <div class="card mb-4" style="overflow:scroll; -">
              <h5 class="card-header">Property Details Lists</h5>
              <div class="card-body demo-vertical-spacing demo-only-element">
                @if ($propertyDetails->isNotEmpty())
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">SrNo.</th>
                        <th scope="col" style="white-space: nowrap">Property Details</th>
                        <th scope="col">Construction Date</th>
                        <th scope="col">Next Renovation Date</th>
                        <th scope="col" style="white-space: nowrap">Rooms</th>
                        <th scope="col" style="white-space: nowrap">Floor</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                      @php
                       $i = 1;
                      @endphp
                      @foreach ($propertyDetails as $features)
                        <tr>
                          <th scope="row" style="font-size:1rem">{{ $i++ }}</th>
                          <td style="font-size:1rem">{{ $features->sqr_meter.'*'.$features->sqr_feet }}</td>
                          <td style="font-size:1rem">{{ $features->construction_date}}</td>
                          <td style="font-size:1rem">{{ $features->next_renovation}}</td>
                          <td style="font-size:1rem">{{ $features->rooms}}</td>
                          <td style="font-size:1rem">{{ $features->floor}}</td>
                          {{--<td style="font-size:1rem">
                            @if (!empty($features->tags))
                                {{ $features->tags }}
                            @else
                                No Tags
                            @endif
                          </td>--}}
                          <td style="white-space: nowrap"><a class="btn btn-danger" style="color:white;" href="{{ route('deletepropertyDetails',['id'=>$features->id]) }}"><i class="fa-solid fa-trash"></i></a>&nbsp;<a class="btn btn-primary pDUpdate" style="color:white;" data-bs-toggle="modal"  data-bs-target="#modalCenter" data-id="{{ $features->id }}" data-sqr_meter="{{ $features->sqr_meter }}" data-sqr_feet="{{ $features->sqr_feet }}" data-constructiondata="{{ $features->construction_date }}" data-nextRenovation="{{ $features->next_renovation }}" data-rooms="{{ $features->rooms }}" data-floor="{{ $features->floor }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        </tr>
                      @endforeach
                      
                      
                    </tbody>
                </table>
                @else
                <div class="alert alert-danger">Sorry Property Details Not Exist</div>
                @endif
              </div>
              {{ $propertyDetails->links() }}
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
      <form action="{{ route('updatepropertyDetails') }}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">Make Changes in Property Details</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Sqr_Meter</label>
                    <input
                      class="form-control"
                      type="number"
                      name="sqr_meter"
                      id="sqr_meter"
                      placeholder="40"
                      required
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">Sqr_Feet</label>
                    <input
                      class="form-control"
                      type="number"
                      name="sqr_feet"
                      id="sqr_feet"
                      placeholder="100"
                      required
                    />
                  </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Construction_date</label>
                    <input
                      class="form-control"
                      type="date"
                      name="constructiondate"
                      id="constructiondate"
                      required
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">Next_Renovation</label>
                    <input
                      class="form-control"
                      type="date"
                      name="nextrenovation"
                      id="nextrenovation"
                      required
                    />
                  </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Rooms</label>
                    <input
                      class="form-control"
                      type="number"
                      name="rooms"
                      id="rooms"
                      placeholder="4"
                      required
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">Floor</label>
                    <input
                      class="form-control"
                      type="number"
                      name="floor"
                      id="floor"
                      placeholder="5"
                      required
                    />
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