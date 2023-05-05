<?php
include('../../php/config.php');

$alunoID = $_GET['aluno'];
$selecaoID = $_GET['selecao'];

// echo 'Aluno: '.$alunoID.' - Seleção: '.$selecaoID;

$query = 'INSERT INTO selecao_aluno VALUES (null, '.$selecaoID.', '.$alunoID.')';   
$res = $GLOBALS['conn']->query($query);
header('Location: ../selecao/?selecao='.$selecaoID);


