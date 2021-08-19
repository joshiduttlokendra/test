@include('websiteLayout.header')
<section class="shop-area section-padding">
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <!-- Sidebar-->
            <aside class="col-lg-4">
                <!-- Sidebar-->
                <div class="offcanvas offcanvas-collapse bg-white w-100 rounded-3 shadow-lg py-1" id="shop-sidebar"
                    style="max-width: 22rem;">
                    <div class="offcanvas-cap align-items-center shadow-sm">
                        <h2 class="h5 mb-0">Filters</h2>
                        <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body py-grid-gutter px-lg-grid-gutter">
                        <!-- Categories-->
                        <div class="widget widget-categories mb-4 pb-4 border-bottom">
                            <a class="d-flex" href="">
                                <h2 class="me-2 " style="background-color: #4e7820; width: 25px;height: 25px;"></h2>
                                <h1 class="widget-title cattitle border-bottom-0">Scout Supreme</h1>
                            </a>
                            <h3 class="widget-title cattitle">Categories</h3>
                            <div class="accordion mt-n1" id="categories">
                                <!-- Shoes-->




                                @foreach ($categories as $category)
                                    <div class="accordion-item">
                                        <h3 class="accordion-header">
                                            <a class="accordion-button collapsed" href="#cat-{{ $category->id }}"
                                                role="button" data-bs-toggle="collapse" aria-expanded="false"
                                                aria-controls="cat-">{{ $category->name }}</a>
                                        </h3>
                                        <div class="accordion-collapse collapse" id="cat-{{ $category->id }}"
                                            data-bs-parent="#categories">
                                            <div class="accordion-body">
                                                <div class="widget widget-links widget-filter">
                                                    <ul class="widget-list widget-filter-list pt-1"
                                                        style="height: 10rem;">
                                                        @foreach ($category->subCat as $subCat)
                                                            <li class="widget-list-item widget-filter-item">
                                                                <a class="widget-list-link d-flex justify-content-between align-items-center"
                                                                    data-catID="{{ $subCat->id }}"
                                                                    style="cursor: pointer;">
                                                                    <span class="widget-filter-item-text">
                                                                        {{ $subCat->name }} </span>
                                                                    <span
                                                                        class="fs-xs text-muted ms-3">{{ count(
    App\Models\products::where('status', 1)->where('categoryId', $subCat->id)->get(),
) }}</span>
                                                                </a>
                                                            </li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <!-- Price range-->
                        <div class="widget mb-4 pb-4 border-bottom">
                            <h3 class="widget-title ">Price</h3>
                            <div class="range-slider" id="range-slider" data-start-min="250" data-start-max="680"
                                data-min="0" data-max="1000" data-step="1">
                                <div class="range-slider-ui"></div>
                                <div class="d-flex pb-1">
                                    <div class="w-50 pe-2 me-2">
                                        <div class="input-group input-group-sm"><span class="input-group-text">$</span>
                                            <input class="form-control range-slider-value-min"
                                                id="range_slider_value_min" type="text">
                                        </div>
                                    </div>
                                    <div class="w-50 ps-2">
                                        <div class="input-group input-group-sm"><span class="input-group-text">$</span>
                                            <input class="form-control range-slider-value-max" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Filter by Brand-->
                        <div class="widget widget-filter mb-4 pb-4 border-bottom">
                            <h3 class="widget-title">Brand</h3>
                            <ul class="widget-list widget-filter-list list-unstyled pt-1" style="max-height: 11rem;"
                                data-simplebar data-simplebar-auto-hide="false">

                                @foreach ($product_brand as $brand)

                                    <li
                                        class="widget-filter-item d-flex justify-content-between align-items-center mb-1 product_brand">
                                        <div class="form-check">
                                            <input class="form-check-input product_brand" type="checkbox"
                                                id="{{ $brand->name }}" data-manh="{{ $brand->id }}"
                                                name="product_brand">
                                            <label class="form-check-label widget-filter-item-text"
                                                for="{{ $brand->name }}">{{ $brand->name }}</label>
                                        </div>
                                        <span
                                            class="fs-xs text-muted">{{ count(
    App\Models\products::where('status', 1)->where('brandId', $brand->id)->get(),
) }}</span>
                                    </li>


                                @endforeach
                            </ul>
                        </div>
                        <!-- Filter by Size-->
                        <div class="widget widget-filter mb-4 pb-4 border-bottom">
                            <h3 class="widget-title">Size</h3>
                            <ul class="widget-list widget-filter-list list-unstyled pt-1" style="max-height: 11rem;"
                                data-simplebar data-simplebar-auto-hide="false">
                                @foreach ($product_size as $size)

                                    <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1"
                                        data-manh="{{ $size->size }}">
                                        <div class="form-check">
                                            <input class="form-check-input product_size" type="checkbox"
                                                id="size-{{ $size->size }}" data-manh="{{ $size->size }}"
                                                name="product_size">
                                            <label class="form-check-label widget-filter-item-text"
                                                for="size-{{ $size->size }}">{{ $size->size }}</label>
                                        </div>
                                        <span
                                            class="fs-{{ $size->size }} text-muted">{{ count(
    App\Models\products::where('status', 1)->where('size', $size->size)->get(),
) }}</span>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- Filter by Color-->
                        <div class="widget widget-filter mb-4 pb-4 border-bottom">
                            <h3 class="widget-title">Color</h3>
                            <div class="d-flex flex-wrap">

                                @foreach ($product_color as $color)

                                    <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                                        <input class="form-check-input product_color" type="checkbox"
                                            id="color-{{ $color->color }}" data-manh="{{ $color->color }}"
                                            name="product_color">
                                        <label class="form-option-label rounded-circle"
                                            for="color-{{ $color->color }}"><span
                                                class="form-option-color rounded-circle"
                                                style="background-color: #{{ $color->color_code }};"></span></label>
                                        <label class="d-block fs-xs text-muted mt-n1"
                                            for="color-{{ $color->color }}">{{ $color->color }}</label>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="widget">
                            <h3 class="widget-title">Generalised By:</h3>
                            <div class="form-check">
                                <input class="form-check-input generalised" type="radio" id="new-p" name="genradio"
                                    value="1" checked>
                                <label class="form-check-label " for="new-p">New Product</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input generalised" type="radio" id="used-p" name="genradio"
                                    value="0">
                                <label class="form-check-label" for="used-p">Used Product</label>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <!-- Content  -->
            <div class="col-lg-8">
                <!-- Toolbar-->
                  <!-- New Toolbar-->
                  <div class="d-flex justify-content-between bg-primary align-items-center filter-bar w-100 p-3 mb-5">

