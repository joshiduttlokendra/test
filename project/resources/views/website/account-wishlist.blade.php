@include('websiteLayout.header')
@include('website.user.sidebar')
        <div class="col-lg-8">

          <div class="bg-white rounded-3 shadow-lg p-4 mb-5 mb-lg-0">
           <!-- Toolbar-->
         <div class="d-lg-flex justify-content-between align-items-center pt-lg-3 mb-3">
            <h4 class="fs-base  mb-0">My Wishlist</h4>
          </div>


            <!-- Wishlist-->
          <!-- Item-->
          
          
       @if(!empty($response1))
       <h1>Services</h1>
        @foreach($response1 as $res) 

          <div class="d-sm-flex justify-content-between mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
            <div class="d-block d-sm-flex align-items-start text-center text-sm-start"><a class="d-block flex-shrink-0 mx-auto me-sm-4" href="shop-single-v1.html" style="width: 10rem;">
            <img src="{{ asset(json_decode($res->imageUrl)[0]) }}" alt="Product"></a>
              <div class="pt-2">
                <h3 class="product-title fs-base mb-2"><a href="#">{{$res->name}}</a></h3>
                <div class="fs-sm"><span class="text-muted me-2">Description:</span>{{$res->description}}</div>
              </div>
            </div>
            <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
              <a href="{{route('remove-wishlist',$res->wid)}}" class="btn btn-outline-danger btn-sm"><i class="ci-trash me-2"></i>Remove</a>
            </div>
          </div>
        @endforeach
      @endif   

     
        @if(!empty($response))
        <h1>Products </h1>
        @foreach($response as $res) 

          <div class="d-sm-flex justify-content-between mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
            <div class="d-block d-sm-flex align-items-start text-center text-sm-start"><a class="d-block flex-shrink-0 mx-auto me-sm-4" href="shop-single-v1.html" style="width: 10rem;">
            <img src="{{ asset(json_decode($res->imageUrl)[0]) }}" alt="Product"></a>
              <div class="pt-2">
                <h3 class="product-title fs-base mb-2"><a href="#">{{$res->name}}</a></h3>
                <div class="fs-sm"><span class="text-muted me-2">Size:</span>{{$res->size}}</div>
                <div class="fs-sm"><span class="text-muted me-2">Color:</span>{{$res->color}}</div>
                <div class="fs-lg text-accent pt-2">${{$res->price}}<small>(${{$res->salePrice}})</small></div>
              </div>
            </div>
            <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
            <a href="{{route('remove-wishlist',$res->wid)}}" class="btn btn-outline-danger btn-sm"><i class="ci-trash me-2"></i>Remove</a>
            </div>
          </div>
        @endforeach 
      @endif  
        
        </div>
        </div>
      </div>
    </div>
</section>
@include('websiteLayout.footer')