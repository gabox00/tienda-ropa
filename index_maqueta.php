<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Tienda de camisas</title>
        <link rel="stylesheet" href="assets/css/styles.css"/>
    </head>
    <body>
        <div id="container">
            <!-- CABECERA -->
            <header id="header">
                <div id="logo">
                    <img src="assets/img/camiseta.png" alt="Camiseta"/>
                    <a href="index.php">Tienda de camisas</a>                
                </div>
            </header>
            <!-- MENU -->
            <nav id="menu">
                <ul>
                    <li>
                        <a href="#">Inicio</a>
                    </li>
                    <li>
                        <a href="#">Campo1</a>
                    </li>
                    <li>
                        <a href="#">Campo2</a>
                    </li>
                    <li>
                        <a href="#">Campo3</a>
                    </li>
                    <li>
                        <a href="#">Campo4</a>
                    </li>                
                </ul>
            </nav>
            <div id="content">
                <!-- BARRA LATERAL -->
                <aside id="barra_lateral">
                    <h3>Entrar a la web</h3>
                    <div id="login" class="block_aside">
                        <form action="#" method="POST">
                            <label for="email">Email</label>
                            <input type="email" name="email"></input>
                            <label for="password">Password</label>
                            <input type="password" name="password"></input>
                            <input type="submit" value="Login"/>
                        </form>
                        <ul>
                            <li> <a href="#">Mis pedidos</a> </li>
                            <li> <a href="#">Gestionar pedidos</a> </li>
                            <li> <a href="#">Gestionar categorias</a> </li>
                        </ul>
                    </div>
                </aside>
                <!-- CAJA PRINCIPAL --> 
                <div id="central">
                    <h1>Camisetas Destacadas</h1>
                    <div class="product">
                        <img src="assets/img/camiseta.png" alt="Camiseta"/>
                        <h2>Camiseta azul ancha</h2>
                        <p>30 euros</p>
                        <a href="#" class="button">Comprar</a>
                    </div>
                    <div class="product">
                        <img src="assets/img/camiseta.png" alt="Camiseta"/>
                        <h2>Camiseta azul ancha2</h2>
                        <p>30 euros</p>
                        <a href="#" class="button">Comprar</a>
                    </div>
                    <div class="product">
                        <img src="assets/img/camiseta.png" alt="Camiseta"/>
                        <h2>Camiseta azul ancha3</h2>
                        <p>30 euros</p>
                        <a href="#" class="button">Comprar</a>
                    </div>
                </div>
            </div>
        <!-- PIE DE PAGINA -->
        <footer id="pie">
            <p>Desarrollado por Gabriel Guierrez &copy; <?=date('Y')?></p>
        </footer>
    </div>
</body>
</html>
