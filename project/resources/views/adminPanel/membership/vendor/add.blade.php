@extends('adminLayout.layout')
@section('content')





    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="container">



                <div class="row">
                    <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">

                    </div>


                </div>







                <div class="row layout-spacing">
                    <div id="flActionButtons" class="col-lg-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Add Membership</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form class="form-vertical" action="{{ route('insertMembershipVendor') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label class="control-label">Title:</label>
                                        <input type="text" name="name" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Products:</label>
                                        <select name="products" class="form-control" id="productsLimited">
                                            <option disabled selected>Choose This</option>
                                            <option value="1">Limited</option>
                                            <option value="0">Unlimited</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">No Of Products:</label>
                                        <input type="number" name="productLimit" id="productLimit" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Products Allowed Till:</label>
                                        <input type="date" name="productAllowedDate" id="productAllowedDate" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Free Advertisements:</label>
                                        <select name="freeAdvertisements" class="form-control" id="freeAdvertisements">
                                            <option selected disabled>Choose Free Advertisement</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Shipping Management:</label>
                                        <select name="shippingManagements" class="form-control" id="shippingManagements">
                                            <option disabled selected>Choose Shipping Arrangements</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Status:</label>
                                        <select name="status" class="form-control">
                                            <option selected disabled>Select <Status></Status></option>
                                            <option value="1" selected>Active</option>
                                            <option value="0" >Inactive</option>
                                        </select>
                                    </div>

                                    <input type="submit" value="Submit" class="btn btn-primary ml-3 mt-3">
                                </form>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!--  END CONTENT AREA  -->








@endsection
