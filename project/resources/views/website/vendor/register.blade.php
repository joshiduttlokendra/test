@include('websiteLayout.header')
<style>
.back_button_div {
    text-align: center;
}
    .subscribe-block {
         border: 2px solid #ffffff;
        border-radius: 10px;
        text-align: center;
        padding: 38px 0 40px;
        background: #fff;
        transition: 0.3s ease-in;
        margin-bottom: 30px;
    }
    .subscribe-block:hover {
      border-color: #4e7820;
    }
    .subscribe-block .price-header .title {
      color: #282828;
      font-size: 16px;
      text-transform: uppercase;
      font-weight: 600;
      margin-bottom: 25px;
    }
    .subscribe-block .price-header .price {
      font-size: 50px;
      line-height: 60px;
      color: #282828;
      font-weight: 600;
      margin-bottom: 25px;
    }
    .subscribe-block .price-header .price .dollar {
      font-size: 33px;
      line-height: 33px;
      position: relative;
      top: -12px;
    }
    .subscribe-block .price-header .price .month {
      font-size: 22px;
      line-height: 23px;
    }
    .subscribe-block .price-footer {
      margin-top: 40px;
    }
    .subscribe-block .price-footer .order-btn {
      display: inline-block;
      width: 165px;
      height: 50px;
      line-height: 50px;
      text-align: center;
      border: 2px solid #4e7820;
      font-size: 14px;
      text-transform: uppercase;
      border-radius: 25px;
      color: #282828;
      transition: 0.3s ease-in;
      font-weight: 600;
    }
    .subscribe-block .price-footer .order-btn i {
      font-size: 13px;
      padding-left: 2px;
    }
    .subscribe-block .price-footer .order-btn:hover {
      background-color: #4e7820;
      color: #fff;
      border-color: #4e7820;
    }
    .subscribe-block .price-body ul {
      margin: 0;
      padding: 0;
    }
    .subscribe-block .price-body ul li {
      list-style: none;
      display: block;
      color: #8997a7;
      margin: 27px 0;
    }
    .subscribe-block .price-body ul li:first-child {
      margin-top: 0;
    }
    .subscribe-block .price-body ul li:last-child {
      margin-bottom: 0;
    }

    .pricing-table-2 {
      border: 3px solid #e5e3e3;
      border-radius: 10px;
      text-align: center;
      padding: 38px 0 40px;
      transition: 0.3s ease-in;
      margin-bottom: 30px;
    }
    </style>

