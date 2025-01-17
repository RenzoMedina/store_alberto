<?php require 'partials/header.php'; ?>
<?php include 'components/navbar.php'; ?>
<div class="p-4 sm:ml-64">
   <p class="text-2xl font-semibold mb-3">Reportes visuales de ventas, crédito y pagos diarios</p>
   <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Card 1 - Efectivo -->
            <div class="duration-300 font-mono relative overflow-hidden w-72 h-72 rounded-3xl p-6 bg-gradient-to-br from-white to-gray-100 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all">
                <div class="flex items-center gap-3 mb-6">
                    <div class="p-2 rounded-full bg-blue-500/10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             class="size-7 stroke-blue-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                        </svg>
                    </div>
                    <h1 class="text-2xl font-semibold text-gray-800">Efectivo</h1>
                </div>
       
                <div class="space-y-8">
                <?php foreach($reporteEfectivo as $item) : ?>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-500">Balance total</p>
                        <p class="text-5xl font-bold text-gray-800"> <?php echo "$ ".number_format($item->total_valor, 0, '.', ',');?></p>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-500">Última actualización</p>
                        <p class="text-lg text-gray-700"><?php echo $item->fecha;?></p>
                    </div>
                    <?php endforeach ?>
                </div>
                <div class="absolute -right-6 -top-6 w-24 h-24 bg-blue-500/10 rounded-full blur-2xl"></div>
                <div class="absolute -left-6 -bottom-6 w-24 h-24 bg-blue-500/10 rounded-full blur-2xl"></div>
            </div>
    
            <!-- Card 2 - Tarjeta de Crédito -->
            <div class="duration-300 font-mono relative overflow-hidden w-72 h-72 rounded-3xl p-6 bg-gradient-to-br from-white to-gray-100 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all">
                <div class="flex items-center gap-3 mb-6">
                    <div class="p-2 rounded-full bg-purple-500/10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             class="size-7 stroke-purple-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                        </svg>
                    </div>
                    <h1 class="text-2xl font-semibold text-gray-800">Tarjeta</h1>
                </div>
       
                <div class="space-y-8">
                <?php foreach($reporteTarjeta as $item) : ?>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-500">Balance total</p>
                        <p class="text-5xl font-bold text-gray-800"><?php echo "$ ".number_format($item->total_valor, 0, '.', ',');?></p>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-500">Última actualización</p>
                        <p class="text-lg text-gray-700"><?php echo $item->fecha;?></p>
                    </div>
                    <?php endforeach ?>
                </div>
                <div class="absolute -right-6 -top-6 w-24 h-24 bg-purple-500/10 rounded-full blur-2xl"></div>
                <div class="absolute -left-6 -bottom-6 w-24 h-24 bg-purple-500/10 rounded-full blur-2xl"></div>
            </div>
    
            <!-- Card 3 - Inversiones -->
            <div class="duration-300 font-mono relative overflow-hidden w-72 h-72 rounded-3xl p-6 bg-gradient-to-br from-white to-gray-100 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all">
                <div class="flex items-center gap-3 mb-6">
                    <div class="p-2 rounded-full bg-green-500/10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-green-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                          </svg>
                          
                    </div>
                    <h1 class="text-2xl font-semibold text-gray-800">Credito</h1>
                </div>
       
                <div class="space-y-8">
                <?php foreach($reporteCredito as $item) : ?>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-500">Balance total</p>
                        <p class="text-5xl font-bold text-gray-800"><?php echo "$ ".number_format($item->total_valor, 0, '.', ',');?></p></p>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-500">Última actualización</p>
                        <p class="text-lg text-gray-700"><?php echo $item->fecha;?></p>
                    </div>
                    <?php endforeach ?>
                </div>
                <div class="absolute -right-6 -top-6 w-24 h-24 bg-green-500/10 rounded-full blur-2xl"></div>
                <div class="absolute -left-6 -bottom-6 w-24 h-24 bg-green-500/10 rounded-full blur-2xl"></div>
            </div>
    
            <!-- Card 4 - Crypto -->
            <div class="duration-300 font-mono relative overflow-hidden w-72 h-72 rounded-3xl p-6 bg-gradient-to-br from-white to-gray-100 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all">
                <div class="flex items-center gap-3 mb-6">
                    <div class="p-2 rounded-full bg-yellow-500/10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-yellow-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                          </svg>
                          
                    </div>
                    <h1 class="text-2xl font-semibold text-gray-800">Proveedores</h1>
                </div>

                <div class="space-y-8">
                <?php foreach($reportePagoProveedor as $item) : ?>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-500">Balance total</p>
                        <p class="text-5xl font-bold text-gray-800"> <?php echo "$ ".number_format($item->suma_dia, 0, '.', ',');?></p>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-500">Última actualización</p>
                        <p class="text-lg text-gray-700"><?php echo $item->fecha;?></p>
                    </div>
                    <?php endforeach ?>
                </div>
                <div class="absolute -right-6 -top-6 w-24 h-24 bg-yellow-500/10 rounded-full blur-2xl"></div>
                <div class="absolute -left-6 -bottom-6 w-24 h-24 bg-yellow-500/10 rounded-full blur-2xl"></div>
            </div>
        </div>
    </div>
</div>
<?php require 'partials/footer.php'; ?>