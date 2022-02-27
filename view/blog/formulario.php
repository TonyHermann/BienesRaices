<fieldset>
    <legend>Informacion General</legend>
    <label for="title">Titulo</label>
    <input type="text" id="title" name="entrada[title]" placeholder="" value="<?php echo s($entrada->title) ?>">
    <label for="imagen">Imagen</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="entrada[imagen]">

    <?php if($entrada->imagen) : ?>
        <picture>
            <img src="/imagenes/<?php echo $entrada->imagen; ?>" alt="Foto de <?php echo s($entrada->title) ?>" class="imagen-small">
        </picture>
    <?php endif; ?>

    <label for="content">Contenido</label>
    <textarea id="content" name="entrada[content]" cols="30" rows="10"><?php echo s($entrada->content) ?></textarea>

</fieldset>
