<main class="contenedor">
    <h1>Blog</h1>
        <div class="blog">
            <?php foreach ($entradas as $entrada) : ?> 
                <article class="entrada">
                    <div class="imagen">
                        <picture>
                            <source srcset="imagenes/<?php echo $entrada->imagen; ?>" type="image/webp">
                            <source srcset="imagenes/<?php echo $entrada->imagen; ?>" type="image/jpeg">
                            <img src="imagenes/<?php echo $entrada->imagen; ?>" alt="<?php echo $entrada->title; ?>" loading="lazy">
                        </picture>
                    </div>
                    <div class="texto-entrada">
                        <a href="entrada?id=<?php echo $entrada->id; ?>"><h4><?php echo $entrada->title; ?></h4></a>
                        
                        <p>Escrito el: <span><?php echo $entrada->fecha; ?></span> POR: <span>Admin</span></p>

                        <p><?php echo $entrada->content; ?></p>

                    </div>
                </article>
            <?php  endforeach; ?>
        </div>
</main>