<section class="section-padding bg-secondary" id="vendor_reg_page">
    <div class="container ">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h3 class="mb-1 text-uppcase">Vendor Register</h3>

                        <hr>

                        <form class="needs-validation pt-3" id="vendor_reg_form" name="vendor_reg_form" method="POST"
                            action="{{ url('/vendor/register/action') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="normal-input" class="form-label">Name</label>
                                <input class="form-control" type="text" id="" name="name" placeholder="" required>
                                {!! $errors->first('name', "<span class='text-danger'>:message</span>") !!}

                            </div>





                            <!-- Normal input -->
                            <div class="mb-3">
                                <label for="normal-input" class="form-label">Email</label>
                                <input class="form-control" type="email" id="" name="email" placeholder="abc@gmail.com"
                                    required>
                                {!! $errors->first('email', "<span class='text-danger'>:message</span>") !!}

                            </div>

                            <!-- Password visibility toggle -->
                            <div class="mb-3">
                                <label class="form-label" for="pass-visibility">Create Password</label>
                                <div class="password-toggle">
                                    <input class="form-control" type="password" id="pass-visibility" name="password"
                                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                        required>
                                    {!! $errors->first('password', "<span class='text-danger'>:message</span>") !!}

                                    <label class="password-toggle-btn" aria-label="Show/hide password">
                                        <input class="password-toggle-check" type="checkbox">
                                        <span class="password-toggle-indicator"></span>
                                    </label>
                                </div>
                            </div>

                            <!-- Password visibility toggle -->
                            <div class="mb-3">
                                <label class="form-label" for="pass-visibility">Confirm Password</label>
                                <div class="password-toggle">
                                    <input class="form-control" type="password" id="pass-visibility"
                                        name="confirm_password"
                                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                        required>
                                    {!! $errors->first('confirm_password', "<span class='text-danger'>:message</span>") !!}

                                    <label class="password-toggle-btn" aria-label="Show/hide password">
                                        <input class="password-toggle-check" type="checkbox">
                                        <span class="password-toggle-indicator"></span>
                                    </label>
                                </div>
                            </div>



                            <div class="mb-3">
                                <label for="normal-input" class="form-label">Mobile Number</label>
                                <input class="form-control" type="text" id="" name="phoneNumber" placeholder=""
                                    required>
                                {!! $errors->first('phoneNumber', "<span class='text-danger'>:message</span>") !!}

                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="">Country</label>
                                <select name="countryOfResidence" id="countryID" class="form-control">
                                    @foreach ($countries as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach

                                </select>

                                {!! $errors->first('countryOfResidence', "<span class='text-danger'>:message</span>") !!}

                            </div>




                            <div class="mb-3">
                                <label class="form-label" for="">City</label>

                <select name="city" id="city" class="form-control"  >
                    <option>--- Select Country First ---</option>
                  </select>
                                                        {!!$errors->first("city", "<span class='text-danger'>:message</span>")!!}

              </div>


              <div class="mb-3">
                <label class="form-label" for="">Vendor Membership Subscription *
                    {{-- {{ url('/member-subscription') }} --}}
                    <a  class="btn btn-sm btn-warning" href="javascript:void(0);" onclick="subs_plan_detail()"  id="subs_plan_detail">Click here for detail</a></label>
                <select name="membershipVendorId" id="membershipVendorId" class="form-control">
                    <option value="">---- Select Membership ---- </option>
                    @foreach ($membershipVendor as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach

                </select>

                {!! $errors->first('countryOfResidence', "<span class='text-danger'>:message</span>") !!}

            </div>



              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="terms_condition" id="vendorreg-1"  href="#vendor-Terms-And-Agreemnet" data-bs-toggle="modal">
                <label class="form-check-label" data-bs-toggle="modal" name="terms_condition" value="1"  for="vendorreg-1">Terms And Agreemnet of Websites</label>
                <span class='text-danger' id="err_term_condi"></span>
              </div>
               <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="vendor_contact"  id="vendorreg-2"  href="#Vendor-Contact-Agreement" data-bs-toggle="modal">
                <label class="form-check-label" data-bs-toggle="modal"  value="1" for="vendorreg-2" name="vendor_contact">Vendor Contact Agreement</label>
                <span class='text-danger' id="err_vendor_con"></span>

                            </div>




                            <hr class="mt-4">
                            <div class="d-flex justify-content-between align-items-center pt-4">
                                <button class="btn btn-primary" name="submit" type="submit"><i
                                        class="ci-sign-in me-2 ms-n21"></i>Register</button>
                                <b>Already have an account : <a href="{{ url('/vendor-login') }}">Click Here</a></b>

                            </div>


                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-12">
                <div class="vendor-accimg">
                    <img src="{{ asset('website/img/content/register.jpg') }}" alt="" class="img-fluid">
                </div>
            </div>

        </div>
    </div>
</section>

{{-- Vendors Subscription details --}}

    <section class="section-padding bg-secondary" id="vendor_subscription_plan" style="display: none" >
        <div class="container">
              <div class="price-plan-wrapper">
                        <div class="row">
                            @foreach ($membershipVendor as $row )
                            <div class="col-lg-4  col-md-6 ">
                                <div class="subscribe-block">
                                    <div class="price-header">
                                        <h3 class="title">{{ $row->name }}</h3>
                                        <div class="price"><span class="dollar">$</span>10<span class="month">/Mo</span></div>
                                    </div>

                                    <div class="price-body">
                                        <ul>
                                            <li><b>Free</b> Security Service</li>
                                            <li><b>1x</b> Security Service</li>
                                            <li><b>Unlimited</b> Security Service</li>
                                            <li><b>1x</b> Dashboard Access</li>
                                            <li><b>3x</b> Job Listings</li>
                                        </ul>
                                    </div>
                                    <div class="price-footer">
                                        {{-- <a class="order-btn" href="">Subscribe Now<i class="fa fa-arrow-right"></i></a> --}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                       </div>
        <div class="back_button_div">
            <button class="btn btn-primary" onclick="back_button()" id="back_button">Back</button>
        </div>
        </div>
    </section>
    {{-- end --}}


{{-- Terms And Agreemnet of Websites--}}


<form class="needs-validation modal fade vendor_terms"  id="vendor-Terms-And-Agreemnet" tabindex="-1" novalidate>
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row gx-4 gy-3">
          <div class="card-body">
            <h3>Terms And Agreemnet of Websites</h3>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
             <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
                   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
                         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
                   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam </p>
          </div>


          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" id="vendor_Agree_terms_btn" data-bs-dismiss="modal">Agree Terms And Agreemnet of Websites</h3>
          </button>
         <!-- // <button class="btn btn-primary btn-shadow" type="submit">Agree</button> -->
        </div>
      </div>
    </div>
  </form>


{{-- end --}}



{{-- vendor contact agreement  --}}


<form class="needs-validation modal fade vendor_contact"  id="Vendor-Contact-Agreement" tabindex="-1" novalidate>
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row gx-4 gy-3">
          <div class="card-body">
            <h3>Vendor Contact Agreement</h3>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
             <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
                   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
                         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
                   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam dolorum, ipsum eveniet possimus illum. Sequi est illum, alias.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem fugit pariatur molestias saepe officiis. Adipisci at hic debitis a delectus, aperiam </p>
          </div>


          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" id="vendor_Agree_btn" data-bs-dismiss="modal">Agree Vendor Contact</button>
         <!-- // <button class="btn btn-primary btn-shadow" type="submit">Agree</button> -->
        </div>
      </div>
    </div>
  </form>


{{-- end --}}

@include('websiteLayout.footer')
<script>
    // agree vendor contact Agreement
    $('#vendor_Agree_btn').on('click',function(){
        $('#vendorreg-2').prop('checked', true);
    });
    // open vendor agreement form
    $('#Vendor-Contact-Agreement').click(function(){
    if ($(this).is(":checked")) {
            $(".vendor_contact").show('slow');
        } else {
            $(".vendor_contact").hide('slow');
        }
     });

      // agree vendor contact Agreement
    $('#vendor_Agree_terms_btn').on('click',function(){
        $('#vendorreg-1').prop('checked', true);
    });
    // open vendor agreement form
    $('#vendor-Terms-And-Agreemnet').click(function(){
    if ($(this).is(":checked")) {
            $(".vendor_terms").show('slow');
        } else {
            $(".vendor_terms").hide('slow');
        }
     });

    </script>
<script>
    $("#vendor_reg_form").submit(function(e) {
        $("#err_term_condi").html('');
        $("#err_vendor_con").html('');
        if (!$("input[name='terms_condition']").is(":checked")) {
            e.preventDefault();
            toastr.info('Please Fill Form and Agree Trems and conditions');
            $("#err_term_condi").html('Please Fill Form and Agree Trems and conditions')
        } else if (!$("input[name='vendor_contact']").is(":checked")) {
            e.preventDefault();
            toastr.info('Please Fill Form and Agree Trems and conditions');
            $("#err_vendor_con").html('Please Fill Form and Agree Vendor Contact Agreement')
        } else if (!$("input[name='vendor_contact']").is(":checked") && !$("input[name='terms_condition']").is(
                ":checked")) {
            e.preventDefault();
            toastr.info('Agree Terms Condition and vendor contact');
        }
    });
</script>


<script>
    $(document).ready(function() {

        $("#countryID").on("change", function(e) {
            e.preventDefault();
            let id = this.value;
            $.ajax({
                url: "{{ route('get_city') }}",
                method: "POST",
                dataType: "JSON",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                success: function(data) {
                    let size = data.length
                    let i = 0
                    let html = ""
                    while (i < size) {
                        html += "<option value=" + data[i]['id'] + ">" + data[i]['name'] +
                            "</option>"
                        console.log(data[i]['name'])
                        i++
                    }
                    document.getElementById("city").innerHTML = html;


                }

            })
        })

    });
</script>
<script>
    // $(document).ready(function() {
        // $('#subs_plan_detail').on('click',funciton(event){
            // event.preventDefault();
            function subs_plan_detail(){
$('#vendor_subscription_plan').show();
$('#vendor_reg_page').hide();
        }
        // );
    // });

        // $('#back_button').on('click',funciton(event){
        //     event.preventDefault();
function back_button(){
$('#vendor_reg_page').show();
$('#vendor_subscription_plan').hide();
        }
        // );

    </script>