<div class="">
   <span class="fs-md text-light opacity-1 text-nowrap ms-2 d-none d-md-block">
       
       {{$count1}} products of {{$count}} products</span>
       
</div>

<div class="d-flex flex-wrap">
   <div class="d-flex align-items-center flex-nowrap ">
      <label class="text-light opacity-75 text-nowrap fs-sm me-2 d-none d-sm-block" for="sorting">Sort by:</label>
      <select class="form-select" id="sorting">
         <option>New Releases</option>
         <option>Popularity</option>
         <option>Average Rating</option>
         <option >Relevance</option>
         <option>Low - Hight Price</option>
         <option>High - Low Price</option>
         <option>A - Z Order</option>
         <option>Z - A Order</option>
         <option>Size</option>
         <option>Colour</option>
      </select>
   </div>
</div>



  <div class="filter-menuicon">
   <a class="text-white" href="#" data-bs-toggle="offcanvas" data-bs-target="#shop-sidebar"><span class="handheld-toolbar-icon text-white"><i class="ci-filter-alt"></i></span><span class="handheld-toolbar-label text-white fs-md">Filters</span></a>
</div>
</div>

                                          
                <!-- Products grid-->
                <div id="search-data"></div>
                <div class="row mx-n2" id="shop_product">
                    <!-- Product-->

                    @foreach ($products as $saleProduct)

                        <div class="col-md-4 col-sm-6 px-2 mb-4">
                            <div class="card product-card-alt mb-3">
                                <div class="product-thumb">
                                    <button class="btn-wishlist btn-sm wishList1"  data-id="{{ $saleProduct->id }}" data-price="{{ $saleProduct->price }}" data-type="1" data-title-left="Wishlist" type="button"><i class="ci-heart wishList"></i></button>
                                    <div class="product-card-actions">
                                    
                                    <a href="{{route('checkout',$saleProduct->id)}}" class="btn btn-light btn-icon btn-shadow fs-base mx-2 buylogin" data-id=""data-color=""   data-title="Buy Now" > <i class="ci-basket"></i></a>
                              
                                        
                                        <button
                                            class="btn btn-light btn-icon btn-shadow fs-base mx-2 addToCartt  @if ($saleProduct->quantity == 0) disabled @endif" data-size="{{ $saleProduct->size }}"
                                            data-id="{{ $saleProduct->id }}"
                                            data-color="{{ $saleProduct->color }}" type="button"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-title="Add to Cart" ><i
                                                class="ci-cart"></i></button>
                                    </div><a class="product-thumb-overlay"
                                        href="{{ route('productDetails', $saleProduct->id) }}"></a>
                                    <img src="{{ asset(json_decode($saleProduct->imageUrl)[0]) }}" alt="Product"
                                        class="first-img">
                                    @if (isset(json_decode($saleProduct->imageUrl)[1]))
                                        <img src="{{ asset(json_decode($saleProduct->imageUrl)[1]) }}}" alt="Product"
                                            class="second-img">
                                    @else
                                        <img src="{{ asset(json_decode($saleProduct->imageUrl)[0]) }}" alt="Product"
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





                    <!-- Product-->
                </div>
                <!-- Products grid-->
                <hr class="my-3">
                <!-- Pagination-->
                {{ $products->links('vendor.pagination.custom') }}
           {{--<nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#"><i class="ci-arrow-left me-2"></i>Prev</a>
                        </li>
                    </ul>
                    <ul class="pagination">
                        <li class="page-item d-sm-none"><span class="page-link page-link-static">1 / 5</span></li>
                        <li class="page-item active d-none d-sm-block" aria-current="page"><span
                                class="page-link">1<span class="visually-hidden">(current)</span></span></li>
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">2</a></li>
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">4</a></li>
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">5</a></li>
                    </ul>
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#" aria-label="Next">Next<i
                                    class="ci-arrow-right ms-2"></i></a></li>
                    </ul>
                </nav>--}}
            </div>
        </div>
    </div>
