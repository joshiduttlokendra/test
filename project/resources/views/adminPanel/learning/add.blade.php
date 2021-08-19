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
                                        <h4>Add Data</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form class="form-vertical" action="{{ route('insertLearning') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label class="control-label">Title:</label>
                                        <input type="text" name="title" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Thumbnail:</label>
                                        <input type="file" name="imageUrl" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Video:</label>
                                        <input type="file" name="videoUrl" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Level:</label>
                                        <select name="lTypeId" class="form-control">
                                            <option value="0" selected disabled>Select Type</option>
                            @foreach($type as $tpe)
                                <option value="{{ $tpe->id }}">{{ $tpe->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Software:</label>
                                        <select name="softwareId" class="form-control">
                                            <option value="0" selected disabled>Select Software</option>
                                            @foreach($softwares as $software)
                                                <option value="{{ $software->id }}">{{ $software->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Industry:</label>
                                        <select name="industryId" class="form-control">
                                            <option value="0" selected disabled>Select Industry</option>
                                            @foreach($industries as $industry)
                                                <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="control-label">Status:</label>
                                        <select name="status" class="form-control">
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
