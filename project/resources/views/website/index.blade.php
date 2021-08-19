@include('websiteLayout.header')

<?php 



function fileBrowse($id){
   $image = metaValue($id);
   $token = csrf_token();
   return '
      <img '.imageEditable('', $id).' src="'.asset('project/public/homepage/userfile/'.$image).'" width="100%">
      <form method="POST" action="'.route('uploadImage').'" class="'.$id.'" enctype="multipart/form-data" >
      
      <input type="hidden" name="_token" value="'.$token.'">
      <input type="hidden" name="key" value="'.$id.'" hidden>
      <input name="userfile" type="file" id="'.$id.'" class="uploadChange" hidden>
      </form>';
}


	function dataEditable($class, $id){
		
		if(Auth::check())
        {
            if(Auth::user()->roleId == 1) {
                return 'class="'.$class.' content-edit" contenteditable="true" key="'.$id.'" ';
            }
        }
        else
        {
            return 'class="'.$class.' content-edit" ';
        }
       
		
	}
	
	function imageEditable($class, $id){
		
        if(Auth::check()){
            if (Auth::user()->roleId == 1) {
                return 'class="'.$class.' dblImage" file_id="'.$id.'"';
            }
        }
       
	}

   function metaValue($key){
     
      $result = DB::table('meta')->where('meta_key',$key)->first();
    
    if(!empty($result)){
       return $result->meta_value;
    }else{
       return '';
    }
 }
?>
<?php session_start(); ?>


 @if(empty($_SESSION['welcome_pop1'])) 

   

  <div class="modal fade" tabindex="-1" role="dialog" id="welcomeModal">

    <div class="modal-dialog modal-dialog-centered " role="document">

      <div class="modal-content">

        <div class="modal-header">

           <h5 class=""></h5>

          <h5 class="modal-title"><img src="{{asset('website/img/logo.png')}}" alt="" class="img-fluid"></h5>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        </div>

        <div class="modal-body">

          <div class="content">

              <h2>Welcome</h2>

              <h2>Back</h2>



              <hr class="my-3" style="height: 3px;  width: 200px;  margin: auto;">



              <button class="btn btn-welcome" data-bs-dismiss="modal">Continue To Here</button>

          </div>

        </div>

       

      </div>

    </div>

  </div>


@endif

<?php $_SESSION["welcome_pop1"] = "welcome_pop"; ?>




<section class="bg-position-top-center bg-repeat-0 py-3 smallbanner">

   <div class="">

      <div class="container py-lg-3 my-lg-3">

         <div class="row">

          <div class="col-lg-12 col-md-12 text-center ">

               <h1 class="text-white lh-base  text-uppercase">
               
   

              
                  <span <?=dataEditable('fw-light', 'first_heading');?>><?=metaValue('first_heading')?></span>
                  <br>
                  
                  <span <?=dataEditable('fw-light', 'sec_heading');?>><?=metaValue('sec_heading')?></span>
             
               
               </h1>

               <h2 <?=dataEditable('h5 text-white fw-light font-italic', 'Statements');?>><?=metaValue('Statements')?></h2>


         </div>

      </div>

   </div>

</section>

<section class="slider-area">

   <div class="container-fluid p-0">

      <div class="tns-carousel banner-slider tns-controls-static tns-nav-enabled tns-nav-light tns-nav-inside">

         <div class="tns-carousel-inner" >

            @foreach($slider as $slide)

            <img src="{{asset('image/'.$slide->image)}}" alt="Alt text" class="img-fluid">

            @endforeach

         </div>

      </div>

   </div>

</section>



<!-- Featured products (Carousel)-->

<section class="section-padding sales-product " >

   <div class="container-fluid position-relative " >

      <div class="row">

         <div class="col-lg-1 col-md-2 col-12">

            <div class="vertical-title">

               <!--<h1> S </h1>-->

               <!--<h1>  A</h1>-->

               <!--<h1>  L</h1>-->

               <!--<h1>  E</h1>-->
               
                       <h1 <?=dataEditable('fw-light', 'sale');?>><?=metaValue('sale')?></h1>

            </div>

         </div>

         <div class="col-lg-11 col-md-10 col-12">

            <!-- Carousel-->

            <div class="tns-carousel tns-controls-static tns-controls-outside">

               <div class="tns-carousel-inner" data-carousel-options='{"items": 2, "controls": true, "nav": true, "autoHeight": true, "responsive": {"0":{"items":1},"500":{"items":2, "gutter": 18},"768":{"items":3, "gutter": 20}, "1100":{"items":4, "gutter": 30}, "1368":{"items":5, "gutter": 30}}}'>

                  @if(!empty($saleProducts))

                  @foreach ($saleProducts as $saleProduct)
         
                  <!-- Product-->

                  <div>

                     <div class="card product-card-alt">

                        <span class="badge bg-primary badge-shadow">{{ $saleProduct->new == 1 ? 'New':'Best Seller' }} </span>

                        <div class="product-thumb">

                     <button class="btn-wishlist btn-sm wishList1"  data-id="{{ $saleProduct->id }}" data-price="{{ $saleProduct->price }}" data-type="1" data-title-left="Wishlist" type="button"><i class="ci-heart wishList"></i></button>
             
                           <div class="product-card-actions">

                              <a href="@if(Auth::check()){{route('checkout',$saleProduct->id)}}@else javascript:void(0); @endif" class="btn btn-light btn-icon btn-shadow fs-base mx-2 buylogin" data-id="" data-color="" onclick="@if(Auth::check()) @else toastr.error('please login First'); @endif"  data-title="Buy Now" > <i class="ci-basket"></i></a>
                              {{--  <a href="{{route('checkout',$saleProduct->id)}}" class="btn btn-light btn-icon btn-shadow fs-base mx-2 buylogin" data-id=""data-color=""   data-title="Buy Now" > <i class="ci-basket"></i></a>  --}}

                              <button class="btn btn-light btn-icon btn-shadow fs-base mx-2 addToCartt @if($saleProduct->quantity == 0) disabled @endif" data-size="{{ $saleProduct->size }}"  data-id="{{ $saleProduct->id }}" data-color="{{ $saleProduct->color }}" data-price="{{ $saleProduct->price }}" data-type="{{ $saleProduct->type }}" type="button"  data-title="Add to Cart" ><i class="ci-cart"></i></button>

                           </div>
                      

                           <a class="product-thumb-overlay" href="{{ route('productDetails',$saleProduct->id) }}"></a>

                           <img src="{{  asset('project/public'.json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="first-img">
                       
                      
                           @if(isset(json_decode($saleProduct->imageUrl)[1]))

                           <img src="{{ asset('project/public'.json_decode($saleProduct->imageUrl)[1]) }}" alt="Product" class="second-img">

                           @else

                           <img src="{{  asset('project/public'.json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="second-img">

                           @endif
                    
                        </div>

                        <div class="card-body">

                           <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">

                              <div class="text-muted fs-xs me-1">By: <a class="product-meta fw-medium" href="{{route('miniStore' , $saleProduct->mid)}}">{{  $saleProduct->mName }}</a></div>

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

                  @endif

               </div>

            </div>

         </div>

      </div>

   </div>

