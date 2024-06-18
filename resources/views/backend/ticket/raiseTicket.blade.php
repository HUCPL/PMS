@extends('backend.layout.main')
@push('title')
    <title>Ticket|Raised</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- include summernote css/js -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        .chekBoxWrapper {
            height: 70px;
            overflow-y: overlay;
            /* padding-top:20px;*/
            overflow-x: hidden;
        }
        .chekBoxWrapper input[type="checkbox"] {
            visibility: hidden;
        }
.chekBoxWrapper { flex-wrap: wrap;}
.chekBoxWrapper > div { margin-left: 10px}
        .chekBoxWrapper input[type="checkbox"]+label:before {
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

        .chekBoxWrapper input[type="checkbox"]:checked+label:before {
            background: #d61b1a;
            color: white;
            content: "\2713";
            text-align: center;
        }
    </style>
@endpush
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
                                    .wid67 {
                                        width: 67%
                                    }
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
                                        <option value="3">High</option>
                                    </select>
                                </div>
                                @if (Auth::Id() == 5 || Auth::Id() == 1)
                                    <input type="hidden" name="cusID" value="{{ Auth::Id() }}">
                                @endif
                                <div class="col-md-3"><span _ngcontent-eqa-c159="" class="d-md-block">
                                        <button type="submit" data-style="zoom-in"
                                            class="btn btn-primary ladda-button"><span
                                                class="ladda-label"><span>Filter</span></span><span
                                                class="ladda-spinner"></span></button>
                                        </form>
                                        @if (Auth::user()->role_as == 4)
                                            <a href="{{ route('hepldeskraiseTicket') }}" data-style="zoom-in"
                                                class="btn btn-primary ladda-button"><span class="ladda-label"><span>View
                                                        All</span></span><span class="ladda-spinner"></span></a>
                                    </span>
                                    @endif
                                    @if (Auth::user()->role_as == 5)
                                        <a href="{{ route('raiseTicket') }}" data-style="zoom-in"
                                            class="btn btn-primary ladda-button"><span class="ladda-label"><span>View
                                                    All</span></span><span class="ladda-spinner"></span></a>
                                        </span>
                                    @endif
                                    @if (Auth::user()->role_as == 10)
                                        <a href="{{ route('superAdminraiseTicket') }}" data-style="zoom-in"
                                            class="btn btn-primary ladda-button"><span class="ladda-label"><span>View
                                                    All</span></span><span class="ladda-spinner"></span></a>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div>
                                <a href="#" class="btn btn-primary me-3" data-bs-toggle="modal"
                                    data-bs-target="#largeModal">Raised Ticket</a>
                                {{-- <a href="#" class="btn btn-primary me-3" data-bs-toggle="modal"
                                data-bs-target="#upeditModal">Assign Ticket</a> --}}
                            </div>
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
                                            {{-- @if (Auth::user()->role_as == 4 || Auth::user()->role_as == 10)
                                            <th scope="col">Owner_id</th>
                                            @endif --}}
                                            <th>Priority</th>
                                            <th>Status</th>
                                            <th scope="col">Files</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="rData">
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($ticketDetails as $ticket)
                                            <tr>
                                                <th scope="row" style="font-size:1rem">{{ $i++ }}</th>
                                                <th>
                                                    {{ $ticket->TicketID }}
                                                </th>
                                                <th>
                                                    {{ $ticket->propertyDetails->propertyName }}
                                                </th>
                                                <td style="font-size:1rem">
                                                    {{ $ticket->created_at }}
                                                </td>
                                                <td style="font-size:1rem">
                                                    {{ $ticket->description }}
                                                </td>
                                                {{-- @if (Auth::user()->role_as == 4 || Auth::user()->role_as == 10)
                                                <td style="font-size:1rem">
                                                    {{ $ticket->owner_id }}
                                                </td>
                                                @endif --}}
                                                <td>
                                                    @if ($ticket->Priority == 0)
                                                        <div class="alert alert-success my-4 text-center">Low</div>
                                                    @endif
                                                    @if ($ticket->Priority == 1)
                                                        <div class="alert alert-warning my-4 text-center">Medium</div>
                                                    @endif
                                                    @if ($ticket->Priority == 2)
                                                        <div class="alert alert-danger my-4 text-center">High</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($ticket->status == 0)
                                                        <div class="alert alert-success my-4 text-center">open</div>
                                                    @endif
                                                    @if ($ticket->status == 1)
                                                        <div class="alert alert-warning my-4 text-center">inProgress</div>
                                                    @endif
                                                    @if ($ticket->status == 2)
                                                        <div class="alert alert-danger my-4 text-center">Closed</div>
                                                    @endif
                                                    @if ($ticket->status == 3)
                                                        <div class="alert alert-primary my-4 text-center">reopened</div>
                                                    @endif
                                                </td>
                                                <td style="font-size:1rem">
                                                    @if (!empty($ticket->file_path))
                                                        <img src="{{ $ticket->file_path }}"
                                                            style="width:100px; height:100px;">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>
                                                <td style="white-space: nowrap;">
                                                    @if (Auth::user()->role_as == 4 || Auth::user()->role_as == 10)
                                                        <a class="btn btn-warning ticketDetails" style="color:white;"
                                                            href="#" data-bs-toggle="modal"
                                                            data-bs-target="#exLargeModal"
                                                            data-propName = "{{ $ticket->propertyDetails->propertyName }}"
                                                            data-propType="{{ $ticket->propertyDetails->masterCategory->category_name }}"
                                                            data-address="{{ $ticket->propertyDetails->propertyAddress }}"
                                                            data-country = "{{ $ticket->propertyDetails->country }}"
                                                            data-state = "{{ $ticket->propertyDetails->state }}"
                                                            data-city = "{{ $ticket->propertyDetails->city }}"
                                                            data-zipcode = "{{ $ticket->propertyDetails->zipcode }}"
                                                            data-propfor = "{{ $ticket->propertyDetails->property_for }}"
                                                            data-phone= "{{ $ticket->propertyDetails->phone }}"
                                                            data-email= "{{ $ticket->propertyDetails->email }}"
                                                            data-ticketnumber="{{ $ticket->TicketID }}"
                                                            data-date="{{ $ticket->created_at }}"
                                                            data-status = "{{ $ticket->status }}"
                                                            data-department="{{ $ticket->departments->dept_name }}"
                                                            data-services="{{ $ticket->services->service_name }}"
                                                            data-issuesDescription="{{ $ticket->description }}"
                                                            data-username="{{ $ticket->customberDetails->name }}"
                                                            data-usercountry="{{ $ticket->customberDetails->country }}"
                                                            data-userstate="{{ $ticket->customberDetails->state }}"
                                                            data-usercity="{{ $ticket->customberDetails->city }}"
                                                            data-useraddress="{{ $ticket->customberDetails->address }}"
                                                            data-useremail="{{ $ticket->customberDetails->email }}"
                                                            data-svname="@if (!empty($ticket->superVisorDetails->name)) {{ $ticket->superVisorDetails->name }} @endif"
                                                            data-svemail = "@if (!empty($ticket->superVisorDetails->email)) {{ $ticket->superVisorDetails->email }} @endif"
                                                            data-svphone = "@if (!empty($ticket->superVisorDetails->number)) {{ $ticket->superVisorDetails->number }} @endif"><i
                                                                class="fa-solid fa-eye"></i></a>&nbsp;
                                                        @if (Auth::user()->role_as == 10)
                                                            <a class="btn btn-danger" style="color:white;"
                                                                href="{{ route('superAdmindeleteTicket', ['id' => $ticket->id]) }}"><i
                                                                    class="fa-solid fa-trash"></i></a>&nbsp;
                                                        @else
                                                            <a class="btn btn-danger" style="color:white;"
                                                                href="{{ route('hepldeskdeleteTicket', ['id' => $ticket->id]) }}"><i
                                                                    class="fa-solid fa-trash"></i></a>&nbsp;
                                                        @endif

                                                        <a class="btn btn-primary editticket" style="color:white;"
                                                            href="#" data-bs-toggle="modal"
                                                            data-bs-target="#upeditModal"
                                                            data-ticketnumber="{{ $ticket->TicketID }}"
                                                            data-date="{{ $ticket->created_at }}"
                                                            data-status = "{{ $ticket->status }}"
                                                            data-department="{{ $ticket->departments->dept_name }}"
                                                            data-services="{{ $ticket->services->service_name }}"
                                                            data-city = "{{ $ticket->propertyDetails->city }}"
                                                            data-issuesDescription="{{ $ticket->description }}"
                                                            data-id="{{ $ticket->id }}">Assign</a>&nbsp;
                                                    @elseif (Auth::user()->role_as == 5 || Auth::user()->role_as == 1)
                                                        <a class="btn btn-warning ticketDetails" style="color:white;"
                                                            href="#" data-bs-toggle="modal"
                                                            data-bs-target="#exLargeModal"
                                                            data-propName = "{{ $ticket->propertyDetails->propertyName }}"
                                                            data-propType="{{ $ticket->propertyDetails->masterCategory->category_name }}"
                                                            data-address="{{ $ticket->propertyDetails->propertyAddress }}"
                                                            data-country = "{{ $ticket->propertyDetails->country }}"
                                                            data-state = "{{ $ticket->propertyDetails->state }}"
                                                            data-city = "{{ $ticket->propertyDetails->city }}"
                                                            data-zipcode = "{{ $ticket->propertyDetails->zipcode }}"
                                                            data-propfor = "{{ $ticket->propertyDetails->property_for }}"
                                                            data-phone= "{{ $ticket->propertyDetails->phone }}"
                                                            data-email= "{{ $ticket->propertyDetails->email }}"
                                                            data-ticketnumber="{{ $ticket->TicketID }}"
                                                            data-date="{{ $ticket->created_at }}"
                                                            data-status = "{{ $ticket->status }}"
                                                            data-department="{{ $ticket->departments->dept_name }}"
                                                            data-services="{{ $ticket->services->service_name }}"
                                                            data-issuesDescription="{{ $ticket->description }}"
                                                            data-username="{{ $ticket->customberDetails->name }}"
                                                            data-usercountry="{{ $ticket->customberDetails->country }}"
                                                            data-userstate="{{ $ticket->customberDetails->state }}"
                                                            data-usercity="{{ $ticket->customberDetails->city }}"
                                                            data-useraddress="{{ $ticket->customberDetails->address }}"
                                                            data-useremail="{{ $ticket->customberDetails->email }}"
                                                            data-svname="@if (!empty($ticket->superVisorDetails->name)) {{ $ticket->superVisorDetails->name }} @endif"
                                                            data-svemail = "@if (!empty($ticket->superVisorDetails->email)) {{ $ticket->superVisorDetails->email }} @endif"
                                                            data-svphone = "@if (!empty($ticket->superVisorDetails->number)) {{ $ticket->superVisorDetails->number }} @endif"><i
                                                                class="fa-solid fa-eye"></i></a>&nbsp;
                                                        @if (Auth::user()->role_as == 10)
                                                            <a class="btn btn-danger" style="color:white;"
                                                                href="{{ route('superAdmindeleteTicket', ['id' => $ticket->id]) }}"><i
                                                                    class="fa-solid fa-trash"></i></a>&nbsp;
                                                        @else
                                                            <a class="btn btn-danger" style="color:white;"
                                                                href="{{ route('deleteTicket', ['id' => $ticket->id]) }}"><i
                                                                    class="fa-solid fa-trash"></i></a>&nbsp;
                                                        @endif
                                                        {{-- @elseif (Auth::user()->role_as == 10)
                                                    <a class="btn btn-danger" style="color:white;" href="{{ route('superAdmindeleteTicket', ['id' => $ticket->id]) }}"><i class="fa-solid fa-trash"></i></a>&nbsp; --}}
                                                    @endif
                                                    {{-- <a class="btn btn-primary editexpenses" style="color:white;"
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
                                <form id="formAccountSettings" action="{{ route('superAdminaddTicket') }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                    @endif
                    <div class="card mb-4">
                        <h5 class="card-header">Raised Ticket</h5>
                        <div class="card-body">
                            <div class="row">

                                @if (Auth::user()->role_as == 5 || Auth::user()->role_as == 1)
                                    {{-- <input type="hidden" name="ownerID" value="{{ Auth::id() }}"> --}}
                                    <div class="mb-3 col-md-6">
                                        <label for="propertyID" class="form-label">Property</label>
                                        <select id="propertyID" class="select2 form-select" name="propertyID" required>
                                            <option value="">Select Property</option>
                                            @foreach ($propertyDetails as $itemProperty)
                                                <option value="{{ $itemProperty->propUniqueID }}">
                                                    {{ $itemProperty->propertyName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3  InputeFlexToChangeFields col-md-12">
                                        <label for="propertySize" class="form-label">Units</label>
                                        <div class="col-md-12" >
                                          
                                            <div class="chekBoxWrapper d-flex align-content-center" id="lBoccc">
                                                
                                            </div>
                                          
                                        </div>
                                    </div>
                                    <div class="mb-3  InputeFlexToChangeFields col-md-12">
                                        <label for="propertySize" class="form-label">Sub Units</label>
                                        <div class="col-md-12" >
                                          
                                            <div class="chekBoxWrapper d-flex align-content-center" id="lBsub">
                                                
                                            </div>
                                          
                                        </div>
                                    </div>
                                    <input type="hidden" name="customberID" value="{{ Auth::id() }}">
                                    <div class="mb-3 col-md-6">
                                        <label for="language" class="form-label">Departments</label>
                                        <select class="select2 form-select" name="departments" id="depart" required>
                                            <option value="">Please Select Departments</option>
                                            
                                            @foreach ($departments as $departmentDetails)
                                                <option value="{{ $departmentDetails->dept_id }}">
                                                    {{ $departmentDetails->service_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="language" class="form-label">Services</label>
                                        <select class="select2 form-select" name="services" id="dBox" required>
                                            <option value="">First Please Select Department</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="" class="form-label">Upload Image</label>
                                        <input type="file" name="fileAttachment" class="form-control"
                                            accept="image/png, image/gif, image/jpeg">
                                    </div>
                                @elseif (Auth::user()->role_as == 4 || Auth::user()->role_as == 10)
                                    <div class="mb-3 col-md-6">
                                        <label for="" class="form-label">Customber/Tenant ID</label>
                                        <input type="text" class="form-control" name="customberID" id="Cusid"
                                            value="">
                                        <div id="lBox">
                                                
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="propertyID" class="form-label">Property</label>
                                        <select id="propertyID" class="select2 form-select" name="propertyID" required>
                                            <option value="">Please First Enter Customber Id</option>
                                            {{-- @foreach ($propertyDetails as $itemProperty)
                                                <option value="{{ $itemProperty->id }}">{{ $itemProperty->propertyName }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="language" class="form-label">Priority</label>
                                        <select class="select2 form-select" name="priority" required>
                                            <option value="">Please Select </option>
                                            <option value="0">Low</option>
                                            <option value="1">Normal</option>
                                            <option value="2">High</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="language" class="form-label">Services</label>
                                        <select class="select2 form-select" name="departments" id="depart" required>
                                            <option value="">Please Select Services</option>
                                            @foreach ($departments as $departmentDetails)
                                                <option value="{{ $departmentDetails->dept_id }}">
                                                    {{ $departmentDetails->service_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="language" class="form-label">Departments</label>
                                        <select class="select2 form-select" name="services" id="dBox" required>
                                            <option value="">First Please Select Services</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="" class="form-label">Submit By</label>
                                        <input class="form-control" name="submitBy">
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="" class="form-label">Upload Image</label>
                                        <input type="file" name="fileAttachment" class="form-control"
                                            accept="image/png, image/gif, image/jpeg">
                                    </div>
                                @endif

                                <div class="mb-3 col-md-12">
                                    <label for="" class="form-label">Brief About issues</label>
                                    <textarea class="form-control" name="message"></textarea>
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
    </div>
    {{-- Modal End here --}}
    {{-- edit ticket modal --}}
    <!--- Modal for Update User -->
    <div class="modal fade" id="upeditModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Ticket Assign</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    @if (Auth::user()->role_as == 10 || Auth::user()->role_as == 4)
                        <form id="formAccountSettings" action="{{ route('hepldeskAssignTicket') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                    @endif
                    <div class="card mb-4">
                        <h5 class="card-header">Assign Ticket</h5>
                        <div class="card-body">
                            <div class="row">
                                @if (Auth::user()->role_as == 4 || Auth::user()->role_as == 10)
                                    <div class="mb-3 col-md-6">
                                        <label for="language" class="form-label">Priority</label>
                                        <select class="select2 form-select" name="priority" required>
                                            <option value="">Please Select </option>
                                            <option value="0">Low</option>
                                            <option value="1">Normal</option>
                                            <option value="2">High</option>
                                        </select>
                                    </div>
                                    <input type="hidden" id="idd" name="id">
                                    <input type="hidden" value="1" name="assigned">
                                    <div class="mb-3 col-md-6">
                                        <label for="language" class="form-label">SuperVisor</label>
                                        <select id="language" class="select2 form-select" name="supervisorID" required>
                                            <option value="">Select select SuperVisor</option>
                                            @foreach ($superVisorNear as $sVisor)
                                                <option value="{{ $sVisor->id }}">{{ $sVisor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            </div>
                            <!-- /Account -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary" id="sbmt">Assign Ticket</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end here --}}
    <!-- Extra Large Modal for ticket details -->
    <div class="modal fade viewModelTabsDesign" id="exLargeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4">Ticket Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <h6>Ticket</h6>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ticket Number</td>
                                        <td id="ticketno"></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td id="status"></td>
                                    </tr>
                                    <tr>
                                        <td>Departments</td>
                                        <td id="department"></td>
                                    </tr>
                                    <tr>
                                        <td>Service</td>
                                        <td id="ticketservice"></td>
                                    </tr>
                                    <tr>
                                        <td>Ticket issue</td>
                                        <td id="ticketissue"></td>
                                    </tr>
                                    <tr>
                                        <td>Submit_by</td>
                                        <td id="ticketsubmit"></td>
                                    </tr>
                                    <tr>
                                        <td>START DATE</td>
                                        <td id="ticketstart"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <h6>Raised by</h6>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>FullName</td>
                                        <td id="userName"></td>
                                    </tr>
                                    <tr>
                                        <td>Country</td>
                                        <td id="usercountry"></td>
                                    </tr>
                                    <tr>
                                        <td>State</td>
                                        <td id="userstate"></td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td id="usercity"></td>
                                    </tr>
                                    <tr>
                                        <td>Full Address</td>
                                        <td id="fulladdress"></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td id="useremail"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <table class="table table-responsive ">
                                <thead>
                                    <tr>
                                        <h6>PROPERTY</h6>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>PROPERTY NAME</td>
                                        <td id="propname"></td>
                                    </tr>
                                    <tr>
                                        <td>PROPER TYPE</td>
                                        <td id="proptype"></td>
                                    </tr>
                                    <tr>
                                        <td>ADDRESS</td>
                                        <td id="propaddress"></td>
                                    </tr>
                                    <tr>
                                        <td>COUNTRY</td>
                                        <td id="propcountry"></td>
                                    </tr>
                                    <tr>
                                        <td>STATE</td>
                                        <td id="propstate"></td>
                                    </tr>
                                    <tr>
                                        <td>CITY</td>
                                        <td id="propcity"></td>
                                    </tr>
                                    <tr>
                                        <td>PINCODE</td>
                                        <td id="proppincode"></td>
                                    </tr>
                                    <tr>
                                        <td>PROPERTY FOR</td>
                                        <td id="propertyfor"></td>
                                    </tr>
                                    <tr>
                                        <td>PHONE</td>
                                        <td id="propphone"></td>
                                    </tr>
                                    <tr>
                                        <td>EMAIL</td>
                                        <td id="propemail"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @if (!empty($ticket->superVisorDetails->name))
                            <div class="row">
                                <table class="table table-responsive ">
                                    <thead>
                                        <tr>
                                            <h6>Assign To</h6>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td id="svname"></td>
                                        </tr>
                                        <tr>
                                            <td>email</td>
                                            <td id="svemail"></td>
                                        </tr>
                                        <tr>
                                            <td>phone</td>
                                            <td id="svphone"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
    <style>
        .viewModelTabsDesign table tr td {
            font-size: 12px
        }

        .viewModelTabsDesign table tr td:first-child {
            width: 200px;
        }

        .viewModelTabsDesign .modal-content {
            background: #fef5f5;
        }

        .viewModelTabsDesign .container .row {
            box-sizing: border-box;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            margin-bottom: 40px;
        }

        .viewModelTabsDesign .container .row h6 {
            padding-left: 0px;
            margin-bottom: 18px;
            font-weight: bold;
            color: c90908;
            font-size: 15px;
        }

        .viewModelTabsDesign .modal-title {
            margin-left: 13px
        }

        .viewModelTabsDesign .container .row:last-child {
            margin-bottom: 0px;
        }
    </style>
   
    <!--- Modal for Update End Here-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            Cusid = document.getElementById('Cusid');
            prpid = document.getElementById('propertyID');
            if (Cusid) {
                depart = document.getElementById('depart');
                Cusid.addEventListener('focusout', function(e) {
                    e.preventDefault();
                    propcats = Cusid.value
                    rute = "{{ url('verify-ownerID/') }}/" + propcats
                    $.ajax({
                        type: "GET",
                        url: rute,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            $("#lBox").html(response.msg);
                            response.data.map(element => {
                                document.getElementById('propertyID').innerHTML +=
                                    `<option value="${element.id}">${element.propertyName}</option>`
                            })
                            invalid = document.getElementById('invalid');
                            if (invalid) {
                                document.getElementById('sbmt').disabled = true;
                            } else {
                                document.getElementById('sbmt').disabled = false;
                            }
                           
                        },
                    })
                })
            }
            if (prpid) {
                prpid.addEventListener('change', function(e) {
                    e.preventDefault();
                    propcat = prpid.value
                    rute = "{{ url('paj-unit/') }}/" + propcat
                    $.ajax({
                        type: "GET",
                        url: rute,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            $("#lBoccc").html(response);
                            unitsticket = document.getElementsByClassName('unitsticket')
                            if(unitsticket.length > 0)
                            {
                                
                                for(let ut = 0; ut < unitsticket.length; ut++) {
                                    unitsticket[ut].addEventListener('click',function(e){
                                        unitpropcats = unitsticket[ut].value
                                        unitrute = "{{ url('sub-paj-unit/') }}/" + unitpropcats
                                        $.ajax({
                                            type: "GET",
                                            url: unitrute,
                                            processData: false,
                                            contentType: false,
                                            success:function(response) {
                                            //   $('#lBsub').html(response.subUnits)  
                                              console.log(response.subUnits)
                                              lbsub = document.getElementById('lBsub')
                                              if(response.subUnits != 'no')
                                              {
                                                  response.subUnits.forEach(element => {
                                                      lbsub.innerHTML += `<div class="">
                                                            <input type="checkbox" value='${element.id}' id="unt${element.id}" name="subunits[]" class="unitsticket">
                                                            <label id="unt${element.id}" for="unt${element.id}" class="d-block">${element.unit_name}</label>
                                                      </div>` 
                                                  });
                                              }
                                            },
                                        })
                                    })
                                }
                            }
                        },
                    })
                })
            }
            depart.addEventListener('change', function(e) {
                if (depart) {
                    departid = depart.value
                    deptrute = "{{ url('fetch-services/') }}/" + departid
                    $.ajax({
                        type: "GET",
                        url: deptrute,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            $("#dBox").html(response);
                            invalid = document.getElementById('invalid');
                            if (invalid) {
                                document.getElementById('sbmt').disabled = true;
                            } else {
                                document.getElementById('sbmt').disabled = false;
                            }
                        },
                    })
                }
            })

        })
    </script>
    @vite('resources/js/app.js')
    {{-- <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script> --}}
@endsection
