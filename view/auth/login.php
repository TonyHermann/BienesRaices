<main class="contenedor">
        <h1 data-cy="heading-login" >Iniciar sesión</h1>

        <?php foreach($errores as $error) : ?>
            <div data-cy="alerta-error-login" class="alerta error"><?php echo $error; ?></div>
        <?php endforeach; ?>

        <div class="contenedor-formulario">
            <form data-cy="formulario-login" class="formulario-moderno contenido-centrado shadow fieldsetoff" method="POST">
                <fieldset>
                    <legend>Mail y Password</legend>

                    <label for="email">Email</label>
                    <input data-cy="email-login" type="email" name="email" id="email" placeholder="Email" >

                    <label for="password">Contraseña</label>
                    <input data-cy="password-login" type="password" name="password" id="password" placeholder="Contraseña">

                </fieldset>
                <input type="submit" value="Iniciar sesión" class="boton boton-verde-block">
            </form>
        </div>

</main>