</section>
@if(!empty($buyAgain))
@if(Auth::id())

<!-- Featured products (Carousel)-->

<section class="section-padding buy-again" >

   <div class="container-fluid position-relative " >

      <div class="row">

         <div class="col-lg-2 col-md-2 col-12">

            <div class="greenbox border-0">

               <div class="h_title">

                  <h1>Buy  Again</h1>

                  </h1>

               </div>

            </div>

         </div>

         <div class="col-lg-8 col-md-8 col-12">

            <!-- Carousel-->

            <div class="tns-carousel tns-controls-static tns-controls-outside">

               <div class="tns-carousel-inner" data-carousel-options='{"items": 2, "controls": true, "nav": true, "autoHeight": true, "responsive": {"0":{"items":1},"500":{"items":2, "gutter": 18},"768":{"items":3, "gutter": 20}, "1100":{"items":4, "gutter": 30}, "1368":{"items":4, "gutter": 30}}}'>

                 

                  @foreach ($buyAgain as $saleProduct)

                  <!-- Product-->

                  <div>

                     <div class="card product-card-alt">

                        <span class="badge bg-primary badge-shadow">{{ $saleProduct->new == 1 ? 'New':'Best Seller' }} </span>

                        <div class="product-thumb">

                         <button class="btn-wishlist btn-sm wishList1"  data-id="{{ $saleProduct->id }}" data-price="{{$saleProduct->price}}" data-type="1" data-title-left="Wishlist" type="button"><i class="ci-heart wishList"></i></button>
  
                           <div class="product-card-actions">
                              <a href="@if(Auth::check()){{route('checkout',$saleProduct->id)}}@else javascript:void(0); @endif" class="btn btn-light btn-icon btn-shadow fs-base mx-2 buylogin" data-id="" data-color="" onclick="@if(Auth::check()) @else toastr.error('please login First'); @endif"  data-title="Buy Now" > <i class="ci-basket"></i></a>
                              
                              {{--  <a class="btn btn-light btn-icon btn-shadow fs-base mx-2" href="{{route('checkout',$saleProduct->id)}}"><i class="ci-basket"></i></a>  --}}

                              <button class="btn btn-light btn-icon btn-shadow fs-base mx-2 addToCartt @if($saleProduct->quantity == 0) disabled @endif" data-size="{{ $saleProduct->size }}" data-id="{{ $saleProduct->id }}" data-type="{{ $saleProduct->type }}" data-color="{{ $saleProduct->color }}" data-price="{{ $saleProduct->price }}" type="button"  data-title="Add to Cart" ><i class="ci-cart"></i></button>

                           </div>

                           <a class="product-thumb-overlay" href="{{ route('productDetails',$saleProduct->id) }}"></a>

                           <img src="{{  asset('project/public/'.json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="first-img">

                           @if(isset(json_decode($saleProduct->imageUrl)[1]))

                           <img src="{{ asset('project/public/'.json_decode($saleProduct->imageUrl)[1]) }}" alt="Product" class="second-img">

                           @else

                           <img src="{{  asset('project/public/'.json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="second-img">

                           @endif

                        </div>

                        <div class="card-body">

                           <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">

                              <div class="text-muted fs-xs me-1">By: <a class="product-meta fw-medium" href="{{route('miniStore',$saleProduct->mid)}}">{{  $saleProduct->mName }}</a></div>

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


                  <!-- Product-->

                  <!-- Product-->

               </div>

            </div>

         </div>

         <div class="col-lg-2 col-md-2 col-12">

            <div class="coupen-box">

               <h2 class="text-primary text-center">cLiCk & sAvE</h2>

               <div class="position-relative bg-size-cover bg-position-center  bg-white shadow-sm" style="border: 2px solid #43681c;">

                  <div class="py-2 my-2 px-2 text-center position-relative">

                     <div class="py-1">

                        <h2>25% OFF</h2>

                        <h5>Swim Suits At <b>CODEX ONLY </b></h5>

                        <p class="fs-sm  text-primary">With purchased over $500</p>

                        <a class="btn btn-primary btn-shadow btn-sm" href="#">Copy Code</a>

                     </div>

                  </div>

               </div>

            </div>

            <div class="position-relative bg-size-cover bg-position-center mt-1 bg-white shadow-sm" style="border: 2px solid #43681c;">

               <div class="row g-0">

                  <div class="col-xl-4 col-lg-4">

                     <img src="img/content/sanitizer.png" class="rounded-start" alt="Card image" style="height: 100px;width: 100%;">

                  </div>

                  <div class="col-xl-8 col-lg-8">

                     <div class="card-body">

                        <h6 class="card-title mb-0">10% OFF</h6>

                        <p class="fs-sm  text-primary mb-0">Hand Sanitizer at Zusv</p>

                        <a class="btn btn-primary btn-shadow btn-sm" href="#">Copy </a>

                     </div>

                  </div>

               </div>

            </div>

         </div>

      </div>

   </div>

</section>

@endif
@endif

