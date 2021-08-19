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
                                <form class="form-vertical" action="{{ route('updateFaq',$data->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label class="control-label">Title:</label>
                                        <input type="text" name="title" value="{{ $data->title }}" class="form-control" >
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="control-label">Status:</label>
                                        <select name="status" class="form-control">
                                            <option @if($data->status == 1) selected @endif value="1" selected>Active</option>
                                            <option @if($data->status == 0) selected @endif value="0" >Inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Description:</label>
                                        <input type="text" name="description" value="{{ $data->description }}" class="form-control" >
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
