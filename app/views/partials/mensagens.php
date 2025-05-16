<!-- Retornar a mensagem de sucesso quando a atualização nos campos obtiver exitos  -->

<?php
if (isset($_SESSION['sucesso'])) {
?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            swal("Tudo certo!", "<?php echo $_SESSION['sucesso']; ?>", "success");
        });
    </script>
<?php

    unset($_SESSION['sucesso']);
}
?>

<?php
if (isset($_SESSION['atencao'])) {
?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            swal("Atenção!", "<?php echo $_SESSION['atencao']; ?>", "warning");
        });
    </script>
<?php

    unset($_SESSION['atencao']);
}
?>


<?php
if (isset($_SESSION['error'])) {
?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            swal("Erro na Requesição!", "<?php echo $_SESSION['error']; ?>", "error");
        });
    </script>
<?php

    unset($_SESSION['error']);
}
?>