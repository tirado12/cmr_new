@extends('layouts.plantilla')
@section('title','Municipio')
@section('contenido')
<div class="flex flex-row items-center ">
    <img class="block ml-8 h-24 w-auto rounded-full shadow-2xl" src="{{asset('image/logo.png')}}" alt="cmr">
    <div class="ml-4 grid grid-col-1">
        <p class="block font-bold text-xl">El Barrio de la Soledad</p>
        <p class="text-gray-600">Istmo de tehuantepec</p>
    </div>
</div>


    <div class="grid grid-rows-1 grid-flow-col gap-4">

        <div class="mt-6 col-span-3 shadow-xl bg-white rounded-lg">
            <div class="border-b p-4">
                <label for="first_name" class="text-base font-medium font-bold">Información General</label>
            </div>
            <div class="p-4 grid grid-cols-8 gap-8">

                <div class="col-span-4">
                    <label for="first_name" class="block text-base font-medium text-gray-500">Dirección: </label>
                    <label for="first_name" class="text-base font-medium">Calle jardines #23 col. centro</label>
                </div>
                <div class="col-span-4">
                    <label for="first_name" class="block text-base font-medium text-gray-500">RFC: </label>
                    <label for="first_name" class="text-base font-medium">BLS23534XXXXXXXX</label>
                </div>
                <div class="col-span-4">
                    <label for="first_name" class="block text-base font-medium text-gray-500">Correo: </label>
                    <label for="first_name" class="text-base font-medium">barrio.soledad@gmail.com</label>
                </div>
                <div class="col-span-4">
                    <label for="first_name" class="block text-base font-medium text-gray-500">Presidente: </label>
                    <label for="first_name" class="text-base font-medium">Juan Garcia Quiroz</label>
                </div>
                <div class="col-span-4">
                    <label for="first_name" class="block text-base font-medium text-gray-500">Usuario: </label>
                    <label for="first_name" class="text-base font-medium">Barrio2020</label>
                </div>
                <div class="col-span-4">
                    <label for="first_name" class="block text-base font-medium text-gray-500">Periodo en curso: </label>
                    <label for="first_name" class="text-base font-medium">2020 - 2021</label>
                </div>                 
            </div>
            <div class=" p-4 border-t border-solid border-blueGray-200 rounded-b">
        
            
                <div class="text-right">
                <button class="text-white bg-gray-500 rounded font-bold uppercase px-6 py-3 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" >
                  Regresar
                </button>
                <button type="submit" class="bg-blue-700 text-white active:bg-blu-700 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                  Editar
                </button>
                </div>
              </div>
            
        </div>

        <div class="mt-6 row-start-1 row-end-2 h-48 shadow-xl bg-white rounded-lg">
            <div class="border-b p-4">
                <label for="first_name" class="text-base font-medium font-bold">Ejercicios</label>
            </div>
            <div class="p-4 grid grid-cols-8 gap-4 justify-items-center">
                <div class="col-span-8 ">
                    <select name="" id="" class="block w-52 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-800 focus:border-blue-800 sm:text-sm">
                        <option value="">2020</option>
                        <option value="">2021</option>
                        <option value="">2022</option>
                    </select>
                </div>
                <div class="col-span-8">
                    <button class="text-white bg-green-500 p-2 rounded-lg">Acceder</button>
                </div>
            </div>
        </div>
    </div>
    
    

@endsection