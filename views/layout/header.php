<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Tienda de camisassdqddwqdqwdqw</title>
        <link rel="stylesheet" href="assets/css/styles.css"/>
    </head>
    <body>
        <div id="container">
            <!-- CABECERA -->
            <header id="header">
                <div id="logo">
                    <img src="assets/img/camiseta.png" alt="Camiseta"/>
                    <a href="index.php">Tienda de camisasasdsadasdsa</a>                
                </div>
            </header>
            <!-- MENU -->
            <?php $categorias = Utilities::showCategorias();?>
            <nav id="menu">
                <ul>
                    <li>
                        <a href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=productoController&method_option=index">Inicio</a>
                    </li>
                    <?php while($cat = $categorias->fetch_object()):?>
                        <li>
                            <a href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=productoController&method_option=mostrar&id=<?=$cat->id?>"><?= $cat->nombre ?></a>
                        </li>
                    <?php endwhile;?>
                    <li>
                        <a href="#"> Nosotros </a>
                    </li>
                </ul>
            </nav>
            <div id="content">