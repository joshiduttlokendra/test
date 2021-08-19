@include('websiteLayout.header')

<section class="checkout-area section-padding bg-secondary">

	   <div class="container pb-5 mb-2 mb-md-4">

      <div class="row">

        <div class="col-lg-8">

        	<div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">

          <div class="shipping-address">



          <form action="{{  route('paypal') }}" method="POST" id="shipping_form" name="shipping_form">

            @csrf

        		   <!-- Shipping address-->

          <h2 class="h4 pt-1 pb-3 mb-3 border-bottom">Shipping address</h2>

          

         <?php $id = collect(request()->segments())->last(); ?>

         <input type="hidden" name="pid" value="{{$id}}"/>

    

          <div class="row">

            <div class="col-sm-6">

              <div class="mb-3">

                <label class="form-label" for="checkout-fn">First Name <span class="text-danger">*</span></label>

                <input class="form-control" type="text" name="firstName" value="@if(!empty($adrs)) {{$adrs->uname}}  @endif" id="checkout-fn">

                {!! $errors->first('firstName', "<span class='text-danger'>:message</span>") !!}

              </div>

            </div>

            <div class="col-sm-6">

              <div class="mb-3">

                <label class="form-label" for="checkout-ln">Last Name <span class="text-danger">*</span></label>

                <input class="form-control" type="text" name="lastName"  id="checkout-ln">

                {!! $errors->first('lastName', "<span class='text-danger'>:message</span>") !!}

              </div>

            </div>

          </div>

          <div class="row">

            <div class="col-sm-6">

              <div class="mb-3">

                <label class="form-label" for="checkout-email">E-mail Address <span class="text-danger">*</span></label>

                <input class="form-control" type="email" name="email" value="@if(!empty($adrs))  {{$adrs->uemail}}  @endif" id="checkout-email">

                {!! $errors->first('email', "<span class='text-danger'>:message</span>") !!}

              </div>

            </div>

            <div class="col-sm-6">

              <div class="mb-3">

                <label class="form-label" for="checkout-phone">Phone Number <span class="text-danger">*</span></label>

                <input class="form-control" type="text" name="phoneNo" value="@if(!empty($adrs))  {{$adrs->uphone}}  @endif" id="checkout-phone">

                {!! $errors->first('phoneNo', "<span class='text-danger'>:message</span>") !!}

              </div>

            </div>

          </div>

          <div class="row">



            <div class="col-sm-6">

              <div class="mb-3">

                <label class="form-label" >Street Address 1 <span class="text-danger">*</span></label>

                <input class="form-control" name="streetAddr1" type="text" value="@if(!empty($adrs))  {{$adrs->astreet1}}  @endif">

                {!! $errors->first('streetAddr1', "<span class='text-danger'>:message</span>") !!}



              </div>

            </div>



               <div class="col-sm-6">

              <div class="mb-3">

                <label class="form-label" >Street Address 2 <span class="text-danger">*</span></label>

                <input class="form-control" name="streetAddr2"   value="@if(!empty($adrs))  {{$adrs->astreet2}}  @endif" type="text">

                  {!! $errors->first('bStreetAddr2', "<span class='text-danger'>:message</span>") !!}



              </div>

            </div>



          </div>

          <div class="row">

            <div class="col-sm-12">

              <div class="mb-3">

                <label class="form-label" for="checkout-country">Country<span class="text-danger">*</span></label>

                @if(!empty($adrs)) 

                 <input type="text" name="country"  value="@if(!empty($adrs))  {{$adrs->cname}}  @endif" class="form-control"/>

                @else

                <select class="form-select" id="checkout-country" name="country">

                  <option selected disabled>Choose Country</option>

                  @foreach ($countries as $country)

                  <option value="{{$country->id }}">{{ $country->name }}</option>

                  @endforeach

                </select>

                @endif

          

                {!! $errors->first('country', "<span class='text-danger'>:message</span>") !!}

              </div>

            </div>



                <div class="col-sm-6">

              <div class="mb-3">

              <label class="form-label" for="checkout-city">City <span class="text-danger">*</span></label>

               @if(!empty($adrs)) 

                 <input type="text" name="city"  value="@if(!empty($adrs))  {{$adrs->ccname}}  @endif" class="form-control"/>

                @else

                <select class="form-select" id="checkout-city" name="city">

                  <option disabled selected>Choose Country First</option>

                 </select>

                 @endif 

                 {!! $errors->first('city', "<span class='text-danger'>:message</span>") !!}

              </div>

            </div>

            <div class="col-sm-6">

              <div class="mb-3">

                <label class="form-label" for="checkout-zip">ZIP Code</label>

                <input class="form-control" type="text" id=""  value="@if(!empty($adrs))  {{$adrs->azipcode}}  @endif" name="zipCode">

              </div>

            </div>

          </div>

        </div>









             <h2 class="mb-3  h4 py-3 border-bottom">Billing address</h2>

         

          <div class="form-check mb-3">

            <input class="form-check-input" type="checkbox" 1 id="same-address" name="billingAddr">

            <label class="form-check-label" for="same-address">Shipping address is different from Silling address</label>

          </div>





          {!! $errors->first('paymentMethod', "<span class='text-danger'>:message</span>") !!}

