@include('websiteLayout.header')
<style>

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



<section class="section-padding bg-secondary">
	<div class="container">
		  <div class="price-plan-wrapper">
                    <div class="row">
                        <div class="col-lg-4  col-md-6 ">
                            <div class="subscribe-block">
                                <div class="price-header">
                                    <h3 class="title">Personal</h3>
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
                                    <a class="order-btn" href="">Subscribe Now<i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4  col-md-6 ">
                            <div class="subscribe-block">
                                <div class="price-header">
                                    <h3 class="title">Business</h3>
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
                                    <a class="order-btn" href="">Subscribe Now<i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4  col-md-6 ">
                            <div class="subscribe-block">
                                <div class="price-header">
                                    <h3 class="title">Enterprise</h3>
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
                                    <a class="order-btn" href="">Subscribe Now<i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
	</div>
</section>


@include('websiteLayout.footer')
