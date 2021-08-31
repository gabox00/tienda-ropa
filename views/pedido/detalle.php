<h1>Detalle del pedido</h1>
<h3>Se ha realizado el pago exitosamente</h3><br>
<h4>Datos del pedido:</h4>
<p><?=$provincia?></p>
<p><?=$localidad?></p>
<p><?=$direccion?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Precio Euros/Unidad</th>
        <th>unidades</th>
    </tr>
    <?php foreach($_SESSION['carrito'] as $indice => $elemento):?>
        <tr>
            <td><img class="img_carrito" src="uploads/images/<?=$elemento['producto']->image?>"></td>
            <td><a style="cursor: pointer" href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=productoController&method_option=mostrarDetalle&prod_id=<?=$elemento['producto']->id?>&cat_id=<?=$elemento['producto']->categoria_id?>"><?=$elemento['producto']->nombre?></a></td>
            <td><?=$elemento['producto']->precio?></td>
            <td><?=$elemento['unidades']?></td>
        </tr>
    <?php endforeach; ?>
</table>   
    <div class="carrito">
        <h3>Total: <?=Utilities::statsCarrito()['total']?> Euros</h3>
    </div>

