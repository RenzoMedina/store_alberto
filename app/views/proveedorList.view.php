<?php require 'partials/header.php'; ?>
<?php include 'components/navbar.php'; 
session_start();
?>
<?php if (isset($_SESSION['proveedor_ok'])) : ?>
   <script>
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '<?php echo $_SESSION['proveedor_ok']; ?>'
            });
            // Eliminar el mensaje de sesión
            <?php unset($_SESSION['proveedor_ok']); ?>
        </script>
    <?php endif?>
    <?php if (isset($_SESSION['proveedor_udpate'])) : ?>
   <script>
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '<?php echo $_SESSION['proveedor_udpate']; ?>'
            });
            // Eliminar el mensaje de sesión
            <?php unset($_SESSION['proveedor_udpate']); ?>
        </script>
    <?php endif?>
<div class="p-4 sm:ml-64">
<p class="text-5xl text-center font-semibold mb-5">Lista de Proveedores</p>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg "style="max-height: 400px; overflow-y: auto;">
    <table class="w-full text-sm text-left rtl:text-right text-gray-600 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    R.U.T
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Categoria
                </th>
                <th scope="col" class="px-6 py-3">
                    Estado
                </th>
                <th scope="col" class="px-6 py-3">
                    Acción
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $item) : ?>
                <tr class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap capitalize">
                    <?php echo $item->rut;?>
                </th>
                <td class="px-6 py-4">
                <?php echo $item->nombre; ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $item->categoria;?>
                </td>
                <td class="px-6 py-4">
                <?php echo $item->estado;?>
                </td>
                <td class="px-6 py-4">
    
                    <button>
                    <a href="/proveedor/edit/<?php echo $item->id;?>"> <svg class="w-6 h-6 text-gray-800 dark:text-green-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M14 4.182A4.136 4.136 0 0 1 16.9 3c1.087 0 2.13.425 2.899 1.182A4.01 4.01 0 0 1 21 7.037c0 1.068-.43 2.092-1.194 2.849L18.5 11.214l-5.8-5.71 1.287-1.31.012-.012Zm-2.717 2.763L6.186 12.13l2.175 2.141 5.063-5.218-2.141-2.108Zm-6.25 6.886-1.98 5.849a.992.992 0 0 0 .245 1.026 1.03 1.03 0 0 0 1.043.242L10.282 19l-5.25-5.168Zm6.954 4.01 5.096-5.186-2.218-2.183-5.063 5.218 2.185 2.15Z" clip-rule="evenodd"/>
</svg></a>   
                </button>
                <!----------- Temporalmente desactivado
                    <button>
                    <a href="<?php echo $item->id;?>">
                    <svg class="w-6 h-6 text-gray-800 dark:text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
</svg>
                    </a>
                    </button>
           --------------------------->
                </td>
            </tr>

            <?php endforeach?>
        </tbody>
    </table>
</div>
</div>



<?php require 'partials/footer.php'; ?>