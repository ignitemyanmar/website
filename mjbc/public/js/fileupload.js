$(function(){
  $('#gallery_upload').fileupload({
          dataType: 'json',
          progressall: function (e, data) {
              // var iMaxFilesize = 1048576; // 1MB
              var uploadedBytes =1048576;//1MB max filesize
              var progress = parseInt(data.loaded / data.total * 100, 10);
              $('.upload span').html(progress+'% Loading...')
              if(progress == 100){
                $('.upload span').html('upload');
              }
          },
         
          done: function (e, data) {
            $.each(data.result.files, function (index, file) {
            if (file.error)
            {
              alert("File Size Error : File size must be minimum(500px X 290px) and maximun (1200px X 690px).");
            }else{
              $(".gallery_container").append('<li class="gallery_photo"><img src='+file.thumbnail_url+'><span class="icon-cancel-circle" ><input type="hidden" name="gallery[]" value="'+file.name+'"></span><script>$(".gallery_photo").click(function(){$(this).remove(); return removefile("'+file.name+'","'+file.thumbnail_url+'")});</script></li>');
            }
          });
          }
    });



});
function removefile(filename, thumbnail_url){
    var link='removefile';
    $.ajax({
        type: "post",
        url: link,
        data: {filename: filename, path:thumbnail_url}
      }).done(function( result ) {
        
      });
  }
