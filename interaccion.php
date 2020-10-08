<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="IGDE.html">
    <link rel="stylesheet" href="Registrarse.css">
</head>
<body>
    
        
        <form action="interaccion.php" method="POST">
            <h1>REGISTRARSE</h1>
            <label for="name">Ingrese su nombre</label>
            <input type="text" name="nombreusuario" id="name" >
            <br><br>
            <label>
                Apellidos
                <input type="text" name="apellidos">
            </label>
            <br><br>
            <label>
                Tipo de sangre
                <input type="text" name="tiposangre">
            </label>
            <br><br>
            <label>
                Número de documento de identidad
                <input type="number" name="documento">
            </label>     
                <br>
                <br>
            <label>
                 Número telefónico
                 <input type="number" name="telefono">
            </label>     
                <br>
                <br>
            <label>
                Correo electrónico
                <input type="email" name="correo" placeholder="ejemplo@ejemplo.com">
            </label>     
                <br>
                <br>
            <label>
                Empresa en la que trabaja
                <input type="text" name="empresa">
             </label>
            <br><br>
            <label>
               Horario de trabajo
                <input type="number" name="horario">
           </label>     
               <br>
               <br>
            <label>
                Cargo que ocupa dentro de la empresa
                <input type="text" name="cargo">
            </label>
            <br><br>
            <label>
                Fecha de ingreso
                <input type="date" name="fechaingreso">
            </label>
            
            <br><br>
            <label>
                Número telefónico de un contacto de emergencia
                <input type="number" name="contacto">
            </label>
            <br><br>
            <label>
                Contraseña
                <input type="password" name="contraseña">
            </label>
            <br><br>
            
        
            <input name="Guardar" type="submit" value="Guardar">
            <input name="Ver tablas" type="submit" value="Ver tablas">
       
    <?php
     if(isset($_POST['Guardar'])){
        include('conectar.php');

        $nombre = $_POST['nombreusuario'];
        $apellido = $_POST['apellidos'];
        $tipodesangre = $_POST['tiposangre'];
        $identificacion = $_POST['documento'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $empresa = $_POST['empresa'];
        $horario = $_POST['horario'];
        $cargo = $_POST['cargo'];
        $fechaingreso = $_POST['fechaingreso'];
        $contacto = $_POST['contacto'];
        $contraseña = $_POST['contraseña'];
        
       //En la variable $datos se guarda la consulta de la tabla del estudainte 
      $datos = mysqli_query($conectar, "SELECT * FROM  $tablaempleados  WHERE documento = '$identificacion'" );
      //se crea un while que recorra es variable $datos y cada registro que encuntre lo guarda en $consulta
      $buscar = 0;

      while($consulta = mysqli_fetch_array ($datos)) {
         $buscar++;
      }
      if($buscar>0){echo"<h2>Ya existe este documento</h2>";}
      else{$conectar->query("INSERT INTO $tablaempleados VALUES ('$nombre', '$apellido', '$tipodesangre','$identificacion','$telefono','$correo','$empresa','$horario','$cargo','$fechaingreso','$contacto')");echo"Su usuario ha sido creado con éxito";
        // include("desconectar.php");

        ?>
        
        <div class="fondo" id="ventanaqr">
            <div class="contenedor_qr">
                <a href="javascript:cerrar()">Cerrar</a>
                
                <img src="imagenesigde/Logo igde.png" alt="qr-cod" class="imagen">
                <textarea readonly><?php echo "$identificacion"; ?> </textarea>

                <button>Generar codigo QR</button>
            </div>
        </div>


         <div id="inputs">
            <input type="text" name="nombreusuario" id="name" required>
            <input type="text" name="apellidos" id="apellidos" required>
            <input type="text" name="tiposangre" id="tiposangre" required>
            <input type="number" name="documento" id="documento" required>
            <input type="number" name="telefono" id="telefono" required>
            <input type="email" name="correo" placeholder="ejemplo@ejemplo.com" id="correo" required>
            <input type="text" name="empresa" id="empresa">
            <input type="text" name="horario" id="horario" placeholder="7:00am - 5:00pm" required>
            <input type="text" name="cargo" id="cargo" required>
            <input type="date" name="fechaingreso" id="fechaingreso" required>
            <input type="number" name="contacto" id="contacto" required>
         </div>
        </div>

    <?php

     }

     ?>
       </form>
       <a href="cerrarsesion.php">SALIR</a>
     
     <script src="IGDE.js"></script> 
</body>
</html>