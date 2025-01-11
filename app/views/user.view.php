
<? require 'partials/header.php'; ?>
<? include 'components/navbar.php'; 
session_start();
?>
<?php if (isset($_SESSION['user_error'])) { ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "Advertencia!!",
                text: '<?php echo $_SESSION['user_error']; ?>'
                });
            // Eliminar el mensaje de sesión
            <?php unset($_SESSION['user_error']); ?>
        </script>
    <?php };?>

<div class="p-4 sm:ml-64">
<p class="text-5xl text-center font-semibold">Registro nuevo usuario</p>
<form class="max-w-sm mx-auto mt-10 border-2 border-gray-300 p-5 rounded-lg shadow-xl" action="/user/store" method="POST">
  <div class="mb-4">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
    <input type="text" id="nombre" name="nombre" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ingesa tu nombre" required />
  </div>
  <div class="mb-4">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Apellido</label>
    <input type="text" id="nombre" name="apellido" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ingesa tu apellido" required />
  </div>
  <div class="mb-4">
    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 
    ">Contraseña</label>
    <input type="password" id="password" name="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ingresa tu nueva contraseña" required />
  </div>
  <div class="mb-4">
    <label for="repeat-password"  class="block mb-2 text-sm font-medium text-gray-900 ">Repetir contraseña</label>
    <input type="password" id="repeat-password" name="repeat_password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Vuelve a escribir la contraseña" required />
  </div>
  <div class="mb-4">
  <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Seleccionar el cargo</label>
  <select id="countries" name="id_rol" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
    <option selected>Elije uno ...</option>
    <? foreach ($data as $item){ ?>
    <option value="<? echo $item->id?>"> <? echo $item->rol?></option>
    <? }?>
  </select>
  </div>
  <input type="text" hidden name="estado" value="activo">
  <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Registra nueva cuenta</button>
</form>

</div>
<? require 'partials/footer.php'; ?>