<main class="contenedor contacto-contenedor">

    <?php
        if($mensaje) {
            echo "<p class='alerta exito' data-cy='alerta-exito' >" . $mensaje . "</p>";
        }
    ?>

        <h1 data-cy="contacto-titulo" >Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img src="build/img/destacada3.jpg" alt="Imagen de la propiedad" loading="lazy">
        </picture>
        
        <h2 data-cy="titulo-formulario" >Llene el formulario de contacto</h2>
        <form data-cy="formulario" action="/contacto" method="POST" class="formulario-moderno shadow" enctype="multipart/form-data">
            <fieldset>
                <legend>Información personal</legend>

                <label for="nombre">Nombre</label>
                <input data-cy="nombre" type="text" id="nombre" placeholder="Nombre/s y Apellido/s" name="contacto[nombre]" required>


                <label for="mensaje">Mensaje</label>
                <textarea data-cy="mensaje" id="mensaje" cols="30" rows="10" placeholder="Tu mensaje" name="contacto[mensaje]" required></textarea>
            </fieldset>
            <fieldset>
                <legend>Informacion sobre la propiedad</legend>

                <label for="opciones">Vende o Compra</label>
                <select data-cy="input-opciones" id="opciones" name="contacto[tipo]" required>
                    <option value="" disabled selected>-- Seleccione--</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input data-cy="presupuesto" type="number" id="presupuesto" placeholder="Precio o Presupuesto" name="contacto[precio]" required>
            </fieldset>
            <fieldset>
                <legend>Contacto</legend>
                <p>¿Como desea ser contactado?</p>
                <div class="formadecontacto">
                    <label for="telefono-contacto">Telefono</label>
                    <input data-cy="forma-contacto" type="radio" value="telefono" id="telefono-contacto" name="contacto[contacto]" required>
                    <label for="email-contacto">E-mail</label>
                    <input data-cy="forma-contacto" type="radio" value="email" id="email-contacto" name="contacto[contacto]" required>
                </div>

                <div id="contacto"></div>

                
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">

        </form>

    </main>