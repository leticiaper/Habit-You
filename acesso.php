<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HABIT YOU</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style_acesso.css">

    </head>
    <body>
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
         
    <div class="center-text">
        <h1>Iniciar Sessão</h1>
    </div>

    <div class="login-container">
        <form action="php/login.php" method="post">
          <div class="input-group">
            <input type="text" id="username" name="login" placeholder="Email" required><br>
          </div>
          <div class="input-group">
            <label for="password"></label>
            <input type="password" id="password" name="senha" placeholder="Digite sua senha" required >
          </div>
            <div class="tela_inicial">
            <a href="tela_inicial.html">
                <button type="submit">Entrar</button>
            </a>
          <a href="senha.html" class="forgot-password">Esqueceu a senha?</a>
        </form>
      </div>
        
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>