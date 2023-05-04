<?php
session_start();
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'OWLProject');

$conn = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar ao banco');

//CRUD de usuário -> Aluno
function LoginUser($email, $password){
    $hash = md5($password);
    $query = 'SELECT * FROM adm WHERE email_adm = "'.$email.'" AND senha = "'.$hash.'"'; 
    $res = $GLOBALS['conn']->query($query);
    $row = mysqli_num_rows($res);
    if($row == 1){
        $_SESSION['adm'] = true;
        $user = mysqli_fetch_assoc($res);
        $_SESSION['userID'] = $user['cd'];
        $_SESSION['log-fin'] = true;
        header('Location: ../');
    }else{
        $query = 'SELECT * FROM aluno WHERE email_aluno = "'.$email.'" AND senha = "'.$hash.'"';
        $res = $GLOBALS['conn']->query($query);
        $row = mysqli_num_rows($res);
        if($row == 1){
            $_SESSION['aluno'] = true;
            $user = mysqli_fetch_assoc($res);
            $_SESSION['userID'] = $user['cd'];
            $_SESSION['log-fin'] = true;
            $_SESSION['log-effect'] = true;
            $_SESSION['log-error'] = false;
            header('Location: ../');
        }else{
            echo 'Email e/ou senha inválidos! Verifique e tente novamente.';
            $_SESSION['log-effect'] = false;
            $_SESSION['log-error'] = true;
        }
    }
}
function CadastroUser($rm, $name, $email, $password, $curso){
    $hash = md5($password);
    $query = 'SELECT * FROM aluno WHERE email_aluno = "'.$email.'"';
    $res = $GLOBALS['conn']->query($query);
    $rows = mysqli_num_rows($res);
    if($rows > 0){
        // echo 'Email já cadastrado! Tente utilizar outro ou faça login!';
        $_SESSION['email-error'] = true;
    }else{
        $query = 'SELECT * FROM adm WHERE email_adm = "'.$email.'"';
        $res = $GLOBALS['conn']->query($query);
        $rows = mysqli_num_rows($res);
        if($rows > 0){
            // echo 'Email já cadastrado! Tente utilizar outro ou faça login!';
            $_SESSION['email-error'] = true;
        }else{
            $query = 'INSERT INTO aluno VALUES ('.$rm.',"'.$name.'","'.$email.'","'.$hash.'",'.$curso.')';
            $res = $GLOBALS['conn']->query($query);
            if($res){
                // echo "Cadastro realizado com sucesso! Agora realize seu login! :)";
                $_SESSION['cad-effect'] = true;
            }else{
                // echo "Erro ao realizar cadasatro, tente novamente!".$GLOBALS['conn']->error;
                $_SESSION['cad-error'] = true;
            }
        }
    }
}

function CadastroPost($titulo, $conteudo, $imagem){
    $dir = '../posts/images';

    if(move_uploaded_file($imagem['tmp_name'], $dir.'/'.$imagem['name'])){

        $query = 'INSERT INTO post VALUES (null, "'.$titulo.'", "'.$conteudo.'", "'.$imagem['name'].'", CURDATE(), '.$_SESSION['userID'].')';
        $res = $GLOBALS['conn']->query($query);
        if($res){
            echo 'Post realizado com sucesso!';
        }else{  
            echo 'Erro ao cadastrar post!'.$GLOBALS['conn']->error;
        }
    }else{
        echo 'Erro ao upar imagem! '.$GLOBALS['conn']->error;
    }
}

function CadastroSelecao($titulo, $conteudo, $imagem){
    $dir = '../inscricoes/images';

    if(move_uploaded_file($imagem['tmp_name'], $dir.'/'.$imagem['name'])){

        $query = 'INSERT INTO selecao VALUES (null, "'.$titulo.'", "'.$conteudo.'", "'.$imagem['name'].'", CURDATE(), '.$_SESSION['userID'].')';
        $res = $GLOBALS['conn']->query($query);
        if($res){
            echo 'Postagem de seleção realizado com sucesso!';
        }else{  
            echo 'Erro ao cadastrar seleção!'.$GLOBALS['conn']->error;
        }
    }else{
        echo 'Erro ao upar imagem! '.$GLOBALS['conn']->error;
    }
}
