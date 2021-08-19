@extends('adminLayout.layout')
@section('content')

<style>

</style>



    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="container">



                <div class="row">
                    <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">

                    </div>


                </div>







                <div class="row layout-spacing">
                    <div id="flActionButtons" class="col-lg-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Add Users</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form class="form-vertical" action="{{ route('insertUsers') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label class="control-label">Role:</label>
                                        <select name="roleId"  id="roleId" class="form-control">
                                            <option disabled selected>Please Select Roles</option>
                                            @foreach($roles as $role)
                                            <option value="{{ $role->id }}" >{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-4 vendorOptions" >
                                        <label class="control-label">Membership:</label>
                                        <select name="membershipVendorId" class="form-control">
                                            <option disabled selected>Please Select Membership</option>
                                            @foreach($vendorMemberships as $vendorMembership)
                                                <option value="{{ $vendorMembership->id }}" >{{ $vendorMembership->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-4 shopperOptions" >
                                        <label class="control-label">Membership:</label>
                                        <select name="membershipShopperId" class="form-control">
                                            <option disabled selected>Please Select Membership</option>
                                            @foreach($shopperMemberships as $shopperMembership)
                                                <option value="{{ $shopperMembership->id }}" >{{ $shopperMembership->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Name:</label>
                                        <input type="text" name="name" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4 shopperOptions">
                                        <label class="control-label">Nickname:</label>
                                        <input type="text" name="nickname" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Email:</label>
                                        <input type="email" name="email" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4 shopperOptions">
                                        <label class="control-label">D-O-B:</label>
                                        <input type="date" name="dob" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Password:</label>
                                        <input type="password" name="password" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4 shopperOptions">
                                        <label class="control-label">Apt. Number:</label>
                                        <input type="text" name="aptNumber" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4 shopperOptions">
                                        <label class="control-label">City:</label>
                                        <input type="text" name="city" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4 shopperOptions">
                                        <label class="control-label">Country:</label>
                                        <input type="text" name="country" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4 shopperOptions">
                                        <label class="control-label">Zip Code:</label>
                                        <input type="text" name="zipCode" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4 shopperOptions">
                                        <label class="control-label">Postal Code:</label>
                                        <input type="text" name="postalCode" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4 shopperOptions">
                                        <label class="control-label">Phone No:</label>
                                        <input type="number" name="phoneNumber" class="form-control" >
                                    </div>
                                    <div class="form-group mb-4 shopperOptions">
                                        <label class="control-label">Gender:</label>
                                        <select name="gender" class="form-control">
                                            <option value="1" selected>Male</option>
                                            <option value="2" >Female</option>
                                            <option value="3" >Other</option>
                                            <option value="4" >Neutral</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4 shopperOptions">
                                        <label class="control-label">Age:</label>
                                        <select name="age" class="form-control">
                                            <option value="18" selected>18-24</option>
                                            <option value="25" >25-34</option>
                                            <option value="35" >35-44</option>
                                            <option value="45" >45-54</option>
                                            <option value="55" >55-64</option>
                                            <option value="65" >>65</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4 shopperOptions">
                                        <label class="control-label">Marital Status:</label>
                                        <select name="maritalStatus" class="form-control">
                                            <option value="single" selected>Single</option>
                                            <option value="widowed" >Widowed</option>
                                            <option value="separated" >Separated</option>
                                            <option value="divorced" >Divorced</option>
                                            <option value="married" >Married</option>
                                       </select>
                                    </div>
                                    <div class="form-group mb-4 shopperOptions">
                                        <label class="control-label">Children:</label>
                                        <select name="children" class="form-control">
                                            <option value="1" selected>Yes</option>
                                            <option value="0" >No</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4 shopperOptions">
                                        <label class="control-label">Country of residence:</label>
                                        <input name="countryOfResidence" type="text" class="form-control">
                                    </div>
                                    <div class="form-group mb-4 shopperOptions">
                                        <label class="control-label">Country of origin:</label>
                                        <input name="countryOfOrigin" type="text" class="form-control">
                                    </div>
                                    <div class="form-group mb-4 shopperOptions">
                                        <label class="control-label">Hobbies:</label>
                                        <input name="countryOfOrigin" type="text" class="form-control">
                                    </div>
                                    <div class="form-group mb-4 shopperOptions">
                                        <label class="control-label">Categories:</label>
                                        <select name="categories" id="categoriesUser" class="form-control" multiple="multiple">
{{--                                            <option selected disabled>Select Categories</option>--}}
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" >{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="submit" value="Submit" class="btn btn-primary ml-3 mt-3">
                                </form>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!--  END CONTENT AREA  -->








@endsection
