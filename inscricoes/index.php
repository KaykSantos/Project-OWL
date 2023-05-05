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
    <title>Inscrições</title>
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
                        <a href="#">Inscrições</a>
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
        
        <?php
            $query = 'SELECT * FROM vwSelecao ORDER BY cd DESC';
            $res = $GLOBALS['conn']->query($query);
            if($res){
                foreach($res as $row){
                    $dt_post = date('d/m/Y',  strtotime($row['dt_post']));
                    echo '
                        
                        <div class="post-interclasse">
                            <h2>'.$row['titulo'].'</h2>
                            <p style="overflow: hidden; text-overflow: ellipsis;">
                            '.$row['conteudo'].'
                            </p>
                            <img src="images/'.$row['imagem'].'" alt="'.$row['imagem'].'" width="400px">
                            <br>
                            <h4><a href="selecao/?selecao='.$row['cd'].'" class="more-post">Ver mais...</a></h4>
                    ';
                    if(isset($_SESSION['adm'])){
                        echo '
                                    <h4><a href="../list-selecao/?selecao='.$row['cd'].'" class="more-post">Ver inscritos</a></h4>
                                    <h4><a href="../edit/?selecao='.$row['cd'].'" class="more-post">Editar seleção</a></h4>
                                </div>
                            ';
                    }else{
                        echo '</div>';
                    }
                }
            }
        ?>

        <!-- <div class="post-interclasse">
            <h2>Título</h2>
            <p>Explicação - Descrição do campeonatoExplicação - Descrição do campeonatoExplicação - Descrição do campeonatoExplicação - Descrição do campeonatoExplicação - Descrição do campeonatoExplicação - Descrição do campeonatoExplicação - Descrição do campeonatoExplicação - Descrição do campeonato</p>
            <img src="../images/logo.jpg" alt="Imagem do esporte" width="200px">
            <button name="submit-participar">Participar</button>
        </div> -->
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