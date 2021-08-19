@extends('adminLayout.layout')
@section('content')

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
                                    <th>vendor Id</th>
                                    <th>Email </th>
                                    <th>Earning</th>
                                    <th>Account Detail </th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach ($response as $res)

                                    <tr>
                                        <td>{{  $i++ }}</td>
                                        <td>{{  $res->vendorId }}</td>
                                        <td>{{$res->email}}</td>
                                        <td>{{$res->earning}}</td>
                                        <td>{{$res->account_detail}}</th>
                                        <td class="text-center">
                                          
                                    <form action="{{route('withdraw_payment')}}" method="post">

                                        @csrf()

                                        <input type="hidden" name="earning_id" value="{{$res->id}}"/>
                                        <input type="hidden" name="vendorId" value="{{$res->vendorId}}"/>
                                        <input type="hidden" name="earning" value="{{$res->earning}}"/>
                                        <input type="hidden" name="email" value="{{$res->email}}"/>
                                        <input type="submit" class="btn btn-primary sm" name="pay" value="Pay"/>
                                    </form>


                                    </td>
                                    </tr>

                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th>S.No</th>
                                    <th>vendor Id</th>
                                    <th>Email </th>
                                    <th>Earning</th>
                                    <th>Account Detail </th>
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