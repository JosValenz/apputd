<?php

  session_start();
	if (!isset($_SESSION['user'])) {
		header("location: login.php");
	}
	else {
		$us=$_SESSION['user'];
		$priv=$_SESSION['priv'];
  }
  
  require_once("conectar_utd.php");

  $ope=(isset($_POST['operacion'])) ? $_POST['operacion'] : $_GET['operacion'];
  $tab=(isset($_POST['tabla'])) ? $_POST['tabla'] : $_GET['tabla'];

  // $us=$_POST['us'];
  // $ps=$_POST['ps'];

  //echo $ope." ".$tab." ".$us." ".$ps;

  if (!$conexion)
  	die("Fallo la conexion verifique".mysqli_connect_error());
  else if ($ope=='c') 
   {
        if ($tab=='a')
        {
          $consulta="select matricula,nombre, especialidad from alumnos";
          $query=mysqli_query($conexion,$consulta);  
          // echo '<link href="css/consultas.css" type="text/css" rel="stylesheet">';
          echo '<link href="css/consultas.css" type="text/css" rel="stylesheet">';
          echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' integrity='sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z' crossorigin='anonymous'>";

          // echo '<link href="https://file.myfontastic.com/L5BeFP7iJsBgSvvxoKMcs9/icons.css" rel="stylesheet">';
          echo "<body onload='window.print()'>";
          echo "<br><h3 align=center> Registros de la Tabla ALUMNOS</h3>";
          echo "<hr>";
          echo "<table class='table table-dark' align=center border=1>";

          echo "<tr>";
          echo "<th>Matricula</th>";
          echo "<th>Nombre</th>";
          echo "<th>Especialidad</th>";
          echo "</tr>";
          while ($columna=mysqli_fetch_array($query)) {
              echo "<tr>";
              echo "<td>".$columna['matricula'] . "</td><td>" . $columna['nombre'] . "</td><td>" . $columna['especialidad'] . "</td>";
              echo "</tr>";
          }
          echo "</table>";
          echo "<hr>";
          $numregistros=mysqli_num_rows($query);
          echo "<h3 align=center> La cantidad de registros encontrados es: $numregistros</h3>";
          echo "</body>";
        }
        else if ($tab=='c')
        {
          $consulta="select id, nombre, apellidos, direccion, telefono, email from contactos";
          $query=mysqli_query($conexion,$consulta);  
          echo '<link href="css/consultas.css" type="text/css" rel="stylesheet">';
          echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' integrity='sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z' crossorigin='anonymous'>";
          echo "<body onload='window.print()'>";
          echo "<br><h3 align=center> Registros de la Tabla CONTACTOS</h3>";
          echo "<hr>";
          echo "<table class='table table-dark' align=center border=1>";

         
          echo "<tr>";
          echo "<th>ID</th>";
          echo "<th>Nombre</th>";
          echo "<th>Apellidos</th>";
          echo "<th>Direccion</th>";
          echo "<th>Telefono</th>";
          echo "<th>E-mail</th>";
          echo "</tr>";
          while ($columna=mysqli_fetch_array($query)) {
            echo "<tr>";
            echo "<td>".$columna['id'] . "</td><td>" . $columna['nombre'] . "</td><td>" . $columna['apellidos'] . "</td><td>" . $columna['direccion'] . "</td><td>" . $columna['telefono'] . "</td><td>" . $columna['email'] . "</td>";
            echo "</tr>";
          }
          echo "</table>";
          echo "<hr>";
          $numregistros=mysqli_num_rows($query);
          echo "<h3 align=center> La cantidad de registros encontrados es: $numregistros</h3>";
          echo "</body>";
        }

        else if ($tab=='u')
        {
          $consulta="select username, privilegio from usuarios";
          $query=mysqli_query($conexion,$consulta);  
          echo '<link href="css/consultas.css" type="text/css" rel="stylesheet">';
          echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' integrity='sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z' crossorigin='anonymous'>";

          echo "<body onload='window.print()'>";
          echo "<br><h3 align=center> Registros de la Tabla USUARIOS</h3>";
          echo "<hr>";
          echo "<table class='table table-dark' align=center border=1>";
         
          echo "<tr>";
          echo "<th>Usuario</th>";
          // echo "<th>Password</th>";
          echo "<th>Privilegio</th>";
          echo "</tr>";
          while ($columna=mysqli_fetch_array($query)) {
            echo "<tr>";
            echo "<td>".$columna['username'] . "</td><td>". $columna['privilegio'] . "</td>";
            echo "</tr>";
          }
          echo "</table>";
          echo "<hr>";
          
          $numregistros=mysqli_num_rows($query);
          echo "<h3 align=center> La cantidad de registros encontrados es: $numregistros</h3>";
          echo "</body>";
        }

   }

  else if ($ope=='a') 
    {
      if ($tab=='a')
      {?>
        <head>
        <meta charset='utf-8'>
        <link rel="stylesheet" href="css/acciones.css">
          <title>Registro alumno</title>
        </head>
        <body>
        <!-- <div class="login-box"> -->
          <div class="form">
          <h1 align="center">Registro nuevo alumno</h1>
          <hr>
          <form method="post" action="insertar.php">
            <table align="center">
              <tr>
                <td>Matricula:</td>
                <td><input class="form" type="text" placeholder="Matricula" name="matricula" required></td>
              </tr>
              <tr>
                <td>Nombre:</td>
                <td><input class="form" type="text" placeholder="Nombre" name="nombre" required></td>
              </tr>
              <tr>
                <td>Especialidad:</td>
                <td><input class="form" type="text" placeholder="Especialidad" name="espec" required></td>
              </tr>
              
              <tr class="btns">
                <td><input class="enviar" type="submit" value="Enviar"></td>
                <td><input class="borrar" type="reset" value="Borrar"></td>
              </tr>
            </table>
            <input type="hidden" name="tab" value="<?php echo $tab; ?>">
          </form>
          <hr>
          </div>
          <!-- </div> -->
        </body>
        <?php
      }

      else if ($tab=='c') 
      {?>
        <head>
          <meta charset="utf-8">
          <link rel="stylesheet" href="css/acciones.css">
          <title>Registro Contacto</title>
        </head>
        <body>
          <h1 align="center">Registro contacto</h1>
          <hr>
          <div class="form">
          <form method="post" action="insertar.php">
            <table align="center">
              <tr>
                <td>Nombre:</td>
                <td><input type="text" placeholder="Nombre" name="nombre" required></td>
              </tr>
              <tr>
                <td>Apellidos:</td>
                <td><input type="text" placeholder="Apellidos" name="apellidos" required></td>
              </tr>
              <tr>
                <td>Email:</td>
                <td><input type="text" placeholder="Email" name="email" required></td>
              </tr>
              <tr>
                <td>Direccion:</td>
                <td><input type="text" placeholder="Direccion" name="direccion" required></td>
              </tr>
              <tr>
                <td>Telefono:</td>
                <td><input type="text" placeholder="Telefono" name="telefono" required></td>
              </tr>
              <tr>
                <td ><input type="submit" value="Enviar"></td>
                <td><input type="reset" value="Borrar"></td>
              </tr>
            </table>
            <input type="hidden" name="tab" value="<?php echo $tab; ?>">
          </form>
          </div>
          <hr>
        </body>
        <?php
      }
      else if ($tab=='u') 
      {?>
        <head>
          <meta charset="utf-8">
          <link rel="stylesheet" href="css/usuario.css">
        <title>Registro Usuario</title>
      </head>
      <body>
        <div class="form">
        <h1 align="center">Registro usuario</h1>
        <hr>
        <form method="post" action="insertar.php">
          <table align="center">
            <tr>
              <td>Usuario:</td>
              <td><input type="text" placeholder="usuario" name="usuario" required></td>
            </tr>
            <tr>
              <td>Contraseña:</td>
              <td><input type="password" placeholder="contraseña" name="contrasena" required></td>
            </tr>
            <tr>
              <td>Privilegio:</td>
              <td>
                <select class="select-css" name="priv" required>
                  <option value="admin">Admin</option> 
                  <option value="estandar">Estandar</option> 
                </select>
              </td>
            </tr>
              <td ><input type="submit" value="Enviar"></td>
              <td><input type="reset" value="Borrar"></td>
            </tr>
          </table>
          <input type="hidden" name="tab" value="<?php echo $tab; ?>">
        </form>
      
        <hr>
        </div>
      </body>
      <!-- eliminar -->
      <?php
      }
    }

  else if ($ope=='b') 
        {
          if ($tab=='a') 
          {
            $consulta="select matricula,nombre, especialidad from alumnos";
            $query=mysqli_query($conexion,$consulta);  
            
            echo '<link href="css/eliminar.css" type="text/css" rel="stylesheet">';
            echo '<link href="https://file.myfontastic.com/L5BeFP7iJsBgSvvxoKMcs9/icons.css" rel="stylesheet">';

            echo "<hr><h3 align=center>Eliminar registros de la tabla alumnos</h3>";
            echo "<p align='center'>Selecciona el registro que deseas eliminar</p>";
            echo "<table border='2' align=center>";
            echo "<tr>";
            echo "<th>Matricula</th>";
            echo "<th>Nombre</th>";
            echo "<th>Especialidad</th>";
            echo "<th></th>";
            echo "</tr>";
            while ($columna=mysqli_fetch_array($query)) 
            {
              echo "<tr>";
              echo "<td>".$columna['matricula'] . "</td><td>" . $columna['nombre'] . "</td><td>" . $columna['especialidad'] . "</td>";
              echo "<td><a class='icon-trash-o' href = eliminar.php?matricula=".$columna['matricula']."&tab=".$tab."></a></td>";
              echo "</tr>";
            }
            echo "</table>";
            echo "<hr>";
            $numregistros=mysqli_num_rows($query);
            echo "<h3 align=center> La cantidad de registros encontrados es: $numregistros</h3>";
          }

          else if ($tab=='c') 
          {
            $consulta="select id, nombre, apellidos, direccion, telefono, email from contactos";
            $query=mysqli_query($conexion,$consulta); 
            echo '<link href="css/consultas.css" type="text/css" rel="stylesheet">';
          echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' integrity='sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z' crossorigin='anonymous'>";

            echo '<link href="https://file.myfontastic.com/L5BeFP7iJsBgSvvxoKMcs9/icons.css" rel="stylesheet">';
            echo "<br><h3 align=center>Eliminar registros de la tabla contactos</h3>";
            echo "<p align='center'>Selecciona el alumno que deseas eliminar</p>";
            echo "<table class='table table-dark' border='2' align=center>";

            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Nombre</th>";
            echo "<th>Apellidos</th>";
            echo "<th>Direccion</th>";
            echo "<th>Telefono</th>";
            echo "<th>E-mail</th>";
            echo "<th>Eliminar</th>";
            echo "</tr>";

            while ($columna=mysqli_fetch_array($query)) {
              echo "<tr>";
              echo "<td>".$columna['id'] . "</td><td>" . $columna['nombre'] . "</td><td>" . $columna['apellidos'] . "</td><td>" .$columna['direccion'] . "</td><td>".$columna['telefono'] . "</td><td>" . $columna['email'] . "</td>";
              // echo "<td><a class='icon-trash-o' href=eliminar.php?idpersona=".$columna['id']."></a></td>";
              // echo "<td><a class='icon-trash-o' href = eliminar.php?username=".$columna['id']."&tab=".$tab."></a></td>";
              echo "<td><a class='icon-trash-o' href = eliminar.php?id=".$columna['id']."&tab=".$tab."></a></td>";
              // echo "<td><a class='icon-pencil-square-o' href=actualizar.php?idpersona=".$columna['idpersona']."></a></td>";
              echo "</tr>";
            }
            echo "</table>";
          }

          else if ($tab=='u') 
          {
            $consulta="select username, password, privilegio from usuarios";
            $query=mysqli_query($conexion,$consulta);  
            echo '<link href="css/eliminar.css" type="text/css" rel="stylesheet">';
            echo '<link href="https://file.myfontastic.com/L5BeFP7iJsBgSvvxoKMcs9/icons.css" rel="stylesheet">';
            echo "<hr><h3 align=center>Eliminar registros de la tabla usuarios</h3>";
            echo "<p align='center'>Selecciona el registro que deseas eliminar</p>";
            echo "<table border='2' align=center>";
            echo "<tr>";
            echo "<th>Nombre</th>";
            echo "<th>Contraseña</th>";
            echo "<th>privilegio</th>";
            echo "<th></th>";
            echo "</tr>";
            while ($columna=mysqli_fetch_array($query)) 
            {
              echo "<tr>";
              echo "<td>".$columna['username'] ."</td><td readonly>". $columna['password'] . "</td><td>" . $columna['privilegio'] . "</td>";
              echo "<td><a class='icon-trash-o' href = eliminar.php?username=".$columna['username']."&tab=".$tab."></a></td>";
              echo "</tr>";
            }
            echo "</table>";
            echo "<hr>";
            $numregistros=mysqli_num_rows($query);
            echo "<h3 align=center> La cantidad de registros encontrados es: $numregistros</h3>";
          }
        }

  else if ($ope=='m') 
        {
        	if ($tab=='a') 
          {
            $consulta="select matricula,nombre, especialidad from alumnos";
            $query=mysqli_query($conexion,$consulta);  
            echo '<link href="css/modificar.css" type="text/css" rel="stylesheet">';
            echo '<link href="https://file.myfontastic.com/L5BeFP7iJsBgSvvxoKMcs9/icons.css" rel="stylesheet">';
            echo "<hr><h3 align=center>Modificar registros de la tabla alumnos</h3>";
            echo "<p align='center'>Selecciona el registro que deseas modificar</p>";
            echo "<table border='2' align=center>";
            echo "<tr>";
            echo "<th>Matricula</th>";
            echo "<th>Nombre</th>";
            echo "<th>Especialidad</th>";
            echo "<th>Acción</th>";
            echo "</tr>";
            while ($columna=mysqli_fetch_array($query)) 
            {
              echo "<tr>";
              echo "<td>".$columna['matricula'] ."</td><td>".$columna['nombre']."</td><td>".$columna['especialidad']."</td>";
              echo "<td><a class='icon-pencil-square-o' href = actualizar.php?matricula=".$columna['matricula']."&tab=".$tab."></a></td>";
              echo "</tr>";
            }
            echo "</table>";
            echo "<hr>";
            $numregistros=mysqli_num_rows($query);
            echo "<h3 align=center> La cantidad de registros encontrados es: $numregistros</h3>";
          }

          else if ($tab=='c') 
          {
            $consulta="select id, nombre, apellidos, direccion, telefono, email from contactos";
            $query=mysqli_query($conexion,$consulta); 
            echo '<link href="css/modificar.css" type="text/css" rel="stylesheet">';
            echo '<link href="https://file.myfontastic.com/L5BeFP7iJsBgSvvxoKMcs9/icons.css" rel="stylesheet">';
            echo "<hr><h3 align=center>Modificar registros de la tabla contactos</h3>";
            echo "<p align='center'>Selecciona el registro que deseas modificar</p>";
            echo "<table border='2' align=center>";
            echo "<tr>";
            ?>
            <!-- termina eliminar -->
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Acción</th>
            <?php
            echo "</tr>";

            while ($columna=mysqli_fetch_array($query))
            {
              echo "<tr>";
              echo "<td>".$columna['nombre']."</td><td>" . $columna['apellidos'] . "</td><td>" . $columna['direccion'] . "</td><td>".$columna['telefono']."</td><td>".$columna['email']."</td>";
              echo "<td><a class='icon-pencil-square-o'href = actualizar.php?id=".$columna['id']."&tab=".$tab."></a></td>";
              echo "</tr>";
            }
            echo "</table>";
          }

          else if ($tab=='u') 
          {
            $consulta="select username, password, privilegio from usuarios";
            $query=mysqli_query($conexion,$consulta);  
            echo '<link href="css/modificar.css" type="text/css" rel="stylesheet">';
            echo '<link href="https://file.myfontastic.com/L5BeFP7iJsBgSvvxoKMcs9/icons.css" rel="stylesheet">';
            echo "<hr><h3 align=center>Modificar registros de la tabla usuarios</h3>";
            echo "<p align='center'>Selecciona el registro que deseas modificar</p>";
            echo "<table border='2' align=center>";
            echo "<tr>";
            echo "<th>Nombre</th>";
            echo "<th>Contraseña</th>";
            echo "<th>Privilegio</th>";
            echo "<th>Acción</th>";
            echo "</tr>";
            while ($columna=mysqli_fetch_array($query)) 
            {
              echo "<tr>";
              echo "<td>".$columna['username'] ."</td><td readonly>". $columna['password'] . "</td><td>" . $columna['privilegio'] . "</td>";
              echo "<td><a class='icon-pencil-square-o' href = actualizar.php?username=".$columna['username']."&tab=".$tab."></a></td>";
              echo "</tr>";
            }
            echo "</table>";
            echo "<hr>";
            $numregistros=mysqli_num_rows($query);
            echo "<h3 align=center> La cantidad de registros encontrados es: $numregistros</h3>";
          }
        }
        
        
       echo" <a href='prueba2/index.php'><h3 
       align=center 
       style='color:white;
       border: none;
       outline: none;
       margin-left:46%;
       width: 5rem;
       background: black;
       color: white;
       font-size: 1rem;
       border-radius: 1.25rem;'>Volver</h3></a>"

        
   
?>