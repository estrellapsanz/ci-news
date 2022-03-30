<!-- Add these lines somewhere on top of your PHP file: -->
<?php ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); ?>

<section>
    <div class="further">
        <h1><?= $title ?></h1>

        <ul>
			<?php if (!empty($news) && is_array($news)) {
				foreach ($news as $new) { ?>
                    <li>
                        <h3><?= esc($new['titulo']) ?></h3>
                        <img src="images/<?= $new['imagen'] ?>" alt="<?= $new['titulo'] ?>"
                             width="400" height="300">

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