<section class="section-padding seasonal-items pt-0">

   <div class="container-fluid p-0">

      <div class="green-strip">

         <div class="arrow-img"><img src="{{ asset('website/img/content/left-arrow.png') }}" alt=""></div>

             <h3 <?=dataEditable('mb-0 px-3 text-uppercase', 'seasonal_items');?> ><?=metaValue('seasonal_items')?></h3>
             <div class="arrow-img"><img src="{{ asset('website/img/content/right-arrow.png') }}" alt=""></div>

      </div>

      <div class="row g-0">

         <div class="col-lg-12">

            <div class="tns-carousel tns-controls-static tns-controls-inner">

               <div class="tns-carousel-inner" data-carousel-options='{"items": 2, "controls": true, "nav": true, "autoHeight": true,
               "responsive": {"0":{"items":1},"500":{"items":2, "gutter": 18},"768":{"items":2, "gutter": 20}, "991":{"items":3, "gutter": 20}, "1368":{"items":4, "gutter": 20}, "1400":{"items":5, "gutter": 20}}}'>

                  @if(!empty($seasonProducts))

                  @foreach ($seasonProducts as $saleProduct)

                  <!-- Product-->

                  <div>

                     <div class="card product-card-alt">

                        <span class="badge bg-primary badge-shadow">{{ $saleProduct->new == 1 ? 'New':'Best Seller' }} </span>

                        <div class="product-thumb">

                            <button class="btn-wishlist btn-sm wishList1"  data-id="{{ $saleProduct->id }}" data-price="{{ $saleProduct->price }}" data-type="1" data-title-left="Wishlist" type="button"><i class="ci-heart wishList"></i></button>
             
                           <div class="product-card-actions">

                              <a href="@if(Auth::check()){{route('checkout',$saleProduct->id)}}@else javascript:void(0); @endif" class="btn btn-light btn-icon btn-shadow fs-base mx-2 buylogin" data-id="" data-color="" onclick="@if(Auth::check()) @else toastr.error('please login First'); @endif"  data-title="Buy Now" > <i class="ci-basket"></i></a>
                              {{--  <a href="{{route('checkout',$saleProduct->id)}}" class="btn btn-light btn-icon btn-shadow fs-base mx-2 buylogin" data-id=""data-color=""   data-title="Buy Now" > <i class="ci-basket"></i></a>  --}}

                              <button class="btn btn-light btn-icon btn-shadow fs-base mx-2 addToCartt @if($saleProduct->quantity == 0) disabled @endif" data-size="{{ $saleProduct->size }}" data-type="{{ $saleProduct->type }}" data-id="{{ $saleProduct->id }}" data-color="{{ $saleProduct->color }}" data-price="{{ $saleProduct->price }}" type="button"  data-title="Add to Cart" ><i class="ci-cart"></i></button>

                           </div>

                           <a class="product-thumb-overlay" href="{{ route('productDetails',$saleProduct->id) }}"></a>

                           <img src="{{  asset('project/public/'.json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="first-img">

                           @if(isset(json_decode($saleProduct->imageUrl)[1]))

                           <img src="{{ asset('project/public/'.json_decode($saleProduct->imageUrl)[1]) }}" alt="Product" class="second-img">

                           @else

                           <img src="{{  asset('project/public/'.json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="second-img">

                           @endif

                        </div>

                        <div class="card-body">

                           <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">

                              <div class="text-muted fs-xs me-1">By: <a class="product-meta fw-medium" href="{{route('miniStore', $saleProduct->mid)}}">{{  $saleProduct->mName }}</a></div>

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

                  @endif

               </div>

            </div>

         </div>

      </div>

   </div>

   <!-----banner----->

   <div class="container py-3">

      <div class="row">

         <div class="col-lg-12 col-12">

            <div class="overflow-hidden position-relative">

               <div class="d-flex flex-column py-5 shopad-box justify-content-center bg-size-cover bg-position-center rounded-3" style="background-image: url(website/img/blog/banner-bg.jpg);">

                  <div class="py-4 my-2 px-4 text-center">

                     <div class="py-1">

                        <h1 class="mb-2">Your Add Banner Hello</h1>

                        <p class="fs-sm text-muted">Hurry up to reserve your spot</p>

                        <a class="btn btn-primary btn-shadow btn-sm" href="">Shop with us</a>

                     </div>

                  </div>

               </div>

            </div>

            <!---end banner----->

         </div>

      </div>

   </div>

</section>

<section class="weeks-banner">

   <div class="container-fluid px-0">

      <figure class="weekimg">

            <!-- <img src="{{ asset('website/img/content/week.png') }}" alt="" class="img-fluid"> -->
         <?=fileBrowse('featured_img')?>
      </figure>

      <div class="green-strip">

         <div class="arrow-img"><img src="{{ asset('website/img/content/left-arrow.png') }}" alt=""></div>
        <h3 <?=dataEditable('mb-0 px-3', 'featured_items');?>><?=metaValue('featured_items')?></h3>
         <!--<h3 class="mb-0 px-3">THIS WEEK’S FEATURED ITEMS</h3>-->

         <div class="arrow-img"><img src="{{ asset('website/img/content/right-arrow.png') }}" alt=""></div>

      </div>

   </div>

</section>



