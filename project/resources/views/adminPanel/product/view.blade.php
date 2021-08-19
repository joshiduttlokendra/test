@extends('adminLayout.layout')
@section('content')

    <!-- page content  -->




    <!--  BEGIN CONTENT AREA  -->
    <!--  BEGIN CONTENT AREA  -->
    
        <!--  END CONTENT AREA  -->
        <!--  END CONTENT AREA  -->



    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">
                <div class="col-xl-12 layout-spacing">
                    <div class="row">


                        @php $i=1; @endphp
                        @foreach ($response as $res)

                            <div class="col-xl-3 mb-3">
                                <div class="card component-card_2 card-product">
                                    <img src="{{ asset('project/public/' . json_decode($res->imageUrl)[0]) }}" alt="{{ $res->name }}"
                                        class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">Name: {{ $res->name }}</h5>


                                        <h6>S.No : {{ $i++ }}</h6>
                                    <h6>Type : @if ($res->type == 1) Parent @else Child
                                            @endif
                                        </h6>
                                        <h6>Brand: {{ $res->brandName }}</h6>
                                        <h6>Category: {{ $res->categoryName }}</h6>
                                        <h6>Ministore: {{ $res->marketName }}</h6>
                                        <h6>Admin Commission: {{ $res->adminCommission }}%</h6>
                                        <h6>Price: {{ $res->price }}</h6>
                                    <h6>Status: @if ($res->status == 1) Active @else
                                                Inactive @endif
                                        </h6>
                                        <p class="card-text"> {{ $res->info ?? '' }}</p>
                                        <div class="text-center">

                                            <a href="{{ route('deleteProduct', $res->id) }}"
                                                class="btn btn-danger">Delete</a>
                                                <a href="{{ route('editProduct', $res->id) }}" class="btn btn-primary">Edit</a>
                                            </div>
                                    </div>
                                </div>
                            </div>


                        @endforeach
                    </div>



                </div>
            </div>
        </div>
    </div>


@endsection