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
                                    <th>Type</th>
                                    <th>Parent Product</th>
                                    <th>Brand</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Market</th>
                                    <th>Admin Commission</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th class="text-center">Approve</th>
                                    <th class="text-center">Cancle</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach ($response as $res)

                                    <tr>
                                        <td>{{  $i++ }}</td>
                                        <td>@if($res->type == 1) Parent @else Child @endif</td>
                                        <td>{{  $res->parentName }}</td>
                                        <td>{{  $res->brandName }}</td>
                                        <td>{{  $res->categoryName }}</td>
                                        <td>{{  $res->name }}</td>
                                        <td>{{  $res->marketName }}</td>
                                        <td>{{  $res->adminCommission }}%</td>
                                        <td>{{  $res->price }}</td>
                                        <td>@if($res->status == 1)Active @else Inactive @endif</td>
                                        <td><a href="{{ route('approveProduct',$res->id) }}" class="btn btn-info"><i class="fa fa-check"></i></button></td>
                                        <td class="text-center">
                                            {{--                                            <a href="{{  route('editIndustry',$dt->id) }}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-octagon table-edit"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a>--}}
                                            <a href="{{  route('deleteProduct',$res->id) }}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-octagon table-cancel"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a>


                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>S.No</th>
                                    <th>Type</th>
                                    <th>Parent Id</th>
                                    <th>Brand</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Market</th>
                                    <th>Admin Commission</th>
                                    <th>Price</th>
                                    <th>Status</th>
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
