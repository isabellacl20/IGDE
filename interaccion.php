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
                Ingrese sus apellidos
                <input type="text" name="apellidos">
            </label>
            <br><br>
            <label>
                Ingrese su tipo de sangre
                <input type="text" name="tiposangre">
            </label>
            <br><br>
            <label>
                Ingrese su número de documento de identidad
                <input type="number" name="documento">
            </label>     
                <br>
                <br>
            <label>
                 Ingrese su número telefónico
                 <input type="number" name="telefono">
            </label>     
                <br>
                <br>
            <label>
                Ingrese correo electrónico
                <input type="email" name="correo" placeholder="ejemplo@ejemplo.com">
            </label>     
                <br>
                <br>
            <label>
                Ingrese la empresa en la que trabaja
                <input type="text" name="empresa">
             </label>
            <br><br>
            <label>
                Ingrese su horario de trabajo
                <input type="number" name="horario">
           </label>     
               <br>
               <br>
            <label>
                Ingrese el cargo que ocupa dentro de la empresa
                <input type="text" name="cargo">
            </label>
            <br><br>
            <label>
                Fecha de ingreso
                <input type="date" name="fechaingreso">
            </label>
            
            <br><br>
            <label>
                Ingrese un contacto de emergencia
                <input type="number" name="contacto">
            </label>
            <br><br>
            <label>
                Contraseña
                <input type="password" name="contraseña">
            </label>
            <br><br>
            
        
            <input name="Guardar" type="submit" value="Guardar">

            <div class="contenedor_qr">
                <img src="qr_generator.png" alt="qr-code" class="imagen">
                <?php
                if(isset($_POST['Guardar'])){
                    
                    $documento = $_POST['documento'];
                    
                    echo "<textarea>$documento</textarea>";


                }
                ?></textarea>

                <button>Generar codigo QR</button>
                <a href="javascript:reload()"> <img src="actualizar.png"> </a>
            </div>
            <script src="IGDE.js"> </script>

        </form>


    <a href="IGDE.html">Volver</a>
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
      if($buscar>0){echo"Ya existe este documento";}
      else{$conectar->query("INSERT INTO $tablaempleados VALUES ('$nombre', '$apellido', '$tipodesangre','$identificacion','$telefono','$correo','$empresa','$horario','$cargo','$fechaingreso','$contacto','contraseña')");echo"Su usuario ha sido creado con éxito";}

        // include("desconectar.php");
        
    }

    ?>
    
</body>
</html>