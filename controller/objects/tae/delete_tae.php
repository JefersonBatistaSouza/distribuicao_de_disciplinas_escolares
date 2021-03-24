<?php
require_once '../../../connect/conexao.php';
require_once '../../dml/dml.php';
require_once '../../../class/tae.php';

$idTae = filter_input(0, 'idtae', FILTER_DEFAULT);

$link = new Conexao();
$dml = new DML($link->getConnection());
$dml->delete(Tae::getDeleteTae($idTae));

