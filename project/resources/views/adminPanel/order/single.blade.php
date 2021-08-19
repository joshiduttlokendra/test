@extends('adminLayout.app')
@section('content')

    <div id="content" class="main-content">
        <div class="container-fluid p-5">
            {{-- @php print_r(json_decode($response)) @endphp --}}



            <div class="content">
                <div class="invoice-wrapper rounded border bg-white py-5 px-3 px-md-4 px-lg-5">
                    <div class="d-flex justify-content-between">

                        <h2 class="text-dark font-weight-medium">Invoice
                          @if(!empty($cart_details))  #{{ str_pad($cart_details->id, 6, '0', STR_PAD_LEFT) }} @endif</h2>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-secondary">
                                <i class="mdi mdi-content-save"></i> Save</button>
                            <button class="btn btn-sm btn-secondary">
                                <i class="mdi mdi-printer"></i> Print</button>
                        </div>
                    </div>
                    <div class="row pt-5">
                        <div class="col-xl-3 col-lg-4">
                            <p class="text-dark mb-2">From</p>
                            <address>
                                Company Name
                                <br> 47 Holmes Green, Sophiebury, WP9M 3ZZ
                                <br> Email: example@gmail.com
                                <br> Phone: +91 5264 251 325
                            </address>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <p class="text-dark mb-2">To</p>
                            @if(!empty($cart_details))
                            <address>
                                {{ json_decode($cart_details->shippingAddress)->firstName }}
                                {{ json_decode($cart_details->shippingAddress)->lastName }}
                                <br>{{ json_decode($cart_details->shippingAddress)->streetAddr1 }}
                                <br>{{ json_decode($cart_details->shippingAddress)->streetAddr2 }},
                                <br>City: {{ json_decode($cart_details->shippingAddress)->city }},Country:
                                {{ json_decode($cart_details->shippingAddress)->country }}
                                <br> {{ json_decode($cart_details->shippingAddress)->email }}
                                <br> Email: {{ json_decode($cart_details->shippingAddress)->email }}
                                <br> Phone: {{ json_decode($cart_details->shippingAddress)->phoneNo }}
                            </address>
                           @else
                       
                        
                            <address>
                                {{ json_decode($order_data[0]['shippingAddress'])->firstName }}
                                {{ json_decode($order_data[0]['shippingAddress'])->lastName }}
                                <br>{{ json_decode($order_data[0]['shippingAddress'])->streetAddr1 }}
                                <br>{{ json_decode($order_data[0]['shippingAddress'])->streetAddr2 }},
                                <br>City: {{ json_decode($order_data[0]['shippingAddress'])->city }},Country:
                                {{ json_decode($order_data[0]['shippingAddress'])->country }}
                                <br> {{ json_decode($order_data[0]['shippingAddress'])->email }}
                                <br> Email: {{ json_decode($order_data[0]['shippingAddress'])->email }}
                                <br> Phone: {{ json_decode($order_data[0]['shippingAddress'])->phoneNo }}
                            </address>
                            
                           @endif 
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <p class="text-dark mb-2">Details</p>
                            <address>
                                Invoice ID:
                                @if(!empty($cart_details)) 
                                <span class="text-dark">#{{ str_pad($cart_details->id, 6, '0', STR_PAD_LEFT) }}</span>
                                <br> {{ $cart_details->created_at->format('M d, Y') }}
                                 @else
                                <span class="text-dark">#{{ str_pad($order_data[0]['order_id'], 6, '0', STR_PAD_LEFT) }}</span>
                                <br> {{ $order_data[0]['created_at']->format('M d, Y') }} 
                                @endif
                                <br> VAT: #####################
                            </address>
                        </div>
                    </div>
              
                </div>
            </div>

        </div>
    </div>



@endsection