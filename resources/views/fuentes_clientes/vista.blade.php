@extends('layouts.plantilla')
@section('title','Fuentes de financiamiento')
@section('contenido')
<div class="mt-6 contenedor p-8 shadow-2xl bg-white rounded-lg">
    <div class="grid grid-cols-8 gap-8 border-b">
        <div class="col-span-8 ">
            <label id="nombre_municipio" class="text-base  text-gray-700">Cliente</label>
            <label for="first_name" class="block text-base font-medium font-bold">El Barrio de la Soledad</label>
        </div>
    </div>
    <div class="grid grid-cols-8 gap-4 mt-8">
        <div class="col-span-4 ">
            <label id="nombre_municipio" class="text-base font-bold">Monto proyectado</label>
            <input type="number" name="" id="" class=" mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="0.0">
        </div>
        <div class="col-span-4 ">
            <label id="nombre_municipio" class="text-base font-bold">Monto comprometido</label>
            <input type="number" name="" id="" class=" mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="0.0">
        </div>
        <div class="col-span-4 ">
            <label id="nombre_municipio" class="text-base font-bold">Acta de integracion</label>
            <input type="date" name="" id="" class=" mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="col-span-4 ">
            <label id="nombre_municipio" class="text-base font-bold">Acta de priorizacion</label>
            <input type="date" name="" id="" class=" mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="col-span-4 ">
            <label id="nombre_municipio" class="text-base font-bold">Adendum priorizacion</label>
            <input type="date" name="" id="" class=" mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="0.0">
        </div>
        <div class="col-span-4 ">
            <label id="nombre_municipio" class="text-base font-bold">Ejercicio</label>
            <input type="number" name="" id="" class=" mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="0.0">
        </div>
        <div class="col-span-4 ">
            <label id="nombre_municipio" class="text-base font-bold">Fuente de financiamiento</label>
            <select name="" id="" class="block mt-1 w-full shadow-sm border-gray-300 rounded-md">
                <option value="">Ramo 28</option>
                <option value="">Fondo III</option>
                <option value="">Fondo IV</option>
                <option value="">Convenios Federales</option>
            </select>
        </div>
        
    </div>
    <!--footer-->
    <div class="mt-4 p-4 border-t border-solid border-blueGray-200 rounded-b">
        
        <span class="block text-xs">Verifique los campos obligatorios marcados con un ( * ) </span>
        <div class="text-right">
        <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
          Cancelar
        </button>
        <button type="submit" id="guardar" class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" >
          Guardar
        </button>
        </div>
    </div>
</div>
@endsection