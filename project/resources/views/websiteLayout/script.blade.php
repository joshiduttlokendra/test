@if (Route::currentRouteName() == 'productDetails')
    {{-- <script>
        $(document).ready(function() {
            $('.addToCart').click(function() {
                
                // let color = "{{ $response->color }}";
                let quantity = $('#quantity').val();
                let size = $('#product-size').val();
                let id = $(this).attr('data-id');


                $.ajax({
                    type: "POST",
                    url: "{{ route('addToCart') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        // color: color,
                        quantity: quantity,
                        size: size,

                        type: "{{ Route::currentRouteName() == 'productDetails' ? '1' : '0' }}",

                        id: id,
                    },
                    xhrFields: {
                        withCredentials: true
                    },
                    async: false,
                    crossDomain: true,
                    dataType: "json",

                    success: function(data) {
                        
                       //location.reload();
                        toastr.success(data);
                        location.reload(true/false);
    });

                        
                       


                    },
                    error: function(fail) {
                        toastr.danger('Something Wrong');
                        // alert(fail);
                        console.log("fail");
                        console.log(fail.responseText);
                    },
                });
            });


        });
    </script> --}}
@endif





@if (Route::currentRouteName() == 'cart')

    <script>

        $(document).ready(function() {

            // alert("this");

            // remove from cart

            $('.deleteItem').click(function() {

                // alert("Clicked");

                itemId = $(this).attr('data-id');

                divId = $(this).attr('data-divId');

                divType = $(this).attr('data-type');

                divSize = $(this).attr('data-size');



                $.ajax({

                    type: "POST",

                    url: "{{ route('removeFromCart') }}",

                    data: {

                        _token: "{{ csrf_token() }}",

                        itemId: itemId,

                        divId: divId,

                        divType: divType,

                        divSize: divSize,

                    },

                    xhrFields: {

                        withCredentials: true

                    },

                    async: false,

                    crossDomain: true,

                    dataType: "json",



                    success: function(data) {

                        $(divId).removeClass('d-sm-flex');

                        $(divId).css('display', 'none');

                        // alert(divId);



                    },

                    error: function(fail) {

                        console.log("fail");

                        console.log(fail.responseText);

                    },

                });

            });

            // end remove from cart

            // update cart





        $(".cart1").on("change", function(e){
               //alert("saeema");
                let allIds = JSON.parse($('#totalIds').val());
                var total = 0;
                var newcartQuantity = 0 ;
                
                $.each(allIds, function(index, value) {
                    let pid = value;
                    
                    let divId = "#itemDiv" + value;
                    let quantity = $(divId).attr('data-quantity');
                    let purchaseLaterId = $(divId).attr('data-purchase');
                    let giftId = $(divId).attr('data-gift');
                    let type = $(divId).attr('data-type');
                    let size = $(divId).attr('data-size');
                    let price = $(divId).attr('data-price');
                    
                    let purchase = 0;
                    if ($(purchaseLaterId).prop('checked')) {
                        purchase = 1;
                    }
                    let gift = 0;
                    if ($(giftId).prop('checked')) {
                        gift = 1;
                    }

                    $.ajax({
                        type: "POST",
                        url: "{{ route('updateCart') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            pid: pid,
                            quantity: $(quantity).val(),
                            purchaseLater: purchase,
                            giftId: gift,
                            type: type,
                            size: size,
                        },
                        xhrFields: {
                            withCredentials: true
                        },
                        async: false,
                        crossDomain: true,
                        dataType: "json",

                        success: function(data) {
                            console.log(quantity);
                                let pro_quan = $(quantity).val();
                                let pro_price = $(price).text();
                                let price_arr = pro_price.split('$',2);
                            console.log(price_arr[1]);
                             total += price_arr[1] * pro_quan;
                             newcartQuantity +=parseInt(pro_quan);
                           
                        },
                        error: function(fail) {
                            console.log("fail");
                            console.log(fail.responseText);
                        },
                    });


                });
                toastr.success('Cart Updated');
               
                // console.log(total);
                $('#newCartTotal').text(total);
                $('#newCartItem').text(newcartQuantity);
                $('#subtotalCart').text('$'+total);
           

            });



            // coupon apply

                // coupon apply
 $('.applyCoupon').click(function(e) {

e.preventDefault();

var code1 = $('#couponCode').val();

if(code1 == null)
{
  
    var code= $("#c1").select2('val');
}
else
 {
   
    var code = code1;
    
}

let orderAmount = "{{ $total }}";


$.ajax({

    type: "POST",

    url: "{{ route('verifyCoupon') }}",

    data: {

        _token: "{{ csrf_token() }}",

        code: code,

        orderAmount: orderAmount,

    },

    xhrFields: {

        withCredentials: true

    },

    async: false,

    crossDomain: true,

    dataType: "json",



    success: function(data) {



        // console.log(data.message);

        $('.applyCoupon').text(data.message);

        if (data.data.type != 1) {

            var subtotal = parseInt({{ $total }});

            var discount = parseInt(data.data.amount);

            var discountis = (subtotal * discount) / 100;

            var newPrice = subtotal - discountis;

            var discounti = "" + newPrice + "";

            var result = discounti.split(".");

            $('#subtotalCart').html("$" + result[0] + ".<small>" + result[1] +

                "<small>");

            $('#couponShow').html("Discount : $" + message + "");

        } else {

            var subtotal = parseInt({{ $total }});

            var discount = parseInt(data.data.amount);

            var discountis = (subtotal * discount) / 100;

            var newPrice = subtotal - discountis;

            var discounti = "" + newPrice + "";

            var result = discounti.split(".");

            $('#subtotalCart').html("$" + result[0] + ".<small>" + result[1] +

                "<small>");

            $('#couponShow').html("Discount : $" + discountis + "");

        }

    },

    error: function(fail) {

        console.log("fail");

        console.log(fail.responseText);

    },

});





});
        // end coupon apply



            // end coupon apply



            // save additional comment

            $('#checkoutButton').click(function() {

                let comment = $('#order-comments').val();

                $.ajax({

                    type: "POST",

                    url: "{{ route('additionalComment') }}",

                    data: {

                        _token: "{{ csrf_token() }}",

                        comment: comment,

                    },

                    xhrFields: {

                        withCredentials: true

                    },

                    async: false,

                    crossDomain: true,

                    dataType: "json",



                    success: function(data) {



                        toastr["success"](

                            data

                        )



                    },

                    error: function(fail) {

                        console.log("fail");

                        console.log(fail.responseText);

                    },

                });



            });

        });

    </script>



