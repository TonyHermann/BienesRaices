<main class="contenedor">
        <h1 data-cy='propiedad-titulo' ><?php echo $propiedad->titulo  ?></h1>
        <picture>
        <source srcset="imagenes/<?php echo $propiedad->imagen  ?>" type="image/webp">
        <source srcset="imagenes/<?php echo $propiedad->imagen  ?>" type="image/jpeg">
        <img loading="lazy" src="imagenes/<?php echo $propiedad->imagen  ?>" alt="Anuncio">
        </picture>
        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $propiedad->precio  ?></p>
            <ul class="iconos__caracteristicas">
                <li>
                    <img loading="lazy" src="build/img//icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad->wc  ?></p>
                </li>
                <li>
                    <img loading="lazy" src="build/img//icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad->estacionamiento  ?></p>
                </li>
                <li>
                    <img loading="lazy" src="build/img//icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad->habitaciones  ?></p>
                </li>
            </ul>

            <p><?php echo $propiedad->descripcion  ?></p>

        </div>
</main>