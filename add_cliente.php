<?php
//header
include_once 'includes/header.php';
?>

<div class="container mx-auto">
    <h3 class="display-5">Novo Cliente</h3>
    <form class="row g-3" action="php_action/create.php" method="post">
        <div class="col-md-6">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="informe o primeiro nome do cliente">
        </div>
        <div class="col-md-6">
            <label for="nome" class="form-label">Sobrenome</label>
            <input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="informe o sobrenome do cliente">
        </div>
        <div class="col-10">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="informe o email do cliente">
        </div>
        <div class="col-2">
            <label for="idade" class="form-label">Idade</label>
            <input type="number" class="form-control" name="idade" id="idade" min="18">
        </div>
        <div>
            <button type="submit" class="btn btn-dark" name="btn-cadastrar">CADASTRAR</button>
            <a class="btn btn-secondary" href="index.php">RETORNAR</a>
        </div>
    </form>
</div>

<?php
//footer
include_once 'includes/footer.php';
?>