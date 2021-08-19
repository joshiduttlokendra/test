@include('websiteLayout.header')
<section class="section-padding bg-secondary">
     <div class="container ">
      <div class="row justify-content-center align-items-center">

        <div class="col-lg-6 col-12">
          <div class="vendor-accimg">
              <img src="{{asset('website/img/content/login.jpg')}}" alt="" class="img-fluid">
          </div>
        </div>

        <div class="col-lg-6 col-12">
          <div class="card border-0 border-radius-0 shadow">
            <div class="card-body">

              <div class="row py-3">
                <div class="col-md-6 col-6">
                                <h3 class="mb-1 text-uppcase">Vendor Login</h3>

                </div>

                 <div class="col-md-6 col-6">
                           <div class="text-end">
                <div class="d-inline-block align-middle"><a class="btn-social bs-google me-2 mb-2" href="#" data-bs-toggle="tooltip" title="Sign in with Google"><i class="ci-google"></i></a><a class="btn-social bs-facebook me-2 mb-2" href="#" data-bs-toggle="tooltip" title="Sign in with Facebook"><i class="ci-facebook"></i></a><a class="btn-social bs-twitter me-2 mb-2" href="#" data-bs-toggle="tooltip" title="Sign in with Twitter"><i class="ci-twitter"></i></a></div>
              </div>
                </div>
              </div>

              <hr>
              <h3 class="fs-base pt-4 pb-2">Or using form below</h3>
              <form class="needs-validation" method="post" action="{{url('/vendor/login/action')}}" novalidate>
              @csrf
                <div class="input-group mb-3"><i class="ci-mail position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                  <input class="form-control  form-control-lg" type="email"  name="email" placeholder="Email" required>
                </div>
                <div class="input-group mb-3"><i class="ci-locked position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                  <div class="password-toggle w-100">
                    <input class="form-control form-control-lg" type="password" placeholder="Password" name="password" required>
                    <label class="password-toggle-btn" aria-label="Show/hide password">
                      <input class="password-toggle-check  form-control-lg" type="checkbox"><span class="password-toggle-indicator"></span>
                    </label>
                  </div>
                </div>

                 <div class="mb-3 d-flex flex-wrap justify-content-between">
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" id="si-remember">
                  <label class="form-check-label" for="si-remember">Remember me</label>
                </div><a class="fs-sm" href="{{ route('resetpassword') }}">Forgot password?</a>
              </div>

                <hr class="mt-4">
                <div class="d-flex justify-content-between align-items-center pt-4">
                  <button class="btn btn-primary" type="submit"><i class="ci-sign-in me-2 ms-n21"></i>Login Here</button>
                  <b>Don't have an Account: <a href="{{url('/vendor-register')}}">Click Here</a></b>

                </div>


              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
@include('websiteLayout.footer')