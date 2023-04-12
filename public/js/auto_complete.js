$(document).ready(function(){


  $.ajaxSetup({
       headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
    });

var availableTags = [];
$.ajax({
  method:"GET",
  url:"/product-list",
  success:function(response)
  {
    console.log(response);
    start_auto_complete(response);
  }
});

function start_auto_complete(availableTags)
{
    $( "#auto_complete" ).autocomplete({
    source: availableTags
    });
}

});