@endif



@if (Route::currentRouteName() == 'checkout')



    <script>

        $(document).ready(function() {



            $('#checkout-country').change(function() {

                let countryId = $(this).val();



                $.ajax({

                    type: "POST",

                    url: "{{ route('cityByCountry') }}",

                    data: {

                        _token: "{{ csrf_token() }}",

                        countryId: countryId,

                    },

                    xhrFields: {

                        withCredentials: true

                    },

                    async: false,

                    crossDomain: true,

                    dataType: "json",



                    success: function(data) {

                        console.log(data.length);

                        if (data.length == 0) {

                            var html = "<option disabled selected>No Cities Found</option>";

                            $('#checkout-city').append(html);

                        } else {

                            $('#checkout-city').empty();

                            var html = "<option disabled selected>Please Select City</option>";

                            $('#checkout-city').append(html);

                            $.each(data, function(index, value) {



                                var html = "<option value=" + value.id + ">" + value

                                    .name + "</option>";

                                $('#checkout-city').append(html);



                            });





                        }



                    },

                    error: function(fail) {

                        console.log("fail");

                        console.log(fail.responseText);

                    },

                });





            });



            $('#checkout-country2').change(function() {

                let countryId = $(this).val();



                $.ajax({

                    type: "POST",

                    url: "{{ route('cityByCountry') }}",

                    data: {

                        _token: "{{ csrf_token() }}",

                        countryId: countryId,

                    },

                    xhrFields: {

                        withCredentials: true

                    },

                    async: false,

                    crossDomain: true,

                    dataType: "json",



                    success: function(data) {

                        console.log(data.length);

                        if (data.length == 0) {

                            var html = "<option disabled selected>No Cities Found</option>";

                            $('#checkout-city2').append(html);

                        } else {

                            $('#checkout-city2').empty();

                            var html = "<option disabled selected>Please Select City</option>";

                            $('#checkout-city2').append(html);

                            $.each(data, function(index, value) {



                                var html = "<option value=" + value.id + ">" + value

                                    .name + "</option>";

                                $('#checkout-city2').append(html);



                            });





                        }



                    },

                    error: function(fail) {

                        console.log("fail");

                        console.log(fail.responseText);

                    },

                });





            });



        });

    </script>