</section>
<!-- awesome finds -->
<section class=" border-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class=" h_title text-end">
                    <h1>Sponsored Items </h1>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Carousel-->
                <div class="tns-carousel tns-controls-static tns-controls-inner">
                    <div class="tns-carousel-inner"
                        data-carousel-options='{"items": 2, "controls": true, "nav": false, "autoHeight": true, "responsive": {"0":{"items":1},"500":{"items":2, "gutter": 18},"768":{"items":2, "gutter": 20}, "991":{"items":3, "gutter": 30}, "1368":{"items":5, "gutter": 30},"1500":{"items":6, "gutter": 30}}}'>
                        @foreach ($sponseredProducts1 as $saleProduct)
                            <div>
                                <div class="card product-card-alt">
                                    <span
                                        class="badge bg-primary badge-shadow">{{ $saleProduct->new == 1 ? 'New' : 'Best Seller' }}
                                    </span>

                                    <div class="product-thumb">
                                    <button class="btn-wishlist btn-sm" type="button" title="wishlist"><i class="ci-heart"></i></button>
                    <div class="product-card-actions">
                    <a href="{{route('checkout',$saleProduct->id)}}" class="btn btn-light btn-icon btn-shadow fs-base mx-2 buylogin" data-id=""data-color=""   data-title="Buy Now" > <i class="ci-basket"></i></a>
                  
                                            <button
                                                class="btn btn-light btn-icon btn-shadow fs-base mx-2 addToCartt @if ($saleProduct->quantity == 0) disabled @endif" data-size="{{ $saleProduct->size }}"
                                                data-id="{{ $saleProduct->id }}"
                                                data-color="{{ $saleProduct->color }}" type="button"
                                                  data-title="Add to Cart" ><i
                                                    class="ci-cart"></i></button>
                                        </div><a class="product-thumb-overlay"
                                            href="{{ route('productDetails', $saleProduct->id) }}"></a>
                                        <img src="{{ asset(json_decode($saleProduct->imageUrl)[0]) }}" alt="Product"
                                            class="first-img">
                                        @if (isset(json_decode($saleProduct->imageUrl)[1]))
                                            <img src="{{ asset(json_decode($saleProduct->imageUrl)[1]) }}}"
                                                alt="Product" class="second-img">
                                        @else
                                            <img src="{{ asset(json_decode($saleProduct->imageUrl)[0]) }}"
                                                alt="Product" class="second-img">
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
                                                href="{{ route('productDetails', $saleProduct->id) }}">{{ $saleProduct->name }}</a>
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
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- items on scoutin history -->
        <div class="row py-5">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Carousel-->
                <div class="tns-carousel tns-controls-static tns-controls-inner">
                    <div class="tns-carousel-inner"
                        data-carousel-options='{"items": 2, "controls": true, "nav": false, "autoHeight": true, "responsive": {"0":{"items":1},"500":{"items":2, "gutter": 18},"768":{"items":2, "gutter": 20}, "991":{"items":3, "gutter": 30}, "1368":{"items":5, "gutter": 30},"1500":{"items":6, "gutter": 30}}}'>
                        @foreach ($sponseredProducts2 as $saleProduct)
                            <div>
                                <div class="card product-card-alt">
                                    <span
                                        class="badge bg-primary badge-shadow">{{ $saleProduct->new == 1 ? 'New' : 'Best Seller' }}
                                    </span>

                                    <div class="product-thumb">
                                        <button class="btn-wishlist btn-sm wishList1"  data-id="{{ $saleProduct->id }}" data-price="{{ $saleProduct->price }}" data-type="1" data-title-left="Wishlist" type="button"><i class="ci-heart wishList"></i></button>
             
                                        <div class="product-card-actions">
                                            <a href=# class="btn btn-light btn-icon btn-shadow fs-base mx-2 BuyNow1"><i
                                                    class="ci-basket"></i>
                                            </a>
                                            <button
                                                class="btn btn-light btn-icon btn-shadow fs-base mx-2 addToCartt @if ($saleProduct->quantity == 0) disabled @endif" data-size="{{ $saleProduct->size }}"
                                                data-id="{{ $saleProduct->id }}"
                                                data-color="{{ $saleProduct->color }}" type="button"
                                                data-bs-toggle="tooltip" data-bs-placement="top" data-title="Add to Cart" ><i
                                                    class="ci-cart"></i></button>
                                        </div><a class="product-thumb-overlay"
                                            href="{{ route('productDetails', $saleProduct->id) }}"></a>
                                        <img src="{{ asset(json_decode($saleProduct->imageUrl)[0]) }}" alt="Product"
                                            class="first-img">
                                        @if (isset(json_decode($saleProduct->imageUrl)[1]))
                                            <img src="{{ asset(json_decode($saleProduct->imageUrl)[1]) }}}"
                                                alt="Product" class="second-img">
                                        @else
                                            <img src="{{ asset(json_decode($saleProduct->imageUrl)[0]) }}"
                                                alt="Product" class="second-img">
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
                                                href="{{ route('productDetails', $saleProduct->id) }}">{{ $saleProduct->name }}</a>
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
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class=" h_title">
                    <h1>Items you may like based on your ScoutiN history </h1>
                </div>
            </div>
        </div>
    </div>
