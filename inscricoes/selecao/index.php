<?php
    include('../../php/config.php');

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
                        <a href="../../">Home</a>
                        <a href="../">Inscrições</a>
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
            $selecao = $_GET['selecao'];
            $query = 'SELECT * FROM vwSelecao WHERE cd = '.$selecao;
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
                                <img src="../images/'.$row['imagem'].'" alt="'.$row['imagem'].'" width="400px">
                                <div id="btns">
                                    <button onclick="ConfirmarParticipacao()" id="btn-participar">Participar</button>
                                    <a href="part.php?aluno='.$row['cd'].'"><button name="submit-participar" id="btn-confirm">Confirmar</button></a>
                                    <button name="cancelar" id="btn-cancelar" onclick="CancelarParticipacao()">Cancelar</button>
                                </div>
                            </div>    
                        ';
                }
            }
        ?>

    </main>
    <footer>

    </footer>
    <script>
        let btn1 = document.getElementById('btn-confirm');
        let btn2 = document.getElementById('btn-participar');
        let btn3 = document.getElementById('btn-cancelar');

        function ConfirmarParticipacao(){
            btn1.style.display = "block"; 
            btn2.style.display = 'none';    
            btn3.style.display = "block"
        }
        function CancelarParticipacao(){
            btn1.style.display = "none";         
            btn3.style.display = "none"
            btn2.style.display = 'block';    
        }
    </script>
</body>
</html>