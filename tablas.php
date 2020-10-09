<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tablas.css">
    <title>Tablas</title>
</head>
<body>
    <?php
        include('conectar.php');
//////////////////////////////// tabla de Empleados
        echo "<div class='tablaUsuarios'>";        
                echo  "<form action='tablas.php' method='POST'>
                        <table>
                        <tr>
                            <td>Selección</td>
                            <td>Documento</td>
                            <td>Nombre</td>
                            <td>Apellidos</td>
                            <td>Tipo de Sangre</td>
                            <td>Teléfono</td>
                            <td>Correo</td>
                            <td>Empresa</td>
                            <td>Cargo</td>
                            <td>Horario</td>
                            <td>Fecha de Ingreso</td>
                            <td>Contacto de Emergencia</td>
                        </tr>";
                    $lista = mysqli_query($conectar, "SELECT * FROM $tablaempleados");
                    while($consultaEmp = mysqli_fetch_array($lista)){
                        $doc = $consultaEmp['documento'];
                        $nombre = $consultaEmp['nombreusuario'];
                        $apellidos = $consultaEmp['apellidos'];
                        $tSangre = $consultaEmp['tiposangre'];
                        $tel = $consultaEmp['telefono'];
                        $correo = $consultaEmp['correo'];
                        $empresa = $consultaEmp['empresa'];
                        $cargo = $consultaEmp['cargo'];
                        $horario = $consultaEmp['horario'];
                        $fechaIngreso = $consultaEmp['fechaingreso'];
                        $contactoEmerg = $consultaEmp['contacto'];
                         
                        echo "<tr>
                                <td> <input type='radio' name='identificador' value=$doc> </td>
                                <td>$doc</td>
                                <td>$nombre</td>
                                <td>$apellidos</td>
                                <td>$tSangre</td>
                                <td>$tel</td>
                                <td>$correo</td>
                                <td>$empresa</td>
                                <td>$cargo</td>
                                <td>$horario</td>
                                <td>$fechaIngreso</td>
                                <td>$contactoEmerg</td>
                            </tr>";
                    }                
                echo "  </table>
                        <input type='submit' name='editar' value='Editar'>
                        <input type='submit' name='eliminar' value='Eliminar'>
                     </form>";
    
            if (isset($_POST['editar'])) {
                error_reporting(0);
                if(!$_POST['identificador']){
                    echo "Debe hacer una selección para editar";
                }else{
                    $idEditar = $_POST['identificador'];
                    $editar = mysqli_query($conectar, "SELECT * FROM $tablaempleados WHERE documento = $idEditar");
                    while($consultaEditar = mysqli_fetch_array($editar)){
                        $doc = $consultaEditar['documento'];
                        $nombre = $consultaEditar['nombreusuario'];
                        $apellidos = $consultaEditar['apellidos'];
                        $tSangre = $consultaEditar['tiposangre'];
                        $tel = $consultaEditar['telefono'];
                        $correo = $consultaEditar['correo'];
                        $empresa = $consultaEditar['empresa'];
                        $cargo = $consultaEditar['cargo'];
                        $horario = $consultaEditar['horario'];
                        $fechaIngreso = $consultaEditar['fechaingreso'];
                        $contactoEmerg = $consultaEditar['contacto'];
                        echo "<form action='tablas.php' method='post'>
                                <input type='hidden' name='documento' value='$doc'>
                                <input type='text' name='document' value='$doc'>
                                <input type='text' name='nombre' value='$nombre'>
                                <input type='text' name='apellidos' value='$apellidos'>
                                <input type='text' name='tSangre' value='$tSangre'>
                                <input type='number' name='tel' value='$tel'>
                                <input type='mail' name='correo' value='$correo'>
                                <input type='text' name='empresa' value='$empresa'>
                                <input type='text' name='cargo' value='$cargo'>
                                <input type='text' name='horario' value='$horario'>
                                <input type='date' name='fechaIngreso' value='$fechaIngreso'>
                                <input type='number' name='contactoEmerg' value='$contactoEmerg'>
                                
                                <input type='submit' name='actualizar' value='Actualizar'>
                            </form>";
                    }
                }
            }
            if (isset($_POST['eliminar'])) {
                error_reporting(0);
                if(!$_POST['identificador']){
                    echo "Debe hacer una selección para eliminar";
                }else{
                    $idEliminar = $_POST['identificador'];
                    mysqli_query($conectar, "DELETE FROM $tablaempleados WHERE documento = '$idEliminar'");
                    // header("location:tablas.php");
                }
            }
            if (isset($_POST['actualizar'])) {
                $cambiar = $_POST['documento'];
                $doc = $_POST['document'];
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $tSangre = $_POST['tSangre'];
                $tel = $_POST['tel'];
                $correo = $_POST['correo'];
                $empresa = $_POST['empresa'];
                $cargo = $_POST['cargo'];
                $horario = $_POST['horario'];
                $fechaIngreso = $_POST['fechaIngreso'];
                $contactoEmerg = $_POST['contactoEmerg'];
    
               $modificar = mysqli_query($conectar, "UPDATE $tablaempleados SET nombreusuario = '$nombre', apellidos = '$apellidos', tiposangre = '$tSangre', documento = '$doc', telefono = '$tel', correo = '$correo', empresa = '$empresa', horario = '$horario', cargo = '$cargo', fechaingreso = '$fechaIngreso',  contacto = '$contactoEmerg' WHERE documento = '$cambiar'");

                if(!$modificar){
                    echo"error al guardar <br>";
                }else{
                    echo"exito al guardar <br>";
                }
                // echo "<p> Se actualizó el registro </p>";
                // header("location:tablas.php");
            }
         echo "</div>";

//////////////////////////////// tabla de Entrada 

        echo "<div class='tablaEntrada'>";        
            echo  "<table>
                    <tr>
                        <td>Identificación</td>
                        <td>Fecha</td>
                        <td>Hora</td>                        
                    </tr>";
                $listaEntrada = mysqli_query($conectar, "SELECT * FROM $tablaentrada");
                while($consultaEntrada = mysqli_fetch_array($listaEntrada)){
                    $doc = $consultaEntrada['identificacion_usuario'];
                    $fecha = $consultaEntrada['fecha'];
                    $hora = $consultaEntrada['hora'];
                        
                    echo "<tr>
                            <td>$doc</td>
                            <td>$fecha</td>
                            <td>$hora</td>
                        </tr>";
                }                
            echo "  </table>
        </div>";


//////////////////////////////// tabla de Salida 

        echo "<div class='tablaSalida'>";        
            echo  "<table>
                    <tr>
                        <td>Identificación</td>
                        <td>Fecha</td>
                        <td>Hora</td>                        
                    </tr>";
                $listaSalida = mysqli_query($conectar, "SELECT * FROM $tablasalida");
                while($consultaSalida = mysqli_fetch_array($listaSalida)){
                    $doc = $consultaSalida['identificacion_usuario'];
                    $fecha = $consultaSalida['fecha'];
                    $hora = $consultaSalida['hora'];
                        
                    echo "<tr>
                            <td>$doc</td>
                            <td>$fecha</td>
                            <td>$hora</td>
                        </tr>";
                }                
            echo "  </table>
        </div>";

    ?>
    
</body>
</html>
