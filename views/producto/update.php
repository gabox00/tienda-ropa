<h1>Editar producto</h1>
<a href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=productoController&method_option=gestionar"> <img class="regresar" src="https://img.icons8.com/windows/32/000000/reply-arrow.png"> </a>
<form action="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=productoController&method_option=updateProduct&id=<?=$id?>" method="POST" enctype="multipart/form-data">
    <?php if(isset($_SESSION['errores']) && !empty($_SESSION['errores']['nombre'])):?>
        <strong><?=$_SESSION['errores']['nombre']?></strong>
        <?php Utilities::sessionsDelete('errores');?>
    <?php endif?>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required="required" value="<?=$producto->nombre?>"></input>

    <label for="categoria">Categoria:</label>
    <select name="categoria">
        <?php while($cat = $categorias->fetch_object()):?>
        <option value="<?=$cat->id?>" <?=isset($producto) && is_object($producto) && $cat->id == $producto->categoria_id ? 'selected' : ''?>> <?=$cat->nombre?></option>
        <?php endwhile;?>
    </select>

    <label for="descripcion">Descripcion</label>
    <input type="text" name="descripcion" value="<?=$producto->descripcion?>"></input>

    <label for="precio">Precio:</label>
    <input type="text" name="precio" required="required" value="<?=$producto->precio?>"></input>

    <label for="stock">Stock:</label>
    <input type="text" name="stock" required="required" value="<?=$producto->stock?>"></input>

    <label for="oferta">Oferta:</label>
    <input type="text" name="oferta" required="required" value="<?=$producto->oferta?>"></input>

    <label for="image">Imagen:</label>
    <img class="thumb" src="uploads/images/<?=$producto->image?>"><br></br>
    <input type="file" name="image"</input><br></br>

    <input type="submit" value="Agregar"></input>
</form>