<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HABIT YOU</title>
        <link rel="stylesheet" href="senha.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-sm "> 
            <div class="container-fluid">
                <ul class="navbar-nav ml-auto">
                    <div class="nav-item">
                    <a href="index.html">
                        <img src="#" alt="Logo" class="logo">
                      </a>
                    </div> 
                    </li> 
                
                </ul> 
            </div>
        </nav>
        
    <div>
        <h2>Esqueci a senha</h2>

        <form action="/recuperar_senha" method="post">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email"><br>
            <input type="submit" value="Recuperar senha">
        </form>
    </div>  
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>