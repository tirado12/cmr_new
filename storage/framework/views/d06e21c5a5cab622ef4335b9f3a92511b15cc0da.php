
<?php $__env->startSection('title','Editar Personal del Cabildo'); ?>
<?php $__env->startSection('contenido'); ?>

<div class="flex flex-row mb-4">
<svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
</svg>
<h1 class="font-bold text-xl ml-2">Editar Integrante de Cabildo</h1>
</div>



<div class="mt-10 sm:mt-0 shadow-2xl bg-white rounded-lg">
      
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="<?php echo e(route('cabildo.update', $integrante)); ?>" method="POST" id="formulario" name="formulario">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6"> 
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="first_name" class="block text-normal font-base text-gray-500">Nombre *</label>
                  <input type="text" name="nombre" id="nombre" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="<?php echo e($integrante->nombre); ?>">
                  <label id="error_nombre" name="error_nombre" class="hidden text-base font-normal text-red-500" >Introduzca un nombre</label>
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="cargo" class="block text-sm font-medium text-gray-700">Cargo *</label>
                  <input type="text" name="cargo" id="cargo" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="<?php echo e($integrante->cargo); ?>">
                  <label id="error_cargo" name="error_cargo" class="hidden text-base font-normal text-red-500" >Introduzca un cargo</label>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="telefono" class="block text-sm font-medium text-gray-700">Telefono *</label>
                    <input type="tel" name="telefono" id="telefono"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="<?php echo e($integrante->telefono); ?>">
                    <label id="error_telefono" name="error_telefono" class="hidden text-base font-normal text-red-500" >Introduzca un telefono</label>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="Correo" class="block text-sm font-medium text-gray-700">Correo *</label>
                    <input type="email" name="correo" id="correo" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="<?php echo e($integrante->correo); ?>">
                    <label id="error_correo" name="error_correo" class="hidden text-base font-normal text-red-500" >Introduzca un correo valido</label>
                </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="rfc" class="block text-sm font-medium text-gray-700">RFC *</label>
                    <input type="text" name="rfc" id="rfc"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="<?php echo e($integrante->rfc); ?>">
                    <label id="error_rfc" name="error_rfc" class="hidden text-base font-normal text-red-500" >Introduzca al menos un RFC generico de 5 caracteres</label>
                  </div>
                
                
                <div class="col-span-6 sm:col-span-3">
                  <label for="cliente" class="block text-sm font-medium text-gray-700">Municipio *</label>
                  <select id="cliente" name="cliente" onchange="validarMunicipio()" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <?php if(auth()->check() && auth()->user()->hasRole('Administrador')): ?>
                    <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($cliente->id_cliente); ?>" <?php echo e(($cliente->id_cliente == $integrante->cliente_id) ? 'selected' : ''); ?>> <?php echo e($cliente->municipio->nombre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <?php if(auth()->check() && auth()->user()->hasRole('Usuario')): ?>
                      <option value="<?php echo e($cliente->id_cliente); ?>" selected> <?php echo e($cliente->nombre); ?></option>
                    <?php endif; ?>
                  </select>
                  <label id="error_municipio" name="error_municipio" class="hidden text-base font-normal text-red-500" >Elija un municipio</label>
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
//Validacion de select municipio
function validarMunicipio() {
  var valor = document.getElementById("municipio").value;
  if(valor != ''){
    $('#error_municipio').fadeOut();
    $("#label_municipio").removeClass('text-red-500');
    $("#label_municipio").addClass('text-gray-700');
  }else{
    $('#error_municipio').fadeIn();
    $("#label_municipio").addClass('text-red-500');
    $("#label_municipio").removeClass('text-gray-700');
  }
}

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
  });

    //validacion del formulario con el btn guardar
$().ready(function() {
  $("#formulario").validate({
    onfocusout: false,
    onclick: false,
		rules: {
      nombre: { required: true},
			cargo: { required: true},
      telefono: { required: true},
      correo: { required: true, email: true},
      rfc: { required: true, minlength: 5},
      municipio: { required: true},
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
<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Nueva carpeta (2)\CMR\Sistema\cmr_app\resources\views/cabildo/edit.blade.php ENDPATH**/ ?>