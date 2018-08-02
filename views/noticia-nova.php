<script src="<?php echo RAIZ ?>assets/js/ajax/noticia.ajax.js"></script>
<script src="<?php echo RAIZ ?>assets/js/ajax/select.ajax.js"></script>

<div class="container">
    <div class="row">
        <div class="col s12">
            <h3>Publicação de novas notícias</h3>
            <p class=""></p>
            <a class="btn blue-grey" href="<?php echo BASE ?>noticias" >Home</a>
        </div>
    </div>

    <form id="add-noticia" method="post" style="margin-top:50px;">
        <div class="row">
            <div class="col s12">
                <h5>Todos campos são obrigatorios</h5>
            </div>
        </div>

        <div class="row no-margin">
            <div class="input-field col s12">
                <input type="text" id="titulo" name="titulo">
                <label for="titulo">Titulo</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 l4">
                <input type="text" id="categoria" name="categoria">
                <label for="categoria">Categoria</label>
            </div>
            <div class="input-field col s12 l4">
                <input id="data_noticia" name="data_noticia" type="text" class="datepicker-here">
                <label for="data_noticia">Data da notícia</label>
            </div>
            <div class="input-field col s12 l4">
                <select name="id_autor" id="id_autor">
                    <option value="" disabled selected>selecione...</option>
                    <?php foreach ($data['autores'] as $autor) : ?>
                        <option  value="<?php echo $autor['id_autor'] ?>"><?php echo $autor['nome_autor']; ?></option>
                    <?php endforeach ?>
                </select>
                <label>Autor</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <select name="estados" id="estados" onchange="selectCidade(this)">
                    <option value="" disabled selected>selecione...</option>
                    <?php foreach($data['estados'] as $estado): ?>
                        <option value="<?php echo $estado['Uf'] ?>"><?php echo $estado['Nome'] ?></option>
                    <?php endforeach; ?>
                </select>
                <label>Estado</label>
            </div>
            <div class="input-field col s12 m6">
                <select name="cidade" id="cidade">
                    <option value="" disabled selected>selecione o estado primeiro</option>
                </select>
                <label>Cidade</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea id="corpo" name="corpo" class="materialize-textarea"></textarea>
                <label for="corpo">Corpo da notícia</label>
            </div>
            
        </div>
        <div class="row" style="margin-bottom:50px;">
            <div class="col s12">
                <a class="btn" onclick="addNoticia();">Salvar</a>
            </div>
        </div>
    </form>
</div>
