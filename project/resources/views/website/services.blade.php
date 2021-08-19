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

                        <!-- Widget: Categories -->
                        <div class="widget widget-categories mb-4 pb-4 border-bottom">
                            <h3 class="widget-title"> Categories</h3>
                            <hr class="mb-3">
                            <div id="shop-categories" class="accordion">

                                <!-- Category with search bar and scrollbar (more items) -->
                           @foreach($categories as $category)
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


                                                <!-- Sub-categories -->
                                                <ul class="widget-list widget-filter-list pt-1" data-simplebar
                                                    data-simplebar-auto-hide="false">
                                                    @foreach ($category->subCat as $subCat)
                                                    <li class="widget-list-item widget-filter-item">
                                                        <a href="#"
                                                            class="widget-list-link d-flex justify-content-between align-items-center">
                                                            <span class="widget-filter-item-text"> {{ $subCat->name }}</span>
                                                            <span class="fs-xs text-muted ms-3">{{ count(
    App\Models\products::where('status', 1)->where('categoryId', $subCat->id)->get(),
) }}</span></a>
                                                    </li>
                                                    @endforeach
                                                 
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach    
                             
                                <!-- Add as many categories and sub-categories as you need -->
                            </div>
                        </div>

                        <div class="widget mb-4 pb-4 border-bottom">
                            <h3 class="widget-title">Price range</h3>
                            <div class="range-slider" data-start-min="250" data-start-max="680" data-min="0"
                                data-max="1000" data-step="1">
                                <div class="range-slider-ui"></div>
                                <div class="d-flex">
                                    <div class="w-50 pe-2 me-2">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text">$</span>
                                            <input class="form-control range-slider-value-min" type="text">
                                        </div>
                                    </div>
                                    <div class="w-50 ps-2">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text">$</span>
                                            <input class="form-control range-slider-value-max" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>






                    </div>
                </div>
            </aside>
            <!-- Content  -->
            <div class="col-lg-8">

                <!-- Products grid-->
                <div class="row mx-n2">
@foreach ($products as $service)

<div class="col-md-4 col-sm-6 px-2 mb-4">
    <div class="card product-card-alt mb-3">
        <div class="product-thumb">
      <div class="product-card-actions">
        
            </div><a class="product-thumb-overlay"
                href="{{ route('serviceDetails', $service->id) }}"></a>
            <img src="{{ asset(json_decode($service->imageUrl)[0]) }}" alt="Product"
                class="first-img">
            @if (isset(json_decode($service->imageUrl)[1]))
                <img src="{{ asset(json_decode($service->imageUrl)[1]) }}}" alt="Product"
                    class="second-img">
            @else
                <img src="{{ asset(json_decode($service->imageUrl)[0]) }}" alt="Product"
                    class="second-img">
            @endif
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                <div class="text-muted fs-xs me-1">By: <a class="product-meta fw-medium"
                        href="{{route('miniStore',$service->marketId)}}">{{ $service->mName }}</a></div>
                <?php $totalRatingss =
                App\Http\Controllers\Controller::rating($service->id); ?>
                <div class="star-rating"><i
                        class="star-rating-icon ci-star{{ $totalRatingss >= 1 ? '-filled active' : '' }}"></i><i
                        class="star-rating-icon ci-star{{ $totalRatingss >= 2 ? '-filled active' : '' }}"></i><i
                        class="star-rating-icon ci-star{{ $totalRatingss >= 3 ? '-filled active' : '' }}"></i><i
                        class="star-rating-icon ci-star{{ $totalRatingss >= 4 ? '-filled active' : '' }}"></i><i
                        class="star-rating-icon ci-star{{ $totalRatingss >= 5 ? '-filled active' : '' }}"></i>
                </div>
            </div>

            <h3 class="product-title  mb-2"><a
                    href="{{ route('productDetails', $service->id) }}">{{ $service->name }}</a>
            </h3>
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                @php
                    $price = explode('.', $service->price);
                @endphp
                <div class="fs-sm me-2"><i class="ci-download text-muted me-1"></i><?php echo $sales =
                    App\Http\Controllers\Controller::sales($service->id); ?><span class="fs-xs ms-1">Sales</span></div>
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
       
            </div>
        </div>
    </div>
</section>


@include('websiteLayout.footer')