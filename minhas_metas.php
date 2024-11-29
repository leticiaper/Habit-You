<?php
    session_start();

    if((!isset($_SESSION['login']) === true) || (!isset($_SESSION['senha']) === true)){
        session_unset();
        session_destroy();
        echo `
            <script>
                window.location.href = 'index.php'
            </script>
        `;
    }


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HABIT YOU</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="css/minhas_metas.css">

    </head>
    <body onload="buscar_metas(<?php  echo $_SESSION['id']?>)">
        <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['id']?>">
        <header class="container-fluid nav-container">
            <nav class="navbar">
                <ul class="navbar-nav ml-auto">
                    <div class="nav-item" >
                        <a class = "home"href="index.php">
                            <h3>|Habit You</h3>
                        </a>
                    </div> 
                </ul>
            </nav>
        </header>
        <main class="container-fluid">
            <div class="row justify-content-center text-center row-edit">
                <h2 class="semana">Minhas metas</h2>
                <a href="tela_inicial.php">
                        <img class= "back" src="imgs/back.png" width="30px" >
                    </a>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-4 card_container" id="metas_semanais">
                    <h3>Metas Semanais</h3>   
                </div>
                    
                <div class="col-lg-4  card_container" id="metas_mensais">
                    <h3>Metas Mensais</h3>   
                </div>

                <div class="col-lg-4 card_container" id="metas_anuais">
                    <h3>Metas Anuais</h3>   
                </div>
            </div>
        </main>

        <script src="js/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="js/scriptAjax.js"></script>
    </body>
</html>

