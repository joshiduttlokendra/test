@include('websiteLayout.header')
@include('website.user.sidebar')
  <div class="col-lg-8">

    <div class="bg-white rounded-3 shadow-lg p-4 mb-5 mb-lg-0">
     <!-- Toolbar-->
     <div class=" d-lg-flex justify-content-between align-items-center pt-lg-3 mb-3">
      <h4 class="fs-base  mb-3">My Subscription Package :</h4>
    </div>

    <div class="notification-block">

       <div class="bg-secondary rounded-3 p-4">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="nf-disable-all" data-master-checkbox-for="#notifocation-settings">
                        <label class="form-check-label fw-medium" for="nf-disable-all">Enable/disable all notifications</label>
                      </div>
                    </div>
                    <div id="notifocation-settings">
                    @if(!empty($response))
                    @foreach($response as $row)
                      <div class="border-bottom py-3">
                        <div class="d-flex justify-content-between align-items-center">
                          <h6 class="mb-0">{{$row->subject}}</h6>
                          <button  href="#not1" class="btn btn-primary btn-sm" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="not1">View</button>
                        </div>
                        
                        
                        <div class="form-text collapse" id="not1">{{$row->email}}</div>
                      </div>
                    @endforeach
                    @endif

                    </div>
    </div>



   
    </div>




  </div>
</div>
</div>
</div>
</section>


@include('websiteLayout.footer')