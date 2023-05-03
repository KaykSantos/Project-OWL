<?php
    include('../php/config.php');
    if($_POST){
        if(isset($_POST['submit'])){
            if(empty($_POST['rm']) || empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['curso'])){
                echo 'Atenção! Preencha todos os campos necessários!';
            }else{
                CadastroUser($_POST['rm'], $_POST['name'], $_POST['email'], $_POST['password'], $_POST['curso']);
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        fieldset{
            width: 400px;
        }
        input{
            width: 350px;
            padding: 2px;
        }
        select{
            width: 350px;
            padding: 2px;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>Cadastro</legend>
            <input type="number" id="rm" name="rm" placeholder="Digite seu RM: "> <br><br>
            <input type="text" id="name" name="name" placeholder="Digite seu nome: "> <br><br>
            <input type="email" id="email" name="email" placeholder="Digite seu email: "> <br><br>
            <input type="password" id="password" name="password" placeholder="Digite sua senha:"> <br><br>
            <select name="curso" id="curso"> <br><br>
                <option value="10">Escolha seu curso: </option>
                <option value="1">1º ano - Médio de Desenvolvimento de Sistemas</option>
                <option value="2">2º ano - Médio de Desenvolvimento de Sistemas</option>
                <option value="3">3º ano - Médio de Desenvolvimento de Sistemas</option>
                <option value="4">1º ano - Programação de Jogos Digitais</option>
                <option value="5">2º ano - Programação de Jogos Digitais</option>
                <option value="6">3º ano - Programação de Jogos Digitais</option>
                <option value="7">1º ano - Administração</option>
                <option value="8">2º ano - Administração</option>
                <option value="9">3º ano - Administração</option>
            </select>
            <br><br>
            <button name="submit">Cadastrar</button>  
            <p>Já possui conta?<a href="../login"> Faça login!</a></p>
        </fieldset>

        <?php
            if(isset($_SESSION['cad-effect'])):
        ?>   
        <div id="error-cad">
            <p>Cadastro realizado com sucesso! Agora realize seu login.</p>
        </div>
        <?php
            endif;
            unset($_SESSION['cad-effect']);
        ?>

        <?php
            if(isset($_SESSION['email-error'])):
        ?>   
        <div id="error-email">
                <p>Email já cadastrado, tente utilizar outro ou faça login!</p>
        </div>
        <?php
            endif;
            unset($_SESSION['email-error']);
        ?>

        <?php
            if(isset($_SESSION['cad-error'])):
        ?>   
        <div id="error-cad">
            <p>Erro ao realizar cadasatro, tente novamente!</p>
        </div>
        <?php
            endif;
            unset($_SESSION['cad-error']);
        ?>
    </form>
</body>
</html>