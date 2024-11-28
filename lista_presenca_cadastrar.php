<?php include('header.php'); ?>

<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <h1>Cadastrar</h1>
            <a href="lista_presenca.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <form action="lista_presenca_cadastrar_action.php" method="post">
                <div class="mb-3">
                    <label class="form-label">Evento</label>
                    <input type="text" class="form-control" name="evento" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Facilitador</label>
                    <input type="text" class="form-control" name="facilitador" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Local</label>
                    <input type="text" class="form-control" name="local_evento" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Data</label>
                    <input type="date" class="form-control" name="data_evento" required>
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>