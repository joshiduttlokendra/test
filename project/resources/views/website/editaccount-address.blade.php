@include('websiteLayout.header')
<section class="section-padding my-account bg-secondary">
    <div class="container pb-5 mb-2 mb-md-4">
      <div class="row">
       <!-- Sidebar-->
       <aside class="col-lg-4 pt-4 pt-lg-0 pe-xl-5">
        <div class="bg-white rounded-3 shadow-lg pt-1 mb-5 mb-lg-0">
          <div class="d-md-flex justify-content-between align-items-center text-center text-md-start p-4">
            <div class="d-md-flex align-items-center">
              <div class="img-thumbnail rounded-circle position-relative flex-shrink-0 mx-auto mb-2 mx-md-0 mb-md-0" style="width: 6.375rem;"><img class="rounded-circle" src="{{ asset(Auth::user()->imageUrl) }}" alt="Susan Gardner"></div>
              <div class="ps-md-3">
                <h3 class="fs-base mb-0">{{ Auth::user()->name }}</h3><span class="text-primary fs-sm">{{ Auth::user()->email }}</span>
                <a href="#" class="text-primary">{{ Auth::user()->membershipId }}</a>
              </div>
                               

              </div><a class="btn btn-primary d-lg-none mb-2 mt-3 mt-md-0" href="#account-menu" data-bs-toggle="collapse" aria-expanded="false"><i class="ci-menu me-2"></i>Account menu</a>
            </div>

            <div class="p-3">
                             <a class="btn btn-primary btn-sm w-100" href="#"><i class="ci-sign-out me-2"></i>Sign out</a>

            </div>
            <div class="d-lg-block collapse" id="account-menu">


                  <div class="bg-secondary px-4 py-3">
                <b class=" mb-0 text-muted">User Dashboard</b>
              </div>
                   <ul class="list-unstyled mb-0">
                   <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 " href="{{ route('userDashboard') }}"><i class="ci-user opacity-60 me-2"></i>Profile info</a></li>
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{ route('address') }}"><i class="ci-bag opacity-60 me-2"></i>Address<span class="fs-sm text-muted ms-auto">1</span></a></li>
                


              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 active" href="{{ route('orders') }}"><i class="ci-bag opacity-60 me-2"></i>Orders<span class="fs-sm text-muted ms-auto">{{ count(App\Models\order::where('userId',Auth::id())->get()) }}</span></a></li>
            
           <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 " href="{{route('account-review')}}"><i class="ci-user opacity-60 me-2"></i>Review</a></li>

             <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 " href="{{route('account-payment')}}"><i class="ci-user opacity-60 me-2"></i>Payment Details</a></li>



           <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{route('account-wishlist')}}"><i class="ci-heart opacity-60 me-2"></i>Wishlist<span class="fs-sm text-muted ms-auto">3</span></a></li>

             <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 " href="{{route('notification')}}"><i class="ci-user opacity-60 me-2"></i>Notification</a></li>

        </ul>

            </div>
          </div>
        </aside>
        <!-- Content  -->
        <div class="col-lg-8">

          <div class="bg-white rounded-3 shadow-lg p-4 mb-5 mb-lg-0">


          <!-- Toolbar-->
          <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 mb-3">
            <h4 class="fs-base  mb-0">Update you profile details below:</h4>
            
            <a class="btn btn-primary btn-sm "  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ci-sign-out me-2"></i>Sign out
                  
                                  <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                                    @csrf
                                  </form>
                             </a>
          </div>
          <!-- Profile form-->
       
  
            </div>



<!-- Trigger/Open The Modal -->


<!-- The Modal -->

<form method="post" action="{{route('update-address', $response->id)}}">
@csrf()
            <div class="row gx-4 gy-3">
              <div class="col-sm-6">
                <label class="form-label" for="account-fn">Street Address 1</label>
                <input class="form-control" type="text" id="account-fn" name="street1" value="{{$response->street1 }}">
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="account-email">Street Address 2</label>
                <input class="form-control" type="text" id="account-email" name="street2" value="{{ $response->street2 }}" >
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="account-fn">Country</label>
                <input class="form-control" type="text" id="account-fn" name="country" value="{{ $response->cname}}">
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="account-email">City</label>
                <input class="form-control" type="text" id="account-email" name="city" value="{{ $response->ccname }}" >
              </div>
            
              <div class="col-sm-6">
                <label class="form-label" for="account-email">ZipCode</label>
                <input class="form-control" type="text" id="account-email" name="zipCode" value="{{ $response->zipCode }}" >
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="account-fn">Postal Code</label>
                <input class="form-control" type="text" id="account-fn" name="postalCode" value="{{ $response->postalCode}}">
              </div>
              <div class="col-sm-6">
            <label class="form-label" for="address-city">Shipping Address</label>
                                <!-- Inline radio buttons -->
                                
                                 <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="1" name="shippingAddress" id="ex-shipping-1">
                                        <label class="form-check-label" for="ex-shipping-1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="no" name="shippingAddress" id="ex-shipping-2" checked>
                                        <label class="form-check-label" for="ex-shipping-2">No</label>
                                    </div>
              </div> 
              
              <div class="col-sm-6">   
              <label class="form-label" for="address-city">Billing Address</label>
                                <!-- Inline radio buttons -->
                                
              <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="1" name="billingAddress" id="ex-billing-1">
                                        <label class="form-check-label" for="ex-billing-1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="no" name="billingAddress" id="ex-billing-2" checked>
                                        <label class="form-check-label" for="ex-shipping-2">No</label>
                                    </div>
              </div>    
          </div>
 </div>
       
     
              <div class="col-12">
                <hr class="mt-2 mb-3">
                <div class="d-flex flex-wrap justify-content-end align-items-center">

                  <button class="btn btn-primary mt-3 mt-sm-0" type="submit">Update Address</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        </div>
      </div>
    </div>



  <div id="myModal1" class="modal1">

<!-- Modal content -->


</div>
</section>




@include('websiteLayout.footer')