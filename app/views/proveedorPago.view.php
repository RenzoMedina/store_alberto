<?php require 'partials/header.php'; ?>
<?php include 'components/navbar.php'; ?>
<div class="p-4 sm:ml-64">
<p class="text-4xl uppercase font-semibold mb-5">Pago de proveedores</p>
<form class="py-4 font-semibold">
        <div class="grid md:grid-cols-3 gap-6 mb-4">
            <div class="mb-4">
                <label for="Provedor" class="block mb-2 text-base font-semibold text-gray-900">Provedores</label>
                <select name="Provedor" id="Provedor" class="bg-gray-50 border border-gray-300 text-gray-900 text-base font-semibold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full h-12 p-3 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Seleccionar provedor</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="precio" class="block mb-2 text-base font-semibold text-gray-900">Precio</label>
                <input type="text" id="precio" class="bg-gray-50 border border-gray-300 text-gray-900 text-base font-semibold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full h-12 p-3 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Valor" required />
            </div>
            <div class="mt-8">
            <button class="bg-slate-200 text-center w-56 rounded-2xl h-14 relative text-black text-base font-semibold group" type="button">
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
</div>
<?php require 'partials/footer.php'; ?>