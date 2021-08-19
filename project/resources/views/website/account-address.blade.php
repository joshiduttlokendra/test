@include('websiteLayout.header')
@include('website.user.sidebar')
        <div class="col-lg-8">

          <div class="bg-white rounded-3 shadow-lg p-4 mb-5 mb-lg-0">
           <!-- Toolbar-->
          <div class=" d-lg-flex justify-content-between align-items-center pt-lg-3 mb-3">
            <h4 class="fs-base  mb-0">Update you profile details below:</h4>
          </div>
          <!-- Addresses list-->
          <div class="table-responsive fs-md">
            <table class="table table-bordered border-success mb-0">
              <thead class="table-success">
                <tr>
                  <th>S.N.</th>
                  <th>Street 1</th>
                  <th>Street 2</th>
                  <th>ZipCode</th>
                   <th>Default</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @php $i=1; @endphp
               @foreach ($response as $res)
                <tr>
                <td>{{  $i++ }}</td>
                  <td class="py-3 align-middle">{{$res->street1}}</td>
                  <td class="py-3 align-middle">{{$res->street2}}</td>
                  <td class="py-3 align-middle">{{$res->zipCode}}</td>
                  <td class="py-3 align-middle">
                    <div class="form-check form-switch">
                      <input type="checkbox" class="form-check-input" id="customSwitch1">
                    
                    </div>
                  </td>
                  <td class="py-3 align-middle"><a class="nav-link-style me-2" href="{{route('editaddress',$res->id)}}" data-bs-toggle="tooltip" title="Edit"><i class="ci-edit"></i></a><a class="nav-link-style text-danger" href="{{route('remove-address', $res->id)}}" data-bs-toggle="tooltip" title="Remove">
                      <div class="ci-trash"></div></a></td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>

          <div class="text-sm-end pt-4"><a class="btn btn-primary" href="#add-address" data-bs-toggle="modal">Add new address</a></div>

        </div>
        </div>
      </div>
    </div>
</section>


<!-- Add New Address-->
    <form class="needs-validation modal fade" method="post" id="add-address" tabindex="-1" action="{{route('insertaddress')}}" novalidate>
      @csrf()
      <input type="hidden" value="{{Auth::user()->id}}" name="userId"/>
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add a new address</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row gx-4 gy-3">
              <div class="col-sm-6">
                <label class="form-label" for="address-fn">Street Address 1</label>
               
                <textarea class="form-control" rows="3"  id="address-fn" name="street1" required></textarea>
                        
                <div class="invalid-feedback">Please fill in you street address 1!</div>
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="address-line1">Street Address 2</label>
            
                <textarea class="form-control" rows="3"  id="address-fn" name="street2"></textarea>
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="address-country">Country</label>
                <select class="form-select countryID" id="address-country"  name="country" required>
                                      @foreach ($countries as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach

                </select>
                <div class="invalid-feedback">Please select your country!</div>
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="address-city">City</label>
                <select name="city" id="city" class="form-select"  >
                    <option>--- Select Country First ---</option>
                  </select>
                <div class="invalid-feedback">Please fill in your city!</div>
              </div>
              
              <div class="col-sm-6">
                <label class="form-label" for="address-ln">Postal Code</label>
                <input class="form-control" type="text" id="address-ln" name="postalCode" required>
                <div class="invalid-feedback">Please fill in you last name!</div>
              </div>
            
                  
            
              
              <div class="col-sm-6">
                <label class="form-label" for="address-zip">ZIP code</label>
                <input class="form-control" type="text" name="zipCode" id="address-zip" required>
                <div class="invalid-feedback">Please add your ZIP code!</div>
              </div>
          
            </div>

            <div class="col-sm-6">
            <label class="form-label" for="address-city">Shipping Address</label>
                                <!-- Inline radio buttons -->
                                
                                 <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="1" name="shippingAddress" id="ex-shipping-1">
                                        <label class="form-check-label" for="ex-shipping-1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="no" name="shippingAddress" id="ex-shipping-2" checked>
                                        <label class="form-check-label" for="ex-shipping-2">No</label>
                                    </div>
              </div> 
              
              <div class="col-sm-6">   
              <label class="form-label" for="address-city">Billing Address</label>
                                <!-- Inline radio buttons -->
                                
              <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="1" name="billingAddress" id="ex-billing-1">
                                        <label class="form-check-label" for="ex-billing-1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="no" name="billingAddress" id="ex-billing-2" checked>
                                        <label class="form-check-label" for="ex-shipping-2">No</label>
                                    </div>
              </div>    
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary btn-shadow" type="submit">Add address</button>
          </div>
        </div>
      </div>
    </form>

	
@include('websiteLayout.footer')