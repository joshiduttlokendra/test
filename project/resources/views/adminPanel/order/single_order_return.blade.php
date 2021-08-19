@extends('adminLayout.app')
@section('content')






    <!--  BEGIN CONTENT AREA  -->
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="table-responsive mb-4 mt-4">
                            <table id="alter_pagination" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                       
                                        <th>Order Id</th>
                                        <th>User Name</th>
                                        <th>Grand Total</th>
                                        <th>Subtotal</th>
                                        <th>Discount</th>
                                        <th>Product Name</th>
                                        <th>Payment Id</th>
                                     
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                              
                                 
                                    
                                        <tr>
                                           
                                             <td>{{ $response->id }}</td>
                                            <td>{{ $response->uName }}</td>
                                            <td>{{ $response->grandTotal }}</td>
                                            <td>{{ $response->subtotal }}</td>
                                            <td>{{ $response->discount}}</td>
                                            <td>{{$response->pName}}</td>
                                             <td>{{ $response->paymentId }}</td>
                                          
                                        
                                          <td class="text-center">
                                              <a href="{{route('vieworder-return')}}" class="bs-tooltip"
                                                    data-toggle="tooltip" data-placement="top" title="Back"
                                                    data-original-title="View">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-x-octagon table-cancel">
                                                        <polygon
                                                            points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                        </polygon>
                                                        <line x1="15" y1="9" x2="9" y2="15"></line>
                                                        <line x1="9" y1="9" x2="15" y2="15"></line>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>

                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th>S.No</th>
                                        <th>Order Id</th>
                                        <th>User Name</th>
                                        <th>Grand Total</th>
                                        <th>Subtotal</th>
                                        <th>Discount</th>
                                        <th>Product Name</th>
                                        <th>Payment Id</th>
                                     
                                         <th>Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--  END CONTENT AREA  -->
        <!--  END CONTENT AREA  -->

   
        @endsection