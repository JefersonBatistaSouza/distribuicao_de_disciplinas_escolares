<?php
require_once '../../../connect/conexao.php';
require_once '../../dml/dml.php';
require_once '../../../class/tae.php';

$name = filter_input(0, 'name', FILTER_DEFAULT);
$email = filter_input(0,'email', FILTER_VALIDATE_EMAIL);

$link = new Conexao();
$dml = new DML($link->getConnection());

$tae = new Tae($name, $email,NULL, "NAO", "COMUM");
$dml->insert($tae->getQueryInsertTae());

