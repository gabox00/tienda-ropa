<h1>Gestionar Productos</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th></th>
    </tr>
<?php while($prod = $productos->fetch_object()):?>
    <tr>
        <td><?=$prod->id?></td>
        <td><?=$prod->nombre?></td>
        <td><?=$prod->precio?></td>
        <td><?=$prod->stock?></td>
        <td style="width: 60px;"><a href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=productoController&method_option=viewUpdateProduct&id=<?=$prod->id?>"><img src="https://img.icons8.com/plasticine/30/000000/pencil.png"></a><a href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=productoController&method_option=deleteProduct&id=<?=$prod->id?>"><img src="https://img.icons8.com/offices/30/000000/delete-sign.png"></a></td>
    </tr>
<?php endwhile; ?>
</table>
<a href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=productoController&method_option=crearProductos" class="button button-small">Crear producto</a>