<div class="form-check form-switch mb-3">

  <input type="radio" class="form-check-input" value="Paypal" id="payswitch" name="paymentMethod">

  <label class="form-check-label" for="payswitch"><b>Pay With Paypal</b></label>

 </div>





<div class="form-check form-switch mb-3">

   <input type="radio" class="form-check-input" value="cash" id="payswitch1" name="paymentMethod">

    <label class="form-check-label" for="payswitch1"><b>Cash On Delivery</b></label>

  </div>







            <div class="billing-address border-top">







               <!-- billing address-->

          <div class="row mt-3">

            <div class="col-sm-12">

              <div class="mb-3">

                <label class="form-label" for="checkout-fn">Full Name (as seen on card)</label>

                <input class="form-control" type="text" name="bFullName"id="checkout-fn">

              </div>

            </div>



          </div>



          <div class="row">



            <div class="col-sm-6">

              <div class="mb-3">

                <label class="form-label" >Street Address 1</label>

                <input class="form-control" name="bStreetAddr1" type="text" >





              </div>

            </div>



               <div class="col-sm-6">

              <div class="mb-3">

                <label class="form-label" >Street Address 2  {!! $errors->first('bStreetAddr2', "<span class='text-danger'>:message</span>") !!}</label>

                <input class="form-control" name="bStreetAddr2" type="text">

               

               

              </div>

            </div>



          </div>

          <div class="row">

            <div class="col-sm-12">

              <div class="mb-3">

                <label class="form-label" for="checkout-country2">Country</label>

                <select class="form-select" id="checkout-country2" name="bCountry">

                    <option selected disabled>Choose Country</option>

                    @foreach ($countries as $country)

                    <option value="{{ $country->id }}">{{ $country->name }}</option>

                    @endforeach

                </select>

              </div>

            </div>

                <div class="col-sm-6">

              <div class="mb-3">

               <label class="form-label" for="checkout-city2">City</label>

              <select class="form-select" id="bcity" name="bCity" required>

                <option disabled selected>Choose Country First</option>

                  </select>

              </div>

            </div>

            <div class="col-sm-6">

              <div class="mb-3">

                <label class="form-label" for="checkout-zip">ZIP Code</label>

                <input class="form-control" type="text" id="" name="bZipCode">

              </div>

            </div>

          </div>

        </div>



          <!-- Navigation (desktop)-->

          <div class="d-lg-flex pt-4 mt-3">

            <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="cart.php"><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Cart</span><span class="d-inline d-sm-none">Back</span></a></div>

            <div class="w-50 ps-2"><button type="submit" class="btn btn-primary d-block w-100" href="checkout-shipping.php"><span class="d-none d-sm-inline">Proceed to Shipping</span><span class="d-inline d-sm-none">Next</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></button></div>

          </div>

        </form>

        	</div>





        </div>

        <!-- Sidebar-->

        <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">

          <div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">

            <div class="py-2 px-xl-2">

              <div class="widget mb-3">

                <h2 class="widget-title text-center">Order summary</h2>

                @php

                    $subtotal=0;



                @endphp

              @if(!empty($cart))  

                @foreach ($cart as $item)



                <div class="d-flex align-items-center pb-2 border-bottom"><a class="d-block flex-shrink-0" href="{{ route('productDetails',$item['pDetail']->id) }}"><img src="{{ asset('/project/public'.json_decode($item['pDetail']->imageUrl)[0]) }}" width="64" alt="Product"></a>

                  <div class="ps-2">

                    <h6 class="widget-product-title"><a href="{{ route('productDetails',$item['pDetail']->id) }}">{{ $item['pDetail']->name }}</a></h6>

                    @php

                                            $price = explode('.', $item['pDetail']->salePrice);

                                            $price2 = explode('.', $item['pDetail']->price);

                                        @endphp

                                        @if($item['pDetail']->sale == 1)

                                        @php

                $subtotal +=$item['pDetail']->salePrice*$item['quantity'];



               @endphp

                    <div class="widget-product-meta"><span class="text-accent me-2">${{ $price[0] }}.<small>{{ $price[1] }}</small></span>

                    <span class="text-muted">x {{  $item['quantity'] }}</span></div>

                    @else

                    @php

                    $subtotal =$item['pDetail']->price*$item['quantity'];



                @endphp

                    <div class="widget-product-meta"><span class="text-accent me-2">${{ $price2[0] }}.<small>{{ $price2[1] }}</small></span><span class="text-muted">x {{  $item['quantity'] }}</span></div>

                    @endif

                  </div>

                </div>

                @endforeach

        

              

              </div>

              <ul class="list-unstyled fs-sm pb-2 border-bottom">

                @php

                $price = explode('.', number_format($subtotal,2));

                @endphp

                <li class="d-flex justify-content-between align-items-center"><span class="me-2">sxxxxxxxxxSubtotal:</span><span class="text-end">${{ $price[0] }}.<small>{{ $price[1] }}</small></span></li>

                <li class="d-flex justify-content-between align-items-center"><span class="me-2">Shipping:</span><span class="text-end">$0.00</span></li>

                <li class="d-flex justify-content-between align-items-center"><span class="me-2">Taxes:</span><span class="text-end">$9.<small>50</small></span></li>

                <li class="d-flex justify-content-between align-items-center"><span class="me-2">Discount:</span><span class="text-end">${{ number_format(Session::get('couponAmount'),2) }}</span></li>

              </ul>

              @php

                  $total=$subtotal - number_format(Session::get('couponAmount'));

                  $tPrice = explode('.', number_format($total,2));

              @endphp

              <h3 class="fw-normal text-center my-4">${{ $tPrice[0] }}.<small>{{ $tPrice[1] }}</small></h3>

             @else

             @foreach ($buy as $item)



              <div class="d-flex align-items-center pb-2 border-bottom"><a class="d-block flex-shrink-0" href="{{ route('productDetails',$item['pDetail']->id) }}"><img src="{{ asset('/project/public'.json_decode($item['pDetail']->imageUrl)[0]) }}" width="64" alt="Product"></a>

                <div class="ps-2">

                  <h6 class="widget-product-title"><a href="{{ route('productDetails',$item['pDetail']->id) }}">{{ $item['pDetail']->name }}</a></h6>

           

                  <div class="widget-product-meta"><span class="text-accent me-2">${{ $item['pDetail']->price }}.<small></small></span><span class="text-muted"></div>

               

                </div>

              </div>

              @endforeach

             </div>

              <ul class="list-unstyled fs-sm pb-2 border-bottom">

                @php

                $subtotal = $item['pDetail']->price ;

                $price = explode('.', number_format($subtotal,2));

                @endphp

                <li class="d-flex justify-content-between align-items-center"><span class="me-2">Subtotal:</span><span class="text-end">${{ $price[0] }}.<small>{{ $price[1] }}</small></span></li>

                <li class="d-flex justify-content-between align-items-center"><span class="me-2">Shipping:</span><span class="text-end">$0.00</span></li>

                <li class="d-flex justify-content-between align-items-center"><span class="me-2">Taxes:</span><span class="text-end">$9.<small>50</small></span></li>

                <li class="d-flex justify-content-between align-items-center"><span class="me-2">Discount:</span><span class="text-end">${{ number_format(Session::get('couponAmount'),2) }}</span></li>

              </ul>



             @endif

            </div>

          </div>

        </aside>

      </div>



    </div>

</section>









@include('websiteLayout.footer')