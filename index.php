<?php
include 'template/header.php' ?>

<?php
include_once 'model/conexion.php';

$sentencia = $bd->query("select * from persona");
$persona = $sentencia->fetchAll(PDO::FETCH_OBJ);

//print_r($persona);


?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!--  inicio alerta -->
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {

                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Rellena todos los campos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <!--  Fin alerta   -->
                <?php
            }
            ?>

            <!--  Insercion correcta -->
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {

                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Registrado!</strong> Se agregaron todos los datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <!--  Fin alerta   -->
                <?php
            }
            ?>

            <!--  Edicion correcta -->
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {

                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Editado!</strong> Editado de manera correcta.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <!--  Fin error   -->
                <?php
            }
            ?>

            <!--  Error -->
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {

                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Vuelve a intentarlo.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <!--  Fin error   -->
                <?php
            }
            ?>

            <!--  Error -->
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {

                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Advertencia!</strong> Tu informacion fue eliminada.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <!--  Fin error   -->
                <?php
            }
            ?>

            <div class="card">
                <div class="card-header">
                    List of peoples
                </div>
                <div class="p-4">
                    <?php
                    if (count($persona) > 0) {
                        ?>
                        <table class="table align-middle">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Age</th>
                                <th scope="col">Sign</th>
                                <th scope="col" colspan="2">Options</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php

                            foreach ($persona as $data) {
                                ?>

                                <tr>
                                    <td scope="row"><?php echo $data->codigo; ?></td>
                                    <td><?php echo $data->nombre; ?></td>
                                    <td><?php echo $data->edad; ?></td>
                                    <td><?php echo $data->signo; ?></td>
                                    <td>
                                        <a href="editar.php?codigo=<?php echo $data->codigo; ?>"
                                           class="text-success">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a onclick="return confirm('Estas seguro de eliminar?')" href="eliminar.php?codigo=<?php echo $data->codigo; ?>"
                                           class="text-danger">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <?php
                            }

                            ?>

                            </tbody>

                        </table>
                        <?php
                    } else {
                        ?>
                        <small class="form-text text-muted g-font-size-default g-mt-10">
                            <?php echo "No hay datos para mostrar"; ?>
                        </small>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form action="registrar.php" class="p-4" method="POST">
                    <div class="mb-3">
                        <label class="form-label"> Nombre:
                            <input type="text" name="txtNombre" class="form-control"
                                   autofocus required>
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Edad:
                            <input type="number" name="txtEdad" class="form-control"
                                   autofocus required>
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Signo:
                            <input type="text" name="txtSigno" class="form-control"
                                   autofocus required>
                        </label>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php'; ?>

