<table>
    <tr>
        <th>Id</th>
        <th>Total</th>
        <th>Fecha</th>
        <th>Estado</th>
    </tr>
    <?php while($pedido = $pedidos->fetch_object()):?>
    <tr> 
        <td><a href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=pedidoController&method_option=verPedido&id=<?=$pedido->id?>"><?=$pedido->id?></a></td>
        <td><?=$pedido->coste?></td>
        <td><?=$pedido->fecha?></td>
        <td><?=$pedido->estado?></td>
    </tr>
    <?php endwhile;?>
</table>