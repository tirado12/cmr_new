@extends('layouts.plantilla')
@section('title','Sisplade')
@section('contenido')
<link rel="stylesheet" href="{{ asset('css/datatable.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/style_alert.css') }}">
<!--Responsive Extension Datatables CSS-->
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">

<div class="flex flex-row">
    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
    </svg>
  <h1 class="text-xl font-bold ml-2">Lista Sisplade</h1>
</div>

<div class="flex flex-col mt-6">
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <a href="{{route('sisplade.create')}}"><button class="bg-orange-800 mb-4 text-white active:bg-orange-800 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" >
        Agregar
        </button></a>
    </div>
</div>

<!-- fin tabla tailwind, inicio data table -->
<div class="mt-6 contenedor p-8 shadow-2xl bg-white rounded-lg">

    <table id="example" class="table table-striped bg-white" style="width:100%;">
      <thead>
          <tr>
              <th>Municipio</th>
              <th>F. Financiamiento</th>
              <th>Capturado</th>
              <th>Fecha de Captura</th>
              <th>Validación</th>
              <th>Fecha de Validación</th>
              <th class="flex justify-center">Acción</th>
              
          </tr>
      </thead>
      <tbody> 
      @foreach ($sisplade as $item)
          
          <tr>
              <td>
                <div class="text-sm leading-5 font-medium text-gray-900 flex justify-center">
                  {{$clientes->find($item->fuentesCliente->cliente_id)->nombre}}
                </div>
              </td>
             <td>
                <div class="text-sm leading-5 font-medium text-gray-900 myDIV flex justify-center">
                 {{$fuentes->find($item->fuentesCliente->fuente_financiamiento_id)->nombre_corto}}
                </div>
              </td>
              <td>
                <div class="text-sm leading-5 font-medium text-gray-900 flex justify-center" id="capturado">
                    <span id="ver_prodim" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ ($item->capturado == 1 ? " bg-green-100 text-green-800" : "bg-yellow-100 text-yellow-800" ) }}">{{ ($item->capturado == 1 ? "Capturado" : "Sin Capturar" ) }}</span>
                </div>
              </td>
              <td>
                <div class="text-sm leading-5 font-medium text-gray-900 flex justify-center">
                    {{$item->fecha_capturado}}
                </div>
              </td>
              <td>
                <div class="text-sm leading-5 font-medium text-gray-900 flex justify-center" id="validacion">
                    <span id="ver_prodim" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ ($item->validado == 1 ? " bg-green-100 text-green-800" : "bg-yellow-100 text-yellow-800" ) }}">{{ ($item->validado == 1 ? "Validado" : "Sin Validar" ) }}</span>
                </div>
              </td>
              <td>
                <div class="text-sm leading-5 font-medium text-gray-900 flex justify-center">
                   {{$item->fecha_validado}}
                </div>
              </td>
              <td>
                <div class="flex justify-center">
                <form action="" method="POST" class="form-eliminar" >
                  <div>
                  <a type="button"  href="" class="bg-white text-sm text-blue-500 font-normal text-ms p-2 rounded rounded-lg">Editar</a> 
                  
                  @csrf
                  @method('DELETE')
              <button type="submit" class="bg-white text-red-500 p-2 rounded rounded-lg">Eliminar</button>
                  </div>
                  
                  </form>
                </div>
              </td>
          </tr>
         @endforeach
      </tbody>
      <!--<tfoot>
          <tr>
            <th>Usuario</th>
            <th>Rol</th>
            <th></th>
          </tr>
      </tfoot>-->
    </table>
</div>


    <!-- inicio modal -->
