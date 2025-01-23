<?php require 'partials/header.php'; ?>
<?php include 'components/navbar.php'; ?>
<?php session_start();?>
<?php 
if (isset($_SESSION['user_success'])) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '<?php echo $_SESSION['user_success']; ?>'
            });
            // Eliminar el mensaje de sesión
            <?php unset($_SESSION['user_success']); ?>
        </script>
    <?php };?>


<div class="p-4 sm:ml-64">
   <p class="text-3xl mb-3 font-semibold">Resumen</p>
<div class="grid grid-cols-1 gap-3">
<div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
  <div class="flex justify-between">
    <?php foreach ($dasVentasDiarias as $item):?>
    <div>
      <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2"> <?php echo "$ ".number_format($item->total_ventas, 0, '.', ',');?></h5>
      <p class="text-base font-normal text-gray-500 dark:text-gray-400">Ventas realizadas</p>
    </div>
    <div
      class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
      <?php echo $item->cantidad_ventas;?>
      <svg class="w-3 h-3 ms-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
</svg>
    </div>
    <?php endforeach?>
  </div>
  <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
    <div class="flex justify-end items-center pt-2">
      <p
      
        class="uppercase text-md font-semibold inline-flex items-center rounded-lg text-blue-600  bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
        Ventas diarias
      </p>
    </div>
  </div>
</div>

<div class="grid grid-cols-3 gap-3">
<div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
  <div class="flex justify-between">
    <?php foreach ($dasVentasDiariasEfectivo as $item):?>
    <div>
      <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2"> <?php echo "$ ".number_format($item->total_ventas, 0, '.', ',');?></h5>
      <p class="text-base font-normal text-gray-500 dark:text-gray-400">Ventas en efectivo</p>
    </div>
    <div
      class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
      <?php echo $item->cantidad_ventas;?>
      <svg class="w-3 h-3 ms-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
</svg>
    </div>
    <?php endforeach?>
  </div>
  <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
    <div class="flex justify-end items-center pt-2">
      <p
      
        class="uppercase text-md font-semibold inline-flex items-center rounded-lg text-blue-600  bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
        Ventas en efectivo
      </p>
    </div>
  </div>
</div>

<div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
  <div class="flex justify-between">
    <?php foreach ($dasVentasDiariasTarjeta as $item):?>
    <div>
        <?php if(!$item->cantidad_ventas == 0): ?>
      <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2"> <?php echo "$ ".number_format($item->total_ventas, 0, '.', ',');?></h5>
      <p class="text-base font-normal text-gray-500 dark:text-gray-400">Ventas en tarjeta</p>
    </div>
    <div
      class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
      <?php echo $item->cantidad_ventas;?>
      <svg class="w-3 h-3 ms-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
</svg>
    </div>
    <?php else:?>
        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">No hay ventas</h5>
      <p class="text-base font-normal text-gray-500 dark:text-gray-400">Ventas en tarjeta</p>
    </div>
    <div
      class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
      0
      <svg class="w-3 h-3 ms-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
</svg>
    </div>
    <?php endif?>
    <?php endforeach?>
  </div>
  <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
    <div class="flex justify-end items-center pt-2">
      <p
      
        class="uppercase text-md font-semibold inline-flex items-center rounded-lg text-blue-600  bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
        Ventas en tarjetas
      </p>
    </div>
  </div>
</div>

<div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
  <div class="flex justify-between">
    <?php foreach ($dasVentasDiariasCredito as $item):?>
    <div>
        <?php if(!$item->cantidad_ventas == 0): ?>
      <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2"> <?php echo "$ ".number_format($item->total_ventas, 0, '.', ',');?></h5>
      <p class="text-base font-normal text-gray-500 dark:text-gray-400">Ventas en crédito</p>
    </div>
    <div
      class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
      <?php echo $item->cantidad_ventas;?>
      <svg class="w-3 h-3 ms-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
</svg>
    </div>
    <?php else:?>
        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">No hay ventas</h5>
      <p class="text-base font-normal text-gray-500 dark:text-gray-400">Ventas en crédito</p>
    </div>
    <div
      class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
      0
      <svg class="w-3 h-3 ms-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
</svg>
    </div>
    <?php endif;?>
    <?php endforeach?>
  </div>
  <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
    <div class="flex justify-end items-center pt-2">
      <p
      
        class="uppercase text-md font-semibold inline-flex items-center rounded-lg text-blue-600  bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
        Ventas en crédito
      </p>
    </div>
  </div>
</div>

</div>
</div>
</div>


<?php require 'partials/footer.php'; ?>