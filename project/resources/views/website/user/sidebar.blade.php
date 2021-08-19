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
                            
                             <a class="btn btn-primary btn-sm w-100"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ci-sign-out me-2"></i>Sign out
                  
                                  <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                                    @csrf
                                  </form>
                             </a>

            </div>
            <div class="d-lg-block collapse" id="account-menu">


                  <div class="bg-secondary px-4 py-3">
                <b class=" mb-0 text-muted">User Dashboard</b>
              </div>
                   <ul class="list-unstyled mb-0">
                   <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 " href="{{ route('userDashboard') }}"><i class="ci-user opacity-60 me-2"></i>Profile info</a></li>
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{ route('address') }}"><i class="ci-bag opacity-60 me-2"></i>Address<span class="fs-sm text-muted ms-auto"></span></a></li>
                


              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 active" href="{{ route('orders') }}"><i class="ci-bag opacity-60 me-2"></i>Orders<span class="fs-sm text-muted ms-auto">{{ count(App\Models\order::where('userId',Auth::id())->get()) }}</span></a></li>
            
           <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 " href="{{route('account-review')}}"><i class="ci-user opacity-60 me-2"></i>Review</a></li>

             <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 " href="{{route('account-payment')}}"><i class="ci-user opacity-60 me-2"></i>Payment Details</a></li>



           <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{route('account-wishlist')}}"><i class="ci-heart opacity-60 me-2"></i>Wishlist<span class="fs-sm text-muted ms-auto"></span></a></li>

             <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 " href="{{route('notification')}}"><i class="ci-user opacity-60 me-2"></i>Notification</a></li>
             <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 " href="{{route('coupongift')}}"><i class="ci-bag opacity-60 me-2"></i>Coupon Gift</a></li>
             <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 " href="{{route('order-return')}}"><i class="ci-bag opacity-60 me-2"></i>Order Return</a></li>

      
        </ul>

            </div>
          </div>
        </aside>
        <!-- Content  -->