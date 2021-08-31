<h1>Carrito de compras</h1>
<?php if(empty($_SESSION['carrito'])):?>
<table>
    <tr>
        <th>imagen</th>
        <th>Nombre</th>
        <th>Precio Euros/Unidad</th>
        <th>unidades</th>
    </tr>
</table>
<?php else:?>
<table>
    <tr>
        <th>imagen</th>
        <th>Nombre</th>
        <th>Precio Euros/Unidad</th>
        <th>unidades</th>
        <th></th>
    </tr>
    <?php foreach($_SESSION['carrito'] as $indice => $elemento):?>
        <tr>
            <td><img class="img_carrito" src="uploads/images/<?=$elemento['producto']->image?>"></td>
            <td><a style="cursor: pointer" href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=productoController&method_option=mostrarDetalle&prod_id=<?=$elemento['producto']->id?>&cat_id=<?=$elemento['producto']->categoria_id?>"><?=$elemento['producto']->nombre?></a></td>
            <td><?=$elemento['producto']->precio?></td>
            <td>
                <a href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=carritoController&method_option=modifyUnits&mas&indice=<?=$indice?>" class="mas">+</a>
                <?=$elemento['unidades']?>
                <a href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=carritoController&method_option=modifyUnits&menos&indice=<?=$indice?>" class="menos">-</a>
            </td>
            <td><a class="button-eliminar" href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=carritoController&method_option=unsetProduct&indice=<?=$indice?>">Eliminar</a></td>
        </tr>
    <?php endforeach; ?>
</table>   
    <div class="delete-carrito">
        <a class="button button-vaciar" href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=carritoController&method_option=unsetCarrito">Vaciar carrito</a> 
    </div>  
    <div class="carrito">
        
        <h3>Total: <?=Utilities::statsCarrito()['total']?> Euros</h3>
        <a class="button button-pedido" href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=pedidoController&method_option=index">Hacer pedido</a>    
        
    </div>
<?php endif;?>

