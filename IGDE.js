var codigo = document.querySelector("img");
var texto = document.querySelector("textarea");
var boton = document.querySelector("button");

boton.addEventListener("click", GenerarQR);

function GenerarQR(){
    
    var datos = texto.value;
    codigo.src ="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl="+encodeURIComponent(datos);

    
}
 function reload(){
     document.location.reload(true);
 }
