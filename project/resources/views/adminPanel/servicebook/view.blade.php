@extends('adminLayout.layout')
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
                                     
                                        <th>Service Name</th>
                                        <th>Customer</th>
                                        <th>Country</th>
                                        <th>City</th>
                                        <th>Location</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Appointment</th>
                                   
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1; @endphp
                                    @foreach ($response as $res)

                                        <tr>
                                         
                                            <td>{{ App\Models\services::where('id', $res->service_id)->first()->name }}</td>
                                            <td>{{ App\Models\User::where('id', $res->user_id)->first()->name }}</td>
                                            <td>{{ App\Models\country::where('id', $res->country_id)->first()->name }}</td>
                                            <td>{{ App\Models\city::where('id', $res->city_id)->first()->name }}</td>
                                            <td>{{ $res->location }} </td>
                                          
                                            <td>{{ $res->type }}</td>
                                            <td>{{ $res->price }}</td>
                                            <td>{{ $res->appointment }}</td>
                                          
                                      
                                          
                                            <td class="text-center">
                                             <a href="{{ route('deleteServicesBook', $res->id) }}" class="bs-tooltip"
                                                    data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-x-octagon table-cancel">
                                                        <polygon
                                                            points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                        </polygon>
                                                        <line x1="15" y1="9" x2="9" y2="15"></line>
                                                        <line x1="9" y1="9" x2="15" y2="15"></line>
                                                    </svg></a>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                       
                                        <th>Service Name</th>
                                        <th>Customer</th>
                                        <th>Country</th>
                                        <th>City</th>
                                        <th>Location</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Appointment</th>
                                   
                                        <th class="text-center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    @endsection