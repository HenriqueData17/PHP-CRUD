<?php
//sessão
session_start();
if(isset($_SESSION['mensagem'])){ ?>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast show" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body bg-dark text-white d-flex justify-content-between align-items-center">
                <span><?= $_SESSION['mensagem']; ?></span>
                <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
<?php } ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
        document.addEventListener("DOMContentLoaded", function() {
            var toastEl = document.getElementById("liveToast");
            var toast = new bootstrap.Toast(toastEl, {
                autohide: true, delay: 3000
            });
            toast.show();
        });
</script>

<?php
session_unset();
//conexão
include_once 'php_action/db_connect.php';
//header
include_once 'includes/header.php';
?>

<div class="container mx-auto">
    <h3 class="display-5">Clientes</h3>
    <table class="table table-striped">
        <caption>Registro de Clientes</caption>
        <thead>
            <tr>
                <th>Nome: </th>
                <th>Sobrenome: </th>
                <th>Email: </th>
                <th>Idade: </th>
            </tr>
        </thead>
        
        <tbody>
            <?php
            $sql = "SELECT * FROM clientes";
            $resultado = mysqli_query($connect, $sql);
            if(mysqli_num_rows($resultado)>0){
                while($dados = mysqli_fetch_array($resultado)){
                ?>
                <tr>
                    <td><?php echo $dados['nome']; ?></td>
                    <td><?php echo $dados['sobrenome']; ?></td>
                    <td><?php echo $dados['email']; ?></td>
                    <td><?php echo $dados['idade']; ?></td>
                    <td><a class="btn btn-warning text-light" href="edit_cliente.php?id=<?php echo $dados['id'];?>"><i class="bi bi-pencil-fill"></i></a></td>
                    <td><a class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" onclick="confirmDelete(<?php echo $dados['id']; ?>)"><i class="bi bi-trash"></i></a></td>
                </tr>
                <?php } 
            }
            else{?>

                <tr>
                    <td> -- </td>
                    <td> -- </td>
                    <td> -- </td>
                    <td> -- </td>
                </tr>

            <?php }?>
        </tbody>
    </table>
    <a class="btn btn-dark mb-2" href="add_cliente.php">ADICIONAR CLIENTE</a>
</div>

<!-- Modal de Confirmação -->
 <form action="php_action/delete.php" method="post">
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteLabel">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    Tem certeza de que deseja excluir este cliente? Esta ação não pode ser desfeita.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="btn-excluir">EXCLUIR</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="clientId" name="id">
</form>    
<script>
    function confirmDelete(id) {
        document.getElementById("clientId").value = id;
    }
</script>



<?php
//footer
include_once 'includes/footer.php';
?>