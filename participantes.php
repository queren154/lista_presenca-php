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

$stmt->close();

$sqlParticipantes = 'SELECT * FROM participantes WHERE lista_id = ' . $lista_id;
$resultadoParticipantes = $conexao->query($sqlParticipantes);

if ($resultadoParticipantes->num_rows > 0) {

    while ($row = $resultadoParticipantes->fetch_assoc()) {

        $dadosParticipantes[] = $row;
    }
} else {
    $msg = "nao existe registros no banco";
}


?>

<?php include('header.php'); ?>

<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <h1>Participantes</h1>
            <a href="lista_presenca.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Dados do Evento
                </div>
                <div class="card-body">
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
                        <input type="text" class="form-control" name="local" value="<?= $dados['local_evento'] ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Data</label>
                        <input type="date" class="form-control" name="data" value="<?= $dados['data_evento'] ?>" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Participantes
                </div>
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Cadastrar
                    </button>
                    <div class="col-12">
                        <?php if(isset($dadosParticipantes)):?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Turno</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dadosParticipantes as $itemParticipantes): ?>
                                    <tr>
                                        <th scope="row"><?php echo $itemParticipantes['id_participantes'] ?></th>
                                        <td><?= $itemParticipantes['nome'] ?></td>
                                        <td><?= $itemParticipantes['turno'] ?></td>
                                        <td><a href="participantes_excluir.php?id_participantes=<?= $itemParticipantes['id_participantes'] ?>&lista_id=<?= $lista_id ?>" class="btn btn-danger">Excluir</a>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php else:?>
                            <p class="text-danger mt-5">Nao há participantes</p>
                            <?php endif;?>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Participante</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="participantes_action.php" method="post">
                                    <div class="mb-3">
                                        <label class="form-label">Nome</label>
                                        <input type="text" class="form-control" name="nome">
                                    </div>
                                    <div class="mb3">
                                        <label class="form-label">Turno</label>
                                        <select class="form-select" name="turno" aria-label="Default select example">
                                            <option selected>Selecione</option>
                                            <option value="matutino">Matutino</option>
                                            <option value="vespertino">Vespertino</option>
                                            <option value="noturno">Noturno</option>
                                        </select>
                                    </div>
                                    <input type="number" name="lista_id" class="form-control" value="<?= $dados['lista_id'] ?>" hidden>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Salvar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include('footer.php'); ?>