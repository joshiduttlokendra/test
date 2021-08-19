@include('websiteLayout.header')



<section class="section-padding cart-area">

  <div class="container">

      <div class="row">

        <!-- List of items-->

        <div class="col-lg-8">



          <div class="card p-3 shadow-sm">





          <div class="d-flex justify-content-between align-items-center pt-3 pb-3  mt-1">

            <h2 class="h3  mb-0">Products</h2><a class="btn btn-outline-primary btn-sm ps-2" href="{{route('shop','main')}}"><i class="ci-arrow-left me-2"></i>Continue shopping</a>

          </div>

        @php $pIds=array();

        $total=0;

        if($response == ''){

            echo "No Items Yet";

        } @endphp

          @foreach ($response as $res)

          @php

          if($res['pDetail']->sale == 1)

          {

            $total +=$res['pDetail']->salePrice * $res['quantity'];

          }

          else {

            $total +=$res['pDetail']->price * $res['quantity'];

          }



          $pIds[]=$res['pDetail']->id; @endphp

        <!-- Item-->

          <div class="d-sm-flex justify-content-between align-items-center my-2 pb-3 border-bottom" id="itemDiv{{ $res['pDetail']->id }}" data-price="#price{{ $res['pDetail']->id}}" data-id="{{ $res['pDetail']->id }}" data-quantity="#quan{{ $res['pDetail']->id }}" data-purchase="#purchaseLater{{ $res['pDetail']->id }}" data-gift="#gift{{ $res['pDetail']->id }}" data-type={{ $res['type'] }} data-size="{{ $res['size'] }}">

            <div class="d-block d-sm-flex align-items-center text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="{{ route('productDetails',$res['pDetail']->id) }}"><img src="{{ asset('project/public'.json_decode($res['pDetail']->imageUrl)[0]) }}" width="160" alt="Product"></a>

              <div class="pt-2">

                <h3 class="product-title fs-base mb-2"><a href="{{ route('productDetails',$res['pDetail']->id) }}">{{  $res['pDetail']->name }}</a></h3>

                <div class="fs-sm"><span class="text-muted me-2">Size:</span>{{  $res['pDetail']->size }}</div>

                <div class="fs-sm"><span class="text-muted me-2">Color:</span>{{  $res['pDetail']->color }}</div>

                @php

                                            $price = explode('.', $res['pDetail']->salePrice);

                                            $price2 = explode('.', $res['pDetail']->price);

                                        @endphp

                     @if($res['pDetail']->sale == 1)

                <div class="fs-lg text-accent pt-2" id="price{{ $res['pDetail']->id}}">${{ $price[0] }}.<small>{{ $price[1] }}</small></div>

                @else

                <div class="fs-lg text-accent pt-2" id="price{{ $res['pDetail']->id}}">${{ $price2[0] }}.<small>{{ $price2[1] }}</small></div>

                @endif

              </div>

            </div>

            <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start" >

              <label class="form-label" for="quantity1" >Quantity</label>

              <input class="form-control cart1" type="number" id="quan{{ $res['pDetail']->id }}" min="1" value="{{  $res['quantity'] }}">

              <button class="btn btn-link px-0 text-danger" type="button"><i class="ci-close-circle me-2"></i><span class="fs-sm deleteItem" data-id="{{ $res['pDetail']->id }}" data-type={{ $res['type'] }} data-size="{{ $res['size'] }}"  data-divID="#itemDiv{{ $res['pDetail']->id }}">Delete</span></button>





              <div class="form-check cart-check">

                <input class="form-check-input cartremove" type="checkbox"  data-id="{{ $res['pDetail']->id }}" data-type={{ $res['type'] }} data-size="{{ $res['size'] }}"  data-divID="#itemDiv{{ $res['pDetail']->id }}">

                <label class="form-check-label" for="cart-check-1">Remove from cart to purchase later</label>

              </div>

              <div class="form-check cart-check">

                <input class="form-check-input" type="checkbox" id="gift{{ $res['pDetail']->id }}" {{ $res['gift'] == 1 ? 'checked':'' }}  >

                <label class="form-check-label" for="cart-check-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Click here to have product wrapped and

delivered as a gift. Additional cost of $20 will be incurred. In “Additional Comments” section

