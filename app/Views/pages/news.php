
<section>
    <div class="further">
    <h1><?=$title?></h1>

<ul>
	<?php foreach ($news as $new) { ?>
       <li>
           <h3><?=$new['titulo']?></h3>
           <img src="images/guerra-ucrania.jpg" alt="guerra en ucrania"  width="400" height="300">

       </li>
        <p><?=$new['resumen']?>
            <br>
            By <?=$new['autor'].' ,'. $new['fecha']?>
        </p>
	<?php } ?>
</ul>
    </div>
</section>