<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal">
  <div class="relative w-auto my-6 mx-auto max-w-3xl">
    <!--content-->
    <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
      <!--header-->
      <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
        <h4 class="text-xl font-semibold">
          Agregar Nueva Fuente
        </h4>
        <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleMod('modal')">
          <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
            
          </span>
        </button>
      </div>
      <!--body-->
      <form action="" method="POST" id="formulario" name="formulario">
        @csrf
        @method('POST')
      <div class="relative p-6 flex-auto">
          <div class="grid grid-cols-8 gap-4">
            <div class="col-span-4 ">
              <label  id="label_cliente_id" for="cliente_id" class="block text-sm font-medium text-gray-700">Cliente *</label>
              <select id="cliente_id" name="cliente_id" onchange="validarCliente()" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">                
                <option value=""> Elija una opción </option>
               
                <option value="">  </option>
               
              </select>
              <label id="error_cliente_id" name="error_cliente_id" class="hidden text-base font-normal text-red-500" >Seleccione una opción</label>
            </div>
            <div class="col-span-4">
              <label id="label_ejercicio" for="label_ejercicio" class="block text-sm font-medium text-gray-700">Ejercicio *</label>
              <input type="number" name="ejercicio" id="ejercicio" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="(2020)">
              <label id="error_ejercicio" name="error_ejercicio" class="hidden text-base font-normal text-red-500" >Porfavor ingresar un año de ejercicio</label>  
          </div>
            <div class="col-span-4">
              <label id="label_monto_proyectado" for="label_monto_proyectado" class="block text-sm font-medium text-gray-700">Monto proyectado *</label>
              <div class="relative ">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <span class="text-gray-500 sm:text-sm">
                    $
                  </span>
                </div>
                <input type="number" name="monto_proyectado" id="monto_proyectado" class="pl-7  mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="0.0">
              </div>
                <label id="error_monto_proyectado" name="error_monto_proyectado" class="hidden text-base font-normal text-red-500" >Porfavor ingresar una cantidad</label>
            </div>
            <div class="col-span-4">
              <label id="label_monto_comprometido" for="label_monto_comprometido" class="block text-sm font-medium text-gray-700">Monto comprometido *</label>
              <div class="relative ">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <span class="text-gray-500 sm:text-sm">
                    $
                  </span>
                </div>
                <input type="number" name="monto_comprometido" id="monto_comprometido" class="pl-7 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="0.0" >
              </div>
              <label id="error_monto_comprometido" name="error_monto_comprometido" class="hidden text-base font-normal text-red-500" >Porfavor ingresar una cantidad</label>  
              <label id="error_monto_menor" name="error_monto_menor" class="hidden text-base font-normal text-red-500" >El monto comprometido no puede ser mayor que el proyectado</label>  
            </div>
            <div class="col-span-4">
                <label id="label_acta_integracion_consejo" for="acta_integracion_consejo" class="block text-sm font-medium text-gray-700">Acta integracion *</label>
                <input type="date" name="acta_integracion_consejo" id="acta_integracion_consejo" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >
                <label id="error_acta_integracion_consejo" name="error_acta_integracion_consejo" class="hidden text-base font-normal text-red-500" >Porfavor ingresar una Fecha</label>  
            </div>
            <div class="col-span-4">
                <label id="label_acta_priorizacion" for="acta_priorizacion" class="block text-sm font-medium text-gray-700">Acta priorización *</label>
                <input type="date" name="acta_priorizacion" id="acta_priorizacion" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >
                <label id="error_acta_priorizacion" name="error_acta_priorizacion" class="hidden text-base font-normal text-red-500" >Porfavor ingresar una Fecha</label>  
            </div>
            <div class="col-span-4">
                <label for="adendum_priorizacion" class="block text-sm font-medium text-gray-700">Adendum priorización *</label>
                <input type="date" name="adendum_priorizacion" id="adendum_priorizacion" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >
                <label id="error_adendum_priorizacion" name="error_adendum_priorizacion" class="hidden text-base font-normal text-red-500" >Porfavor ingresar una Fecha</label>  
            </div>
            <div class="col-span-4">
              <label for="fuente_financiamiento_id" class="block text-sm font-medium text-gray-700">Fuente de financiamiento *</label>
              <select id="fuente_financiamiento_id" name="fuente_financiamiento_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">                
                <option value="0" selected> Elija una opción </option>
                
                <option value="">  </option>
                
              </select>
          </div>

            <div class="col-span-4">
                <label for="prodim" class="block text-sm font-medium text-gray-700">Prodim *</label>
                <select id="prodim" name="prodim" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">                
                  <option value="0"> Elija una opción </option>
                  <option value="1"> Terminado </option>
                  <option value="2"> Pendiente </option>
                </select>
            </div>
            <div class="col-span-4">
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
      <!--footer-->
      <div class=" p-4 border-t border-solid border-blueGray-200 rounded-b">
        
        <span class="block text-xs">Verifique los campos obligatorios marcados con un ( * ) </span>
        <div class="text-right">
        <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleMod('modal')">
          Cancelar
        </button>
        <button type="submit" id="guardar" class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" >
          Guardar
        </button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-backdrop"></div>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.4/b-flash-1.6.4/b-html5-1.6.4/b-print-1.6.4/datatables.min.js"></script>
    
    <script>
     function toggleMod(modal, fuente){
    document.getElementById(modal).classList.toggle("hidden");
    document.getElementById(modal + "-backdrop").classList.toggle("hidden");    
}
      //ejecucion del datatable
      $(document).ready(function() {
          $('#example').DataTable({
              "autoWidth" : true,
              "responsive" : true,
              columnDefs: [ 
              ],
              language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
              }
            }
          )
          .columns.adjust();
      });
      </script>
@endsection