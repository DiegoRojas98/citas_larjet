function orderCiudades() { 
    $('#ciudad').val(0);
    $(`.ciudad`).css('display','none');
    $(`.pais${$('#pais').val()}`).css('display','block');
 }

 function selectPaisxCiudadSelected(){
   if($('#ciudad').val() != 0 && $('#ciudad').val() != null && $('#ciudad').val() != undefined){
      $.ajax({
         type: "get",
         url: `/ciudad/show/${$('#ciudad').val()}`,
         dataType: "json",
      }).done(function(response){
         $('#pais').val(response.pais_id);
         orderCiudades();
         $('#ciudad').val(response.id);
      })
   }
 }

 $('#pais').change(function() {
    orderCiudades();
 });

 $(document).ready(function () {
   if($('#ciudad').val() == 0 || $('#ciudad').val() == null || $('#ciudad').val() == undefined){
      orderCiudades();
   }else{
      selectPaisxCiudadSelected();
   }
 });