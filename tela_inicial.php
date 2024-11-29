<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HABIT YOU</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="css/tela_inicial.css">

        <?php
            session_start();



            if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
            {
                session_unset();
                echo "<script>
                        alert('Esta página só pode ser acessada por usuário logado');
                        window.location.href = 'acesso.php';
                    </script>";

            }
            $logado = $_SESSION['login'];

            $nome = $_SESSION['nome'];

            function obterIniciais($nome) {
                $partesNome = explode(" ", $nome);
                $iniciais = "";

                foreach ($partesNome as $parte) {
                    if (!empty($parte)) {
                        $iniciais .= strtoupper($parte[0]);
                    }
                }

                return $iniciais;
            }

            $iniciaisUsuario = obterIniciais($nome);

        ?>
        
    </head>
    <body>
        <header class="container-fluid nav-container">
            <nav class="navbar">
                <ul class="navbar-nav ml-auto">
                    <div class="nav-item" >
                        <a class="home" href="index.php">
                            <h3>|Habit You</h3>
                        </a>
                    </div> 
                </ul>
            </nav>
        </header>
    <div class="container2">
        <div class="card">
            <h3> CRIAR METAS</h3>
            <p>Inicie traçando suas metas</p>
            <div class="menu-container">
                <button class="menu-btn-metas">Iniciar</button>
                <div class="divisao-metas">
                    <a href="metas_semanais.php">Metas semanais</a>
                    <a href="metas_mensais.php">Metas mensais</a>
                    <a href="metas_anuais.php">Metas anuais</a>
                </div>
            </div>
        </div>

        <div class="card">
            <h3> Minhas METAS</h3>
            <p>Registre aqui os seus feitos</p>
            <a href="minhas_metas.php">  
                <button>Consultar</button>
            </a>
        </div>

        <div class="card">
            <h3> RELATÓRIOS</h3>
            <p>Confira aqui o seu progresso</p>
            <div class="menu-container">
                <button class="menu-btn relatorios-btn" id="relatorios-btn">Conferir</button>
                <div class="divisao-relatorios">
                    <a href="relatorio_semanal.php">Semanais</a>
                    <a href="relatorio_mensal.php">Mensais</a>
                    <a href="relatorio_anual.php">Anuais</a>
                </div>
            </div>
        </div>
    </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="js/tela_inicial.js"></script>
        <script src="js/relatorios.js"></script>
    </body>
</html>