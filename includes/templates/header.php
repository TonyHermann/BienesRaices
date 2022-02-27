<?php 
    if(!isset($_SESSION)) {
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;


    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bienesraices/build/css/app.css">
    <title>Bienes Raices</title>
</head>

<body class="">

    <header class="<?php echo $simpleheader ? 'simpleheader' : '' ?> <?php echo $inicio ? 'inicio' : ''; ?> ">
            <nav class="<?php echo $simpleheader ? 'dark' : '' ?>">
                <div class="logo">
                    <a href="/bienesraices/index.php">
                        <p>bienes<span>raices</span></p>
                    </a>
                </div>
                <div class="mobile-menu">
                    <img src="/bienesraices/build/img/barras.svg" alt="icono menu responsive" id="hamburger">
                </div>
                <ul class="list">
                    <li><a href="/bienesraices/nosotros.php">Nosotros</a></li>
                    <li><a href="/bienesraices/anuncios.php">Anuncios</a></li>
                    <li><a href="/bienesraices/blog.php">Blog</a></li>
                    <li><a href="/bienesraices/contacto.php">Contacto</a></li>
                    <?php if($auth) : ?>
                         <li><a href="/bienesraices/cerrar-sesion.php">Cerrar sesión</a></li>
                    <?php endif; ?>
                    <img src="/bienesraices/build/img/dark-mode.svg" class="dark-mode-button" id="moon">
                </ul>
            </nav>
            <?php 
                if($inicio) {
                    echo "<h1 class='titulo'>Venta de casas y departamentos exclusivos de lujo</h1>";
                };
            ?>
    </header>

    