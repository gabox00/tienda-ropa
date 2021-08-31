<table>
    <tr>
        <th>Nombre</th>
        <th>Imagen</th>
        <th>Fecha</th>
    </tr>
    <?php while($pedido = $pedidos->fetch_object()):?>
    <tr> 
        <td><?=$pedido->nombre?></td>
        <td><img class="img_carrito" src="uploads/images/<?=$pedido->image?>"></td>
        <td><?=$pedido->fecha?></td>
    </tr>
    <?php $total = $pedido->coste ?>
    <?php endwhile;?>
</table>
<div class="carrito">
    <h3>Total: <?=$total?> Euros</h3>
</div>
<?php if(Utilities::admin()):?>
    <div class="estado">
            <form action="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=pedidoController&method_option=updateStatePedido" method="POST">
                <input type="hidden" value="<?=$_GET['id']?>" name="pedido_id">
                <label for="estado">Estado:</label>
                <select name="estado">
                    <option value="pending">Pendiente</option>
                    <option value="preparation">En preparacion</option>
                    <option value="ready">Preparado para enviar</option>
                    <option value="sended">Enviado</option>
                </select>
                <input type="submit" name="actualizar" value="Actualizar">
            </form>
        </div>
<?php endif;?>