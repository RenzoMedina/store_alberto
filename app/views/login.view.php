<? require 'partials/header.php'; 
  
?>

<div class="absolute inset-0 -z-10 h-full w-full items-center px-5 py-24 [background:radial-gradient(125%_125%_at_50%_10%,#000_40%,#63e_100%)]">
<form class="max-w-sm mx-auto mt-10" action="/user/login" method="POST" >
<div class="mb-5">
    <p class="text-white text-5xl text-center uppercase">Inicia Sesión</p>
  </div>
  <div class="mb-3">
    <label for="text" class="block text-sm mb-2 font-medium text-gray-900 dark:text-white">You user</label>
    <input type="text" id="nombre" name="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ingrese su usuario" required />
  </div>
  <div class="mb-3">
    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
    <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ingrese su contraseña" required />
  </div>
  <div class="flex items-start mb-5">
    <div class="flex items-center h-5">
      <a href="#" class="hover:text-blue-600 text-white">Olvidaste tu contraseña?</a>
    </div>
  </div>
  <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
</form>
</div>
<? require 'partials/footer.php';?>
