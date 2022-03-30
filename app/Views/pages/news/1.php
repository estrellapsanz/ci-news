
<section>
    <div class="further">
    <h1><?=$title?></h1>

<ul>

       <li>
           <h3><?=$new['titulo']?></h3>
           <img src="../images/<?=$new['imagen']?>" alt="<?=$new['titulo']?>"  width="400" height="300">

       </li>
        <p><?=$new['resumen']?>
            <br>
            By <?=$new['autor'].' ,'. $new['fecha_publicacion']?>
        </p>

</ul>
    </div>
</section>