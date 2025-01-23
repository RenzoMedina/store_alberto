<?php require 'partials/header.php'; ?>
<?php include 'components/navbar.php'; ?>
<div class="p-4 sm:ml-64">
    <div class="float-end ">
        <button
      class="relative inline-block p-px font-semibold leading-6 text-white bg-blue-600 shadow-md cursor-pointer rounded-2xl  transition-all duration-300 ease-in-out hover:scale-105 active:scale-95 hover:shadow-emerald-700">
      <a href="/store">
      <span
        class="absolute inset-0 rounded-2xl bg-gradient-to-r from-emerald-500 via-cyan-500 to-sky-600 p-[2px] opacity-0 transition-opacity duration-500 group-hover:opacity-100"
      ></span>
      <span class="relative z-10 block px-6 py-3 rounded-2xl bg-neutral-900">
      
        <div class="relative z-10 flex items-center space-x-3">
          <span
            class="transition-all duration-500 group-hover:translate-x-1.5 group-hover:text-emerald-300"
            >Retornar</span>
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path d="M14.502 7.046h-2.5v-.928a2.122 2.122 0 0 0-1.199-1.954 1.827 1.827 0 0 0-1.984.311L3.71 8.965a2.2 2.2 0 0 0 0 3.24L8.82 16.7a1.829 1.829 0 0 0 1.985.31 2.121 2.121 0 0 0 1.199-1.959v-.928h1a2.025 2.025 0 0 1 1.999 2.047V19a1 1 0 0 0 1.275.961 6.59 6.59 0 0 0 4.662-7.22 6.593 6.593 0 0 0-6.437-5.695Z"/>
</svg>

        </div>
      </span>
      </a>
    </button>
    </div>
<p class="text-4xl ml-36 uppercase text-center font-semibold mb-5 mt-12">Actualización de venta</p>
<?php foreach($data as $item):?>
<form class="max-w-md mx-auto mt-3 p-6 shadow-2xl font-semibold border-2 rounded-xl" action="/store/update/<?php echo $item['id']?>" method="POST">
        <div class="mb-4">
            <input type="hidden" name="<?php echo $item['id'] ?>">
          <label for="text" class="block mb-2 text-base ">Valor</label>
          <input type="text" id="Valor" name="valor" value="<?php echo $item['valor'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ejm: 11.111.111-1" required />
        </div>
            
    <div class="mb-4">
        <label for="Categorias" class="block mb-2 text-base text-gray-900 ">Tipo</label>
        <select  name="tipo" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" >
            <option value="efectivo">Efectivo</option>  
            <option value="tarjeta">Tarjeta</option>
            <option value="credito">Crédito</option>
        </select>
    </div>
    <button
      class="bg-slate-300 text-center w-48 rounded-2xl h-14 relative text-black text-xl font-semibold group"
      type="submit">
      <div class="bg-orange-600 rounded-xl h-12 w-1/4 flex items-center justify-center absolute left-1 top-[4px] group-hover:w-[184px] z-10 duration-500">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
</svg></div>
    
      <p class="translate-x-2">Actualizar</p>
</button>
  </form>
  <?php endforeach?>
</div>
<?php require 'partials/footer.php'; ?>