<fieldset>
    <legend>Informacion General</legend>
    <label for="titulo">Titulo</label>
    <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo de la propiedad" value="<?php echo s($propiedad->titulo) ?>">
    <label for="precio">Precio</label>
    <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio de la propiedad (MAX 9999999999,99)" value="<?php echo s($propiedad->precio) ?>">
    <label for="imagen">Imagen</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">
    

    <?php if($propiedad->imagen) :?>
        <picture>
            <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Foto de <?php echo s($propiedad->titulo) ?>" class="imagen-small">
        </picture>
    <?php endif; ?>

    <label for="descripcion">Descripcion</label>
    <textarea id="descripcion" name="propiedad[descripcion]" cols="30" rows="10"><?php echo s($propiedad->descripcion) ?></textarea>
</fieldset>

<fieldset>
    <legend>Informacion de la propiedad</legend>
    <label for="habitaciones">Habitaciones</label>
    <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Cantidad de habitaciones" min="1" max="9" value="<?php echo s($propiedad->habitaciones) ?>" >
    <label for="wc">Baños</label>
    <input type="number" id="wc" name="propiedad[wc]" placeholder="Cantidad de baños" min="1" max="5" value="<?php echo s($propiedad->wc) ?>" >
    <label for="estacionamiento">Estacionamientos</label>
    <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Cantidad de estacionamientos" min="1" max="3" value="<?php echo s($propiedad->estacionamiento) ?>" >
</fieldset>

<fieldset>
    <legend>Vendedor</legend>
    <label for="vendedor-select">Vendedor</label>
    <select name="propiedad[vendedorid]" id="vendedor-select">


        <option value="">-- Seleccione --</option>
        <?php foreach($vendedores as $vendedor) : ?>

            <option <?php echo s($propiedad->vendedorid) === s($vendedor->id) ? 'selected' : '';  ?> value="<?php echo s($vendedor->id) ?>"><?php echo s($vendedor->nombre) . " " . s($vendedor->apellido) ?></option>

        <?php endforeach; ?>

    </select>
</fieldset>


