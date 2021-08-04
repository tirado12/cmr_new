@extends('layouts.plantilla')
@section('title','Editar Personal del Cabildo')
@section('contenido')

<div class="flex flex-row mb-4">
<svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
</svg>
<h1 class="font-bold text-xl ml-2">Editar Integrante de Cabildo</h1>
</div>



<div class="mt-10 sm:mt-0 shadow-2xl bg-white rounded-lg">
      
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ route('cabildo.update', $integrante) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6"> 
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="first_name" class="block text-sm font-medium text-gray-700">Nombre *</label>
                  <input type="text" name="nombre" id="nombre" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $integrante->nombre }}">
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="cargo" class="block text-sm font-medium text-gray-700">Cargo *</label>
                  <input type="text" name="cargo" id="cargo" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $integrante->cargo }}">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="telefono" class="block text-sm font-medium text-gray-700">Telefono *</label>
                    <input type="tel" name="telefono" id="telefono"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $integrante->telefono }}">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="Correo" class="block text-sm font-medium text-gray-700">Correo *</label>
                    <input type="email" name="correo" id="correo" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $integrante->correo }}">
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="rfc" class="block text-sm font-medium text-gray-700">RFC *</label>
                    <input type="text" name="rfc" id="rfc"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $integrante->rfc }}">
                  </div>
                
                  
                <div class="col-span-6 sm:col-span-3">
                  <label for="municipio" class="block text-sm font-medium text-gray-700">Municipio *</label>
                  <select id="municipio" name="municipio" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach($municipios as $municipio)

                    <option value="{{ $municipio->id_municipio }}" {{ ($municipio->id_municipio == $integrante->municipio_id) ? 'selected' : '' }}> {{ $municipio->nombre }}</option>
                    
                  @endforeach
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
  
@endsection