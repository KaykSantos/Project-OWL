<?php
    include('php/config.php');

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
            ?>
        </div>
    </header>
    <?php
        if(isset($_SESSION['adm'])){
            echo '
                    <div id="navbar">
                        <a href="../">Home</a>
                        <a href="/new-post">New post</a>
                    </div>
                ';
        }
    ?>
    <main>
        <!-- <form action="" method="post">
            <button name="sair">SAAAAAAAAAS</button>
        </form> -->
        <?php
            $query = 'SELECT * FROM vwPostagem';;
            $res = $GLOBALS['conn']->query($query);
            if($res){
                foreach($res as $row){
                    $dt_post = date('d/m/Y',  strtotime($row['dt_post']));
                    echo '
                    <div class="container-post">
                        <div class="img-post">
                            <img src="posts/images/'.$row['imagem'].'" alt="'.$row['imagem'].'" width="370px" " height="250px" "    >
                        </div>
                        <div class="content-post">
                            <h1>'.$row['titulo'].'</h1>
                            
                            <p style="overflow: hidden; text-overflow: ellipsis;">
                                '.$row['conteudo'].'
                            </p>
                            <div class="footer-post">
                                <h4><a href="'.$row['cd'].'" class="more-post">Ver mais...</a></h4>
                                <h4>By '.$row['nm_adm'].' - Em: '.$dt_post.'</h4>
                            </div>
                            
                        </div>
                    </div>
                    ';
                }
            }
        ?>
        <!-- <div class="container-post">
            <div class="img-post">
                <img src="/images/logo.jpg" alt="imagem teste" width="370px"    >
            </div>
            <div class="content-post">
                <h1>AOBA CORNOS</h1>
                <p>
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
                    totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae 
                    dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, 
                    sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam 
                    est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius 
                    modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                </p>
            </div>
        </div> -->
    </main>
    <footer>
            <h2>
            © 2023 The OWL Company, all rights reserved.
            </h2>

            <div class="icon-contact">
                <a href="https://www.instagram.com/organizacao_web_linguistica/"><img src="images/instagram.png" width="40px"></a> 
                <a href="mailto:organizacaoweblinguistica@gmail.com"><img src="images/gmail.png" width="60px"></a> 
            </div>
    </footer>
</body>
</html>