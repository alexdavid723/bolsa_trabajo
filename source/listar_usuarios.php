<?php
include("../includes/head.php");
include("../includes/conectar.php");
$conexion=conectar();
?>

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Inicio Zona  central del sistema  -->
    <h1>Lista de usuarios</h1>

    <?php

        $sql="SELECT * FROM usuarios";
        $registros=mysqli_query($conexion,$sql);

        echo "<table class='table table-dark table-hover'>";

        echo "<th>Nombres</th>";
        echo "<th>Apellidos</th>";
        echo "<th>DNI</th>";
        echo "<th>Direccion</th>";
        echo "<th>Telefono</th>";
        echo "<th>Acciones</th>";

        while($fila = mysqli_fetch_array($registros)){
            echo "<tr>";
                echo "<td>".$fila['nombre']."</td>";
                echo "<td>".$fila['apellidos']."</td>";
                echo "<td>".$fila['dni']."</td>";
                echo "<td>".$fila['dirección']."</td>";
                echo "<td>".$fila['teléfono']."</td>";

                echo "<td>";
                    ?>
                    <button type="button" class="btn btn-warning" onclick="editarUsuario('<?php echo $fila['id']; ?>')">Editar</button>
                    <button type="button" class="btn btn-danger" onclick="eliminarUsuario(<?php echo $fila['id']; ?>)">Eliminar</button>

                    

                    <?php
                echo "</td>";
            echo "</tr>";
        }
        echo "</table>";

    ?>








    <!-- Fin Zona  central del sistema  -->


</div>
<!-- /.container-fluid -->
<?php
include("../includes/foot.php");
?>

<script>
    function editarUsuario(id) {
        location.href = "editar_usuario.php?id=" + id;
    }

    function eliminarUsuario(id) {
        if (confirm('¿Estás seguro de que quieres eliminar este usuario?')) {
            window.location.href = "eliminar_usuario.php?id=" + id;
        }
    }
</script>