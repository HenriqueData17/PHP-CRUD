<?php
//conexão
include_once 'php_action/db_connect.php';
//header
include_once 'includes/header.php';
//select
if(isset($_GET['id'])){
    $id = mysqli_escape_string($connect, $_GET['id']);

    $sql = "SELECT * FROM clientes WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
}
?>

<div class="container mx-auto">
    <h3 class="display-5">Editar Cliente</h3>
    <form class="row g-3" action="php_action/update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $dados['id'];?>">
        <div class="col-md-6">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="informe o primeiro nome do cliente" value="<?php echo $dados['nome'];?>">
        </div>
        <div class="col-md-6">
            <label for="nome" class="form-label">Sobrenome</label>
            <input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="informe o sobrenome do cliente" value="<?php echo $dados['sobrenome'];?>">
        </div>
        <div class="col-10">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="informe o email do cliente" value="<?php echo $dados['email'];?>">
        </div>
        <div class="col-2">
            <label for="idade" class="form-label">Idade</label>
            <input type="number" class="form-control" name="idade" id="idade" min="0" value="<?php echo $dados['idade'];?>">
        </div>
        <div>
            <button type="submit" class="btn btn-dark" name="btn-atualizar">ATUALIZAR</button>
            <a class="btn btn-secondary" href="index.php">RETORNAR</a>
        </div>
    </form>
</div>

<?php
//footer
include_once 'includes/footer.php';
?>