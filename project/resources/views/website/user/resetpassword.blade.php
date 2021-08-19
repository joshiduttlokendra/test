@include('websiteLayout.header')
<section class="checkout-area section-padding bg-secondary">
	   <div class="container pb-5 mb-2 mb-md-4">
      <div class="row">
      <div class="col-lg-4"></div>
        <div class="col-lg-4">
        	<div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
<div class="shipping-address">

<form action="{{route('mail-sent')}}" method="POST">
    @csrf
       <!-- Shipping address-->
<h2 class="h4 pt-1 pb-3 mb-3 border-bottom">Reset Password</h2>
<div class="row">
<div class="col-sm-12">
  <div class="mb-3">
    <label class="form-label" for="checkout-fn">	
Please enter your email address  to search for your account.</label>
    <input class="form-control" type="email" name="email" placeholder="@gmail.com" id="checkout-fn" required>
  </div>
</div>

</div>

   




                        </div>
<!-- Navigation (desktop)-->
<div class="d-lg-flex pt-4 mt-3">
<div class="w-50 ps-2"><button type="submit" class="btn btn-primary d-block w-100" href="checkout-shipping.php"><span class="d-none d-sm-inline">Continue</span><span class="d-inline d-sm-none">Next</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></button></div>
</div>
</form>
</div>
            </div>
        </div>
        <div class="col-lg-4"></div>
      </div>
       </div>
</section>
@include('websiteLayout.footer')