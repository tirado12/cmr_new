@extends('layouts.plantilla')
@section('title','Municipio')
@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/datatable.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swalfire.css')}}">

    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">


    <div class="flex flex-row items-center ">
        <img class="block ml-8 h-24 w-24 rounded-full shadow-2xl" src="{{$cliente->logo}}" alt="cmr">
        <div class="ml-4 grid grid-col-1">
            <p class="block font-black text-xl">{{$cliente->id_municipio}} - {{$cliente->nombre_municipio}}</p>
            <p class="text-gray-600">{{$cliente->id_distrito}} {{$cliente->nombre_distrito}} - {{$cliente->id_region}} {{$cliente->nombre_region}}</p>
            
        </div>
    </div>

    <div class="mt-7">
        <div class="w-full  px-3">
            <p class="text-gray-600">
                <a href="/inicio" class="text-blue-500">
                <i class="fas fa-home" aria-hidden="true"></i> Inicio
                </a>
                - 
                <i class="fas fa-user" aria-hidden="true"></i> Cliente  
            </p>
        </div>
    </div>


    <div class="grid sm:grid-cols-4 sm:gap-4">
        

        <div class="mt-6 sm:col-span-3 shadow-xl bg-white rounded-lg">
            <div class="border-b p-4">
                <label for="first_name" class="text-xl font-medium font-semibold">Información general</label>
            </div>
            <div class="p-4 grid grid-cols-8 gap-4 ">
                <div class="col-span-8 sm:col-span-4">
                    <p for="first_name" class="text-xs text-center">Correo: </p>
                    <p for="first_name" class="text-base font-semibold bg-gray-100 p-1 text-center">{{$cliente->email}}</p>
                </div>
                
                <div class="col-span-8 sm:col-span-2">
                    <p for="first_name" class="text-xs text-center">RFC </p>
                    <p for="first_name" class="text-base font-semibold bg-gray-100 p-1 text-center">{{$cliente->rfc}}</p>
                </div>
                <div class="col-span-8 sm:col-span-2">
                    <p for="first_name" class="text-xs text-center">Periodo: </p>
                    <p for="first_name" class="text-base font-semibold bg-gray-100 p-1 text-center">{{ $cliente->anio_inicio }}@if ($cliente->anio_fin != $cliente->anio_inicio) - {{ $cliente->anio_fin }}@endif</p>
                </div>                 
                
                <div class="col-span-8">
                    <p for="first_name" class="text-xs text-center">Dirección </p>
                    <p for="first_name" class="text-base font-semibold bg-gray-100 p-1 text-center">{{$cliente->direccion}}</p>
                </div>
                
            </div>
            <div class=" p-4 border-t border-solid border-blueGray-200 rounded-b">
                <div class="flex justify-between items-center">
                    <a type="button"  href="{{ route('contratistas.index') }}" class="bg-transparent text-sm text-blue-500 font-semibold text-base py-2 rounded rounded-lg underline">Listado de Contratistas </a>
                    <button type="button"  href="#" class="text-base text-white bg-blue-500 px-2 py-1 rounded-lg px-6" onclick="toggleModalCliente('modal-edit')">Editar</button>
                </div>
            </div>
        </div>
        
        <div class="mt-6 sm:col-span-1 bg-white rounded-lg">
            <div class="border-b p-4">
                <label for="first_name" class="text-xl font-medium font-semibold">Ejercicios</label>
            </div>
            <div class="p-4">
                <div class="">
                    <select name="cliente_id" id="cliente_id" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-800 focus:border-blue-800 sm:text-sm">
                        @for ($i = $cliente->anio_inicio; $i <= $cliente->anio_fin; $i++)
                            @if($i <= date("Y"))
                                <option value="{{$i}}">{{$i}}</option>
                            @endif
                        @endfor
                    </select>

                </div>
                <div class="mt-4 flex justify-center">
                    <a href="{{route('cliente.ejercicio', [$cliente->id_cliente, $cliente->anio_inicio])}}" id="btn_acceder" type="button" class="text-base text-white bg-green-500 p-2 rounded-lg px-6">Acceder</a>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="">

        <div class="text-base mt-6 shadow-xl bg-white rounded-lg">
            <div class="border-b p-4 flex justify-between items-center">
                <span class="inline-block text-xl font-medium font-semibold">Datos del cabildo</span>

                <button href="#" class="bg-green-500 text-white active:bg-white text-base px-6 py-2 rounded-lg outline-none focus:outline-none ml-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                    Agregar
                </button>
            </div>
            
            <div class="p-4 ">
                <div class="">
                    <table id="example" class="table table-striped bg-white" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="text-sm text-center">Cargo</th>
                                <th class="text-sm text-center">Nombre</th>
                                <th class="text-sm text-center">RFC</th>
                                <th class="text-sm text-center">Teléfono</th>
                                <th class="text-sm text-center">Correo</th>
                                <th class="text-sm text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cabildo as $key => $integrante)
                                <tr>
                                    <td>
                                        <div>
                                            <p class="text-sm leading-5 font-medium">
                                                {{ $integrante->cargo }}
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p class="text-sm leading-5 font-medium">   
                                                {{ $integrante->nombre }}
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p class="text-sm leading-5 font-medium">   
                                                {{ $integrante->rfc }}
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p class="text-sm leading-5 font-medium">   
                                                {{ $integrante->telefono}}
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p class="text-sm leading-5 font-medium">   
                                                {{ $integrante->correo}}
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center text-base leading-5 font-medium text-gray-900">
                                            <button type="button"  href="#" class="bg-transparent text-sm text-blue-500 font-normal" onclick="toggleModalCabildo('modal-cabildo', {{$integrante}})">Editar</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
            
            <div class=" p-4 border-t border-solid border-blueGray-200 rounded-b">
                <div class="text-right">
                    <a type="button"  href="{{ route('inicio')}}" class="text-base bg-white text-red-500 p-2 rounded-lg px-6">Regresar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- inicio modal -->
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
        <div class="relative w-auto my-28 mx-auto max-w-3xl">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-center justify-between px-5 py-3 border-b border-solid border-blueGray-200 rounded-t bg-blue-cmr1">
                <h4 class="text-base font-normal uppercase text-white">
                    Agregar nuevo integrante del cabildo
                </h4>
            
                <button class="p-1 ml-auto bg-transparent border-0 text-white float-right text-2xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
                    <span>
                        <i class="fas fa-xmark"></i>
                    </span>
                </button>
            </div>
            <!--body-->
            <form action="{{ route('cabildo.store') }}" method="POST" id="formulario" name="formulario">
            @csrf
            @method('POST')
            <div class="relative p-6 flex-auto">
                <div class="grid grid-cols-8 gap-4">
                <div class="col-span-8 sm:col-span-6 ">
                    <label id="label_nombre" for="first_name" class="text-sm font-semibold text-center pb-2">Nombre completo *</label>
                    <input type="text" name="nombre" id="nombre" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required maxlength="200">
                    <label id="error_nombre" name="error_nombre" class="hidden text-sm font-normal text-red-500" >Ingresa un nombre</label>
                </div>
                <div class="col-span-8 sm:col-span-2">
                    <label id="label_rfc" for="rfc" class="text-sm font-semibold text-center pb-2">RFC *</label>
                    <input type="text" name="rfc" id="rfc" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required maxlength="13" minlength="13">
                    <label id="error_rfc" name="error_rfc" class="hidden text-sm font-normal text-red-500" >Ingresa al menos un RFC genérico (XXXX000000XXX)</label>
                </div>
                <div class="col-span-8 sm:col-span-6">
                    <label id="label_cargo" for="cargo" class="text-sm font-semibold text-center pb-2">Cargo *</label>
                    <input type="text" name="cargo" id="cargo" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                    <label id="error_cargo" name="error_cargo" class="hidden text-sm font-normal text-red-500" >Ingresa un cargo</label>
                </div>
                <div class="col-span-8 sm:col-span-2">
                    <label id="label_telefono" for="telefono" class="text-sm font-semibold text-center pb-2">Teléfono *</label>
                    <input type="tel" name="telefono" id="telefono" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required maxlength="10" minlength="10">
                    <label id="error_telefono" name="error_telefono" class="hidden text-sm font-normal text-red-500" >Ingresar un teléfono</label>
                    </div>
                
                <div class="col-span-8 sm:col-span-4">
                    <label id="label_correo" for="correo" class="text-sm font-semibold text-center pb-2">Correo electrónico *</label>
                    <input type="email" name="correo" id="correo" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md px-3 py-2" required>
                    <label id="error_correo" name="error_correo" class="hidden text-sm font-normal text-red-500" >Ingresar un correo electrónico</label>
                    </div>
                <div class="col-span-8 sm:col-span-4" >
                    <label id="label_municipio" for="municipio" class="text-sm font-semibold text-center pb-2">Municipio *</label>
                    <p class="mt-1 text-base font-semibold px-3 py-2 border border-gray-300 text-center rounded-md ">{{$cliente->nombre_municipio}}</p>
                    <select id="cliente" name="cliente" onchange="validarCliente()" class="hidden mt-1 block w-full py-3 px-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="{{$cliente->id_cliente}}">{{$cliente->nombre_municipio}}</option>
                    </select>
                    <label id="error_municipio" name="error_municipio" class="hidden text-sm font-normal text-red-500" >Seleccione una opción</label>
            </div>
                </div>
            
            </div>
            <!--footer-->
            <div class=" p-4 border-t border-solid border-blueGray-200 rounded-b">
            
            <span class="block text-xs">Verifique los campos obligatorios marcados con un ( * )</span>
            <div class="text-right">
            <button class="text-red-500 background-transparent font-bold uppercase px-4 py-1 text-sm outline-none focus:outline-none ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                Cancelar
            </button>
            <button id="guardar_cabildo" type="submit" class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-sm px-4 py-1 rounded shadow hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150" >
                Guardar
            </button>
            </div>
            </div>
            </form>
        </div>
        </div>
    </div>

    <!-- inicio modal -->
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-cabildo">
        <div class="relative w-auto my-28 mx-auto max-w-3xl">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-center justify-between px-5 py-3 border-b border-solid border-blueGray-200 rounded-t bg-blue-cmr1">
                <h4 class="text-base font-normal uppercase text-white">
                    Editar integrante del cabildo
                </h4>
            
                <button class="p-1 ml-auto bg-transparent border-0 text-white float-right text-2xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-cabildo')">
                    <span>
                        <i class="fas fa-xmark"></i>
                    </span>
                </button>
            </div>
            <!--body-->
            <form action="{{ route('update_cabildo') }}" method="POST" id="formulario" name="formulario">
            @csrf
            @method('POST')
            <div class="relative p-6 flex-auto">
                <div class="grid grid-cols-8 gap-4">
                    <div class="col-span-8 hidden">
                        <input type="text" name="id_cabildo_edit" id="id_cabildo_edit" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{$cliente->id_cliente}}">
                    </div>
                    <div class="col-span-8 sm:col-span-6 ">
                        <label id="label_nombre_cabildo" for="first_name" class="text-sm font-semibold text-center pb-2">Nombre completo *</label>
                        <input type="text" name="nombre" id="nombre_cabildo" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required maxlength="200">
                        <label id="error_nombre_cabildo" name="error_nombre_cabildo" class="hidden text-sm font-normal text-red-500" >Ingresa un nombre</label>
                    </div>
                    <div class="col-span-8 sm:col-span-2">
                        <label id="label_rfc_cabildo" for="rfc" class="text-sm font-semibold text-center pb-2">RFC *</label>
                        <input type="text" name="rfc" id="rfc_cabildo" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required maxlength="13" minlength="13">
                        <label id="error_rfc_cabildo" name="error_rfc_cabildo" class="hidden text-sm font-normal text-red-500" >Ingresa al menos un RFC genérico (XXXX000000XXX)</label>
                    </div>
                    <div class="col-span-8 sm:col-span-6">
                        <label id="label_cargo" for="cargo" class="text-sm font-semibold text-center pb-2">Cargo *</label>
                        <input type="text" name="cargo" id="cargo_cabildo" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        <label id="error_cargo_cabildo" name="error_cargo_cabildo" class="hidden text-sm font-normal text-red-500" >Ingresa un cargo</label>
                    </div>
                    <div class="col-span-8 sm:col-span-2">
                        <label id="label_telefono_cabildo" for="telefono" class="text-sm font-semibold text-center pb-2">Teléfono *</label>
                        <input type="tel" name="telefono" id="telefono_cabildo" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required maxlength="10" minlength="10">
                        <label id="error_telefono_cabildo" name="error_telefono_cabildo" class="hidden text-sm font-normal text-red-500" >Ingresar un teléfono</label>
                        </div>
                    
                    <div class="col-span-8 sm:col-span-4">
                        <label id="label_correo_cabildo" for="correo" class="text-sm font-semibold text-center pb-2">Correo electrónico *</label>
                        <input type="email" name="correo" id="correo_cabildo" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md px-3 py-2" required>
                        <label id="error_correo_cabildo" name="error_correo_cabildo" class="hidden text-sm font-normal text-red-500" >Ingresar un correo electrónico</label>
                        </div>
                    <div class="col-span-8 sm:col-span-4" >
                        <label id="label_municipio_cabildo" for="municipio" class="text-sm font-semibold text-center pb-2">Municipio *</label>
                        <p class="mt-1 text-sm font-semibold px-3 py-2 border border-gray-300 text-center rounded-md ">{{$cliente->nombre_municipio}}</p>
                    </div>
                </div>
            
            </div>
            <!--footer-->
            <div class=" p-4 border-t border-solid border-blueGray-200 rounded-b">
            
            <span class="block text-xs">Verifique los campos obligatorios marcados con un ( * )</span>
            <div class="text-right">
            <button class="text-red-500 background-transparent font-bold uppercase px-4 py-1 text-sm outline-none focus:outline-none ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-cabildo')">
                Cancelar
            </button>
            <button id="actualizar_cabildo" type="submit" class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-sm px-4 py-1 rounded shadow hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150" >
                Guardar
            </button>
            </div>
            </div>
            </form>
        </div>
        </div>
    </div>


    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-edit">
        <div class="relative w-auto my-28 mx-auto max-w-3xl">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-center justify-between px-5 py-3 border-b border-solid border-blueGray-200 rounded-t bg-blue-cmr1">
            <h4 class="text-base font-normal uppercase text-white">
                Editar datos del Municipio
            </h4>
            
            <button class="p-1 ml-auto bg-transparent border-0 text-white float-right text-2xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-edit')">
                <span>
                    <i class="fas fa-xmark"></i>
                </span>
                </button>
            </div>
            <!--body-->
            <form action="{{ route('update_cliente') }}" method="POST" id="formulario_edit" name="formulario_edit">
            @csrf
            @method('POST')
            <div class="relative p-6 flex-auto">
                <div class="grid grid-cols-8 gap-4">
                    <div class="col-span-8 hidden">
                        <input type="text" name="id_cliente_edit" id="id_cliente_edit" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{$cliente->id_cliente}}">
                        <label id="error_direccion" name="error_direccion" class="hidden text-base font-normal text-red-500" >Ingresa una dirección</label>
                    </div>
                    <div class="col-span-8">
                        <label id="label_direccion" for="first_name" class="text-sm font-bold text-center">Dirección *</label>
                        <input type="text" name="direccion" id="direccion" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        <label id="error_direccion" name="error_direccion" class="hidden text-base font-normal text-red-500" >Ingresa una dirección</label>
                    </div>
                    <div class="col-span-8 sm:col-span-4">
                        <label id="label_rfc_actualizar" for="rfc_actualizar" class="text-sm font-bold text-center">RFC *</label>
                        <input type="text" name="rfc_actualizar" id="rfc_actualizar" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" maxlength="12" minlength="12">
                        <label id="error_rfc_actualizar" class="hidden text-sm font-normal text-red-500" >Ingresa al menos un RFC genérico (XXX000000XXX)</label>
                    </div>
                    
                    <div class="col-span-8 sm:col-span-4">
                        <label id="label_correo_act" for="correo_act" class="text-sm font-bold text-center">Correo electrónico *</label>
                        <input type="email" name="correo_act" id="correo_act" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md px-3 py-2" >
                        <label id="error_correo_act" name="error_correo_act" class="hidden text-base font-normal text-red-500" >Ingresar un correo electrónico</label>
                    </div>
                    <div class="col-span-8 sm:col-span-2" >
                        <label id="label_periodo" class="text-sm font-bold text-center">Periodo *</label>
                        <p class="mt-1 text-sm font-semibold px-3 py-2 border border-gray-300 text-center rounded-md ">{{ $cliente->anio_inicio }}@if ($cliente->anio_fin != $cliente->anio_inicio) - {{ $cliente->anio_fin }}@endif</p>
                    </div>
                    <div class="col-span-8">
                        <span class="block text-xs">Verifique los campos obligatorios marcados con un ( * )</span>
                    </div>
                    
                </div>
            
            </div>
            <!--footer-->
            <div class=" p-4 border-t border-solid border-blueGray-200 rounded-b">
            
            
            <div class="text-right">
            <button class="text-red-500 background-transparent font-bold uppercase px-4 py-1 text-sm outline-none focus:outline-none ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-edit')">
                Cancelar
            </button>
            <button id="btn_actualizar" type="submit" class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-sm px-4 py-1 rounded shadow hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150" >
                Guardar
            </button>
            </div>
            </div>
            </form>
        </div>
        </div>
    </div>

    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-edit-backdrop"></div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-cabildo-backdrop"></div>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.4/b-flash-1.6.4/b-html5-1.6.4/b-print-1.6.4/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.4/b-flash-1.6.4/b-html5-1.6.4/b-print-1.6.4/datatables.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>  
    <script>
        $(document).ready(function() {
            $(document).on('change', '#cliente_id', function(event) {
                $("#btn_acceder").prop("href", location.origin+"/cliente/ejercicio/"+{{$cliente->id_cliente}}+","+$("#cliente_id option:selected").val());
            });

            $("a").bind("click", function(e){
                
                console.log(location.origin);
                
            });
            $('#example').DataTable({
                    "autoWidth": true,
                    "responsive": true,
                    "bFilter": false,
                    "bPaginate": false,
                    "bInfo": false,
                    columnDefs: [{
                            responsivePriority: 1,
                            targets: 3
                        },
                        {
                            responsivePriority: 1,
                            targets: 0
                        },
                        {
                            responsivePriority: 10001,
                            targets: 0
                        },
                        {
                            responsivePriority: 2,
                            targets: -2
                        }
                    ],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                    }
                })
                .columns.adjust();

            
        });
    </script>

    @if(session('mensaje')=='ok')
        <script>
            Swal.fire({  
            title: '{{session('datos')[1]}}',
            text: '{{session('datos')[2]}}',
            icon: '{{session('datos')[0]}}',
            button: "Ok",

            })
        </script>
    @endif
