@include('websiteLayout.header')

<style>
    .star-rating :checked~label {
        color: #4e7820 !important;
    }

    .star-rating label:hover,
    .star-rating label:hover~label {
        color: #4e7820 !important;
    }

</style>

<section class="testimonials-area section-padding bg-secondary">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-12">


                <!-- Widget: Links -->
                <div class="widget widget-links  p-3 shadow-sm bg-white mb-3">
                    <b class="widget-title fs-5">Scoutin Online Rating by our Shoppers</b>
                    <hr class="mb-3">
                    <ul class="widget-list">
                        <li class="widget-list-item">
                            <a href="#" class="widget-list-link d-flex">
                                <div class="star-rating mb-3"><i
                                        class="star-rating-icon ci-star-filled active fs-md"></i><i
                                        class="star-rating-icon ci-star-filled  fs-md active"></i><i
                                        class="star-rating-icon ci-star-filled  fs-md active"></i><i
                                        class="star-rating-icon ci-star-filled fs-md active"></i><i
                                        class="star-rating-icon  fs-md ci-star"></i>
                                </div> Overall Rating
                            </a>
                        </li>
                        <li class="widget-list-item">
                            <a href="#" class="widget-list-link d-flex">
                                <div class="star-rating mb-3"><i
                                        class="star-rating-icon ci-star-filled active fs-md"></i><i
                                        class="star-rating-icon ci-star-filled  fs-md active"></i><i
                                        class="star-rating-icon ci-star-filled  fs-md active"></i><i
                                        class="star-rating-icon ci-star-filled fs-md active"></i><i
                                        class="star-rating-icon  fs-md ci-star"></i>
                                </div>Shopping our Experience
                            </a>
                        </li>
                        <li class="widget-list-item">
                            <a href="#" class="widget-list-link d-flex">
                                <div class="star-rating mb-3"><i
                                        class="star-rating-icon ci-star-filled active fs-md"></i><i
                                        class="star-rating-icon ci-star-filled  fs-md active"></i><i
                                        class="star-rating-icon ci-star-filled  fs-md active"></i><i
                                        class="star-rating-icon ci-star-filled fs-md active"></i><i
                                        class="star-rating-icon  fs-md ci-star"></i>
                                </div>Website Functionalities
                            </a>
                        </li>
                        <li class="widget-list-item">
                            <a href="#" class="widget-list-link d-flex">
                                <div class="star-rating mb-3"><i
                                        class="star-rating-icon ci-star-filled active fs-md"></i><i
                                        class="star-rating-icon ci-star-filled  fs-md active"></i><i
                                        class="star-rating-icon ci-star-filled  fs-md active"></i><i
                                        class="star-rating-icon ci-star-filled fs-md active"></i><i
                                        class="star-rating-icon  fs-md ci-star"></i>
                                </div>Customer Service
                            </a>
                        </li>
                        <li class="widget-list-item">
                            <a href="#" class="widget-list-link d-flex">
                                <div class="star-rating mb-3"><i
                                        class="star-rating-icon ci-star-filled active fs-md"></i><i
                                        class="star-rating-icon ci-star-filled  fs-md active"></i><i
                                        class="star-rating-icon ci-star-filled  fs-md active"></i><i
                                        class="star-rating-icon ci-star-filled fs-md active"></i><i
                                        class="star-rating-icon  fs-md ci-star"></i>
                                </div> Delivery Service
                            </a>
                        </li>
                    </ul>
                </div>


                <div class="widget mb-5  p-3 shadow-sm bg-white">
                    <b class="widget-title fs-5">Write A Review</b>
                    <hr class="mb-3 mt-2">

                    <p>Here you can write a review which regarding our services, product, shopping experinces etc.. </p>

                    <div class="d-block">
                        <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#testModal"><span
                                class="ci-edit pe-3"></span>Review</button>
                    </div>



                </div>



            </div>
            <div class="col-lg-9 col-md-9 col-12">

                <div class="row">
                    @foreach ($data as $d)
                        @php
                            $user = App\Models\User::where('id', $d->userid)->first();
                        @endphp

                        <div class="col-lg-4 col-md-4 col-12">
                            <!-- Testimonial -->
                            <blockquote class="testimonial">
                                <div class="card border-0 shadow-sm">
                                    <span class="testimonial-mark"></span>
                                    <div class="card-body fs-md">{{ $d->testimonal }}</div>
                                    <footer class="d-flex flex-wrap justify-content-between  p-3">
                                        <div class="star-rating mb-3"><i
                                                class="star-rating-icon ci-star-filled active fs-md"></i><i
                                                class="star-rating-icon ci-star-filled  fs-md active"></i><i
                                                class="star-rating-icon ci-star-filled  fs-md active"></i><i
                                                class="star-rating-icon ci-star-filled fs-md active"></i><i
                                                class="star-rating-icon  fs-md ci-star"></i>
                                        </div>
                                        <div class="d-flex">
                                            <img class="rounded" width="50" src="{{asset($user->imageUrl)}}" alt="{{$user->name}}" />
                                            <div class="ps-3">
                                                <h6 class="fs-sm mb-n1">{{$user->name}}</h6>
                                                <span class="fs-ms text-muted">Desperate housewife</span>
                                            </div>
                                        </div>
                                    </footer>
                                </div>
                            </blockquote>
                        </div>
                    @endforeach

                </div>
                <div>
                    <!-- Pagination: basic example -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a href="#" class="page-link">Prev</a>
                            </li>
                            <li class="page-item d-sm-none">
                                <span class="page-link page-link-static">2 / 5</span>
                            </li>
                            <li class="page-item d-none d-sm-block">
                                <a href="#" class="page-link">1</a>
                            </li>
                            <li class="page-item active d-none d-sm-block" aria-current="page">
                                <span class="page-link">
                                    2
                                    <span class="visually-hidden">(current)</span>
                                </span>
                            </li>
                            <li class="page-item d-none d-sm-block">
                                <a href="#" class="page-link">3</a>
                            </li>
                            <li class="page-item d-none d-sm-block">
                                <a href="#" class="page-link">4</a>
                            </li>
                            <li class="page-item d-none d-sm-block">
                                <a href="#" class="page-link">5</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- review form  -->

