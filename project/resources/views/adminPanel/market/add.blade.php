@extends('adminLayout.layout')
@section('content')





    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container" style="display:initial">
            <div class="container" style="display:initial" >



                <!--<div class="row">-->
                <!--    <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">-->

                <!--    </div>-->


                <!--</div>-->







                <div class="row layout-spacing">
                    <div id="flActionButtons" class="col-lg-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Create Ministore</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form class="form-vertical" action="{{ route('insertMarket') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label class="control-label">Title:</label>
                                        <input type="text" name="name" class="form-control" >
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="control-label">Vendor:</label>
                                        <select name="vendorId" class="form-control">
                                            <option value="0" selected disabled>Select Vendor</option>
                                            @foreach($vendors as $vendor)
                                                <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
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
                                    <!-- <div class="form-group mb-4">
                                        <label class="control-label">Profile:</label>
                                        <input type="file" name="imageUrl" class="form-control"  >
                                    </div> -->
                                    
                                    <div class="row">
                                        
                                         <div class="col-sm-4 custom-file-container" data-upload-id="myFirstImage">
    <label>Upload Profile 
         <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
    <label class="custom-file-container__custom-file" >
        <input type="file" class="custom-file-container__custom-file__custom-file-input" name="imageUrl" accept="image/*">
  
        <span class="custom-file-container__custom-file__custom-file-control"></span>
    </label>

    <div class="custom-file-container__image-preview"></div>
</div>
<div class="col-sm-4 custom-file-container" data-upload-id="mySecondImage">
<label>Upload Banner 
         <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
    <label class="custom-file-container__custom-file" >
        <input type="file" class="custom-file-container__custom-file__custom-file-input" name="banner" accept="image/*">
       
        <span class="custom-file-container__custom-file__custom-file-control"></span>
    </label>

    <div class="custom-file-container__image-preview"></div>
</div>
       
<div class="col-sm-4 custom-file-container" data-upload-id="myThirdImage">
<label>Upload Icon Image
         <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
    <label class="custom-file-container__custom-file" >
        <input type="file" class="custom-file-container__custom-file__custom-file-input" name="icon" accept="image/*">
       
        <span class="custom-file-container__custom-file__custom-file-control"></span>
    </label>

    <div class="custom-file-container__image-preview"></div>
</div>

                                        
                                    </div>
                                    
                                   
                                    <!-- <div class="form-group mb-4">
                                        <label class="control-label">Banner:</label>
                                        <input type="file" name="banner" class="form-control"  >
                                    </div> -->

                                    <div class="form-group mb-4">
                                        <label class="control-label">Description:</label>
                                        <textarea class="form-control" name="description" rows="4" id="miniContent" cols="50"></textarea>
                            
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
          var firstUpload = new FileUploadWithPreview('myFirstImage')
     var secondUpload = new FileUploadWithPreview('mySecondImage')
     var thirdUpload = new FileUploadWithPreview('myThirdImage')
        CKEDITOR.replace('miniContent');
    </script>

 @endsection