@extends('adminLayout.layout')

@section('content')

<div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row layout-spacing">
                    <!-- Content -->
                    <div class="col-xl-12 col-lg-12 layout-top-spacing">
                        <div class="user-profile layout-spacing">
                            <div class="widget-content widget-content-area">
                                <div class="d-flex justify-content-between">
                                    <h3 class="">Profile</h3>
                                  <!--   <a href="user_account_setting.html" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                            <path d="M12 20h9"></path>
                                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                        </svg></a> -->
                                </div>
                                <div class="user-info d-flex">
                                    <div>
                                        <img src="{{asset('admin/assets/img/profile-3.jpg')}}" alt="avatar">
                                    </div>
                                    <div class="user-info-list">
                                       <!--  <p class="">Jimmy Turner</p> -->
                                       <a href="" class="btn btn-primary btn-sm shadow-sm">Change Profile icon</a>
                                        <ul class="contacts-block list-unstyled ml-0 py-1">
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="9" cy="7" r="4"></circle>
                                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                </svg><b>Followers: </b> 4365
                                            </li>
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag">
                                                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                    <line x1="3" y1="6" x2="21" y2="6"></line>
                                                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                                                </svg><b>Orders: </b> 112
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <h4>Basic Information</h4>
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class=" basic-information">
                                            <div class="info-h">Date Joined ScoutiN.Online : </div>
                                            <div class="info-d">August 31st 2021</div>
                                        </div>
                                        <div class=" basic-information">
                                            <div class="info-h">Company Name : </div>
                                            <div class="info-d"> Zusy Natural Skincare</div>
                                        </div>
                                        <div class=" basic-information">
                                            <div class="info-h">Owner / Manager Name : </div>
                                            <div class="info-d">Geofry Singh</div>
                                        </div>
                                        <div class=" basic-information">
                                            <div class="info-h">Email Address : </div>
                                            <div class="info-d">zusynaturalskincare@gmail.com</div>
                                        </div>
                                        <div class=" basic-information">
                                            <div class="info-h">Password : </div>
                                           <div class="info-d"><span class="mr-3">xxx xxxx xxxx xxxx </span><a href="" class="btn btn-primary btn-sm shadow-sm">Change Password</a></div>
                                        </div>
                                        <div class=" basic-information">
                                            <div class="info-h">Mobile Number : </div>
                                            <div class="info-d">1 868 313 4565</div>
                                        </div>
                                        <div class=" basic-information">
                                            <div class="info-h">Country : </div>
                                            <div class="info-d">Trinidad & Tobago</div>
                                        </div>
                                        <div class=" basic-information">
                                            <div class="info-h">City : </div>
                                            <div class="info-d">Belmont</div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class=" basic-information">
                                            <div class="info-h">Membership Package : </div>
                                            <div class="info-d"><span class="mr-3">ScoutiN Supreme</span> <a href="" class="btn btn-primary btn-sm shadow-sm">Change Membership Package</a></div>
                                        </div>
                                        <div class=" basic-information">
                                            <div class="info-h">Credit Cards : </div>
                                            <div class="info-d"><span class="mr-3">xxx xxxx xxxx xxxx </span><a href="" class="btn btn-primary btn-sm shadow-sm">Add or Remove credit cards</a></div>
                                        </div>
                                        <div class=" basic-information">
                                            <div class="info-h">Payment Information : </div>
                                            <div class="info-d">Republic Bank Ltd</div>
                                        </div>
                                        <div class=" basic-information">
                                            <div class="info-h">Acct No : </div>
                                            <div class="info-d"><span>xxxx xxxx xxxx xxxx xxxx</span><a href="" class="btn btn-primary btn-sm shadow-sm">Add or Remove accounts receivable information</a> </div>
                                        </div>
                                  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

@endsection