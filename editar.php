<?php include 'template/header.php' ?>

<?php
if (!isset($_GET['codigo'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

include_once 'model/conexion.php';

$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("SELECT * from persona where codigo = ?;");
$sentencia->execute([$codigo]);
$persona = $sentencia->fetch(PDO::FETCH_OBJ);
//print_r($persona);

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form action="editarProceso.php" class="p-4" method="POST">
                    <div class="mb-3">
                        <label class="form-label"> Nombre:
                            <input type="text" name="txtNombre" class="form-control"
                                   autofocus required value="<?php echo $persona->nombre; ?>">
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Edad:
                            <input type="number" name="txtEdad" class="form-control"
                                   autofocus required value="<?php echo $persona->edad; ?>">
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Signo:
                            <input type="text" name="txtSigno" class="form-control"
                                   autofocus required value="<?php echo $persona->signo; ?>">
                        </label>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $persona->codigo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php'; ?>
