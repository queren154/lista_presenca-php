<?php 
$lista_id = $_GET['lista_id'];

?>
<?php include('header.php'); ?>

<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <h1>Cadastrar</h1>
            <a href="lista_presenca.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    deseja realemente excluir esse registro?
                </div>
                <a href="lista_presenca_excluir_action.php?lista_id=<?= $lista_id?>" class="btn btn-danger">Excluir</a>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>