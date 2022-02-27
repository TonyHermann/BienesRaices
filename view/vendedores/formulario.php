<fieldset>
    <legend>Informacion General</legend>
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="vendedor[nombre]" placeholder="" value="<?php echo s($vendedor->nombre) ?>">
    <label for="apellido">Apellido</label>
    <input type="text" id="apellido" name="vendedor[apellido]" placeholder="" value="<?php echo s($vendedor->apellido) ?>">
    <label for="telefono">Número de teléfono</label>
    <input type="number" id="telefono" name="vendedor[telefono]" placeholder="Número de teléfono" value="<?php echo s($vendedor->telefono) ?>">
</fieldset>
