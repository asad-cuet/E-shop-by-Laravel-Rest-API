



// If you want to use the popup integration, 

      var obj = {};
      obj.fname=$('.fname').val();
      obj.lname=$('.lname').val();
      obj.email=$('.email').val();
      obj.phone=$('.phone').val();
      obj.address1=$('.address1').val();
      obj.address2=$('.address2').val();
      obj.city=$('.city').val();
      obj.state=$('.state').val();
      obj.country=$('.country').val();
      obj.pincode=$('.pincode').val();
      obj.total=$('.total').val();
    //obj.cus_name = $('#customer_name').val();


    $('#sslczPayBtn').prop('postdata',obj);

    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
             script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
           // script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);



//Easy SSL 


    // (function (window, document) {
    //     var loader = function () {
    //         var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
    //         script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
    //         tag.parentNode.insertBefore(script, tag);
    //     };

    //     window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    // })(window, document);





