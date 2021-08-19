@extends('adminLayout.layout')

@section('page-css')

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('project/public/admin/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('project/public/admin/plugins/jquery-step/jquery.steps.css') }}">
    <style>
        #formValidate .wizard>.content {
            min-height: 25em;
        }

        #example-vertical.wizard>.content {
            min-height: 24.5em;
        }

    </style>
    <!--  END CUSTOM STYLE FILE  -->
@endsection


@section('content')

    <!-- page content  -->

    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">
                <div class="col-xl-12 layout-spacing">




                    <div class="row layout-spacing">
                        <div id="flActionButtons" class="col-lg-12">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Edit Product : {{ $mainProduct->name }}</h4>
                                            <br>

                                            <form action="">
                                                <div class="statbox widget box box-shadow selector">
                                                    <div class="widget-header">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                                <h4>Default</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-content widget-content-area">
                                                        <div id="example-basic">
                                                            <h3>Product</h3>
                                                            <section>

                                                                <div class="form-group mb-4">
                                                                    <label class="control-label">Name:</label>
                                                                    <input type="text" name="name" class="form-control"
                                                                        required value="{{ $mainProduct->name }}">
                                                                </div>
                                                                <div class="form-group mb-4">
                                                                    <label class="control-label">Market :</label>
                                                                    <select name="marketId" class="form-control">
                                                                        <option selected disabled
                                                                            value="{{ $mainProduct->marketId }}">
                                                                            {{ App\Models\markets::where('id', $mainProduct->marketId)->first()->name }}
                                                                        </option>
                                                                        @foreach ($markets as $market)
                                                                            <option value="{{ $market->id }}">
                                                                                {{ $market->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group mb-4">
                                                                    <label class="control-label">Category :</label>
                                                                    <select name="categoryId" class="form-control">
                                                                        <option selected disabled
                                                                            value="{{ $mainProduct->categoryId }}">
                                                                            {{ App\Models\category::where('id', $mainProduct->categoryId)->first()->name }}
                                                                        </option>
                                                                        @foreach ($categories as $category)
                                                                            <option value="{{ $category->id }}">
                                                                                {{ $category->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group mb-4">
                                                                    <label class="control-label">Brands :</label>
                                                                    <select name="brandId" class="form-control">
                                                                        <option selected disabled
                                                                            value="{{ $mainProduct->brandId }}">
                                                                            {{ App\Models\brands::where('id', $mainProduct->brandId)->first()->name }}
                                                                        </option>
                                                                        @foreach ($brands as $brand)
                                                                            <option value="{{ $brand->id }}">
                                                                                {{ $brand->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>


                                                            </section>
                                                            <h3>Varriant</h3>
                                                            <section>
                                                                <div class="table-responsive">
                                                                    <table
                                                                        class="table table-bordered table-hover table-striped mb-4">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Admin Commission(%-Wise)</th>
                                                                                <th>Size</th>
                                                                                <th>Color</th>
                                                                                <th>Price</th>
                                                                                <th>Quantity</th>
                                                                                <th>Status</th>
                                                                                <th>Special Category</th>
                                                                                <th>Sale Price</th>
                                                                                <th>Sale</th>
                                                                                <th>Product Generalised</th>
                                                                                <th class="text-center">Status</th>
                                                                                <th></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>

                                                                            </tr>

                                                                        </tbody>
                                                                    </table>
                                                                </div>




                                                            </section>
                                                            <h3>Other Details</h3>
                                                            <section>
                                                                <p>The next and previous buttons help you to navigate
                                                                    through your content.</p>



                                                            </section>
                                                        </div>

                                                    </div>
                                                </div>
                                            </form>




                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>




@endsection


@section('page-js')



    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('admin/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-step/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-step/custom-jquery.steps.js') }}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

    <script>
        $("selector").steps({
            cssClass: 'pills wizard',
            stepsOrientation: "vertical"
        });
    </script>

@endsection
