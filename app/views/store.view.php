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
<table class="w-full text-sm text-left rtl:text-right text-gray-600 ">
        <thead class="text-xs text-gray-300 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
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
                <th scope="col" class="px-6 py-3">
                    Acción
                </th>
            </tr>
        </thead>
</table>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg" style="max-height: 350px; overflow-y: auto;">
    <table class="w-full text-sm text-left rtl:text-right text-gray-600 ">
        <tbody>
            <?php 
               if(isset($data)){
            foreach($data as $item) { ?>
            
            <tr class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <? echo $item->fecha;?>
                </th>
                <td class="px-6 py-4">
                <? echo "$ ".number_format($item->valor, 0, '.', ',')?>
                </td>
                <td class="px-6 py-4 capitalize">
                <? echo $item->tipo;?>
                </td>
                <td class="px-6 py-4 capitalize">
                <? echo $item->estado;?>
                </td>
                <td class="px-6 py-4">
    
                    <button>
                    <svg class="w-6 h-6 text-gray-800 dark:text-green-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M14 4.182A4.136 4.136 0 0 1 16.9 3c1.087 0 2.13.425 2.899 1.182A4.01 4.01 0 0 1 21 7.037c0 1.068-.43 2.092-1.194 2.849L18.5 11.214l-5.8-5.71 1.287-1.31.012-.012Zm-2.717 2.763L6.186 12.13l2.175 2.141 5.063-5.218-2.141-2.108Zm-6.25 6.886-1.98 5.849a.992.992 0 0 0 .245 1.026 1.03 1.03 0 0 0 1.043.242L10.282 19l-5.25-5.168Zm6.954 4.01 5.096-5.186-2.218-2.183-5.063 5.218 2.185 2.15Z" clip-rule="evenodd"/>
</svg>

                    </button>
                    <button>
                    <svg class="w-6 h-6 text-gray-800 dark:text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
</svg>
                    </button>
           
                </td>
            </tr>
            <? }}
            ?>
        </tbody>
    </table>
</div>
      <div class="float-end mt-4">
         <form action="/store/box" method="POST" id="cierre_caja">
         <button 
            class="focus:outline-none flex items-center text-white bg-blue-700 hover:bg-blue-700 focus:ring-1 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-1 mb-2 ">
            <svg class="w-5 h-5 text-white mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 18h14M5 18v3h14v-3M5 18l1-9h12l1 9M16 6v3m-4-3v3m-2-6h8v3h-8V3Zm-1 9h.01v.01H9V12Zm3 0h.01v.01H12V12Zm3 0h.01v.01H15V12Zm-6 3h.01v.01H9V15Zm3 0h.01v.01H12V15Zm3 0h.01v.01H15V15Z"/>
         </svg>
         Cierre de caja</button>
         </form>
      </div>
</div>
<? require 'partials/footer.php'; ?>