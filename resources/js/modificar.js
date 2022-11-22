$(".bt").click(function(){
    $.ajax({
        type: "get",
        url: `/dashboard/Usuarios/${$(this).val()}`,
        dataType: "json",
    }).done(function (response) { 
        clearMinAlert();

        $('#actualizar').val(response.id);
        $('#modificarModal').modal('show');
        $('#nombre').val(response.nombre);
        $('#identidad').val(response.identidad);
        $('#tipoI').val(response.tipo_identidad_id);
        $('#rol').val(response.rol_id);
        $('#estado').val(response.estado_id);
        $('#ciudad').val(response.ciudad_id);

        selectPaisxCiudadSelected();

        if(response.rol_id == 2){
            showCampsAsesor(false);
            $('#experiencia').val(response.experiencia);
            $('#especialidad').val(response.especialidad);
            $('#horaInicio').val(response.horaInicio);
            $('#horaFinal').val(response.horaFinal);
        }else{
            $('#experiencia').val(null);
            $('#especialidad').val(null);
            $('#horaInicio').val(null);
            $('#horaFinal').val(null);
            showCampsAsesor(true);
        }
        
    })
})

function showCampsAsesor(state = true) { 
    hiddenElement([$('#experienciaDiv'),$('#especialidadDiv'),$('#horaInicioDiv'),$('#horaFinalDiv')],state);
}

function hiddenElement(arr,state){
    arr.forEach(element => {
       element.attr('hidden',state) 
    });
}


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

 $('#rol').change(function(){
    if($('#rol').val() == 2){
        showCampsAsesor(false);
    }else{
        showCampsAsesor(true);
    }
 })


 $('#actualizar').click(function() {
    clearMinAlert();
    let data = new Object();
    data.id = $('#actualizar').val();
    data.nombre = $('#nombre').val();
    data.identidad = $('#identidad').val();
    data.tipoI = $('#tipoI').val();
    data.rol = $('#rol').val();
    data.estado = $('#estado').val();
    data.ciudad = $('#ciudad').val();

    if($('#rol').val() == 2){
        data.experiencia = $('#experiencia').val();
        data.especialidad = $('#especialidad').val();
        data.horaInicio = $('#horaInicio').val();
        data.horaFinal = $('#horaFinal').val();
    }

    if(verificacion(data)){
        var dataForm = $('#update').serialize();//combierte el formulario en una cadena del tipo &name=value&name=value
        dataForm += `&nombre=${data.nombre}&identidad=${data.identidad}&tipo_identidad_id=${data.tipoI}`;
        dataForm += `&rol_id=${data.rol}&estado_id=${data.estado}&ciudad_id=${data.ciudad}&id=${data.id}`;
        if(data.rol == 2){
            dataForm += `&experiencia=${data.experiencia}&especialidad=${data.especialidad}`;
            dataForm += `&horaInicio=${data.horaInicio}&horaFinal=${data.horaFinal}`;
        }
        $.ajax({
            type: "put",
            url: "/dasboard/update/admin",
            data: dataForm,
        }).done(function (response) {
            if(response == "1"){
                window.location.href = "/dashboard/Usuarios";
            }
        });
    }
})

function verificacion(data){
    let error = 0;
    if(validationString(data.nombre)){
        textMinAlert('nombre','El nombre no pude estar vacio');
        error++;
    }
    if(validationString(data.identidad)){
        textMinAlert('identidad','La identidad no puede estar vacia');
        error++;
    }
    if(data.ciudad == 0){
        textMinAlert('ciudad','Se debe seleccionar una ciudad');
        error++;
    }

    if(data.rol == 2){
        if(validationNumber(data.experiencia)){
            textMinAlert('experiencia',`Este valor(${data.experiencia}) no es permitido.`);
            error++;
        }

        if(data.especialidad == 0 || data.especialidad == null || data.especialidad == undefined || data.especialidad == ""){
            textMinAlert('especialidad','Se debe seleccionar una especialidad');
            error++;
        }

        if(validationNumber(data.horaInicio)){
            textMinAlert('horaInicio',`Este valor(${data.horaInicio}) no es permitido.`);
            error++;
        }else if(data.horaInicio < 6 || data.horaInicio > 18){
            textMinAlert('horaInicio',`Los horarios de atencion son de 6 a 18, el valor(${data.horaInicio}) no es permitido.`);
            error++;
        }


        if(validationNumber(data.horaFinal)){
            textMinAlert('horaFinal',`Este valor(${data.horaFinal}) no es permitido.`);
            error++;
        }else if(data.horaFinal > 19 ){
            textMinAlert('horaFinal',`El ultimo horario de atencion es a las 19 por lo tanto este valor(${data.horaFinal}) no puede ser mayor adicha hora`);
            error++;
        }else if(parseInt(data.horaFinal) <= parseInt(data.horaInicio)){
            textMinAlert('horaFinal',`Este valor(${data.horaFinal}) no puede ser menor o igual a la hora de inicio de atencion(${data.horaInicio}).`);
            error++;
        }
    }

    if(error > 0){
        return false;
    }
    return true;
}

function clearMinAlert(){
    $('.minAlert').text('');
}

function textMinAlert(element,text){
    $(`#${element}Helper`).text(`*${text}`);
}

function validationString(string){
    if(string === "" || string == null || string == undefined){
        return true;
    }
    return false;
}

function validationNumber(number){
    if(number < 0 || number == null || number == undefined || number == ""){
        return true;
    }
    return false;
}