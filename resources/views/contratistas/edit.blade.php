@extends('layouts.plantilla')
@section('title','Editar Contratista')
@section('contenido')

<div class="flex flex-row mb-4">
<svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
</svg>
<h1 class="font-bold text-xl ml-2">Editar Contratista</h1>
</div>


<div class="mt-10 sm:mt-0 shadow-2xl bg-white rounded-lg">
      
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ route('contratistas.update', $contratista) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="rfc" class="block text-sm font-medium text-gray-700">RFC *</label>
                  <input type="text" name="rfc" id="rfc" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $contratista->rfc }}">
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="razon_social" class="block text-sm font-medium text-gray-700">Razón social *</label>
                  <input type="text" name="razon_social" id="razon_social" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $contratista->razon_social }}">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="representante_legal" class="block text-sm font-medium text-gray-700">Representante legal *</label>
                    <input type="text" name="representante_legal" id="representante_legal" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $contratista->representante_legal }}">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="domicilio" class="block text-sm font-medium text-gray-700">Domicilio *</label>
                    <input type="text" name="domicilio" id="domicilio" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $contratista->domicilio }}">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="telefono" class="block text-sm font-medium text-gray-700">Telefono *</label>
                    <input type="tel" name="telefono" id="telefono" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $contratista->telefono }}">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="correo" class="block text-sm font-medium text-gray-700">Correo *</label>
                    <input type="text" name="correo" id="correo" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $contratista->correo }}">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="numero_padron_contratista" class="block text-sm font-medium text-gray-700">Numero de padron *</label>
                    <input type="text" name="numero_padron_contratista" id="numero_padron_contratista" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $contratista->numero_padron_contratista }}">
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