@include('websiteLayout.header')
<section class="section-padding bg-secondary">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="bg-white rounded-3 shadow-lg p-4">

          <!-- Toolbar-->
          <div class=" d-lg-flex justify-content-between align-items-center pt-lg-3  mb-lg-3 border-bottom">
            <h4 class=" text-primary mb-3">List of items you added to wishlist:</h4><a class="btn btn-primary mb-3" href=""><i class="ci-sign-out me-2"></i>Sign out</a>
          </div>
         @if(!empty($response)) 
          @foreach ($response as $res)

         
          <!-- Wishlist-->

          <!-- Item-->
          <div class="d-sm-flex justify-content-between mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom" id="div{{$res['pDetail']->id}}">
            <div class="d-block d-sm-flex align-items-start text-center text-sm-start"><a class="d-block flex-shrink-0 mx-auto me-sm-4 border" href="{{ route('productDetails',$res['pDetail']->id) }}" style="width: 8rem;">
                <img src="{{ asset('project/public'.json_decode($res['pDetail']->imageUrl)[0]) }}" alt="Product"></a>
              <div class="pt-2">
                <h3 class="product-title fs-base mb-2"><a href="single-product.php">{{ $res['pDetail']->name }}</a></h3>
                {{-- <div class="fs-sm"><span class="text-muted me-2">Brand:</span>Tommy Hilfiger</div> --}}
                <div class="fs-sm"><span class="text-muted me-2">Color:</span>{{ $res['pDetail']->color }}</div>
                @php
                                            $price = explode('.', $res['pDetail']->salePrice);
                                            $price2 = explode('.', $res['pDetail']->price);
                                        @endphp
                @if($res['pDetail']->sale == 1)
                <div class="fs-lg text-accent pt-2">${{ $price[0] }}.<small>{{ $price[1] }}</small></div>
                @else
                <div class="fs-lg text-accent pt-2">${{ $price2[0] }}.<small>{{ $price2[1] }}</small></div>
                @endif
              </div>
            </div>
            <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
              <button class="btn btn-outline-danger btn-sm" type="button"><i class="ci-trash me-2"></i><span class="fs-sm deletewishlist"  data-id="{{ $res['pDetail']->id }} " data-type=1   data-divID="#itemDiv{{ $res['pDetail']->id }}">Remove</span></button>
                          <a href="{{route('checkout', $res['pDetail']->id)}}" class="btn btn-outline-danger btn-sm buylogin" data-id=""data-color=""    > <i class="ci-basket"></i><span class="fs-sm">Buy Now</span></a>
                              <button class="btn btn-outline-danger btn-sm addToCartt"  data-size="{{ $res['pDetail']->size }}" data-type=1 data-id="{{ $res['pDetail']->id }}" data-color="{{ $res['pDetail']->color }}" data-price="{{ $res['pDetail']->price }}"  type="button"   ><i class="ci-cart"></i><span class="fs-sm">Add to cart</span></button>
                          
            </div>
          </div>
          <!-- Item-->
          @endforeach
          @endif

        </div>
      </div>
    </div>
  </div>
</section>




@include('websiteLayout.footer')