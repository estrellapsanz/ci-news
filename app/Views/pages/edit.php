<section>
    <div class="further">
        <h1><?= $title ?></h1>

        <form action='<?= base_url('/admin/edit/save') ?>' method="post" enctype="multipart/form-data">
		    <?php if (isset($new) && !empty($new['id'])) { ?>
                <input type="hidden" name="id" value="<?= $new['id'] ?>"
		    <?php } ?>
            <div>
                <label for="titulo">Título</label>
                <input type="text" name="titulo" placeholder="Título" for="titulo"
				    <?php if (isset($new) && !empty($new['titulo'])) { ?>
                        value="<?= $new['titulo'] ?>"
				    <?php } ?> required>
            </div>
            <div>
                <label for="categoria">Categoría</label>
                <select name="categoria" for="categoria" required>
				    <?php if (isset($categorias) && !empty($categorias[0])) {
					    foreach ($categorias as $desc_categoria) { ?>
                            <option value="<?= $desc_categoria['Id'] ?>" <?php if ($new['id_categoria'] == $desc_categoria['Id']) echo 'selected'; ?>><?= $desc_categoria['Nombre'] ?></option>
						    <?php
					    }
				    } ?>
                </select>
            </div>
            <div>
                <label for="resumen">Resumen</label>
                <textarea name="resumen" cols="100" rows="5" placeholder="Resumen"
                          required><?php if (isset($new) && !empty($new['resumen'])) { ?><?= trim($new['resumen']) ?><?php } ?></textarea>

            </div>
            <div>
                <label for="imagen">Imagen actual</label><br>
			    <?php if (isset($new) && !empty($new['imagen'])) { ?>
                    <img src="<?= base_url() . '/images/' . $new['imagen'] ?>" alt="<?= $new['titulo'] ?>" width="200"
                         height="150" required>

			    <?php } ?>

            </div>
            <div>
                <label>Seleccione una imagen nueva si desea modificar la actual</label>
                <br>
                <input type="file" name="imagen" placeholder="Imagen" for="imagen">
            </div>
            <div>
                <label for="autor">Autor</label>
                <input type="text" name="autor" placeholder="Autor" for="autor"
				    <?php if (isset($new) && !empty($new['autor'])) { ?>
                        value="<?= $new['autor'] ?>"
				    <?php } ?> required>
            </div>
            <div>
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" placeholder="Fecha" for="fecha"
				    <?php if (isset($new) && !empty($new['fecha_publicacion'])) { ?>
                        value="<?= $new['fecha_publicacion'] ?>"
				    <?php } ?> required>
            </div>
            <div>
                <br>
                <button type="cancel" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>
    </div>
</section>