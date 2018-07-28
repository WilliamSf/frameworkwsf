function addNoticia() {

    var dados = $('#add-noticia').serialize();

    //console.log(dados);

    $.post("addNoticia", dados, function (data) {

        //console.log(data);
        var obj = JSON.parse(data);

        if (obj.resp == 1)
        {

            swal({
                title: "Notícia",
                text: obj.sucess,
                icon: "success",
                closeOnClickOutside: false,
                button: "OK"
            }).then(function () {
                window.location.reload();
            });
 
        }
        else
        {
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

function pesquisaNoticia()
{
    var dados = $('#pesquisa-noticia').serialize();

    //console.log(dados);

    $.post("pesquisaNoticia", dados, function (data) {

        //console.log(data);
        var obj = JSON.parse(data);

        if (obj.resp == 1) 
        {
            $('#corpinho-tabela').html(obj.corpinhoTabela);
        }
        else 
        {
            swal({
                title: "Falha na pesquisa",
                text: obj.erro,
                icon: "warning",
                closeOnClickOutside: false,
                button: "OK"

            });
        }

    });
}