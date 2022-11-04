// script executados ao carregar a pagina
$( document ).ready(function() {
    $('#cpf').inputmask('999.999.999-99')
    $('#telefone').inputmask('(99)99999-9999')
    $('#cep').inputmask('99999-999')

    listaTipo();
});


const consultaCEP=()=>{
    // captura o valor do cep via JQUERY
    let cep = $('#cep').val();

    const result = fetch (` http://viacep.com.br/ws/${cep}/json/`)
    .then((response)=>response.json())
    .then((result)=>{
        // retorno da requisicao

        if(result.erro){
            Swal.fire({
                icon: 'error',
                title: 'Atenção...',
                text: 'Cep não encontrado, verifique e tente novamente'
              })
        }else{
            $('#rua').val(result.logradouro)
            $('#bairro').val(result.bairro)
            $('#cidade').val(result.localidade)
            $('#estado').val(result.uf)

            // coloca o focus do usuário no campo numero
            $('#numero').focus()
            }
        
    });
};

const addProfessor=()=>{
    
}

const listaTipo =()=>{
    // funçao que lista os tipos para o cadastro
    // dados da tabela tb_tipos
    const result = fetch (`../backend/listaTipo.php`)

    .then((response)=>response.json())
    .then((result)=>{
        // aqui sera tratado o retorno dos dados do backend
        // monsta no select tipo os dados da tebela

        result.map((tipo)=>{
            $('#tipo').append(`
                <option value="${tipo.id}">${tipo.tipo}</option>
            `)
        })
    })
}

const addUsuarios =()=>{
    
    let dados =new FormData($('#form-professores')[0])

    const result = fetch('../backend/addUsuarios.php',{
        method : 'POST',
        body: dados
    })
    .then((response)=>response.json())
    .then((result)=>{
        // aqui tratamos o retorno do backend
        if(result.erro){
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: result.mensagem,
              });
              $('#form-professores').reset()

            }else{
            Swal.fire({
                icon: 'error',
                title: 'Atenção...',
                text: result.mensagem,
              });
              result.retorno == 'ok' ? $('#form-professores')[0].reset() : ''
            }
    });
}