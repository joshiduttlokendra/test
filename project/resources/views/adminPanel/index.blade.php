@extends('adminLayout.app')
   @section('content')






    
  





    <!--  BEGIN CONTENT AREA  -->
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">
            

            <div class="col-xl-5 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-one">
                            <div class="widget-heading">
                                <h5 class="">All Details</h5>
                            </div>

                            <div class="widget-content">
                                <div class="transactions-list">
                                    <div class="t-item">
                                        <div class="t-company-name">
                                            <div class="t-icon">
                                                <div class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                                </div>
                                            </div>
                                            <div class="t-name">
                                                <h4>Product</h4>
                                              
                                            </div>

                                        </div>
                                        <div class="t-rate rate-dec">
                                            <p><span>{{$product}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="transactions-list">
                                    <div class="t-item">
                                        <div class="t-company-name">
                                            <div class="t-icon">
                                                <div class="avatar avatar-xl">
                                                    <span class="avatar-title rounded-circle">OD</span>
                                                </div>
                                            </div>
                                            <div class="t-name">
                                                <h4>Order</h4>
                                                <!-- <p class="meta-date">4 Aug 1:00PM</p> -->
                                            </div>
                                        </div>
                                        <div class="t-rate rate-inc">
                                            <p><span>{{$order}}</span> 
                                        </div>
                                    </div>
                                </div>

                                <div class="transactions-list">
                                    <div class="t-item">
                                        <div class="t-company-name">
                                            <div class="t-icon">
                                                <div class="avatar avatar-xl">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                                </div>
                                            </div>
                                            <div class="t-name">
                                                <h4>User</h4>
                                                <!-- <p class="meta-date">4 Aug 1</p> -->
                                            </div>

                                        </div>
                                        <div class="t-rate rate-inc">
                                            <p><span>{{$user}}</span> 
                                        </div>
                                    </div>
                                </div>

                               
                            </div>
                        </div>
                    </div>
            </div>

        </div>

        <!--  END CONTENT AREA  -->
        <!--  END CONTENT AREA  -->
  
   @endsection