</section>

 <!-- login message popup -->
         <div class="modal fade loginModal" id="modalDefault" tabindex="-1" role="dialog">
           <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content text-center">
               
               <div class="modal-body">
                 <img src="{{asset('project/public/website/img/LOGO.jpg')}}" alt="" class="img-fluid">
                 <div class="p-lg-3 bg-primary">


                   
                    <h2 class="text-white">Hi there! </h2>
                       
                    <h2 class="text-white">Please Sign In or Sign Up to SHOP</h2>
                        <a href="login.php" class="btn btn-light"><span class="ci-arrow-right"></span> Sign in page</a>


                 </div>

                 <p class="text-white text-start fs-sm pt-3">If you would like to sign up or sign in later, please go to the profile icon
                    <span class="ci-add-user" style="    background: #fff; padding: 4px;  color: #000; border-radius: 30%;"></span> at the top left of the page. Enjoy your browsing! </p>


               </div>
           
             </div>
           </div>
         </div>

@section('page-js')



   
   <script>
      function OpenWindow(){
        

       
            $('#modalDefault').modal('show');
        
      }
      $(document).ready(function(){
       
         setInterval("OpenWindow();", 10000);
      });

      
      

        $(document).ready(function() {
            
            categoryId = 0;
            //alert('hello saeema');


            function ajaxCallFilters(params) {
                // console.log(params);
                // console.log('categoryId ' + categoryId);
                // console.log("Brand " + getCurrentBrandValue());
                // console.log("Color " + getCurrentColorValue());
                // console.log("Size " + getCurrentSizeValue());
                // console.log("Price " + getCurrentPriceValue());

                params = {
                    'category_id': categoryId,
                    'Brand': getCurrentBrandValue(),
                    'Color': getCurrentColorValue(),
                    'Size': getCurrentSizeValue(),
                    'Price': getCurrentPriceValue(),
                    'sorting': $('#sorting').val(),
                    'new': $("input[name*='genradio']:checked").val()
                };
              //  alert(categoryId);
                $.ajax({
                    type: 'POST',
                    url: '/filter_data',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'data': params,
                    },
                    success: function(data) {
                        //alert("saima");
                        //console.log(data);
                        $('#shop_product').empty();
                        $('#shop_product').append(data.prod);
                    }
                });
            }

            function getCurrentBrandValue() {
                test = new Array();
                $("input[name='product_brand']:checked").each(function() {
                    test.push($(this).data('manh'));
                });
                return test;
            }

            function getCurrentSizeValue() {
                test = new Array();

                $("input[name='product_size']:checked").each(function() {
                    test.push($(this).data('manh'));
                });
                return test;
            }

            function getCurrentColorValue() {
                test = new Array();

                $("input[name='product_color']:checked").each(function() {
                    test.push($(this).data('manh'));
                });
                return test;
            }

            function getCurrentPriceValue() {
                var min_value = $(".range-slider-value-min").val();
                var max_value = $(".range-slider-value-max").val();

                var arr = {
                    'min_value': min_value,
                    'max_value': max_value
                };
                return arr;
            }

            // function getCurrentProduct


            $('.noUi-handle').on('change paste keyup click', function() {
                var min_value = $(".range-slider-value-min").val();
                var max_value = $(".range-slider-value-max").val();

                var arr = {
                    'min_value': min_value,
                    'max_value': max_value
                };
                ajaxCallFilters(arr);
            })



            $('input.product_brand').click(function() {
                var test = new Array();
                if ($(this).is(':checked')) {
                    var checkedOne = $(this).val()
                    var brand_checked = $(this).data('manh')

                    // Do some other action
                    $("input[name='product_brand']:checked").each(function() {
                        test.push($(this).data('manh'));
                    });

                } else {
                    $("input[name='product_brand']:checked").each(function() {
                        test.push($(this).data('manh'));
                    });


                }
                var arr = {
                    'product_brand': test
                };
                ajaxCallFilters(arr);
            });


            $('input.product_size').click(function() {
                var test = new Array();
                if ($(this).is(':checked')) {
                    var checkedOne = $(this).val();
                    var brand_checked = $(this).data('manh');
                    $("input[name='product_size']:checked").each(function() {
                        test.push($(this).data('manh'));
                    });
                } else {
                    $("input[name='product_size']:checked").each(function() {
                        test.push($(this).data('manh'));
                    });
                }
                var arr = {
                    'product_size': test
                };
                ajaxCallFilters(arr);

            });


            $('input.product_color').click(function() {
                var test = new Array();
                if ($(this).is(':checked')) {
                    var checkedOne = $(this).val()
                    var brand_checked = $(this).data('manh')


                    $("input[name='product_color']:checked").each(function() {
                        test.push($(this).data('manh'));
                    });
                } else {
                    $("input[name='product_color']:checked").each(function() {
                        test.push($(this).data('manh'));
                    });
                }
                var arr = {
                    'product_color': test
                };
                ajaxCallFilters(arr);

            });


            $('.widget-list-link').on('click', function() {
                var cat_id = $(this).attr('data-catID');
                categoryId = cat_id;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                var arr = {
                    'cat_id': cat_id
                };
                ajaxCallFilters(arr)
            })

            $('input.generalised').click(function() {
                var test = new Array();
                if ($(this).is(':checked')) {
                    var checkedOne = $(this).val()
                    var brand_checked = $(this).data('manh')


                    $("input[name='genradio']:checked").each(function() {
                        test.push($(this).data('manh'));
                    });
                } else {
                    $("input[name='genradio']:checked").each(function() {
                        test.push($(this).data('manh'));
                    });
                }
                var arr = {
                    'genradio': test
                };
                ajaxCallFilters(arr);

            });

            $('#sorting').change(function() {
                var val = $(this).val();
                ajaxCallFilters(val);
            })



        });

    </script>

@endsection

@extends('websiteLayout.footer')