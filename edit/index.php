<?php
    include('../php/config.php');
    if($_POST){
        if(isset($_POST['submit-edit-post'])){
            EditarPubli("post", $_POST['cd-post'], $_POST['titulo-post'], $_POST['conteudo-post']);
        }else if(isset($_POST['submit-edit-selecao'])){
            EditarPubli("selecao", $_POST['cd-selecao'], $_POST['titulo-selecao'], $_POST['conteudo-selecao']);
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
        <form method="post" enctype="multipart/form-data">
            <?php
                if($_GET){
                    if(isset($_GET['post'])){
                        $postID = $_GET['post'];
                        $query = 'SELECT * FROM vwpostagem WHERE cd = '.$postID;
                        $res = $GLOBALS['conn']->query($query);
                        foreach($res as $row){
                            echo '
                                <div>
                                    <p>Editar post:</p>
                                </div>
                                <div>
                                    <input type="text" id="titulo-oost" name="titulo-post" class="input" placeholder="Título do post:" value="'.$row['titulo'].'">
                                    <input type="number" value="'.$row['cd'].'" name="cd-post" hidden>                                 </div>
                                <div>
                                    <textarea name="conteudo-post" id="conteudo-post" class="input" cols="30" rows="5" placeholder="Conteúdo da postagem: ">'.$row['conteudo'].'</textarea>
                                </div>
                                <div>
                                    <button name="submit-edit-post">Editar</button>
                                </div>
                            ';
                        }
                    }else if(isset($_GET['selecao'])){
                        $selecaoID = $_GET['selecao'];
                        $query = 'SELECT * FROM vwselecao WHERE cd = '.$selecaoID;
                        $res = $GLOBALS['conn']->query($query);
                        foreach($res as $row){
                            echo '
                                <div>
                                    <p>Editar seleção:</p>
                                </div>
                                <div>
                                    <input type="text" id="titulo-post" name="titulo-selecao" class="input" placeholder="Título da seleção:" value="'.$row['titulo'].'">
                                    <input type="number" value="'.$row['cd'].'" name="cd-selecao" hidden> 
                                </div>
                                <div>
                                    <textarea name="content" id="conteudo-selecao" class="input" cols="30" rows="5" placeholder="Conteúdo da seleção: ">'.$row['conteudo'].'</textarea>
                                </div>
                                <div>
                                    <button name="submit-edit-selecao">Editar</button>
                                </div>
                            ';
                        }
                    }
                }
            ?>
            
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