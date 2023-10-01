<?php require_once 'includes/redirrecion.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>


<div id= "principal">
    <h1>Crear categorias</h1>
    <p>
        Añade nuevas categorias al blog para que los usuarios
        puedan usarlas al crear sus entradas
    </p>
    <br />
    <form action="acciones/guardar-categoria.php" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" />

    <input type="submit" value="Guardar" />

    </form>


</div>  

<?php require_once 'includes/pie.php' ?>
