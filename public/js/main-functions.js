// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable_Products').DataTable();
//cargar image

  $(function() {
    $('.fa-window-close').hide();
   $('#imagen').change(function(e) {
       addImage(e); 
      });
 
      function addImage(e){
       var file = e.target.files[0],
       imageType = /image.*/;
     
       if (!file.type.match(imageType))
        return;
   
       var reader = new FileReader();
       reader.onload = fileOnload;
       reader.readAsDataURL(file);
      }
   
      function fileOnload(e) {
       var result=e.target.result;
       $('#imgSalida').attr("src",result);
       $('.fa-window-close').show();
      }
     });

/*     $("#imagen").click(function() {
      $('.fa-window-close').hide();
   });
   $(".fa-window-close").click(function() {
      var result=e.target.result;

      $('#imgSalida').remove("src",result);
 });*/

   });  
