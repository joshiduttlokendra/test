@include('websiteLayout.header')
@include('website.user.sidebar')
        <div class="col-lg-8">

          <div class="bg-white rounded-3 shadow-lg p-4 mb-5 mb-lg-0">


          <!-- Toolbar-->
          <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 mb-3">
            <h4 class="fs-base  mb-0">Update you profile details below:</h4>
            
            <a class="btn btn-primary btn-sm "  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ci-sign-out me-2"></i>Sign out
                  
                                  <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                                    @csrf
                                  </form>
                             </a>
          </div>
          <!-- Profile form-->
       
          <form method="post" action="{{route('profile')}}" enctype="multipart/form-data" >
            @csrf()
            <div class="bg-secondary rounded-3 p-4 mb-4">
              <div class="d-flex align-items-center">
              <img class="rounded" src="{{ asset(Auth::user()->imageUrl) }}" width="90" alt="{{ Auth::user()->name }}">
          
                <div class="ps-3" id="imgUpload">                          
                  
                  <a class="btn btn-light btn-shadow btn-sm mb-2" href="#add-address1" data-bs-toggle="modal"><i class="ci-loading me-2" ></i>Change avatar</a>         
                  <div class="p mb-0 fs-ms text-muted">   Upload JPG, GIF or PNG image(300 x 300 required)</div>
                </div>
               </div>
              
            </div>



<!-- Trigger/Open The Modal -->


<!-- The Modal -->

            <div class="row gx-4 gy-3">
              <div class="col-sm-6">
                <label class="form-label" for="account-fn">Name</label>
                <input class="form-control" type="text" id="account-fn" name="name" value="{{ Auth::user()->name}}">
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="account-fn">Nick Name</label>
                <input class="form-control" type="text" id="account-fn" name="nickname" value="{{ Auth::user()->nickname}}">
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="account-email">Date Of Birth</label>
                <input class="form-control" type="date" id="account-email" name="dob" value="{{ Auth::user()->dob }}" >
              </div>
            
            
          

              <div class="col-sm-6">
              <label class="form-label" for="account-email">Gender</label>
                                <!-- Inline radio buttons -->
                              
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="ex-gender-1">
                                        <label class="form-check-label" for="ex-gender-1">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="ex-gender-2" checked>
                                        <label class="form-check-label" for="ex-gender-2">Female</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="ex-gender-3">
                                        <label class="form-check-label" for="ex-gender-3">Other</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="ex-gender-4">
                                        <label class="form-check-label" for="ex-gender-4">Neutral</label>
                                    </div>

</div>







              <div class="col-sm-6">
                <label class="form-label" for="account-email">Email Address</label>
                <input class="form-control" type="email" id="account-email" name="email" value="{{ Auth::user()->email }}" >
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="account-phone">Phone Number</label>
                <input class="form-control" type="text" id="account-phone" name="phoneNumber" value="{{ Auth::user()->phoneNumber }}" required>
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="account-pass">New Password</label>
                <div class="password-toggle">
                 
                  <input type="password"  data-val="" name="old_password" value="" placeholder="xxxxxxxxxx" class="form-control numeric-password" required>
                       
                  <label class="password-toggle-btn" aria-label="Show/hide password">
                    <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                  </label>
                </div>
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="account-confirm-pass">Confirm Password</label>
                <div class="password-toggle">
                <input type="password"  data-val="" name="current_password" value="" placeholder="xxxxxxxxxx" class="form-control numeric-password" required>
                
                  <label class="password-toggle-btn" aria-label="Show/hide password">
                    <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                  </label>
                </div>
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="account-phone">Age</label>
                <input class="form-control" type="text" id="account-phone" name="age" value="{{ Auth::user()->age }}" required>
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="account-phone">Marital Status</label>

                <input class="form-control" type="text" id="account-phone" name="maritalStatus" value="{{Auth::user()->maritalStatus == 1 ? 'Married':'Unmarried'}}" required>
                
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="account-phone"> Country Of Residence</label>

                <input class="form-control" type="text" id="account-phone" name="countryOfResidence" value="{{ $data->cname }}" required>
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="account-phone">  Country Of Origin</label>
                <input class="form-control" type="text" id="account-phone" name="countryOfOrigin" value="{{$data->oname }}" required>
              </div>
              <div class="col-sm-6">
             
                <label class="form-label" for="account-phone"> Hobbies</label>
                                    @foreach (explode('|', $data->hobbies) as $hobby) 
                                    <input type="text" value="{{$hobby}}" class="form-control" disabled/>
                                    @endforeach  
                                <!-- <select multiple id="e1"  class="form-control" name="hobbies[]">
                              
                                <option value="3D printing">3D printing</option>
                                <option value="Blogging">Blogging</option>
                                <option value="Board/tabletop games">Board/tabletop games</option>
                                <option value="Book collecting">Book collecting</option>
                                <option value=">Book discussion clubs">Book discussion clubs</option>
                                <option value="Book restoration">Book restoration</option>
                                <option value="Bullet journaling">Bullet journaling</option>
                                <option value="Chess">Chess</option>
                                <option value="Computer programming">Computer programming</option>
                                <option value="Creative writing">Creative writing</option>
                                <option value="Crossword puzzles">Crossword puzzles</option>
                                <option value="Filmmaking">Filmmaking</option>
                                <option value="Graphic design">Graphic design</option>
                                <option value="Image editing">Image editing</option>
                                <option value="Listening to podcasts">Listening to podcasts</option>
                                <option value="Photography">Photography</option></select> -->
              </div>
     
              <div class="col-12">
                <hr class="mt-2 mb-3">
                <div class="d-flex flex-wrap justify-content-end align-items-center">

                  <button class="btn btn-primary mt-3 mt-sm-0" type="submit">Update profile</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        </div>
      </div>
    </div>


    <form class="needs-validation modal fade" method="post" id="add-address1" tabindex="-1" action="{{route('profilechange')}}" method="post" enctype="multipart/form-data" novalidate>
      @csrf()
      <input type="hidden" value="{{Auth::user()->id}}" name="userId"/>
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add profile</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row gx-4 gy-3">
              <div class="col-sm-6">
                <label class="form-label" for="address-fn">Choose Profile</label>
                <input type="file" class="form-control" id="Pimage" name="image" aria-label="Username" aria-describedby="basic-addon1">
                       
               
              </div>
             
            
          
      
              
             
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary btn-shadow" type="submit">Add </button>
          </div>
        </div>
      </div>
  </form>

  <div id="myModal1" class="modal1">

<!-- Modal content -->


</div>
</section>




@include('websiteLayout.footer')