<!DOCTYPE html>

<html lang="en">



<head>

    <title>Scoutin-Online Store</title>

    <meta charset="utf-8">

    @yield('share')

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-----chat------>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--end chat-->
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->

    <link rel="stylesheet" media="screen" href="{{ asset('project/public/website/vendor/simplebar/dist/simplebar.min.css') }}" />

    <link rel="stylesheet" media="screen" href="{{ asset('project/public/website/vendor/tiny-slider/dist/tiny-slider.css') }}" />

    <link rel="stylesheet" media="screen" href="{{ asset('project/public/website/vendor/drift-zoom/dist/drift-basic.min.css') }}" />

    <link rel="stylesheet" media="screen" href="{{ asset('project/public/website/vendor/nouislider/distribute/nouislider.min.css') }}">

    <link rel="stylesheet" media="screen" href="{{ asset('project/public/website/vendor/lightgallery.js/dist/css/lightgallery.min.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- Main Theme Styles + Bootstrap-->

    <link rel="stylesheet" media="screen" href="{{asset('project/public/website/css/theme.min.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="{{ asset('js/app.js') }}" ></script>
<script src="{{ asset('js/custom.js') }}" ></script>

<!---service----->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('website/css/datetimepicker.css')}}">
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
</head>

<style type="text/css">

/*----- category menu ------*/
 .navbar-expand-lg .dropdown-menu.show {
  
        display : block!important   
    }
.dropdown .show {

    color: #000 !important;

    background: #ffffff !important;

}



.dropdown .nav-link:focus {

    color: #000 !important;

    background: #ffffff !important;

}





.category-menu {

    height: 500px;

    overflow-y: auto;

}





.searchbox {

    max-height: 400px;

    overflow-y: auto;

}





/*---- end -----*/





/*-----------data title-------------*/



[data-title] {



    position: relative;

    cursor: pointer;

}



[data-title]:hover::before {

    content: attr(data-title);

    position: absolute;

    top: -36px;

    display: inline-block;

    left: -4px;

    padding: 5px 10px;

    border-radius: 2px;

    background: #000;

    color: #fff;

    font-size: 12px;

    font-family: sans-serif;

    white-space: nowrap;

}



[data-title]:hover::after {

    content: '';

    position: absolute;

    top: -10px;

    left: 50%;

    display: inline-block;

    color: #fff;

    border: 8px solid transparent;

    border-top: 8px solid #000;

}





[data-title-left] {



    position: relative;

    cursor: pointer;

}



[data-title-left]:hover::before {

    content: attr(data-title-left);

    position: absolute;

    top: 2px;

    display: inline-block;

    left: -70px;

    padding: 5px 10px;

    border-radius: 2px;

    background: #000;

    color: #fff;

    font-size: 12px;

    font-family: sans-serif;

    white-space: nowrap;

}



[data-title-left]:hover::after {

    content: '';

    position: absolute;

    top: 7px;

    left: -10px;

    display: inline-block;

    color: #fff;

    border: 8px solid transparent;

    border-left: 8px solid #000;

}



/*---------end of data title---------*/















.linkActiveColor {







    color: #FF4081 !important;







}















/* google */







.goog-te-banner-frame.skiptranslate {







    display: none !important;







}







body {







    top: 0px !important;







}







/* google */















.goog-te-banner-frame.skiptranslate,

.goog-te-gadget-icon {







    display: none !important;







}







body {







    top: 0px !important;







}







.goog-tooltip {







    display: none !important;







}







.goog-tooltip:hover {







    display: none !important;







}







.goog-text-highlight {







    background-color: transparent !important;







    border: none !important;







    box-shadow: none !important;







}























body {







    font-family: Arial, Helvetica, sans-serif;







}















/* The Modal (background) */







