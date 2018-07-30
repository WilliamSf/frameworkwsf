<script src="<?php echo RAIZ ?>assets/js/ajax/noticia.ajax.js"></script>

<div class="container">
    <div class="row">
        <div class="col s12">
            <h3>Pesquisa de notícias</h3>
            <p class=""></p>
            <a class="btn blue-grey" href="<?php echo BASE ?>noticias" >Home</a>
        </div>
    </div>

    <form method="POST" id="pesquisa-noticia">
        <div class="row">
            <div class="input-field col s12">
                <input type="text" id="titulo" name="titulo">
                <label for="titulo">Titulo</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 l6">
                <input type="text" id="categoria" name="categoria">
                <label for="categoria">Categoria</label>
            </div>
            <div class="input-field col s12 l6">
                <select name="id_autor" id="id_autor">
                    <option value="" disabled selected>selecione...</option>
                    <?php foreach ($data['autores'] as $autor) : ?>
                        <option  value="<?php echo $autor['id_autor'] ?>"><?php echo $autor['nome_autor']; ?></option>
                    <?php endforeach ?>
                </select>
                <label>Autor</label>
            </div>
        </div>
        <!-- Intervalo de data -->
        <div class="row">
            <div class="col s12">
                <h4>Intervalo de data</h4>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 l6">
                <input id="data_noticia_inicio" name="data_noticia_inicio" type="text" class="datepicker-here">
                <label for="data_noticia_inicio">Data inicial</label>
            </div>
            <div class="input-field col s12 l6">
                <input id="data_noticia_fim" name="data_noticia_fim" type="text" class="datepicker-here">
                <label for="data_noticia_fim">Data final</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <a class="btn right" onclick="pesquisaNoticia();">Pesquisa</a>
            </div>
        </div>
    </form>

    <!-- Resultado -->
    <div class="row">
        <div class="col s12">
            <h4>Resultado da pesquisa</h4>
        </div>
        <div class="col s12">
            <table class="responsive-table centered">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Categoria</th>
                        <th>Autor</th>
                        <th>Data da notícia</th>
                        <th>Acessar notícia</th>
                    </tr>
                </thead>
                <tbody id="corpinho-tabela">
                    <tr>
                        <td colspan='5'>Efetue uma pesquisa...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>