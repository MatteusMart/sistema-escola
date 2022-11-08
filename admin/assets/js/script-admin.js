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

// funçap que exibe a aba cadastro e oculta a aba listagem
const abaCadastro = () =>{

       // esconde o form professor
       $('#form-professores').show()

       // exibe a div de listagem
       $('#div-listagem').hide()
}

// funçao que exibe a aba listagem e oculta a aba cadastro
const abaListagem =()=>{
    // esconde o form professor
    $('#form-professores').hide()

    // exibe a div de listagem
    $('#div-listagem').show()
}

const pesquisarUsuario = () =>{
    // validaçao de campo pesquisar vazio
    let pesquisar = $('#pesquisar').val()

    if(pesquisar == ''){
        Swal.fire({
            icon: 'error',
            title: 'Atenção!',
            text: 'Digite um nome ou cpf para pesquisar!',
          });
        return
    }
    dados = new FormData($('#form-listagem')[0])

    result = fetch('../backend/pesquisarUsuario.php',{
        method: 'POST',
        body : dados
    })
    .then((response)=>response.json())
    .then((result)=>{
        $('#resultado-listagem').html(`
        <div id="tabela-listagem">
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Cpf</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="dados-tabela-listagem">
               
            </tbody>
        </table>
    </div>`)

        if(result.length == 0 ){
            $('#dados-tabela-listagem').append(`
            <tr>
                <td colspan = "5">Nenhum dado foi encontrado!</td>
            </tr>
            `)
        }else{
            result.map((usuario)=>{
            $('#dados-tabela-listagem').append(`
                <tr>
                    <td>${usuario.nome}</td>
                    <td>${usuario.email}</td>
                    <td>${usuario.telefone}</td>
                    <td>${usuario.cpf}</td>
                    <td>
                        <button class ="btn-visualizar">Visualizar</button>
                    </td>
                </tr>
            `)
            })
        }
    })
}