please give details of type of gift eg Birthday, Anniversary etc. and any personalization">Item is a gift</label>

              </div>



            </div>



          </div>

          <!-- Item-->

          @endforeach







          </div>

                    {{-- GET TOTAL PRODUCT ID  --}}

                    <textarea id="totalIds" style="display: none">

                        {{ json_encode($pIds) }}

                    </textarea>



                    {{--END GET TOTAL PRODUCT ID  --}}



       {{--<button class="btn btn-outline-dark d-block w-100 mt-4 update1" type="button">

          <i class="ci-loading fs-base me-2 updateCart" ></i>Update cart</button>--}}

        </div>

        <!-- Sidebar-->

        <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">

          <div class="bg-white rounded-3 shadow-lg p-4">

            <div class="py-2 px-xl-2">

              <div class="text-center mb-4 pb-3 border-bottom">

                <h2 class="h6 mb-3 pb-1">Subtotal </h2>

                @php

                $price = explode('.', number_format($total,2));

              @endphp

                <h3 class="fw-normal" id="subtotalCart">${{  $price[0] }}.<small>{{  $price[1] }}</small></h3>

              

                <p id="couponShow"></p>

            </div>

              <div class="mb-3 mb-4">

                <label class="form-label mb-3" for="order-comments"><span class="badge bg-info fs-xs me-2">Note</span><span class="fw-medium">Additional comments</span></label>

                <textarea class="form-control" rows="6" id="order-comments"></textarea>

              </div>

              <div class="accordion" id="order-options">

                <div class="accordion-item">

                  <h3 class="accordion-header"><a class="accordion-button" href="#promo-code" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="promo-code">

                   Apply promo code</a>

                  </h3>

                  <div class="accordion-collapse collapse show" id="promo-code" data-bs-parent="#order-options">



                    <form class="accordion-body needs-validation" novalidate>

                      <div class="mb-3">

                        @if(!empty($coupons))

                        <select multiple id="c1"  class="form-control couponCode " name="couponCode[]" placeholder="select coupon">

                              

                               @foreach($coupons as $row)

                                <option value="{{$row->code}}"> {{$row->code}}</option>

                               @endforeach  

                        </select> 

                        @else

                        <input class="form-control couponCode" type="text" id="couponCode" placeholder="Promo code" required>

                     

                        @endif      

                     

                        <div class="invalid-feedback">Please provide promo code.</div>

                      </div>

                      <div id="coupon_input"></div>

                      <button class="btn btn-outline-primary d-block w-100 applyCoupon" >Apply promo code</button>

                    </form>

                    

                  </div>

                </div>

               @if(!empty($data))

            

               <div class="accordion-item">

                  <h3 class="accordion-header"><a class="accordion-button collapsed" href="#shipping-estimates" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="shipping-estimates">Shipping estimates</a></h3>

                  <div class="accordion-collapse collapse" id="shipping-estimates" data-bs-parent="#order-options">

                    <div class="accordion-body">

                      <form class="needs-validation" novalidate>

                        <div class="mb-3">

                        <select class="form-select countryID" id="address-country"  name="country" required>

                             <option value="{{ $data->id }}">{{ $data->cname }}</option>                             

                        </select>

                          

                          <div class="invalid-feedback">Please choose your country!</div>

                        </div>

                        <div class="mb-3">

                        <select name="city" id="city" class="form-select">

                        <option value="{{ $data->ccid }}">{{ $data->ccname }}</option>  

                       </select>

                          <div class="invalid-feedback">Please choose your city!</div>

                        </div>

                        <div class="mb-3">

                          <input class="form-control" type="text"  value="{{$data->zipCode}}" required>

                          <div class="invalid-feedback">Please provide a valid zip!</div>

                        </div>

                        <button class="btn btn-outline-primary d-block w-100" type="submit">Calculate shipping</button>

                      </form>

                    </div>

                  </div>

                </div>

                @else

                <div class="accordion-item">

                  <h3 class="accordion-header"><a class="accordion-button collapsed" href="#shipping-estimates" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="shipping-estimates">Shipping estimates</a></h3>

                  <div class="accordion-collapse collapse" id="shipping-estimates" data-bs-parent="#order-options">

                    <div class="accordion-body">

                      <form class="needs-validation" novalidate>

                        <div class="mb-3">

                        <select class="form-select countryID" id="address-country"  name="country" required>

                        <option value="">--- Choose your country  ---</option>

                                  @foreach ($countries as $row)

                                        <option value="{{ $row->id }}">{{ $row->name }}</option>

                                    @endforeach



                        </select>

                          

                          <div class="invalid-feedback">Please choose your country!</div>

                        </div>

                        <div class="mb-3">

                        <select name="city" id="city" class="form-select"  >

                             <option>--- Choose your city ---</option>

                       </select>

                          <div class="invalid-feedback">Please choose your city!</div>

                        </div>

                        <div class="mb-3">

                          <input class="form-control" type="text" placeholder="ZIP / Postal code" required>

                          <div class="invalid-feedback">Please provide a valid zip!</div>

                        </div>

                        <button class="btn btn-outline-primary d-block w-100" type="submit">Calculate shipping</button>

                      </form>

                    </div>

                  </div>

                </div>



                @endif



              </div><a id="checkoutButton" name="addcrt" class="btn btn-primary btn-shadow d-block w-100 mt-4 @if(empty($response)) disabled @endif"@if(!empty($response)) @if(Auth::user()) href="{{ route('checkout',0) }}" @endif @endif><i class="ci-card fs-lg me-2"></i>@if(!empty($response)) @if(Auth::user()) Proceed to Checkout @else Login Please @endif @else Cart is empty @endif</a>

            </div>

          </div>

        </aside>

      </div>

    </div>

</section>

@include('websiteLayout.footer')