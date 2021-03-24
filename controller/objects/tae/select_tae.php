<?php
require_once __DIR__ . '../../../../connect/conexao.php';

$pesquisa = filter_input(0, 'pesquisa', FILTER_DEFAULT);
$key = filter_input(0, 'key', FILTER_DEFAULT);
switch ($key) {
    case "AccessAllowed":
        $query = "SELECT IDTAE,NOME,EMAIL,ACESSOPERMITIDO,TIPOACESSO FROM ACESSOTAE WHERE ACESSOPERMITIDO = 'SIM' LIMIT 30";
        break;
    case "AccessDenied":
        $query = "SELECT IDTAE,NOME,EMAIL,ACESSOPERMITIDO,TIPOACESSO FROM ACESSOTAE WHERE ACESSOPERMITIDO ='NAO' LIMIT 30";
        break;
    case "SelectedAll":
        $query = "SELECT IDTAE,NOME,EMAIL,ACESSOPERMITIDO,TIPOACESSO FROM ACESSOTAE";
        break;
    case "LastRecord":
        $query = "SELECT IDTAE,NOME,EMAIL,ACESSOPERMITIDO,TIPOACESSO FROM ACESSOTAE WHERE IDTAE=(SELECT MAX(IDTAE) FROM ACESSOTAE)";
        break;
    case "SelectById":
        $query = "SELECT IDTAE,NOME,EMAIL,ACESSOPERMITIDO,TIPOACESSO FROM ACESSOTAE WHERE IDTAE=$pesquisa";
        break;
    case "SelectedByName" :
        $query = "SELECT IDTAE,NOME,EMAIL,ACESSOPERMITIDO,TIPOACESSO FROM ACESSOTAE WHERE NOME LIKE '$pesquisa%'";
}
$link = new Conexao();
$result = mysqli_query($link->getConnection(), $query);
if (!$result) {
    echo "<div class='alert alert-danger' role='alert'>Não foi possivel recuperar o registro</div>" . die(mysqli_error($link->getConnection()));
} else {
    if (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            ?>
            <div class="data-tae">
                <div class="data">
                    <div id="idtae<?php echo strtoupper($data['IDTAE']) ?>" style="display:none"><?php echo $data['IDTAE'] ?></div>
                    <div class="nometae<?php echo $data['IDTAE'] ?>"><?php echo strtoupper($data['NOME']) ?></div>
                    <div class="emailtae<?php echo $data['IDTAE'] ?>"><?php echo strtoupper($data['EMAIL']) ?></div>
                    <div id="accesstae<?php echo strtoupper($data['IDTAE']) ?>" style="display:none"><?php echo $data['ACESSOPERMITIDO'] ?></div>
                    <div id="tipoacessotae<?php echo strtoupper($data['IDTAE']) ?>" style="display:none"><?php echo $data['TIPOACESSO'] ?></div>
                </div>
                <div class="btn-actions">
                    <div class="div-btn">
                        <button class="btn btn-danger" id="<?php echo $data['IDTAE'] ?>" onclick="deleteTae(this.id)"><i class="fas fa-trash-alt"></i></button>
                    </div>
                    <div class="div-btn">
                        <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="showModal(this.id)" id="<?php echo $data['IDTAE'] ?>"><i class="fas fa-pen"></i></button>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'> 0 registros retornados </div>";
    }
}

/*function getDataTae($idTae, $nameTae, $emailTae) {
    return
    ?>
    <div class="data">
        <div class="nometae<?php echo $idTae ?>"><?php echo strtoupper($nameTae) ?></div>
        <div class="emailtae<?php echo $idTae ?>"><?php echo strtoupper($emailTae) ?></div>
    </div>
    <div class="btn-actions">
        <div class="div-btn">
            <button class="btn btn-danger" id="<?php echo $idTae ?>"><i class="fas fa-trash-alt"></i></button>
        </div>
        <div class="div-btn">
            <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="showModal(this.id)" id="<?php echo $idTae ?>"><i class="fas fa-pen"></i></button>
        </div>
    </div>
 <?php  ; } ?>
*/