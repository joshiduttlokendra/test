@extends('adminLayout.layout')
@section('content')





<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="container">
        <div class="container">



            <div class="row">
                <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">

                </div>


            </div>




<div class="row">
<div class="col-sm-12">

</div>

</div>


            <div class="row layout-spacing">
                <div id="flActionButtons" class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Total Earning: ${{$response->earning}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form class="form-vertical" action="{{ route('WrequestSent') }}" method="POST">
                                <input type="hidden" name="vendorId" value="{{$response->vendorId}}"/>
                                <input type="hidden" name="earning" value="{{$response->earning}}"/>
                                @csrf()
                          
                                <div class="form-group mb-4">
                                    <label class="control-label">Account Detail:</label>
                                    <textarea class="form-control" name="account_detail" rows="4" id="mailboady" cols="50"></textarea>
                                </div>


                                <input type="submit" value="Sent Request" class="btn btn-primary ml-3 mt-3">
                            </form>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--  END CONTENT AREA  -->








    @endsection