<?php
/*****************************CADASTRAR************************/
    /*$sql = "INSERT INTO usuario (nome, email, senha, data_nasc)
            VALUES ('{$nome}', '{$email}', '{$senha}', '{$data_nasc}')";

            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Cadastrado com Sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não poi possivel Cadastrar');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            break;*/

        switch ($_REQUEST["acao"]) {
        case 'cadastrar':
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            $data_nasc = $_POST["data_nasc"];

            $stmt = $conn->prepare("INSERT INTO usuario (nome, email, senha, data_nasc) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome, $email, $senha, $data_nasc);
        $res = $stmt->execute();
        
        if ($res) {
            echo "<script>alert('Cadastrado com Sucesso');</script>";
            echo "<script>location.href='?page=listar';</script>";
        } else {
            echo "<script>alert('Não foi possível cadastrar');</script>";
            echo "<script>location.href='?page=listar';</script>";
        }
        break;

        /*****************************EDITAR************************/
        /*
            $sql = "UPDATE usuario SET nome='{$nome}', email='{$email}',
                    senha='{$senha}', data_nasc='{$data_nasc}'
                WHERE
                    usuario_id=".$_REQUEST["usuario_id"];

            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Editado com Sucesso');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não poi possivel editar');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            break;
            */
        
            case 'editar':
                $nome = $_POST["nome"];
                $email = $_POST["email"];
                $senha = $_POST["senha"];
                $data_nasc = $_POST["data_nasc"];
                $usuario_id = $_POST["id"]; // Use $_POST em vez de $_REQUEST para obter o ID do usuário
            
                $sql = "UPDATE usuario SET nome=?, email=?, senha=?, data_nasc=? WHERE usuario_id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ssssi', $nome, $email, $senha, $data_nasc, $usuario_id);
            
                if ($stmt->execute()) {
                    echo "<script>alert('Editado com Sucesso');</script>";
                    echo "<script>location.href='?page=listar';</script>";
                } else {
                    echo "<script>alert('Não foi possível editar');</script>";
                    echo "<script>location.href='?page=listar';</script>";
                }
                break;
            

/*****************************EXCLUIR************************/

        /*
        case 'excluir':
            
            $sql = "DELETE FROM usuario WHERE usuario_id".$_REQUEST["usuario_id"];

            $res = $conn->query($sql);

            if($res==true){
                echo "<script>alert('Excluido com Sucesso');</script>";
                echo "<script>location.href='?page=listar';</script>";
            }else{
                echo "<script>alert('Não poi possivel excluir');</script>";
                echo "<script>location.href='?page=listar';</script>";
            }

        break;*/

        case 'excluir':
            $usuario_id = $_REQUEST["usuario_id"];
        
            $stmt = $conn->prepare("DELETE FROM usuario WHERE usuario_id = ?");
            $stmt->bind_param("i", $usuario_id);
            $res = $stmt->execute();
        
            if ($res) {
                echo "<script>alert('Excluído com Sucesso');</script>";
                echo "<script>location.href='?page=listar';</script>";
            } else {
                echo "<script>alert('Não foi possível excluir');</script>";
                echo "<script>location.href='?page=listar';</script>";
            }
            break;
        }
    ?>