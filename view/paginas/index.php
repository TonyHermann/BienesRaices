<main class="contenedor">
    <h2>Más sobre nosotros</h2>
    <div class="cards contenedor" data-cy="iconos-nosotros" >
        <div class="card">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
            </div>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam qui porro, temporibus ratione sequi
                itaque tempore eaque beatae tempora molestias ipsa debitis mollitia commodi quasi eius sapiente
                reiciendis sit neque.
            </p>
        </div>
        <div class="card">
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
            </div>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam qui porro, temporibus ratione sequi
                itaque tempore eaque beatae tempora molestias ipsa debitis mollitia commodi quasi eius sapiente
                reiciendis sit neque.
            </p>
        </div>
        <div class="card">
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
            </div>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam qui porro, temporibus ratione sequi
                itaque tempore eaque beatae tempora molestias ipsa debitis mollitia commodi quasi eius sapiente
                reiciendis sit neque.
            </p>
        </div>
    </div>
</main>

<section class="contenedor">
    <h2>Casas y Departamentos en venta</h2>
    
    <?php include 'listado.php'; ?>

</section>

<section class="seccion contacto" data-cy="seccion-contacto" >
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el contacto de formulario y un asesor se pondrá en contacto contigo a la brevedad.</p>
    <a href="/contacto" class="boton-amarillo">Contáctanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog" data-cy="blog">
        <h3>Nuestro Blog</h3>
    <?php include 'listado_entradas.php' ?>
    </section>
    <aside class="testimoniales" data-cy="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos harum perferendis quasi. Quis
                voluptate voluptatem, id a illum debitis reprehenderit sed dicta ipsa mollitia praesentium voluptas
                assumenda fugit aliquid architecto?
            </blockquote>
            <p>- Tony</p>
        </div>
    </aside>
</div>
