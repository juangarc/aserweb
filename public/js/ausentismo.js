function sumar() 
{
    var diasAusencia = document.getElementById('tiempo_ausencia').value;
    var costoAusencia = document.getElementById('costo_ausencia').value;
    total = parseInt(diasAusencia) * parseInt(costoAusencia);
    document.getElementById('costo_ausencia').value=total;

}

function getMessage(){
    var codigo = document.getElementById('codigo')
    product_id = parseInt(codigo.value);
    $.ajax({
        //headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type:'GET',
        url:'/prueba/'+product_id,
        dataType: 'json',
        success:function(data){
            //console.log(data.name)
            $('#id_emple').val(data.name + " " + data.apellido);
            /*$('#id_emple').prop('disabled', true);*/
            $('#costo_ausencia').val(data.salario);
            /*$('#costo_ausencia').prop('disabled', true);*/
        }
    });
}

function dateCompare () {
    var fecha_aux = document.getElementById("fecha").value.split("-");
     var Fecha1 = new Date(parseInt(fecha_aux[0]),parseInt(fecha_aux[1]-1),parseInt(fecha_aux[2]));
     if (isNaN(Fecha1)){
		alert("Fecha introducida incorrecta");
		return false;
	}
	else{
		alert("La fecha que has introducido es "+Fecha1);
	}
}


// $(document).ready(function() {
//     $('#btn-edi').click(function() {
//         alert("documento listo");
//     });
    
// })