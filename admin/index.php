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
            <h2>Dashboard</h2>
            
        </main>
    </div>

    <script src="assets/js/script-admin.js"></script>
</body>
</html>