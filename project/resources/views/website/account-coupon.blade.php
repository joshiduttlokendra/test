@include('websiteLayout.header')
@include('website.user.sidebar')
        <div class="col-lg-8">

          <div class="bg-white rounded-3 shadow-lg p-4 mb-5 mb-lg-0">
           <!-- Toolbar-->
         <div class=" d-lg-flex justify-content-between align-items-center pt-lg-3 mb-3">
            <h4 class="fs-base  mb-0">My Order List:</h4>
          </div>
          <!-- Orders list-->
          <div class="table-responsive fs-md mb-4">
            <table class="table table-hover mb-0">
              <thead>
                <tr>
                  <th>Coupon Code</th> 
                  <th>Amount</th>
                  <th>Uses</th>               
                  <th>Type</th>                
                  <th>Min Order </th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($response as $res)

                <tr>
                <td class="py-3">{{$res->code}}</td>
                  <td class="py-3">{{$res->amount}}</td>
                  <td>{{  $res->multiUses == 1 ? 'Multiple':'Single'}}</td>
                
                
                  <td>{{  $res->type == 1 ? 'Fixed':'Percentage'}}</td>
               
                  <td>${{  $res->minOrder }}</td>
                  <td><span class="badge bg-info m-0">{{  $res->status == 1 ? 'Active':'InActive'}}</span></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
       
          {{ $response->links() }}

        </div>
        </div>
      </div>
    </div>
</section>


@include('websiteLayout.footer')