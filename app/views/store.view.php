<? require 'partials/header.php'; ?>
<? include 'components/navbar.php'; ?>
<div class="p-4 sm:ml-64">
   <p class="text-4xl uppercase font-semibold mb-5">Venta básica</p>
   <form action="#" method="POST">
      <div class="grid md:grid-cols-3 gap-3 mb-2 grid-cols-1">
         <div>
            <label for="fecha" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha</label>
            <input type="text" id="fecha" name="fecha"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
               disabled />
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
               <option value="debito">Débito</option>
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
           <label for="tipo" class="block mb-2 text-sm font-medium text-gray-900 ">Estado</label>
            <select id="tipo" name="tipo"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
               <option value="efectivo">Pendiente</option>
               <option selected value="debito">Pagado</option>
            </select>
           </div>
      </div>
      <div class="float-end mt-4">
         <button type="button"
            class="focus:outline-none flex text-white bg-green-700 hover:bg-green-800 focus:ring-1 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-1 mb-2 ">
            <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
               height="24" fill="none" viewBox="0 0 24 24">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 17.345a4.76 4.76 0 0 0 2.558 1.618c2.274.589 4.512-.446 4.999-2.31.487-1.866-1.273-3.9-3.546-4.49-2.273-.59-4.034-2.623-3.547-4.488.486-1.865 2.724-2.899 4.998-2.31.982.236 1.87.793 2.538 1.592m-3.879 12.171V21m0-18v2.2" />
            </svg>Pagar</button>
      </div>
      
   </form>
</div>
<? require 'partials/footer.php'; ?>