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
                                        <h4>Create Category</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form class="form-vertical" action="{{ route('insertCategory') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label class="control-label">Name:</label>
                                        <input type="text" name="name" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Parent:</label>
                                        <select name="status" id="parentCategory" class="form-control">
                                            <option disabled selected>Is this category is a parent category</option>
                                            <option value="1">Yes</option>
                                            <option value="0" >No</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4 childOptions">
                                        <label class="control-label">Parent Category:</label>
                                        <select name="parentId" class="form-control">
                                            <option value="0" selected disabled>Select Parent Category</option>
                                            @foreach($catrgories as $catrgory)
                                                <option value="{{ $catrgory->id }}">{{ $catrgory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-4 parentOptions">
                                        <label class="control-label">Upload Thumbnail:</label>
                                        <input type="file" name="imageUrl" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Status:</label>
                                        <select name="status" class="form-control">
                                            <option value="1" selected>Active</option>
                                            <option value="0" >Inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Category Type:</label>
                                        <select name="c_type" class="form-control">
                                            <option value="1" selected>Product Category</option>
                                            <option value="2" >Sevices Category</option>
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
