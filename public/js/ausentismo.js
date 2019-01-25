function sumar() 
{
    var diasAusencia = document.getElementById('tiempo_ausencia').value;
    total = parseInt(diasAusencia) * 20000;
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
            $('#id_emple').val(data.name);
        }
    });
}

// $(document).ready(function() {
//     $('#prueba').click(function() {
//         alert("documento listo");
//     });
    
// })