<?php
    include('../php/config.php');

    if($_POST){
        if(isset($_POST['sair'])){
            session_destroy();
            header('Location: ../');
        }        
    }

    
    // echo "<h1>".$_SESSION['userID']."</h1>";
        
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
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
                        <a href="../">Home</a>
                        <a href="/new-post">New post</a>
                        <a href="/new-activity">New Activity</a>
                    </div>
                ';
        }
    ?>
    <main>
        <!-- <form action="" method="post">
            <button name="sair">SAAAAAAAAAS</button>
        </form> -->
        <?php
            if($_GET){
                $cdPost = $_GET['post'];
                $query = 'SELECT * FROM vwPostagem WHERE cd = '.$cdPost.' ORDER BY cd DESC';
                $res = $GLOBALS['conn']->query($query);
                if($res){
                    foreach($res as $row){
                        $dt_post = date('d/m/Y',  strtotime($row['dt_post']));
                        echo '
                        <div class="container-post">
                            <div class="img-post">
                                <img src="images/'.$row['imagem'].'" alt="'.$row['imagem'].'" width="370px"    >  
                                <h4>By '.$row['nm_adm'].' - Em: '.$dt_post.'</h4>                
                            </div>
                            <div class="content-post">
                                <p class="titulo-post">'.$row['titulo'].'</p>
                                
                                <p>
                                    '.$row['conteudo'].'
                                </p>
                            </div>
                        </div>
                        ';
                    }
                }
            }
            
        ?>
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