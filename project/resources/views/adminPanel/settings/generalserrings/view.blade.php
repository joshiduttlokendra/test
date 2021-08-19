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
                                        <h4>Payment Methods</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form class="form-vertical" action="{{ route('insertProduct') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label class="control-label">Cash On Delivery:</label>
                                        <input type="checkbox" name="name" class="" >
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Paypal:</label>
                                        <input type="checkbox" name="name" class="" >
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="control-label">Type:</label>
                                        <select name="status" class="form-control">
                                            <option value="1" selected>Parent</option>
                                            <option value="0" >Varient</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="control-label">Images:</label>
                                        <input type="file" name="imageUrl[]" class="form-control" multiple>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Admin Commission(%-Wise):</label>
                                        <input type="number" name="adminCommission" class="form-control" step=".01">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Size:</label>
                                        <input type="text" name="size" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Color:</label>
                                        <input type="text" name="color" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Price:</label>
                                        <input type="number" name="price" class="form-control" step=".01">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Status:</label>
                                        <select name="status" class="form-control">
                                            <option value="1" selected>Active</option>
                                            <option value="0" >Inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Seasonal:</label>
                                        <select name="seasonal" class="form-control" required>
                                            <option disabled selected>Please select </option>
                                            <option value="1" >Yes</option>
                                            <option value="0" >No</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Special Category:</label>
                                        <select name="specialCategory" class="form-control" required>
                                            <option disabled selected>Please select </option>
                                            <option value="1" >Caribbean Products</option>
                                            <option value="2" >Be Thrifty</option>
                                            <option value="0" >Others</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Sale:</label>
                                        <select name="sale" class="form-control">
                                            <option value="1" selected>Yes</option>
                                            <option value="0" >No</option>
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
