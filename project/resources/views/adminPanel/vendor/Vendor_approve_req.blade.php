@extends('adminLayout.layout')

@section('content')

<script src="https://use.fontawesome.com/b6035a88b5.js"></script>



    <!-- page content  -->









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

                                    <th>S.No</th>

                                    <th>Name</th>

                                    <th>Email</th>

                                    <th>Phone No.</th>

                                    <th>DOB</th>

                                    <th>Image</th>

                                    <th>Country</th>

                                    <th>Nickname</th>

                                  <th class="text-center">Approve</th>

                                    <th class="text-center">Delete Vendor</th>

                                </tr>

                                </thead>

                                <tbody>
 
                                @php $i=1; @endphp

                                @foreach ($vendorReq as $row)



                                    <tr>

                                      <td>{{  $i++ }}</td>

                                        <td>{{$row->name }}</td>

                                        <td>{{  $row->email }}</td>

                                        <td>{{  $row->phoneNumber }}</td>

                                        <td>{{  $row->dob }}</td>

                                        <td><img src="{{ asset('project/public/'.$row->imageUrl) }}" width="25" height="5"></td>

                                        <td>{{  $row->countryOfResidence }}</td>

                                        <td>{{  $row->nickname }}</td>


                                        <td><a href="{{ route('approveVendor',$row->id) }}" class="btn btn-sm btn-info"><i class="fa fa-check"></i></a></td> 

                                        <td class="text-center">
                                

                                       <a href="{{  route('delete_user',$row->id) }}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-octagon table-cancel"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a>





                                        </td>

                                    </tr>

 

                                @endforeach

                                </tbody>

                                <!--<tfoot>-->

                                <!--<tr>-->

                                <!--    <th>S.No</th>-->

                                <!--    <th>Type</th>-->

                                <!--    <th>Parent Id</th>-->

                                <!--    <th>Brand</th>-->

                                <!--    <th>Category</th>-->

                                <!--    <th>Name</th>-->

                                <!--    <th>Market</th>-->

                                <!--    <th>Admin Commission</th>-->

                                <!--    <th>Price</th>-->

                                <!--    <th>Status</th>-->

                                <!--    <th class="text-center">Action</th>-->

                                <!--</tr>-->

                                <!--</tfoot>-->

                            </table>

                        </div>

                    </div>

                </div>

            </div>



        </div>



        <!--  END CONTENT AREA  -->

        <!--  END CONTENT AREA  -->







@endsection

