<div class="contenedor__anuncios <?php echo $inicio ? 'inicio':  '' ?>" id="contenedor__anuncios">


        <?php  foreach ($propiedades as $propiedad) : ?>
        <div class="anuncio shadow" data-cy='anuncio'>
            <picture>
                <source srcset="imagenes/<?php echo $propiedad->imagen ?>" type="image/webp">
                <source srcset="imagenes/<?php echo $propiedad->imagen ?>" type="image/jpeg">
                <img loading="lazy" src="imagenes/<?php echo $propiedad->imagen ?>" alt="Anuncio">
            </picture>
            <div class="contenido__anuncio">
                <h3><?php echo $propiedad->titulo; ?></h3>
                <p class="descripcion"><?php echo $propiedad->descripcion; ?></p>

                <div class="parte_inferior">
                    <p class="precio">$<?php echo $propiedad->precio; ?></p>
                    <ul class="iconos__caracteristicas">
                        <li>
                            <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                            <p><?php echo $propiedad->wc; ?></p>
                        </li>
                        <li>
                            <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p><?php echo $propiedad->estacionamiento; ?></p>
                        </li>
                        <li>
                            <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                            <p><?php echo $propiedad->habitaciones; ?></p>
                        </li>
                    </ul>

                    <a href="/anuncio?id=<?php echo $propiedad->id ?> " data-cy='boton-ver-propiedad' class="boton-amarillo-block">Ver
                        propiedad</a>
                </div>
            </div>
        </div>

        <?php endforeach;?>


    </div>

    <div class="alinear-derecha">
        <a href="/anuncios" class="boton-verde" data-cy='ver-mas-boton'>Ver más</a>
    </div>