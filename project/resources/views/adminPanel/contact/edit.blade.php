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
                                        <h4>Update Faq Details</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form class="form-vertical" action="{{ route('updateContact',$data->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label class="control-label">Name:</label>
                                        <input type="text" name="name" value="{{ $data->name }}" class="form-control" >
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="control-label">Email:</label>
                                        <input type="text" name="email" value="{{ $data->email }}" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Phone:</label>
                                        <input type="text" name="phone_no" value="{{ $data->phone_no }}" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Subject:</label>
                                        <input type="text" name="subject" value="{{ $data->subject }}" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Message:</label>
                                        <input type="text" name="message" value="{{ $data->message }}" class="form-control" >
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
