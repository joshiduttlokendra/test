@include('websiteLayout.header')


<section class="ministore-area">
    <div class="container-fluid p-0">
         <img src="{{ asset($marketData->banner) }}" alt="" class="img-fluid w-100" height="100px"><div class="row g-0 py-2">
            <div class="col-xxl-1 col-lg-2 col-md-2 col-12">
               <figure class="mb-0 text-center px-2">
                    <img src="{{ asset($marketData->icon) }}" alt="" class="img-fluid w-100">
                </figure>
            </div>
            <div class="col-xxl-11 col-lg-10 col-md-10 col-12">
                <div class="mini-about h-100">
                    <div class="">
                        <p class="fs-sm">{!! $marketData->description !!}</p>
                    </div>
                    <div class="d-flex flex-wrap ">
                        <div class="bg-secondary rounded p-3 me-auto">
                            <a class="d-flex align-items-center" href="{{route('vendor.detail',$marketData->vendorId)}}">
                                <img class="rounded-circle" src="{{ asset($marketData->imageUrl) }}" width="50" alt="{{ $marketData->userName }}">
                                <div class="ps-2"><span class="fs-ms text-muted">Created by</span>
                                    <h6 class="fs-sm mb-0">{{ $marketData->userName }}</h6>
                                </div>
                            </a>
                            
                                @if(Auth::check())
                                @php 
                                    $user_id = Auth::user()->id;
                                    $check = App\Models\follow_unfollow_vendor::where(['Vendor_id'=>$marketData->vendorId ,'follower_id'=>$user_id])->first();
                                    // print_r($check);
                                    if(empty($check)){
                                        echo "<button class='btn btn-sm btn-primary follow_btn follow_vendor' id='follow_btn' data-id='$marketData->id'>Follow</button>";
                                    }else{
                                        echo "<button class='btn btn-sm btn-danger follow_btn follow_vendor'  id='follow_btn' data-id='$marketData->id'>Unfollow</button>";
                                    }
                                @endphp
                                @else  
                                <button class='btn btn-sm btn-primary follow_btn follow_vendor'  id='follow_btn' data-id='{{  $marketData->id  }}'>Follow</button>
                                @endif
                            
                        </div> 
                            {{-- nikhil --}} 
                            {{-- <div class="bg-secondary rounded p-3 me-2"> 
                                
                            </div> --}}
                            {{-- end --}}
                        <div class="bg-secondary rounded p-3 me-3">
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                            </div><span class="fs-ms ms-2">4.1/5</span>
                            <div class="fs-ms text-muted">based on 74 reviews</div>
                        </div>
                        <div class="bg-secondary rounded p-3 me-3"><i class="ci-download h5 text-muted align-middle mb-0 mt-n1 me-2"></i><span class="d-inline-block h6 mb-0 me-1">715</span><span class="fs-sm">Sales</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="jellypad mb-3">
            <b>
                @foreach ($cateGory as $cat)
                <a href="">{{ $cat->name }}</a> |
                @endforeach
                 </b>
        </div>


        <div class="row">
            @foreach ($products as $saleProduct)
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="card product-card-alt">
                    <span class="badge bg-primary badge-shadow">{{ $saleProduct->new == 1 ? 'New':'Best Seller' }} </span>

                    <div class="product-thumb">
                      <button class="btn-wishlist btn-sm" type="button"><i class="ci-heart wishList" data-type='1' data-id="{{ $saleProduct->id }}"></i></button>
                      <div class="product-card-actions"><a class="btn btn-light btn-icon btn-shadow fs-base mx-2 addToCartt @if($saleProduct->quantity == 0) disabled @endif"  data-size="{{ $saleProduct->size }}" data-id="{{ $saleProduct->id }}" data-color="{{ $saleProduct->color }}" data-buy="" data-bs-toggle="tooltip" data-bs-placement="top" title="Buy Now"><i class="ci-basket"></i></a>
                        <button class="btn btn-light btn-icon btn-shadow fs-base mx-2 addToCartt @if($saleProduct->quantity == 0) disabled @endif" data-size="{{ $saleProduct->size }}" data-id="{{ $saleProduct->id }}" data-color="{{ $saleProduct->color }}" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart" ><i class="ci-cart"></i></button>
                      </div><a class="product-thumb-overlay" href="{{ route('productDetails',$saleProduct->id) }}"></a>
                      <img src="{{  asset(json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="first-img">
                      @if(isset(json_decode($saleProduct->imageUrl)[1]))
                      <img src="{{ asset(json_decode($saleProduct->imageUrl)[1]) }}}" alt="Product" class="second-img">
                      @else
                      <img src="{{  asset(json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="second-img">
                      @endif
                    </div>
                    <div class="card-body">
                      <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                        <div class="text-muted fs-xs me-1">By: <a class="product-meta fw-medium" href="#">{{  $saleProduct->mName }}</a></div>
                        <?php $totalRatingss= App\Http\Controllers\Controller::rating($saleProduct->id);?>
                               <div class="star-rating"><i class="star-rating-icon ci-star{{ $totalRatingss >= 1 ? '-filled active':'' }}"></i><i class="star-rating-icon ci-star{{ $totalRatingss >= 2 ? '-filled active':'' }}"></i><i class="star-rating-icon ci-star{{ $totalRatingss >= 3 ? '-filled active':'' }}"></i><i class="star-rating-icon ci-star{{ $totalRatingss >= 4 ? '-filled active':'' }}"></i><i class="star-rating-icon ci-star{{ $totalRatingss >= 5 ? '-filled active':'' }}"></i>
                        </div>
                      </div>

                      <h3 class="product-title  mb-2"><a href="{{ route('productDetails',$saleProduct->id) }}">{{  $saleProduct->name }}</a></h3>
                      <div class="d-flex flex-wrap justify-content-between align-items-center">
                        @php
                            $price=explode(".", $saleProduct->price);
                        @endphp
                        <div class="fs-sm me-2"><i class="ci-download text-muted me-1"></i><?php echo $sales=App\Http\Controllers\Controller::sales($saleProduct->id);?><span class="fs-xs ms-1">Sales</span></div>
                        <div class="bg-primary text-white rounded-1 py-1 px-2">${{ $price[0] }}.<small>{{ $price[1] }}</small></div>
                      </div>
                    </div>
                  </div>
            </div>
            @endforeach


     <!--  -->
        </div>
    </div>
    <div class="container-fluid py-5">
        <div class="row mb-5">
            <div class="col-lg-1 col-md-2 col-12">
                <div class="vertical-title">
                    <h1> S </h1>
                    <h1> A</h1>
                    <h1> L</h1>
                    <h1> E</h1>
                </div>
            </div>
            <div class="col-lg-11 col-md-10 col-12">
                <!-- Carousel-->
                <div class="tns-carousel tns-controls-static tns-controls-inner">
                    <div class="tns-carousel-inner" data-carousel-options='{"items": 2, "controls": true, "nav": false, "autoHeight": true, "responsive": {"0":{"items":1},"500":{"items":2, "gutter": 18},"768":{"items":2, "gutter": 20}, "991":{"items":3, "gutter": 30}, "1368":{"items":5, "gutter": 30},"1500":{"items":6, "gutter": 30}}}'>
                        <!-- Product-->
                        @foreach ($saleProducts as $saleProduct)
            <!-- Product-->
            <div>
              <div class="card product-card-alt">
                <span class="badge bg-primary badge-shadow">{{ $saleProduct->new == 1 ? 'New':'Best Seller' }} </span>

                <div class="product-thumb">
                  <button class="btn-wishlist btn-sm" type="button"><i class="ci-heart wishList" data-type='1' data-id="{{ $saleProduct->id }}"></i></button>
                  <div class="product-card-actions"><a class="btn btn-light btn-icon btn-shadow fs-base mx-2 addToCartt @if($saleProduct->quantity == 0) disabled @endif"  data-size="{{ $saleProduct->size }}" data-id="{{ $saleProduct->id }}" data-color="{{ $saleProduct->color }}" data-buy="" data-bs-toggle="tooltip" data-bs-placement="top" title="Buy Now"><i class="ci-basket"></i></a>
                    <button class="btn btn-light btn-icon btn-shadow fs-base mx-2 addToCartt @if($saleProduct->quantity == 0) disabled @endif" data-size="{{ $saleProduct->size }}" data-id="{{ $saleProduct->id }}" data-color="{{ $saleProduct->color }}" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart" ><i class="ci-cart"></i></button>
                  </div><a class="product-thumb-overlay" href="{{ route('productDetails',$saleProduct->id) }}"></a>
                  <img src="{{  asset(json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="first-img">
                  @if(isset(json_decode($saleProduct->imageUrl)[1]))
                  <img src="{{ asset(json_decode($saleProduct->imageUrl)[1]) }}}" alt="Product" class="second-img">
                  @else
                  <img src="{{  asset(json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="second-img">
                  @endif
                </div>
                <div class="card-body">
                  <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                    <div class="text-muted fs-xs me-1">By: <a class="product-meta fw-medium" href="#">{{  $saleProduct->mName }}</a></div>
                    <?php $totalRatingss= App\Http\Controllers\Controller::rating($saleProduct->id);?>
                           <div class="star-rating"><i class="star-rating-icon ci-star{{ $totalRatingss >= 1 ? '-filled active':'' }}"></i><i class="star-rating-icon ci-star{{ $totalRatingss >= 2 ? '-filled active':'' }}"></i><i class="star-rating-icon ci-star{{ $totalRatingss >= 3 ? '-filled active':'' }}"></i><i class="star-rating-icon ci-star{{ $totalRatingss >= 4 ? '-filled active':'' }}"></i><i class="star-rating-icon ci-star{{ $totalRatingss >= 5 ? '-filled active':'' }}"></i>
                    </div>
                  </div>

                  <h3 class="product-title  mb-2"><a href="{{ route('productDetails',$saleProduct->id) }}">{{  $saleProduct->name }}</a></h3>
                  <div class="d-flex flex-wrap justify-content-between align-items-center">
                    @php
                        $price=explode(".", $saleProduct->price);
                    @endphp
                    <div class="fs-sm me-2"><i class="ci-download text-muted me-1"></i><?php echo $sales=App\Http\Controllers\Controller::sales($saleProduct->id);?><span class="fs-xs ms-1">Sales</span></div>
                    <div class="bg-primary text-white rounded-1 py-1 px-2">${{ $price[0] }}.<small>{{ $price[1] }}</small></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Product-->
            @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- product -->
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between">
                    <div class=" h_title">
                        <h1>Products </h1>
                    </div>
                    <!-- Toolbar-->
                    <div class="d-flex  bg-primary justify-content-between align-items-center p-2 px-3 mb-5">
                        <div class="list-grid-view">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="pe-3">
                                    <b class="mb-0 text-white h4">View</b>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link btn active" id="pills-grid-tab" data-bs-toggle="pill" data-bs-target="#pills-grid" type="button" role="tab" aria-controls="pills-grid" aria-selected="true"><i class="ci-view-grid"></i></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link btn" id="pills-list-tab" data-bs-toggle="pill" data-bs-target="#pills-list" type="button" role="tab" aria-controls="pills-list" aria-selected="false"><i class="ci-view-list"></i></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-grid" role="tabpanel" aria-labelledby="pills-grid-tab">
                <!-- Products grid-->
                <div class="row mx-n2">
                    <!-- Product-->
                    @foreach ($productsAll as $saleProduct)
                    <div class=" col-xl-2 col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
                        <div class="card product-card-alt">
                            <span class="badge bg-primary badge-shadow">{{ $saleProduct->new == 1 ? 'New':'Best Seller' }} </span>

                            <div class="product-thumb">
                              <button class="btn-wishlist btn-sm" type="button"><i class="ci-heart wishList" data-type='1' data-id="{{ $saleProduct->id }}"></i></button>
                              <div class="product-card-actions"><a class="btn btn-light btn-icon btn-shadow fs-base mx-2 addToCartt @if($saleProduct->quantity == 0) disabled @endif"  data-size="{{ $saleProduct->size }}" data-id="{{ $saleProduct->id }}" data-color="{{ $saleProduct->color }}" data-buy="" data-bs-toggle="tooltip" data-bs-placement="top" title="Buy Now"><i class="ci-basket"></i></a>
                                <button class="btn btn-light btn-icon btn-shadow fs-base mx-2 addToCartt @if($saleProduct->quantity == 0) disabled @endif" data-size="{{ $saleProduct->size }}" data-id="{{ $saleProduct->id }}" data-color="{{ $saleProduct->color }}" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart" ><i class="ci-cart"></i></button>
                              </div><a class="product-thumb-overlay" href="{{ route('productDetails',$saleProduct->id) }}"></a>
                              <img src="{{  asset(json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="first-img">
                              @if(isset(json_decode($saleProduct->imageUrl)[1]))
                              <img src="{{ asset(json_decode($saleProduct->imageUrl)[1]) }}}" alt="Product" class="second-img">
                              @else
                              <img src="{{  asset(json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="second-img">
                              @endif
                            </div>
                            <div class="card-body">
                              <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                                <div class="text-muted fs-xs me-1">By: <a class="product-meta fw-medium" href="#">{{  $saleProduct->mName }}</a></div>
                                <?php $totalRatingss= App\Http\Controllers\Controller::rating($saleProduct->id);?>
                                       <div class="star-rating"><i class="star-rating-icon ci-star{{ $totalRatingss >= 1 ? '-filled active':'' }}"></i><i class="star-rating-icon ci-star{{ $totalRatingss >= 2 ? '-filled active':'' }}"></i><i class="star-rating-icon ci-star{{ $totalRatingss >= 3 ? '-filled active':'' }}"></i><i class="star-rating-icon ci-star{{ $totalRatingss >= 4 ? '-filled active':'' }}"></i><i class="star-rating-icon ci-star{{ $totalRatingss >= 5 ? '-filled active':'' }}"></i>
                                </div>
                              </div>

                              <h3 class="product-title  mb-2"><a href="{{ route('productDetails',$saleProduct->id) }}">{{  $saleProduct->name }}</a></h3>
                              <div class="d-flex flex-wrap justify-content-between align-items-center">
                                @php
                                    $price=explode(".", $saleProduct->price);
                                @endphp
                                <div class="fs-sm me-2"><i class="ci-download text-muted me-1"></i><?php echo $sales=App\Http\Controllers\Controller::sales($saleProduct->id);?><span class="fs-xs ms-1">Sales</span></div>
                                <div class="bg-primary text-white rounded-1 py-1 px-2">${{ $price[0] }}.<small>{{ $price[1] }}</small></div>
                              </div>
                            </div>
                          </div>
                        <hr class="d-sm-none">
                    </div>
                    @endforeach

                    <!-- Product-->
                </div>
                <!-- Products grid-->
            </div>
            <div class="tab-pane fade" id="pills-list" role="tabpanel" aria-labelledby="pills-list-tab">
                <div class="row">
                    @foreach ($productsAll as $saleProduct)
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="card product-card product-list mb-3">
                            <button class="btn-wishlist btn-sm" type="button"><i class="ci-heart wishList" data-type='1' data-id="{{ $saleProduct->id }}"></i></button>
                            <div class="d-sm-flex align-items-center"><a class="product-list-thumb" href="{{ route('productDetails',$saleProduct->id) }}"><img src="{{  asset(json_decode($saleProduct->imageUrl)[0]) }}" alt="Product"></a>
                                <div class="card-body py-2"><a class="product-meta d-block  pb-1" href="#">{{  $saleProduct->mName }}</a>
                                    <h3 class="product-title fs-base"><a href="{{ route('productDetails',$saleProduct->id) }}">{{  $saleProduct->name }}</a></h3>
                                    <div class="d-flex justify-content-between">
                                        @php
                                    $price=explode(".", $saleProduct->salePrice);
                                    $price1=explode(".", $saleProduct->price);
                                @endphp
                                        <div class="product-price"><span class="text-accent">${{ $saleProduct->sale == 1 ? $price[0]:$price[0] }}.<small>{{ $saleProduct->sale == 1 ? $price[1]:$price[1] }}</small></span></div>
                                        <div class="star-rating"><i class="star-rating-icon ci-star{{ $totalRatingss >= 1 ? '-filled active':'' }}"></i><i class="star-rating-icon ci-star{{ $totalRatingss >= 2 ? '-filled active':'' }}"></i><i class="star-rating-icon ci-star{{ $totalRatingss >= 3 ? '-filled active':'' }}"></i><i class="star-rating-icon ci-star{{ $totalRatingss >= 4 ? '-filled active':'' }}"></i><i class="star-rating-icon ci-star{{ $totalRatingss >= 5 ? '-filled active':'' }}"></i>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <a class="btn btn-primary mb-2 addToCartt @if($saleProduct->quantity == 0) disabled @endif" data-size="{{ $saleProduct->size }}" data-id="{{ $saleProduct->id }}" data-color="{{ $saleProduct->color }}"><i class="ci-cart  pe-3"></i>Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="d-flex flex-wrap justify-content-center align-items-center border-top pt-3">
                    <div class="py-2 me-2">
                        <h4>Share :</h4>
                    </div>
                    <div class="py-2"><a class="btn-social bs-outline bs-facebook  ms-2" href="#"><i class="ci-facebook"></i></a><a class="btn-social bs-outline bs-twitter  ms-2" href="#"><i class="ci-twitter"></i></a><a class="btn-social bs-outline bs-pinterest  ms-2" href="#"><i class="ci-pinterest"></i></a><a class="btn-social bs-outline bs-instagram ms-2" href="#"><i class="ci-instagram"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('websiteLayout.footer')