<section class="section-padding advert-area">

   <div class="container-fluid">

      <div class="row justify-content-between">

         <!-- Banner with controls-->

         <div class="col-lg-6 col-md-6 overflow-hidden">

            <div class="d-flex flex-column h-100 shopad-box justify-content-center bg-size-cover bg-position-center rounded-3" style="background-image: url(website/img/blog/banner-bg.jpg);">

               <div class="py-4 my-2 px-4 text-center">

                  <div class="py-1">

                     <h1 class="mb-2">Your Add Banner Here</h1>

                     <p class="fs-sm text-muted">Hurry up to reserve your spot</p>

                     <a class="btn btn-primary btn-shadow btn-sm" href="">Shop with us</a>

                  </div>

               </div>

            </div>

         </div>

         <!---end banner-->

         <!-- Product grid (carousel)-->

         <div class="col-lg-5 col-md-6 pt-4 pt-md-0">

            <div class="tns-carousel tns-controls-static tns-controls-outside">

               <div class="tns-carousel-inner" data-carousel-options='{"nav": false,"responsive": {"0":{"items":1},"500":{"items":2, "gutter": 18},"768":{"items":2, "gutter": 20}, "1100":{"items":2, "gutter": 24}}}'>

                  <!-- Carousel item-->

                  @if(!empty($featuredProducts))

                  @foreach ($featuredProducts as $featuredProduct)

                  <div>

                     <div class="card product-card-alt">

                        <span class="badge bg-primary badge-shadow">{{ $saleProduct->new == 1 ? 'New':'Best Seller' }} </span>

                        <div class="product-thumb">

                                            <button class="btn-wishlist btn-sm wishList1"  data-id="{{ $saleProduct->id }}" data-price="{{ $saleProduct->price }}" data-type="1" data-title-left="Wishlist" type="button"><i class="ci-heart wishList"></i></button>
   
                           <div class="product-card-actions">
                              <a href="@if(Auth::check()){{route('checkout',$saleProduct->id)}}@else javascript:void(0); @endif" class="btn btn-light btn-icon btn-shadow fs-base mx-2 buylogin" data-id="" data-color="" onclick="@if(Auth::check()) @else toastr.error('please login First'); @endif"  data-title="Buy Now" > <i class="ci-basket"></i></a>

                              {{--  <a href="{{route('checkout',$saleProduct->id)}}" class="btn btn-light btn-icon btn-shadow fs-base mx-2 buylogin" data-id=""data-color=""   data-title="Buy Now" > <i class="ci-basket"></i></a>  --}}

                              <button class="btn btn-light btn-icon btn-shadow fs-base mx-2 addToCartt @if($saleProduct->quantity == 0) disabled @endif"
                                  data-size="{{ $saleProduct->size }}" data-type="{{ $saleProduct->type }}" data-id="{{ $saleProduct->id }}" data-color="{{ $saleProduct->color }}" data-price="{{ $saleProduct->price }}" type="button"  data-title="Add to Cart" ><i class="ci-cart"></i></button>

                           </div>

                           <a class="product-thumb-overlay" href="{{ route('productDetails',$saleProduct->id) }}"></a>

                           <img src="{{  asset('project/public/'.json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="first-img">

                           @if(isset(json_decode($saleProduct->imageUrl)[1]))

                           <img src="{{ asset('project/public/'.json_decode($saleProduct->imageUrl)[1]) }}" alt="Product" class="second-img">

                           @else

                           <img src="{{  asset('project/public/'.json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="second-img">

                           @endif

                        </div>

                        <div class="card-body">

                           <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">

                              <div class="text-muted fs-xs me-1">By: <a class="product-meta fw-medium" href="{{route('miniStore',$saleProduct->mid)}}">{{  $saleProduct->mName }}</a></div>

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

                  @endif

                  <!-- Carousel item-->

               </div>

            </div>

            <div class="h_title text-end">

               <!--<h1>Things may you like</h1>-->
  <h1 <?=dataEditable('fw-light', 'things_may_you_like');?>><?=metaValue('things_may_you_like')?></h1>
            </div>

         </div>

      </div>

   </div>

</section>

<!-- made in caribbean -->

<section class=" caribbean-area">

   <div class="container-fluid">

      <div class="row">

         <div class="col-md-5">

            <!--<h1 class="text-primary"><b>MADE IN CARIBBEAN</b></h1>-->
  <h1 <?=dataEditable('text-primary', 'caribben');?>><?=metaValue('caribben')?></h1>

         </div>

      </div>

   </div>

   <div class="container-fluid bg-primary">

      <div class="row">

         <div class="col-md-5">

            <div class="caribbean-img">

                   <!-- <img src="{{ asset('website/img/content/caribbean.png') }}" alt="" class="img-fluid"> -->
               <?=fileBrowse('c_img')?>
            </div>

         </div>

         <!-- Product grid (carousel)-->

         <div class="col-md-7 py-5">

            <div class="tns-carousel">

               <div class="tns-carousel-inner"   data-carousel-options='{"nav": false, "responsive": {"0":{"items":1},"500":{"items":2, "gutter": 18},"768":{"items":3, "gutter": 20}, "1100":{"items":4, "gutter": 24}}}'>

                  <!-- Carousel item-->

                  @if(!empty($caribbeanProducts))

                  @foreach ($caribbeanProducts as $saleProduct)

                  <div>

                     <div class="card product-card-alt">

                        <span class="badge bg-primary badge-shadow">{{ $saleProduct->new == 1 ? 'New':'Best Seller' }} </span>

                        <div class="product-thumb">

                            <button class="btn-wishlist btn-sm wishList1"  data-id="{{ $saleProduct->id }}" data-price="{{ $saleProduct->price }}" data-type="1" data-title-left="Wishlist" type="button"><i class="ci-heart wishList"></i></button>
             
                           <div class="product-card-actions">

                              <a href="@if(Auth::check()){{route('checkout',$saleProduct->id)}}@else javascript:void(0); @endif" class="btn btn-light btn-icon btn-shadow fs-base mx-2 buylogin" data-id="" data-color="" onclick="@if(Auth::check()) @else toastr.error('please login First'); @endif"  data-title="Buy Now" > <i class="ci-basket"></i></a>

                              {{--  <a href="{{route('checkout',$saleProduct->id)}}" class="btn btn-light btn-icon btn-shadow fs-base mx-2 buylogin" data-id=""

                                 data-color=""   data-title="Buy Now" > <i class="ci-basket"></i>

                              </a>  --}}

                              <button class="btn btn-light btn-icon btn-shadow fs-base mx-2 addToCartt @if($saleProduct->quantity == 0) disabled @endif" data-size="{{ $saleProduct->size }}" data-type="{{ $saleProduct->type }}" data-id="{{ $saleProduct->id }}" data-color="{{ $saleProduct->color }}" data-price="{{ $saleProduct->price }}" type="button"  data-title="Add to Cart" ><i class="ci-cart"></i></button>

                           </div>

                           <a class="product-thumb-overlay" href="{{ route('productDetails',$saleProduct->id) }}"></a>

                           <img src="{{  asset('project/public/'.json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="first-img">

                           @if(isset(json_decode($saleProduct->imageUrl)[1]))

                           <img src="{{ asset('project/public/'.json_decode($saleProduct->imageUrl)[1]) }}" alt="Product" class="second-img">

                           @else

                           <img src="{{  asset('project/public/'.json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="second-img">

                           @endif

                        </div>

                        <div class="card-body">

                           <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">

                              <div class="text-muted fs-xs me-1">By: <a class="product-meta fw-medium" href="{{route('miniStore',$saleProduct->mid)}}">{{  $saleProduct->mName }}</a></div>

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

                  @endif

               </div>

            </div>

         </div>

      </div>

   </div>

</section>

<!-- awesome finds -->

