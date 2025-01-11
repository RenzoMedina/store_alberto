<? require 'partials/header.php'; ?>
<? include 'components/navbar.php'; ?>
<div class="p-4 sm:ml-64">
   <h1>Aqui ira la vista general de los reportes </h1>
</div>
<?php session_start();?>
<?php if (isset($_SESSION['user_success'])) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '<?php echo $_SESSION['user_success']; ?>'
            });
            // Eliminar el mensaje de sesión
            <?php unset($_SESSION['user_success']); ?>
        </script>
    <?php };?>
<? require 'partials/footer.php'; ?>