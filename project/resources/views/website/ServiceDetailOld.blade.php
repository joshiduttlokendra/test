@include('websiteLayout.header')
<section class="section-padding single-product">
   <div class="container">
      <!-- Gallery + details-->
      <div class="bg-light shadow-lg rounded-3 px-4 py-3 mb-5">
         <div class="px-lg-3">
            <div class="row">
               <!-- Product gallery-->
               <div class="col-lg-7 pe-lg-0 pt-lg-4">
                  <div class="product-gallery">
                     <div class="product-gallery-preview order-sm-2">
                        @php
                            $images =json_decode($response->imageUrl);
                        @endphp
                        @foreach ($images as $key=>$img)

                        <div class="product-gallery-preview-item active" id="first{{ $key }}">
                           <img class="image-zoom" src="{{ asset($img) }}" data-zoom="{{ asset($img) }}" alt="Product image">
                           <div class="image-zoom-pane"></div>
                        </div>
                        @endforeach

                     </div>
                     <div class="product-gallery-thumblist order-sm-1">
                        @foreach ($images as $key=>$img)
                         <a class="product-gallery-thumblist-item @if($key == 0) active @endif" href="#first{{ $key }}"><img src="{{ asset($img) }}" alt="Product thumb"></a>
                        @endforeach
                        </div>
                  </div>
               </div>


               <!-- Product details-->
               <div class="col-lg-5 pt-4 pt-lg-0">
                  <div class="product-details ms-auto pb-3">
                     <div class="text-lg-start">
                        <h1 class="h3  mb-0">{{  $response->name }}</h1>
                     </div>
                     <div class="d-flex justify-content-between align-items-center mb-2">
                        <a href="#reviews" data-scroll>
                         
                           <span class="d-inline-block fs-sm text-body align-middle mt-1 ms-1">5 Reviews</span>
                        </a>
                        <button class="btn-wishlist me-0 me-lg-n3" type="button" data-bs-toggle="tooltip" title="Add to wishlist"><i class="ci-heart"></i></button>
                     </div>
                     <div class="d-flex  align-items-center">
                        <h5 class="pe-3 mb-0">Description : </h5>
                        <p class="mb-0">{{ $response->description }}</p>
                     </div>
                     <hr class="my-3">
                  
                    
                     <form class="mb-grid-gutter" method="post">
                        <div class="mb-3">
                           <div class="d-flex justify-content-between align-items-center pb-1">
                           </div>
                        
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                        <select class="form-select me-3" id="quantity" style="width: 5rem;">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                           </select>
                        <a href="{{route('checkout',$response->id)}}">
                    <button class="addToCart btn btn-primary btn-shadow d-block w-100" data-id=""
                    data-color="" type="button"
                     data-bs-placement="top" title="Buy Now" >Buy Now</button></a>
                    </div>
                
                    <button
                                                class="btn btn-dark btn-shadow d-block w-100 addToCartt" data-size="0"
                                                data-id="{{ $response->id }}"
                                                data-color="0" type="button"
                                                data-bs-placement="top" title="Add to Cart" >Add to cart</button>
                        
                         
                     </form>
                     <!-- Product panels-->
                     <div class="accordion mb-4" id="productPanels">
                        <div class="accordion-item">
                           <h3 class="accordion-header"><a class="accordion-button" href="#productInfo" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="productInfo"><i class="ci-announcement text-muted fs-lg align-middle mt-n1 me-2"></i>Product info</a></h3>
                           <div class="accordion-collapse collapse show" id="productInfo" data-bs-parent="#productPanels">
                              <div class="accordion-body">
                                 {{-- <h6 class="fs-sm mb-2">Composition</h6>
                                 <ul class="fs-sm ps-4">
                                    <li>Elastic rib: Cotton 95%, Elastane 5%</li>
                                    <li>Lining: Cotton 100%</li>
                                    <li>Cotton 80%, Polyester 20%</li>
                                 </ul>
                                 <h6 class="fs-sm mb-2">Art. No.</h6>
                                 <ul class="fs-sm ps-4 mb-0">
                                    <li>183260098</li>
                                 </ul> --}}

                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h3 class="accordion-header"><a class="accordion-button collapsed" href="#shippingOptions" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="shippingOptions"><i class="ci-delivery text-muted lead align-middle mt-n1 me-2"></i>Shipping options</a></h3>
                           <div class="accordion-collapse collapse" id="shippingOptions" data-bs-parent="#productPanels">
                              <div class="accordion-body fs-sm">
                                 <div class="d-flex justify-content-between border-bottom pb-2">
                                    <div>
                                       <div class="fw-semibold text-dark">Courier</div>
                                       <div class="fs-sm text-muted">2 - 4 days</div>
                                    </div>
                                    <div>$26.50</div>
                                 </div>
                                 <div class="d-flex justify-content-between border-bottom py-2">
                                    <div>
                                       <div class="fw-semibold text-dark">Local shipping</div>
                                       <div class="fs-sm text-muted">up to one week</div>
                                    </div>
                                    <div>$10.00</div>
                                 </div>
                                 <div class="d-flex justify-content-between border-bottom py-2">
                                    <div>
                                       <div class="fw-semibold text-dark">Flat rate</div>
                                       <div class="fs-sm text-muted">5 - 7 days</div>
                                    </div>
                                    <div>$33.85</div>
                                 </div>
                                 <div class="d-flex justify-content-between border-bottom py-2">
                                    <div>
                                       <div class="fw-semibold text-dark">UPS ground shipping</div>
                                       <div class="fs-sm text-muted">4 - 6 days</div>
                                    </div>
                                    <div>$18.00</div>
                                 </div>
                                 <div class="d-flex justify-content-between pt-2">
                                    <div>
                                       <div class="fw-semibold text-dark">Local pickup from store</div>
                                       <div class="fs-sm text-muted">&mdash;</div>
                                    </div>
                                    <div>$0.00</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Sharing-->
                     <label class="form-label d-inline-block align-middle my-2 me-3">Share:</label><a class="btn-share btn-twitter me-2 my-2" href="#"><i class="ci-twitter"></i>Twitter</a><a class="btn-share btn-instagram me-2 my-2" href="#"><i class="ci-instagram"></i>Instagram</a><a class="btn-share btn-facebook my-2" href="#"><i class="ci-facebook"></i>Facebook</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>



