@include('websiteLayout.header')
@include('website.user.sidebar')
  <div class="col-lg-8">

    <div class="bg-white rounded-3 shadow-lg p-4 mb-5 mb-lg-0">
     <!-- Toolbar-->
     <div class=" d-lg-flex justify-content-between align-items-center pt-lg-3 mb-3">
      <h4 class="fs-base  mb-3">My Wallet and subscribe plans :</h4>
    </div>



    <div class="row mx-n2 pt-2">
                  <div class="col-md-6 col-sm-6 px-2 mb-4">
                    <div class="bg-secondary h-100 rounded-3 p-4 text-center">
                      <h4 class="fs-sm text-muted">Total Earnings</h4>
                      <p class="h2 mb-2">$1,690.<small>50</small></p>
                      <p class="fs-ms text-muted mb-0">Sales 8/1/2021 - 8/15/2021</p>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 px-2 mb-4">
                    <div class="bg-secondary h-100 rounded-3 p-4 text-center">
                      <h4 class="fs-sm text-muted">Your balance</h4>
                      <p class="h2 mb-2">$1,375.<small>00</small></p>
                      <p class="fs-ms text-muted mb-0">To be paid on 8/15/2021</p>
                    </div>
                  </div>
                 
                </div>

  
    <div class="table-responsive">
                  <table class="table table-layout-fixed fs-sm  mb-0">
                    <thead>
                      <tr>
                        <th><b>Plan Name</b></th>
                        <th><b>Amount</b></th>
                       
                        <th><b>Date Started </b></th>
                         <th><b>Date Expired</b></th>
                         <th><b>Status</b></th>
                      </tr>
                    </thead>
                    <tbody>
                    
                      <tr>
                        <td>Scout Supreme</td>
                        <td>$2,060.80</td>
                        <td>Jan 8, 2018</td>
                        <td>May 15, 2019</td>
                        <td><span class="badge bg-success">Running</span></td>
                      </tr>
                        <tr>
                        <td>Scout Supreme</td>
                        <td>$789.80</td>
                        <td>Jan 8, 2018</td>
                        <td>May 15, 2019</td>
                        <td><span class="badge bg-danger">Expired</span></td>
                      </tr>


                         <tr>
                        <td>Scout Supreme</td>
                        <td>$2,0</td>
                        <td>Jan 8, 2018</td>
                        <td>May 15, 2019</td>
                        <td><span class="badge bg-danger">Expired</span></td>
                      </tr>


                         <tr>
                        <td>Scout Supreme</td>
                        <td>$2,06</td>
                        <td>Jan 8, 2018</td>
                        <td>May 15, 2019</td>
                        <td><span class="badge bg-success">Running</span></td>
                      </tr>

                   
                    </tbody>
                  </table>
                </div>



      <!-- Pagination: with icons -->

    </div>




  </div>
</div>
</div>
</div>
</section>


@include('websiteLayout.footer')