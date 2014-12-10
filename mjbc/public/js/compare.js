$(function(){
	$('#categories').select2();
    $('#make').select2();
    $('#model').select2();
    $('#alertbtn').click(function(){
      $(this).parent().hide();
    });
    
	$('.savevehicle').click(function(e){
      e.preventDefault();
      var link=$(this).attr('href');
      $.ajax({
        type: "GET",
        url: link,
        data: {}
      }).done(function( result ) {
        if(result.length > 0){
          $("#savevehicle").html( result );
          $(this).html('Remove from Shoplist');
          return false;
        }else{
          return false;
        }

       
       });
    });

});