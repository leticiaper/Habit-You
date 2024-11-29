<?php
    
    session_start();
    
    $login = $_POST['login'];
    $senha = $_POST['senha'];


    $local="localhost";
    $usuario_BD="root";
    $senha_BD="root";
    $base="habit_you_db";

    $conecta = new mysqli($local, $usuario_BD, $senha_BD, $base);
    
    if ($conecta->connect_error){
        die("Deu erro na conexão ". $conecta->connect_error);
    }
    
    $sql = "SELECT * FROM usuarios WHERE email='$login' AND senha='$senha'";
    
    $result = $conecta->query($sql);
    
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();

        $_SESSION['id'] = $row['id_user'];
        $_SESSION['nome'] = $row['nome_user'];
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        header('location:http://localhost/Habit_you/tela_inicial.php');

    }else{
        session_unset();
        session_destroy();
        echo "<script> 
                alert('Login ou senha incorreto');
                window.location.href = 'http://localhost/Habit_you/acesso.php';
              </script>";
    }
      
    
    $conecta->close();