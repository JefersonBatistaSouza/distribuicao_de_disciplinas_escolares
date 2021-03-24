<?php

require_once '../../../connect/conexao.php';
require_once '../../dml/dml.php';
require_once '../../../class/tae.php';

$idTae = filter_input(0, 'idtae', FILTER_DEFAULT);
$name = filter_input(0, 'name', FILTER_DEFAULT);
$email = filter_input(0,'email', FILTER_VALIDATE_EMAIL);
$access = filter_input(0,'access',FILTER_DEFAULT);
$typeAccess = filter_input(0,'typeAccess',FILTER_DEFAULT);


$link = new Conexao();
$dml = new DML($link->getConnection());

$tae = new Tae($name, $email,null, $access,$typeAccess);
$dml->update($tae->getQueryUpdateTae($idTae));



