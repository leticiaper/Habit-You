<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HABIT YOU</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style_cadastro.css">
    </head>
    <body>
    <header class="container-fluid nav-container">
            <nav class="navbar">
                <ul class="navbar-nav ml-auto">
                    <div class="nav-item" >
                        <a class = "home" href="index.php">
                            <h3 >|Habit You</h3>
                        </a>
                    </div> 

            </nav>
        </header>
            
    <div class="signup-container">
        <h2>Criar Nova Conta</h2>
        <form id="form1">
          <div class="input-group">
            <input type="text" id="nome" name="nome" placeholder="Nome" required>
          </div>
          <div class="input-group">
            <input type="text" id="sobrenome" name="sobrenome" placeholder="Sobrenome" required>
          </div>
          <div class="input-group">
            <input type="email" id="email" name="email" placeholder="Endereço de email" required>
          </div>
            <div class="input-group">
                <input type="tel" id="tel" name="tel" placeholder="Telefone" required>
            </div>
                <div class="input-group">
                    <input type="password" id="senha" name="senha" placeholder="Criar senha" required>
                </div>
                <div class="tela_inicial">
                    <input type="submit" form="form1" value="Criar conta">
                </a>
            </div>
        </form>
      </div>
      
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="js/jquery-3.7.1.min.js"></script>
        <script>
            $(document).on('submit', '#form1', function(e){
                e.preventDefault();

                var nome = $('#nome').val();
                var sobrenome = $('#sobrenome').val();
                var email = $('#email').val();
                var tel = $('#tel').val();
                var senha = $('#senha').val();
                var confirmar = $('#confimar_senha').val();


                $.ajax({
                    url: 'php/funcoes.php',
                    method: 'POST',
                    data: {form: 'form1', nome: nome, sobrenome: sobrenome, email: email, senha: senha, telefone: tel},
                    dataType: 'json',
                    success: function(result){
                       alert(result);
                       window.location.href="acesso.php";
                    },
                    error: function(xhr, status, error){
                        console.error(xhr.responseText);
                        console.error(status);
                        console.error(error);
                    }
                });

            });
        </script>
    </body>
</html>