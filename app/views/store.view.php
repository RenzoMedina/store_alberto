<? require 'partials/header.php'; ?>
<? include 'components/navbar.php'; 
session_start();
?>
<?php if (isset($_SESSION['store_ok'])) { ?>
   <script>
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '<?php echo $_SESSION['store_ok']; ?>'
            });
            // Eliminar el mensaje de sesión
            <?php unset($_SESSION['store_ok']); ?>
        </script>
    <?php };?>
<div class="p-4 sm:ml-64">
   <p class="text-4xl uppercase font-semibold mb-5">Venta básica</p>
   <form action="/store/create" method="POST">
      <div class="grid md:grid-cols-3 gap-3 mb-2 grid-cols-1">
         <div>
            <label for="fecha" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha</label>
            <input type="text" id="fecha" name="fecha"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
               readonly/>
         </div>
         <div>
            <label for="valor" class="block mb-2 text-sm font-medium text-gray-900 ">Valor</label>
            <input type="text" id="valor" name="valor"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
               placeholder="ejm: 4000" required />
         </div>
         <div>
            <label for="tipo" class="block mb-2 text-sm font-medium text-gray-900 ">Tipo de pago</label>
            <select id="tipo" name="tipo"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
               <option selected value="efectivo">Efectivo</option>
               <option value="tarjeta">Tarjeta</option>
               <option value="credito">Crédito</option>
            </select>
         </div>
      </div>
      <div id="nombreCredi" class="hidden md:grid-cols-2 gap-3">
      <div>
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 ">Nombre</label>
            <input type="text" id="nombre" name="nombre"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
         </div>
           <div>
           <label for="tipo_credito" class="block mb-2 text-sm font-medium text-gray-900 ">Estado</label>
            <select id="tipo_credito" name="estado"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
               <option selected value="pagado">Pagado</option>
               <option value="pendiente">Pendiente</option>
            </select>
           </div>
      </div>
      <div class="float-end mt-4">
         <button type="submit"
            class="focus:outline-none flex text-white bg-green-700 hover:bg-green-800 focus:ring-1 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-1 mb-2 ">
            <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
               height="24" fill="none" viewBox="0 0 24 24">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 17.345a4.76 4.76 0 0 0 2.558 1.618c2.274.589 4.512-.446 4.999-2.31.487-1.866-1.273-3.9-3.546-4.49-2.273-.59-4.034-2.623-3.547-4.488.486-1.865 2.724-2.899 4.998-2.31.982.236 1.87.793 2.538 1.592m-3.879 12.171V21m0-18v2.2" />
            </svg>Pagar</button>
      </div>
      
   </form>

<!---Table--->
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-20" style="max-height: 350px; overflow-y: auto;">
    <table class="w-full text-sm text-left rtl:text-right text-gray-600 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Fecha
                </th>
                <th scope="col" class="px-6 py-3">
                    Valor
                </th>
                <th scope="col" class="px-6 py-3">
                    Tipo de pago
                </th>
                <th scope="col" class="px-6 py-3">
                    Estado
                </th>
            </tr>
        </thead>
        <tbody>
            <?php 
               if(isset($data)){
            foreach($data as $item) { ?>
            
            <tr class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <? echo $item->fecha;?>
                </th>
                <td class="px-6 py-4">
                <? echo "$".number_format($item->valor, 0, '.', ',')?>
                </td>
                <td class="px-6 py-4">
                <? echo $item->tipo;?>
                </td>
                <td class="px-6 py-4">
                <? echo $item->estado;?>
                </td>
            </tr>
            <? }}
            ?>
        </tbody>
    </table>
</div>
<div class="float-end mt-4">
         <button type="buttom" id="cierre_caja"
            class="focus:outline-none flex items-center text-white bg-blue-700 hover:bg-blue-700 focus:ring-1 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-1 mb-2 ">
            <svg class="w-5 h-5 text-white mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 18h14M5 18v3h14v-3M5 18l1-9h12l1 9M16 6v3m-4-3v3m-2-6h8v3h-8V3Zm-1 9h.01v.01H9V12Zm3 0h.01v.01H12V12Zm3 0h.01v.01H15V12Zm-6 3h.01v.01H9V15Zm3 0h.01v.01H12V15Zm3 0h.01v.01H15V15Z"/>
         </svg>
         Cierre de caja</button>
               </div>
</div>
<? require 'partials/footer.php'; ?>