<section class="section-padding awesome-block py-3">

   <div class="container-fluid">

      <div class="row">

         <div class="col-lg-12">

            <div class=" h_title text-end">

                <!-- <h1>Sponsored Items </h1> -->
               <h1 <?=dataEditable('', 'sponsored_items');?>><?=metaValue('sponsored_items')?></h1>

            </div>

         </div>

         <div class="col-lg-12 col-md-12 col-12">

            <!-- Carousel-->

            <div class="tns-carousel tns-controls-static tns-controls-inner">

               <div class="tns-carousel-inner" data-carousel-options='{"items": 2, "controls": true, "nav": true, "autoHeight": true, "responsive": {"0":{"items":1},"500":{"items":2, "gutter": 18},"768":{"items":2, "gutter": 20}, "991":{"items":3, "gutter": 20}, "1368":{"items":5, "gutter": 20},"1440":{"items":6, "gutter": 20}}}'>

                  @if(!empty($sponseredProducts))

                  @foreach ($sponseredProducts as $saleProduct)

                  <div>

                     <div class="card product-card-alt">

                        <span class="badge bg-primary badge-shadow">{{ $saleProduct->new == 1 ? 'New':'Best Seller' }} </span>

                        <div class="product-thumb">

                            <button class="btn-wishlist btn-sm wishList1"  data-id="{{ $saleProduct->id }}" data-price="{{ $saleProduct->price }}" data-type="1" data-title-left="Wishlist" type="button"><i class="ci-heart wishList"></i></button>
   
                           <div class="product-card-actions">
                              <a href="@if(Auth::check()){{route('checkout',$saleProduct->id)}}@else javascript:void(0); @endif" class="btn btn-light btn-icon btn-shadow fs-base mx-2 buylogin" data-id="" data-color="" onclick="@if(Auth::check()) @else toastr.error('please login First'); @endif"  data-title="Buy Now" > <i class="ci-basket"></i></a>

                              {{--  <a href="{{route('checkout',$saleProduct->id)}}" class="btn btn-light btn-icon btn-shadow fs-base mx-2 buylogin" data-id=""data-color=""   data-title="Buy Now" > <i class="ci-basket"></i></a>  --}}

                              <button class="btn btn-light btn-icon btn-shadow fs-base mx-2 addToCartt @if($saleProduct->quantity == 0) disabled @endif" data-size="{{ $saleProduct->size }}" data-type="{{ $saleProduct->type }}" data-id="{{ $saleProduct->id }}" data-color="{{ $saleProduct->color }}" data-price="{{ $saleProduct->price }}" type="button"  data-title="Add to Cart" ><i class="ci-cart"></i></button>

                           </div>

                           <a class="product-thumb-overlay" href="{{ route('productDetails',$saleProduct->id) }}"></a>

                           <img src="{{  asset('project/public/'.json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="first-img">

                           @if(isset(json_decode($saleProduct->imageUrl)[1]))

                           <img src="{{ asset('project/public/'.json_decode($saleProduct->imageUrl)[1]) }}" alt="Product" class="second-img">

                           @else

                           <img src="{{  asset('project/public/'.json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="second-img">

                           @endif

                        </div>

                        <div class="card-body">

                           <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">

                              <div class="text-muted fs-xs me-1">By: <a class="product-meta fw-medium" href="{{route('miniStore',$saleProduct->mid)}}">{{  $saleProduct->mName }}</a></div>

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

                  @endif

               </div>

            </div>

         </div>

      </div>

   </div>

</section>

