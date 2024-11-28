<?php

require("conexao.php");

$sql = "select * from listas";
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {

    while ($row = $resultado->fetch_assoc()) {

        $dados[] = $row;
    }
} else {
    echo "nao existe registros no banco";
}

?>

<?php include('header.php'); ?>

<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <h1>Listas De Presenças</h1>
            <a href="index.php" class="btn btn-primary">Voltar</a>
            <a href="lista_presenca_cadastrar.php" class="btn btn-primary">Cadastrar</a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Evento</th>
                        <th scope="col">Facilitador</th>
                        <th scope="col">Local</th>
                        <th scope="col">Data</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dados as $item):?>
                       
                    <tr>
                        <th scope="row"><?php echo $item['lista_id']?></th>
                        <td><?= $item['evento']?></td>
                        <td><?= $item['facilitador']?></td>
                        <td><?= $item['local_evento']?></td>
                        <td><?= $item['data_evento']?></td>
                        <td>
                        <a href="participantes.php?lista_id=<?= $item['lista_id']?>" class="btn btn-info">Participantes</a>
                            <a href="lista_presenca_ver.php?lista_id=<?= $item['lista_id']?>" class="btn btn-primary">Ver</a>
                            <a href="lista_presenca_editar.php?lista_id=<?= $item['lista_id']?>" class="btn btn-warning">Editar</a>
                            <a href="lista_presenca_excluir.php?lista_id=<?= $item['lista_id']?>" class="btn btn-danger">Excluir</a>
                            <td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>