@endif





<script>

    $(document).ready(function() {
        $(document).on('click','.addToCartt', function() { 
     
            var price = $(this).attr('data-price');
            console.log(price);
            let color = $(this).attr('data-color');
            let type = $(this).attr('data-type');
            console.log(type);
            let quantity = 1;

            let size = $(this).attr('data-size');

            let id = $(this).attr('data-id');

            let buy = 0;

            var attr = $(this).attr('data-buy');



            // For some browsers, `attr` is undefined; for others,

            // `attr` is false.  Check for both.

            if (typeof attr !== 'undefined' && attr !== false) {

                buy = 1;

            }





            $.ajax({

                type: "POST",

                url: "{{ route('addToCart') }}",

                data: {

                    _token: "{{ csrf_token() }}",

                    color: color,

                    quantity: quantity,

                    size: size,

                    attr: attr,

                    type: type,

                    // type: "{{ Route::currentRouteName() == 'productDetails' || 'index' ? '1' : '0' }}",

                    price : price,

                    id: id,

                },

                xhrFields: {

                    withCredentials: true

                },

                async: false,

                crossDomain: true,

                dataType: "json",



                success: function(data) {
                toastr["success"](data);
                    // console.log(data);
                    let cartPrice = $('#newCartTotal').text();
                        // console.log(cartPrice);
                    let newCartTotal = parseFloat(cartPrice)+parseFloat(price) ;
                    // console.log(newCartTotal);
                    $('#newCartTotal').text(newCartTotal);

                    // console.log( $('#newCartTotal').text(newCartTotal));


                    let cartItem = $('#newCartItem').text();

                    let newCartItem = parseInt(quantity) +  parseInt(cartItem) ;

                    // console.log(newCartItem);

                    $('#newCartItem').text(newCartItem);

let route = "{{ Route::currentRouteName()}}";
// console.log(route);
// console.log('#div'+id);
if(route === 'wishList'){
     $('#div'+id).css('display', 'none');  
      $('#div'+id).remove();      
     $.ajax({
            type: "POST",
            url: "{{ route('removeFromWishlist') }}",
            data: {
                _token: "{{ csrf_token() }}",
                itemId: id,
            

            },
            xhrFields: {
                withCredentials: true
            },
            async: false,
            crossDomain: true,
            dataType: "json",

            success: function(data) {
        
                  toastr["success"]( data)

            },
            error: function(fail) {
                console.log("fail");
                console.log(fail.responseText);
            },
        });
                     
 }

 },

                error: function(fail) {

                    console.log("fail");

                    console.log(fail.responseText);

                },

            });

        });



        $('.wishList1').click(function() {
       //26-02-2021
      //  alert("saima");
            let id = $(this).attr('data-id');
           // alert(id);
            let type = $(this).attr('data-type');
          
        
            let price = $(this).attr('data-price');
            let quantity = 1; 
         
            var change = 1;

            if ($(this).hasClass('ci-heart')) {
                $(this).addClass('fas fa-heart');
                $(this).removeClass('ci-heart');
                var change = 1;
            } else {

                $(this).removeClass('fas fa-heart');

                $(this).addClass('ci-heart');

                var change = 0;

            }

            // For some browsers, `attr` is undefined; for others,

            // `attr` is false.  Check for both.

            $.ajax({

                type: "POST",

                url: "{{ route('addToWishList') }}",

                data: {

                    _token: "{{ csrf_token() }}",

                    id: id,

                    type: type,
                    quantity:quantity,
                    price:price,
                    change: change,

                },

                xhrFields: {

                    withCredentials: true

                },

                async: false,

                crossDomain: true,

                dataType: "json",



                success: function(data) {


                   // alert("success");
                   //  alert(data);

                    toastr["success"](

                        data

                    )

                    // location.reload();









                },

                error: function(fail) {
                //    alert("fail");
                    console.log("fail");

                    console.log(fail.responseText);

                },

            });

        });



    });





    //subscription







    $("#subscribe_form").submit(function() {



        let status = 0;

        //let email = document.getElementById("email").val();

        let email = $("#email").val();



        $.post("{{ route('subscribe') }}", {

                status: status,

                email: email,

                _token: "{{ csrf_token() }}"

            },

            function(data) {

                alert("Thanks for subscribe ");

                location.reload();





            });

    });



