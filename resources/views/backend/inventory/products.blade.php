@extends('backend.layout.main')
@push('title')
    <title>Admin|Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- include summernote css/js -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.css" rel="stylesheet">
@endpush
@section('content-wrapper')
<div class="content-wrapper">
    <!-- Content -->
    
 <!-- Include jQuery (required by Summernote) -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <!-- Include Summernote JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.js"></script>

    <div class="container-xxl flex-grow-1 container-p-y">
      <form action="{{ route('addVendorProducts') }}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="row">
        <!-- Basic -->
         <div class="col-md-6">
            <div class="card mb-4">
              <h5 class="card-header">Product Name</h5>
              <div class="card-body demo-vertical-spacing demo-only-element">
                <div class="input-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Name of product"
                    name="productname"
                    aria-label="Username"
                    aria-describedby="basic-addon11"
                  />
                </div>
                <div class="form-password-toggle">
                  <label class="form-label" for="basic-default-password12">Select Categories</label>
                  <div class="input-group">
                    <select  class="form-control" name="categoryID">
                        <option value="0">Select Category</option>
                        @foreach ($categories as $itemcat)
                            <option value="{{ $itemcat->CategoryID }}">{{ $itemcat->categoryName }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-password-toggle">
                  <label class="form-label" for="basic-default-password12">Select Brand</label>
                  <div class="input-group">
                    <select  class="form-control" name="BrandID">
                        <option value="0">Select Brand</option>
                        @foreach ($brands as $itembrand)
                            <option value="{{ $itembrand->brandID }}">{{ $itembrand->brandName }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-password-toggle">
                    <label class="form-label"  for="basic-default-password12">Product Tags</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Products Tags"
                    name="tags"
                    data-role="tagsinput"
                    aria-label="Recipient's username"
                    aria-describedby="basic-addon13"
                  />
                </div>
                <div class="form-password-toggle">
                  <label class="form-label" for="basic-default-password12">Products SKU</label>
                  <div class="input-group">
                    <input type="number" class="form-control" name="skuno" placeholder="SKU001">
                  </div>
                </div>
                <div class="input-group">
                  {{-- <span class="input-group-text"><i class="fa-solid fa-indian-rupee-sign"></i></span> --}}
                  <input
                    type="number"
                    class="form-control"
                    placeholder="Product Quantity"
                    name="productQuantity"
                    aria-label="Amount (to the nearest dollar)"
                  />
                  {{-- <span class="input-group-text">.00</span> --}}
                </div>
                <div class="input-group">
                  <span class="input-group-text"><i class="fa-solid fa-indian-rupee-sign"></i></span>
                  <input
                    type="number"
                    class="form-control"
                    placeholder="Product Amount"
                    name="saleamount"
                    aria-label="Amount (to the nearest dollar)"
                  />
                  <span class="input-group-text">.00</span>
                </div>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-indian-rupee-sign"></i></span>
                    <input
                      type="number"
                      class="form-control"
                      name="amount"
                      placeholder="Sale Amount"
                      aria-label="Amount (to the nearest dollar)"
                    />
                    <span class="input-group-text">.00</span>
                </div>
                <div class="input-group">
                  <textarea class="form-control" aria-label="With textarea" name="description"  placeholder="Product Description "></textarea>
                </div>
                <div class="input-group">
                    <input type="submit" class="btn btn-primary" value="Add Product">
                </div>
              </div>
            </div>
          </div>

          <!-- Merged -->
          <div class="col-md-6">
            <div class="card mb-4">
              <h5 class="card-header">Products Main Image</h5>
              <div class="card-body demo-vertical-spacing demo-only-element">
                <div class="input-group input-group-merge">
                  {{-- <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span> --}}
                  <input
                    type="file"
                    class="form-control"
                    placeholder=""
                    aria-label=""
                    id="mainImages"
                    name="mainImage"
                    aria-describedby="basic-addon-search31"
                    {{-- id="mImages" --}}
                    style="display: none;"
                  />
                  <label for="mainImages" id="imageLabel">
                    <img src="{{ asset('assets/img/images/product.png') }}" id="primaryImage" style="width:100%; height:100%; border-radius:8px;">
                  </label>
                </div>
                <div class="form-password-toggle">
                  <label class="form-label" for="basic-default-password32">Products Slider Images</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="file"
                      class="form-control"
                      id="productImagesinput"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="basic-default-password"
                      name="productsImages[]"
                      accept="image/*"
                      multiple
                    />
                    {{-- <span class="input-group-text cursor-pointer" id="basic-default-password"
                      ><i class="bx bx-hide"></i
                    ></span> --}}
                  </div>
                  
                </div>
                
                <div class="form-password-toggle" id="productImages">
                  <img src="{{ asset('assets/img/images/product.png') }}" style="width:20%; height:20%; border-radius:8px;">
                </div>
              </div>
              
            </div>
            
          </div>
       
          <!-- Sizing -->
          {{-- <div class="col-md-6">
            <div class="card mb-4">
              <h5 class="card-header">Shipping Details</h5>
              <div class="card-body demo-vertical-spacing demo-only-element">
                <label class="form-label">Shipping Charges</label>
                <div class="input-group input-group-lg">
                  <span class="input-group-text">@</span>
                  <input type="text" class="form-control" placeholder="Username" />
                  <select name="shipping" id="" class="form-control">
                    <option value="">Free Shipping</option>
                      <option value="">Standard</option>
                      <option value="">Flat Charges</option>
                  </select>
                </div>

                <div class="input-group">
                  <span class="input-group-text">@</span>
                  <input type="text" class="form-control" placeholder="Username" />
                </div>

                <div class="input-group input-group-sm">
                  <span class="input-group-text">@</span>
                  <input type="text" class="form-control" placeholder="Username" />
                </div>
              </div>
            </div>
          </div> --}}
          <!-- Checkbox and radio addons -->
          {{-- <div class="col-md-6">
            <div class="card mb-4">
              <h5 class="card-header">Product Colors</h5>
              <div class="card-body demo-vertical-spacing demo-only-element">
                <div class="input-group">
                  <div class="input-group-text">
                    <input
                      class="form-check-input mt-0"
                      type="checkbox"
                      value=""
                      aria-label="Checkbox for following text input"
                    />
                  </div>
                  <input type="text" class="form-control" aria-label="Text input with checkbox" />
                </div>

                <div class="input-group">
                  <div class="input-group-text">
                    <input
                      class="form-check-input mt-0"
                      type="radio"
                      value=""
                      aria-label="Radio button for following text input"
                    />
                  </div>
                  <input type="text" class="form-control" aria-label="Text input with radio button" />
                </div>
              </div>
            </div>
          </div> --}}
      </div>
    </form>
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
          <a href="#" target="_blank" class="footer-link fw-bolder">ecomWebApp</a>
        </div>
        <div>
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
        </div>
      </div>
    </footer>
    <!-- / Footer -->
   
    <div class="content-backdrop fade"></div>
  </div>
@endsection