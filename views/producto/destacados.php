<h1>Algunos de nuestros productos</h1>
<?php while($prod = $producto->fetch_object()):?>
    <div class="product">
        <img src="uploads/images/<?=$prod->image?>" alt=""/>
        <h2><?=$prod->descripcion?></h2>
        <p><?=$prod->precio?> Euros</p>
        <a href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=productoController&method_option=mostrarDetalle&prod_id=<?=$prod->id?>&cat_id=<?=$prod->categoria_id?>" class="button index">Comprar</a>
    </div>
<?php endwhile; ?>