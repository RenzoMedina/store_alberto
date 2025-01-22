<?php require 'partials/header.php'; ?>
<?php include 'components/navbar.php'; ?>
<div class="p-4 sm:ml-64">

   <form action="#" method="POST">
        <div class="flex justify-center items-center min-h-screen">
            <div class="justify-center rounded-3xl w-full max-w-lg text-center transition-all duration-300 shadow-2xl">
                <h2 class="text-center text-4xl font-semibold my-4 tracking-wide">Registro de Factura</h2>
                <div class="justify-center grid grid-cols-1 gap-3 px-6 py-4 rounded-3xl bg-gradient-to-br">
                    <div class="flex items-center gap-3 px-4 py-2.5 rounded-xl bg-gray-600 shadow-inner shadow-black/75 hover:bg-gray-800 transition-colors duration-300">
                        <svg class="w-5 h-5 text-violet-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/>
                            <line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                        <input type="date" class="w-full h-6 bg-transparent border-none outline-none text-gray-200 text-sm placeholder-black" placeholder="Selecciona la fecha">
                    </div>
                    <div class="flex items-center gap-3 px-4 py-2.5 rounded-xl bg-gray-600 shadow-inner shadow-black/75 hover:bg-gray-800 transition-colors duration-300">
                        <svg class="w-5 h-5 text-violet-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                            <line x1="16" y1="13" x2="8" y2="13"/>
                            <line x1="16" y1="17" x2="8" y2="17"/>
                            <line x1="10" y1="9" x2="8" y2="9"/>
                        </svg>
                        <input type="text" class="w-full bg-transparent border-none outline-none text-gray-200 text-sm placeholder-gray-400" placeholder="Factura o boleta">
                    </div>
                    <div class="flex items-center gap-3 px-4 py-2.5 rounded-xl bg-gray-600 shadow-inner shadow-black/75 hover:bg-gray-800 transition-colors duration-300">
                        <svg class="w-5 h-5 text-violet-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            <polyline points="9 22 9 12 15 12 15 22"/>
                        </svg>
                        <input type="text" class="w-full bg-transparent border-none outline-none text-gray-200 text-sm placeholder-gray-400" placeholder="Empresa">
                    </div>
                    <div class="flex items-center gap-3 px-4 py-2.5 rounded-xl bg-gray-600 shadow-inner shadow-black/75 hover:bg-gray-800 transition-colors duration-300">
                        <svg class="w-5 h-5 text-violet-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="1" x2="12" y2="23"/>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                        </svg>
                        <input type="text" class="w-full bg-transparent border-none outline-none text-gray-200 text-sm placeholder-gray-400" placeholder="Valor">
                    </div>
                    <div class="flex items-start gap-3 px-4 py-2.5 rounded-xl bg-gray-600 shadow-inner shadow-black/75 hover:bg-gray-800 transition-colors duration-300">
                        <svg class="w-5 h-5 text-violet-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 20h9"/>
                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                        </svg>
                        <textarea name="" id="" cols="30" rows="5" class="w-full bg-transparent border-none outline-none text-gray-200 text-sm placeholder-gray-400 h-32" placeholder="Descripcion"></textarea>
                    </div>
                    <div class="flex items-center gap-3 px-4 py-2.5 rounded-xl bg-gray-600 shadow-inner shadow-black/75 hover:bg-gray-800 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-violet-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z"/>
                        </svg>
                        <input class="w-full bg-transparent border-none outline-none text-gray-200 text-sm placeholder-gray-400" type="file" placeholder="Seleccionar Foto">
                    </div>

                    <button type="submit" class="flex justify-center items-center mx-auto shadow-xl text-lg bg-gray-300 backdrop-blur-md lg:font-semibold isolation-auto border-gray-50 before:absolute before:w-full before:transition-all before:duration-700 before:hover:w-full before:-left-full before:hover:left-0 before:rounded-full before:bg-blue-500 before:-z-10 before:aspect-square before:hover:scale-150 before:hover:duration-700 relative z-10 px-4 py-2 overflow-hidden border-2 rounded-full group">
                        Guardar
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 ml-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
                          </svg>
                          
                    </button>
    </form>
</div>
<?php require 'partials/footer.php'; ?>