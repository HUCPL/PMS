@extends('backend.layout.main')
@push('title')
    <title>Owner|Expenses</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous"
        referrerpolicy="no-referrer" />


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
                        {{-- <div class="d-flex p-4 justify-content-end">
                        <a href="#" class="btn btn-primary"   data-bs-toggle="modal"
                        data-bs-target="#largeModal">Add New Expense</a>
                </div> --}}
                         <form action="{{ route('filterExpenses') }}" method="get">
                     
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="row p-3 wid67" data-select2-id="5">
                              <style>
                                .wid67{ width: 67%}
                              </style>
                                <div class="col-md-3" data-select2-id="4"><select class="form-select" name="filterprop" aria-label="Default select example"
                                        >
                                        @foreach ($expensesProperties as $filterprop)
                                            
                                        <option value="{{ $filterprop->propertyID }}" >{{ $filterprop->propertyName->propertyName }}</option>
                                        @endforeach
                                    </select>
                                  </div>
                                  <div class="col-md-3">
                                    <input class="form-control"
                                        type="date" name="expFromDate" />
                                </div>
                                <div class="col-md-3">
                                  <input class="form-control"
                                      type="date" name="exptoDate" />
                              </div>
                                <div class="col-md-3"><span _ngcontent-eqa-c159=""
                                        class="d-md-block">
                                        <button type="submit"
                                            data-style="zoom-in" class="btn btn-primary ladda-button"
                                            ><span class="ladda-label"><span
                                                   >Apply</span></span><span
                                                class="ladda-spinner"></span></button>
                                              </form>
                                                <a href="{{ route('ownerExpenses') }}"
                                            data-style="zoom-in" class="btn btn-primary ladda-button"
                                            ><span class="ladda-label"><span
                                                   >View All</span></span><span
                                                class="ladda-spinner"></span></a>
                                              </span></div>
                                             
                                      
                            </div>

                            <a href="#" class="btn btn-primary me-3" data-bs-toggle="modal"
                                data-bs-target="#largeModal">Add New Expense</a>
                        </div>
                        <div class="card-body demo-vertical-spacing demo-only-element">
                            @if ($expensesDetails->isNotEmpty())
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">SrNo.</th>
                                            <th>Property Name</th>
                                            <th scope="col" style="white-space:nowrap;">Expenses Type</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Expenses Description</th>
                                            <th scope="col">Files</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($expensesDetails as $expenses)
                                            <tr>
                                                <th scope="row" style="font-size:1rem">{{ $i++ }}</th>
                                                <th>
                                                    {{ $expenses->propertyName->propertyName }}
                                                </th>
                                                <td style="font-size:1rem">
                                                    {{ $expenses->expenses_type }}
                                                </td>
                                                <td style="font-size:1rem">
                                                    {{ $expenses->date }}
                                                </td>
                                                <td style="font-size:1rem">
                                                    {{ $expenses->amount }}
                                                </td>
                                                <td style="font-size:1rem">
                                                    {{ $expenses->Expense_Description }}
                                                </td>
                                                <td style="font-size:1rem">
                                                    <a class="btn btn-primary" target="_blank"
                                                        href="{{ route('viewPdf', ['id' => $expenses->id]) }}"><i
                                                            class="fa-solid fa-file-pdf"></i></a>
                                                </td>
                                                <td style="white-space: nowrap;"><a class="btn btn-danger"
                                                        style="color:white;"
                                                        href="{{ route('deleteExpenses', ['id' => $expenses->id]) }}"><i
                                                            class="fa-solid fa-trash"></i></a>&nbsp;<a
                                                        class="btn btn-primary editexpenses" style="color:white;"
                                                        data-propID="{{ $expenses->propertyID }}"
                                                        data-exptype="{{ $expenses->expenses_type }}"
                                                        data-date="{{ $expenses->date }}"
                                                        data-amount="{{ $expenses->amount }}"
                                                        data-expDescription="{{ $expenses->Expense_Description }}"
                                                        data-file_path = "{{ $expenses->file_path }}"
                                                        data-id={{ $expenses->id }} data-bs-toggle="modal"
                                                        data-bs-target="#uplargeModal"><i
                                                            class="fa-solid fa-pen-to-square"></i></a></td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-danger">No Expenses Yet</div>
                            @endif
                        </div>
                        {{ $expensesDetails->links() }}
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
                    <h5 class="modal-title" id="exampleModalLabel3">Expenses</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formAccountSettings" action="{{ route('addExpenses') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card mb-4">
                            <h5 class="card-header">Add Expense Details</h5>
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
                                        <label for="browser" class="form-label">Expenses Type</label>
                                        <input list="browsers" type="text" class="form-control" name="expensesType"
                                            id="browser">
                                        <datalist id="browsers">
                                            @foreach ($expensesType as $expsType)
                                                <option value="{{ $expsType->expensesType }}">
                                            @endforeach
                                        </datalist>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="" class="form-label">Date</label>
                                        <input type="date" class="form-control" name="expDate">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="" class="form-label">Amount</label>
                                        <input type="number" class="form-control" name="amount">
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="" class="form-label">Expenses Description</label>
                                        <textarea class="form-control" name="expDescription"></textarea>
                                    </div>
                                    <input type="hidden" name="ownerID" value="{{ Auth::Id() }}">
                                    <div class="mb-3 col-md-12">
                                        <label for="" class="form-label">File Upload</label>
                                        <input type="file" name="fileAttachment" class="form-control"
                                            accept="application/pdf">
                                    </div>
                                </div>
                                <!-- /Account -->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">Add Expense</button>
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
                                        <label for="browser" class="form-label">Expenses Type</label>
                                        <input list="browsers" type="text" class="form-control" name="expensesType"
                                            id="upbrowser">
                                        <datalist id="browsers">
                                            @foreach ($expensesType as $expsType)
                                                <option value="{{ $expsType->expensesType }}">
                                            @endforeach
                                        </datalist>
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
                                            accept="application/pdf"><br>
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
        {{-- <script>
         print_state("state")
      </script> --}}
        {{-- <script language="javascript">print_country("country");print_countr("countr");</script> --}}
    @endsection
