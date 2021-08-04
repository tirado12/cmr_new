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
        <form action="{{ route('fuenteCliente.update', $fuenteCliente) }}" method="POST">
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
                  <label for="monto_proyectado" class="block text-sm font-medium text-gray-700">Monto proyectado *</label>
                  <input type="number" name="monto_proyectado" id="monto_proyectado" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md myDIV" value="{{ $fuenteCliente->monto_proyectado }}">
                </div>
                
                <div class="col-span-6 sm:col-span-3">
                    <label for="monto_comprometido" class="block text-sm font-medium text-gray-700">Monto comprometido *</label>
                    <input type="number" name="monto_comprometido" id="monto_comprometido" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md myDIV" value="{{ $fuenteCliente->monto_comprometido }}">
                </div>
                  
                <div class="col-span-6 sm:col-span-3">
                    <label for="ejercicio" class="block text-sm font-medium text-gray-700">Ejercicio *</label>
                    <input type="text" name="ejercicio" id="ejercicio" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $fuenteCliente->ejercicio }}" disabled>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="acta_integracion_consejo" class="block text-sm font-medium text-gray-700">Acta de integracion de consejo *</label>
                    <input type="date" name="acta_integracion_consejo" id="acta_integracion_consejo" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $fuenteCliente->acta_integracion_consejo }}">
                </div>
                
                <div class="col-span-6 sm:col-span-3">
                    <label for="acta_priorizacion" class="block text-sm font-medium text-gray-700">Acta priorización *</label>
                    <input type="date" name="acta_priorizacion" id="acta_priorizacion" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $fuenteCliente->acta_priorizacion }}">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="adendum_priorizacion" class="block text-sm font-medium text-gray-700">Adendum priorización *</label>
                    <input type="date" name="adendum_priorizacion" id="adendum_priorizacion" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $fuenteCliente->adendum_priorizacion }}">
                  </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="fuente_financiamiento_id" class="block text-sm font-medium text-gray-700">Fuente de financiamiento *</label>
                    <select id="fuente_financiamiento_id" name="fuente_financiamiento_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >                
                      @foreach($fuentes as $fuente)
                        <option value="{{ $fuente->id_fuente_financiamiento }}" {{ ($fuente->id_fuente_financiamiento == $fuenteCliente->fuente_financiamiento_id) ? 'selected' : '' }}> {{ $fuente->nombre_corto }} </option>
                        @endforeach
                    </select>
                    
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="prodim" class="block text-sm font-medium text-gray-700">Prodim *</label>
                    <select id="prodim" name="prodim" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">                
                      <option value="0"> Elija una opción </option>
                      <option value="1"> Terminado </option>
                      <option value="2"> Pendiente </option>
                     
                    </select>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="gastos_indirectos" class="block text-sm font-medium text-gray-700">Gastos indirectos *</label>
                    <select id="gastos_indirectos" name="gastos_indirectos" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">                
                      <option value="0"> Elija una opción </option>
                      <option value="1"> Terminado </option>
                      <option value="2"> Pendiente </option>
                      <option value="3"> No aplica </option>
                    </select>
                </div>
                
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-100 sm:px-6">
              <span class="block text-xs">Porfavor verifique que todos los campos marcados con ( * ) esten rellenados</span>
              <div class="text-right">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-orange-800 hover:bg-orange-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Guardar
              </button>
              
              </div>
            </div>
          </div>
        </form>
      </div>
      
  </div>

  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>  
  <script>
    

    $(document).ready(function(){
      var statusProdim =  '{{ $fuenteCliente->prodim }}';
      var statusGastos =  '{{ $fuenteCliente->gastos_indirectos }}';
      //console.log(statusProdim);
      console.log(statusGastos);
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
  </script>
  
  
  
@endsection