.modal {







    display: none;







    /* Hidden by default */







    position: fixed;







    /* Stay in place */







    z-index: 1;







    /* Sit on top */







    padding-top: 100px;







    /* Location of the box */







    left: 0;







    top: 0;







    width: 100%;







    /* Full width */







    height: 100%;







    /* Full height */







    overflow: auto;







    /* Enable scroll if needed */







    background-color: rgb(0, 0, 0);







    /* Fallback color */







    background-color: rgba(0, 0, 0, 0.4);







    /* Black w/ opacity */







}















/* Modal Content */







.modal-content {







    position: relative;







    background-color: #fefefe;







    margin: auto;







    padding: 0;







    border: 1px solid #888;







    width: 80%;







    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);







    -webkit-animation-name: animatetop;







    -webkit-animation-duration: 0.4s;







    animation-name: animatetop;







    animation-duration: 0.4s

}















/* Add Animation */







@-webkit-keyframes animatetop {







    from {







        top: -300px;







        opacity: 0

    }















    to {







        top: 0;







        opacity: 1

    }







}















@keyframes animatetop {







    from {







        top: -300px;







        opacity: 0

    }















    to {







        top: 0;







        opacity: 1

    }







}















/* The Close Button */







.close {







    color: white;







    float: right;







    font-size: 28px;







    font-weight: bold;







}















.close:hover,







.close:focus {







    color: #000;







    text-decoration: none;







    cursor: pointer;







}















.modal-header {







    padding: 16px 16px;















    color: white;







}















.modal-body {







    padding: 2px 16px;







}















.modal-footer {







    padding: 2px 16px;


    color: white;


}























@media (min-width: 992px) {







    .navbar-tool:hover .navbar-tool-tooltip {







        top: 100%;







        opacity: .9;







    }







}



#welcomeModal {



    background: url('{{ asset("image/welcomebg.jpg") }}');



    background-size: 100% 100%;



    background-position: center;



    background-repeat: no-repeat;







}







#welcomeModal:after {



    background: #fff;



    position: absolute;



    content: "";



    width: 100%;



    height: 100%;



    top: 0px;



    z-index: -1;



    left: 0px;



    opacity: .5;







}







#welcomeModal .modal-title img {



    height: 70px;



}







#welcomeModal .modal-header {



    align-items: flex-start;



}







#welcomeModal .modal-title {



    text-align: center;



    width: 100%;



}







#welcomeModal .modal-body .content {



    background: #000;



    text-align: center;



    padding: 30px;



}







#welcomeModal .modal-body .content h2 {



    color: #4e7820;



    font-size: 50px;



    font-family: monospace;



    margin-bottom: 0px;



    line-height: 1.2;



}







#welcomeModal .modal-content {



    border-radius: 0px;



}











.btn-welcome {



    color: #fff;



    background: #4e7820;



    padding: 6px 30px;



    font-size: 14px;



    border-radius: 30px;



    text-transform: uppercase;



    margin-bottom: 30px;



    margin-top: 20px;



}







.btn-welcome:hover {



    color: #4e7820;



    background: #fff;







}

</style>

<link rel="stylesheet" media="screen" href="{{ asset('website/css/toastr.css') }}">

</head>

<!-- Body-->



