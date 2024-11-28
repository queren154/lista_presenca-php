<?php
require('conexao.php');

$lista_id = $_GET['lista_id'];

$sql = 'SELECT * FROM listas WHERE lista_id = ?';

$stmt = $conexao->prepare($sql);

if ($stmt) {

    $stmt->bind_param('i', $lista_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $dados = $result->fetch_assoc();
    }
} else {
    $msg = '<div class="alert alert-danger" role="alert">
    nao foi possivel preparar o sql
  </div>';
}

?>

<?php include('header.php'); ?>

<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <h1>Visualização</h1>
            <a href="lista_presenca.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <form action="lista_presenca_editar_action.php" method="post">
            <div class="mb-3" hidden>
                    <label class="form-label">Id</label>
                    <input type="text" class="form-control" name="lista_id" value="<?= $dados['lista_id'] ?>" >
                </div>
                <div class="mb-3">
                    <label class="form-label">Evento</label>
                    <input type="text" class="form-control" name="evento" value="<?= $dados['evento'] ?>" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Facilitador</label>
                    <input type="text" class="form-control" name="facilitador" value="<?= $dados['facilitador'] ?>" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Local</label>
                    <input type="text" class="form-control" name="local_evento" value="<?= $dados['local_evento'] ?>" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Data</label>
                    <input type="date" class="form-control" name="data_evento" value="<?= $dados['data_evento'] ?>" disabled>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>