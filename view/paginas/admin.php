<main class="contenedor">
    <h1>Administrador de Bienes Raices</h1>
    <?php 


        if($resultado) {
            $mensaje = mostrarNotificacion(intval($resultado));
        if($mensaje) { ?>
            <p class="alerta exito"><?php echo s($mensaje) ?></p>
        <?php }
        }

    ?>



    <h2>Propiedades</h2>

    <a href="/propiedades/crear" class="boton boton-verde">Crear propiedad</a>

    <div class="tabla-moderna shadow">
        <table class="tablita">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Vendedor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Mostrar resultados !-->
                <?php foreach ($propiedades as $propiedad): ?>
                <tr>
                    <td><?php echo $propiedad->id ?></td>
                    <td><?php echo $propiedad->titulo ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-tabla"
                            alt="imagen de la<?php echo $propiedad->titulo ?>"></td>
                    <td>$<?php echo $propiedad->precio ?></td>
                    <td><?php echo $propiedad->vendedorid ?></td>
                    <td>
                        <form method="POST" action="propiedades/eliminar">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" value="Eliminar" class="boton-rojo-block">
                        </form>
                        <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>"
                            class="boton-verde-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>






    <h2>Vendedores</h2>

    <a href="/vendedores/crear" class="boton boton-amarillo">Registrar vendedor</a>

    <div class="tabla-moderna shadow">
        <table class="tablita">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Mostrar resultados !-->
                <?php foreach ($vendedores as $vendedor): ?>
                <tr>
                    <td><?php echo $vendedor->id ?></td>
                    <td><?php echo $vendedor->nombre . " " . $vendedor->apellido ?></td>
                    <td><?php echo $vendedor->telefono ?></td>
                    <td>
                        <form method="POST" action="vendedores/eliminar">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" value="Eliminar" class="boton-rojo-block">
                        </form>
                        <a href="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>"class="boton-verde-block">Actualizar </a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>

    <h2>Entradas</h2>

    <a href="/blog/crear" class="boton boton-verde">Crear entrada</a>
    
    <div class="tabla-moderna shadow">
        <table class="tablita">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Contenido</th>
                </tr>
            </thead>
            <tbody>
                <!-- Mostrar resultados !-->
                <?php foreach ($entradas as $entrada): ?>
                <tr>
                    <td><?php echo $entrada->id ?></td>
                    <td><?php echo $entrada->title ?></td>
                    <td><img src="/imagenes/<?php echo $entrada->imagen ?>" class="imagen-tabla"
                            alt="imagen de la<?php echo $entrada->title ?>"></td>
                    <td><?php echo $entrada->content ?></td>
                    <td>
                        <form method="POST" action="blog/eliminar">
                            <input type="hidden" name="id" value="<?php echo $entrada->id; ?>">
                            <input type="hidden" name="tipo" value="entrada">
                            <input type="submit" value="Eliminar" class="boton-rojo-block">
                        </form>
                        <a href="/blog/actualizar?id=<?php echo $entrada->id; ?>"
                            class="boton-verde-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>


</main>