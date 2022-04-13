<section>
    <div class="further">
        <h1><?= $title ?></h1>

		<?php /*= session()->getFlashdata('error') */ ?>
		<?php /*= service('validation')->listErrors()*/ ?>


        <form action='<?= base_url('/admin/new/save') ?>' method="POST" enctype="multipart/form-data">

            <div>
                <label for="titulo">Título</label>
                <input type="text" name="titulo" placeholder="Título" for="titulo">
            </div>
            <div>
                <label for="categoria">Categoría</label>
                <input type="number" name="categoria" placeholder="Categoria" for="categoria">
            </div>
            <div>
                <label for="resumen">Resumen</label>
                <textarea name="resumen" cols="100" rows="5" placeholder="Resumen"></textarea>

            </div>
            <div>
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" placeholder="Imagen" for="imagen">
            </div>
            <div>
                <label for="autor">Autor</label>
                <input type="text" name="autor" placeholder="Autor" for="autor">
            </div>
            <div>
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" placeholder="Fecha" for="fecha">
            </div>
            <div>
                <br>
                <button type="cancel" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>
    </div>
</section>