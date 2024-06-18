@extends('backend.layout.main')
@push('title')
    <title>Ticket|Assign</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous"
        referrerpolicy="no-referrer"/>
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
                        {{--<div class="d-flex p-4 justify-content-start">
                            <h5 class="card-header">Users Lists</h5>
                        </div> --}}
                                {{-- <div class="d-flex p-4 justify-content-end">
                                <a href="#" class="btn btn-primary"   data-bs-toggle="modal"
                                data-bs-target="#largeModal">Add New Expense</a>
                        </div>--}}
                        @if (Auth::user()->role_as == 4)
                            <form action="{{ route('helpDeskticketPriority') }}" method="get">
                        @elseif (Auth::user()->role_as == 10)
                            <form action="{{ route('ticketPriority') }}" method="get">
                        @elseif (Auth::user()->role_as == 5)    
                            <form action="{{ route('OwnerticketPriority') }}" method="get">
                        @endif
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="row p-3 wid67" data-select2-id="5">
                              <style>
                                .wid67{ width: 67%}
                              </style>
                                {{-- <div class="col-md-3" data-select2-id="4"><select class="form-select" name="filterprop" aria-label="Default select example"
                                        >
                                        @foreach ($expensesProperties as $filterprop)  
                                        <option value="{{ $filterprop->propertyID }}" >{{ $filterprop->propertyName->propertyName }}</option>
                                        @endforeach
                                    </select>
                                  </div>
                                  <div class="col-md-3">
                                    <input class="form-control"
                                        type="date" name="expFromDate" />
                                </div> --}}
                                <div class="col-md-3">
                                    <select name="filterkey" class="form-control">
                                       <option value="0">low</option>
                                       <option value="1">Normal</option>
                                       <option value="2">High</option> 
                                    </select>
                                  </div>
                                <div class="col-md-3"><span _ngcontent-eqa-c159=""
                                        class="d-md-block">
                                        <button type="submit"
                                            data-style="zoom-in" class="btn btn-primary ladda-button"
                                            ><span class="ladda-label"><span
                                                   >Filter</span></span><span
                                                class="ladda-spinner"></span></button>
                                              </form>
                                              @if (Auth::user()->role_as == 4)
                                                <a href="{{ route('hepldeskraiseTicket') }}"
                                            data-style="zoom-in" class="btn btn-primary ladda-button"
                                            ><span class="ladda-label"><span
                                                    >View All</span></span><span
                                                class="ladda-spinner"></span></a>
                                                </span>
                                              @endif
                                              @if (Auth::user()->role_as == 5)
                                                <a href="{{ route('raiseTicket') }}"
                                                data-style="zoom-in" class="btn btn-primary ladda-button"
                                                ><span class="ladda-label"><span
                                                        >View All</span></span><span
                                                    class="ladda-spinner"></span></a>
                                                    </span>
                                              @endif
                                              @if (Auth::user()->role_as == 10)
                                                <a href="{{ route('superAdminraiseTicket') }}"
                                                data-style="zoom-in" class="btn btn-primary ladda-button"
                                                ><span class="ladda-label"><span
                                                        >View All</span></span><span
                                                    class="ladda-spinner"></span></a>
                                                    </span>
                                              @endif
                                            </div>
                                             
                                      
                            </div>

                            <a href="#" class="btn btn-primary me-3" data-bs-toggle="modal"
                                data-bs-target="#largeModal">Raised Ticket</a>
                        </div>
                        <div class="card-body demo-vertical-spacing demo-only-element">
                            @if ($ticketDetails->isNotEmpty())
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">SrNo.</th>
                                            <th>Ticket No.</th>
                                            <th scope="col" style="white-space:nowrap;">Property Name</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Messages</th>
                                            @if (Auth::user()->role_as  == 4 || Auth::user()->role_as == 10)
                                            <th scope="col">Owner_id</th>
                                            @endif
                                            <th>Priority</th>
                                            <th scope="col">Files</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($ticketDetails as $ticket)
                                            <tr>
                                                <th scope="row" style="font-size:1rem">{{ $i++ }}</th>
                                                <th>
                                                    {{ $ticket->ticketID }}
                                                </th>
                                                <th>
                                                    {{ $ticket->propertyName->propertyName }}
                                                </th>
                                                <td style="font-size:1rem">
                                                    {{ $ticket->created_at }}
                                                </td>
                                                <td style="font-size:1rem">
                                                    {{ $ticket->Message }}
                                                </td>
                                                @if (Auth::user()->role_as  == 4 || Auth::user()->role_as == 10)
                                                <td style="font-size:1rem">
                                                    {{ $ticket->owner_id }}
                                                </td>
                                                @endif
                                                <td>
                                                    @if ($ticket->setPriority == 0)
                                                        <div class="alert alert-success my-4 text-center" >Low</div>
                                                    @endif
                                                    @if ($ticket->setPriority == 1)
                                                        <div class="alert alert-warning my-4 text-center" >Medium</div>
                                                    @endif
                                                    @if ($ticket->setPriority == 2)
                                                    <div class="alert alert-danger my-4 text-center" >High</div>
                                                @endif
                                                </td>
                                                <td style="font-size:1rem">
                                                    @if (!empty($ticket->file_path))
                                                    <img src="{{ $ticket->file_path }}" style="width:100px; height:100px;">
                                                    @else
                                                     No Image
                                                    @endif
                                                </td>
                                                <td style="white-space: nowrap;">
                                                    @if (Auth::user()->role_as == 4) 
                                                    <a class="btn btn-danger"
                                                        style="color:white;"
                                                        href="{{ route('hepldeskdeleteTicket', ['id' => $ticket->id]) }}"><i
                                                            class="fa-solid fa-trash"></i></a>&nbsp;
                                                    @elseif (Auth::user()->role_as == 5)
                                                    <a class="btn btn-danger"
                                                    style="color:white;"
                                                    href="{{ route('deleteTicket', ['id' => $ticket->id]) }}"><i
                                                        class="fa-solid fa-trash"></i></a>&nbsp; 
                                                    @elseif (Auth::user()->role_as == 10)
                                                    <a class="btn btn-danger"
                                                    style="color:white;"
                                                    href="{{ route('superAdmindeleteTicket', ['id' => $ticket->id]) }}"><i
                                                        class="fa-solid fa-trash"></i></a>&nbsp;            
                                                    @endif
                                                            {{-- <a
                                                        class="btn btn-primary editexpenses" style="color:white;"
                                                        data-propID="{{ $expenses->propertyID }}"
                                                        data-exptype="{{ $expenses->expenses_type }}"
                                                        data-date="{{ $expenses->date }}"
                                                        data-amount="{{ $expenses->amount }}"
                                                        data-expDescription="{{ $expenses->Expense_Description }}"
                                                        data-file_path = "{{ $expenses->file_path }}"
                                                        data-id={{ $expenses->id }} data-bs-toggle="modal"
                                                        data-bs-target="#uplargeModal"><i
                                                            class="fa-solid fa-pen-to-square"></i></a> --}}
                                                    </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-danger">haven,t raised ticket Yet</div>
                            @endif
                        </div>
                        {{ $ticketDetails->links() }}
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
                    <h5 class="modal-title" id="exampleModalLabel3">Ticket Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (Auth::user()->role_as == 4)
                    <form id="formAccountSettings" action="{{ route('hepldeskaddTicket') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @elseif (Auth::user()->role_as == 5)
                    <form id="formAccountSettings" action="{{ route('addTicket') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @elseif (Auth::user()->role_as == 10)
                    <form id="formAccountSettings" action="{{ route('superAdminaddTicket') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @endif
                    
                        <div class="card mb-4">
                            <h5 class="card-header">Raised Ticket</h5>
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="language" class="form-label">Property</label>
                                        <select id="language" class="select2 form-select" name="propertyID" required>
                                            <option value="">Select Property</option>
                                            @foreach ($propertyDetails as $itemProperty)
                                                <option value="{{ $itemProperty->id }}">{{ $itemProperty->propertyName }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="language" class="form-label">Services</label>
                                        <select  class="select2 form-select" name="servicesID" required>
                                            <option value="">Select Services</option>
                                            @foreach ($services as $servicesitem)
                                                <option value="{{ $servicesitem->id }}">{{ $servicesitem->service_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="language" class="form-label">Priority</label>
                                        <select  class="select2 form-select" name="priority" required>
                                            <option value="">Please Select </option>
                                            <option value="0">Low</option>
                                            <option value="1">Normal</option>
                                            <option value="2">High</option>
                                        </select>
                                    </div>
                                    @if (Auth::user()->role_as == 5) 
                                    <input type="hidden" name="ownerID" value="{{ Auth::id() }}">
                                    <input type="hidden" name="cusID" value="{{ Auth::user()->Owner_id }}">
                                    @elseif (Auth::user()->role_as == 4 || Auth::user()->role_as == 10) 
                                    <div class="mb-3 col-md-6">
                                        <label for="" class="form-label">Owner ID</label>
                                        <input type="text" class="form-control" name="cusID" id="Cusid" value="">
                                        <div id="lBox">
                                            
                                        </div>
                                    </div>
                                    @endif
                                    <div class="mb-3 col-md-12">
                                        <label for="" class="form-label">Message</label>
                                        <textarea class="form-control" name="message"></textarea>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="" class="form-label">Upload Image</label>
                                        <input type="file" name="fileAttachment" class="form-control"
                                            accept="image/png, image/gif, image/jpeg">
                                    </div>
                                </div>
                                <!-- /Account -->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-primary" id="sbmt">Raised Ticket</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--- Modal for Update User -->
    <div class="modal fade" id="uplargeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Expenses</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formAccountSettings" action="{{ route('updateExpenses') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card mb-4">
                            <h5 class="card-header">update Expense Details</h5>
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="language" class="form-label">Property</label>
                                        <select class="select2 form-select" name="propertyID" id="propertyID" required>
                                            <option value="">Select Property</option>
                                            @foreach ($propertyDetails as $itemProperty)
                                                <option value="{{ $itemProperty->id }}">{{ $itemProperty->propertyName }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="mb-3 col-md-6">
                                        <label for="" class="form-label">Date</label>
                                        <input type="date" class="form-control" name="expDate" id="expDate">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="" class="form-label">Amount</label>
                                        <input type="number" class="form-control" name="amount" id="amount">
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="" class="form-label">Expenses Description</label>
                                        <textarea class="form-control" name="expDescription" id="expDescription"></textarea>
                                    </div>
                                    <input type="hidden" name="ownerID" value="{{ Auth::Id() }}">
                                    <div class="mb-3 col-md-12">
                                        <label for="" class="form-label">Upload New File</label>
                                        <input type="hidden" name="id" id="id">
                                        <input type="file" name="fileAttachment" class="form-control"
                                        accept="image/png, image/gif, image/jpeg"><br>
                                        <label for="" class="form-label">Existing File</label><br>
                                        <div id="fileAttachment">

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
                            <button type="submit" class="btn btn-primary">update Expense</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    <!--- Modal for Update End Here-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            Cusid = document.getElementById('Cusid');
            Cusid.addEventListener('focusout',function(e){
                    e.preventDefault();
                    propcats = Cusid.value
                    rute = "{{ url('superadmin/verify-ownerID/')}}/"+propcats
                    $.ajax({
                    type: "GET",
                    url:rute,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $("#lBox").html(response); 
                        invalid = document.getElementById('invalid');
                        if(invalid)
                        {
                            document.getElementById('sbmt').disabled = true;
                        }else
                        {
                            document.getElementById('sbmt').disabled = false;
                        }
                    },
                }) 
            })
        })

    </script>
@endsection
