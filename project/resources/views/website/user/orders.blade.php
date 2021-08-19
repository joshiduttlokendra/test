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
                  <th>Order #</th>
                  <th>Date Purchased</th>
                  <th>Status</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($response as $res)

                <tr>
                  <td class="py-3"><a class="nav-link-style fw-medium fs-sm" href="{{ route('invoice',$res->id) }}" data-bs-toggle="modal">{{ $res->id }}</a></td>
                  <td class="py-3">{{ date('M d,Y',strtotime($res->created_at)) }}</td>
                
                  <td class="py-3"><span class="badge bg-info m-0">{{$res->name}}</span></td>
                  <td class="py-3">${{ $res->grandTotal }}</td>
                  <td class="text-center">
                  
                    <a href="{{  route('cancelorder',$res->id) }}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-octagon table-cancel"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a>
                   </td>
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