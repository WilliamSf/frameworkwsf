<div class="container">
    
<div class="row">
    <div class="col s12">
        <h1>Notícias</h1>
        <p class="">Todas noticias cadastradas!</p>
    </div>
</div>

<div class="collection">
    <?php foreach ($data['news'] as $new) : ?>
    <a class="collection-item" href="./noticias/<?php echo $new['id'] ?>"><?php echo $new['titulo']; ?></a>
    <?php endforeach ?>
</div>

<a href="<?php echo BASE ?>noticias/add" class="btn">Nova notícia</a>
<a href="<?php echo BASE ?>noticias/pesquisa" class="btn">Pesquisar notícia</a>

</div>


