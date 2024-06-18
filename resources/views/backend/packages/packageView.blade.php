@extends('backend.layout.main')
@push('title')
    <title>Admin|Packages</title>
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
 <form action="{{ route('addPackages') }}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
          <!-- Merged -->
         <div class="col-md-12">
            <div class="card mb-4" style="overflow:scroll; -">
                <div class="d-flex p-4 justify-content-end">
                           <a href="{{ route('packages') }}" class="btn btn-primary">Add Packages</a>    
                  </div>
              <h5 class="card-header">Packages Lists</h5>
              <div class="card-body demo-vertical-spacing demo-only-element">
                @if ($packages->isNotEmpty())
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">SrNo.</th>
                        <th scope="col" style="white-space: nowrap">Package Name</th>
                        <th scope="col" style="white-space: nowrap">Package</th>
                        <th scope="col" style="white-space: nowrap">Amount</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                      @php
                       $i = 1;
                      @endphp
                      @foreach ($packages as $service)
                        <tr>
                          <th scope="row" style="font-size:1rem">{{ $i++ }}</th>
                          <td style="font-size:1rem">{{ $service->packages_name }}</td>
                          <td style="font-size:1rem;white-space:nowrap;">
                            @if ($service->package_type == 0)
                                Monthly
                            @elseif ($service->package_type == 1) 
                                Quaterly
                            @elseif ($service->package_type == 2)  
                                Half Yearly 
                            @elseif ($service->package_type == 3)  
                                Yearly         
                            @endif
                          </td>
                          <td style="font-size:1rem;white-space:nowrap;">{{'Rs '.$service->amount}}</td>
                          <td style="white-space:nowrap;"><a class="btn btn-danger" style="color:white;" href="{{ route('deletepackages',['id'=>$service->package_id]) }}"><i class="fa-solid fa-trash"></i></a>&nbsp;<a class="btn btn-primary pacUpdate" style="color:white;" href="{{ route('packagesUpdate',['id'=>$service->package_id]) }}" ><i class="fa-solid fa-pen-to-square"></i></a></td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                @else
                <div class="alert alert-danger">Sorry Packages Not Exist</div>
                @endif
              </div>
              {{$packages->links() }}
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
      </div>
    </footer>
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>
  </div>
@endsection