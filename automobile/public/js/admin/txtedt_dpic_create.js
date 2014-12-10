$(document).ready(function(){
	tinymce.init({
      selector: "textarea#tinymce",
      theme: "modern",
      width: "100%",
      height: 300,
      plugins: [
           "hr anchor",
           "wordcount fullscreen insertdatetime",
           "table contextmenu textcolor"
     ],
     content_css: "src/skins/lightgray/content.min.css",
     toolbar: "undo redo | styleselect | bold italic removeformat | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor", 
     style_formats: [
          {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
          {title: 'Black text', inline: 'span', styles: {color: '#333333'}},
          {title: 'Red Bold', inline: 'b', styles: {color: '#ff0000'}},
          {title: 'Red heading 3', block: 'h3', styles: {color: '#ff0000'}},
          {title: 'Red heading 4', block: 'h4', styles: {color: '#ff0000'}},
          {title: 'Red heading 5', block: 'h5', styles: {color: '#ff0000'}},
          {title: 'Red heading 6', block: 'h6', styles: {color: '#ff0000'}},
          {title: 'Heading 3', block: 'h3', styles: {color: '#000000'}},
          {title: 'Table styles'},
          {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
      ]
  });
  tinymce.init({
        selector: "textarea.tinymce",
        theme: "modern",
        width: "100%",
        height: 200,
        plugins: [
             "advlist autolink link lists charmap preview hr anchor pagebreak spellchecker",
             "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
             "save table contextmenu directionality emoticons template paste textcolor"
       ],
       content_css: "src/skins/lightgray/content.min.css",
       toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons", 
       style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ]
   });
  $('#gallery_upload').fileupload({
          dataType: 'json',
          progressall: function (e, data) {
              // var uploadedBytes =1048576;//1MB max filesize
              var progress = parseInt(data.loaded / data.total * 100, 10);
              $(".gallery_container").append('<li class="gallery_photo" id="progressbar"><div class="progress" id="progress"><span class="meter"></span></div></li>')
              $('#progress span').style.width=progress+'%';
              
          },
         
          done: function (e, data) {
            $.each(data.result.files, function (index, file) {
            if (file.error)
            {
              alert("File Size should be width between (480px - 200px) and height between (720px - 200px).");
              $('.upload span').html('+');              
              $('.upload').show();
            }else{
              var imgcount=$('.gallery_photo').length;
              if(imgcount < 5){
                $('.upload span').html('+');
              }else{
               $('.upload').remove(); 
              }
              $("#progressbar").remove();
              $(".gallery_container").append('<li class="gallery_photo"><img src='+file.thumbnail_url+'><span class="icon-cancel-circle" ></span><input type="hidden" name="gallery[]" class="galleryimg" value="'+file.name+'"><script>$(".gallery_photo").click(function(){$(this).remove();$(".upload").show();$(".upload span").html("+");});</script></li>');
            }
          });
          }
            
  });


  $('#gallery_uploadold').fileupload({
          dataType: 'json',
          progressall: function (e, data) {
              // var iMaxFilesize = 1048576; // 1MB
              var uploadedBytes =1048576;//1MB max filesize
              var progress = parseInt(data.loaded / data.total * 100, 10);
              $('.upload span').html(progress+'% Loading...')
              if(progress == 100){
                $('.upload span').html('Addnew');
              }
          },
         
          done: function (e, data) {
            $.each(data.result.files, function (index, file) {
            if (file.error)
            {
              alert("Error : File size must be minimum(500px X 290px) and maximun (1200px X 690px).");
            }else{
              $(".gallery_container").append('<li class="gallery_photo"><img src='+file.thumbnail_url+'><span class="icon-cancel-circle" ><input type="hidden" name="gallery[]" value="'+file.name+'"></span><script>$(".gallery_photo").click(function(){$(this).remove();});</script></li>');
            }
          });
          }
            
    });

    $('#gallery_upload1').fileupload({
          dataType: 'json',
          progressall: function (e, data) {
              // var iMaxFilesize = 1048576; // 1MB
              var uploadedBytes =1048576;//1MB max filesize
              var progress = parseInt(data.loaded / data.total * 100, 10);
              $('.upload span').html(progress+'% Loading...')
              if(progress == 100){
                $('.upload').hide();
              }
          },
         
          done: function (e, data) {
            $.each(data.result.files, function (index, file) {
            if (file.error)
            {
              alert("Error : File size must be (453px X 600px) for portrait, (960px X 636px) for Landscape) and minimum width and height are 200px.");
            $('.upload').show();
            }else{
              $(".gallery_container").append('<li class="gallery_photo"><img src='+file.thumbnail_url+'><span class="icon-cancel-circle" ><input type="hidden" name="gallery1" value="'+file.name+'"></span><script>$(".gallery_photo").click(function(){$(this).remove(); $(".upload").show();$(".upload span").html("upload");});</script></li>');
            }
          });
          }
            
    });
  
	
});

