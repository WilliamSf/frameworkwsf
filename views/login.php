<script src="<?php echo RAIZ ?>assets/js/ajax/login.ajax.js"></script>
<div class="row no-margin">
    <div class="col s12 m5 content-left-login">
        <div class="row no-margin">
            <div class="col s12">
                <!-- <img src="<?php echo RAIZ ?>assets/images/logo/coffee-cup.svg" class="logo-login"> -->
                <div class="logo-login">
                    <svg 
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        width="11.148cm" height="6.138cm">
                        <defs>
                        <radialGradient id="PSgrad_0">
                        <stop offset="0%" stop-color="rgb(53,122,215)" stop-opacity="1" />
                        <stop offset="100%" stop-color="rgb(4,67,153)" stop-opacity="1" />
                        </radialGradient>
                        <linearGradient id="PSgrad_1" x1="70.711%" x2="0%" y1="0%" y2="70.711%">
                        <stop offset="0%" stop-color="rgb(53,122,215)" stop-opacity="1" />
                        <stop offset="100%" stop-color="rgb(4,67,153)" stop-opacity="1" />
                        </linearGradient>

                        </defs>
                        <path fill-rule="evenodd"  fill="rgb(255, 0, 0)"
                        d="M280.487,0.000 C300.100,0.000 316.000,16.573 316.000,37.017 C316.000,57.461 300.100,74.034 280.487,74.034 C260.874,74.034 244.974,57.461 244.974,37.017 C244.974,16.573 260.874,0.000 280.487,0.000 Z"/>
                        <path fill="url(#PSgrad_0)"
                        d="M280.487,0.000 C300.100,0.000 316.000,16.573 316.000,37.017 C316.000,57.461 300.100,74.034 280.487,74.034 C260.874,74.034 244.974,57.461 244.974,37.017 C244.974,16.573 260.874,0.000 280.487,0.000 Z"/>
                        <path fill-rule="evenodd"  fill="rgb(255, 0, 0)"
                        d="M256.796,144.744 C256.796,160.902 243.709,174.000 227.565,174.000 C215.912,174.000 205.854,167.174 201.159,157.300 L160.696,90.641 L121.079,158.170 C116.217,167.571 106.417,174.000 95.111,174.000 C83.483,174.000 73.443,167.205 68.734,157.366 L68.689,157.393 L6.006,52.925 C2.241,48.004 -0.000,41.856 -0.000,35.181 C-0.000,19.037 13.087,5.949 29.231,5.949 C40.690,5.949 50.603,12.546 55.395,22.147 L95.381,89.208 L135.169,21.387 C140.097,12.199 149.789,5.949 160.944,5.949 C172.524,5.949 182.530,12.683 187.262,22.449 L187.704,22.209 L253.842,131.166 L253.540,131.330 C255.616,135.350 256.796,139.908 256.796,144.744 Z"/>
                        <path fill="url(#PSgrad_1)"
                        d="M256.796,144.744 C256.796,160.902 243.709,174.000 227.565,174.000 C215.912,174.000 205.854,167.174 201.159,157.300 L160.696,90.641 L121.079,158.170 C116.217,167.571 106.417,174.000 95.111,174.000 C83.483,174.000 73.443,167.205 68.734,157.366 L68.689,157.393 L6.006,52.925 C2.241,48.004 -0.000,41.856 -0.000,35.181 C-0.000,19.037 13.087,5.949 29.231,5.949 C40.690,5.949 50.603,12.546 55.395,22.147 L95.381,89.208 L135.169,21.387 C140.097,12.199 149.789,5.949 160.944,5.949 C172.524,5.949 182.530,12.683 187.262,22.449 L187.704,22.209 L253.842,131.166 L253.540,131.330 C255.616,135.350 256.796,139.908 256.796,144.744 Z"/>
                    </svg>
                </div>
                
                <h2 class="logo-title-login">William Silva</h2>
            </div>
        </div>
        <div class="row no-margin content-form-bv-login">
            <form class="col s12" id="login-user" method="POST">
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
                        <a class="btn-padrao right" onclick="logar();">Entrar</a>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
    <div class="col s12 m7" style="position:relative;padding: 0;">
        <!-- <div class="shadow-overlay"></div>
        <div class="msg-bv-login white-text">
            <h1>Bem-vindo</h1>
            <p class="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam obcaecati hic voluptatem nostrum natus asperiores distinctio adipisci accusamus iure?</p>
            <a href="<?php echo BASE ?>cadastro" class="btn" style="margin-top:40px;">Cadastra-se</a>
        </div> -->
        <div class="text">
            <svg class="svg-mask">
                <defs>
                    <mask id="mask" x="0" y="0" width="100%" height="100%" >
                        <rect class="alpha" x="0" y="0" width="100%" height="100%"/>
                        <text class="title" x="50%" y="0" dy="60%">BEM-VINDO</text>
                    </mask>
                </defs>
                <!-- Elemento onde aplicaremos a máscara -->
                <rect class="base" x="0" y="0" width="100%" height="100%"/>
            </svg>
        </div>
        <section class="background"></section>
    </div>
</div>

