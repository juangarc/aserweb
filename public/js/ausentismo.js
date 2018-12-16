function sumar() 
{
    var diasAusencia = document.getElementById('tiempo_ausencia').value;
    total = parseInt(diasAusencia) * 20000;
    document.getElementById('costo_ausencia').value=total;

}