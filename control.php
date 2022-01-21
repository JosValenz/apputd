<!DOCTYPE html>
<html lang="es">
<heead>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- <link href="https://file.myfontastic.com/L5BeFP7iJsBgSvvxoKMcs9/icons.css" rel="stylesheet"> -->
    <!-- <link href="https://file.myfontastic.com/tugZ2TFiNMjGFAz6BcTEeK/icons.css" rel="stylesheet"> -->
    <link href="https://file.myfontastic.com/L5BeFP7iJsBgSvvxoKMcs9/icons.css" rel="stylesheet">
    <title>Control Escolar</title>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">APPUTD</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Alumnos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Usuarios</a>
          <a class="dropdown-item" href="#">Another action</a>
         
          <a class="dropdown-item" href="#">Something else here</a>
        </div> 

      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Contactos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Usuarios</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div> 
        
      <!-- ahora se la mando  -->
     <!-- Que paso?por que no la veo en mi whatsapp ahora?xd -->
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Usuarios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Usuarios</a>
          <a class="dropdown-item" href="#">Another action</a>
       
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<!-- <td>¿A que tabla? : </td>
              <td ><select name="tabla" required>
                      <option value="a" >Alumnos</option>
                      <option value="c">Contactos</option>
                      <option value="u">Usuarios</option>
                  </select>
              </td> -->
              <!-- Pues tenia pensado Que se refiere a optimizacion
            no a hacerlo identico, Hacer un menu con nose link,fotos ,iconos
          y que cada uno diga Ejemplo: Alumno y te lleve a alumno ... me explico? -->

  <!-- o no estas e el directo xd, se me olvido,bueno intenten usted lo que se pueda creen carpetas etc, voy a intentar que salga algo -->
<div id="Alumnos">
<div class="table-container">
  <table class="table">
      <thead>
          <th class="table_head">Matricula</th>
          <th class="table_head">Nombre</th>
          <th class="table_head">Especialidad</th>
      </thead>
      <!-- tan bien? -->
      <?php
          include('conectar_utd.php');
      
          $sel=$conexion->query("SELECT * FROM alumnos");
          while($fila=$sel->fetch_assoc()){
             

          ?>

          <tr >
              <td class="table_data"><?php echo $fila['matricula']?></td>
              <td class="table_data"><?php echo $fila['nombre']?></td>
              <td class="table_data"><?php echo $fila['especialidad']?></td>
              <td class="table_data" colspan="2" >
                 
                 <a class="icon-eye-3" class="btn_acciones" href="" ></a>
                 <a class="icon-eye-slash" class="btn_acciones" href=""></a>
                 <!-- estos dos de abajo son los botones -->
                 <a class="icon-wrench" value="a" class="btn_acciones"  href="actualizar.php?tab=<?php echo $fila['matricula']?>"></a>
                 <a class="icon-trash" class="btn_acciones" href="eliminar.php?tab=<?php echo $fila['matricula']?>"></a>
              </td>
          </tr> 

          
          <?php     
          }    
         ?>                     
  </table>
</div>
</div>

</div>


</div>

</body>
</html>