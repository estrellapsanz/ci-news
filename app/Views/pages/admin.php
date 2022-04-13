<section>
    <div class="further">
        <h1><?= $title ?></h1>

        <ul>
            <form action="<?= base_url('admin/new') ?>">
                <button type="submit"> + Nueva noticia</button>
            </form>
			<?php foreach ($news as $new) { ?>
                <li>
                    <h3><?= $new['titulo'] ?> </h3>
                    <form action="<?= base_url('admin/edit/' . $new['id']) ?>">
                        <button>Editar noticia</button>
                    </form>

					<?php if (!empty($new['imagen'])) { ?>
                        <img src="<?= base_url() ?>/images/<?= $new['imagen'] ?>" alt="<?= $new['titulo'] ?>"
                             width="500"
                             height="300">
					<?php } else { ?>
                        <img src="<?= base_url() ?>/images/default.jpg" alt="<?= $new['titulo'] ?>" width="500"
                             height="300">
					<?php } ?>
                </li>
                <p><?= $new['resumen'] ?>
                    <br>
                    By <?= $new['autor'] . ' ,' . $new['fecha_publicacion'] ?>
                </p>
			<?php } ?>
        </ul>
    </div>
</section>