function logar() {

    var dados = $('#login-user').serialize();

    //console.log(dados);

    $.post("login/logarUser", dados, function (data) {

        console.log(data);
        var obj = JSON.parse(data);

        if (obj.resp == 0) {

            swal({
                title: "Erro",
                text: obj.erro,
                icon: "error",
                closeOnClickOutside: false,
                button: "OK"

            });

        }
        else
        {
            location.assign("admin/home");
        }

    });

}

function CadastroUser() {

    var dados = $('#login-cadastro').serialize();

    //console.log(dados);

    $.post("cadastro/cadastroUser", dados, function (data) {

        //console.log(data);
        var obj = JSON.parse(data);

        if (obj.resp == 1) {

            swal({
                title: "Cadastro",
                text: obj.sucess,
                icon: "success",
                closeOnClickOutside: false,
                button: "OK"
            }).then(function () {
                location.assign("login");
            });

        }
        else {
            swal({
                title: "Erro",
                text: obj.erro,
                icon: "error",
                closeOnClickOutside: false,
                button: "OK"

            });
        }

    });

}