<!-- Modal markup -->
<div class="modal fade" tabindex="-1" id="testModal" style="z-index: 11;">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <b class="modal-title fs-5 text-white">Testimonials Form</b>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"
                    style="opacity: 1;border: 1px solid #000;filter: invert(1);">

                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('testimonials') }}" method="POST">
                    <!-- Textarea -->
                    @csrf

                    <div class="mb-3">
                        <label for="" class="form-label">Write Your Review Here....</label>
                        <textarea class="form-control" id="" rows="5" placeholder="Description"
                            name="testimonal"></textarea>
                    </div>

                    <div class="mb-3">
                        <b class="mb-3">Ratings</b>
                        <div class="border p-3">
                            <div class="d-flex justify-content-between ">
                                <div class="pr-3">
                                    <label class="form-label">Overall Rating</label>
                                </div>
                                <div class="star-rating">
                                    <input type="radio" id="5-stars" name="overAllRatting" value="5" />
                                    <label for="5-stars" class="star">&#9733;</label>
                                    <input type="radio" id="4-stars" name="overAllRatting" value="4" />
                                    <label for="4-stars" class="star">&#9733;</label>
                                    <input type="radio" id="3-stars" name="overAllRatting" value="3" />
                                    <label for="3-stars" class="star">&#9733;</label>
                                    <input type="radio" id="2-stars" name="overAllRatting" value="2" />
                                    <label for="2-stars" class="star">&#9733;</label>
                                    <input type="radio" id="1-star" name="overAllRatting" value="1" />
                                    <label for="1-star" class="star">&#9733;</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between ">
                                <div class="pr-3">
                                    <label class="form-label">Shopping our Experience</label>
                                </div>
                                <div class="star-rating">
                                    <input type="radio" id="5-starsShopAndExperience" name="ShopAndExperience"
                                        value="5" />
                                    <label for="5-starsShopAndExperience" class="star">&#9733;</label>
                                    <input type="radio" id="4-starsShopAndExperience" name="ShopAndExperience"
                                        value="4" />
                                    <label for="4-starsShopAndExperience" class="star">&#9733;</label>
                                    <input type="radio" id="3-starsShopAndExperience" name="ShopAndExperience"
                                        value="3" />
                                    <label for="3-starsShopAndExperience" class="star">&#9733;</label>
                                    <input type="radio" id="2-starsShopAndExperience" name="ShopAndExperience"
                                        value="2" />
                                    <label for="2-starsShopAndExperience" class="star">&#9733;</label>
                                    <input type="radio" id="1-starsShopAndExperience" name="ShopAndExperience"
                                        value="1" />
                                    <label for="1-starsShopAndExperience" class="star">&#9733;</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between ">
                                <div class="pr-3">
                                    <label class="form-label">Website Functionalities</label>
                                </div>
                                <div class="star-rating">
                                    <input type="radio" id="5-starsWebFunc" name="WebFunc" value="5" />
                                    <label for="5-starsWebFunc" class="star">&#9733;</label>
                                    <input type="radio" id="4-starsWebFunc" name="WebFunc" value="4" />
                                    <label for="4-starsWebFunc" class="star">&#9733;</label>
                                    <input type="radio" id="3-starsWebFunc" name="WebFunc" value="3" />
                                    <label for="3-starsWebFunc" class="star">&#9733;</label>
                                    <input type="radio" id="2-starsWebFunc" name="WebFunc" value="2" />
                                    <label for="2-starsWebFunc" class="star">&#9733;</label>
                                    <input type="radio" id="1-starsWebFunc" name="WebFunc" value="1" />
                                    <label for="1-starsWebFunc" class="star">&#9733;</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between ">
                                <div class="pr-3">
                                    <label class="form-label">Customer Service</label>
                                </div>
                                <div class="star-rating">
                                    <input type="radio" id="5-starsCustomerServices" name="CustomerServices"
                                        value="5" />
                                    <label for="5-starsCustomerServices" class="star">&#9733;</label>
                                    <input type="radio" id="4-starsCustomerServices" name="CustomerServices"
                                        value="4" />
                                    <label for="4-starsCustomerServices" class="star">&#9733;</label>
                                    <input type="radio" id="3-starsCustomerServices" name="CustomerServices"
                                        value="3" />
                                    <label for="3-starsCustomerServices" class="star">&#9733;</label>
                                    <input type="radio" id="2-starsCustomerServices" name="CustomerServices"
                                        value="2" />
                                    <label for="2-starsCustomerServices" class="star">&#9733;</label>
                                    <input type="radio" id="1-starsCustomerServices" name="CustomerServices"
                                        value="1" />
                                    <label for="1-starsCustomerServices" class="star">&#9733;</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between ">
                                <div class="pr-3">
                                    <label class="form-label">Delivery Service</label>
                                </div>
                                <div class="star-rating">
                                    <input type="radio" id="5-starsDeliveryServices" name="DeliveryServices"
                                        value="5" />
                                    <label for="5-starsDeliveryServices" class="star">&#9733;</label>
                                    <input type="radio" id="4-starsDeliveryServices" name="DeliveryServices"
                                        value="4" />
                                    <label for="4-starsDeliveryServices" class="star">&#9733;</label>
                                    <input type="radio" id="3-starsDeliveryServices" name="DeliveryServices"
                                        value="3" />
                                    <label for="3-starsDeliveryServices" class="star">&#9733;</label>
                                    <input type="radio" id="2-starsDeliveryServices" name="DeliveryServices"
                                        value="2" />
                                    <label for="2-starsDeliveryServices" class="star">&#9733;</label>
                                    <input type="radio" id="1-starsDeliveryServices" name="DeliveryServices"
                                        value="1" />
                                    <label for="1-starsDeliveryServices" class="star">&#9733;</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="mt-3 d-grid gap-2 col-4 ms-auto">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>


                </form>


            </div>
        </div>
    </div>
</div>


@include('websiteLayout.footer')