// $('.buylogin').click(function(e)

// { 
// // alert('yes');
//     // if(Auth::check()){
//       e.preventDefault();  
//       toastr.error('You Have To login First');

//     // }else{
//     //     alert ('no');
//     // }
   



// });



$('#dateofBirth').change(function(e)

{

 

  

    var userDateinput =  $("#dateofBirth").val();

	// alert(userDateinput);

	 

     // convert user input value into date object

	 var birthDate = new Date(userDateinput);

	  //alert( birthDate);

	 

	 // get difference from current date;

	 var difference=Date.now() - birthDate.getTime(); 

	 	 

	 var  ageDate = new Date(difference); 

	 var calculatedAge=   Math.abs(ageDate.getUTCFullYear() - 1970);

     $('#userage').html = calculatedAge;

	 document.getElementById("userage").value =calculatedAge;



});

</script>

<script>

    function like(event, id, pro_id) {

        console.log(id);

        console.log("#" + id + 'like');

        // console.log(like);

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': "{{ csrf_token() }}",

            }

        });

        $.ajax({

            type: 'post',

            url: '{{ url('/reviewLike') }}',

            data: {

                check: id,

                pro_id: pro_id

            },

            success: function(data) {



                // console.log(typeof(data));

                var result = JSON.parse(data);

                console.log(result);

                if (result.response == true) {

                    toastr.success(result.message);

                    $("#" + id + 'like').html(result.count);

                }

                if (result.response == false) {

                    toastr.error(result.message);

                }

            },

            error: function(data) {

                toastr.warning("Something Wrong");

                console.log(data);

            }

        });



    }



    function dislike(event, id, pro_id) {

        console.log(id);

        // console.log(dislike);

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': "{{ csrf_token() }}"

            }

        });

        $.ajax({

            type: 'post',

            url: '{{ url('/reviewDislike') }}',

            data: {

                check: id,

                pro_id: pro_id

            },

            // contentType:false,

            // processData:false,

            success: function(data) {

                console.log(data);

                var result = JSON.parse(data);

                console.log(result);

                if (result.response == true) {

                    toastr.success(result.message);

                    $("#" + id + 'dislike').html(result.count);



                    $(this).html(result.count);

                }

                if (result.response == false) {

                    toastr.error(result.message);

                }

            },

            error: function(data) {

                toastr.warning("Something Wrong");

                console.log(data);

            }

        });

    }

 

</script>
<script>
    
  $("#signup-tab").submit(function(e) {
      $("#err_term_condi1").html('');
        if (!$("input[name='terms']").is(":checked")) {
            e.preventDefault();
            toastr.info('Please Fill Form and Agree Trems and conditions');
            $("#err_term_condi1").html('Please Fill Form and Agree Trems and conditions')
        } 
      
    });
</script>


<script type="text/javascript">



  var _gaq = _gaq || [];

  _gaq.push(['_setAccount', 'UA-36251023-1']);

  _gaq.push(['_setDomainName', 'jqueryscript.net']);

  _gaq.push(['_trackPageview']);



  (function() {

    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;

    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);

  })();



</script>



<!--//   $(document).on('keyup', '#search', function()-->
<!--//   {-->
      
<!--//     var search = $('#search').val();-->
<!--//   //  alert(search);-->
<!--//     $.get("{{ route('product_ajax') }}", {-->

<!--//             search : search ,-->

<!--//             _token: "{{ csrf_token() }}"-->

<!--//       },-->
<!--//             function(data) {-->
<!--//               //alert(data);-->
<!--//               $('#search-data').html(data);-->
<!--//             }-->
<!--//     );-->
<!--//   });-->



