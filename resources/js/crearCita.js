$(document).ready(function () {
    let asesor = $('#asesor_id').val();
    if(asesor != null && asesor != undefined && asesor != 0){
        $.ajax({
            type: "GET",
            url: `/dashboard/Usuarios/${$('#asesor_id').val()}`,
            dataType : "JSON",
        }).done(function(response){
          $("#especialidad_id").val(response.especialidad)  
        })
    }

    $('#especialidad_id').trigger('change');
    $('#fecha').trigger('change');
    
    if(asesor != null && asesor != undefined && asesor != 0){
        $('#asesor_id').val(asesor);
    }

});


$('#especialidad_id').change(function () { 
    hiddenAsesores();
    $(`.especialidad${$('#especialidad_id').val()}`).attr('hidden',false);
});

function hiddenAsesores(){
    $('.asesor').attr('hidden',true);
    $('#asesor_id').val(0);
}

$('#asesor_id').change(function () {
    showHorasxAsesor();
    $('#fecha').val(null);
})

function hiddenHoras(){
    $('.hora').attr('hidden',true);
}

function showHorasxAsesor(){
    hiddenHoras();
    $('#hora').val(0);
    $.ajax({
        type: "GET",
        dataType: "json",
        url: `/dashboard/Usuarios/${$('#asesor_id').val()}`,
        success: function (response) {
            for(let x = response.horaInicio; x <= response.horaFinal;x++){
                $(`.h${x}`).attr('hidden',false);
            }
        }
    });
}


$('#fecha').change(function(){
    console
    if($('#asesor_id').val() != null && $('#asesor_id').val() != undefined && $('#asesor_id').val() != 0){
        showHorasxAsesor()
        $.ajax({
            type : "GET",
            dataType : "JSON",
            url : `/dashboard/citas/${$('#asesor_id').val()}/${$('#fecha').val()}`
        }).done(function(response){
            response.forEach(element => {
                $(`.h${element.hora}`).attr('hidden',true);
            });
        });
    }
    
})
