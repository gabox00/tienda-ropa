<h1>Detalle del producto</h1>
<a href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=productoController&method_option=mostrar&id=<?=$categoria->id?>"> <img class="regresar" src="https://img.icons8.com/windows/32/000000/reply-arrow.png"></a><br>
<img class="detalle" src="uploads/images/<?=$producto->image?>"><br></br> 
<div class="informacion">
    <h2><?=$producto->nombre?></h2>
    <p><?=$producto->descripcion?></p>
    <p><?=$producto->precio?> Euros</p>
    <?php if($producto->stock > 0):?>
        <p class="stock">En stock</p>
    <?php endif; ?>
    <?php if($producto->oferta > 0):?>
        <p class="oferta"><?=$producto->oferta?> % De descuento</p>
    <?php endif; ?>
</div>
<a href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=carritoController&method_option=add&prod_id=<?=$producto->id?>" class="button comprar">Agregar</a>