{{--  vendor membership  --}}
{{--  vendor membership  --}}
<script>
    $('#membershipVendorId').on('input', function() {
      var  id =  this.value;
    //   alert( this.value );
      $.ajax({
    type: "POST",
    url: "{{url('/membershipVender-Detail')}}",
    data: {
        _token: "{{ csrf_token() }}",
        id: id,
    },
    success:function(data){
    
    console.log(data);
    var res = JSON.parse(data);
    console.log(res);
    var html="";
    var status = "";
    var pro_limit = "";
    
    if(res[0].products==1){
        pro_limit= 'Limited';
    }else{
        pro_limit= 'Unlimited';
    
    }
    if(res[0].status== 1){
        status = 'Active';
    }
    else{
        status = 'Inactive';
    }
    
    html+=`<div class="row"><div class="col-lg-12 col-md-6 ">
                                <div class="subscribe-block">
                                    <div class="price-header">
                                        <h3 class="title">${res[0].name}</h3>
                                        <div class="price"><span class="dollar">$</span>10<span class="month">/Mo</span></div>
                                    </div>
    
                                    <div class="price-body">
                                        <ul>
                                            <li><b>Products :</b> ${pro_limit}</li>
                                            <li><b>Product Limit  :</b>${res[0].productLimit}</li>
                                            <li><b>Product Allowed Date :</b>${res[0].productAllowedDate}</li>
                                            <li><b>Free Advertisements  :</b> ${res[0].freeAdvertisements}</li>
                                            <li><b>Shipping Managements :</b> ${res[0].shippingManagements}</li>
                                            <li><b>Status  :</b> ${status}</li>
                                        </ul>
                                    </div>
                                    <div class="price-footer">
                                        <a class="order-btn" href="javascript:void(0);" onclick="event.preventDefault();toastr.info('Subcription Will Done When payment gateway integrated');">
                                            Subscribe Now<i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            </div>`;
        $('#membership_detail').html(html);
        $('#membership').modal('show');
    
    },
    error:function(data){
        console.log(data);
    },
    });
    });
    
    </script>
    {{--  end  --}}
    <script>
        $('#membershipShopperId').on('input', function() {
          var  id =  this.value;
        //   alert( this.value );
          $.ajax({
        type: "POST",
        url: "{{url('/membershipShopper-Detail')}}",
        data: {
            _token: "{{ csrf_token() }}",
            id: id,
        },
        success:function(data){
    
        console.log(data);
        var res = JSON.parse(data);
        console.log(res);
        var html="";
        var discountType = "";
        if(res[0].discountType==0){
           discountType = 'Percentage';
        }else{
            discountType = 'Fixed';
        }
        var freeShipping="";
        if(res[0].freeShipping==0){
           freeShipping = 'Inactive';
        }else{
            freeShipping = 'Active';
        }
        var shippingTime="";
        if(res[0].shippingTime==0){
           shippingTime = 'Normal';
        }else{
            shippingTime = 'Shorter';
        }
        var status = "";
        if(res[0].status == 1){
        status = 'Active';
        }
        else{
        status = 'Inactive';
        }
        html+=`<div class="row"><div class="col-lg-12">
                                    <div class="subscribe-block">
                                        <div class="price-header">
                                            <h3 class="title">${res[0].name}</h3>
                                            <div class="price"><span class="dollar">$</span>10<span class="month">/Mo</span></div>
                                        </div>
    
                                        <div class="price-body">
                                            <ul>
                                                <li><b>Discount Type</b>${discountType}</li>
                                                <li><b>Discount Value </b>${res[0].discountValue}</li>
                                                <li><b>Free Shipping</b> ${freeShipping}</li>
                                                <li><b>Shipping Time</b>${shippingTime}</li>
                                                <li><b>status</b> ${status}</li>
                                            </ul>
                                        </div>
                                        <div class="price-footer">
                                            // <a class="order-btn" href="">Subscribe Now<i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                </div>`;
            $('#membership_detail').html(html);
            $('#membership').modal('show');
    
        },
        error:function(data){
            console.log(data);
        },
        });
        });
    
        </script>
    
        {{--  end  --}}
        
        
         <script>
    $(document).ready(function() {

        $(".countryID").on("change", function(e) {
            e.preventDefault();
            let id = this.value;
            $.ajax({
                url: "{{ route('get_city') }}",
                method: "POST",
                dataType: "JSON",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                success: function(data) {
                    let size = data.length
                    let i = 0
                    let html = ""
                    while (i < size) {
                        html += "<option value=" + data[i]['id'] + ">" + data[i]['name'] +
                            "</option>"
                        console.log(data[i]['name'])
                        i++
                    }
                    document.getElementById("city").innerHTML = html;


                }

            })
        })

    });

