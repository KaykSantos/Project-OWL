<?php
    include('../php/config.php');
    if($_POST){
        if(isset($_POST['submit'])){
            CadastroPost($_POST['titulo'], $_POST['content'], $_FILES['image']);
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header id="header">
        <div id="logotipo">
            <p>OWL</p>
        </div>
        <div id="options">
            <?php 
                if(!isset($_SESSION['log-fin'])){
                    echo '
                        <a href="/login/">Login</a>
                        <a href="/cadastro/">Cadastro</a>
                    ';
                }
                if(isset($_SESSION['log-fin'])){
                    echo '
                        <a href="../">Home</a>
                        <a href="/inscricoes">Inscrições</a>
                    ';
                }
            ?>
        </div>
    </header>
    <?php
        if(isset($_SESSION['adm'])){
            echo '
                    <div id="navbar">
                        <a href="/new-post">New Post</a>
                        <a href="/new-activity">New Activity</a>
                    </div>
                ';
        }
    ?>
    <main>
        <!-- <form action="" method="post">
            <button name="sair">SAAAAAAAAAS</button>
        </form> -->
        <form method="post" enctype="multipart/form-data">
            <div>
                <p>Cadastrar novo Post</p>
            </div>
            <div>
                <input type="text" id="titulo" name="titulo" class="input" placeholder="Título do post:">
            </div>
            <div>
                <textarea name="content" id="content" class="input" cols="30" rows="5" placeholder="Conteúdo da postagem: "></textarea>
            </div>
            <div id="div-image">
                <label for="image">Imagem:</label>
                <input type="file" id="image" name="image">
            </div>
            <div>
                <button name="submit">Cadastrar</button>
            </div>
        </form>
    </main>
    <footer>
            <h2>
            © 2023 The OWL Company, all rights reserved.
            </h2>

            <div class="icon-contact">
                <a href="https://www.instagram.com/organizacao_web_linguistica/"><img src="../images/instagram.png" id="ins-img"></a> 
                <a href="mailto:organizacaoweblinguistica@gmail.com"><img src="../images/gmail.png" id="gmail-img"></a> 
            </div>
    </footer>
</body>
</html>