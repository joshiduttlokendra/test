@include('websiteLayout.header')
<!-- Page Title (Light)-->
<div class="breadcum-banner">
  <div class="container">
  
    <div class="breadtext">
      <h1 class="mb-0 text-white">- MEET OUR VENDORS, SHOP FROM THEIR STORES -</h1>
    </div>


  </div>
</div>

    <!-- Shadow box-->
    <section class="container section-padding">
      <div class="bg-light shadow-sm overflow-hidden">
        <div class="row">
          <!-- Content-->
          <div class="col-lg-8 pt-2 pt-lg-4 pb-4 mb-lg-3">
            <div class="pt-3 px-4 pe-lg-0 ps-xl-5">
                        <h1 class="h3 mb-3">All Products</h1>

                <div class="row">
               {{-- ===================================================================================== --}}

                  @foreach ($products as $saleProduct)  



                        <div class="col-md-4 col-sm-6 px-2 mb-4">

                            <div class="card product-card-alt mb-3">

                                <div class="product-thumb">

                                    <button class="btn-wishlist btn-sm wishList1" type="button" data-title-left="Wishlist"><i class="ci-heart"></i></button>

                                    <div class="product-card-actions">

                                    

                                    <a href="{{route('checkout',$saleProduct->id)}}" class="btn btn-light btn-icon btn-shadow fs-base mx-2 buylogin  @if ($saleProduct->quantity == 0) disabled @endif" 
                                        data-id=""data-color=""   data-title=" @if ($saleProduct->quantity == 0) Product Not Available @else Buy Now @endif" > <i class="ci-basket"></i></a>

                              

                                        

                                        <button

                                            class="btn btn-light btn-icon btn-shadow fs-base mx-2 addToCartt  @if ($saleProduct->quantity == 0) disabled @endif" data-size="{{ $saleProduct->size }}"
                                            data-id="{{ $saleProduct->id }}"
                                            data-color="{{ $saleProduct->color }}" type="button"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-title="Add to Cart" ><i

                                                class="ci-cart"></i></button>

                                    </div><a class="product-thumb-overlay"

                                        href="{{ route('productDetails', $saleProduct->id) }}"></a>

                                    <img src="{{ asset('project/public'.json_decode($saleProduct->imageUrl)[0]) }}" alt="Product"

                                        class="first-img">

                                    @if (isset(json_decode($saleProduct->imageUrl)[1]))

                                        <img src="{{ asset('project/public'.json_decode($saleProduct->imageUrl)[1]) }}" alt="Product"

                                            class="second-img">

                                    @else

                                        <img src="{{ asset('project/public'.json_decode($saleProduct->imageUrl)[0]) }}" alt="Product"

                                            class="second-img">

                                    @endif

                                </div>

                                <div class="card-body">

                                    <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">

                                        <div class="text-muted fs-xs me-1">By: <a class="product-meta fw-medium"

                                                href="#">{{ $saleProduct->mName }}</a></div>

                                        <?php $totalRatingss =

                                        App\Http\Controllers\Controller::rating($saleProduct->id); ?>

                                        <div class="star-rating"><i

                                                class="star-rating-icon ci-star{{ $totalRatingss >= 1 ? '-filled active' : '' }}"></i><i

                                                class="star-rating-icon ci-star{{ $totalRatingss >= 2 ? '-filled active' : '' }}"></i><i

                                                class="star-rating-icon ci-star{{ $totalRatingss >= 3 ? '-filled active' : '' }}"></i><i

                                                class="star-rating-icon ci-star{{ $totalRatingss >= 4 ? '-filled active' : '' }}"></i><i

                                                class="star-rating-icon ci-star{{ $totalRatingss >= 5 ? '-filled active' : '' }}"></i>

                                        </div>

                                    </div>



                                    <h3 class="product-title  mb-2"><a

                                            href="{{ route('productDetails', $saleProduct->id,'1') }}">{{ $saleProduct->name }}</a>

                                    </h3>

                                    <div class="d-flex flex-wrap justify-content-between align-items-center">

                                        @php

                                            $price = explode('.', $saleProduct->price);

                                        @endphp

                                        <div class="fs-sm me-2"><i class="ci-download text-muted me-1"></i><?php echo $sales =

                                            App\Http\Controllers\Controller::sales($saleProduct->id); ?><span class="fs-xs ms-1">Sales</span></div>

                                        <div class="bg-primary text-white rounded-1 py-1 px-2">

                                            ${{ $price[0] }}.<small>{{ $price[1] }}</small></div>

                                    </div>

                                </div>

                            </div>

                            <hr class="d-sm-none">

                        </div>

                    @endforeach


               {{-- ===================================================================================== --}}
               
               
               
         


                </div>


                    <hr class="my-3">
            <!-- Pagination-->
            <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
               <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="#"><i class="ci-arrow-left me-2"></i>Prev</a></li>
               </ul>
               <ul class="pagination">
                  <li class="page-item d-sm-none"><span class="page-link page-link-static">1 / 5</span></li>
                  <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span class="visually-hidden">(current)</span></span></li>
                  <li class="page-item d-none d-sm-block"><a class="page-link" href="#">2</a></li>
                  <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
                  <li class="page-item d-none d-sm-block"><a class="page-link" href="#">4</a></li>
                  <li class="page-item d-none d-sm-block"><a class="page-link" href="#">5</a></li>
               </ul>
               <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="#" aria-label="Next">Next<i class="ci-arrow-right ms-2"></i></a></li>
               </ul>
            </nav>

 
            </div>
          </div>
          <!-- Sidebar-->
          <aside class="col-lg-4 ps-xl-5">
            <hr class="d-lg-none">
            <div class="bg-white h-100 p-4 ms-auto border-start">
              <div class="px-lg-2">
                
                <a class="btn btn-primary btn-shadow d-block w-100 mt-4" href="shop.php"><i class="ci-cart fs-lg me-2"></i>Go to the Marketplace</a>
                <div class="bg-secondary rounded p-3 mt-4 mb-2"><a class="d-flex align-items-center" href="#"><img class="rounded-circle" src="{{asset('/project/public').'/'.$vendor[0]->imageUrl }}" width="50" alt="Sara Palson">
                    {{--  <div class="ps-2"><span class="fs-ms text-muted">Created by</span>  --}}
                    <div class="ps-2"><span class="fs-ms text-muted">Vendor</span>
                      <h6 class="fs-sm mb-0">{{ $vendor[0]->name }}</h6>
                    </div></a></div>
                <div class="bg-secondary rounded p-3 mb-2"><i class="ci-download h5 text-muted align-middle mb-0 mt-n1 me-2"></i><span class="d-inline-block h6 mb-0 me-1">715</span><span class="fs-sm">Sales</span></div>
                <div class="bg-secondary rounded p-3 mb-4">
                  <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                  </div><span class="fs-ms ms-2">4.1/5</span>
                  <div class="fs-ms text-muted">based on 74 reviews</div>
                </div>


                <div>
                  <b>Follow us :</b>
                  <hr>
                  <div class="pt-3 mb-5">
                                      <!-- Facebook -->
                    <a href="#" class="btn-social bs-facebook">
                      <i class="ci-facebook"></i>
                    </a>

                    <!-- Twitter -->
                    <a href="#" class="btn-social bs-twitter">
                      <i class="ci-twitter"></i> 
                    </a>

                    <!-- Instagram -->
                    <a href="#" class="btn-social bs-instagram">
                      <i class="ci-instagram"></i> 
                    </a>
                                      </div>


                </div>
                <ul class="list-unstyled fs-sm">
                  <li class="d-flex justify-content-between mb-3 pb-3 border-bottom"><span class="text-dark fw-medium">Email</span><span class="text-muted ps-5">{{$vendor[0]->email}}</span></li>
                  <li class="d-flex justify-content-between mb-3 pb-3 border-bottom"><span class="text-dark fw-medium">Phone Number</span><span class="text-muted ps-5">{{$vendor[0]->phoneNumber}}</span></li>

                   <li class="d-flex justify-content-between mb-3 pb-3 border-bottom"><span class="text-dark fw-medium">Date of Birth</span><span class="text-muted ps-5">{{$vendor[0]->dob}}
                  <li class="d-flex justify-content-between mb-3 pb-3 border-bottom"><span class="text-dark fw-medium">Address</span><a class="product-meta ps-5" href="#">Lorem ipsum dolor sit amet  </a></li>
               
                </ul>
 
             
                <div class="enquiey-from">
                  <form action="{{ route('vendor.supportReq') }}" method="post" >
                  @csrf
                    <h5 class="">Drop a message</h5>
                    <hr class="mb-3">

                    <!-- Floating label: Text input -->
                    <input type="hidden" name="user_id" value="@if(Auth::check())  {{Auth::user()->id}}  @endif">
                    <input type="hidden" name="vendor_id" value="{{$vendor[0]->id}}">
                          <div class="form-floating mb-3">
                            <input class="form-control" type="text" id="fl-text" name="name" placeholder="Your name" @if(Auth::check()) value="{{Auth::user()->name}}" readonly @endif>
                            <label for="fl-text">Your name</label>
                          </div>

                          <div class="form-floating mb-3">
                            <input class="form-control" type="text" id="fl-text" name="email" placeholder="Your Email" @if(Auth::check()) value="{{Auth::user()->email}}" readonly @endif>
                            <label for="fl-text">Your Email</label>
                          </div>

                          <div class="form-floating mb-3">
                            <textarea class="form-control" id="fl-textarea" style="height: 120px;" name="message" placeholder="Your message"></textarea>
                            <label for="fl-textarea">Your message</label>
                          </div>
                          <div class="d-grid">
                          @if(Auth::check())
                            <button type="submit" class="btn btn-primary btn-block">Submit Enquiry</button>
                        @else
                        <button type="submit" class="btn btn-primary btn-block disabled" >Please Login to Submit Enquiry</button>
                        @endif
                          </div>
                  </form>
                </div>

              </div>
            </div>
          </aside>
        </div>
      </div>
    </section>


