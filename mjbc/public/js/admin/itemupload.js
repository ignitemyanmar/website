$(function(){
  
   $('.btnaddqtyrange').click(function(e){
      e.preventDefault();
            var curMaxInput = $('.qtyranges').length;
            $('#quantityrangeinfo .qtyranges:first')
                .clone()
                .insertAfter($('#quantityrangeinfo .qtyranges:last'));
          
            var totalrow=$('.qtyranges').length;
            for(i=0; i<totalrow; i++){
              if(i>0){
                tlength=$('#s2id_autogen1').length;
                if(tlength > 0)
                  tl= $('.qtyranges #s2id_autogen1').length;
                if(tl>1)
                  $('.qtyranges #s2id_autogen1')[i].remove();
              }

              if(i>0){
                tlength1=$('#s2id_autogen3').length;
                if(tlength1 > 0)
                  tl1= $('.qtyranges #s2id_autogen3').length;
                if(tl1>1)
                  $('.qtyranges #s2id_autogen3')[i].remove();
              }

            }
            if($('#quantityrangeinfo .qtyranges').length >= 8) {
                $('#addRow')
                    .attr('disabled',true);
            }

            var maxcolorsize=$('.qtyrange').length;
            $('.qtyrange').each(function(idx) {
                if(maxcolorsize == (idx + 1) ){
                  $(this).select2();
                }
              });
            var maxcolorsize=$('.qtyrange1').length;
            $('.qtyrange1').each(function(idx) {
                if(maxcolorsize == (idx + 1) ){
                  $(this).select2();
                }
              });

            return false;
    });

    $('.btnadd').click(
        function(){
            var curMaxInput = $('.items').length;
            $('#itemlistinfo .items:first')
                .clone()
                .insertAfter($('#itemlistinfo .items:last'));
            $('.colorsize').each(function(){
              $(this).select2();
            });

            $('.removerow')
                .removeAttr('disabled');

            if ($('#itemlistinfo .items').length >= 8) {
                $('#addRow')
                    .attr('disabled',true);
            }
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
      chosencombo();
      $('#subcategoryframe').html(data);
    });
  }

  function loaditemsize(catid) {
    $('#itemsizeframe').hide();
    $('#itemsizeloading').show();
        $.get('/itemsizelist/'+catid,function(data){
        $('#itemsizeframe').show();
        $('#itemsizeframe').html(data);
        chosencombo();
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
              alert('Please Check file size.');
              // alert("File Size should be width between (480px - 200px) and height between (720px - 200px).");
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
              alert('Please Check file size.');

              // alert("File Size should be width between (480px - 200px) and height between (720px - 200px).");
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
            alert('Please Check file size.');

            // alert("File Size should be width between (480px - 200px) and height between (720px - 200px).");
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
            alert('Please Check file size.');

            // alert("File Size should be width between (480px - 200px) and height between (720px - 200px).");
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



