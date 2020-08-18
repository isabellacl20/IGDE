var codigo = document.querySelector("img");
var texto = document.querySelector("textarea");
var boton = document.querySelector("button");

boton.addEventListener("click", GenerarQR);

function GenerarQR(){
    var size = "1000*1000";
    var datos = texto.values;
    var baseURL = "http://api.qrserver.com/v1/create-qr-code/";

    var url = `${baseURL}?data=${datos}&size=${size}`;
    codigo.src = url;
}
 function reload(){
     document.location.reload(true);
 }
