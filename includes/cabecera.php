<?php require_once 'conexion.php'; ?>
<?php require_once 'includes/helpers.php' ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog de VideoJuegos</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/styles.css" />
</head>

<body>
    <!-- cabezera -->
    <header id="cabecera">
        <div id="logo">
            <a href="index.php">
                Blog de VideoJuegos
            </a>
        </div>
        <!-- menu -->
        <nav id="menu">
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>
                <?php $categorias = conseguirCategorias($db)?>
                <?php 
                if(!empty($categorias)):
                    while ($categoria = mysqli_fetch_assoc($categorias)): ?>
                    <li>
                        <a href="categoria.php?id=<?=$categoria['id']?>"><?= $categoria['nombre'] ?></a>
                    </li>
                <?php 
                    endwhile;
                endif; ?>

            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>

    <div id="contenedor">