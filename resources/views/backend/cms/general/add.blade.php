@extends('backend.layout.main')
@push('title')
    <title>Admin|General Settings</title>
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
                <div class="card mb-4">
                  @if (empty($generalData))
                  <form action="{{ route('saveSetting') }}" method="post" enctype="multipart/form-data">
                    @csrf
                      <h5 class="card-header">General Setting</h5>
                      <div class="card-body demo-vertical-spacing demo-only-element">
                          <div class="row">
                              <div class="col-md-6">
                                  <label class="form-label">Admin Logo</label>
                                  <div class="input-group">
                                      <input
                                      type="file"
                                      class="form-control"
                                      placeholder="Category Name"
                                      name="adminlogo"
                                      aria-label="Username"
                                      aria-describedby="basic-addon11"
                                      
                                      />
                                  </div>
                              </div>
                              <div class="col-md-6">
                              <label class="form-label">Favicons</label>
                              <div class="input-group">
                                  <input
                                  type="file"
                                  class="form-control"
                                  placeholder="Category Name"
                                  name="favicon"
                                  aria-label="Username"
                                  aria-describedby="basic-addon11"
                                  />
                              </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <label class="form-label">Meta Tags</label>
                                  <div class="input-group">
                                      <input
                                      type="text"
                                      class="form-control"
                                      placeholder="Meta Tags"
                                      name="metatags"
                                      aria-label="Username"
                                      aria-describedby="basic-addon11"
                                      data-role="tagsinput"
                                      />
                                  </div>
                              </div>
                              <div class="col-md-6">
                              <label class="form-label">Meta Description</label>
                              <div class="input-group">
                                  <textarea
                                  
                                  class="form-control"
                                  placeholder="Meta description Here"
                                  name="metadescription"
                                  aria-label="Username"
                                  aria-describedby="basic-addon11"
                                  ></textarea>
                              </div>
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
                  </form>  
                  @else
                  <form action="{{ route('updateSetting') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <h5 class="card-header">Update General Setting</h5>
                      <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <img src="{{ url('/').$generalData->adminlogo_path }}" style="width: 100px;height:100px;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    @if (!empty($generalData->favicon_path)) 
                                    <img src="{{ $generalData->favicon_path }}"  style="width: 100px;height:100px;">
                                    @endif
                                </div>
                            </div>
                        </div>
                          <div class="row">
                              <div class="col-md-6">
                                 <input type="hidden" name="id" value="{{  $generalData->id }}">
                                  <label class="form-label">Logo</label>
                                  <div class="input-group">
                                      <input
                                      type="file"
                                      class="form-control"
                                      placeholder="Category Name"
                                      name="adminlogo"
                                      aria-label="Username" 
                                      aria-describedby="basic-addon11"
                                      
                                      />
                                  </div>
                              </div>
                              <div class="col-md-6">
                              <label class="form-label">Favicons</label>
                              <div class="input-group">
                                  <input
                                  type="file"
                                  class="form-control"
                                  placeholder="Category Name"
                                  name="favicon"
                                  aria-label="Username"
                                  aria-describedby="basic-addon11"
                                  />
                              </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <label class="form-label">Meta Tags</label>
                                  <div class="input-group">
                                      <input
                                      type="text"
                                      class="form-control"
                                      placeholder="Meta Tags"
                                      name="metatags"
                                      aria-label="Username"
                                      value="{{ $generalData->meta_tags }}"
                                      aria-describedby="basic-addon11"
                                      data-role="tagsinput"
                                      />
                                  </div>
                              </div>
                              <div class="col-md-6">
                              <label class="form-label">Meta Description</label>
                              <div class="input-group">
                                  <textarea
                                  
                                  class="form-control"
                                  placeholder="Meta description Here"
                                  name="metadescription"
                                  aria-label="Username"
                                  aria-describedby="basic-addon11"
                                  >{{ url('/').$generalData->meta_description }}</textarea>
                              </div>
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
                  </form>
                  @endif
                  
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