@foreach ($products as $saleProduct)

<div class="col-md-4 col-sm-6 px-2 mb-4">
    <div class="card product-card-alt mb-3">
        <div class="product-thumb">
            <button class="btn-wishlist btn-sm" type="button"><i class="ci-heart"></i></button>
            <div class="product-card-actions">
            
            <a href="{{route('checkout',$saleProduct->id)}}">
                    <button class="btn btn-light btn-icon btn-shadow fs-base mx-2"><i
                        class="ci-basket" data-id=""
                    data-color="" type="button"
                    data-bs-toggle="tooltip" data-bs-placement="top" data-title="Buy Now" ></i></button></a>
                
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
