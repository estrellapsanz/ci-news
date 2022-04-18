
<section>
    <div class="further">
        <h1><?= $title ?></h1>


        <form action='<?= base_url('/admin/new/save') ?>' method="post" enctype="multipart/form-data">

            <div>
                <label for="titulo">Título</label>
                <input type="text" name="titulo" placeholder="Título" for="titulo" required>
            </div>
            <div>
                <label for="categoria">Categoría</label>
                <select name="categoria" for="categoria" required>
				    <?php if (isset($categorias) && !empty($categorias[0])) {
					    foreach ($categorias as $desc_categoria) { ?>
                            <option value="<?= $desc_categoria['Id'] ?>"><?= $desc_categoria['Nombre'] ?></option>
						    <?php
					    }
				    } ?>
                </select>
            </div>
            <div>
                <label for="resumen">Resumen</label>
                <textarea name="resumen" cols="100" rows="5" placeholder="Resumen" required></textarea>

            </div>
            <div>
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" placeholder="Imagen" for="imagen" required>
            </div>
            <div>
                <label for="autor">Autor</label>
                <input type="text" name="autor" placeholder="Autor" for="autor" required>
            </div>
            <div>
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" placeholder="Fecha" for="fecha" required>
            </div>
            <div>
                <br>
                <button type="cancel" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>
    </div>
</section>