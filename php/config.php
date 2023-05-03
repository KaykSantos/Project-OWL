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
    $query = 'SELECT * FROM adm WHERE email_adm = "'.$email.'" AND senha = "'.$hash.'"'; //Mudar a váriavel password para hash após criar a function de cadastro com md5
    $res = $GLOBALS['conn']->query($query);
    $row = mysqli_num_rows($res);
    if($row == 1){
        header('Location: ../');
        $_SESSION['adm'] = true;
    }else{
        $query = 'SELECT * FROM aluno WHERE email_aluno = "'.$email.'" AND senha = "'.$hash.'"'; //Mudar a váriavel password para hash após criar a function de cadastro com md5
        $res = $GLOBALS['conn']->query($query);
        $row = mysqli_num_rows($res);
        if($row == 1){
            header('Location: ../');
            $_SESSION['aluno'] = true;
            $_SESSION['log-fin'] = true;
            $_SESSION['log-effect'] = true;
            $_SESSION['log-error'] = false;
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