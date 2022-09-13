<div class="p-6 w-58  bg-blue-cmr1 min-h-full"   x-show="sidebar"  @click.away="sidebar = false" role="menu"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-90">
                    
                    <div class="divide-y ">
                        
                        <div class="flex-1 flex items-center justify-center sm:items-stretch mb-4">
                            <div class="flex-shrink-0 flex items-center">
                                <a href="<?php echo e(route('dashboard')); ?>"><img class="block lg:hidden h-10 w-auto" src="<?php echo e(asset('image/CMR logo blanco.png')); ?>" alt="Workflow"></a>
                                <a href="<?php echo e(route('dashboard')); ?>"><img class="hidden lg:block h-10 w-auto" src="<?php echo e(asset('image/CMR logo blanco.png')); ?>" alt="Workflow"></a>
                            </div>
                        </div>
                        <div class="mb-4"></div>
                        
                    </div>
                    <div class="">
                    <h6 class="font-bold mb-2 text-white">Acciones Rapidas</h6>
                        <ul>
                           <li><a type="button" class="p-4 text-white rounded-md hover:bg-gray-800 w-full cursor-pointer" href="<?php echo e(route('dashboard')); ?>"><i class="fas fa-home"></i> Inicio</a></li>
                            <li>
                                <a class="p-4 flex flex-row hover:bg-gray-800 rounded-md cursor-pointer text-white" href="<?php echo e(route('gastosIndirectos.index')); ?>">
                                    <svg  class="mr-1 text-white h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                                    </svg>
                                    Gastos Indirectos
                                </a>
                            </li>
                            <?php if(auth()->check() && auth()->user()->hasRole('Administrador')): ?>
                            <li><a type="button" class="p-4 text-white rounded-md hover:bg-gray-800 w-full cursor-pointer" href="<?php echo e(route('admin.users.index')); ?>"><i class="fas fa-users"></i> Usuarios</a>
                            <?php endif; ?>
                        </ul>
                    <h6 class="font-bold mb-2 text-white">Configuracion</h6>
                        <ul>
                            <li class="p-4 text-white rounded-md hover:bg-gray-800 cursor-pointer"><i class="fas fa-user"></i> Perfil</li>
                            <li class="p-4 text-white rounded-md hover:bg-gray-800 cursor-pointer"><i class="fas fa-tools"></i> Ajustes</li>
                            
                        </ul>
                    </div>
</div><?php /**PATH D:\Documentos\CMR\Creatividad\Sistema\cmr_app\resources\views/componentes/sidebar.blade.php ENDPATH**/ ?>