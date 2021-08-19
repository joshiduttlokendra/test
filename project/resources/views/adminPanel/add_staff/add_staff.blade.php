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

                                        <h4>Add Staff</h4>

                                    </div>

                                </div>

                            </div>

                            <div class="widget-content widget-content-area">

                                <form class="form-vertical" action="{{ route('add_staff') }}" method="POST" enctype="multipart/form-data">

                                    @csrf

                                    <div class="form-group mb-4">

                                        <label class="control-label">Name :</label>

                                        <input type="text" name="name" class="form-control" required>

                                    </div>



                                    <div class="form-group mb-4">

                                        <label class="control-label">Designation/Role:</label>

                                        <input type="text" class="form-control" name="role" required>

                                    </div>

                                    <div class="form-group mb-4">

                                        <label class="control-label">image:</label>

                                        <input type="file" name="image" class="form-control" accept="image/*" required>

                                            

                                        
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

