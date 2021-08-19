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

                                    <th>Image</th>

                                    <th>Name</th>                            

                                    <th>Designation/Role</th>

                                    <th class="text-center">Action</th>

                                </tr>

                                </thead>

                                <tbody>

                                @php $i=1; @endphp

                                @foreach ($response as $res)



                                    <tr>

                                        <td>{{  $i++ }}</td>

                                        <td><img src="{{asset('project/public/uploads/staffImage/'.$res->image)}}" width="100px" height="auto"/></td>                                      

                                        <td>{{  $res->name }}</td>

                                        <td>{{  $res->role}}</td>

                                       

                                        <td class="text-center">

                                           <a href="{{  route('editStaff',$res->id) }}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                                        </a>

                                            <a href="{{  route('deleteStaff',$res->id) }}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-octagon table-cancel"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a>

                                        </td>

                                    </tr>



                                @endforeach

                                </tbody>

                                <tfoot>

                                    <tr>

                                        <th>S.No</th>

                                        <th>Image</th>

                                        <th>Name</th>                                     

                                        <th>Designation/Role</th>

                                        <th class="text-center">Action</th>

                                    </tr>

                                </tfoot>

                            </table>

                        </div>
                        <!-- end table -->

                    </div>

                </div>

            </div>



        </div>



        <!--  END CONTENT AREA  -->

        <!--  END CONTENT AREA  -->







@endsection

