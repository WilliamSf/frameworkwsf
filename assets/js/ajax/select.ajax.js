function selectCidade(obj)
{
    var dados = obj.value;

    //console.log(dados);
    $.post("selectNoticia", dados, function (data) {

        //console.log(data);
        var obj = JSON.parse(data);

        if (obj.resp == 1)
        {
            $('#cidade').html(obj.options);
        }
        
        $('select').material_select();
    });


}