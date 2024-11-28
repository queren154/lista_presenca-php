<?php include('header.php'); ?>
<?php
require('conexao.php');

$nome = $_POST['nome'];
$turno = $_POST['turno'];
$lista_id = $_POST['lista_id'];

// echo'<pre>';
// print_r($_POST);
// echo'</pre>';
// exit;

$sql = "INSERT INTO participantes(nome, turno, lista_id) VALUES (?, ?, ?)";

$stmt = $conexao->prepare($sql);

if ($stmt) {

    $stmt->bind_param('ssi', $nome, $turno, $lista_id);

    if ($stmt->execute()) {
        $msg = ' <div class="alert alert-success" role="alert">
        Lista Cadastrada com Sucesso : )
      </div>';
    }
} else {

    $msg = ' <div class="alert alert-danger" role="alert">
    Erro ao cadastrar o Registro : (
  </div>';
}

$stmt->close();

?>

<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <h1>Editar</h1>
            <a href="participantes.php?lista_id=<?= $lista_id ?>" class="btn btn-primary">Voltar</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <?php echo $msg; ?>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>