<section class=" section-padding bg-secondary">
  <div class="container">
       <h2 class="h3 my-2">Our Core Team Members</h2>
          <p class="fs-sm text-muted">People behind your great shopping experience</p>
          <div class="row pt-3">
          @empty($staff)
            <div>No staff added</div>
          @endempty
          @foreach($staff as $row)
             <div class="col-lg-4 col-sm-6 mb-grid-gutter">
              <div class="d-flex align-items-center"><img class="rounded-circle" src="{{ asset('project/public/uploads/staffImage').'/'.$row->image }}" width="100" >
                <div class="ps-3">
                  <h6 class="fs-base pt-1 mb-1">{{ $row->name }}</h6>
                  <p class="fs-ms text-muted mb-0">{{ $row->role }}</p>
                  {{--  <a class="nav-link-style fs-ms text-nowrap" ><i class="ci-mail me-2"></i>{{ $row->name }}</a>  --}}
                </div>
              </div>
            </div> 
          @endforeach
            
            {{--  <div class="col-lg-4 col-sm-6 mb-grid-gutter">
              <div class="d-flex align-items-center"><img class="rounded-circle" src="img/team/04.jpg" width="100" >
                <div class="ps-3">
                  <h6 class="fs-base pt-1 mb-1">Barbara Palson</h6>
                  <p class="fs-ms text-muted mb-0">CEO, Co-founder</p><a class="nav-link-style fs-ms text-nowrap" ><i class="ci-mail me-2"></i>abc@123.com</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-grid-gutter">
              <div class="d-flex align-items-center"><img class="rounded-circle" src="img/team/06.jpg" width="100" >
                <div class="ps-3">
                  <h6 class="fs-base pt-1 mb-1">William Smith</h6>
                  <p class="fs-ms text-muted mb-0">CEO, Co-founder</p><a class="nav-link-style fs-ms text-nowrap" ><i class="ci-mail me-2"></i>abc@123.com</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-grid-gutter">
              <div class="d-flex align-items-center"><img class="rounded-circle" src="img/team/02.jpg" width="100" >
                <div class="ps-3">
                  <h6 class="fs-base pt-1 mb-1">Amanda Gallaher</h6>
                  <p class="fs-ms text-muted mb-0">CEO, Co-founder</p><a class="nav-link-style fs-ms text-nowrap" ><i class="ci-mail me-2"></i>abc@123.com</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-grid-gutter">
              <div class="d-flex align-items-center"><img class="rounded-circle" src="img/team/01.jpg" width="100" >
                <div class="ps-3">
                  <h6 class="fs-base pt-1 mb-1">Benjamin Miller</h6>
                  <p class="fs-ms text-muted mb-0">CEO, Co-founder</p><a class="nav-link-style fs-ms text-nowrap" ><i class="ci-mail me-2"></i>abc@123.com</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-grid-gutter">
              <div class="d-flex align-items-center"><img class="rounded-circle" src="img/team/07.jpg" width="100" >
                <div class="ps-3">
                  <h6 class="fs-base pt-1 mb-1">Miguel Rodrigez</h6>
                  <p class="fs-ms text-muted mb-0">CEO, Co-founder</p><a class="nav-link-style fs-ms text-nowrap" ><i class="ci-mail me-2"></i>abc@123.com</a>
                </div>
              </div>
            </div>  --}}
          </div>
  </div>
       
        </section>
@include('websiteLayout.footer')
