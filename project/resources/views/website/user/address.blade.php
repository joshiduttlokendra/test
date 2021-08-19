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
                  <h3 class="fs-base mb-0">
                     @if(!empty(Auth::user()->nickname))
                         {{ Auth::user()->nickname }}
                     @else
                        {{ Auth::user()->name }}
                    @endif</h3><span class="text-primary fs-sm">{{ Auth::user()->email }}</span>
                  <a href="#" class="text-primary">{{ Auth::user()->membershipId }}</a>
                </div>


              </div><a class="btn btn-primary d-lg-none mb-2 mt-3 mt-md-0" href="#account-menu" data-bs-toggle="collapse" aria-expanded="false"><i class="ci-menu me-2"></i>Account menu</a>
            </div>

            <div class="p-3">
                             <a class="btn btn-primary btn-sm w-100" href="{{url('/signOut')}}"><i class="ci-sign-out me-2"></i>Sign out</a>

            </div>
            <div class="d-lg-block collapse" id="account-menu">


                <div class="bg-secondary px-4 py-3">
                <b class=" mb-0 text-muted">User Dashboard</b>
              </div>
              <ul class="list-unstyled mb-0">
                <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 active" href="{{ route('userDashboard') }}"><i class="ci-user opacity-60 me-2"></i>Profile info</a></li>
                {{-- <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="account-address.php"><i class="ci-location opacity-60 me-2"></i>Addresses</a></li> --}}



                <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{ route('orders') }}"><i class="ci-bag opacity-60 me-2"></i>Orders<span class="fs-sm text-muted ms-auto">1</span></a></li>
                <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{ route('wishList') }}"><i class="ci-heart opacity-60 me-2"></i>Wishlist<span class="fs-sm text-muted ms-auto">3</span></a></li>
                <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{ route('address') }}"><i class="ci-heart opacity-60 me-2"></i>Shipping Address</a></li>

              </ul>

            </div>
          </div>
        </aside>
        <!-- Content  -->
        <div class="col-lg-8">

          <div class="bg-white rounded-3 shadow-lg p-4 mb-5 mb-lg-0">


          <!-- Toolbar-->
          <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 mb-3">
            <h4 class="fs-base  mb-0"> Shipping Address:</h4>

            <a class="btn btn-primary btn-sm "  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ci-sign-out me-2"></i>Sign out

                                  <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                                    @csrf
                                  </form>
                             </a>
          </div>
          <!-- Profile form-->
          {{-- {{route('add_shipping_address')}} --}}
          <form method="post" action="" enctype="multipart/form-data" >
            @csrf()







<!-- The Modal -->

@foreach ($address as $row )


            <div class="row gx-4 gy-3">
              <div class="col-sm-6">
                <label class="form-label" for="account-address">Address</label>
                <input class="form-control" type="text" id="account-address" value="{{ $row->address}}">
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="account-aptNumber">Apt. Number</label>
                <input class="form-control" type="text" id="account-aptNumber" value="{{ $row->aptNumber}}" required>
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="account-city">city</label>
                <input class="form-control" type="text" id="account-city" value="{{ $row->city }}" required>
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

    @endforeach


</section>




@include('websiteLayout.footer')
