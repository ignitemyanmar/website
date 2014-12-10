$(function(){
    $('.btnadd').click(
        function(){
            var curMaxInput = $('.items').length;
            $('#itemlistinfo .items:first')
                .clone()
                .insertAfter($('#itemlistinfo .items:last'));
            $('.removerow')
                .removeAttr('disabled');
            if ($('#itemlistinfo .items').length >= 8) {
                $('#addRow')
                    .attr('disabled',true);
            }
            chosencombo();
            return false;
    });


    $('#category').change(function(){
      $('#subcategoryframe').hide();
      var category_id=$(this).val();
      $('#subcategoryloading').show();
      $.get('/subcategorylist/'+category_id,function(data){
        $('#subcategoryframe').show();
        $('#subcategoryframe').html(data);
        $('#subcategoryloading').hide();
        chosencombo();
      });
  });
});
function chosencombo(){
    if($('.chosen').size() > 0) {
      var els=$('.chosen');
      els.each(function () {
          $(this).chosen();
      })
    }
  }
  
  function loadsubcategories(catid) {
    $('#subcategoryframe').hide();
    $('#subcategoryloading').show();
    $.get('/subcategorylist/'+catid,function(data){
      $('#subcategoryframe').show();
      $('#subcategoryloading').hide();
      $('#subcategoryframe').html(data);
      chosencombo();
    });
  }

  function loaditemsize(catid) {
    chosencombo();
    $('#itemsizeframe').hide();
    $('#itemsizeloading').show();
        $.get('/itemsizelist/'+catid,function(data){
        $('#itemsizeframe').show();
        $('#itemsizeframe').html(data);
        $('#itemsizeloading').hide();
    });
  }

  $('#gallery_upload').fileupload({
          dataType: 'json',
          progressall: function (e, data) {
              // var iMaxFilesize = 1048576; // 1MB
              var uploadedBytes =1848576;//1MB max filesize
              var imgcount=$('.gallery_photo').length;
              var progress = parseInt(data.loaded / data.total * 100, 10);
              $('.upload span').html(progress+'%')
              if(progress == 100 && imgcount < 4){
                $('.upload span').html('+');
              }else{
               $('.upload').hide(); 
              }
          },
         
          done: function (e, data) {
            $.each(data.result.files, function (index, file) {
            if (file.error)
            {
              alert("File Size should be width between (480px - 200px) and height between (720px - 200px).");
              $('.upload span').html('+');              
              $('.upload').show();
            }else{
              $(".gallery_container").append('<li class="gallery_photo"><img src='+file.thumbnail_url+'><span class="icon-cancel-circle" ><input type="hidden" name="gallery[]" class="galleryimg" value="'+file.name+'"></span><script>$(".gallery_photo").click(function(){$(this).remove();$(".upload").show();$(".upload span").html("+");});</script></li>');
            }
          });
          }
  });

  
  $('#gallery_upload1').fileupload({
        dataType: 'json',
        progressall: function (e, data) {
            var uploadedBytes =1048576;
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('.upload1 span').html(progress+'%')
            if(progress == 100){
              $('.upload1').hide();
            }
        },
       
        done: function (e, data) {
          $.each(data.result.files, function (index, file) {
            if (file.error)
            {
              $('.upload1 span').html('+');
              alert("File Size should be width between (480px - 200px) and height between (720px - 200px).");
               $('.upload1').show(); 
            }else{
              $(".gallery_container1").append('<li class="gallery_photo"><img src='+file.thumbnail_url+'><span class="icon-cancel-circle" ><input type="hidden" name="gallery1" value="'+file.name+'"></span><script>$(".gallery_photo").click(function(){$(this).remove(); $(".upload1").show();$(".upload1 span").html("+");});</script></li>');
            }
          });
        }
  });

  $('#gallery_upload2').fileupload({
        dataType: 'json',
        progressall: function (e, data) {
            // var iMaxFilesize = 1048576; // 1MB
            var uploadedBytes =1048576;//1MB max filesize
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('.upload2 span').html(progress+'%')
            if(progress == 100){
              $('.upload2').hide();
            }
        },
       
        done: function (e, data) {
          $.each(data.result.files, function (index, file) {
          if (file.error)
          {
            $('.upload2 span').html('+');
            alert("File Size should be width between (480px - 200px) and height between (720px - 200px).");
             $('.upload2').show(); 
          }else{
            $(".gallery_container2").append('<li class="gallery_photo"><img src='+file.thumbnail_url+'><span class="icon-cancel-circle" ><input type="hidden" name="gallery2" value="'+file.name+'"></span><script>$(".gallery_photo").click(function(){$(this).remove(); $(".upload2").show();$(".upload2 span").html("+");});</script></li>');
          }
        });
        }
  });

  $('.gallery_upload2').fileupload({
        dataType: 'json',
        progressall: function (e, data) {
            // var iMaxFilesize = 1048576; // 1MB
            var uploadedBytes =1048576;//1MB max filesize
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('.upload2 span').html(progress+'%')
            if(progress == 100){
              $('.upload2').hide();
            }
        },
       
        done: function (e, data) {
          $.each(data.result.files, function (index, file) {
          if (file.error)
          {
            $('.upload2 span').html('+');
            alert("File Size should be width between (480px - 200px) and height between (720px - 200px).");
             $('.upload2').show(); 
          }else{
            $(".gallery_container2").append('<li class="gallery_photo"><img src='+file.thumbnail_url+'><span class="icon-cancel-circle" ><input type="hidden" name="gallery2" value="'+file.name+'"></span><script>$(".gallery_photo").click(function(){$(this).remove(); $(".upload2").show();$(".upload2 span").html("+");});</script></li>');
          }
        });
        }
  });



  function removerow(obj){
          var objs=$(obj).parent().parent().parent();
          if ($('#itemlistinfo .items').length > 1) {
              objs.remove();
          }
          if ($('#itemlistinfo .items').length <= 1) {
              $('.removerows')
                  .attr('disabled', true);
          }
          else if ($('#itemlistinfo .items').length < 8) {
              $('#addRow')
                  .removeAttr('disabled');

          }
          return false;
  }

  function removeqtyrangerow(obj){
          var objs=$(obj).parent().parent().parent();
          if ($('#quantityrangeinfo .qtyranges').length > 1) {
              objs.remove();
          }
          if ($('#quantityrangeinfo .qtyranges').size() == 1) {
              $('.removerow')
                  .attr('disabled', true);
          }
          else if ($('#quantityrangeinfo .qtyranges').length < 8) {
              $('#addRow')
                  .removeAttr('disabled');
          }
          return false;
  }
  
  function isNumberKey(evt)
  {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57) )
      return false;
    
    return true;
  }



