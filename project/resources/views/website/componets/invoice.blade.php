<!doctype html>
<html lang="en">
   <head>
      <title></title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <style>
         .invoice {
         background-color: #f8f9fa;
         padding: 40px 0px;
         }
         .buttons {
          margin-bottom: 40px;
          display: flex;
          justify-content: space-between;
          align-items: center;
         }
         .buttons button {
             border-radius: 25px;
         }
         .other-information {
         padding: 30px 0px 10px;
         border-top: 1px solid #dddddd;
         margin-top: 10px;
         }
         .card{
         box-shadow: 1px 0px 5px 0px #dae0e5;
         }
         .invoice .card-header {
         background-color: transparent;
         }
         .invoice h2 {
         font-size: 45px;
         color: #fff;
         margin-bottom: 10px;
         }
         /*.invoice span {
         color: #fff;
         }*/
         .invoice h5 {
         font-size: 17px;
         line-height: 26px;
         color: #3d405c;
         margin: 0 0 3px 0;
         font-family: 'Circular Std Medium';
         }
         .invoice .text-dark {
         color: #495057!important;
         font-size: 17px;
         }
         .invoice-table .table {
         /* border-top: 2px solid #0e2e47; */
         background: #fff;
         box-shadow: 1px 2px 4px 3px #f8f9fa;
         }
         .invoice-table thead {
         background: rgb(0 123 255 / 17%);
         }
         /* .sub-total table {
         box-shadow: 1px 2px 4px 0 #ddd;
         background: #fff;
         }*/
         .sub-total .table td, .table th{
         border: none;
         }
         .other-information p {
         margin-bottom: 5px;
         }
         .total{
         background: rgb(0 123 255 / 10%);
         border: 1px solid rgb(0 123 255 / 25%);
         }
      </style>
   </head>
   <body>
      <!-- /////////////////////////////////invoice section start///////// -->
      <section class="section invoice" id="invoice-section">
         <div class="container">

            <div class="padding">
               <div class="card border-0 mb-0" id="">
                  <div class="card-header p-4">
                     <div class="row justify-content-between">
                        <div class="col-lg-6 col-md-6 col-sm-12 ">

                           <div class=" d-block">


                              <div class="invoice-heading pl-3">
                             <b>Address :</b>
                             @php $address=json_decode($cartId->shippingAddress); @endphp
                              <p class="mb-2">{{ $address->streetAddr1 }}</p>
                              <p class="mb-2">{{ $address->streetAddr2 }}</p>
                              <p class="mb-2">{{ $address->country }} , {{ $address->city }} , {{ $address->zipCode }}</p>

                           </div>
                           </div>

                        </div>

                           <div class="col-lg-4 col-md-4 col-sm-12 text-right">
                           <div class="invoice-heading">
                              <h5 class=""><strong>Price: </strong>$445</h5>
                              <h5><strong>Order on: </strong>{{ date('d M, Y',strtotime($cartId->created_at)) }}</h5>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="row mb-4">
                        <div class="col-lg-12 col-md-8 col-sm-12">
                           <div class="to-client">
                              <h5 class="mb-2">Order Id: {{ $cartId->id }}</h5>
                              {{-- <p class=" mb-3"><strong>Lunch for 80 persons</strong></p> --}}
                              <h4><strong>{{ $address->firstName }} {{ $address->lastName }}</strong></h4>
                              <p>{{  $address->email  }}</p>
                              <p>{{ $address->country }}</p>
                           </div>
                        </div>
                     </div>
                     <div class="invoice-table my-5">
                        <div class="table-responsive-sm">
                           <table class="table">
                              <thead>
                                 <tr>
                                    <th class="center">#</th>
                                    <th>Item</th>
                                    <th class="right">Unit Cost</th>
                                    <th class="center">Qty</th>
                                    <th class="right">Total</th>
                                 </tr>
                              </thead>
                              <tbody>
                                  @php $subTotal=0; @endphp
                                  @foreach ($cart as $key=>$item)
                                  <tr>
                                    <td class="center">{{ $key+1 }}</td>
                                    <td class="left strong">{{ $item['pDetail']->name }}</td>
                                    <td class="right">${{ $item['price'] }}</td>
                                    <td class="center">{{ $item['quantity'] }}</td>
                                    <td class="right">${{ $item['price']*$item['quantity'] }}</td>
                                  @php $subTotal +=$item['price']*$item['quantity']; @endphp

                                 </tr>
                                @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <div class="row justify-content-right">
                        <div class="col-lg-4 col-sm-7 ml-auto">
                           <div class="sub-total">
                              <table class="table table-clear">
                                 <tbody>
                                    <tr>
                                       <td class="left">
                                          <strong class="text-dark">Subtotal</strong>
                                       </td>
                                       <td class="right">${{ $subTotal }}</td>
                                    </tr>
                                    <tr>
                                       <td class="left">
                                          <strong class="text-dark">Discount</strong>
                                       </td>
                                       <td class="right">${{ $cartId->discount }}</td>
                                    </tr>
                                    {{-- <tr>
                                       <td class="left">
                                          <strong class="text-dark">Shipping Charge</strong>
                                       </td>
                                       <td class="right">€2,304,00</td>
                                    </tr> --}}
                                    {{-- <tr>
                                       <td class="left">
                                          <strong class="text-dark">Tax (10%)</strong>
                                       </td>
                                       <td class="right">€2,304,00</td>
                                    </tr> --}}
                                    <tr class="total">
                                       <td class="left">
                                          <strong class="text-dark">Total</strong>
                                       </td>
                                       <td class="right">
                                          <strong class="text-dark">${{ $subTotal-$cartId->discount }}</strong>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     {{-- <div class="other-information">
                        <div>
                           <h5><strong>Notes</strong></h5>
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>

                     </div> --}}
                  </div>
               </div>
            </div>
         </div>
      </section>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </body>
</html>
