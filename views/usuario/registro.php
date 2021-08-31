<h1>Registrarse</h1>
<?php if(isset($_SESSION['register']) && $_SESSION['register'] == true):?>
        <strong class="alert_green">*Registro Correcto*</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == false):?>
        <strong class="alert_red">*Error al Registrarse*</strong>
<?php endif;?>      
<?php Utilities::sessionsDelete('register')?>
<form class="register" action="index.php?controller_option=usuarioController&method_option=saveUser" method="POST">
    <?php if(isset($_SESSION['errores']) && !empty($_SESSION['errores']['nombre'])):?>
        <strong class="alert_red"><?=$_SESSION['errores']['nombre']?></strong>
    <?php endif;?>
      
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre"/><br>

    <?php if(isset($_SESSION['errores']) && !empty($_SESSION['errores']['apellidos'])):?>
        <strong class="alert_red"><?=$_SESSION['errores']['apellidos']?></strong>
    <?php endif;?>   
    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos"/><br>

    <?php if(isset($_SESSION['errores']) && !empty($_SESSION['errores']['email'])):?>
        <strong class="alert_red"><?=$_SESSION['errores']['email']?></strong>
    <?php endif;?>
    <label for="email">Email</label>
    <input type="email" name="email"/><br>

    <?php if(isset($_SESSION['errores']) && !empty($_SESSION['errores']['password'])):?>
        <strong class="alert_red"><?=$_SESSION['errores']['password']?></strong>
    <?php endif;?>
    <label for="password">Password</label>
    <input type="text" name="password"/>
    
    <?php Utilities::sessionsDelete('errores')?>
    <input type="submit" value="Registrase"/>
</form> 