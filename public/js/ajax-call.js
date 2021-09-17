function Megusta(cep,rua,bairro,cidade,uf,ibge){
    $.ajax({
        type: 'POST',
        url: list_guardar,
        data:({cep: cep, rua: rua, bairro: bairro, cidade: cidade, uf: uf, ibge: ibge}),
        sync: true,
        dataType: 'json',
        success:function(data){
        }

    });
}