<section class="section-padding advert-area">

   <div class="container-fluid">

      <div class="row">

         <div class="col-lg-4 col-md-4">

            <div class="overflow-hidden h-100">

               <div class="d-flex flex-column h-100 justify-content-center shopad-box bg-size-cover bg-position-center rounded-3" style="background-image: url({{ asset('website/img/blog/banner-bg.jpg') }});">

                  <div class="py-4 my-2 px-4 text-center">

                     <div class="py-1">

                        <h1 class="mb-2">Your Add Banner Here</h1>

                        <p class="fs-sm text-muted">Hurry up to reserve your spot</p>

                        <a class="btn btn-primary btn-shadow btn-sm" href="{{ route('shop','main') }}">Shop with us</a>

                     </div>

                  </div>

               </div>

            </div>

         </div>

         <!----===================================================-->

         <div class="col-lg-8 col-md-8">

            <div class="awesome-fslider">

               <div class="tns-carousel tns-controls-static tns-controls-inner">

                  <div class="tns-carousel-inner" data-carousel-options='{"nav": false,"responsive": {"0":{"items":1},"500":{"items":2, "gutter": 18},"768":{"items":2, "gutter": 20}, "1200":{"items":4, "gutter": 20}, "1100":{"items":3, "gutter": 20}, "1200":{"items":4, "gutter": 20}}}'>

                     @if(!empty($saleProducts))

                     @foreach ($saleProducts as $saleProduct)

                     <div>

                        <div class="card product-card-alt">

                           <span class="badge bg-primary badge-shadow">{{ $saleProduct->new == 1 ? 'New':'Best Seller' }} </span>

                           <div class="product-thumb">

                               <button class="btn-wishlist btn-sm wishList1"  data-id="{{ $saleProduct->id }}" data-price="{{ $saleProduct->price }}" data-type="1" data-title-left="Wishlist" type="button"><i class="ci-heart wishList"></i></button>
             
                              <div class="product-card-actions">
                              
                                 <a href="@if(Auth::check()){{route('checkout',$saleProduct->id)}}@else javascript:void(0); @endif" class="btn btn-light btn-icon btn-shadow fs-base mx-2 buylogin" data-id="" data-color="" onclick="@if(Auth::check()) @else toastr.error('please login First'); @endif"  data-title="Buy Now" > <i class="ci-basket"></i></a>

                                 {{--  <a href="{{route('checkout',$saleProduct->id)}}" class="btn btn-light btn-icon btn-shadow fs-base mx-2 buylogin" data-id=""data-color=""   data-title="Buy Now" > <i class="ci-basket"></i></a>  --}}

                                 <button class="btn btn-light btn-icon btn-shadow fs-base mx-2 addToCartt @if($saleProduct->quantity == 0) disabled @endif" data-size="{{ $saleProduct->size }}" data-type="{{ $saleProduct->type }}" data-id="{{ $saleProduct->id }}" data-color="{{ $saleProduct->color }}" data-price="{{ $saleProduct->price }}" type="button"  data-title="Add to Cart" ><i class="ci-cart"></i></button>

                              </div>

                              <a class="product-thumb-overlay" href="{{ route('productDetails',$saleProduct->id) }}"></a>

                              <img src="{{  asset('project/public/'.json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="first-img">

                              @if(isset(json_decode($saleProduct->imageUrl)[1]))

                              <img src="{{ asset('project/public/'.json_decode($saleProduct->imageUrl)[1]) }}" alt="Product" class="second-img">

                              @else

                              <img src="{{  asset('project/public/'.json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="second-img">

                              @endif

                           </div>

                           <div class="card-body">

                              <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">

                                 <div class="text-muted fs-xs me-1">By: <a class="product-meta fw-medium" href="{{route('miniStore',$saleProduct->mid)}}">{{  $saleProduct->mName }}</a></div>

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

                     @endif

                  </div>

               </div>

            </div>

            {{-- 

         </div>

         --}}

         <!----===================================================-->

         <div class=" h_title text-end">

            <!--<h1>Trending Items</h1>-->

           <h1 <?=dataEditable('', 'trending_items');?>><?=metaValue('trending_items')?></h1>
           
         </div>

         <div class="awesome-fslider">

            <div class="tns-carousel tns-controls-static tns-controls-inner">

               <div class="tns-carousel-inner" data-carousel-options='{"nav": false,"responsive": {"0":{"items":1},"500":{"items":2, "gutter": 18},"768":{"items":2, "gutter": 20}, "1100":{"items":3, "gutter": 20},"1368":{"items":4, "gutter": 20}}}'>

                  @if(!empty($saleProducts))

                  @foreach ($saleProducts as $saleProduct)

                  <div>

                     <div class="card product-card-alt">

                        <span class="badge bg-primary badge-shadow">{{ $saleProduct->new == 1 ? 'New':'Best Seller' }} </span>

                        <div class="product-thumb">

                         <button class="btn-wishlist btn-sm wishList1"  data-id="{{ $saleProduct->id }}" data-price="{{ $saleProduct->price }}" data-type="1" data-title-left="Wishlist" type="button"><i class="ci-heart wishList"></i></button>
   
                           <div class="product-card-actions">

                              <a href="@if(Auth::check()){{route('checkout',$saleProduct->id)}}@else javascript:void(0); @endif" class="btn btn-light btn-icon btn-shadow fs-base mx-2 buylogin" data-id="" data-color="" onclick="@if(Auth::check()) @else toastr.error('please login First'); @endif"  data-title="Buy Now" > <i class="ci-basket"></i></a>
                              {{--  <a href="{{route('checkout',$saleProduct->id)}}" class="btn btn-light btn-icon btn-shadow fs-base mx-2 buylogin" data-id=""data-color=""   data-title="Buy Now" > <i class="ci-basket"></i></a>  --}}

                              <button class="btn btn-light btn-icon btn-shadow fs-base mx-2 addToCartt @if($saleProduct->quantity == 0) disabled @endif" data-size="{{ $saleProduct->size }}" data-type="{{ $saleProduct->type }}" data-id="{{ $saleProduct->id }}" data-color="{{ $saleProduct->color }}" data-price="{{ $saleProduct->price }}" type="button"  data-title="Add to Cart" ><i class="ci-cart"></i></button>

                           </div>

                           <a class="product-thumb-overlay" href="{{ route('productDetails',$saleProduct->id) }}"></a>

                           <img src="{{  asset('project/public/'.json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="first-img">

                           @if(isset(json_decode($saleProduct->imageUrl)[1]))

                           <img src="{{ asset('project/public/'.json_decode($saleProduct->imageUrl)[1]) }}" alt="Product" class="second-img">

                           @else

                           <img src="{{  asset('project/public/'.json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="second-img">

                           @endif

                        </div>

                        <div class="card-body">

                           <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">

                              <div class="text-muted fs-xs me-1">By: <a class="product-meta fw-medium" href="{{route('miniStore',$saleProduct->mid)}}">{{  $saleProduct->mName }}</a></div>

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

                  @endif

               </div>

            </div>

         </div>

      </div>

   </div>

   {{-- 

   <div class="awesome-fslider">

      <div class="tns-carousel tns-controls-static tns-controls-inner">

         <div class="tns-carousel-inner" data-carousel-options='{"items": 2, "controls": true, "nav": true, "autoHeight": true, "responsive": {"0":{"items":1},"500":{"items":2, "gutter": 18},"768":{"items":2, "gutter": 20}, "991":{"items":3, "gutter": 20}, "1368":{"items":5, "gutter": 20},"1440":{"items":6, "gutter": 20}}}'>

            @if(!empty($saleProducts))

            @foreach ($saleProducts as $saleProduct)

            <div>

               <div class="card product-card-alt">

                  <span class="badge bg-primary badge-shadow">{{ $saleProduct->new == 1 ? 'New':'Best Seller' }} </span>

                  <div class="product-thumb">

                               <button class="btn-wishlist btn-sm wishList1"  data-id="{{ $saleProduct->id }}" data-price="{{ $saleProduct->price }}" data-type="1" data-title-left="Wishlist" type="button"><i class="ci-heart wishList"></i></button>
   
                     <div class="product-card-actions">

                        <a href="{{route('checkout',$saleProduct->id)}}" class="btn btn-light btn-icon btn-shadow fs-base mx-2 buylogin" data-id=""data-color=""   data-title="Buy Now" > <i class="ci-basket"></i></a>

                        <button class="btn btn-light btn-icon btn-shadow fs-base mx-2 addToCartt @if($saleProduct->quantity == 0) disabled @endif" data-size="{{ $saleProduct->size }}" data-id="{{ $saleProduct->id }}" data-color="{{ $saleProduct->color }}" type="button"  data-title="Add to Cart" ><i class="ci-cart"></i></button>

                     </div>

                     <a class="product-thumb-overlay" href="{{ route('productDetails',$saleProduct->id) }}"></a>

                     <img src="{{  asset('project/public/'.json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="first-img">

                     @if(isset(json_decode($saleProduct->imageUrl)[1]))

                     <img src="{{ asset('project/public/'.json_decode($saleProduct->imageUrl)[1]) }}}" alt="Product" class="second-img">

                     @else

                     <img src="{{  asset('project/public/'.json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="second-img">

                     @endif

                  </div>

                  <div class="card-body">

                     <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">

                        <div class="text-muted fs-xs me-1">By: <a class="product-meta fw-medium" href="{{route('miniStore',$saleProduct->mid)}}">{{  $saleProduct->mName }}</a></div>

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

            @endif

         </div>

      </div>

   </div>

   --}}

   </div>

   <div class=" h_title text-end">

      <h1 <?=dataEditable('', 'awesome');?>><?=metaValue('awesome')?></h1>
      <!-- <h1>Awesome Finds</h1> -->

   </div>

   </div>

   </div>

   </div>

   </div>

   <!-- Product grid (carousel)-->

</section>

