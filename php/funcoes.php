<?php

    header('Content-Type: application/json');

    include 'config.php';

    $form = $_POST['form'];
    
    switch ($form){
            case 'form1':
                cadastrarUser($conecta);
                break;
            case 'form2':
                salvar_metas_semanais($conecta);
                break;
            case 'form3':
                buscar_metas($conecta);
                break;
            case 'form4':
                salvar_metas_mensais($conecta);
                break;
            case 'form5':
                salvar_metas_anuais($conecta);
                break;
            case 'form6':
                atualizar_metas($conecta);
                break;
            case 'form7':
                editar_meta($conecta);
                break;
            case 'form8':
                excluir_meta($conecta);
                break;
            default:
                break;
            
    }
    
    function cadastrarUser($conecta){
        
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];
        
        $sql = "INSERT INTO usuarios (nome_user, sobrenome_user, email, senha, telefone) VALUES ('$nome', '$sobrenome', '$email', '$senha', '$telefone')";
        
        if ($conecta->query($sql) === true){
            echo json_encode('Usuário cadastrado com sucesso!');
        }else{
            echo json_encode('Erro ao tentar cadastrar!');
        }
    }

    function salvar_metas_semanais($conecta){
        $nome = $conecta->real_escape_string($_POST['nome']);
        $descri = $conecta->real_escape_string($_POST['descricao']);
        $id = $conecta->real_escape_string($_POST['id']);

        $sql = "INSERT INTO metas(titulo, descricao, fk_user, status_meta, categoria) VALUES ('$nome', '$descri', $id, 'progresso', 'semanal')";

        if ($conecta->query($sql) === true){
            $sql_dados = "SELECT * FROM metas WHERE fk_user = $id AND categoria = 'semanal'";

            $result = $conecta->query($sql_dados);

            if($result->num_rows > 0){
                $dados = array();

                while($row = $result->fetch_assoc()){
                    $dados[] = $row;
                }

                echo json_encode($dados);
            }else{
                echo json_encode(array('error'=>'Nenhuma meta encontrada, crie uma meta!'));
            }
        }else{
            echo json_encode(array('error'=>'Erro ao inserir a meta'));
        }
    }

    
    function salvar_metas_mensais($conecta){
        $nome = $conecta->real_escape_string($_POST['nome']);
        $descri = $conecta->real_escape_string($_POST['descricao']);
        $id = $conecta->real_escape_string($_POST['id']);

        $sql = "INSERT INTO metas(titulo, descricao, fk_user, status_meta, categoria) VALUES ('$nome', '$descri', $id, 'progresso', 'mensal')";

        if ($conecta->query($sql) === true){
            $sql_dados = "SELECT * FROM metas WHERE fk_user = $id AND categoria = 'mensal'";

            $result = $conecta->query($sql_dados);

            if($result->num_rows > 0){
                $dados = array();

                while($row = $result->fetch_assoc()){
                    $dados[] = $row;
                }

                echo json_encode($dados);
            }else{
                echo json_encode(array('error'=>'Nenhuma meta encontrada, crie uma meta!'));
            }
        }else{
            echo json_encode(array('error'=>'Erro ao inserir a meta'));
        }
    }

    
    function salvar_metas_anuais($conecta){
        $nome = $conecta->real_escape_string($_POST['nome']);
        $descri = $conecta->real_escape_string($_POST['descricao']);
        $id = $conecta->real_escape_string($_POST['id']);

        $sql = "INSERT INTO metas(titulo, descricao, fk_user, status_meta, categoria) VALUES ('$nome', '$descri', $id, 'progresso', 'anual')";

        if ($conecta->query($sql) === true){
            $sql_dados = "SELECT * FROM metas WHERE fk_user = $id AND categoria = 'anual'";

            $result = $conecta->query($sql_dados);

            if($result->num_rows > 0){
                $dados = array();

                while($row = $result->fetch_assoc()){
                    $dados[] = $row;
                }

                echo json_encode($dados);
            }else{
                echo json_encode(array('error'=>'Nenhuma meta encontrada, crie uma meta!'));
            }
        }else{
            echo json_encode(array('error'=>'Erro ao inserir a meta'));
        }
    }

    function buscar_metas($conecta){
        $id =  $conecta->real_escape_string($_POST['id']);
        
        $sql = "SELECT * FROM metas where fk_user = $id";
        
        $result = $conecta->query($sql);

        if($result->num_rows > 0){
            $dados = array();

            while($row = $result->fetch_assoc()){
                $dados[] = $row;
            }

            echo json_encode($dados);
        }else{
            echo json_encode(array('error'=>'Nenhuma meta encontrada!'));
        }
    
    }

    function atualizar_metas($conecta){
        $id = $conecta->real_escape_string($_POST['id']);

        $status = $conecta->real_escape_string($_POST['status']);

        $sql = "UPDATE metas SET status_meta = '$status' WHERE id_meta = $id";

        if($conecta->query($sql) === true){
            $result = array('success' => "meta atualizada com sucesso!");
        }else{
            $result = array('error' => "Não foi possível atualizar meta");
        }

        echo json_encode($result);
    } 

    function editar_meta($conecta){
        $id= $conecta->real_escape_string($_POST['id']);
        $titulo = $conecta->real_escape_string($_POST['titulo']);
        $descricao = $conecta->real_escape_string($_POST['descricao']);

        $sql = "UPDATE metas SET titulo = '$titulo', descricao = '$descricao' where id_meta= $id";

        if($conecta->query($sql) === true){
            $result = array('success' => "meta editada com sucesso!");
        }else{
            $result = array('error' => "Não foi possível atualizar meta");
        }

        echo json_encode($result);
    }
    function excluir_meta($conecta){
        $id = $conecta->real_escape_string($_POST['id']);

        $sql = "DELETE FROM metas WHERE id_meta = $id";

        if($conecta->query($sql) === true){
            $result = array('success' => "meta excluida com sucesso!");
        }else{
            $result = array('error' => "Não foi possível excluir meta");
        }

        echo json_encode($result);
    }

    
    ?>