<section class="container mb-4 mb-lg-5 product-description">
    <!-- Nav tabs-->
    <ul class="nav nav-tabs" role="tablist">
       <li class="nav-item"><a class="nav-link  active" href="#details" data-bs-toggle="tab" role="tab">Product details</a></li>
       <li class="nav-item"><a class="nav-link " href="#reviews" data-bs-toggle="tab" role="tab">Reviews</a></li>
    </ul>
    <div class="tab-content pt-2">
       <!-- Product details tab-->
       <div class="tab-pane fade show active" id="details" role="tabpanel">
          <div class="row">
             <div class="col-lg-4">
                <div class="adbox">
                    @php
                    $images =json_decode($response->imageUrl);
                @endphp
                   <img src="{{ asset($images[0]) }}" alt="dsfdsfdsfdsfdsfd" class="img-fluid">
                </div>
             </div>
             <div class="col-lg-8">
                <div class="content">
                   <h4>Product Description</h4>
                   <p class="">{{  $response->description }}</p>
                   <div class="d-flex flex-wrap quality-img gallery">

                 @foreach ($images as $key=>$img)
                      <figure class="figure">
                         <a href="{{ asset($img) }}"><img src="{{ asset($img) }}" class="figure-img" alt="..."></a>
                      </figure>
                      @endforeach
                   </div>
                   <!-- Basic accordion -->
                   <div class="accordion" id="accordionExample">
                      <h4>Frequently Asked Questions</h4>
                      @if(count($frequentQuestion) == 0)
                      No Questions Yet
                      @endif
                      @foreach ($frequentQuestion as $key=>$question)
                      <!-- Item -->
                      <div class="accordion-item">
                         <h2 class="accordion-header" id="heading{{ $question->id }}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $question->id }}" aria-expanded="true" aria-controls="faq{{ $question->id }}">{{ $question->question }} ?</button>
                         </h2>
                         <div class="accordion-collapse collapse {{ $key == 0 ? 'show':'' }}" id="faq{{ $question->id }}" aria-labelledby="heading{{ $question->id }}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">{{ $question->answer }}</div>
                         </div>
                      </div>
                      <!-- Item -->
                      @endforeach
                   </div>
                </div>
             </div>
          </div>
       </div>
       <!-- Reviews tab-->
       <div class="tab-pane fade" id="reviews" role="tabpanel">
          <!-- Reviews-->
          <div class="row pt-2 pb-3">
             <div class="col-lg-4 col-md-5">
                <h3 class="h4 mb-4">{{ count($reviews) }} Reviews</h3>
                <div class="star-rating me-2"><i class="ci-star-filled fs-sm  me-1"></i><i class="ci-star-filled fs-sm  me-1"></i><i class="ci-star-filled fs-sm me-1"></i><i class="ci-star-filled fs-sm  me-1"></i><i class="ci-star fs-sm text-muted me-1"></i></div>
                <span class="d-inline-block align-middle"><?php echo App\Http\Controllers\Controller::rating($response->id);?> Overall rating</span>
                <p class="pt-3 fs-sm text-muted">{{ $totalRatings }} out of {{ count($reviews) }} ( {{ count($reviews) != 0 ? ($totalRatings*100)/count($reviews): '100' }}%)<br>Customers recommended this product</p>
             </div>
             <div class="col-lg-8 col-md-7">
                <div class="d-flex align-items-center mb-2">
                   <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">5</span><i class="ci-star-filled fs-xs ms-1"></i></div>
                   <div class="w-100">
                      <div class="progress" style="height: 4px;">
                         <div class="progress-bar bg-success" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                   </div>
                   <span class="text-muted ms-3">{{ $rating5 }}</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                   <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">4</span><i class="ci-star-filled fs-xs ms-1"></i></div>
                   <div class="w-100">
                      <div class="progress" style="height: 4px;">
                         <div class="progress-bar" role="progressbar" style="width: 27%; background-color: #a7e453;" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                   </div>
                   <span class="text-muted ms-3">{{ $rating4 }}</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                   <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">3</span><i class="ci-star-filled fs-xs ms-1"></i></div>
                   <div class="w-100">
                      <div class="progress" style="height: 4px;">
                         <div class="progress-bar" role="progressbar" style="width: 17%; background-color: #ffda75;" aria-valuenow="17" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                   </div>
                   <span class="text-muted ms-3">{{ $rating3 }}</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                   <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">2</span><i class="ci-star-filled fs-xs ms-1"></i></div>
                   <div class="w-100">
                      <div class="progress" style="height: 4px;">
                         <div class="progress-bar" role="progressbar" style="width: 9%; background-color: #fea569;" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                   </div>
                   <span class="text-muted ms-3">{{ $rating2 }}</span>
                </div>
                <div class="d-flex align-items-center">
                   <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">1</span><i class="ci-star-filled fs-xs ms-1"></i></div>
                   <div class="w-100">
                      <div class="progress" style="height: 4px;">
                         <div class="progress-bar bg-danger" role="progressbar" style="width: 4%;" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                   </div>
                   <span class="text-muted ms-3">{{ $rating1 }}</span>
                </div>
             </div>
          </div>
          <hr class="mt-4 mb-3">
          <div class="row py-4">
             <!-- Reviews list-->
             <div class="col-md-7">
                <div class="d-flex justify-content-end pb-4">
                   <div class="d-flex align-items-center flex-nowrap">
                      <label class="fs-sm text-muted text-nowrap me-2 d-none d-sm-block" for="sort-reviews">Sort by:</label>
                      <select class="form-select form-select-sm" id="sort-reviews">
                         <option>Newest</option>
                         <option>Oldest</option>
                         <option>Popular</option>
                         <option>High rating</option>
                         <option>Low rating</option>
                      </select>
                   </div>
                </div>
                @if($reviews->count()>0)
                @foreach ($reviews as $review)

                <!-- Review-->
                <div class="product-review pb-4 mb-4 border-bottom">
                   <div class="d-flex mb-3">
                      <div class="d-flex align-items-center me-4 pe-2">
                         <img class="rounded-circle" src="{{ asset($review->imageUrl) }}" width="50" alt="Rafael Marquez">
                         <div class="ps-3">
                            <h6 class="fs-sm mb-0">{{ $review->name }}</h6>
                            <span class="fs-ms text-muted">{{ date('M d-Y',strtotime($review->created_at)) }}</span>
                         </div>
                      </div>
                      <div>
                        <div class="star-rating">