<section class="section-padding green-area" style="background: url('{{ asset('project/public/website/img/content/greenbg.webp') }}');">

   <div class="container-fluid">

      <div class="row">

         <div class="col-lg-9">

            <div class="row justify-content-center">

               <div class="col-lg-3 col-md-3 col-sm-6 col-12">

                  <div class="card product-card-alt mb-3">

                     <div class="product-thumb">

                              <button class="btn-wishlist btn-sm wishList1"  data-id="{{ $saleProduct->id }}" data-price="{{ $saleProduct->price }}" data-type="1" data-title-left="Wishlist" type="button"><i class="ci-heart wishList"></i></button>
   
                        <div class="product-card-actions">
                           
                           <a class="btn btn-light btn-icon btn-shadow fs-base mx-2" href="#"  data-title="Buy Now"><i class="ci-basket"></i></a>

                           <button class="btn btn-light btn-icon btn-shadow fs-base mx-2" type="button"  data-title="Add to Cart" ><i class="ci-cart"></i></button>

                        </div>

                        <a class="product-thumb-overlay" href="single-product.php"></a>

                        <img src="{{ asset('project/public/website/img/marketplace/products/04.jpg') }}" alt="Square image"  class="first-img">

                        <img src="{{ asset('project/public/website/img/marketplace/products/05.jpg') }}" alt="Square image"  class="second-img">

                     </div>

                     <div class="card-body">

                        <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">

                           <div class="text-muted fs-xs me-1">By: <a class="product-meta fw-medium" href="{{route('miniStore',$saleProduct->mid)}}">Store Name </a></div>

                           <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>

                           </div>

                        </div>

                        <h3 class="product-title  mb-2"><a href="single-product.php">Product 1</a></h3>

                        <div class="d-flex flex-wrap justify-content-between align-items-center">

                           <div class="fs-sm me-2"><i class="ci-download text-muted me-1"></i>109<span class="fs-xs ms-1">Sales</span></div>

                           <div class="bg-primary text-white rounded-1 py-1 px-2">$15.<small>00</small></div>

                        </div>

                     </div>

                  </div>

               </div>

               <div class="col-lg-3 col-md-3 col-sm-6 col-12">

                  <div class="card product-card-alt mb-3">

                     <div class="product-thumb">

                               <button class="btn-wishlist btn-sm wishList1"  data-id="{{ $saleProduct->id }}" data-price="{{ $saleProduct->price }}" data-type="1" data-title-left="Wishlist" type="button"><i class="ci-heart wishList"></i></button>
   
                        <div class="product-card-actions"><a class="btn btn-light btn-icon btn-shadow fs-base mx-2" href="shop.php"  data-title="Buy Now"><i class="ci-basket"></i></a>

                           <button class="btn btn-light btn-icon btn-shadow fs-base mx-2" type="button"  data-title="Add to Cart" ><i class="ci-cart"></i></button>

                        </div>

                        <a class="product-thumb-overlay" href="single-product.php"></a>

                        <img src="{{ asset('project/public/website/img/marketplace/products/01.jpg')}}" alt="Product" class="first-img">

                        <img src="{{ asset('project/public/website/img/marketplace/products/02.jpg')}}" alt="Product" class="second-img">

                     </div>

                     <div class="card-body">

                        <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">

                           <div class="text-muted fs-xs me-1">By: <a class="product-meta fw-medium" href="{{route('miniStore',$saleProduct->mid)}}">Store Name </a></div>

                           <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>

                           </div>

                        </div>

                        <h3 class="product-title  mb-2"><a href="single-product.php">Product 1</a></h3>

                        <div class="d-flex flex-wrap justify-content-between align-items-center">

                           <div class="fs-sm me-2"><i class="ci-download text-muted me-1"></i>109<span class="fs-xs ms-1">Sales</span></div>

                           <div class="bg-primary text-white rounded-1 py-1 px-2">$15.<small>00</small></div>

                        </div>

                     </div>

                  </div>

               </div>

               <div class="col-lg-3 col-md-3 col-sm-6 col-12">

                  <div class="card product-card-alt mb-3">

                     <div class="product-thumb">

                                      <button class="btn-wishlist btn-sm wishList1"  data-id="{{ $saleProduct->id }}" data-price="{{ $saleProduct->price }}" data-type="1" data-title-left="Wishlist" type="button"><i class="ci-heart wishList"></i></button>
   
                        <div class="product-card-actions"><a class="btn btn-light btn-icon btn-shadow fs-base mx-2" href="shop.php"  data-title="Buy Now"><i class="ci-basket"></i></a>

                           <button class="btn btn-light btn-icon btn-shadow fs-base mx-2" type="button"  data-title="Add to Cart" ><i class="ci-cart"></i></button>

                        </div>

                        <a class="product-thumb-overlay" href="single-product.php"></a>

                        <img src="{{ asset('project/public/website/img/marketplace/products/06.jpg') }}" alt="Product" class="first-img">

                        <img src="{{ asset('project/public/website/img/marketplace/products/07.jpg') }}" alt="Product" class="second-img">

                     </div>

                     <div class="card-body">

                        <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">

                           <div class="text-muted fs-xs me-1">By: <a class="product-meta fw-medium" href="{{route('miniStore',$saleProduct->mid)}}">Store Name </a></div>

                           <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>

                           </div>

                        </div>

                        <h3 class="product-title  mb-2"><a href="single-product.php">Product 1</a></h3>

                        <div class="d-flex flex-wrap justify-content-between align-items-center">

                           <div class="fs-sm me-2"><i class="ci-download text-muted me-1"></i>109<span class="fs-xs ms-1">Sales</span></div>

                           <div class="bg-primary text-white rounded-1 py-1 px-2">$15.<small>00</small></div>

                        </div>

                     </div>

                  </div>

               </div>

               <div class="col-lg-3 col-md-3 col-sm-6 col-12">

                  <div class="card product-card-alt mb-3">

                     <div class="product-thumb">

                                <button class="btn-wishlist btn-sm wishList1"  data-id="{{ $saleProduct->id }}" data-price="{{ $saleProduct->price }}" data-type="1" data-title-left="Wishlist" type="button"><i class="ci-heart wishList"></i></button>
   
   
                        <div class="product-card-actions"><a class="btn btn-light btn-icon btn-shadow fs-base mx-2" href="shop.php"  data-title="Buy Now"><i class="ci-basket"></i></a>

                           <button class="btn btn-light btn-icon btn-shadow fs-base mx-2" type="button"  data-title="Add to Cart" ><i class="ci-cart"></i></button>

                        </div>

                        <a class="product-thumb-overlay" href="single-product.php"></a>

                        <img src="{{ asset('project/public/website/img/marketplace/products/04.jpg') }}" alt="Product" class="first-img">

                        <img src="{{ asset('project/public/website/img/marketplace/products/05.jpg') }}" alt="Product" class="second-img">

                     </div>

                     <div class="card-body">

                        <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">

                           <div class="text-muted fs-xs me-1">By: <a class="product-meta fw-medium" href="{{route('miniStore',$saleProduct->mid)}}">Store Name </a></div>

                           <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>

                           </div>

                        </div>

                        <h3 class="product-title  mb-2"><a href="single-product.php">Product 1</a></h3>

                        <div class="d-flex flex-wrap justify-content-between align-items-center">

                           <div class="fs-sm me-2"><i class="ci-download text-muted me-1"></i>109<span class="fs-xs ms-1">Sales</span></div>

                           <div class="bg-primary text-white rounded-1 py-1 px-2">$15.<small>00</small></div>

                        </div>

                     </div>

                  </div>

               </div>

            </div>

            <div class="row justify-content-center">

               <div class="col-lg-10 col-md-10 pt-4 pt-md-0">

                  <div class="tns-carousel">

                     <div class="tns-carousel-inner" data-carousel-options='{"nav": false,"responsive": {"0":{"items":1},"500":{"items":2, "gutter": 18},"768":{"items":2, "gutter": 20}, "1100":{"items":3, "gutter": 24}}}'>

                        <!-- Carousel item-->

                        <!-- Product-->

                        <!-- Product-->

                        @if(!empty($beThrifty))

                        @foreach ($beThrifty as $saleProduct)

                        <div>

                           <div class="card product-card-alt">

                              <span class="badge bg-primary badge-shadow">{{ $saleProduct->new == 1 ? 'New':'Best Seller' }} </span>

                              <div class="product-thumb">
 
                                 <div class="product-card-actions"> 
                              <a href="@if(Auth::check()){{route('checkout',$saleProduct->id)}}@else javascript:void(0); @endif" class="btn btn-light btn-icon btn-shadow fs-base mx-2 buylogin" data-id="" data-color="" onclick="@if(Auth::check()) @else toastr.error('please login First'); @endif"  data-title="Buy Now" > <i class="ci-basket"></i></a>
                              {{--  <a class="btn btn-light btn-icon btn-shadow fs-base mx-2" href="{{route('checkout',$saleProduct->id)}}"><i class="ci-basket"></i></a>  --}}

                                    <button class="btn btn-light btn-icon btn-shadow fs-base mx-2 addToCartt @if($saleProduct->quantity == 0) disabled @endif" data-type="{{ $saleProduct->type }}" data-size="{{ $saleProduct->size }}" data-id="{{ $saleProduct->id }}" data-color="{{ $saleProduct->color }}" data-price="{{ $saleProduct->price }}" type="button"  data-title="Add to Cart" ><i class="ci-cart"></i></button>

                                 </div>

                                 <a class="product-thumb-overlay" href="{{ route('productDetails',$saleProduct->id) }}"></a>

                                 <img src="{{  asset('project/public/'.json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="first-img">

                                 @if(isset(json_decode($saleProduct->imageUrl)[1]))

                                 <img src="{{ asset('project/public/'.json_decode($saleProduct->imageUrl)[1]) }}" alt="Product" class="second-img">

                                 @else

                                 <img src="{{  asset('project/public/'.json_decode($saleProduct->imageUrl)[0]) }}" alt="Product" class="second-img">

                                 @endif

                              </div>

                              <div class="card-body">

                                 <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">

                                    <div class="text-muted fs-xs me-1">By: <a class="product-meta fw-medium" href="{{route('miniStore',$saleProduct->mid)}}">{{  $saleProduct->mName }}</a></div>

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

                        @endif

                        <div>

                        </div>

                        <!-- Carousel item-->

                     </div>

                  </div>

               </div>

            </div>

         </div>

         <div class="col-lg-3 col-md-3 col-12">

            <div class="green-logo">

               <div>

                 <!-- <img src="{{ asset('website/img/content/Recycle-Logo.webp') }}" alt="" class="img-fluid"> -->

                  
                   <?=fileBrowse('img')?>

                  <!-- <h1 class="text-primary display-3"><b>BE THRIFTY</b></h1> -->
                  <h1 <?=dataEditable('text-primary display-3', 'be_thrifty');?>><b><?=metaValue('be_thrifty')?></b></h1>
               </div>

               <div>

               </div>

            </div>

         </div>

      </div>

   </div>