$(document).ready(function() {

$("#countryID1").on("change", function(e) {
    e.preventDefault();
    let id = this.value;
    $.ajax({
        url: "{{ route('get_origin') }}",
        method: "POST",
        dataType: "JSON",
        data: {
            _token: "{{ csrf_token() }}",
            id: id
        },
        success: function(data) {
            let size = data.length
            let i = 0
            let html = ""
            while (i < size) {
                html += "<option value=" + data[i]['id'] + ">" + data[i]['name'] +
                    "</option>"
                console.log(data[i]['name'])
                i++
            }
            document.getElementById("origin").innerHTML = html;


        }

    })
})

});
</script>



<script>


//remove from cart  and add in wishlist
$('.cartremove').change(function() {
    if($(this).is(":checked")) {
                
                itemId = $(this).attr('data-id');
                divId = $(this).attr('data-divId');
                divType = $(this).attr('data-type');
                divSize = $(this).attr('data-size');
              //  alert(itemId);
                $.ajax({
                    type: "POST",
                    url: "{{ route('removeForWishlist') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        itemId: itemId,
                        divId: divId,
                        divType: divType,
                        divSize: divSize,
                    },
                    xhrFields: {
                        withCredentials: true
                    },
                    async: false,
                    crossDomain: true,
                    dataType: "json",

                    success: function(data) {
                        $(divId).removeClass('d-sm-flex');
                        $(divId).css('display', 'none');
                        toastr["success"](

                        data


                    )

                    },
                    error: function(fail) {
                        console.log("fail");
                        console.log(fail.responseText);

                    },
                });
            }  
     });

//remove wishlist from wishlist


$('.deletewishlist').click(function() {
           // alert("click");
                itemId = $(this).attr('data-id');
               divId = $(this).attr('data-divId');
                divType = $(this).attr('data-type');
               

                $.ajax({
                    type: "POST",
                    url: "{{ route('removeFromWishlist') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        itemId: itemId,
                        divId: divId,
                       divType: divType,
                      
                    },
                    xhrFields: {
                        withCredentials: true
                    },
                    async: false,
                    crossDomain: true,
                    dataType: "json",

                    success: function(data) {
                      //  $(divId).removeClass('d-sm-flex');
                     //   $(divId).css('display', 'none');
                        location.reload();

                    },
                    error: function(fail) {
                        console.log("fail");
                        console.log(fail.responseText);
                    },
                });
            }); 

</script>

<script>
        $(document).on('click','.follow_vendor', function(e) { 
                    var vendor_id = $(this).attr('data-id');
                    console.log(vendor_id);
                    $.ajax({
                        type: "POST",
                        url: "{{ route('follow_vendor') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            vendor_id :vendor_id,
                        },
                        xhrFields: {
                            withCredentials: true
                        },
                        async: false,
                        crossDomain: true,
                        dataType: "json",

                        success: function(data) {
                                
                            console.log(data);
                            if(data===1){
                                toastr.success('Follow Successfully'); 
                                $('#follow_btn').html('Unfollow');
                                $('#follow_btn').removeClass('btn btn-sm btn-primary follow_btn follow_vendor');
                                $('#follow_btn').addClass('btn btn-sm btn-danger follow_btn follow_vendor');
                            //    location.reload();
                            }
                            if(data===2){
                                toastr.error('Something Wrong Try after Sometime');
                            }
                            if(data===3){
                                toastr.error('Unfollow Successfully'); 
                                $('#follow_btn').html('Follow');
                                $('#follow_btn').removeClass('btn btn-sm btn-danger follow_btn follow_vendor');
                                $('#follow_btn').addClass('btn btn-sm btn-primary follow_btn follow_vendor');
                                // location.reload();
                            } 
                            if(data===4){
                                toastr.error('Something Wrong Try after Sometime');
                            }
                            if(data==5){
                                toastr.error('Please login First');
                            } 
                         
                        },
                        error: function(fail) {
                            console.log("fail");
                            console.log(fail.responseText);
                        }, 
                    });
                });

          
    </script>
