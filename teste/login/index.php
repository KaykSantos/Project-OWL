<?php
    include('../php/config.php');
    if($_POST){
        if(isset($_POST['submit'])){
            if(empty($_POST['email']) || empty($_POST['password'])){
                // echo 'Atenção! Preencha todos os campos necessários!';
                $_SESSION['campo-vazio'] = true;
            }else{
                LoginUser($_POST['email'], $_POST['password']);
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
    <title>Login</title>
</head>
<body>
    <main>
        <div class="left-main">
            <img src="../images/logo2.png" class="img-logo" alt="Logo do Grupo">
        </div>

        <div class="right-main">
            <div class="container">

               <header>
                   <div class="title-container">
                       <h1>Login</h1>
                       <h6>Faça login com sua conta</h6>
                   </div>
               </header> 


                <form method="POST">
                    <div class="inputs-container">
                        <div>
                            <img src="../images/email.png"><input type="email" id="name" name="email" placeholder="E-mail">
                        </div>
                        <div>
                            <img src="../images/key.png"><input type="password" id="password" name="password" placeholder="Senha"><img src="../images/eye.png" id="btn-eye">
                        </div>
                    </div>
                    <div class="btn-container">
                        <button name="submit">Login</button>
                    </div>
                </form>
                <div class="register-container">
                    <p>Não tem uma conta?</p>
                    <a href="../cadastro">Registre aqui</a>
                </div>
                <?php
                    if(isset($_SESSION['campo-vazio'])):
                ?>   
                <div id="campo-empty">
                    <p>Atenção! Preencha todos os campos necessários!</p>
                </div>
                <?php
                    endif;
                    unset($_SESSION['campo-vazio']);
                ?>
            </div>
            
        </div>
    </main>
    <script>
        let btn = document.getElementById('btn-eye');
        btn.addEventListener('click', function(){
            let input = document.getElementById('password');

            if(input.getAttribute('type') == 'password') {
                input.setAttribute('type', 'text');
            }else {
                input.setAttribute('type', 'password');
            }

        });
    </script>
</body>
</html>