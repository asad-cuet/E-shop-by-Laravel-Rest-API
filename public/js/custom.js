$(document).ready(function(){


       $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });


         function loadcart()
         {
               $.ajax({
                    method:"GET",
                    url:"/load-cart-data",
                    success:function(response)
                    {
                         //alert(response.count);
                         //$('.cart-count').html(''); 
                         $('.cart-count').html(response.cartcount); 
                         $('.wish-count').html(response.wishcount); 
                    }
               });
         }
         loadcart();

            $('.addToCartBtn').click(function(e){
               e.preventDefault();
               var product_id=$(this).closest('.product_data').find('.prod_id').val();
               var product_qty=$(this).closest('.product_data').find('.qty-input').val();
               
      

               $.ajax({
                     method:"POST",
                     url:"/add-to-cart",
                     data:{
                           'product_id':product_id,
                           'product_qty':product_qty,
                     },
                     success:function(response,res) {
                          //alert(res);
                          swal(response.status);
                          loadcart();
                          
                     }
               });
            });



            $('.addToWishlist').click(function(e){
               e.preventDefault();
               var product_id=$(this).closest('.product_data').find('.prod_id').val();
               
      

               $.ajax({
                     method:"POST",
                     url:"/add-to-wishlist",
                     data:{
                           'prod_id':product_id                     },
                     success:function(response) {
                          swal(response.status); 
                          loadcart(); 
                     }
               });
            });



            $('.increment-btn').click(function(e){
                  e.preventDefault();

                  var inc_value=$(this).closest('.product_data').find('.qty-input').val();
                  var value=parseInt(inc_value,10);
                  value=isNaN(value) ? 0:value;
                  if(value<10)
                  {
                        value++;
                        $(this).closest('.product_data').find('.qty-input').val(value);
                  }
            });


            $('.decrement-btn').click(function(e){
                  e.preventDefault();

                  var dec_value=$(this).closest('.product_data').find('.qty-input').val();
                  var value=parseInt(dec_value,10);
                  value=isNaN(value) ? 0:value;
                  if(value>1)
                  {
                        value--;
                        $(this).closest('.product_data').find('.qty-input').val(value);
                  }
            });


            $(document).on('click','.delete-cart-item',function(e){
                  e.preventDefault();

                  var cart_id=$(this).closest('.product_data').find('.cart_id').val();




                  $.ajax({
                        method:"POST",
                        url:"/delete-cart-item",
                        data:{
                              'cart_id':cart_id
                        },
                        success:function(response) {
                        $('.cartitems').load(location.href+" .cartitems");      
                        swal("",response.status, "success");
                        loadcart();
                        }
                  });

            });



            $(document).on('click','.delete-wishlist-item',function(e){
                  e.preventDefault();


                  var wish_id=$(this).closest('.product_data').find('.wish_id').val();




                  $.ajax({
                        method:"POST",
                        url:"/delete-wishlist-item",
                        data:{
                              'wish_id':wish_id
                        },
                        success:function(response) {
                        $('.wishlistitems').load(location.href+" .wishlistitems");       
                        swal("",response.status, "success");
                        loadcart();
                        }
                  });

            });

            $('.changeQuantity').click(function(e){
                  e.preventDefault();

                  var cart_id=$(this).closest('.product_data').find('.cart_id').val();
                  var qty=$(this).closest('.product_data').find('.qty-input').val();




                  $.ajax({
                        method:"POST",
                        url:"/update-cart",
                        data:{
                              'cart_id':cart_id,
                              'prod_qty':qty,
                        },
                        success:function(response) {
                        if(response.status=='out_of_stock')
                        {
                              var val=$('.qty-input').val();
                              val--;
                              $('.qty-input').val(val);
                              swal("Out of stock.Increment Failed");
                        }
                        else 
                        {
                              $('.total').html(response.status);
                        }
                        
                        //console.log(response.status);
                        }
                  });

            });



            

});