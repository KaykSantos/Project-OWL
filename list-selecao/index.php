<?php
    include('../php/config.php');

    // if($_POST){
    //     if(isset($_POST['sair'])){
    //         session_destroy();
    //         header('Location: ../');
    //     }        
    // }
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
                        <a href="../inscricoes/index.php">Inscrições</a>
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
        <div class="post-interclasse">
            <h3>Lista de inscritos:</h3>
            <ul>
            <?php
                if($_GET){
                    if(isset($_GET['selecao'])){
                        $selecaoID = $_GET['selecao'];
                        $query = 'SELECT * FROM vwselecaoaluno WHERE id_selecao = '.$selecaoID.' ORDER BY id_aluno ASC';
                        $res = $GLOBALS['conn']->query($query);
                        if($res){
                            foreach($res as $row){
                                echo '
                                    <li>RM: '.$row['id_aluno'].' - Nome: '.$row['nm_aluno'].' - <a href="../php/excluir.php?excluir='.$row['id_aluno'].'&selecao='.$row['id_selecao'].'">Excluir registro</a></li>
                                ';
                            }
                        }
                    }
                }
                
            ?></ul>
        </div>
    </main>
    <footer>
            <h2>
            © 2023 The OWL Company, all rights reserved.
            </h2>

            <div class="icon-contact">
                <a href="https://www.instagram.com/organizacao_web_linguistica/"><img src="../images/instagram.png" id="ins-img" width="40px"></a> 
                <a href="mailto:organizacaoweblinguistica@gmail.com"><img src="../images/gmail.png" id="gmail-img" width="60px"></a> 
            </div>
    </footer>
</body>
</html>