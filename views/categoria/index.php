<h1>Gestionar Categoria</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
    </tr>
<?php while($cat = $categorias->fetch_object()):?>
    <tr>
        <td><?=$cat->id?></td>
        <td><?=$cat->nombre?></td>
    </tr>
<?php endwhile; ?>
</table>
<a href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=categoriaController&method_option=crearCategorias" class="button button-small">Crear categoria</a>
<?php Utilities::sessionsDelete('msg')?>
