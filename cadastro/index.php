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
    <link rel="stylesheet" href="style.css">
    <title>Cadastro</title>
</head>
<body>
    <main>
        <div id="container-register">
            <div id="btn-voltar">
                <a href="../" id="style-btn">Voltar</a>
            </div>
            <div id="titles-container">
                <h1>Cadastro</h1>
                <h6>Faça seu cadastro</h6>
            </div>
            
            <form method="post">
                <div id="inputs-container">
                    <input type="number" name="rm" class="input" placeholder="RM">
                    <input type="text" name="name" class="input" placeholder="Nome">
                    <input type="email" name="email" class="input" placeholder="E-mail">
                    <div class="bg-eye"><input type="password" id="password1" class="input" placeholder="Senha" name="password"><img src="../images/eye.png" class="img-eye" id="btn-eye1"></div>
                    <div class="bg-eye"><input type="password" id="password2" class="input" placeholder="Confirmar a senha"    ><img src="../images/eye.png" class="img-eye" id="btn-eye2"></div>
                    <div id="select-container">
                        <select name="curso" id="curso" name="curso">
                        <option value="10">Escolha seu curso: </option>
                        <option value="1">1° ano - Médio de Desenvolvimento de Sistemas </option>
                        <option value="2">2° ano - Médio de Desenvolvimento de Sistemas </option>
                        <option value="3">3° ano - Médio de Desenvolvimento de Sistemas </option>
                        <option value="4">1° ano - Programação de Jogos Digitais </option>
                        <option value="5">2° ano - Programação de Jogos Digitais </option>
                        <option value="6">3° ano - Programação de Jogos Digitais </option>
                        <option value="7">1° ano - Administração </option>
                        <option value="8">2° ano - Administração </option>
                        <option value="9">3° ano - Administração </option>
                        </select>
                    </div>
                    <div id="btn-container">
                        <button name="submit">Enviar</button>
                    </div>
                </div>
            </form>
            <div id="login-container">
                <p>Já possui conta?</p>
                <a href="../login">Faça Login!</a>
            </div>
            <?php
                if(isset($_SESSION['cad-effect'])):
            ?>   
            <div id="sucesso-cad" class="font-size-msg">
                <p>Cadastro realizado com sucesso! Agora realize seu login.</p>
            </div>
            <?php
                endif;
                unset($_SESSION['cad-effect']);
            ?>

            <?php
                if(isset($_SESSION['email-error'])):
            ?>   
            <div id="error-email" class="font-size-msg">
                    <p>Email já cadastrado, tente utilizar outro ou faça login!</p>
            </div>
            <?php
                endif;
                unset($_SESSION['email-error']);
            ?>

            <?php
                if(isset($_SESSION['cad-error'])):
            ?>   
            <div id="error-cad" class="font-size-msg">
                <p>Erro ao realizar cadastro, tente novamente!</p>
            </div>
            <?php
                endif;
                unset($_SESSION['cad-error']);
            ?>
        </div>
    </main>
    <script>

        let btn1 = document.getElementById('btn-eye1');
        btn1.addEventListener('click', function(){
            let input = document.getElementById('password1');

            if(input.getAttribute('type') == 'password') {
                input.setAttribute('type', 'text');
            }else {
                input.setAttribute('type', 'password');
            }
        });

        let btn2 = document.getElementById('btn-eye2');
        btn2.addEventListener('click', function(){
            let input = document.getElementById('password2');

            if(input.getAttribute('type') == 'password') {
                input.setAttribute('type', 'text');
            }else {
                input.setAttribute('type', 'password');
            }
        });
    </script>
</body>
</html>