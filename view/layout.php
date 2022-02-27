<?php 
    if(!isset($_SESSION)) {
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;

    if(!isset($inicio)) {
        $inicio = false;
    }

    if(!isset($simpleheader)) {
        $simpleheader = true;
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../build/css/app.css">
    <title>Bienes Raices</title>
</head>

<body class="">

    <header class="<?php echo $simpleheader ? 'simpleheader' : '' ?> <?php echo $inicio ? 'inicio' : ''; ?> ">
            <nav class="<?php echo $simpleheader ? 'dark' : '' ?>">
                <div class="logo">
                    <a href="/">
                        <p>bienes<span>raices</span></p>
                    </a>
                </div>
                <div class="mobile-menu">
                    <img src="../build/img/barras.svg" alt="icono menu responsive" id="hamburger">
                </div>
                <ul class="list" data-cy="navbar_header_ul">
                    <li><a href="/nosotros">Nosotros</a></li>
                    <li><a href="/anuncios">Anuncios</a></li>
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="/contacto">Contacto</a></li>
                    <?php if($auth) : ?>
                         <li><a href="/logout">Cerrar sesión</a></li>
                    <?php endif; ?>
                    <img src="../build/img/dark-mode.svg" class="dark-mode-button" id="moon">
                </ul>
            </nav>
            <?php 
                if($inicio) {
                    echo "<h1 class='titulo' data-cy='header'>Venta de casas y departamentos exclusivos de lujo</h1>";
                };
            ?>
    </header>

    
    <?php echo($contenido); ?>


    <footer>
        <nav>
            <ul data-cy="navbar_footer_ul">
                <li><a href="/nosotros">Nosotros</a></li>
                <li><a href="/anuncios">Anuncios</a></li>
                <li><a href="/blog">Blog</a></li>    
                <li><a href="/contacto">Contacto</a></li>
            </ul>
        </nav>

        <?php 
            $fecha = date('Y');
        ?>

        <p class="copyright">Todos los derechos reservados <?php echo $fecha ?> &copy;</p>
    </footer>
    <script src="../build/js/bundle.min.js"></script>
</body>

</html>