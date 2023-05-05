<?php
include('../php/config.php');

$alunoID = $_GET['excluir'];
$selecaoID = $_GET['selecao'];

// echo 'Aluno: '.$alunoID.' - Seleção: '.$selecaoID;

$query = 'DELETE FROM selecao_aluno WHERE id_aluno = '.$alunoID;  
$res = $GLOBALS['conn']->query($query);

header('Location: ../list-selecao/?selecao='.$selecaoID);