<script type="text/javascript">
    function toggleModal(modalID){
        document.getElementById(modalID).classList.toggle("hidden");
        document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
    }

    function toggleModalCliente(modalID){

        $("#direccion").val("{{$cliente->direccion}}");
        $("#rfc_actualizar").val("{{$cliente->rfc}}");
        $("#correo_act").val("{{$cliente->email}}");
        document.getElementById(modalID).classList.toggle("hidden");
        document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
    }

    function toggleModalCabildo(modalID, integrante){
        console.log(integrante);
        
        $("#id_cabildo_edit").val(integrante.id_integrante);
        $("#nombre_cabildo").val(integrante.nombre);
        $("#cargo_cabildo").val(integrante.cargo);
        $("#rfc_cabildo").val(integrante.rfc);
        $("#telefono_cabildo").val(integrante.telefono);
        $("#correo_cabildo").val(integrante.correo);

        document.getElementById(modalID).classList.toggle("hidden");
        document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
    }
  
  //validacion de campos del modal
  $(document).ready(function() {
     $("#modal-id input").keyup(function() {
    //console.log($(this).attr('id'));
        var monto = $(this).val();
        
        if(monto != ''){
        $('#error_'+$(this).attr('id')).addClass("hidden");
        $("#label_"+$(this).attr('id')).removeClass('text-red-500');
        $("#label_"+$(this).attr('id')).addClass('text-gray-700');
        //$('#guardar').removeAttr("disabled");
        }
        else{
        //$("#guardar").attr("disabled", true);
        $('#error_'+$(this).attr('id')).removeClass("hidden");
        $("#label_"+$(this).attr('id')).addClass('text-red-500');
        $("#label_"+$(this).attr('id')).removeClass('text-gray-700');
        }
      
      });
  });
  
  //Validacion de select municipio
  function validarCliente() {
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
  
  
  //validacion del formulario con el btn guardar
  $().ready(function() {
    $("#formulario").validate({
        onfocusout: false,
        onclick: false,
            rules: {
            nombre: { required: true},
                rfc: { required: true, minlength: 5},
            cargo: { required: true},
            telefono: { required: true},
            correo: { required: true},
            municipio: { required: true}
            },
        errorPlacement: function(error, element) {
            console.log(element.attr('id'));
            /*if(error != null){
            $('#error_'+element.attr('id')).fadeIn();
            }else{
            $('#error_'+element.attr('id')).fadeOut();
            }*/
        // console.log(element.attr('id'));
        },
    }); 


    $("#btn_actualizar").click(function () {
        _rfc_pattern_pm = "^(([A-ZÑ&]{3})([0-9]{2})([0][13578]|[1][02])(([0][1-9]|[12][\\d])|[3][01])([A-Z0-9]{3}))|" +
        "(([A-ZÑ&]{3})([0-9]{2})([0][13456789]|[1][012])(([0][1-9]|[12][\\d])|[3][0])([A-Z0-9]{3}))|" +
        "(([A-ZÑ&]{3})([02468][048]|[13579][26])[0][2]([0][1-9]|[12][\\d])([A-Z0-9]{3}))|" +
        "(([A-ZÑ&]{3})([0-9]{2})[0][2]([0][1-9]|[1][0-9]|[2][0-8])([A-Z0-9]{3}))$";

        _rfc_pattern_pf = "^(([A-ZÑ&]{4})([0-9]{2})([0][13578]|[1][02])(([0][1-9]|[12][\\d])|[3][01])([A-Z0-9]{3}))|" +
        "(([A-ZÑ&]{4})([0-9]{2})([0][13456789]|[1][012])(([0][1-9]|[12][\\d])|[3][0])([A-Z0-9]{3}))|" +
        "(([A-ZÑ&]{4})([02468][048]|[13579][26])[0][2]([0][1-9]|[12][\\d])([A-Z0-9]{3}))|" +
        "(([A-ZÑ&]{4})([0-9]{2})[0][2]([0][1-9]|[1][0-9]|[2][0-8])([A-Z0-9]{3}))$";
        valido = true;
        rfc_value = $("#rfc_actualizar").val();
        let rfc = rfc_value;
									
    	if (rfc.match(_rfc_pattern_pm) || rfc.toLowerCase() == "xxx000000xxx" ){
            valido = true;
            $("#error_rfc_actualizar").addClass("hidden");
    	}else {
            console.log("entro 1");
    		valido = false;
            $("#error_rfc_actualizar").removeClass("hidden");
    	}
        console.log
        console.log($("#direccion").val() == '');

        if($("#direccion").val() == ''){
            valido = false;
            $('#error_direccion').removeClass("hidden");
        }else{
            console.log("entro 2");
            $('#error_direccion').addClass("hidden");
        }

        if($("#correo_act").val() == '' ){
            valido = false;
            $('#error_correo_act').removeClass("hidden");
        }else{
            console.log("entro 3");
            $('#error_correo_act').addClass("hidden");
        }
        console.log(valido);
        return valido;
    });
    
    $("#guardar_cabildo").click(function () {

        _rfc_pattern_pf = "^(([A-ZÑ&]{4})([0-9]{2})([0][13578]|[1][02])(([0][1-9]|[12][\\d])|[3][01])([A-Z0-9]{3}))|" +
        "(([A-ZÑ&]{4})([0-9]{2})([0][13456789]|[1][012])(([0][1-9]|[12][\\d])|[3][0])([A-Z0-9]{3}))|" +
        "(([A-ZÑ&]{4})([02468][048]|[13579][26])[0][2]([0][1-9]|[12][\\d])([A-Z0-9]{3}))|" +
        "(([A-ZÑ&]{4})([0-9]{2})[0][2]([0][1-9]|[1][0-9]|[2][0-8])([A-Z0-9]{3}))$";
        valido = true;
        rfc_value = $("#rfc").val();
        let rfc = rfc_value;

        console.log(rfc_value);
									
    	if (rfc.match(_rfc_pattern_pf) || rfc.toLowerCase() == "xxxx000000xxx" ){
            valido = true;
            $("#error_rfc").addClass("hidden");
    	}else {
            console.log("entro 1");
    		valido = false;
            $("#error_rfc").removeClass("hidden");
    	}

        if($("#nombre").val() == ''){
            valido = false;
            $('#error_nombre').removeClass("hidden");
        }else{
            console.log("entro 2");
            $('#error_nombre').addClass("hidden");
        }

        if($("#cargo").val() == ''){
            valido = false;
            $('#error_cargo').removeClass("hidden");
        }else{
            console.log("entro 3");
            $('#error_cargo').addClass("hidden");
        }


        if($("#telefono").val() == ''){
            valido = false;
            $('#error_telefono').removeClass("hidden");
        }else{
            console.log("entro 4");
            $('#error_telefono').addClass("hidden");
        }

        if($("#correo").val() == ''){
            valido = false;
            $('#error_correo').removeClass("hidden");
        }else{
            console.log("entro 5");
            $('#error_correo').addClass("hidden");
        }

        return valido;
    });


    $("#actualizar_cabildo").click(function () {

        _rfc_pattern_pf = "^(([A-ZÑ&]{4})([0-9]{2})([0][13578]|[1][02])(([0][1-9]|[12][\\d])|[3][01])([A-Z0-9]{3}))|" +
        "(([A-ZÑ&]{4})([0-9]{2})([0][13456789]|[1][012])(([0][1-9]|[12][\\d])|[3][0])([A-Z0-9]{3}))|" +
        "(([A-ZÑ&]{4})([02468][048]|[13579][26])[0][2]([0][1-9]|[12][\\d])([A-Z0-9]{3}))|" +
        "(([A-ZÑ&]{4})([0-9]{2})[0][2]([0][1-9]|[1][0-9]|[2][0-8])([A-Z0-9]{3}))$";
        valido = true;
        rfc_value = $("#rfc_cabildo").val();
        let rfc = rfc_value;

        console.log(rfc_value);
                                    
        if (rfc.match(_rfc_pattern_pf) || rfc.toLowerCase() == "xxxx000000xxx" ){
            valido = true;
            $("#error_rfc_cabildo").addClass("hidden");
        }else {
            console.log("entro 1");
            valido = false;
            $("#error_rfc_cabildo").removeClass("hidden");
        }

        if($("#nombre_cabildo").val() == ''){
            valido = false;
            $('#error_nombre_cabildo').removeClass("hidden");
        }else{
            console.log("entro 2");
            $('#error_nombre_cabildo').addClass("hidden");
        }

        if($("#cargo_cabildo").val() == ''){
            valido = false;
            $('#error_cargo_cabildo').removeClass("hidden");
        }else{
            console.log("entro 3");
            $('#error_cargo_cabildo').addClass("hidden");
        }


        if($("#telefono_cabildo").val() == ''){
            valido = false;
            $('#error_telefono_cabildo').removeClass("hidden");
        }else{
            console.log("entro 4");
            $('#error_telefono_cabildo').addClass("hidden");
        }

        if($("#correo_cabildo").val() == ''){
            valido = false;
            $('#error_correo_cabildo').removeClass("hidden");
        }else{
            console.log("entro 5");
            $('#error_correo_cabildo').addClass("hidden");
        }

        return valido;
    });

  });
  </script>

@endsection