<section>
    <div class="further">
        <h1><?= $title ?></h1>
        <ul>
            <?php if (isset($news) && !empty($news[0])) {
                foreach ($news as $new) { ?>
                    <li>
                        <h3><?= esc($new['titulo']) ?></h3>
                        <img src="<?= base_url() ?>/images/<?= $new['imagen'] ?>" alt="<?= $new['titulo'] ?>" width="400" height="300">

                    </li>
                    <p><?= esc($new['resumen']) ?>
                    <p><a href="news/<?= esc($new['id'], 'url') ?>">Ver más</a></p>
                    <br>
                    By <?= $new['autor'] . ' ,' . $new['fecha_publicacion'] ?>
                    </p>
                <?php }
            } else { ?>
                <h3>No News</h3>
                <p>Unable to find any news for you.</p>
            <?php } ?>
        </ul>
    </div>
</section>