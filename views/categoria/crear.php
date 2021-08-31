<h1>Crear Categoria</h1>
<a href="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=categoriaController&method_option=index"> <img class="regresar" src="https://img.icons8.com/windows/32/000000/reply-arrow.png"> </a>
<form class="crear" action="http://localhost/proyectophp/proyecto-php-poo/index.php?controller_option=categoriaController&method_option=crearCategorias" method="POST">
    <?php if(isset($_SESSION['msg']) && !$_SESSION['msg']):?>
        <strong class="alert_red categoria">Nombre Incorrecto</strong>
        <?php Utilities::sessionsDelete('msg')?>
    <?php endif?>
    <label class="label-crear" for="nombre">Nombre:</label>
    <input class="text-crear" type="text" name="nombre" required="required"></input>
    <input class="button-crear" type="submit" value="Agregar"></input>
</form>
