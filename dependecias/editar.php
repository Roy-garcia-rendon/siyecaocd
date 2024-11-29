<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/www.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/c6.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="icon" type="image/x-icon" href="mediaa/icons8-favicon-16 (1).png">
    
    <title>SIYECA</title>
</head>
<<!--script cerrar sesion-->
<script>
    function confirmacion(){
        var respuesta=confirm("¿Desea cerrar tu sesión??");
        if(respuesta == true){
            return true;
        }else{
            return false;
        }
    }
</script>
<body>
    <style>body{background-image: url(../mediaa/maxresdefault.jpg);
    background-size: cover;
    background-attachment: fixed;}
    </style>
    <main id="principal">
        <header>
    <div class="Menu container">
        <a href="#" class="logo">AYUNTAMIENTO</a>
        <input type="checkbox" id="Menu">
        <label for="Menu">
            <ing src="media/Menu.png" class="Menu-icono" alt="">
        </label>

        <nav class="navbar">

            <ul>
            <li><a href="../menu.html">Menu</a></li>
            <li><a href="../obras.php">Empleados</a></li>
            <li><a href="modobras.php">Modificaciones</a> </li>
            <li><a href="../index.php" onclick='return confirmacion()'>Salir</a></li>
            </ul>

        </nav>

    </div>   

    </header>
    <div class="contentcontainer">

        <div class="content" id = "content">
        </div class="wrapper">
        <img src="mediaa/images.jfif" alt=" " width="10%" height="10%"> 
        <div class="text-box">
            <h2>Altas de empleados </h2>
        </div>
        </div> 
       <div class="sy">
        <h1>(SIYECA) </h1>
       </div>
       <?php
         /*declararcion de variables*/
         $no_empleado=$_GET['no_empleado'];
         $nombre=$_GET['nombre'];
         $edad=$_GET['edad'];
         $curp=$_GET['curp'];
         $num_tel=$_GET['num_tel'];
         $nacionalidad=$_GET['pago'];
         $genero=$_GET['banco'];
         $direccion=$_GET['dirreccion'];
         $profesion=$_GET['Profesion'];

    if(isset($_GET['editar' /*la accion se realisara al precionar el boton*/])){
        include("../php/conexion.php"); /*Incluye la coneccion a la base de datos (archivo conexion.php)*/
        $getmysql=new mysqlconex();
        $getconex=$getmysql->conex();

        $query="UPDATE obras_publicas_nomina SET hora_entrada=?,hora_salida=?,sueldo_quincenal=?,fecha_pago=?,forma_pago=?,tipo_banco=?,dias_laborales=?,	fecha_ingreso=? WHERE no_empleado=?";
          $sentencia = mysqli_prepare($getconex,$query);
          mysqli_stmt_bind_param($sentencia,"ssssssssi",$nombre,$edad,$curp,$num_tel,$nacionalidad,$genero,$direccion,$profesion,$no_empleado);
          mysqli_stmt_execute($sentencia);
          $afectado=mysqli_stmt_affected_rows($sentencia);
          if($afectado==1) /*la variable afectado al ser igual a 1 despliega la sigiente alerta*/{
         echo"<script> alert('EL empleado [$no_empleado]  se edito correctamente'); location.href='../obras.php'; </script>";
        }else{ /*si no enj afectado despliega la siguente alerta*/
        echo"<script> alert('EL empleado [$no_empleado] no se edito correctamente'); location.href='../obras.php'; </script>";
    }
     /*cerrar base*/
    mysqli_stmt_close($sentencia);
    mysqli_close($getconex);
    
    }
    ?>
   <!--Formulario de editar registros en alta empleados-->
            
            <img src="image/shutterstock-51313744_sm.webp" alt="">
        </div>
    </div> 
    <!--Formulario de obras publicas nomina-->
       <div class="form-content">
        <h2>Enviar tu solicitud</h2>
        <form  action="editar.php" método="GET" class="needs-validation" novalidate>
        <input type="hidden" value="<?php echo $no_empleado ?>" name="no_empleado" >

            <label for="hora_entrada">Hora de entrada</label>
            <input type="time" name="nombre" id="nombre"  class="form-control" value="<?php echo $nombre ?>" required>
    
            <label for="hora_salida">Hora de salida</label>
            <input type="time" name="edad" id="edad"  class="form-control" value="<?php echo $edad ?>" required style="color: black;" >

            <label for="sueldo_quincenal">Sueldo quincenal</label>
            <input type="number" name="curp" id="curp" min="1000" max="15000" class="form-control" value="<?php echo $curp ?>" required>

            <label for="num_tel">Fecha pago</label>
            <input type="date" name="num_tel" id="num_tel" value="<?php echo $num_tel ?>"  class="form-control" required style="color: black;">

            <label>Forma pago:</label>
            <div class="mydict">
	<div>
		<label>
			<input type="radio" name="pago" value="Transferencia" value="<?php echo $nacionalidad ?>"  hidden selected><?php echo $nacionalidad ?>!!>
			<span>Transferencia</span>
		</label>
		<label>
			<input type="radio" name="pago" value="Efectivo">
			<span>Efectivo</span>
		</label>	
	</div>
</div>
            <br>

            <label>Tipo banco:</label>
            <input type="text" name="banco" id="banco" class="form-control" value="<?php echo $genero ?>" required>
            <br>

            <label for="direccion">Dias laborales:</label>
            <input type="text" name="dirreccion"  class="form-control"  value="<?php echo $direccion ?>"required>

            <label for="Profesión">Fecha ingreso:</label>
            <input type="date" name="Profesión" id="Profesión" class="form-control" value="<?php echo $profesion ?>" required>
     
   <br>
   <input type="submit" name="editar" value="Editar">
       
        </form>
       
        
    </div>
    <script src="js/java.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>