<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="scannerStyle.css">
    <link rel="icon" href="../imagenesigde/Logo igde.png">
    <title>IGDE-Escanear</title>
    
    <script type="text/javascript" src="llqrcode.js"></script>
    <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
    <script type="text/javascript" src="webqr.js"></script>
    
    <title>IGDE</title>

    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-24451557-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>

</head>

<body>

    <div id="outdiv"></div>

    <form action="scanner.php" method="post">
    
        <textarea name="identificador" id="result" cols="5" rows="1"></textarea>

        <br><input type="submit" name="entrada" value="Registrar Entrada"><br>
        <input type="submit" name="salida" value="Registrar Salida"><br>
        <input type="submit" name="consultar" value="Consultar Usuario">

        <?php
        include('../conectar.php');
        if(isset($_POST['entrada'])){
          
            $id_usuario = $_POST['identificador'];
        
            $buscar=0;
            $datos = mysqli_query($conectar, "SELECT * FROM $tablaempleados WHERE documento = '$id_usuario'");
            while($consulta = mysqli_fetch_array($datos)){
                $buscar++;
            }
            echo"<div class='fondo'>
                        <div class='info_usuario'>
                            <a href='scanner.php'>X</a>";
            if($buscar == 0){
                echo "      <h4><span>No se puede registrar entrada <br> Usuario no registrado.</span></h4>";
            }else{
                $conectar->query("INSERT INTO $tablaentrada VALUES ('', '$id_usuario', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
                echo "      <h4><span>Se registró entrada exitosamente.</span></h4>";
            }
            echo"   </div>
                </div>";

        }
        if(isset($_POST['salida'])){
            
            $id_usuario = $_POST['identificador'];
           
            $buscar=0;
            $datos = mysqli_query($conectar, "SELECT * FROM $tablaempleados WHERE documento = '$id_usuario'");
            while($consulta = mysqli_fetch_array($datos)){
                $buscar++;
            }
            echo"<div class='fondo'>
                        <div class='info_usuario'>
                            <a href='scanner.php'>X</a>";
            if($buscar == 0){
                echo "      <h4><span>No se puede registrar salida <br> Usuario no registrado.</span></h4>";
            }else{
                $conectar->query("INSERT INTO $tablasalida VALUES ('', '$id_usuario', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
                echo "      <h4><span>Se registró salida exitosamente.</span></h4>";
            }
            echo"   </div>
                </div>";

        }
        if(isset($_POST['consultar'])){
            
            $id_usuario = $_POST['identificador'];
            
            $buscar=0;

            $imagen = "";
            $documento = ""; 
            $nombre = "";
            $apellido = "";
            $cargo =  "";
            $tipoS =  "";
            $hora = "";
            
            $datos = mysqli_query($conectar, "SELECT * FROM $tablaempleados WHERE documento = '$id_usuario'");
            while($consulta = mysqli_fetch_array($datos)){
                $buscar++;

                $imagen = $consulta['Imagen'];
                $documento = $consulta['documento']; 
                $nombre= $consulta['nombreusuario'];
                $apellido = $consulta['apellidos'];
                $cargo =  $consulta['cargo'];
                $tipoS =  $consulta['tiposangre'];
                $hora = $consulta['horario'];
                $fecha = $consulta['fechaingreso'];
                $telefono = $consulta['telefono'];
                $contactoemerg = $consulta['contacto'];
                $empresa = $consulta['empresa'];
            }

            echo"<div class='fondo'>
                        <div class='info_usuario'>
                            <a href='scanner.php'>X</a>";
            if($buscar == 0){
                echo "<h4><span>El usuario no existe en la base de datos.</span></h4>";
            }else{
                echo"       <div class='imagen'>
                                <img src='../imagenesigde/$imagen' alt='foto_perfil_usuario'>
                            </div>
                            <div class='datos'>
                                <p><span>Identificación:</span> $documento</p>
                                <p><span>Nombre:</span> $nombre $apellido</p>
                                <p><span>Tipo de Sangre:</span> $tipoS</p>
                                <p><span>Cargo:</span> $cargo</p>
                                <p><span>Telefono:</span> $telefono</p>
                                <p><span>Horario:</span> $hora</p>
                                <p><span>Fecha de ingreso:</span> $fecha</p>
                                <p><span>Empresa:</span> $empresa</p>
                                <p><span>Contacto de emergencia:</span> $contactoemerg</p>
                                
                            </div>";
            }
            echo"   </div>
                </div>";
        }





        ?>
    </form>

    <div id="webcamimg"></div>
    <div id="qrimg"></div>
    

    <div id="mainbody">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    
        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-8418802408648518" data-ad-slot="2527990541" data-ad-format="auto"></ins>

        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>


    <canvas id="qr-canvas" width="800" height="600"></canvas>
    <script type="text/javascript">load();</script>
    
    <a href="../IGDE.html">VOLVER</a>
</body>
</html>