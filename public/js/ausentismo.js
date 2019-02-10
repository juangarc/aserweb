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

// function dateCompare () { 
//     var fecha_aux = document.getElementById("fecha").value.split("-");
//     var Fecha1 = new Date(parseInt(fecha_aux[0]),parseInt(fecha_aux[1]-1),parseInt(fecha_aux[2]));
//     //  console.log(Fecha1.setDate(Fecha1.getDate + 5));
//      Hoy = new Date();//Fecha actual del sistema

//      var diasAnadir = 5;

//      var AnyoFecha = Fecha1.getFullYear();
//      var MesFecha = Fecha1.getMonth() + 1;
//      var DiaFecha = Fecha1.getDate() + diasAnadir;
     
//      var Fecha2 = AnyoFecha+"-"+MesFecha+"-"+DiaFecha; 
//     //  var Fecha3 = Date.parse(Fecha2);
//     //  var Fecha4 = new Date(Fecha3);
//     document.getElementById('cargo_title').value=Fecha2;
//     console.log(Fecha2);
     
      
//      var AnyoHoy = Hoy.getFullYear();
//      var MesHoy = Hoy.getMonth();
//      var DiaHoy = Hoy.getDate();

//                   if (AnyoFecha >= AnyoHoy && MesFecha >= MesHoy && DiaFecha >= DiaHoy){
//                       $('#botonProrroga').prop('disabled', false);
//                      alert('Activar Boton');
//                   }
//                   else{
//                       $('#botonProrroga').prop('disabled', true);
//                      alert('Desactivar Boton');
//                   }
//     }
         
     



// $(document).ready(function() {
//     $('#btn-edi').click(function() {
//         alert("documento listo");
//     });
    
// })