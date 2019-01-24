function sumar() 
{
    var diasAusencia = document.getElementById('tiempo_ausencia').value;
    total = parseInt(diasAusencia) * 20000;
    document.getElementById('costo_ausencia').value=total;

}

function getMessage(product_id){
    $.ajax({
        //headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type:'GET',
        url:'/prueba/'+product_id,
        
        success:function(data){
            console.log(data)
        }
    });
}

// $(document).ready(function() {
//     $('#prueba').click(function() {
//         alert("documento listo");
//     });
    
// })