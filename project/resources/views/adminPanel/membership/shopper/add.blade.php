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
                                <form class="form-vertical" action="{{ route('insertMembershipShopper') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label class="control-label">Title:</label>
                                        <input type="text" name="name" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Discount Type:</label>
                                        <select name="discountType" class="form-control" id="discountType">
                                            <option disabled selected>Choose Discount Type</option>
                                            <option value="1">Fixed</option>
                                            <option value="0">Percentage</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Discount:</label>
                                        <input type="number" name="discountValue" id="discountValue" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Free Shipping:</label>
                                        <select name="freeShipping" class="form-control" id="freeShipping">
                                            <option selected disabled>Choose Free Advertisement</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Shipping Time:</label>
                                        <select name="shippingTime" class="form-control" id="shippingTime">
                                            <option disabled selected>Choose Shipping Time</option>
                                            <option value="1">Normal</option>
                                            <option value="0">Shorter</option>
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