</section>





    





<section class="bg-position-top-center section-padding smallbanner">

   <div class="">

      <div class="container ">

         <div class="row">

            <div class="col-lg-12 col-md-12 text-center ">

                 <span <?=dataEditable('fw-light', 'who_we_are');?>><?=metaValue('who_we_are')?></span>
               <div class="smallb_para">

                  <p <?=dataEditable('fw-light', 'paragraph');?>><?=metaValue('paragraph')?></p>
                  </h2>

                  </p>

                  <h2 <?=dataEditable('h5 text-white text-justify fw-light', 'who_we_are2');?>><?=metaValue('who_we_are2')?></h2>
                 


                  </p>

                  <h2 class="h5 text-white text-justify fw-light">

                 

                  </h2>

               </div>

            </div>

         </div>

      </div>

   </div>

</section>

<section class="who-banner my-2">

   <div class="container-fluid p-0">

      <div class="row g-0">

         <div class="col-4 col-md-4 col">

            <div class="who-img">
  <?=fileBrowse('banner1')?>
               <!-- <img src="{{ asset('website/img/content/banner1.jpg') }}" alt="Square image" class="img-fluid"> -->
            </div>

         </div>

         <div class="col-4 col-md-4 col">

            <div class="who-img">

                        <?=fileBrowse('banner2')?>
               <!-- <img src="{{ asset('website/img/content/banner2.jpg') }}" alt="Square image" class="img-fluid"> -->
            </div>

         </div>

         <div class="col-4 col-md-4 col">

            <div class="who-img">

                <?=fileBrowse('banner3')?>

               <!-- <img src="{{ asset('website/img/content/banner1.jpg') }}" alt="Square image" class="img-fluid"> -->
            </div>

         </div>

      </div>

   </div>

</section>

@include('websiteLayout.footer')