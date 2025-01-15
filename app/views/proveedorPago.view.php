<?php require 'partials/header.php'; ?>
<?php include 'components/navbar.php'; 
    session_start();
?>

<?php if (isset($_SESSION['pago_proveedor_ok'])) : ?>
   <script>
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '<?php echo $_SESSION['pago_proveedor_ok']; ?>'
            });
            // Eliminar el mensaje de sesión
            <?php unset($_SESSION['pago_proveedor_ok']); ?>
        </script>
    <?php endif?>
<div class="p-4 sm:ml-64">
<p class="text-4xl uppercase font-semibold mb-5">Pago de proveedores</p>
<form class="py-4 font-semibold" action="/proveedor/pago/create" method="POST">
        <div class="grid md:grid-cols-3 gap-6 mb-4">
            <div class="mb-4">
                <label for="Provedor" class="block mb-2 text-base font-semibold text-gray-900">Provedores</label>
                <select name="id_proveedor" id="Provedor" class="bg-gray-50 border border-gray-300 text-gray-900 text-base font-semibold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full h-12 p-3 ">
                   <option selected>Seleccionar provedor</option>
                   <?php foreach($data as $item ):?> 
                    <option value="<?php echo intval($item->id);?>"><?php echo $item->nombre?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="precio" class="block mb-2 text-base font-semibold text-gray-900">Precio</label>
                <input type="text" name="valor" id="precio" class="bg-gray-50 border border-gray-300 text-gray-900 text-base font-semibold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full h-12 p-3 " placeholder="Ingrese el valor" required />
            </div>
            <div class="mt-8">
            <button class="bg-slate-200 text-center w-56 rounded-2xl h-14 relative text-black text-base font-semibold group" type="submit">
                <div class="bg-blue-600 rounded-xl h-12 w-1/4 flex items-center justify-center absolute left-1 top-[4px] group-hover:w-[216px] z-10 duration-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                    </svg>
                </div>
                <p class="translate-x-2">Pagar</p>
            </button>
        </div>
        </div>
    </form>

    <!-----Table---->
<div class="relative overflow-x-auto shadow-md sm:rounded-lg" style="max-height: 350px; overflow-y: auto;">
    <table class="w-full text-sm text-left rtl:text-right text-gray-600 ">
    <thead class="text-xs text-gray-300 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    R.U.T
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3 ">
                    Valor Pagado
                </th>
                <th scope="col" class="px-6 py-3">
                    Acción
                </th>
            </tr>
        </thead>
    <tbody>
            
            <?php 
               if(isset($pago)):
            foreach($pago as $itempago) : ?>
            
            <tr class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <?php echo $itempago->pago_id;?>
                </th>
                <td class="px-6 py-4">
                <?php echo $itempago->rut;?>
                </td>
                <td class="px-6 py-4 capitalize">
                <?php echo $itempago->nombre;?>
                </td>
                <td class="px-6 py-4 capitalize">
                <?php echo "$ ".number_format($itempago->valor, 0, '.', ',')?>
                </td>
                <td class="px-6 py-4">
    
                    <button>
                    <svg class="w-6 h-6 text-gray-800 dark:text-green-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M14 4.182A4.136 4.136 0 0 1 16.9 3c1.087 0 2.13.425 2.899 1.182A4.01 4.01 0 0 1 21 7.037c0 1.068-.43 2.092-1.194 2.849L18.5 11.214l-5.8-5.71 1.287-1.31.012-.012Zm-2.717 2.763L6.186 12.13l2.175 2.141 5.063-5.218-2.141-2.108Zm-6.25 6.886-1.98 5.849a.992.992 0 0 0 .245 1.026 1.03 1.03 0 0 0 1.043.242L10.282 19l-5.25-5.168Zm6.954 4.01 5.096-5.186-2.218-2.183-5.063 5.218 2.185 2.15Z" clip-rule="evenodd"/>
</svg>

                    </button>
                </td>
            </tr>
            <?php endforeach;
            endif
            ?>
        </tbody>
    </table>
</div>

</div>


<?php require 'partials/footer.php'; ?>