<!-- BARRA LATERAL -->
<aside id="barra_lateral">
    <div id="login" class="block_aside">
        <h3>Mi carrito</h3>
        <ul>
            <li>Productos (<?=Utilities::statsCarrito()['count']?>)</li>
            <li>Total: (<?=Utilities::statsCarrito()['total']?> Euros)</li>
            <li><a href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=carritoController&method_option=index">Ver el carrito</a></li>
        </ul>
        <?php if(!isset($_SESSION['user'])): ?>
            <h3>Entrar a la web</h3>
            <form action="index.php?controller_option=usuarioController&method_option=login" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email"></input>
                <label for="password">Password</label>
                <input type="password" name="password"></input>
                <input type="submit" value="Login"/>           
                <a href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=usuarioController&method_option=registro">Nuevo usuario? Registrate Aqui !</a>
            </form>
        <?php elseif(isset($_SESSION['user']) && $_SESSION['user']->rol == 'admin'):?>
        <h3><?=$_SESSION['user']->nombre?> <?=$_SESSION['user']->apellidos?></h3>     
        <ul>           
            <li> <a href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=pedidoController&method_option=allMyPedidos">Mis pedidos</a> </li>
            <li> <a href="#">Gestionar pedidos</a> </li>
            <li> <a href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=categoriaController&method_option=index">Gestionar categorias</a> </li>
            <li> <a href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=productoController&method_option=gestionar">Gestionar productos</a> </li>
        </ul>
        <form action="index.php?controller_option=usuarioController&method_option=logout" method="POST">
            <input class="logout" type="submit" value="Logout"/>
        </form>
        <?php elseif(isset($_SESSION['user']) && $_SESSION['user']->rol == 'user'):?>
        <h3><?=$_SESSION['user']->nombre?> <?=$_SESSION['user']->apellidos?></h3>
        <ul>           
            <li> <a href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=pedidoController&method_option=allMyPedidos">Mis pedidos</a> </li>
        </ul>   
        <form action="index.php?controller_option=usuarioController&method_option=logout" method="POST">
            <input class="logout" type="submit" value="Logout"/>
        </form>       
        <?php endif;?> 
    </div>
</aside>
<!-- CAJA PRINCIPAL --> 
<div id="central">