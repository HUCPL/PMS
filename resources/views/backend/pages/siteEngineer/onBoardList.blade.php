@extends('backend.layout.main')
@push('title')
    <title>Admin|OnBoard List</title>
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
                        <a href="{{ route('addPropertyOnBoard') }}" class="btn btn-primary"   >Add onBoard</a>
                </div>
              <div class="card-body demo-vertical-spacing demo-only-element">
                {{-- @if ($userDetails->isNotEmpty()) --}}
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">SrNo.</th>
                        <th scope="col" style="white-space: nowrap">Owner Name</th>
                        <th scope="col">Property Name</th>
                        <th scope="col">Aggrement_ID</th>
                        <th scope="col">Aggrement_from</th>
                        <th scope="col">Aggrement_to</th>
                        <th scope="col">Property_for</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                      @php
                       $i = 1;
                      @endphp
                      @foreach ($onBoardProperties as $onBoard)
                        <tr>
                          <th scope="row" style="font-size:1rem">{{ $i++ }}</th>
                          <td style="font-size:1rem">{{ $onBoard->ownerName }}</td>
                          <td style="font-size:1rem">{{ $onBoard->propertyName }}</td>
                          <td style="font-size:1rem">{{ $onBoard->aggrement_id }}</td>
                          <td style="font-size:1rem">{{ $onBoard->aggrement_start_date }}</td>
                          <td style="font-size:1rem">{{ $onBoard->aggrement_end_date }}</td>
                          <td style="font-size:1rem">
                              @if ($onBoard->property_for == 0)
                                  Rent
                              @elseif ($onBoard->property_for == 1)
                                  Pms
                              @elseif($onBoard->property_for == 2)  
                                  Both  
                              @endif
                          </td>
                          <td style="font-size:1rem">
                            @if ($onBoard->isApproved == 1)
                                <span style="color:#ffab00;"><a style="cursor:pointer;">Under Reviews</a></span>
                            @elseif ($onBoard->isApproved == 0)
                            <span style="color:green;"><a style="cursor:pointer;">Apprroved</a></span>
                            @elseif ($onBoard->isApproved == 2)
                            <span style="color:red;"><a style="cursor:pointer;">Disapprove</a></span>
                            @endif
                          </td>
                          {{-- <td style="font-size:1rem">
                            @if ($onBoard->file_path != 'No Url') 
                              <img src="{{url('/').$onBoard->file_path }}" style="width:40px; height:40px;">
                            @else
                                No Image
                            @endif
                          </td> --}}
                         
                        </tr>
                      @endforeach
                     
                      
                    </tbody>
                </table>
                {{-- @else
                <div class="alert alert-danger" >Sorry User Detail  Not Exist</div>
                @endif --}}
              </div>
              {{ $onBoardProperties->links() }}
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

@endsection