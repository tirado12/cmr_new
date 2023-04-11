@extends('layouts.plantilla')
@section('title','Sisplade')
@section('contenido')
<div class="flex flex-row mb-4">
    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
    </svg>
    <h1 class="font-bold text-xl ml-2">Editar Fuente financiamiento</h1>
</div>

<div class="mt-10 sm:mt-0 shadow-2xl bg-white rounded-lg">
    <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ route('sisplade.update', $sisplade) }}" method="POST" id="formulario" name="formulario">
            @csrf
            @method('PUT')
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">Cliente *</label>
                            <input type="text" name="cliente" id="cliente" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $clientes->find($fuentesClientes[0]->cliente_id)->nombre }}" disabled>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">Fuente *</label>
                            <input type="text" name="fuente" id="fuente" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $fuentes->find($fuentesClientes[0]->fuente_financiamiento_id)->nombre_corto }}" disabled>
                        </div>

                        <div class=" flex flex-row items-center justify-center bg-gray-100 p-2 mt-2 mb-2 shadow col-span-6">
                            <div class="alert-content ml-4 ">
                              <p class="font-bold sm:text-sm">Editar Sisplade</p>
                            </div>
                        </div>
                        
                        <div class="col-span-6 sm:col-span-3">
                            <label for="fecha_capturado" class="block font-medium text-gray-700">Fecha de captura</label>
                            <input id="fecha_capturado" name="fecha_capturado" type="date" class="block focus:ring-gray-500 text-gray-600 border-gray-300 rounded w-full" value="{{ $sisplade->fecha_capturado }}">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="fecha_capturado" class="block font-medium text-gray-700">Fecha de validación</label>
                            <input id="fecha_validacion" name="fecha_validacion" type="date" class="block focus:ring-gray-500 text-gray-600 border-gray-300 rounded w-full" value="{{ $sisplade->fecha_validado }}">
                        </div>

                        <div class="col-span-6 sm:col-span-3 p-6 ">
                            <input id="capturado" name="capturado" type="checkbox" class="focus:ring-green-500 h-6 w-6 text-green-600 border-gray-300 rounded" {{ ($sisplade->validado == 1)? 'checked' : '' }}>
                            <label for="capturado" class=" font-medium text-gray-700">Capturado</label>
                        </div>

                        <div class="col-span-6 sm:col-span-3 p-6 ">
                            <input id="validado" name="validado" type="checkbox" class="focus:ring-green-500 h-6 w-6 text-green-600 border-gray-300 rounded" {{ ($sisplade->capturado == 1)? 'checked' : '' }}>
                            <label for="validado" class=" font-medium text-gray-700">Validación</label>
                        </div>
                        
                    </div>
                    <div class="w-full bg-gray-100 text-right px-4 py-3">
                        <a type="button" href="{{route('sisplade.index')}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-500 hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Regresar
                          </a>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-orange-800 hover:bg-orange-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                          Guardar
                        </button>
                      </div>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection