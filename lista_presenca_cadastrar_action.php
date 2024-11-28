<?php
require("conexao.php");

$evento = $_POST['evento'];
$facilitador = $_POST['facilitador'];
$local_evento = $_POST['local_evento'];
$data_evento = $_POST['data_evento'];

$sql = "insert into listas (evento, facilitador, local_evento, data_evento)
values(?, ?, ?, ?)";

$stmt = $conexao->prepare($sql);

if ($stmt) {

    $stmt->bind_param("ssss", $evento, $facilitador, $local_evento, $data_evento);
    if ($stmt->execute()) {
        $msg = ' <div class="alert alert-success" role="alert">
        Lista Cadastrada com Sucesso : )
      </div>';
    } else {


        $msg = ' <div class="alert alert-danger" role="alert">
        Erro ao cadastrar o Registro : (
      </div>';
    }
    $stmt->close();
} else {

    $msg = '<div class="alert alert-danger" role="alert">
    Lista Cadastrada com Sucesso !
  </div>';
}
$conexao->close();

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
                <?php echo $msg; ?>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>