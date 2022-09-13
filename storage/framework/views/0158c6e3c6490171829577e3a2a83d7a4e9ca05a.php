
<?php $__env->startSection('title','Perfil'); ?>
<?php $__env->startSection('contenido'); ?>

           
   


<div class="mt-4 shadow-2xl bg-white rounded-lg p-4 ">
    <div class="flex md:h-80 sm:h-120 rounded-lg ">
        <div class="flex items-center justify-center w-full">
            <div class="grid grid-cols-3 sm:grid-cols-1 md:grid-cols-3 lg:w-full">
            
                <div class="grid justify-items-center rounded-md col-span-1 bg-gray-100">
                    <img src="<?php echo e($user->img); ?>" class="block w-40 h-40 rounded-full mt-4 border-2 border-blue-900 shadow-2xl" alt="">
                    <div class="grid grid-cols-2 justify-items-center">
                        
                        
                  <div class="col-span-4">
                    <div class="custom-input-file text-blue-500">
                      <input type="file" id="file" name="file" class="input-file" accept="image/png, image/jpeg" value="" hidden>
                      Examinar archivos
                    </div>
                    <input type="text" name="logo_text" id="logo_text" autocomplete="email" class="hidden focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="">
                    
                  </div>
                        
                    </div>
                    <label for="" class="block text-lg font-semibold"><?php echo e($user->name); ?></label>
                    <label for="" class="text-lg "><?php echo e($user->area); ?></label>
                </div>

                <div class="col-span-2 rounded-md">
                    <div class="grid grid-cols-2 gap-6 p-6 w-full ">
                        <div class="w-full">
                            <label for="" class="block">Nombre</label>
                            <input type="text" class="bg-gray-100 border-gray-200 hover:border-blue-800 focus:border-blue-800 rounded w-full" value="<?php echo e($user->name); ?>">
                        </div>
                        <div>
                            <label for="" class="block">Email</label>
                            <input type="text" class="bg-gray-100 hover:bg-white border-gray-200 hover:border-blue-800 focus:border-blue-800 rounded w-full" value="<?php echo e($user->email); ?>">
                        </div>
                        <div>
                            <label for="" class="block">Area</label>
                            <input type="text" class="bg-gray-100 border-gray-200 hover:border-blue-800 focus:border-blue-800 rounded w-full" value="<?php echo e($user->area); ?>">
                        </div>
                        <div>
                            <label for="" class="block">Contraseña</label>
                            <input type="password" class="bg-gray-100 border-gray-200 hover:border-blue-800 focus:border-blue-800 rounded w-full">
                        </div>
                    </div>
                    
                    <div class="text-right mt-6 p-4">
                        <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="">
                          Cancelar
                        </button>
                        <button type="submit" id="guardar" class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" >
                          Guardar
                        </button>
                      </div>
                </div>

            </div>
        </div>
        
    </div>

    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Nueva carpeta (2)\CMR\Sistema\cmr_app\resources\views/perfil/index.blade.php ENDPATH**/ ?>