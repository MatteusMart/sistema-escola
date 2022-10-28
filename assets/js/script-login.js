const validaLogin = () =>{
    // cria var email
    // let email = $('#email').val()
    // let senha = $('#senha').val()

    let dados = new FormData($('#form-login')[0])

    // exibe mensagem no console do navegador
    // usado para debug da aplicacao
    // verificacao de erros
    // console.log(`Email:`+ email)
    // console.log(`Senha:`+ senha)

    // request PHP
    const result = fetch('backend/validaLogin.php',{
        method: 'POST',
        body: dados
    })
    .then((response)=>response.json())
    .then((result)=>{
        // aqui é tratado o retorno ao front
        if( result.retorno == 'erro'){
            Swal.fire({
                icon: 'error',
                title: 'Atenção...',
                text: result.mensagem
              })
        }else{
            window.location ="admin"
        }
        
    })

};