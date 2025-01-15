<?php require 'partials/header.php'; ?>
<?php include 'components/navbar.php'; ?>
<div class="p-4 sm:ml-64">
<p class="text-4xl uppercase text-center font-semibold mb-5">Registro de proveedores</p>
<form class="max-w-md mx-auto mt-3 p-6 shadow-2xl font-semibold border-2 rounded-xl" action="/proveedor/store" method="POST">
        <div class="mb-4">
          <label for="text" class="block mb-2 text-base ">Rut</label>
          <input type="text" id="text" name="rut_proveedor" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ejm: 11.111.111-1" required />
        </div>
        <div class="mb-3">
          <label for="text" class="block mb-2 text-base  text-gray-900">Nombre</label>
          <input type="text" id="text" name="nombre_proveedor" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ingrese el nombre del proveedor" required />
        </div>
            
    
    <div class="mb-4">
        <label for="Categorias" class="block mb-2 text-base text-gray-900 ">Categorias</label>
        <select name="categorias" id="categorias" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" >
            <option selected>Elije la categoria..</option>  
            <option value="pan">Pan</option>
            <option value="cigarros">Cigarros</option>
            <option value="bebidas">Bebidas</option>
            <option value="aseo">Aseo</option>
            <option value="abarrotes">Abarrotes</option>
            <option value="verduras">Verduras</option>
            <option value="personal">Personal</option>
        </select>
    </div>
          <div class="mb-5">
            <label for="text" class="block mb-2 text-base text-gray-900">Estado</label>
            <input type="text" id="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-semibold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " name="estado" value="Activo" readonly>
          </div>
    <button
      class="bg-slate-300 text-center w-48 rounded-2xl h-14 relative text-black text-xl font-semibold group"
      type="submit"
    >
      <div
        class="bg-blue-600 rounded-xl h-12 w-1/4 flex items-center justify-center absolute left-1 top-[4px] group-hover:w-[184px] z-10 duration-500"
      >
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
      </svg>
      
      </div>
      <p class="translate-x-2">Guardar</p>
</button>
  </form>
</div>
<?php require 'partials/footer.php'; ?>