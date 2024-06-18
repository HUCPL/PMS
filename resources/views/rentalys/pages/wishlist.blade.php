@extends('rentalys.layout.main')
@push('title')
    <title>Rentalys|WishList</title>
@endpush
@section('main-content')
<style>
    .advanced-button {
        background-color: var(--rt-primary-color);
        color: #fff;
        padding: 10px 30px;
        width: 100%;
        font-size: 15px;
        font-weight: 500;
        border: none;
        border-radius: 4px;
        text-align: center;
        line-height: 30px;
        position: relative;
        z-index: 1;
        text-transform: uppercase;
    }
</style>

<div class="breadcrumb-wrap breadcrumb-wrap-2">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-3.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
            </ol>
        </nav>
    </div>
</div>
<div class="cart-wrap mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-heading mb-10 mt-2"><h4>My wishlist</h4></div>
                <div class="table-wishlist">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <thead>
                        <tr>
                            <th width="45%">Property Name</th>
                            <th width="15%">Unit Price</th>
                            <th width="15%">Stock Status</th>
                            <th width="15%"> Book Now</th>
                            <th width="10%"> Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                                                        <h3>No Property Added</h3>
                                                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
