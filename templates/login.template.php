<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <?php

    /**
     * Método responsável pela a escolha de framework que vai ser usado neste template.
     * Primeiro vai ser incluido o css da framework entre outros arquivos necessário no head
     * @param STRING $nomeFrame = nome da framework
     * Opções disponíveis: 
     * Materialize v0.100.2 http://archives.materializecss.com/0.100.2/about.html
     * Bootstrap v4.1.2 https://getbootstrap.com/docs/4.1/getting-started/introduction/
     */
    $this->core = Core::getInstance();
    $frame = $this->core->loadFrameworkCss('materialize');
    ?>
    <link rel="stylesheet" href="<?php echo BASE ?>assets/css/login/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
    $this->render($view, $data);
    ?>
    <?php

    /**
     * Esse método é responsável por incluir o JS da framework escolhida (sempre ser o mesmo do de cima escolhido).
     * @param STRING $nomeFrame = nome da framework
     * Opções disponíveis: 
     * Materialize v0.100.2 http://archives.materializecss.com/0.100.2/about.html
     * Bootstrap v4.1.2 https://getbootstrap.com/docs/4.1/getting-started/introduction/
     */
    $this->core = Core::getInstance();
    $frame = $this->core->loadFrameworkJs('materialize');
    ?>
</body>
</html>