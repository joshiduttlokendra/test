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
                                        <h4>Create Product</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area" style="box-shadow:none;">
                                <form class="form-vertical" action="{{ route('insertProduct') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label class="control-label">Type:</label>
                                        <select name="type" class="form-control" id="productTYpe">
                                            <option value="1" selected>Parent</option>
                                            <option value="0">Varient</option>
                                        </select>
                                    </div>
                                    <div id="parentProductmat">

                                        <div class="form-group mb-4">
                                            <label class="control-label">Name:</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="control-label">Market :</label>
                                            <select name="marketId" class="form-control">
                                                <option selected disabled>Choose Market</option>
                                                @foreach ($markets as $market)
                                                    <option value="{{ $market->id }}">{{ $market->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="control-label">Category :</label>
                                            <select name="categoryId" class="form-control">
                                                <option selected disabled>Choose Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="control-label">Brands :</label>
                                            <select name="brandId" class="form-control">
                                                <option selected disabled>Choose Brand</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group mb-4" id="paratSelect">
                                        <label class="control-label">Parent Product:</label>
                                        <select name="parentId" class="form-control paratSelect_sss">
                                            <option selected disabled>Choose Parent Product</option>
                                            @foreach ($parent as $prnt)
                                                <option value="{{ $prnt->id }}">{{ $prnt->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="control-label">Images:</label>
                                        <input type="file" name="imageUrl[]" class="form-control" multiple required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Admin Commission(%-Wise):</label>
                                        <input type="number" name="adminCommission" class="form-control" step=".01">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Size:</label>
                                        <input type="text" name="size" class="form-control">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Color:</label>
                                        <input type="text" name="color" class="form-control">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Price:</label>
                                        <input type="number" name="price" class="form-control" step=".01" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Quantity:</label>
                                        <input type="number" name="quantity" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Status:</label>
                                        <select name="status" class="form-control">
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Seasonal:</label>
                                        <select name="seasonal" class="form-control" required>
                                            <option disabled selected>Please select </option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Special Category:</label>
                                        <select name="specialCategory" class="form-control" required>
                                            <option disabled selected>Please select </option>
                                            <option value="1">Caribbean Products</option>
                                            <option value="2">Be Thrifty</option>
                                            <option value="0">Others</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Sale:</label>
                                        <select name="sale" class="form-control" id="saleSelected">
                                            <option value="1" >Yes</option>
                                            <option value="0" selected>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Product Generalised:</label>
                                        <select name="new" class="form-control" id="saleSelected">
                                            <option value="1" selected>New Product</option>
                                            <option value="0" selected>Used Product</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4" id="salePrice">
                                        <label class="control-label">Sale Price:</label>
                                        <input type="number" name="salePrice" class="form-control">
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


    @section('page-js')
        <script>
            var ss = $(".paratSelect_sss").select2({
                tags: true,
            });
            $(document).ready(function() {
                $('#paratSelect').hide();
                $('#salePrice').hide();

                $('#productTYpe').change(function() {
                    var val = $(this).val();
                    if (val == '0') {
                        $('#parentProductmat').hide();
                        $("#parentProductmat :input").prop('required',null);
                        $('#paratSelect').show();

                    } else {
                        $('#parentProductmat').show();
                        $("#parentProductmat :input").prop('required', true);

                        $('#paratSelect').hide();

                    }

                });
                $('#saleSelected').change(function() {
                    var val_s = $(this).val();
                    if (val_s == '0') {
                        $('#salePrice').hide();
                    } else {
                        $('#salePrice').show();
                    }

                });
            });
        </script>
    @endsection