<script>
$('#agree').click(function(e)
{
let email = $("#email1").val();
let dob = $("#dateofBirth").val();
let name = $("#username").val();
let nickname = $("#nickname1").val();
let address = $("#address1").val();
let phone = $("#phone1").val();
let gender = $("#gender1").val();
let age = $("#userage").val();
let  married = $("#married1").val();
let country = $("#countryID1").val();
let city = $("#origin").val();
let hobbies = $("#e1").val();
let password = $("#numeric-password1").val();
let countryOfResidence = $("#countryID1").val();
let countryOfOrigin = $("#origin").val();
let c_password = $("#numeric-password2").val();

let roleId = 3;
    $.post("{{ route('insertUsers') }}", {

        dob: dob,
        name : name,
        nickname : nickname,
        email: email,
        address :address,
        phone : phone,
        gender : gender,
        age : age,
        married : married,
        country : country ,
        city : city ,
        hobbies : hobbies ,
        password : password ,
        c_password : c_password,
        roleId : roleId,
        countryOfResidence : countryOfResidence,
        countryOfOrigin : countryOfOrigin,

        _token: "{{ csrf_token() }}"

        },

        function(data) {
        //   console.log(data);
      
           
          window.location.href="<?=url('termsagreement')?>"+"/"+data;
          
      
          




    }
    );

    });



$('#agree_two').click(function(){
          //  alert('hiiiiii fdsasfda');
            var url="<?=url()->current()?>";
           
            var urlsplit = url.split("/");
            var user_id = urlsplit[urlsplit.length-1];

             
       $('#signin-modal .nav-tabs li a').first().removeClass('active').attr('aria-selected',false);
         $('#signin-modal .nav-tabs li a').last().addClass('active').attr('aria-selected',true);
         $('#signin-tab').removeClass('active show');
         $('#signup-tab').addClass('active show');
        //  $('#signup-tab').attr('user_id',user_id);

        
    
            $('#signin-modal').modal('show');
          

         
//             $.post("{{ route('user_agree') }}", {


//                 user_id:user_id,
//                 _token: "{{ csrf_token() }}"

//          },

// function(data) {
// //   console.log(data);
// alert("hiiii");
// // return false;




// }
// );
            
        //     $.post("{{route('user_agree')}}", {
        //       user_id : user_id,
        //      _token: "{{ csrf_token() }}"

        //       },

        //   function(data) {
     
        //     $('#signin-modal').modal();      
        // });

});


</script>



<script>

    
const process_data = (response) => {

if (response != null) {
   let output = "";

   $.each(response, (index, value) => {
    let route = 'productDetails/'+value.id;

        output += `   <a href="https://scoutin.devs.pearl-developer.com/${route}" class="list-group-item list-group-item-action">${value.name}</a>  `;
        // output += `   <a href="${route}" class="list-group-item list-group-item-action">${value.name}</a>  `;
   });

 
   $('#search-result').html(output);
}
}


    $('.searchbar input').on('keypress', function() {
        var ValInput = $(this).val();
        $.ajax({
        url: "{{ route('autocomplete') }}",
            dataType: "json",
            data: {
                search: ValInput
            },
            success: function(response) {
               process_data(response);
              // $('.search1').html(output);
               $('.searchbox').show();

            }
        });
 });
</script>

<script>
			$('.dblImage').dblclick(function(){
              
				var browse = $(this).attr('file_id');
            
				$('#'+browse).click();
			});
			$('.uploadChange').change(function(){
				var browse = $(this).attr('id');
				$('.'+browse).submit();
			});
			
			$('.content-edit').focusout(function(){
				
				var data = $(this).html();
				var key = $(this).attr('key');

				//alert(key);
				$.post('<?=route("saveDynamicData")?>', { data : data, key : key  ,   _token: "{{ csrf_token() }}",}, function(d){
				});
			});
        CKEDITOR.replace('content-edit');
		</script>