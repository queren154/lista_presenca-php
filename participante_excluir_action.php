<?php

require('conexao.php');
$id_participantes = $_GET['id_participantes'];
$lista_id = $_GET['lista_id'];

$sql = 'DELETE FROM participantes WHERE id_participantes = ?';
$stmt = $conexao->prepare($sql);

if ($stmt) {

    $stmt->bind_param('i', $id_participantes);

    if ($stmt->execute()) {

        $msg = '<div class="alert alert-success" role="alert">
        Registro excluido com sucesso
    </div>';
    } else {
        $msg = '<div class="alert alert-alert" role="alert">
        nao foi possivel excluir o registro
    </div>';
    }

    $stmt->close();
} else {
    $msg = '<div class="alert alert-alert" role="alert">
    nao foi possivel preparar o sql
</div>';
}

$conexao->close();

?>
<?php include('header.php'); ?>

<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <h1>Excluir</h1>
            <a href="participantes.php?lista_id=<?= $lista_id?>" class="btn btn-primary">Voltar</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
          <?= $msg;?>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>