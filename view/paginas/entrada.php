    <main class="contenedor">
        <h1><?php echo $entrada->title; ?></h1>

        <div class="entrada-contenido">
            <picture>
                <source srcset="imagenes/<?php echo $entrada->imagen; ?>" type="image/webp">
                <source srcset="imagenes/<?php echo $entrada->imagen; ?>" type="image/jpeg">
                <img src="imagenes/<?php echo $entrada->imagen; ?>" alt="<?php echo $entrada->title; ?>" loading="lazy">
            </picture>
            <div class="entrada-contenido-texto">
                <p>Escrito el: <span><?php echo $entrada->fecha; ?></span> POR: <span>Admin</span></p>
                <p><?php echo $entrada->content; ?></p>
            </div>
        </div>
    </main>