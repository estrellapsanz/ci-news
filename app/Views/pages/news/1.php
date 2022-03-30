
<!-- Add these lines somewhere on top of your PHP file: -->
<?php  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); ?>

<section>
    <div class="further">
    <h1><?=$title?></h1>

<ul>
	<?php foreach ($news as $new) { ?>
       <li>
           <h3><?=$new['Titulo']?></h3>
           <img src="images/<?=$new['Imagen']?>" alt="<?=$new['Titulo']?>"  width="400" height="300">

       </li>
        <p><?=$new['resumen']?>
            <br>
            By <?=$new['Autor'].' ,'. $new['Fecha_publicacion']?>
        </p>
	<?php } ?>
</ul>
    </div>
</section>