@include('websiteLayout.header')
<section class="checkout-area section-padding bg-secondary">
	   <div class="container pb-5 mb-2 mb-md-4">
      <div class="row">
      <div class="col-lg-3"></div>
        <div class="col-lg-6">
        	<div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
<div class="shipping-address">

<form action="{{route('codematch')}}" method="POST">
    @csrf
       <!-- Shipping address-->
<h2 class="h4 pt-1 pb-3 mb-3 border-bottom">Enter security code 
</h2>
@if(!empty(Session::get('user_email')))
<h6>Please check your emails for a message with your code. Your code is 6 numbers long.</h6>
<h6><b>We sent your code to : <?php echo session::get('user_email'); ?></b></h6>
@endif
<div class="row">
<div class="col-sm-12">
  <div class="mb-3">
  
    <input class="form-control" type="text" name="code" placeholder="Enter Code" id="checkout-fn" required>
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
        <div class="col-lg-3"></div>
      </div>
       </div>
</section>
@include('websiteLayout.footer')
