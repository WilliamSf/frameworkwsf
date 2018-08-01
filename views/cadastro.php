<script src="<?php echo RAIZ ?>assets/js/ajax/login.ajax.js"></script>

<div class="row no-margin">
    <div class="col s12 m4 background-cadastro">
        <div class="shadow-overlay"></div>
        <div class="msg-bv-login white-text">
            <h1>Cadastro</h1>
            <p class="">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
            <a href="<?php echo BASE ?>login" class="btn" style="margin-top:40px;">Já possui conta</a>
        </div>
    </div>
    <div class="col s12 m7 content-left-login">
        <div class="row no-margin">
            <div class="col s12">
                <h2 class="">Requesitos mínimos de seguraça para a senha</h2>
                <ul class="">
                    <li class="">Conter mais de 8 caracteres</li>
                    <li class="">Conter letra maiúscula</li>
                    <li class="">Conter letra minúscula</li>
                    <li class="">Conter pelo menos um número</li>
                </ul>
            </div>
        </div>
        <div class="row no-margin content-form-bv-login">
            <form class="col s12" id="login-cadastro" method="POST">
                <div class="row no-margin">
                    <div class="input-field col s12">
                        <input type="text" id="username" name="username">
                        <label for="username">Login</label>
                    </div>
                </div>
                <div class="row no-margin">
                    <div class="input-field col s12">
                        <input type="password" id="pass" name="pass">
                        <label for="pass">Senha</label>
                    </div>
                </div>
                <div class="row no-margin">
                    <div class="col s12">
                        <a class="btn right" onclick="CadastroUser();">Cadastra-se</a>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
</div>