@php
$rating = $review->rating    
@endphp 
                       @for($i = 0; $i < $rating; $i++)
                          <i class="star-rating-icon ci-star-filled active"></i>
                       @endfor
                         {{-- <i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i> --}}
                         </div>
                         <div class="fs-ms text-muted">83% of users found this review helpful</div>
                      </div>
                   </div>
                   <p class="fs-md mb-2">{{ $review->review }}</p>
                   <ul class="list-unstyled fs-ms pt-1">
                      <li class="mb-1"><span class="fw-medium">Pros:&nbsp;</span>{{  $review->pros }}</li>
                      <li class="mb-1"><span class="fw-medium">Cons:&nbsp;</span>{{ $review->cons }}</li>
                   </ul>
                   <div class="d-flex flex-wrap quality-img gallery">
                    @php
                    $images =json_decode($review->reviewImages);
                @endphp
                @foreach ($images as $key=>$img)
                      <figure class="figure">
                         <a href="{{ asset($img) }}" class="gallery-item"><img src="{{ asset($img) }}" class="figure-img" alt="..." style="width: 60px;"></a>
                      </figure>
                      @endforeach
                   </div>
                   <div class="text-nowrap">
                      <button class="btn-like" onclick="like(event,{{$review->id}},{{ $review->dataId }})" id="{{$review->id}}like" type="button">{{count(App\Models\review_like::where('review_id',$review->id)->get())}}</button>
                      <button class="btn-dislike" onclick="dislike(event,{{$review->id}},{{ $review->dataId}})" id="{{$review->id}}dislike" type="button">{{count(App\Models\review_dislike::where('review_id',$review->id)->get())}}</button>
                   </div>
                </div>
                @endforeach

                <div class="text-center">
                   <button class="btn btn-outline-accent" type="button"><i class="ci-reload me-2"></i>Load more reviews</button>
                </div>
                @else
                <div class="text-center">
                   <button class="btn btn-outline-accent" type="button"><i class="ci-reload me-2"></i>No reviews</button>
                </div>
                @endif  
             </div>
         
             <!-- Leave review form-->
             <div class="col-md-5 mt-2 pt-4 mt-md-0 pt-md-0">
                <div class="bg-secondary py-grid-gutter px-grid-gutter rounded-3">
                   <h3 class="h4 pb-2">Write a review</h3>
                   <form class="needs-validation" action="{{ route('reviewSubmit') }}" method="post" enctype="multipart/form-data" novalidate>
                    @csrf
                      <!-- File input -->
                      <input type="hidden" name="dataId" value="{{ $response->id }}">
                      <input type="hidden" name="type" value="0">
                      <div class="mb-3">
                         <label for="file-input" class="form-label">Upload Your Photo</label>
                         <input class="form-control" type="file"required  id="file-input" name="imageUrl">
                      </div>
                      <div class="mb-3">
                         <label class="form-label" for="review-name">Your name<span class="text-danger">*</span></label>
                         <input class="form-control" type="text" required id="review-name" name="name">
                         <div class="invalid-feedback">Please enter your name!</div>
                         <small class="form-text text-muted">Will be displayed on the comment.</small>
                      </div>
                      <div class="mb-3">
                         <label class="form-label" for="review-email">Your email<span class="text-danger">*</span></label>
                         <input class="form-control" type="email" required id="review-email" name="email">
                         <div class="invalid-feedback">Please provide valid email address!</div>
                         <small class="form-text text-muted">Authentication only - we won't spam you.</small>
                      </div>
                      <div class="mb-3">
                         <label class="form-label" for="review-rating">Overall Rating<span class="text-danger">*</span></label>
                         <select class="form-select" required id="review-rating" name="rating">
                            <option selected disabled>Choose rating</option>
                            <option value="5">5 stars</option>
                            <option value="4">4 stars</option>
                            <option value="3">3 stars</option>
                            <option value="2">2 stars</option>
                            <option value="1">1 star</option>
                         </select>
                         <div class="invalid-feedback">Please choose rating!</div>
                      </div>
                      <div class="mb-3">
                        <label for="file-input" class="form-label">Upload Images</label>
                        <input class="form-control" type="file"required  id="file-input" name="reviewImages[]" multiple>
                     </div>
                      <div class="mb-3">
                         <b class="mb-3">Ratings</b>
                         <div class="border p-3">
                            <div class="d-flex justify-content-between ">
                               <div class="pr-3">
                                  <label class="form-label">Size</label>
                               </div>
                               <div class="star-rating">
                                  <input type="radio" id="5-stars" name="sizeRating" value="5" />
                                  <label for="5-stars" class="star">&#9733;</label>
                                  <input type="radio" id="4-stars" name="sizeRating" value="4" />
                                  <label for="4-stars" class="star">&#9733;</label>
                                  <input type="radio" id="3-stars" name="sizeRating" value="3" />
                                  <label for="3-stars" class="star">&#9733;</label>
                                  <input type="radio" id="2-stars" name="sizeRating" value="2" />
                                  <label for="2-stars" class="star">&#9733;</label>
                                  <input type="radio" id="1-star" name="sizeRating" value="1" />
                                  <label for="1-star" class="star">&#9733;</label>
                               </div>
                            </div>
                            <div class="d-flex justify-content-between ">
                               <div class="pr-3">
                                  <label class="form-label">Service</label>
                               </div>
                               <div class="star-rating">
                                  <input type="radio" id="5-starsserviceRating" name="serviceRating" value="5" />
                                  <label for="5-starsserviceRating" class="star">&#9733;</label>
                                  <input type="radio" id="4-starsserviceRating" name="serviceRating" value="4" />
                                  <label for="4-starsserviceRating" class="star">&#9733;</label>
                                  <input type="radio" id="3-starsserviceRating" name="serviceRating" value="3" />
                                  <label for="3-starsserviceRating" class="star">&#9733;</label>
                                  <input type="radio" id="2-starsserviceRating" name="serviceRating" value="2" />
                                  <label for="2-starsserviceRating" class="star">&#9733;</label>
                                  <input type="radio" id="1-starsserviceRating" name="serviceRating" value="1" />
                                  <label for="1-starsserviceRating" class="star">&#9733;</label>
                               </div>
                            </div>
                            <div class="d-flex justify-content-between ">
                               <div class="pr-3">
                                  <label class="form-label">Quality</label>
                               </div>
                               <div class="star-rating">
                                  <input type="radio" id="5-starsqualityRating" name="qualityRating" value="5" />
                                  <label for="5-starsqualityRating" class="star">&#9733;</label>
                                  <input type="radio" id="4-starsqualityRating" name="qualityRating" value="4" />
                                  <label for="4-starsqualityRating" class="star">&#9733;</label>
                                  <input type="radio" id="3-starsqualityRating" name="qualityRating" value="3" />
                                  <label for="3-starsqualityRating" class="star">&#9733;</label>
                                  <input type="radio" id="2-starsqualityRating" name="qualityRating" value="2" />
                                  <label for="2-starsqualityRating" class="star">&#9733;</label>
                                  <input type="radio" id="1-starsqualityRating" name="qualityRating" value="1" />
                                  <label for="1-starsqualityRating" class="star">&#9733;</label>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="mb-3">
                         <label class="form-label" for="review-text">Review<span class="text-danger">*</span></label>
                         <textarea class="form-control" rows="3" required id="review-text" name="review"></textarea>
                         <div class="invalid-feedback">Please write a review!</div>
                         <small class="form-text text-muted">Your review must be at least 50 characters.</small>
                      </div>
                      <div class="mb-3">
                         <label class="form-label" for="review-pros">Pros</label>
                         <textarea class="form-control" rows="2" placeholder="Separated by commas" id="review-pros" name="pros" required></textarea>
                      </div>
                      <div class="mb-3 mb-4">
                         <label class="form-label" for="review-cons">Cons</label>
                         <textarea class="form-control" rows="2" placeholder="Separated by commas" id="review-cons" name="cons"></textarea>
                      </div>
                      <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Submit a Review</button>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
@include('websiteLayout.footer')