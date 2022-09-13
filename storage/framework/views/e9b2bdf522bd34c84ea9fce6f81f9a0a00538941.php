
<?php $__env->startSection('title','Editar Fuentes Gastos Indirectos'); ?>
<?php $__env->startSection('contenido'); ?>

<div class="flex flex-row mb-4">
<svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
</svg>
<h1 class="font-bold text-xl ml-2">Editar fuente gastos indirectos</h1>
</div>


<div class="mt-10 sm:mt-0 shadow-2xl bg-white rounded-lg">
      
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="<?php echo e(route('gastosIndirectosFuentes.update', $gastoIndirecto->id_fuentes_gastos_indirectos)); ?>" method="POST" id="formulario" name="formulario">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6"> 
              <div class="grid grid-cols-6 gap-6">
                
                <div class="col-span-6 sm:col-span-3">
                  <label for="first_name" class="block text-sm font-medium text-gray-700">Municipio *</label>
                  <input type="text" name="municipio" id="municipio" autocomplete="given-name" class="mt-1 focus:ring-gray-500 focus:border-gray-500 bg-gray-100 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="<?php echo e($gastoIndirecto->nombre); ?>" disabled>
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label id="label_ejercicio" for="ejercicio" class="block text-sm font-medium text-gray-700">Ejercicio *</label>
                  <input type="number" name="ejercicio" id="ejercicio" class="mt-1 focus:ring-gray-500 focus:border-gray-500 bg-gray-100 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md myDIV" value="<?php echo e($gastoIndirecto->ejercicio); ?>" disabled>
                  <label id="error_ejercicio" name="error_ejercicio" class="hidden text-base font-normal text-red-500" >Introduzca un monto proyectado</label>
                </div>
                
                <div class="col-span-6 sm:col-span-3">
                    <label id="label_fuente_financiamiento" for="fuente_financiamiento" class="block text-sm font-medium text-gray-700">Fuente financiamiento *</label>
                    <input type="text" name="fuente_financiamiento" id="fuente_financiamiento" class="mt-1 focus:ring-gray-500 focus:border-gray-500 bg-gray-100 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md myDIV" value="<?php echo e($gastoIndirecto->nombre_corto); ?>" disabled>
                    <label id="error_fuente_financiamiento" name="error_fuente_financiamiento" class="hidden text-base font-normal text-red-500" >Introduzca un monto comprometido</label>
                </div>
                  
                <div class="col-span-6 sm:col-span-3">
                    <label id="label_indirectos_id" for="indirectos_id" class="block text-sm font-medium text-gray-700">Gasto *</label>
                    <select id="indirectos_id" name="indirectos_id" class="clickable mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm">
                      <option value="0"> Elija una opción </option>
                      <?php $__currentLoopData = $indirectos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                      <option value='<?php echo e($item->id_indirectos); ?>' <?php echo e(($gastoIndirecto->indirectos_id == $item->id_indirectos) ? 'selected' : ''); ?>>
                          <?php echo e($item->nombre); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <label id="error_indirectos_id" name="error_indirectos_id" class="hidden text-base font-normal text-red-500" >Introduzca un gasto</label>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label id="label_monto" for="monto" class="block text-sm font-medium text-gray-700">Monto *</label>
                    <input type="number" name="monto" id="monto" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="<?php echo e($gastoIndirecto->monto); ?>">
                    <label id="error_monto" name="error_monto" class="hidden text-base font-normal text-red-500" >Introduzca una monto</label>
                </div>
                
              </div>

            </div>
            <div class="px-4 py-3 bg-gray-100 sm:px-6">
              <span class="block text-xs">Porfavor verifique que todos los campos marcados con ( * ) esten rellenados</span>
              <div class="text-right">
                <a type="button" href="<?php echo e(redirect()->getUrlGenerator()->previous()); ?>" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-500 hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Regresar
                </a>
              <button type="submit" class="ml-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-orange-800 hover:bg-orange-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Guardar
              </button>
              
              </div>
            </div>
          </div>
        </form>
      </div>
      
  </div>

  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>    
  <script>
    

//validacion de campos del formulario
$(document).ready(function() {
   $("#formulario input").keyup(function() {
  //console.log($(this).attr('id'));
      var monto = $(this).val();
      
      if(monto != ''){
      $('#error_'+$(this).attr('id')).fadeOut();
      $("#label_"+$(this).attr('id')).removeClass('text-red-500');
      $("#label_"+$(this).attr('id')).addClass('text-gray-700');
      //$('#guardar').removeAttr("disabled");
      }
      else{
      //$("#guardar").attr("disabled", true);
      $('#error_'+$(this).attr('id')).fadeIn();
      $("#label_"+$(this).attr('id')).addClass('text-red-500');
      $("#label_"+$(this).attr('id')).removeClass('text-gray-700');
      }
    
    });

//validacion de los selected
    $('.clickable').click(function() {
      var valor = $(this).val();
      
      if(valor != 0){
      $('#error_'+$(this).attr('id')).fadeOut();
      $("#label_"+$(this).attr('id')).removeClass('text-red-500');
      $("#label_"+$(this).attr('id')).addClass('text-gray-700');
      //$('#guardar').removeAttr("disabled");
      }else{
      //$("#guardar").attr("disabled", true);
      $('#error_'+$(this).attr('id')).fadeIn();
      $("#label_"+$(this).attr('id')).addClass('text-red-500');
      $("#label_"+$(this).attr('id')).removeClass('text-gray-700');
      }
  });
});

//validacion del formulario con el btn guardar
$().ready(function() {
  $("#formulario").validate({
    onfocusout: false,
    onclick: false,
		rules: {
      municipio: { required: true},
			monto_proyectado: { required: true},
      monto_comprometido: { required: true},
      ejercicio: { required: true},
      acta_integracion_consejo: { required: true},
      acta_priorizacion: { required: true},
      adendum_priorizacion: { required: true},
      fuente_financiamiento_id: { required: true},
      prodim: { required: true},
      gastos_indirectos: { required: true},
		},
    errorPlacement: function(error, element) {
      if(error != null){
      $('#error_'+element.attr('id')).fadeIn();
      }else{
        $('#error_'+element.attr('id')).fadeOut();
      }
     // console.log(element.attr('id'));
    },
	}); 
});
  </script>
  
  
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Nueva carpeta (2)\CMR\Sistema\cmr_app\resources\views/fuentes_gastos/edit.blade.php ENDPATH**/ ?>