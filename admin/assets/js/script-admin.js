// script executados ao carregar a pagina
$( document ).ready(function() {
    $('#cpf').inputmask('999.999.999-99')
    $('#telefone').inputmask('(99)99999-9999')
    $('#cep').inputmask('99999-999')
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