<body>

    @include('website.componets.boot_toastr')

    <!-- Navbar 3 Level (Light)-->

    <header class="shadow-sm">

        <!-- Topbar-->

        <div class="topbar topbar-dark bg-dark">

            <div class="container-fluid">

                <div class="row justify-content-between w-100">

                    <div class="col-lg-3 col-md-4 col-12">

                        <div class="topbar-text text-nowrap d-none d-md-block">

                            <i class="ci-message"></i><a class="topbar-link" href="{{route('chatuser')}}">Chat With Us</a>

                        </div>

                    </div>

                    <div class="col-lg-3 col-md-4 col-12">

                        <div class="tns-carousel tns-controls-static d-none d-md-block text-center">

                            <div class="tns-carousel-inner" data-carousel-options='{"mode": "gallery", "nav": false}'>

                                <div class="topbar-text">free shipping can be over $1,000</div>

                                <div class="topbar-text">We return money within 30 days</div>

                                <div class="topbar-text">Friendly 24/7 customer support</div>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-3 col-md-4 col-4">

                        <div class="ms-3 text-nowrap text-end">

                            <a class="topbar-link me-4  d-md-inline-block" href="{{ url('/vendor-login') }}"><i class="ci-user-circle"></i>Vendor Login |

                                Register</a>

                            {{-- <a class="topbar-link me-4  d-md-inline-block" href="{{ url('/vendor-login') }}"><i class="ci-user-circle"></i>Vendor Login |

                                <a class="topbar-link me-4  d-md-inline-block" href="{{ url('/vendor-register') }}">

                                    Register</a> --}}

                                {{-- ================== --}}

                                <!-- <div id="google_translate_element" style="display: none;"></div>







            <select class="selectpicker" data-width="fit" onchange="translateLanguage(this.value);">







                <option  data-content='<span class="flag-icon flag-icon-us"></span> English' value="English">English</option>







                <option  data-content='<span class="flag-icon flag-icon-es"></span> Spanish' value="Spanish">Spanish</option>







                <option  data-content='<span class="flag-icon flag-icon-fr"></span> French' value="French">French</option>







                <option  data-content='<span class="flag-icon flag-icon-nl"></span> Dutch' value="Dutch">Dutch</option>







          </select>







       </div> -->

                                <!-- <div id="google_translate_element"  class="topbar-text dropdown disable-autohide"></div>







                                 -->

                                <!-- <div class="topbar-text dropdown disable-autohide"><a class="topbar-link dropdown-toggle"







                                    href="#" data-bs-toggle="dropdown"><img class="me-2"







                                        src="{{ asset('website/img/flags/en.png') }}" width="20" alt="English">USD</a>







                                <ul class="dropdown-menu dropdown-menu-end">







                                    <li><a class="dropdown-item pb-1" href="#"><img class="me-2"







                                                src="{{ asset('website/img/flags/fr.png') }}" width="20"







                                                alt="currency">USD</a></li>







                                    <li><a class="dropdown-item pb-1" href="#"><img class="me-2"







                                                src="{{ asset('website/img/flags/de.png') }}" width="20"







                                                alt="currency">BBD</a></li>







                                    <li><a class="dropdown-item" href="#"><img class="me-2"







                                                src="{{ asset('website/img/flags/it.png') }}" width="20"







                                                alt="currency">GYD</a></li>







                                    <li><a class="dropdown-item pb-1" href="#"><img class="me-2"







                                                src="{{ asset('website/img/flags/de.png') }}" width="20"







                                                alt="currency">TTD</a></li>







                                    <li><a class="dropdown-item" href="#"><img class="me-2"







                                                src="{{ asset('website/img/flags/it.png') }}" width="20"







                                                alt="currency">ECD</a></li>







                                </ul>







                            </div> -->

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->

        <div class="navbar-sticky bg-light">

            <div class="navbar navbar-expand-lg navbar-light logo-wrapper py-0">

                <div class="container-fluid">

                    <div class="row align-items-center">
                    <div class="col-md-4 offset-md-4 col-12 order-md-1 order-2">
                        {{-- <div class="col-md-7 col-12 order-md-1 order-2"> --}}

                            <div class="toggler_wrapper">

                                <div class="d-lg-none d-md-none d-block toggle-btn-area">

                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">

                                        <span class="navbar-toggler-icon"></span>

                                    </button>

                                </div>

                                <div class="d-flex justify-content-center py-2 ">

                                    <!-- logo  -->

                                    <a class="navbar-brand d-none d-sm-block flex-shrink-0 py-0 m-0" href="{{ route('index') }}"><img src="{{ asset('website/img/logo.png') }}" width="280"></a>

                                    <a class="navbar-brand d-sm-none flex-shrink-0 pb-0 pt-0 m-0" href="{{ route('index') }}"><img src="{{ asset('website/img/logo.png') }}" width="280"></a>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-4 order-md-2 order-1">

                            <div>

                                <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center justify-content-end mt-1">

                                    <a class="navbar-tool navbar-stuck-toggler" href="#"><span class="navbar-tool-tooltip">Expand menu</span>

                                        <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-menu"></i></div>

                                    </a>

                                    <a class="navbar-tool d-none d-lg-flex" href="{{ route('wishList') }}" data-bs-placement="left"><span class="navbar-tool-tooltip" data-bs-placement="left">

                         

                                                    (<?php echo App\Http\Controllers\Controller::wishlistItems(); ?>)
    Wishlist</span>

                                        <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-heart"></i>

                                        </div>

                                    </a>

                                    <a class="navbar-tool ms-2" href="@if (Auth::user()) {{ route('userDashboard') }} @else #signin-modal @endif" data-bs-toggle="modal"><span class="navbar-tool-tooltip">Hello,

                                            @if (Auth::user())

                                            {{ Auth::user()->nickname }} @else Sign in @endif

                                            <br>My Account</span>

                                        <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>

                                    </a>

                                    <div class="navbar-tool ms-2 "><a class="navbar-tool-icon-box  icon-cart" href="{{ route('cart') }}"><span class="navbar-tool-label" id="newCartItem">

                                                <?php echo App\Http\Controllers\Controller::cartItems(); ?>

                                            </span>

                                            <img src="{{ asset('website/img/content/cart.png') }}" alt="" class="img-fluid navbar-tool-icon">

                                        </a>

                                        </a><a class="navbar-tool-text" href="{{ route('cart') }}"><small>My

                                                Cart</small>$ <span id="newCartTotal">

                                                <?php echo App\Http\Controllers\Controller::cartPrice(); ?></span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu show mt-2 pt-0 pb-2">

                <div class="container-fluid">

                    <div class="collapse navbar-collapse" id="navbarCollapse">

                        <!-- Primary menu-->

                        {{-- {{route('shop','caribbean')}}

                        url('/shop/caribbean') --}}

                        <ul class="navbar-nav m-auto main-menu-wrapper">

                            <li class="nav-item  @if (Route::currentRouteName()=='index' ) active @endif"><a class="nav-link" href="{{ route('index') }}">Home</a>

                            </li>

                            <li class="nav-item @if (Request::url()==route('shop', 'main' )) active @endif"><a class="nav-link " href="{{ route('shop', 'main') }}">Shop</a>

                            </li>

                            <li class="nav-item  @if (Request::url()==route('shop', 'caribbean'







                                )) active @endif"><a class="nav-link @if (Route::currentRouteName()=='shop/caribbean' ) active @endif" href="{{ route('shop', 'caribbean') }}">Caribbean Products </a>

                            </li>

                            <li class="nav-item  @if (Request::url()==route('shop', 'bethrifty'







                                )) active @endif"><a class="nav-link " href="{{ route('shop', 'bethrifty') }}"> Be Thrifty</a>

                            </li>

                            <li class="nav-item @if (Route::currentRouteName()=='servicesWebsite'







                                ) active @endif"><a class="nav-link @if (Route::currentRouteName()=='servicesWebsite' ) active @endif" href="{{ route('servicesWebsite') }}">Services</a>

                            </li>

                            <li class="nav-item @if (Route::currentRouteName()=='aboutUs' ) active @endif"><a class="nav-link @if (Route::currentRouteName()=='aboutUs' ) active @endif" href="{{ route('aboutUs') }}">About Us</a>

                            </li>

                            <li class="nav-item @if (Route::currentRouteName()=='faq' ) active @endif"><a class="nav-link @if (Route::currentRouteName()=='faq' ) active @endif" href="{{ route('faq') }}">FAQs</a>

                            </li>

                            <li class="nav-item @if (Route::currentRouteName()=='contact' ) active @endif"><a class="nav-link @if (Route::currentRouteName()=='contact' ) active @endif" href="{{ route('contact') }}">Scout Support </a>

                            </li>

                            <li class="nav-item @if (Route::currentRouteName()=='testimonials'







                                ) active @endif"><a class="nav-link @if (Route::currentRouteName()=='testimonials' ) active @endif" href="{{ route('testimonials') }}">Testimonials</a>

                            </li>

                            <li class="nav-item @if (Route::currentRouteName()=='vendor' ) active @endif"><a class="nav-link @if (Route::currentRouteName()=='vendor' ) active @endif" href="{{ route('vendor') }}">Vendor</a>

                            </li>

                        </ul>

                    </div>

                </div>

            </div>

            <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu show mt-n2 pt-0 pb-2">

                <div class="container-fluid">

                    <div class="collapse navbar-collapse custom-width" id="navbarCollapse">

                        <div class="row custom-width mt-md-3">

                            <div class="col-md-2">

                                <!-- Departments menu-->

                                <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2">

                                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle ps-lg-0 " href="#" data-bs-toggle="dropdown"><i class="ci-view-grid me-2"></i>Category</a>

                                        <div class="dropdown-menu px-2 pb-4 category-menu">

                                            <?php $categories = App\Http\Controllers\Controller::categories(); ?>

                                            @foreach ($categories as $category)

                                            <div class="d-flex ">

                                                @foreach ($category as $cat)

                                                <div class="mega-dropdown-column pt-3 pt-sm-4 px-2 px-lg-3">

                                                    <div class="widget widget-links"><a class="d-block overflow-hidden rounded-3 mb-3" href="{{ route('cproduct', $cat->id) }}"><img src="{{ asset('/project/public'.$cat->imageUrl) }}" alt="Clothing"></a>

                                                        <h6 class="fs-base mb-2">{{ $cat->name }}</h6>

                                                        <ul class="widget-list">

                                                            @foreach ($cat->subCat as $subCat)

                                                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="{{ route('cproduct', $cat->id) }}">{{ $subCat->name }}</a>

                                                            </li>

                                                            @endforeach

                                                        </ul>

                                                    </div>

                                                </div>

                                                @endforeach

                                            </div>

                                            @endforeach

                                        </div>

                                    </li>

                                </ul>

                            </div>
        <div class="col-md-8">
                                    <form action="{{route('shop','main')}}" method="get">
                                        @csrf()
                            <div class="input-group d-none d-lg-flex searchbar">
                          <input class="form-control text-center search1  pe-5" type="text" placeholder="What are you Scoutin for today ?" name="search">
                          <i class="ci-search position-absolute top-50 end-0 translate-middle-y text-white fs-base me-3"></i>

                          <div class="searchbox position-absolute w-100 start-0 top-100  shadow-sm" style="display: none;">
                          </div>
                                </div>
                                    </form>
                                </div>
                           {{--<div class="col-md-8">

                                <div class="input-group d-none d-lg-flex searchbar">

                                    <input class="form-control text-center  pe-5" type="text" placeholder="What are you Scoutin for today ?"><i class="ci-search position-absolute top-50 end-0 translate-middle-y text-white fs-base me-3"></i>

                                    <div class="searchbox position-absolute w-100 start-0 top-100  shadow-sm" style="display: none;">

                                        <?php 



                                use App\Models\products;



                                $response1 = products::all();



                            ?>

                                        <div class="list-group list-group-flush" id="search-result">

                                        </div>

                                    </div>

                                </div>

                            </div>--}}

                            <div class="col-md-2"></div>

                        </div>

                    </div>

                    <!-- Search-->

                    <div class="input-group d-lg-none searchbar my-3">

                        <input class="form-control " type="text" placeholder="What are you Scoutin for today ?"><i class="ci-search position-absolute top-50 end-0 translate-middle-y text-white fs-base me-3"></i>

                        <div class="searchbox position-absolute w-100 start-0 top-100 shadow-sm" style="display: none;">

                            <div class="list-group list-group-flush">

                                <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>

                                <a href="#" class="list-group-item list-group-item-action ">Active item here</a>

                                <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>

                                <a href="#" class="list-group-item list-group-item-action ">Disabled item here</a>

                                <a href="#" class="list-group-item list-group-item-action">Vestibulum at eros</a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </header>