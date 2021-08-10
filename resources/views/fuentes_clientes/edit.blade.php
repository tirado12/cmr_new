@extends('layouts.plantilla')
@section('title','Editar Fuente financiamiento')
@section('contenido')

<div class="flex flex-row mb-4">
<svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
</svg>
<h1 class="font-bold text-xl ml-2">Editar Fuente financiamiento</h1>
</div>


<div class="mt-10 sm:mt-0 shadow-2xl bg-white rounded-lg">
      
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ route('fuenteCliente.update', $fuenteCliente) }}" method="POST" id="formulario" name="formulario">
          @csrf
          @method('PUT')
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6"> 
              <div class="grid grid-cols-6 gap-6">

                <div class="col-span-6 sm:col-span-3">
                  <label for="first_name" class="block text-sm font-medium text-gray-700">Municipio *</label>
                  <input type="text" name="municipio" id="municipio" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $cliente[0]->nombre }}" disabled>
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label id="label_monto_proyectado" for="monto_proyectado" class="block text-sm font-medium text-gray-700">Monto proyectado *</label>
                  <input type="number" name="monto_proyectado" id="monto_proyectado" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md myDIV" value="{{ $fuenteCliente->monto_proyectado }}">
                  <label id="error_monto_proyectado" name="error_monto_proyectado" class="hidden text-base font-normal text-red-500" >Introduzca un monto proyectado</label>
                </div>
                
                <div class="col-span-6 sm:col-span-3">
                    <label id="label_monto_comprometido" for="monto_comprometido" class="block text-sm font-medium text-gray-700">Monto comprometido *</label>
                    <input type="number" name="monto_comprometido" id="monto_comprometido" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md myDIV" value="{{ $fuenteCliente->monto_comprometido }}">
                    <label id="error_monto_comprometido" name="error_monto_comprometido" class="hidden text-base font-normal text-red-500" >Introduzca un monto comprometido</label>
                </div>
                  
                <div class="col-span-6 sm:col-span-3">
                    <label for="ejercicio" class="block text-sm font-medium text-gray-700">Ejercicio *</label>
                    <input type="text" name="ejercicio" id="ejercicio" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $fuenteCliente->ejercicio }}" disabled>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label id="label_acta_integracion_consejo" for="acta_integracion_consejo" class="block text-sm font-medium text-gray-700">Acta de integracion de consejo *</label>
                    <input type="date" name="acta_integracion_consejo" id="acta_integracion_consejo" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $fuenteCliente->acta_integracion_consejo }}">
                    <label id="error_acta_integracion_consejo" name="error_acta_integracion_consejo" class="hidden text-base font-normal text-red-500" >Introduzca una fecha</label>
                </div>
                
                <div class="col-span-6 sm:col-span-3">
                    <label id="label_acta_priorizacion" for="acta_priorizacion" class="block text-sm font-medium text-gray-700">Acta priorización *</label>
                    <input type="date" name="acta_priorizacion" id="acta_priorizacion" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $fuenteCliente->acta_priorizacion }}">
                    <label id="error_acta_priorizacion" name="error_acta_priorizacion" class="hidden text-base font-normal text-red-500" >Introduzca una fecha</label>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label id="label_adendum_priorizacion" for="adendum_priorizacion" class="block text-sm font-medium text-gray-700">Adendum priorización *</label>
                    <input type="date" name="adendum_priorizacion" id="adendum_priorizacion" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $fuenteCliente->adendum_priorizacion }}">
                    <label id="error_adendum_priorizacion" name="error_adendum_priorizacion" class="hidden text-base font-normal text-red-500" >Introduzca una fecha</label>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label id="label_fuente_financiamiento_id" for="fuente_financiamiento_id" class="block text-sm font-medium text-gray-700">Fuente de financiamiento *</label>
                    <select id="fuente_financiamiento_id" name="fuente_financiamiento_id" class="clickable mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >                
                      <option value="0"> Elija una opción </option>
                      @foreach($fuentes as $fuente)
                        <option value="{{ $fuente->id_fuente_financiamiento }}" {{ ($fuente->id_fuente_financiamiento == $fuenteCliente->fuente_financiamiento_id) ? 'selected' : '' }}> {{ $fuente->nombre_corto }} </option>
                        @endforeach
                    </select>
                    <label id="error_fuente_financiamiento_id" name="error_fuente_financiamiento_id" class="hidden text-base font-normal text-red-500" >Se requiere una opción</label>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label id="label_prodim" for="prodim" class="block text-sm font-medium text-gray-700">Prodim *</label>
                    <select id="prodim" name="prodim" class="clickable mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">                
                      <option value="0"> Elija una opción </option>
                      <option value="1"> Terminado </option>
                      <option value="2"> Pendiente </option>
                    </select>
                    <label id="error_prodim" name="error_prodim" class="hidden text-base font-normal text-red-500" >Se requiere una opción</label>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label id="label_gastos_indirectos" for="gastos_indirectos" class="block text-sm font-medium text-gray-700">Gastos indirectos *</label>
                    <select id="gastos_indirectos" name="gastos_indirectos" class="clickable mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">                
                      <option value="0"> Elija una opción </option>
                      <option value="1"> Terminado </option>
                      <option value="2"> Pendiente </option>
                      <option value="3"> No aplica </option>
                    </select>
                    <label id="error_gastos_indirectos" name="error_gastos_indirectos" class="hidden text-base font-normal text-red-500" >se requiere una opción</label>
                </div>
                
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-100 sm:px-6">
              <span class="block text-xs">Porfavor verifique que todos los campos marcados con ( * ) esten rellenados</span>
              <div class="text-right">
                <a type="button" href="{{route('fuenteCliente.index')}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-500 hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
    
//colocar opcion registrada en los selected
    $(document).ready(function(){
      var statusProdim =  '{{ $fuenteCliente->prodim }}';
      var statusGastos =  '{{ $fuenteCliente->gastos_indirectos }}';
      $("#prodim option").each(function(){
        if($(this).val() == statusProdim){
        	   $(this).attr("selected",true);
        }
    	});
      $("#gastos_indirectos option").each(function(){
        
        if($(this).val() == statusGastos){
        	   $(this).attr("selected",true);
        }else if (statusGastos != '1' && statusGastos != '3' && statusGastos != '2'){
          $("#gastos_indirectos option[value='0']").attr("selected", true);
        }
    	});      
    });

//validacion de campos del modal
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
      //console.log(valor);
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
  
  
  
@endsection