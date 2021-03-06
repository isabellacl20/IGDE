<?php
    session_start();
    error_reporting(0);
    $doc = $_SESSION['logeado'];
    if($doc == ""){
        header("location:ingresar.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IGDE-Registrarse</title>
    <link rel="stylesheet" href="IGDE.html">
    <link rel="stylesheet" href="Registrarse.css">
    <link rel="icon" href="imagenesigde/Logo igde.png">
</head>
<body>
   
        
<form action="interaccion.php" method="POST" enctype="multipart/form-data">
            <h1>REGISTRARSE</h1>
            <div class="datos">
                <div id="labels">
                    <label for="nombreusuario">Ingrese su nombre</label>
                    <label for="apellidos">Apellidos</label>
                    <label for="tiposangre">Tipo de sangre</label>
                    <label for="documento">Identificacion</label>
                    <label for="telefono">Número telefónico</label> 
                    <label for="correo">Correo electrónico</label>
                    <label for="empresa">Empresa en la que trabaja</label>                
                    <label for="horario">Horario de trabajo</label>
                    <label for="cargo">Cargo</label>
                    <label for="fechaingreso">Fecha de ingreso</label>
                    <label for="contacto">Contacto de emergencia</label>  
                    <label for="foto"> Insertar foto</label>              

                </div>
                
                <div id="inputs">
                  <input type="text" name="nombreusuario" id="name" required>
                  <input type="text" name="apellidos" id="apellidos" required>
                  <input type="text" name="tiposangre" id="tiposangre" required>
                  <input type="number" name="documento" id="documento" required>
                  <input type="number" name="telefono" id="telefono" required>
                  <input type="email" name="correo" placeholder="ejemplo@ejemplo.com" id="correo" required>
                  <input type="text" name="empresa" id="empresa" required>
                  <input type="text" name="horario" id="horario" required>
                  <input type="text" name="cargo" id="cargo" required>
                  <input type="date" name="fechaingreso" id="fechaingreso" required>
                  <input type="number" name="contacto" id="contacto" required>
                  <input type="file" name="foto_perfil" id="foto" required>
                </div>
            </div>       
            
            <input name="Guardar" type="submit" value="Guardar">
            <a href="tablas.php">Ver tablas</a>
         
    <?php
      if(isset($_POST['Guardar'])){
         include('conectar.php');

         // insertar imagen
        if ((isset($_FILES['foto_perfil']['name']) && ($_FILES['foto_perfil']['error']== UPLOAD_ERR_OK))) { //Si la imagen cargó correctamente
            
            $ruta_almacenamiento = "imagenesigde/";
            $ext = $_FILES['foto_perfil']['type'];
            
            $extension = "";
            if ($ext =="image/jpeg") {
                $extension = ".jpg";
            }elseif ($ext =="image/png") {
                $extension = ".png";
            }elseif ($ext =="image/gif") {
                $extension = ".gif";
            }

            $nuevoNombre = mktime();
            
            move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $ruta_almacenamiento.$_FILES['foto_perfil']['name']); //guardela en esta dirección y con el nombre original de ella
            rename($ruta_almacenamiento.$_FILES['foto_perfil']['name'], $ruta_almacenamiento.$nuevoNombre.$extension );
            // echo"El archivo ".$_FILES['imagen_evento']['name']." se guardó exitosamente en la carpeta del servidor";
        }else{
            echo"El archivo no se pudo guardar";
        }
        // fin de insertar imagen

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
         $imagen = $nuevoNombre.$extension;

   
        //En la variable $datos se guarda la consulta de la tabla del estudainte 
       $datos = mysqli_query($conectar, "SELECT * FROM  $tablaempleados  WHERE documento = '$identificacion'" );
       //se crea un while que recorra es variable $datos y cada registro que encuntre lo guarda en $consulta
       $buscar = 0;

       while($consulta = mysqli_fetch_array ($datos)) {
          $buscar++;
       }
      if($buscar>0){echo"<h2>Ya existe este documento</h2>";}
       else{$conectar->query("INSERT INTO $tablaempleados VALUES ('$nombre', '$apellido', '$tipodesangre','$identificacion','$telefono','$correo','$empresa','$horario','$cargo','$fechaingreso','$contacto', '$imagen')");echo"Su usuario ha sido creado con éxito";
         // include("desconectar.php");

        ?>
        
        <div class="fondo" id="ventanaqr">
            <div class="contenedor_qr">
              
                
                <img src="imagenesigde/Logo igde.png" alt="qr-cod" class="imagen">
                <textarea readonly><?php echo "$identificacion"; ?> </textarea>

                <button>Generar codigo QR</button>
                <a href="interaccion.php">Cerrar</a>
            </div>
        </div>

        

    <?php
     }
  


      }

     ?>
       </form>
       <a href="cerrarsesion.php">SALIR</a>
     
     <script src="IGDE.js"></script> 
</body>
</html>