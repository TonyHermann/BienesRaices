<main class="contenedor">
        <h1 data-cy="anuncios-titulo" >Casas y Departamentos en venta</h1>
        <div class="contenedor__anuncios">
            <?php foreach ($propiedades as $propiedad) : ?> 
                    
                    <div class="anuncio">
                        <picture>
                            <source srcset="imagenes/<?php echo $propiedad->imagen ?>" type="image/webp">
                            <source srcset="imagenes/<?php echo $propiedad->imagen ?>" type="image/jpeg">
                            <img loading="lazy" src="imagenes/<?php echo $propiedad->imagen ?>" alt="Anuncio">
                        </picture>
                        <div class="contenido__anuncio">
                            <h3><?php echo $propiedad->titulo; ?></h3>
                            <p class="descripcion"><?php echo $propiedad->descripcion; ?></p>
                            
                            <div class="parte_inferior">
                                <p class="precio"><?php echo $propiedad->precio; ?></p>
                                <ul class="iconos__caracteristicas">
                                    <li>
                                        <img loading="lazy" src="build/img//icono_wc.svg" alt="icono wc">
                                        <p><?php echo $propiedad->wc; ?></p>
                                    </li>
                                    <li>
                                        <img loading="lazy" src="build/img//icono_estacionamiento.svg" alt="icono estacionamiento">
                                        <p><?php echo $propiedad->estacionamiento; ?></p>
                                    </li>
                                    <li>
                                        <img loading="lazy" src="build/img//icono_dormitorio.svg" alt="icono habitaciones">
                                        <p><?php echo $propiedad->habitaciones; ?></p>
                                    </li>
                                </ul>

                                <a href="/anuncio?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Ver propiedad</a>
                            </div>
                        </div>
                    </div>
            <?php  endforeach; ?>
        </div>
</main>