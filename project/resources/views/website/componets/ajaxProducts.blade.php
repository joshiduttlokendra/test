{{-- @if(empty($products))
<h4>No Product found</h4>
@endif  --}}
@foreach ($products as $product)

<div class="col-md-4 col-sm-6 px-2 mb-4">

    <div class="card product-card-alt mb-3">

        <div class="product-thumb">

            <button class="btn-wishlist btn-sm" type="button"><i class="ci-heart"></i></button>

            <div class="product-card-actions">
                <a href="{{route('checkout',$product->id)}}" class="btn btn-light btn-icon btn-shadow fs-base mx-2 buylogin  @if ($product->quantity == 0) disabled @endif" 
                    data-id=""data-color=""   data-title=" @if ($product->quantity == 0) Product Not Available @else Buy Now @endif" > <i class="ci-basket"></i></a>

                        <button class="addToCartt btn btn-light btn-icon btn-shadow fs-base mx-2  @if ($product->quantity == 0) disabled @endif" 
                            data-size="{{ $product->size }}"
                                            data-id="{{ $product->id }}"
                                            data-color="{{ $product->color }}" type="button"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-title="Add to Cart"
                                             >
                                            <i  class="ci-cart"></i></button>

            </div>

            <a class="product-thumb-overlay"

                href="{{ route('productDetails', $product->id) }}"></a>

            <img src="{{ asset('project/public'.json_decode($product->imageUrl)[0]) }}" alt="Product"

                class="first-img">

            @if (isset(json_decode($product->imageUrl)[1]))

                <img src="{{ asset('project/public'.json_decode($product->imageUrl)[1]) }}}" alt="Product"

                    class="second-img">

            @else

                <img src="{{ asset('project/public'.json_decode($product->imageUrl)[0]) }}" alt="Product"

                    class="second-img">

            @endif

        </div>

        <div class="card-body">

            <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">

                <div class="text-muted fs-xs me-1">By: <a class="product-meta fw-medium"

                        href="#">{{ $product->mName }}</a></div>

                <div class="star-rating"><i

                        class="star-rating-icon ci-star-filled active"></i><i

                        class="star-rating-icon ci-star-filled active"></i><i

                        class="star-rating-icon ci-star-filled active"></i><i

                        class="star-rating-icon ci-star-filled active"></i><i

                        class="star-rating-icon ci-star"></i>

                </div>

            </div>



            <h3 class="product-title  mb-2"><a

                    href="{{ route('productDetails', $product->id) }}">{{ $product->name }}</a>

            </h3>

            <div class="d-flex flex-wrap justify-content-between align-items-center">

                <div class="fs-sm me-2"><i class="ci-download text-muted me-1"></i>109<span

                        class="fs-xs ms-1">Sales</span></div>

                @php

                    $price = explode('.', $product->price);

                @endphp

                <div class="bg-primary text-white rounded-1 py-1 px-2">

                    ${{ $price[0] }}.<small>{{ $price[1] }}</small></div>

            </div>

        </div>

    </div>

    <hr class="d-sm-none">

</div>

@endforeach

