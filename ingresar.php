<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
<body>

    <form action="ingresar.php" method="POST">
            <h1>INGRESAR</h1>
            <div class="datosing">
                <div id="labels">
                    <label for="name">Usuario</label>
                    <label for="contraseña">Contraseña</label>
            </div>

            <div id="inputs">
                    <input type="text" name="nombreusuario" id="name" >
                    <input type="password" name="contraseña">
            </div>
            
     <input name="Ingresar" type="submit" value="Ingresar">
     <?php
         
            if(isset($_POST['Ingresar'])){
                
                include('conectar.php');
                $usuario = $_POST["nombreusuario"];
                $contra = $_POST["contraseña"];
                

                if($usuario == "" || $contra == ""){
                    echo"<h6>Por favor llene todos los campos para ingresar</h6>";
                }else{
                    $buscar=0;
                    $datos = mysqli_query($conectar, "SELECT * FROM $tablaadministrador WHERE usuario = '$usuario' AND contraseña ='$contra'");
                    while($consulta = mysqli_fetch_array($datos)){
                        $buscar++;
                    }

                    if($buscar == 0){
                        echo "<h6>Datos incorrectos</h6>";
                    }else{
                        session_start();
                        $_SESSION['logeado']= $usuario;
                        
                        header("location:interaccion.php");
                    }
                    mysqli_free_result($datos);
                }
                mysql_close($conectar);
            }
        

        
     ?>
    </form>
        
</body>
</html>