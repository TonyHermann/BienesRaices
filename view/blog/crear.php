<main class="contenedor">

    <h1>Crear entrada</h1>

    <?php foreach($errores as $error): ?>

    <div class="alerta error">
        <?php echo $error; ?>
    </div>

    <?php endforeach ?>

    <div class="contenedor-formulario">

        <form action="/blog/crear" method="POST" class="formulario-moderno shadow" enctype="multipart/form-data">

            <?php include __DIR__ . '/formulario.php'; ?>

            <input type="submit" value="Crear entrada" class="boton boton-verde">
        </form>

    </div>
    <a href="/admin" class="boton boton-verde">Volver al panel de administrador</a>


</main>