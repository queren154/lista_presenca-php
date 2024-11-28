<?php 
$lista_id = $_GET['lista_id'];
$id_participantes = $_GET['id_participantes'];

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
                <div class="alert alert-danger" role="alert">
                    deseja realemente excluir esse registro?
                </div>
                <a href="participante_excluir_action.php?id_participantes=<?=$id_participantes?>&lista_id=<?= $lista_id?>" class="btn btn-danger">Excluir</a>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>