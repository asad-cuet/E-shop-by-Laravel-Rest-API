
paypal.Buttons({
      // Sets up the transaction when a payment button is clicked
      createOrder: (data, actions) => {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: $('.total').val() // Can also reference a variable or function
            }
          }]
         });
      },
      // Finalize the transaction after payer approval
      onApprove: (data, actions) => {
        return actions.order.capture().then(function(orderData) {
          // Successful capture! For dev/demo purposes:
          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
          const transaction = orderData.purchase_units[0].payments.captures[0];
         // alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
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
                'pincode':pincode,
                'payment_mode':"Paid by Paypal",
                'payment_id':transaction.id 
          };
          $.ajax({
                method:"POST",
                url:"/place-order",
                data:data,
                success:function(response)
                {
                  swal(response.status).then((value)=>{
                    window.location.href="/my-orders"; 
                  });                      
                }
          });
        });
      }
    }).render('#paypal-button-container');