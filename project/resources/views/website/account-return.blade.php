@include('websiteLayout.header')
@include('website.user.sidebar')
        <div class="col-lg-8">

          <div class="bg-white rounded-3 shadow-lg p-4 mb-5 mb-lg-0">
           <!-- Toolbar-->
         <div class=" d-lg-flex justify-content-between align-items-center pt-lg-3 mb-3">
            <h4 class="fs-base  mb-0">Order Return form</h4>
          </div>
          <!-- Orders list-->
        <form action="{{route('order-return')}}" method="post" enctype="multipart/form-data" >
            @csrf()
                            <!-- Text input -->
                    <div class="mb-3">
                    <label for="text-input" class="form-label">Product Name</label>
                    <input class="form-control" type="text" id="text-input" name="name" placeholder="eg: shoes">
                    {!! $errors->first('name', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <!-- Search input -->
                    <div class="mb-3">
                    <label for="search-input" class="form-label">Order ID</label>
                    <input class="form-control" type="search" id="search-input" name="orderId" value="">
                    {!! $errors->first('orderId', "<span class='text-danger'>:message</span>") !!}
                    </div>

                    <!-- Search input -->
                    <div class="mb-3">
                    <label for="search-input" class="form-label">Order date</label>
                    <input class="form-control" type="date" id="" name="date" >
                    {!! $errors->first('date', "<span class='text-danger'>:message</span>") !!}
                    </div>





                    <div class="mb-3">
                    <label for="textarea-input" class="form-label">Tell the product defects</label>
                    <textarea class="form-control" id="textarea-input" name="reason" rows="5">Reason</textarea>
                    {!! $errors->first('reason', "<span class='text-danger'>:message</span>") !!}
                    </div>
                    <div class="'mb-3">
                    <label for="">Product image</label>
                    <div class="file-drop-area ">

                    <div class="file-drop-icon ci-cloud-upload"></div>
                    <span class="file-drop-message">Drag and drop here to upload</span>
                    <input type="file" class="file-drop-input" name="image">
                    <button type="button" class="file-drop-btn btn btn-primary btn-sm">Or select file</button>
                    </div>
                    </div>

                    <div class="'mb-3 mt-3">
                    <button class="btn btn-outline-primary">Submit the details</button>
                    </div>




                    </form>


        
        
      
          </div>
        </div>
      </div>
    </div>
</section>
@include('websiteLayout.footer')

