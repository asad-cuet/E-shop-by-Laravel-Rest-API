
$(document).ready(function(){

      $('.razorpay_btn').click(function(e){
            e.preventDefault();

            var fname=$('.fname').val();
            var lname=$('.lname').val();
            var email=$('.email').val();
            var phone=$('.phone').val();
            var address1=$('.address1').val();
            var address2=$('.address2').val();
            var city=$('.city').val();
            var state=$('.state').val();
            var country=$('.country').val();
            var pincode=$('.pincode').val();
            var flag=0;
            
            if(!fname)
            {
                  fname_error="First Name is Required";
                  $('.#fname_error').html(fname_error);
                  flag=1;
            }
            if(!lname)
            {
                  lname_error="Last Name is Required";
                  $('.#fname_error').html(fname_error);
                  flag=1;
            }
            if(!email)
            {
                  email_error="Email is Required";
                  $('.#fname_error').html(fname_error);
                  flag=1;
            }
            if(!phone)
            {
                  phone_error="Phone is Required";
                  $('.#fname_error').html(fname_error);
                  flag=1;
            }
            if(!address1)
            {
                  address1_error="Address1 is Required";
                  $('.#fname_error').html(fname_error);
                  flag=1;
            }
            if(!city)
            {
                  city_error="City is Required";
                  $('.#fname_error').html(fname_error);
                  flag=1;
            }
            if(!state)
            {
                  state_error="State is Required";
                  $('.#fname_error').html(fname_error);
                  flag=1;
            }
            if(!country)
            {
                  country_error="Country is Required";
                  $('.#fname_error').html(fname_error);
                  flag=1;
            }
            if(!pincode)
            {
                  pincode_error="Pincode is Required";
                  $('.#fname_error').html(fname_error);
                  flag=1;
            }
            if(flag==1)
            {  
            return false;
            }
            else
            {
                  var data={
                     'fname':fname,
                     'lname':lname,
                     'email':email,
                     'phone':phone,
                     'address1':address1,
                     'address2':address2,
                     'city':city,
                     'state':state,
                     'country':country,
                     'pincode':pincode
                  };
                  $.ajax({
                    method:"POST",
                    url:"/proceed-to-pay",
                    data:data,
                    success:function(response)
                    {
                       // alert(response.fname);
                        var options = {
                              "key": "rzp_test_XRpVzatl7Qgfl7", // Enter the Key ID generated from the Dashboard
                              "amount": response.total_price*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                              "currency": "INR",
                              "name": response.fname+' '+response.lname,
                              "description": "Thank you for chosing us",
                              "image": "https://example.com/your_logo",
                             // "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                              "handler": function (responseb){
                                 // alert(responseb.razorpay_payment_id);
                                  //alert("Payment Completed.Click Ok");
                                  var data={
                                    'fname':response.fname,
                                    'lname':response.lname,
                                    'email':response.email,
                                    'phone':response.phone,
                                    'address1':response.address1,
                                    'address2':response.address2,
                                    'city':response.city,
                                    'state':response.state,
                                    'country':response.country,
                                    'pincode':response.pincode,
                                    'payment_mode':"Paid by Razorpay",
                                    'payment_id':responseb.razorpay_payment_id 
                                  };
                                  $.ajax({
                                        method:"POST",
                                        url:"/place-order",
                                        data:data,
                                        success:function(responsec)
                                        {
                                          swal(responsec.status).then((value)=>{
                                                window.location.href="/my-orders"; 
                                          });
                                        }
                                   });
                              },
                              "prefill": {
                                  "name": response.fname+' '+response.lname,
                                  "email": response.email,
                                  "contact": response.phone
                              },
                              "theme": {
                                  "color": "#3399cc"
                              }
                          };
                          var rzp1 = new Razorpay(options);

                              rzp1.open();
                          
                    }
                  });
            }
      });

});