<? require 'partials/header.php'; ?>
<? include 'components/navbar.php';
session_start();
?>
<?php if (isset($_SESSION['pago_credito_ok'])) { ?>
   <script>
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '<?php echo $_SESSION['pago_credito_ok']; ?>'
            });
            // Eliminar el mensaje de sesión
            <?php unset($_SESSION['pago_credito_ok']); ?>
        </script>
    <?php };?>
<div class="p-4 sm:ml-64">
<p class="text-5xl text-center font-semibold mb-5">Lista de créditos</p>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg "style="max-height: 400px; overflow-y: auto;">
    <table class="w-full text-sm text-left rtl:text-right text-gray-600 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Total
                </th>
                <th scope="col" class="px-6 py-3">
                    Acción
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $item) { ?>
                <form action="/store/pago" method="POST" id="pago_credito">
                <tr class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap capitalize">
                    <? echo $item->nombre;?>
                </th>
                <td class="px-6 py-4">
                <? echo "$ ".number_format($item->total_valor, 0, '.', ',') ?>
                </td>
                <td class="px-6 py-4">
                    <input type="hidden" name="nombre" value="<? echo $item->nombre;?>">
                    <input type="hidden" name="estado" value="pagado">
                    <input type="hidden" name="total" value="<? echo $item->total_valor;?>">
                    <input type="hidden" name="tipo" value="efectivo">
                    <button >
                    <svg class="w-6 h-6 text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M7 6a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2h-2v-4a3 3 0 0 0-3-3H7V6Z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M2 11a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-7Zm7.5 1a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5Z" clip-rule="evenodd"/>
                    <path d="M10.5 14.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"/>
                    </svg>
                    </button>
                </td>
            </tr>
                </form>
            <? }?>
        </tbody>
    </table>
</div>
</div>
<? require 'partials/footer.php'; ?>