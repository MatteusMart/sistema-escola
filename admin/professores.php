<?php
    // // controle de sessao
    // session_start();
    // if(!isset($_SESSION['email'])){
    //     // so permite o acesso se a seesao estiver logada
    //     header('location:../');
    // }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="assets/css/estilo-admin.css">
    <title>Admin - Sistema escola</title>
</head>
<body>
    <div class="container">
        <aside class="admin-menu">
            <div class="admin-logo">Sistema - ADMIN</div>
            <nav>
                <ul>
                    <li><a href="index.php" class="menu-ativo"><i class="fa-solid fa-chart-line"></i> Dashboard</a></li>
                    <li><a href="professores.php"><i class="fa-solid fa-chalkboard-user"></i> Professores</a></li>
                    <li><a href="alunos.php"><i class="fa-solid fa-user"></i> Alunos</a></li>
                    <li><a href="notas.php"><i class="fa-solid fa-book-open"></i> Notas</a></li>
                    <hr>
                    <li>
                        <a href="../backend/logout.php">

                            <i class="fa-solid fa-right-to-bracket"></i> logout
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="admin-corpo">
            <h2>Gestão de professores</h2>
            <div class="div-professores">
                <form action="" id="form-professores">
                    <div class="grid-professores">
                        <div>
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome">
                        </div>
                        <div>
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email">
                        </div>
                        <div>
                            <label for="telefone">telefone</label>
                            <input type="text" id="telefone" name="telefone">
                        </div>
                        <div>
                            <label for="cpf">CPF</label>
                            <input type="text" id="cpf" name="cpf">
                        </div>
                        <div>
                            <label for="data_nascimento">Data Nascimento</label>
                            <input type="date" id="data_nascimento" name="data_nascimento">
                        </div>
                        <div>
                            <label for="tipo">Tipo</label>
                            <select name="tipo" id="tipo">
                                <option value="" disabled selected>Selecione...</option>
                            </select>
                        </div>
                        <div>
                            <label for="cep">CEP</label>
                            <div>
                                <input class="input-cep" type="text" id="cep" name="cep">
                                <button class="btn-cep" onclick="consultaCEP()" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </div>
                        <div>
                            <label for="rua">Rua</label>
                            <input type="text" id="rua" name="rua">
                        </div>
                        <div>
                            <label for="numero">Numero</label>
                            <input type="text" id="numero" name="numero">
                        </div>
                        <div>
                            <label for="bairro">Bairro</label>
                            <input type="text" id="bairro" name="bairro">
                        </div>
                        <div>
                            <label for="cidade">Cidade</label>
                            <input type="text" id="cidade" name="cidade">
                        </div>
                        <div>
                            <label for="estado">Estado</label>
                            <!-- <input type="text" id="estado" name="estado"> -->
                            <select name="estado" id="estado">
                                
                                <!-- <input type="text" id="estado" name="estado"> -->
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                                <option value="EX">Estrangeiro</option>
                                </select>
                        </div>
                        <div>
                            <label for="complemento">complemento</label>
                            <input type="text" id="complemento" name="complemento">
                        </div>
                    
                    </div>

                    <div class="btn-cadastrar">
                        <Button onclick="addUsuarios()" type="button">Cadastrar</Button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <script src="assets/js/jquery.inputmask.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="assets/js/script-admin.js"></script>
</body>
</html>