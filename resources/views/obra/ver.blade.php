@extends('layouts.plantilla')
@inject('service', 'App\Http\Controllers\ObraController')
@section('title', 'Editar ')
@section('contenido')

    <link rel="stylesheet" href="{{ asset('css/datatable.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles_personalizados.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-file.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swalfire.css')}}">

    <style>
        .select2.select2-container{
            width: 100%!important;
        }
    </style>
    
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script lenguage="javascript">
        function estado_tabs(){
            $(".tab_content").hide(); //Hide all content
            $("ul.tabs li:first").addClass("active").show(); //Activate first tab
            $(".tab_content:first").show(); //Show first tab content
        }
    </script>
    <div class="flex flex-row items-center ">
        <img class="block h-24 w-24 rounded-full shadow-2xl" src="{{$obj_obra->get('obra')->icono}}" alt="cmr">
        <div class="ml-4 grid grid-col-1">
            <p class="block font-black text-xl">Detalles de la obra</p>
            <p class="block font-black text-xl">{{$obj_obra->get('obra')->id_municipio}} - {{$obj_obra->get('obra')->nombre_municipio}}</p>
            <p class="text-gray-600">{{$obj_obra->get('obra')->id_distrito}} {{$obj_obra->get('obra')->nombre_distrito}} - {{$obj_obra->get('obra')->id_region}} {{$obj_obra->get('obra')->nombre_region}}</p>
        </div>
    </div>

    <div class="mt-7 mb-7">
        <div class="w-full  px-3">
            <p class="text-gray-600">
                <a href="/inicio" class="text-blue-500">
                    <i class="fas fa-home" aria-hidden="true"></i> Inicio
                </a>
                - 
                <a href="/cliente/ver/{{$obj_obra->get('obra')->id_cliente}}" class="text-blue-500">
                    <i class="fas fa-user" aria-hidden="true"></i> Cliente
                </a> 
                -
                <a href="/cliente/ejercicio/{{$obj_obra->get('obra')->id_cliente}},{{$obj_obra->get('obra')->ejercicio}}" class="text-blue-500">
                    <i class="fas fa-calendar" aria-hidden="true"></i> {{$obj_obra->get('obra')->ejercicio}}
                </a> 
                - 
                
                <i class="fas fa-pen-to-square" aria-hidden="true"></i> Detalles de la obra
            </p>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert flex flex-row items-center bg-yellow-200 p-2 rounded-lg border-b-2 border-yellow-300 mb-4 shadow">
            <div class="alert-icon flex items-center bg-yellow-100 border-2 border-yellow-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                <span class="text-yellow-500">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="h-5 w-5">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd">

                        </path>
                    </svg>
                </span>
            </div>
            <div class="alert-content ml-4">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

<div class="mt-10 sm:mt-0 shadow-2xl bg-white rounded-lg">
    <div class="bg-blue-cmr1 rounded-t-lg">
        <div class="p-4">
            <h2 class="font-semibold text-lg text-center text-white uppercase">Detalles de la obra</h2>
        </div>
    </div>

    <div class="bg-gray-300 mt-5">
        <div class="px-4 py-2">
            <h2 class="font-semibold text-base text-center uppercase">Datos generales</h2>
        </div>
    </div>
    <div class="contenedor pb-8 px-8">
        
        <div class="mt-5 grid grid-cols-12 gap-x-2 gap-y-3">
            <div class="col-span-12">
                <p for="first_name" class="text-xs text-center">Nombre</p>
                <p class="text-base font-semibold bg-gray-100 p-1 text-center">{{ $obj_obra->get('obra')->nombre_obra }}</p>
            </div>
            <div class="col-span-12 sm:col-span-3">
                <p for="first_name" class="text-xs text-center">Núm. de obra</p>
                <p id="numero_obra" name="numero_obra" class="text-base font-semibold bg-gray-100 p-1 text-center">{{str_pad($obj_obra->get('obra')->numero_obra,3,"0",STR_PAD_LEFT)}}</p>
            </div>
            <div class="col-span-12 sm:col-span-9">
                <p class="text-xs text-center">Nombre corto</p>
                <p class="text-base font-semibold bg-gray-100 p-1 text-center mostrar_datos">{{ $obj_obra->get('obra')->nombre_corto_obra}}</p>
                <form action="{{ route('update_obra') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" id="formulario_nc" class="hidden ml-5">
                    @csrf
                    @method('POST')
                    <div class="relative flex-auto">
                        <div id="datos_generales">
                            <div class="grid grid-cols-8">
                                <div class="col-span-8">
                                    <input type="text" maxlength="100" name="nombre_corto" id="nombre_corto" autocomplete="nombre_corto" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $obj_obra->get('obra')->nombre_corto_obra}}">
                                    <label id="error_nombre_corto" name="error_nombre_obra" class="hidden text-base font-normal text-red-500" >Ingrese un nombre corto de obra correcto</label>  
                                    <input type="number" name="obra_id" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $obj_obra->get('obra')->id_obra}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--footer-->
                    <div class="rounded-b">
                        <div class="text-left">
                            <button type="button" class="text-red-500 background-transparent font-semibold  text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" onclick="ocultar_edicion()">
                                Cancelar
                            </button>
                            <button id="guardar_btn" type="submit" class="bg-transparent text-green-500  font-semibold text-sm rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                Guardar
                            </button>
                        </div>
                    </div>
                </form>
                <div class="mostrar_datos col-span-9 flex justify-center">
                    <button type="button" class="text-xs text-blue-500 underline background-transparent font-semibold outline-none focus:outline-none ease-linear transition-all duration-150" onclick="mostrar_edicion()">
                        Editar nombre corto
                    </button>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-3">
                <p class="text-xs text-center">Localidad</p>
                <p class="text-base font-semibold bg-gray-100 p-1 text-center">{{ $obj_obra->get('obra')->nombre_localidad }}</p>
            </div>
            <div class="col-span-12 sm:col-span-3">
                <p class="text-xs text-center">Municipio</p>
                <p class="text-base font-semibold bg-gray-100 p-1 text-center">{{ $obj_obra->get('obra')->nombre_municipio }}</p>
            </div>
            <div class="col-span-12 sm:col-span-3">
                <p class="text-xs text-center">Distrito</p>
                <p class="text-base font-semibold bg-gray-100 p-1 text-center">{{ $obj_obra->get('obra')->nombre_distrito }}</p>
            </div>
            <div class="col-span-12 sm:col-span-3">
                <p class="text-xs text-center">Estado</p>
                <p class="text-base font-semibold bg-gray-100 p-1 text-center">{{ $obj_obra->get('obra')->nombre_estado }}</p>
            </div>
            <!--<div class="sm:col-span-3">
                <p class="text-sm font-semibold">Región <br><span class="ml-5 text-base font-bold">{{ $obj_obra->get('obra')->nombre_region }}</span></p>
            </div>
            -->
            <div class="col-span-12 sm:col-span-3">
                <p class="text-xs text-center">Número de oficio de notificación</p>
                <p class="text-base font-semibold bg-gray-100 p-1 text-center ">{{ $obj_obra->get('obra')->oficio_notificacion }}</p>
            </div>
            <div class="col-span-12 sm:col-span-3">
                <p class="text-xs text-center">Fecha de oficio de notificación</p>
                <p class="text-base font-semibold bg-gray-100 p-1 text-center">{{ date('d-m-Y', strtotime($obj_obra->get('obra')->fecha_oficio_notificacion)) }}</p>
            </div>
            @if($obj_obra->get('obra')->modalidad_ejecucion == 2)
                <div class="col-span-12 sm:col-span-3">
                    <p class="text-xs text-center">Número de contrato</p>
                    <p class="text-base font-semibold bg-gray-100 p-1 text-center ">{{ $obj_obra->get('contrato')->numero_contrato }}</p>
                </div>
                <div class="col-span-12 sm:col-span-3">
                    <p class="text-xs text-center">Fecha de contrato</p>
                    <p class="text-base font-semibold bg-gray-100 p-1 text-center">{{ date('d-m-Y', strtotime($obj_obra->get('contrato')->fecha_contrato)) }}</p>
                </div>
            @endif
            <div class="col-span-12 sm:col-span-3">
                <p class="text-xs text-center">Monto contratado</p>
                <p class="text-base font-semibold bg-gray-100 p-1 text-center">$ {{ number_format($obj_obra->get('obra')->monto_contratado, 2) }}</p>
            </div>
            @if($obj_obra->get('obra')->monto_modificado != null)
                <div class="col-span-12 sm:col-span-3">
                    <p class="text-xs text-center">Monto modificado</p>
                    <p class="text-base font-semibold bg-gray-100 p-1 text-center">$ {{ number_format($obj_obra->get('obra')->monto_modificado, 2) }}</p>
                </div>
            @endif 
            @if($obj_obra->get('obra')->modalidad_ejecucion == 1)
                <div class="col-span-12 sm:col-span-3">
                    <p class="text-xs text-center">Monto ejercido</p>
                    <p class="text-base font-semibold bg-gray-100 p-1 text-center">$ {{ number_format($total_admin, 2) }}</p>
                </div>
            @endif

            <div class="col-span-12 sm:col-span-6">
                <div class="grid grid-cols-6 gap-x-2 gap-y-3 ocultar_periodo">
                    <div class="col-span-6 sm:col-span-3">
                        <p class="text-xs text-center">Fecha de incio</p>
                        <p class="text-base font-semibold bg-gray-100 p-1 text-center ocultar_periodo">{{ date('d-m-Y', strtotime($obj_obra->get('obra')->fecha_inicio_programada)) }}</p>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        @if($obj_obra->get('obra')->modalidad_ejecucion == 2 && $obj_obra->get('obra')->fecha_final_programada != $obj_obra->get('obra')->fecha_final_real)
                            <p class="text-xs text-center ocultar_periodo">Fecha de terminino modificada</p>
                            <p class="text-base font-semibold bg-gray-100 p-1 text-center ocultar_periodo">{{ date('d-m-Y', strtotime($obj_obra->get('obra')->fecha_final_real)) }}</p>
                            
                        @else
                            <p class="text-xs text-center ocultar_periodo">Fecha de terminino</p>
                            <p class="text-base font-semibold bg-gray-100 p-1 text-center ocultar_periodo">{{ date('d-m-Y', strtotime($obj_obra->get('obra')->fecha_final_programada)) }}</p>
                        @endif
                    </div>
                </div>

                @if($obj_obra->get('obra')->modalidad_ejecucion == 1)
                        <form action="{{ route('update_obra') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" id="formulario_periodo" class="hidden">
                            @csrf
                            @method('POST')
                            <div class="relative flex-auto">
                                <div id="datos_generales">
                                    <div class="grid grid-cols-8 gap-2">
                                        <div class="col-span-4">
                                            <p for="fecha_inicio" class="text-xs text-center">Fecha de inicio *</p>
                                            @if($acta_priorizacion == null)
                                                <input type="date" name="fecha_inicio" id="fecha_inicio" min="{{$obj_obra->get('obra')->ejercicio}}-01-01" max="{{$obj_obra->get('obra')->ejercicio}}-12-31" class="focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $obj_obra->get('obra')->fecha_inicio_programada }}">
                                            @else
                                                <input type="date" name="fecha_inicio" id="fecha_inicio" min="{{$acta_priorizacion->acta_priorizacion}}" max="{{$obj_obra->get('obra')->ejercicio}}-12-31" class="focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $obj_obra->get('obra')->fecha_inicio_programada }}">
                                            @endif
                                            <label id="error_fecha_inicio" class="hidden text-xs text-red-500" >Ingrese una fecha de inicio valida</label>
                                        </div>
                                        <div class="col-span-4">
                                            <p for="fecha_inicio" class="text-xs text-center">Fecha de fin *</p>
                                            @if($acta_priorizacion == null)
                                                <input type="date" name="fecha_fin" id="fecha_fin" min="{{$obj_obra->get('obra')->ejercicio}}-01-01" max="{{$obj_obra->get('obra')->ejercicio}}-12-31" class="focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $obj_obra->get('obra')->fecha_final_programada }}">
                                            @else
                                                <input type="date" name="fecha_fin" id="fecha_fin" min="{{$acta_priorizacion->acta_priorizacion}}" max="{{$obj_obra->get('obra')->ejercicio}}-12-31" class="focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $obj_obra->get('obra')->fecha_final_programada }}">
                                            @endif
                                            <label id="error_fecha_fin" class="hidden text-xs text-red-500" >Ingrese una fecha final valida</label>
                                        </div>
                                        <input type="number" name="obra_id" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $obj_obra->get('obra')->id_obra}}">
                                    </div>
                                </div>
                            </div>
                            <!--footer-->
                            <div class="rounded-b">
                                <div class="text-center">
                                    <button type="button" class="text-xs text-red-500 background-transparent font-semibold outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" onclick="ocultar_periodo()">
                                        Cancelar
                                    </button>
                                    <button id="guardar_btn_periodo" type="submit" class=" text-xs bg-transparent text-green-500  font-semibold rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="flex justify-center ocultar_periodo">
                            <button type="button" class="text-xs text-blue-500 underline background-transparent font-semibold outline-none focus:outline-none ease-linear transition-all duration-150" onclick="mostrar_periodo()">
                                Editar periodo de ejecución
                            </button>
                        </div>
                    @endif
                
                
            </div>
            
            <div class="col-span-12 sm:col-span-3">
                <p class="text-xs text-center">Fuente de financiamiento</p>                
                <table id="example1" class="table table-striped bg-white" style="width:100%;">
                    <tbody>
                        @foreach ($fuentes_financiamiento as $fuente)
                            <tr class="bg-gray-100">
                                <td>
                                    <p class="text-base font-semibold p-1 text-center">
                                        {{ $fuente->nombre_corto }}
                                    </p>
                                </td>
                                <td>
                                    <p class="text-base font-semibold p-1 text-center">
                                       $ {{ number_format($fuente->monto, 2) }}
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-span-12 sm:col-span-3">
                <p class="text-xs text-center ocultar_periodo">Modalidad de ejecución</p>
                @if ($obj_obra->get('obra')->modalidad_ejecucion == 2)
                    <p class="text-base font-semibold bg-gray-100 p-1 text-center ocultar_periodo">
                        Contrato
                    </p>
                @else
                    <p class="text-base font-semibold bg-gray-100 p-1 text-center ocultar_periodo">
                        Administración directa
                    </p>
                @endif
            </div>

            @if($obj_obra->get('obra')->modalidad_ejecucion == 2)
                <div class="col-span-12 sm:col-span-3">
                    <p class="text-xs text-center ocultar_periodo">Modalidad de contratación</p>
                    <p class="text-base font-semibold bg-gray-100 p-1 text-center ocultar_periodo">
                        @switch($obj_obra->get('contrato')->modalidad_asignacion)
                            @case(3)
                                Adjudicación directa
                            @break
                            @case(2)
                                Invitación a cuando menos tres contratistas
                            @break
                            @default
                                Licitación pública
                        @endswitch
                    </p>
                </div>
            @endif

            @if($obj_obra->get('obra')->anticipo_monto > 0)
                <div class="col-span-12 sm:col-span-3">
                    <p class="text-xs text-center ocultar_periodo">Monto de anticipo</p>
                    <p class="text-base font-semibold bg-gray-100 p-1 text-center ocultar_periodo">
                        $ {{number_format($obj_obra->get('obra')->anticipo_monto,2)}}
                    </p>
                </div>
                <div class="col-span-12 sm:col-span-3">
                    <p class="text-xs text-center ocultar_periodo">Total amortizado</p>
                    <p class="text-base font-semibold bg-gray-100 p-1 text-center ocultar_periodo">
                        $ {{number_format($total_pagado->total_anticipo,2)}}
                    </p>
                </div>
            @endif
            
            
            
            @if ($obj_obra->get('obra')->modalidad_ejecucion == 2)
                <div class="col-span-12">
                    <p class="text-xs text-center ocultar_periodo">Contratista</p>
                    <p class="text-base font-semibold bg-gray-100 p-1 text-center ocultar_periodo">
                        @if ($obj_obra->get('contrato')->razon_social != null)
                            {{ $obj_obra->get('contrato')->razon_social }}
                        @else
                            {{ $obj_obra->get('contrato')->nombre }} {{ $obj_obra->get('contrato')->apellidos }}
                        @endif
                    </p>
                </div>
            @endif
            
            <div class="col-span-12 sm:col-span-4">
                <p class="text-xs text-center ocultar_periodo">Avance fisico</p>
                <div class="flex justify-center modificar_af mt-2">
                    <div class="mkCharts" data-percent="{{round($obj_obra->get('obra')->avance_fisico,0)}}" data-color="rgb(59, 130, 246)" data-size="85" data-stroke="3" data-size="7"></div>    
                </div>
                
                <form action="{{ route('update_obra') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" id="formulario_af" class="hidden ml-5">
                    @csrf
                    @method('POST')
                    <div class="relative flex-auto">
                        <div>
                            <input type="number" min="0" max="100" name="avance_fisico" id="avance_fisico" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $obj_obra->get('obra')->avance_fisico}}">
                            <label id="error_avance_fisico" name="error_avance_fisico" class="hidden text-base font-normal text-red-500" >Ingrese avance fisico valido.</label>  
                            <input type="number" name="obra_id" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $obj_obra->get('obra')->id_obra}}">
                        </div>
                    </div>
                    <!--footer-->
                    <div class="rounded-b">
                        <div class="text-left">
                            <button type="button" class="text-red-500 background-transparent font-semibold  text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" onclick="ocultar_af()">
                                Cancelar
                            </button>
                            <button id="guardar_btn_af" type="submit" class="bg-transparent text-green-500  font-semibold text-sm rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                Guardar
                            </button>
                        </div>
                    </div>
                </form>
                <div class="modificar_af col-span-9 text-center">
                    <button type="button" class="text-xs text-blue-500 underline background-transparent font-semibold outline-none focus:outline-none ease-linear transition-all duration-150" onclick="modificar_af()">
                        Editar avance fisico
                    </button>
                    
                </div>
            </div>
            <div class="col-span-12 sm:col-span-4">
                <p class="text-xs text-center ocultar_periodo">Avance técnico:</p>
                <div class="flex justify-center modificar_af mt-2">
                    <div class="mkCharts" data-percent="{{round($obj_obra->get('obra')->avance_tecnico,0)}}" data-color="rgb(59, 130, 246)" data-size="85" data-stroke="2" font-size="7"></div>    
                </div>
            </div>
            <div class="col-span-12 sm:col-span-4">
                <p class="text-xs text-center ocultar_periodo">Avance economico</p>
                <div class="flex justify-center modificar_af mt-2">
                    <div class="mkCharts" data-percent="{{round($obj_obra->get('obra')->avance_economico,0)}}" data-color="rgb(59, 130, 246)" data-size="80" data-stroke="2"font-size="7"></div>    
                </div>
            </div>
            
            

            <div class="col-span-12">
                <div class="grid grid-cols-9 gap-4">
                    
                </div>
            </div>
            
        </div>
        <div class="mt-10">
            <div id="div-tabs-1" class="relative">
                <!--<div id="flecha-scroll-left">

                </div>
                <div id="flecha-scroll-right">

                </div>-->
                <div id="div-tabs" class="overflow-y-hidden overflow-x-visible relative">
                    
                    <ul class="tabs">
                        <li><a href="#tab1">Expediente técnico</a></li>
                        @if($obj_obra->get('obra')->modalidad_ejecucion == 2)
                            <li><a href="#tab2">Desglode de pagos</a></li>
                            <li><a href="#tab3">Estimaciones</a></li>
                            <li><a href="#tab4">Convenios modificatorios</a></li>
                        @endif
                        @if($obj_obra->get('obra')->modalidad_ejecucion == 1)
                            <li><a href="#tab2">Listas de raya</a></li>
                            <li><a href="#tab3">Contratos arrendamiento</a></li>
                            <li><a href="#tab4">Facturas</a></li>
                        @endif
                    </ul>
                    
                </div>
            </div>
            
            
           
            <div class="tab_container">
                <div class="tab_content" id="tab1">
                    
                    <p class="font-bold text-lg text-center">Integración del expediente técnico</p>
                    
                    <div class="flex justify-center">
                        <a type="button" href="{{ route('edit_expediente', [$obj_obra->get('obra')->id_obra]) }}" class="text-sm text-blue-500 underline background-transparent font-semibold outline-none focus:outline-none ease-linear transition-all duration-150 text-center">Modificar expediente técnico</a>
                    </div>
                    <div class="flex justify-center mt-2">
                        <a href="{{ route('imprimir', [$obj_obra->get('obra')->id_obra]) }}">
                            <i class="fas fa-file-arrow-down text-xl text-blue-500" ></i>
                        </a>
                        
                        <button type="button" href="" class="ml-1 text-sm text-blue-500 underline background-transparent font-semibold outline-none focus:outline-none ease-linear transition-all duration-150 text-center" onclick="toggleModal('modal-checklist')">
                            <i class="fas fa-file-arrow-up text-xl text-blue-500" ></i>
                        </button>
                        @if($obj_obra->get('obra')->nombre_archivo != null)
                            <a href="{{ $obj_obra->get('obra')->nombre_archivo }}" target="_blank" class="ml-1">
                                <i class="fas fa-file-pdf text-xl text-blue-500" ></i>
                            </a>
                        @endif
                    </div>
                    <div>
                        <!--PARTE SOCIAL DE LA INTEGRACION DEL EXPEDIENTE TECNICO-->
                        <div class="mt-4">
                            <div class="w-full ">
                                <div x-data={show:false}>
                                    <div class="bg-transparent relative" id="headingOne">
                                        <button @click="show=!show" type="button" style="width:100%;">
                                            <div>
                                                <div class="bg-gray-200">
                                                    <h2 class="font-bold text-base text-center">Parte social</h2>
                                                </div>
                                                <div class="icon-acordeon mr-3 flex justify-center">
                                                    <div x-show="!show" class="flex down-simbolo">
                                                        <img src="{{ asset('image/down.svg') }}" alt="Workflow">
                                                    </div>
                                                    <div x-show="show" class="flex up-simbolo">
                                                        <img src="{{ asset('image/up.svg') }}" alt="Workflow">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </button>
                                    </div>
                                    <div x-show="show" class="border mb-2 p-2">
                                        <div class="grid sm:grid-cols-8 gap-x-4 gap-y-2">
                                            <div class="border sm:col-span-4 p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none">
                                                            Acta de integración del Consejo de Desarrollo Municipal
                                                        </p>
                                                    </div>
                                                    <div class="col-estado ml-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->acta_integracion_consejo)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border sm:col-span-4  p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none ">Acta de selección de obras</p>
                                                    </div>
                                                    <div class="col-estado pl-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->acta_seleccion_obras)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border sm:col-span-4  p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none">Acta de priorización de obras, acciones sociales básicas e inversión.</p>
                                                    </div>
                                                    <div class="col-estado pl-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->acta_priorizacion_obras)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="border sm:col-span-4  p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none">Acta de integración del comité de obras.</p>
                                                    </div>
                                                    <div class="col-estado pl-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->acta_integracion_comite)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border sm:col-span-4 p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none">Convenio de concertación.</p>
                                                    </div>
                                                    <div class="col-estado pl-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->convenio_concertacion)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border sm:col-span-4  p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none">
                                                            {{$obj_obra->get('obra')->modalidad_ejecucion == 2?'Acta de excepción a la licitación pública.': 'Acta de acuerdo de cabildo para ejecutar la obra por Administracion Directa.'}}
                                                        </p>
                                                    </div>
                                                    <div class="col-estado pl-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->acta_excep_licitacion)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border sm:col-span-4  p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none">
                                                            Convenio celebrado con instancias Estatales y Federales para Mezcla de recursos, transferencias de recursos.
                                                        </p>
                                                    </div>
                                                    <div class="col-estado pl-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->convenio_mezcla)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border sm:col-span-4  p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none">
                                                            Acta de aprobacion y autorizacion de obras, acciones sociales e inversiones.
                                                        </p>
                                                    </div>
                                                    <div class="col-estado pl-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->acta_aprobacion_obra)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($obj_obra->get('obra')->modalidad_ejecucion == 2 && $obj_obra->get('contrato')->modalidad_asignacion == 3)
                                                <div class="border sm:col-span-4  p-2">
                                                    <div class="flex items-center h-full">
                                                        <div class="col-nombre">
                                                            <p class="dos-lineas text-sm leading-none">Acta para adjudicar la obra de manera directa.</p>
                                                        </div>
                                                        <div class="col-estado pl-2">
                                                            <div class="flex justify-center my-1">
                                                                @switch($obj_obra->get('social')->acta_ejecutar_adjudicacion)
                                                                @case(1)
                                                                <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                @break
                                                                @case(3)
                                                                <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                @break
                                                                @default
                                                                <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                @endswitch
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--FIN DE LA PARTE SOCIAL-->
                        <div class="bg-gray-200 mt-4">
                            <h2 class="font-bold text-base text-center">Parte técnica</h2>
                        </div>
                        <!--PROYECTO EJECUTIVO PARTE TÉCNICA-->
                        <div class=" mt-3">
                            <div class="w-full ">
                                <div x-data={show:false}>
                                    <div class="bg-transparent relative" id="headingOne">
                                        <button @click="show=!show" type="button" style="width:100%;">
                                            <div>
                                                <div class="bg-gray-200">
                                                    <h2 class="font-semibold text-base text-center">Proyecto ejecutivo</h2>
                                                </div>
                                                <div class="icon-acordeon mr-3 flex justify-center">
                                                    <div x-show="!show" class="flex down-simbolo">
                                                        <img src="{{ asset('image/down.svg') }}" alt="Workflow">
                                                    </div>
                                                    <div x-show="show" class="flex up-simbolo">
                                                        <img src="{{ asset('image/up.svg') }}" alt="Workflow">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </button>
                                    </div>
                                    <div x-show="show" class="border mb-2 p-2">
                                        <div class="grid sm:grid-cols-8 gap-x-4 gap-y-1">
                                            <div class="border sm:col-span-4 p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none">
                                                            Estudio de factibilidad técnica, económica y ecológica de la realización de la obra.
                                                        </p>
                                                    </div>
                                                    <div class="col-estado ml-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->estudio_factibilidad)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="border sm:col-span-4  p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none">
                                                            Oficio de notificación de aprobación y autorización de obras, acciones sociales básicas e inversiones.
                                                        </p>
                                                    </div>
                                                    <div class="col-estado pl-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->oficio_aprobacion_obra)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="border sm:col-span-4  p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none">
                                                            Anexos del oficio de notificación, de aprobación y autorización de obras, acciones sociales básicas e inversiones.
                                                        </p>
                                                    </div>
                                                    <div class="col-estado pl-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->anexos_oficio_notificacion)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="border sm:col-span-4  p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none">
                                                            Cédula de información básica.
                                                        </p>
                                                    </div>
                                                    <div class="col-estado pl-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->cedula_informacion_basica)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="border sm:col-span-4 p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none">
                                                            Generalidades de la inversión.
                                                        </p>
                                                    </div>
                                                    <div class="col-estado pl-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->generalidades_inversion)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="border sm:col-span-4  p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none">
                                                            Documentos que acrediten la tenencia de la tierra.
                                                        </p>
                                                    </div>
                                                    <div class="col-estado pl-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->tenencia_tierra)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="border sm:col-span-4  p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none">
                                                            Dictamen de impacto ambiental.
                                                        </p>
                                                    </div>
                                                    <div class="col-estado pl-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->dictamen_impacto_ambiental)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="border sm:col-span-4  p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none">
                                                            Presupuesto de obra programada.
                                                        </p>
                                                    </div>
                                                    <div class="col-estado pl-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->presupuesto_obra)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="border sm:col-span-4  p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none">
                                                            Catálogo de conceptos.
                                                        </p>
                                                    </div>
                                                    <div class="col-estado pl-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->catalogo_conceptos)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="border sm:col-span-4  p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none">
                                                            Explosión de insumos programada.
                                                        </p>
                                                    </div>
                                                    <div class="col-estado pl-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->explosion_insumos)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="border sm:col-span-4  p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none">
                                                            Generadores de obra programada.
                                                        </p>
                                                    </div>
                                                    <div class="col-estado pl-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->generadores_obra)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="border sm:col-span-4  p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none">
                                                            Planos del proyecto.
                                                        </p>
                                                    </div>
                                                    <div class="col-estado pl-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->planos_proyecto)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="border sm:col-span-4  p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none">
                                                            Especificaciones generales y particulares de construcción.
                                                        </p>
                                                    </div>
                                                    <div class="col-estado pl-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->especificaciones_generales_particulares)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="border sm:col-span-4  p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none">
                                                            Licencia del Director Responsable de Obra.
                                                        </p>
                                                    </div>
                                                    <div class="col-estado pl-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->dro)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="border sm:col-span-4  p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none">
                                                            Programa de obra e inversión.
                                                        </p>
                                                    </div>
                                                    <div class="col-estado pl-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->programa_obra_inversion)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="border sm:col-span-4  p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none">
                                                            Croquis de micro localización.
                                                        </p>
                                                    </div>
                                                    <div class="col-estado pl-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->croquis_macro)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="border sm:col-span-4  p-2">
                                                <div class="flex items-center h-full">
                                                    <div class="col-nombre">
                                                        <p class="dos-lineas text-sm leading-none">
                                                            Croquis de macro localización
                                                        </p>
                                                    </div>
                                                    <div class="col-estado pl-2">
                                                        <div class="flex justify-center my-1">
                                                            @switch($obj_obra->get('social')->croquis_micro)
                                                            @case(1)
                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                            @break
                                                            @case(3)
                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                            @break
                                                            @default
                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--FIN DEL PROYECTO EJECUTIVO PARTE TÉCNICA-->

                        <!--INICIO DEL PROCESO DE CONTRATACIÓN-->
                        @if ($obj_obra->get('obra')->modalidad_ejecucion == 2)
                            <div class=" mt-3">
                                <div class="w-full ">
                                    <div x-data={show:false}>
                                        <div class="bg-transparent relative" id="headingOne">
                                            <button @click="show=!show" type="button" style="width:100%;">
                                                <div>
                                                    <div class="bg-gray-200">
                                                        <h2 class="font-semibold text-base text-center">Proceso de contratación</h2>
                                                    </div>
                                                    <div class="icon-acordeon mr-3 flex justify-center">
                                                        <div x-show="!show" class="flex down-simbolo">
                                                            <img src="{{ asset('image/down.svg') }}" alt="Workflow">
                                                        </div>
                                                        <div x-show="show" class="flex up-simbolo">
                                                            <img src="{{ asset('image/up.svg') }}" alt="Workflow">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </button>
                                        </div>
                                        <div x-show="show" class="border mb-2 p-2">
                                            <div class="grid sm:grid-cols-8 gap-x-4 gap-y-1 mt-3">
                                                
                                                    <div class="border sm:col-span-4 p-2">
                                                        <div class="flex items-center h-full">
                                                            <div class="col-nombre">
                                                                <p class="dos-lineas text-sm leading-none"> 
                                                                    Inscripción al padrón de contratista.
                                                                </p>
                                                            </div>
                                                            <div class="col-estado ml-2">
                                                                <div class="flex justify-center my-1">
                                                                    @switch($obj_obra->get('contrato')->padron_contratistas)
                                                                    @case(1)
                                                                    <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @case(3)
                                                                    <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @default
                                                                    <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="border sm:col-span-4  p-2">
                                                        <div class="flex items-center h-full">
                                                            <div class="col-nombre">
                                                                <p  class="dos-lineas text-sm leading-none">
                                                                    Invitaciones (con acuses de recepción)
                                                                </p>
                                                            </div>
                                                            <div class="col-estado pl-2">
                                                                <div class="flex justify-center my-1">
                                                                    @switch($obj_obra->get('contrato')->invitacion_acuse_recepcion)
                                                                    @case(1)
                                                                    <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @case(3)
                                                                    <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @default
                                                                    <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="border sm:col-span-4  p-2">
                                                        <div class="flex items-center h-full">
                                                            <div class="col-nombre">
                                                                <p  class="dos-lineas text-sm leading-none">
                                                                    Oficio de aceptación de la invitación (con acuses de recepción)
                                                                </p>
                                                            </div>
                                                            <div class="col-estado pl-2">
                                                                <div class="flex justify-center my-1">
                                                                    @switch($obj_obra->get('contrato')->aceptacion_invitacion)
                                                                    @case(1)
                                                                    <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @case(3)
                                                                    <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @default
                                                                    <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @if ($obj_obra->get('contrato')->modalidad_asignacion != 3)
                                                    
                                                    <div class="border sm:col-span-4  p-2">
                                                        <div class="flex items-center h-full">
                                                            <div class="col-nombre">
                                                                <p class="dos-lineas text-sm leading-none">
                                                                    Bases de licitacion (con anexos).
                                                                </p>
                                                            </div>
                                                            <div class="col-estado pl-2">
                                                                <div class="flex justify-center my-1">
                                                                    @switch($obj_obra->get('licitacion')->bases_licitacion)
                                                                    @case(1)
                                                                    <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @case(3)
                                                                    <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @default
                                                                    <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="border sm:col-span-4 p-2">
                                                        <div class="flex items-center h-full">
                                                            <div class="col-nombre">
                                                                <p class="dos-lineas text-sm leading-none">
                                                                    Constancia de visita o de conocer el sitio donde se ejecutará la obra.
                                                                </p>
                                                            </div>
                                                            <div class="col-estado pl-2">
                                                                <div class="flex justify-center my-1">
                                                                    @switch($obj_obra->get('licitacion')->constancia_visita)
                                                                    @case(1)
                                                                    <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @case(3)
                                                                    <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @default
                                                                    <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="border sm:col-span-4  p-2">
                                                        <div class="flex items-center h-full">
                                                            <div class="col-nombre">
                                                                <p class="dos-lineas text-sm leading-none">
                                                                    Acta de la junta de aclaraciones.
                                                                </p>
                                                            </div>
                                                            <div class="col-estado pl-2">
                                                                <div class="flex justify-center my-1">
                                                                    @switch($obj_obra->get('licitacion')->acta_junta_aclaraciones)
                                                                    @case(1)
                                                                    <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @case(3)
                                                                    <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @default
                                                                    <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="border sm:col-span-4  p-2">
                                                        <div class="flex items-center h-full">
                                                            <div class="col-nombre">
                                                                <p class="dos-lineas text-sm leading-none">
                                                                    Acta de apertura técnica.
                                                                </p>
                                                            </div>
                                                            <div class="col-estado pl-2">
                                                                <div class="flex justify-center my-1">
                                                                    @switch($obj_obra->get('licitacion')->acta_apertura_tecnica)
                                                                    @case(1)
                                                                    <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @case(3)
                                                                    <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @default
                                                                    <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="border sm:col-span-4  p-2">
                                                        <div class="flex items-center h-full">
                                                            <div class="col-nombre">
                                                                <p class="dos-lineas text-sm leading-none">
                                                                    Dictamen técnico y análisis detallado.
                                                                </p>
                                                            </div>
                                                            <div class="col-estado pl-2">
                                                                <div class="flex justify-center my-1">
                                                                    @switch($obj_obra->get('licitacion')->dictamen_tecnico)
                                                                    @case(1)
                                                                    <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @case(3)
                                                                    <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @default
                                                                    <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="border sm:col-span-4  p-2">
                                                        <div class="flex items-center h-full">
                                                            <div class="col-nombre">
                                                                <p class="dos-lineas text-sm leading-none">
                                                                    Acta de apertura económica.
                                                                </p>
                                                            </div>
                                                            <div class="col-estado pl-2">
                                                                <div class="flex justify-center my-1">
                                                                    @switch($obj_obra->get('licitacion')->acta_apertura_economica)
                                                                    @case(1)
                                                                    <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @case(3)
                                                                    <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @default
                                                                    <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="border sm:col-span-4  p-2">
                                                        <div class="flex items-center h-full">
                                                            <div class="col-nombre">
                                                                <p class="dos-lineas text-sm leading-none">
                                                                    Dictamen económico y análisis detallado
                                                                </p>
                                                            </div>
                                                            <div class="col-estado pl-2">
                                                                <div class="flex justify-center my-1">
                                                                    @switch($obj_obra->get('licitacion')->dictamen_economico)
                                                                    @case(1)
                                                                    <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @case(3)
                                                                    <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @default
                                                                    <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="border sm:col-span-4  p-2">
                                                        <div class="flex items-center h-full">
                                                            <div class="col-nombre">
                                                                <p class="dos-lineas text-sm leading-none">
                                                                    Dictamen
                                                                </p>
                                                            </div>
                                                            <div class="col-estado pl-2">
                                                                <div class="flex justify-center my-1">
                                                                    @switch($obj_obra->get('licitacion')->dictamen)
                                                                    @case(1)
                                                                    <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @case(3)
                                                                    <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @default
                                                                    <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="border sm:col-span-4  p-2">
                                                        <div class="flex items-center h-full">
                                                            <div class="col-nombre">
                                                                <p class="dos-lineas text-sm leading-none">
                                                                    Acta de fallo
                                                                </p>
                                                            </div>
                                                            <div class="col-estado pl-2">
                                                                <div class="flex justify-center my-1">
                                                                    @switch($obj_obra->get('licitacion')->acta_fallo)
                                                                    @case(1)
                                                                    <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @case(3)
                                                                    <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @default
                                                                    <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="border sm:col-span-4  p-2">
                                                        <div class="flex items-center h-full">
                                                            <div class="col-nombre">
                                                                <p class="dos-lineas text-sm leading-none">
                                                                    Propuesta económica de los licitantes.
                                                                </p>
                                                            </div>
                                                            <div class="col-estado pl-2">
                                                                <div class="flex justify-center my-1">
                                                                    @switch($obj_obra->get('licitacion')->propuesta_licitantes_economica)
                                                                    @case(1)
                                                                    <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @case(3)
                                                                    <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @default
                                                                    <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="border sm:col-span-4  p-2">
                                                        <div class="flex items-center h-full">
                                                            <div class="col-nombre">
                                                                <p class="dos-lineas text-sm leading-none">
                                                                    Propuesta técnica de los licitantes.
                                                                </p>
                                                            </div>
                                                            <div class="col-estado pl-2">
                                                                <div class="flex justify-center my-1">
                                                                    @switch($obj_obra->get('licitacion')->propuesta_licitantes_tecnica)
                                                                    @case(1)
                                                                    <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @case(3)
                                                                    <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @default
                                                                    <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                    <div class="border sm:col-span-4  p-2">
                                                        <div class="flex items-center h-full">
                                                            <div class="col-nombre">
                                                                <p class="dos-lineas text-sm leading-none">
                                                                    Contrato                                                         
                                                                    @if ($obj_obra->get('contrato')->contrato_tipo == 1) <span class="font-bold">(Precios unitarios)</span> @endif
                                                                    @if ($obj_obra->get('contrato')->contrato_tipo == 2) (Precios Alzados) @endif.
                                                                </p>
                                                            </div>
                                                            <div class="col-estado pl-2">
                                                                <div class="flex justify-center my-1">
                                                                    @switch($obj_obra->get('contrato')->contrato)
                                                                    @case(1)
                                                                    <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @case(3)
                                                                    <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @default
                                                                    <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="border sm:col-span-4  p-2">
                                                        <div class="flex items-center h-full">
                                                            <div class="col-nombre">
                                                                <p class="dos-lineas text-sm leading-none">
                                                                    Oficio justificatorio para convenio modificatorio.
                                                                </p>
                                                            </div>
                                                            <div class="col-estado pl-2">
                                                                <div class="flex justify-center my-1">
                                                                    @switch($obj_obra->get('contrato')->oficio_justificativo_convenio_modificatorio)
                                                                    @case(1)
                                                                    <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @case(3)
                                                                    <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @default
                                                                    <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @if($convenios->first() != null)
                                                    <div class="border sm:col-span-8  p-2 mt-4">
                                                        <div class="flex items-center justify-center mb-3">
                                                            <div>
                                                                <p class="font-bold dos-lineas">
                                                                    Convenios modificatorios
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="grid sm:grid-cols-8 gap-x-4 gap-y-1">
                                                            @foreach ($convenios as  $convenio)
                                                                <div class="border sm:col-span-4 p-2 mt-1">
                                                                    <div class="flex items-center  h-full">
                                                                        <div class="col-nombre text-sm leading-none">
                                                                            <p>
                                                                                Convenio modificatorio
                                                                                @switch($convenio->tipo)
                                                                                    @case(1)
                                                                                        al monto del contrato
                                                                                    @break
                                                                                    @case(2)
                                                                                        al plazo del contrato
                                                                                    @break
                                                                                    @default
                                                                                        al monto y plazo del contrato
                                                                                @endswitch
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-estado pl-2">
                                                                            <div class="flex justify-center my-1">
                                                                                @switch($convenio->agregado_expediente)
                                                                                @case(1)
                                                                                <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                                @break
                                                                                @case(3)
                                                                                <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                                @break
                                                                                @default
                                                                                <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                                @endswitch
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif   
                                                    <div class="border sm:col-span-8 p-2 mt-4">
                                                        <div class="flex items-center justify-center mb-3">
                                                            <div>
                                                                <p class="font-bold dos-lineas">
                                                                    Anexos del contrato
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="grid sm:grid-cols-8 gap-x-4 gap-y-1">
                                                            <div class="border sm:col-span-4 p-2 mt-1">
                                                                <div class="flex items-center  h-full">
                                                                    <div class="col-nombre text-sm leading-none">
                                                                        <p>
                                                                            Catálogo de conceptos.
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-estado pl-2">
                                                                        <div class="flex justify-center my-1">
                                                                            @switch($obj_obra->get('contrato')->catalogo_conceptos)
                                                                            @case(1)
                                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                            @break
                                                                            @case(3)
                                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                            @break
                                                                            @default
                                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                            @endswitch
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="border sm:col-span-4 p-2 mt-1">
                                                                <div class="flex items-center  h-full">
                                                                    <div class="col-nombre">
                                                                        <p class="dos-lineas text-sm leading-none">
                                                                            Análisis de precios unitarios.
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-estado pl-2">
                                                                        <div class="flex justify-center my-1">
                                                                            @switch($obj_obra->get('contrato')->analisis_p_u)
                                                                            @case(1)
                                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                            @break
                                                                            @case(3)
                                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                            @break
                                                                            @default
                                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                            @endswitch
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="border sm:col-span-4 p-2 mt-1">
                                                                <div class="flex items-center  h-full">
                                                                    <div class="col-nombre">
                                                                        <p class="dos-lineas text-sm leading-none">
                                                                            Calendario de la ejecución de los trabajos.
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-estado pl-2">
                                                                        <div class="flex justify-center my-1">
                                                                            @switch($obj_obra->get('contrato')->montos_mensuales_ejecutados)
                                                                            @case(1)
                                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                            @break
                                                                            @case(3)
                                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                            @break
                                                                            @default
                                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                            @endswitch
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>                                      
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!--FIN DEL PROCESO DE CONTRATACIÓN-->

                        <!--INICIO DE DOCUMENTACIÓN COMPROBATORIA-->
                        <div class=" mt-3">
                            <div class="w-full ">
                                <div x-data={show:false}>
                                    <div class="bg-transparent relative" id="headingOne">
                                        <button @click="show=!show" type="button" style="width:100%;">
                                            <div>
                                                <div class="bg-gray-200">
                                                    <h2 class="font-semibold text-base text-center">Documentación comprobatoria</h2>
                                                </div>
                                                <div class="icon-acordeon mr-3 flex justify-center">
                                                    <div x-show="!show" class="flex down-simbolo">
                                                        <img src="{{ asset('image/down.svg') }}" alt="Workflow">
                                                    </div>
                                                    <div x-show="show" class="flex up-simbolo">
                                                        <img src="{{ asset('image/up.svg') }}" alt="Workflow">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </button>
                                    </div>
                                    <div x-show="show" class="border mb-2 p-2">
                                        <div class="grid sm:grid-cols-8 gap-x-4 gap-y-1 mt-3">
                                            @if ($obj_obra->get('obra')->modalidad_ejecucion == 2)
                                                <div class="border sm:col-span-4 p-2">
                                                    <div class="flex items-center h-full">
                                                        <div class="col-nombre">
                                                            <p  class="dos-lineas text-sm leading-none">
                                                                Asignacion mediante oficio del Superintendente de obra.
                                                            </p>
                                                        </div>
                                                        <div class="col-estado ml-2">
                                                            <div class="flex justify-center my-1">
                                                                @switch($obj_obra->get('contrato')->oficio_superintendente)
                                                                @case(1)
                                                                <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                @break
                                                                @case(3)
                                                                <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                @break
                                                                @default
                                                                <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                @endswitch
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="border sm:col-span-4  p-2">
                                                    <div class="flex items-center h-full">
                                                        <div class="col-nombre">
                                                            <p class="dos-lineas text-sm leading-none">
                                                                Asignacion mediante oficio del residente de obra.
                                                            </p>
                                                        </div>
                                                        <div class="col-estado pl-2">
                                                            <div class="flex justify-center my-1">
                                                                @switch($obj_obra->get('contrato')->oficio_residente_obra)
                                                                @case(1)
                                                                <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                @break
                                                                @case(3)
                                                                <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                @break
                                                                @default
                                                                <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                @endswitch
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="border sm:col-span-4  p-2">
                                                    <div class="flex items-center h-full">
                                                        <div class="col-nombre">
                                                            <p class="dos-lineas text-sm leading-none">
                                                                Oficio emitido por la ejecutora dirigido al contratista por la disposición del inmueble.
                                                            </p>
                                                        </div>
                                                        <div class="col-estado pl-2">
                                                            <div class="flex justify-center my-1">
                                                                @switch($obj_obra->get('contrato')->oficio_disposicion_inmueble)
                                                                @case(1)
                                                                <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                @break
                                                                @case(3)
                                                                <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                @break
                                                                @default
                                                                <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                @endswitch
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="border sm:col-span-4  p-2">
                                                    <div class="flex items-center h-full">
                                                        <div class="col-nombre">
                                                            <p class="dos-lineas text-sm leading-none">
                                                                Notificacion de inicio de obra.
                                                            </p>
                                                        </div>
                                                        <div class="col-estado pl-2">
                                                            <div class="flex justify-center my-1">
                                                                @switch($obj_obra->get('contrato')->oficio_inicio_obra)
                                                                @case(1)
                                                                <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                @break
                                                                @case(3)
                                                                <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                @break
                                                                @default
                                                                <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                @endswitch
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="border sm:col-span-4  p-2">
                                                    <div class="flex items-center h-full">
                                                        <div class="col-nombre">
                                                            <p class="dos-lineas text-sm leading-none">
                                                                Factura de anticipo: <span class="font-bold">{{ $obj_obra->get('contrato')->factura_anticipo }}</span>
                                                                <br>
                                                                Importe: <span class="font-bold">$ {{ number_format($obj_obra->get('obra')->anticipo_porcentaje * 0.01 * $obj_obra->get('obra')->monto_contratado, 2) }}</span>
                                                            </p>
                                                        </div>
                                                        <div class="col-estado pl-2">
                                                            <div class="flex justify-center my-1">
                                                                @switch($obj_obra->get('contrato')->exp_factura_anticipo)
                                                                @case(1)
                                                                <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                @break
                                                                @case(3)
                                                                <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                @break
                                                                @default
                                                                <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                @endswitch
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if($estimaciones->first() != null)
                                                    <div class="border sm:col-span-8 p-2 mt-4">
                                                        <div class="flex items-center justify-center mb-3">
                                                            <div>
                                                                <p class="font-bold">
                                                                    Estimaciones
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="grid sm:grid-cols-8 gap-x-4 gap-y-1">
                                                            @foreach ($estimaciones as $key => $estimacion)
                                                                <div class="sm:col-span-4 mt-1">
                                                                    <div>
                                                                        <div class="w-full ">
                                                                            <div x-data={show:false}>
                                                                                <div class="bg-transparent relative">
                                                                                    <button @click="show=!show" type="button" style="width:100%;">
                                                                                        <div class="border p-2">
                                                                                            <div>
                                                                                                <p class="font-bold text-base text-center">
                                                                                                    {{ $estimacion->nombre }}
                                                                                                    @if ($estimacion->finiquito == 1)
                                                                                                        y finiquito
                                                                                                    @endif
                                                                                                </p>
                                                                                            </div>
                                                                                            <div class="icon-acordeon-1 mr-3 flex justify-center">
                                                                                                <div x-show="!show" class="flex down-simbolo">
                                                                                                    <img src="{{ asset('image/down.svg') }}" alt="Workflow">
                                                                                                </div>
                                                                                                <div x-show="show" class="flex up-simbolo">
                                                                                                    <img src="{{ asset('image/up.svg') }}" alt="Workflow">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        
                                                                                    </button>
                                                                                </div>
                                                                                <div x-show="show" class="border-l-1 border-r-1 border-b-1 mb-2 p-2">
                                                                                    <div class="grid sm:grid-cols-8 gap-x-4 gap-y-1 mt-3">
                                                                                        
                                                                                            <div class="border sm:col-span-8 p-2">
                                                                                                <div class="flex items-center h-full">
                                                                                                    <div class="col-nombre">
                                                                                                        <p class="dos-lineas text-sm leading-none">
                                                                                                            Factura de la estimación.
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-estado ml-2">
                                                                                                        <div class="flex justify-center my-1">
                                                                                                            @switch($estimacion->factura_estimacion)
                                                                                                            @case(1)
                                                                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                                                            @break
                                                                                                            @case(3)
                                                                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                                                            @break
                                                                                                            @default
                                                                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                                                            @endswitch
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            
                                                                                            <div class="border sm:col-span-8 p-2">
                                                                                                <div class="flex items-center h-full">
                                                                                                    <div class="col-nombre">
                                                                                                        <p class="dos-lineas text-sm leading-none">
                                                                                                            Presupuesto de la estimación.
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-estado ml-2">
                                                                                                        <div class="flex justify-center my-1">
                                                                                                            @switch($estimacion->presupuesto_estimacion)
                                                                                                            @case(1)
                                                                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                                                            @break
                                                                                                            @case(3)
                                                                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                                                            @break
                                                                                                            @default
                                                                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                                                            @endswitch
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            
                                                                                            <div class="border sm:col-span-8 p-2">
                                                                                                <div class="flex items-center h-full">
                                                                                                    <div class="col-nombre">
                                                                                                        <p class="dos-lineas text-sm leading-none">
                                                                                                            Carátula de estimación.
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-estado ml-2">
                                                                                                        <div class="flex justify-center my-1">
                                                                                                            @switch($estimacion->caratula_estimacion)
                                                                                                            @case(1)
                                                                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                                                            @break
                                                                                                            @case(3)
                                                                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                                                            @break
                                                                                                            @default
                                                                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                                                            @endswitch
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="border sm:col-span-8 p-2">
                                                                                                <div class="flex items-center h-full">
                                                                                                    <div class="col-nombre">
                                                                                                        <p class="dos-lineas text-sm leading-none">
                                                                                                            Cuerpo de estimación.
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-estado ml-2">
                                                                                                        <div class="flex justify-center my-1">
                                                                                                            @switch($estimacion -> cuerpo_estimacion)
                                                                                                            @case(1)
                                                                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                                                            @break
                                                                                                            @case(3)
                                                                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                                                            @break
                                                                                                            @default
                                                                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                                                            @endswitch
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="border sm:col-span-8 p-2">
                                                                                                <div class="flex items-center h-full">
                                                                                                    <div class="col-nombre">
                                                                                                        <p class="dos-lineas text-sm leading-none">
                                                                                                            Resumen de estimación.
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-estado ml-2">
                                                                                                        <div class="flex justify-center my-1">
                                                                                                            @switch($estimacion -> resumen_estimacion)
                                                                                                            @case(1)
                                                                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                                                            @break
                                                                                                            @case(3)
                                                                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                                                            @break
                                                                                                            @default
                                                                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                                                            @endswitch
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="border sm:col-span-8 p-2">
                                                                                                <div class="flex items-center h-full">
                                                                                                    <div class="col-nombre">
                                                                                                        <p class="dos-lineas text-sm leading-none">
                                                                                                            Estado de cuenta de estimación.
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-estado ml-2">
                                                                                                        <div class="flex justify-center my-1">
                                                                                                            @switch($estimacion->estado_cuenta_estimacion)
                                                                                                            @case(1)
                                                                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                                                            @break
                                                                                                            @case(3)
                                                                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                                                            @break
                                                                                                            @default
                                                                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                                                            @endswitch
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="border sm:col-span-8 p-2">
                                                                                                <div class="flex items-center h-full">
                                                                                                    <div class="col-nombre">
                                                                                                        <p class="dos-lineas text-sm leading-none">
                                                                                                            Número generadores de estimación.
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-estado ml-2">
                                                                                                        <div class="flex justify-center my-1">
                                                                                                            @switch($estimacion->numero_generadores_estimacion)
                                                                                                            @case(1)
                                                                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                                                            @break
                                                                                                            @case(3)
                                                                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                                                            @break
                                                                                                            @default
                                                                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                                                            @endswitch
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="border sm:col-span-8 p-2">
                                                                                                <div class="flex items-center h-full">
                                                                                                    <div class="col-nombre">
                                                                                                        <p class="dos-lineas text-sm leading-none">
                                                                                                            Corquis de localización de estimación.
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-estado ml-2">
                                                                                                        <div class="flex justify-center my-1">
                                                                                                            @switch($estimacion->croquis_ilustrativo_estimacion)
                                                                                                            @case(1)
                                                                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                                                            @break
                                                                                                            @case(3)
                                                                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                                                            @break
                                                                                                            @default
                                                                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                                                            @endswitch
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="border sm:col-span-8 p-2">
                                                                                                <div class="flex items-center h-full">
                                                                                                    <div class="col-nombre">
                                                                                                        <p class="dos-lineas text-sm leading-none">
                                                                                                            Soporte fotográfico de estimación.
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-estado ml-2">
                                                                                                        <div class="flex justify-center my-1">
                                                                                                            @switch($estimacion->reporte_fotografico_estimacion)
                                                                                                            @case(1)
                                                                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                                                            @break
                                                                                                            @case(3)
                                                                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                                                            @break
                                                                                                            @default
                                                                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                                                            @endswitch
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="border sm:col-span-8 p-2">
                                                                                                <div class="flex items-center h-full">
                                                                                                    <div class="col-nombre">
                                                                                                        <p class="dos-lineas text-sm leading-none">
                                                                                                            Notas de bitácora.
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-estado ml-2">
                                                                                                        <div class="flex justify-center my-1">
                                                                                                            @switch($estimacion->notas_bitacora)
                                                                                                            @case(1)
                                                                                                            <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                                                            @break
                                                                                                            @case(3)
                                                                                                            <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                                                            @break
                                                                                                            @default
                                                                                                            <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                                                            @endswitch
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="border sm:col-span-8 p-2 mt-4">
                                                    <div class="flex items-center justify-center mb-3">
                                                        <div>
                                                            <p class="font-bold">
                                                                Garantías
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="grid sm:grid-cols-8 gap-x-4 gap-y-1">
                                                        <div class="border sm:col-span-4 p-2 mt-1">
                                                            <div class="flex items-center  h-full">
                                                                <div class="col-nombre">
                                                                    <p class="dos-lineas text-sm leading-none">
                                                                        Fianza de anticipo: <span class="font-bold">{{ $obj_obra->get('contrato')->fianza_anticipo }}</span>
                                                                    </p>
                                                                </div>
                                                                <div class="col-estado pl-2">
                                                                    <div class="flex justify-center my-1">
                                                                        @switch($obj_obra->get('contrato')->exp_fianza_anticipo)
                                                                        @case(1)
                                                                        <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                        @break
                                                                        @case(3)
                                                                        <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                        @break
                                                                        @default
                                                                        <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                        @endswitch
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="border sm:col-span-4 p-2 mt-1">
                                                            <div class="flex items-center  h-full">
                                                                <div class="col-nombre">
                                                                    <p class="dos-lineas text-sm leading-none">
                                                                        Fianza de cumplimiento: <span class="font-bold">{{ $obj_obra->get('contrato')->fianza_cumplimiento }}</span>
                                                                    </p>
                                                                </div>
                                                                <div class="col-estado pl-2">
                                                                    <div class="flex justify-center my-1">
                                                                        @switch($obj_obra->get('contrato')->exp_fianza_cumplimiento)
                                                                        @case(1)
                                                                        <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                        @break
                                                                        @case(3)
                                                                        <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                        @break
                                                                        @default
                                                                        <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                        @endswitch
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="border sm:col-span-4 p-2 mt-1">
                                                            <div class="flex items-center  h-full">
                                                                <div class="col-nombre">
                                                                    <p class="dos-lineas text-sm leading-none">
                                                                        Fianza de vicios ocultos: <span class="font-bold">{{ $obj_obra->get('contrato')->fianza_v_o }}</span>
                                                                    </p>
                                                                </div>
                                                                <div class="col-estado pl-2">
                                                                    <div class="flex justify-center my-1">
                                                                        @switch($obj_obra->get('contrato')->exp_fianza_v_o)
                                                                        @case(1)
                                                                        <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                        @break
                                                                        @case(3)
                                                                        <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                        @break
                                                                        @default
                                                                        <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                        @endswitch
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                            @else
                                                <div class="border sm:col-span-4 p-2">
                                                    <div class="flex items-center h-full">
                                                        <div class="col-nombre">
                                                            <p  class="dos-lineas text-sm leading-none">
                                                                Inventario de la maquinaria y equipo de construcción con que cuenta el municipio.
                                                            </p>
                                                        </div>
                                                        <div class="col-estado ml-2">
                                                            <div class="flex justify-center my-1">
                                                                @switch($obj_obra->get('admin')->inventario_maquinaria_construccion)
                                                                @case(1)
                                                                <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                @break
                                                                @case(3)
                                                                <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                @break
                                                                @default
                                                                <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                @endswitch
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="border sm:col-span-4 p-2">
                                                    <div class="flex items-center h-full">
                                                        <div class="col-nombre">
                                                            <p  class="dos-lineas text-sm leading-none">
                                                                Relacion de la plantilla del personal tecnico y administrativo relacionado con la obra
                                                            </p>
                                                        </div>
                                                        <div class="col-estado ml-2">
                                                            <div class="flex justify-center my-1">
                                                                @switch($obj_obra->get('admin')->plantilla_personal)
                                                                @case(1)
                                                                <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                @break
                                                                @case(3)
                                                                <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                @break
                                                                @default
                                                                <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                @endswitch
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="border sm:col-span-4 p-2">
                                                    <div class="flex items-center h-full">
                                                        <div class="col-nombre">
                                                            <p  class="dos-lineas text-sm leading-none">
                                                                Identificacion oficial de los trabajadores que aparecen en las listas de raya
                                                            </p>
                                                        </div>
                                                        <div class="col-estado ml-2">
                                                            <div class="flex justify-center my-1">
                                                                @switch($obj_obra->get('admin')->indentificacion_oficial_trabajadores)
                                                                @case(1)
                                                                <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                @break
                                                                @case(3)
                                                                <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                @break
                                                                @default
                                                                <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                @endswitch
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="border sm:col-span-4 p-2">
                                                    <div class="flex items-center h-full">
                                                        <div class="col-nombre">
                                                            <p  class="dos-lineas text-sm leading-none">
                                                                Reporte fotográfico.
                                                            </p>
                                                        </div>
                                                        <div class="col-estado ml-2">
                                                            <div class="flex justify-center my-1">
                                                                @switch($obj_obra->get('admin')->reporte_fotografico)
                                                                @case(1)
                                                                <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                @break
                                                                @case(3)
                                                                <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                @break
                                                                @default
                                                                <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                @endswitch
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="border sm:col-span-4 p-2">
                                                    <div class="flex items-center h-full">
                                                        <div class="col-nombre">
                                                            <p  class="dos-lineas text-sm leading-none">
                                                                Notas de bitácora.
                                                            </p>
                                                        </div>
                                                        <div class="col-estado ml-2">
                                                            <div class="flex justify-center my-1">
                                                                @switch($obj_obra->get('admin')->notas_bitacora)
                                                                @case(1)
                                                                <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                @break
                                                                @case(3)
                                                                <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                @break
                                                                @default
                                                                <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                @endswitch
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="border sm:col-span-4 p-2">
                                                    <div class="flex items-center h-full">
                                                        <div class="col-nombre">
                                                            <p  class="dos-lineas text-sm leading-none">
                                                                Acta de entrega recepción.
                                                            </p>
                                                        </div>
                                                        <div class="col-estado ml-2">
                                                            <div class="flex justify-center my-1">
                                                                @switch($obj_obra->get('admin')->acta_entrega_municipio)
                                                                @case(1)
                                                                <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                @break
                                                                @case(3)
                                                                <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                @break
                                                                @default
                                                                <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                @endswitch
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="border sm:col-span-4 p-2">
                                                    <div class="flex items-center h-full">
                                                        <div class="col-nombre">
                                                            <p  class="dos-lineas text-sm leading-none">
                                                                Cédula detallada de facturación total de la obra.
                                                            </p>
                                                        </div>
                                                        <div class="col-estado ml-2">
                                                            <div class="flex justify-center my-1">
                                                                @switch($obj_obra->get('admin')->cedula_detallada_facturacion)
                                                                @case(1)
                                                                <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                @break
                                                                @case(3)
                                                                <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                @break
                                                                @default
                                                                <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                @endswitch
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if($listas_raya->first() != null)
                                                    <div class="border sm:col-span-8  p-2 mt-4">
                                                        <div class="flex items-center justify-center mb-3">
                                                            <div>
                                                                <p class="font-bold dos-lineas ">
                                                                    Listas de raya
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="grid sm:grid-cols-8 gap-x-4 gap-y-1">
                                                            @foreach ($listas_raya as $key => $lista)
                                                                <div class="border sm:col-span-4 p-2 mt-1">
                                                                    <div class="flex items-center  h-full">
                                                                        <div class="col-nombre">
                                                                            <p class="dos-lineas text-sm leading-none">
                                                                               Lista de raya {{$lista->numero_lista_raya}}<br> Del {{date('d-m-Y', strtotime($lista->fecha_inicio))}} al {{date('d-m-Y', strtotime($lista->fecha_fin))}}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-estado pl-2">
                                                                            <div class="flex justify-center my-1">
                                                                                @switch($lista->agregado_expediente)
                                                                                @case(1)
                                                                                <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                                @break
                                                                                @case(3)
                                                                                <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                                @break
                                                                                @default
                                                                                <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                                @endswitch
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif 

                                                @if($facturas->first() != null)
                                                    <div class="border sm:col-span-8  p-2 mt-4">
                                                        <div class="flex items-center justify-center mb-3">
                                                            <div>
                                                                <p class="font-bold dos-lineas">
                                                                    Facturas
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="grid sm:grid-cols-8 gap-x-4 gap-y-1">
                                                            @foreach ($facturas as $key => $factura)
                                                                <div class="border sm:col-span-4 p-2 mt-1">
                                                                    <div class="flex items-center  h-full">
                                                                        <div class="col-nombre text-sm leading-none">
                                                                            <p>
                                                                               Factura  {{$factura->folio_fiscal}}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-estado pl-2">
                                                                            <div class="flex justify-center my-1">
                                                                                @switch($factura->agregado_expediente)
                                                                                @case(1)
                                                                                <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                                @break
                                                                                @case(3)
                                                                                <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                                @break
                                                                                @default
                                                                                <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                                @endswitch
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif 

                                                @if($contratos_arrendamiento->first() != null)
                                                
                                                    <div class="border sm:col-span-8  p-2 mt-4">
                                                        <div class="flex items-center justify-center mb-3">
                                                            <div>
                                                                <p class="font-bold dos-lineas">
                                                                    Contratos de arrendamiento
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="grid sm:grid-cols-8 gap-x-4 gap-y-1">
                                                            @foreach ($contratos_arrendamiento as $contrato)
                                                                <div class="border sm:col-span-4 p-2 mt-1">
                                                                    <div class="flex items-center  h-full">
                                                                        <div class="col-nombre text-sm leading-none">
                                                                            <p>
                                                                               Contrato {{$contrato->numero_contrato}}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-estado pl-2">
                                                                            <div class="flex justify-center my-1">
                                                                                @switch($contrato->agregado_expediente)
                                                                                @case(1)
                                                                                <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                                @break
                                                                                @case(3)
                                                                                <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                                @break
                                                                                @default
                                                                                <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                                @endswitch
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif 
                                            @endif
                                                 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--FIN DE DOCUMENTACIÓN COMPROBATORIA-->

                        <!--INICIO DE TERMINACIÓN DE LOS TRABAJOS-->
                        @if ($obj_obra->get('obra')->modalidad_ejecucion == 2)
                            <div class=" mt-3">
                                <div class="w-full ">
                                    <div x-data={show:false}>
                                        <div class="bg-transparent relative" id="headingOne">
                                            <button @click="show=!show" type="button" style="width:100%;">
                                                <div>
                                                    <div class="bg-gray-200">
                                                        <h2 class="font-semibold text-base text-center">Terminación de los trabajos</h2>
                                                    </div>
                                                    <div class="icon-acordeon mr-3 flex justify-center">
                                                        <div x-show="!show" class="flex down-simbolo">
                                                            <img src="{{ asset('image/down.svg') }}" alt="Workflow">
                                                        </div>
                                                        <div x-show="show" class="flex up-simbolo">
                                                            <img src="{{ asset('image/up.svg') }}" alt="Workflow">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </button>
                                        </div>
                                        <div x-show="show" class="border mb-2 p-2">
                                            <div class="grid sm:grid-cols-8 gap-x-4 gap-y-1 mt-3">
                                                
                                                    <div class="border sm:col-span-4 p-2">
                                                        <div class="flex items-center h-full">
                                                            <div class="col-nombre">
                                                                <p class="dos-lineas text-sm leading-none">
                                                                    Presupuesto definitivo.
                                                                </p>
                                                            </div>
                                                            <div class="col-estado ml-2">
                                                                <div class="flex justify-center my-1">
                                                                    @switch($obj_obra->get('contrato')->presupuesto_definitivo)
                                                                    @case(1)
                                                                    <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @case(3)
                                                                    <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @default
                                                                    <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="border sm:col-span-4  p-2">
                                                        <div class="flex items-center h-full">
                                                            <div class="col-nombre">
                                                                <p class="dos-lineas text-sm leading-none">
                                                                    Actas de entrega de recepción fisica de los trabajos del contratista al municipio.
                                                                </p>
                                                            </div>
                                                            <div class="col-estado pl-2">
                                                                <div class="flex justify-center my-1">
                                                                    @switch($obj_obra->get('contrato')->acta_entrega_contratista)
                                                                    @case(1)
                                                                    <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @case(3)
                                                                    <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @default
                                                                    <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="border sm:col-span-4  p-2">
                                                        <div class="flex items-center h-full">
                                                            <div class="col-nombre">
                                                                <p class="dos-lineas text-sm leading-none">
                                                                    Actas de entrega de recepción fisica de los trabajos del municipio a los beneficiarios.
                                                                </p>
                                                            </div>
                                                            <div class="col-estado pl-2">
                                                                <div class="flex justify-center my-1">
                                                                    @switch($obj_obra->get('contrato')->acta_entrega_municipio)
                                                                    @case(1)
                                                                    <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @case(3)
                                                                    <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @default
                                                                    <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="border sm:col-span-4  p-2">
                                                        <div class="flex items-center h-full">
                                                            <div class="col-nombre">
                                                                <p class="dos-lineas text-sm leading-none">
                                                                    Acta de extinción de derechos y obligaciones.
                                                                </p>
                                                            </div>
                                                            <div class="col-estado pl-2">
                                                                <div class="flex justify-center my-1">
                                                                    @switch($obj_obra->get('contrato')->acta_extincion)
                                                                    @case(1)
                                                                    <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @case(3)
                                                                    <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @default
                                                                    <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="border sm:col-span-4  p-2">
                                                        <div class="flex items-center h-full">
                                                            <div class="col-nombre">
                                                                <p class="dos-lineas text-sm leading-none">
                                                                    Aviso de terminación de la obra por parte del contratista.
                                                                </p>
                                                            </div>
                                                            <div class="col-estado pl-2">
                                                                <div class="flex justify-center my-1">
                                                                    @switch($obj_obra->get('contrato')->aviso_terminacion_obra)
                                                                    @case(1)
                                                                    <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @case(3)
                                                                    <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @default
                                                                    <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="border sm:col-span-4  p-2">
                                                        <div class="flex items-center h-full">
                                                            <div class="col-nombre">
                                                                <p class="dos-lineas text-sm leading-none">
                                                                    Sabana de finiquito.
                                                                </p>
                                                            </div>
                                                            <div class="col-estado pl-2">
                                                                <div class="flex justify-center my-1">
                                                                    @switch($obj_obra->get('contrato')->saba_finiquito)
                                                                    @case(1)
                                                                    <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @case(3)
                                                                    <img src="{{ asset('image/NA.svg') }}" alt="Workflow">
                                                                    @break
                                                                    @default
                                                                    <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
    
                                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!--FIN  DE TERMINACIÓN DE LOS TRABAJOS-->
                        <h2 class="font-semibold text-base text-center mt-3 bg-gray-200">Observaciones</h2>      
                        @if($observaciones != null)          
                            <div id="div_observaciones" class="text-sm font-semibold border p-2"></div>        
                        @else
                            <p class="text-sm font-semibold border p-2">Sin observaciones</p>
                        @endif
                        
                    </div>
                </div>
                @if($obj_obra->get('obra')->modalidad_ejecucion == 1)
                    <div class="tab_content" id="tab2">
                        <div class="">
                            <p class="font-bold text-lg text-center">Listas de raya de la obra</p>
                            @if($total_admin<$obj_obra->get('obra')->monto_contratado)
                                <div class="flex justify-center">
                                    <button type="button" href="" class="text-sm text-blue-500 underline background-transparent font-semibold outline-none focus:outline-none ease-linear transition-all duration-150 text-center" onclick="toggleModal('modal-lista-raya')">Agregar nueva lista de raya</button>
                                </div>
                            @endif
                            @if($listas_raya != null)
                                <div class="mt-5">
                                    <table id="example" class="table table_estimacion table-striped bg-white" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Núm.</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Total</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Periodo</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">ISR</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Mano de obra</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Acciones</p></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach($listas_raya as $key => $lista)
                                                <tr>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-center">
                                                            {{ $lista->numero_lista_raya}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-right">
                                                           $ {{ number_format($lista->total, 2) }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-right">
                                                            Del <span class="font-semibold">{{ $service->formatDate($lista->fecha_inicio) }}</span><br>
                                                            Al <span class="font-semibold">{{ $service->formatDate($lista->fecha_fin) }}</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-right">
                                                            $ {{ number_format($lista->isr, 2) }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-right">
                                                            $ {{ number_format($lista->mano_obra, 2) }}
                                                        </div>
                                                    </td>
                                                    
                                                    <td>
                                                        @if($key == count($listas_raya) - 1)
                                                            <div class="text-sm leading-5 font-medium text-gray-900 flex justify-center">
                                                                <button type="button" href="" class="bg-white text-sm text-blue-500 font-normal text-ms p-2 rounded rounded-lg" onclick="toggleModal_EditLista('modal-lista-raya-edit', {{$lista}}, '{{str_pad($lista->numero_lista_raya,3,'0',STR_PAD_LEFT)}}')">Editar</button>
                                                            </div>
                                                        @endif
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                        
                    </div>
                    <div class="tab_content" id="tab3">
                        <div class="">
                            <p class="font-bold text-lg text-center">Listas de contratos de arrendamiento</p>
                            @if($total_admin<$obj_obra->get('obra')->monto_contratado)
                                <div class="flex justify-center">
                                    <button type="button" href="" class="text-sm text-blue-500 underline background-transparent font-semibold outline-none focus:outline-none ease-linear transition-all duration-150 text-center" onclick="toggleModal('modal-agregar-contrato')">Agregar nuevo contrato de arrendamiento</button>
                                </div>
                            @endif
                            @if($contratos_arrendamiento != null)
                                <div class="mt-5">
                                    <table id="example" class="table table_estimacion table-striped bg-white" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Núm.</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Núm. contrato</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Fecha de contrato</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Monto contratado</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Periodo</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Proveedor</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Acciones</p></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach($contratos_arrendamiento as $key => $contrato)
                                                <tr>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-center">
                                                            {{ $key + 1 }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-center">
                                                            {{ $contrato->numero_contrato}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-right">
                                                            {{ $service->formatDate($contrato->fecha_contrato) }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-right">
                                                            $ {{ number_format($contrato->monto_contratado, 2) }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-right">
                                                        Del <span class="font-semibold">{{ $service->formatDate($contrato->fecha_inicio) }}</span><br>
                                                        Al <span class="font-semibold">{{ $service->formatDate($contrato->fecha_fin) }}</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-center">
                                                            {{ $contrato->razon_social}}
                                                        </div>
                                                    </td>
                                                    
                                                    <td>
                                                        
                                                            <div class="text-sm leading-5 font-medium text-gray-900 flex justify-center">
                                                                <a type="button" href="{{ route('show_contrato', ['id' => $contrato->id_contrato_arrendamiento, 'id_obra' => $obj_obra->get('obra')->id_obra]) }}" class="bg-white text-sm text-blue-500 font-normal text-ms p-2 rounded rounded-lg">Detalles</a>
                                                            </div>
                                                        
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab_content" id="tab4">
                        <div class="">
                            <p class="font-bold text-lg text-center">Listas de facturas</p>
                            @if($total_admin<$obj_obra->get('obra')->monto_contratado)
                                <div class="flex justify-center">
                                    <button type="button" href="" class="text-sm text-blue-500 underline background-transparent font-semibold outline-none focus:outline-none ease-linear transition-all duration-150 text-center" onclick="toggleModal('modal-agregar-factura')">Agregar nueva factura</button>
                                </div>
                            @endif
                            @if($facturas != null)
                                <div class="mt-5">
                                    <table id="example" class="table table_estimacion table-striped bg-white" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Núm.</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Folio fiscal</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Fecha de factura</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Monto facturado</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Proveedor</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Acciones</p></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach($facturas as $key => $factura)
                                                <tr>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-center">
                                                            {{ $key + 1 }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-center">
                                                            {{ $factura->folio_fiscal}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-right">
                                                            {{ $service->formatDate($factura->fecha) }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-right">
                                                            $ {{ number_format($factura->total, 2) }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-center">
                                                            {{ $factura->razon_social}}
                                                        </div>
                                                    </td>
                                                    
                                                    <td>
                                                        @if($key == count($facturas) - 1)
                                                            <div class="text-sm leading-5 font-medium text-gray-900 flex justify-center">
                                                                <button type="button" href="" class="bg-white text-sm text-blue-500 font-normal text-ms p-2 rounded rounded-lg" onclick="toggleModal_EditFactura('modal-edit-factura', {{$factura}})">Editar</button>
                                                            </div>
                                                        @endif
                                                    </td>

                                                </tr>
                                                @if($key == count($facturas) - 1)
                                                    <script languaje="javascript">
                                                        setTimeout(estado_tabs,500);
                                                    </script>
                                                @endif
                                            @endforeach
                                            @if(count($facturas) == 0)
                                                <script languaje="javascript">
                                                    setTimeout(estado_tabs,500);
                                                </script>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                        
                    </div>
                @endif

                @if($obj_obra->get('obra')->modalidad_ejecucion == 2)
                    <div class="tab_content" id="tab2">

                        <div class="">
                            <p class="font-bold text-lg text-center">Pagos de la obra</p>
                            
                            @if($pagos_obra != null)
                                <div class="mt-5">
                                    <table id="example" class="table table_estimacion table-striped bg-white" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Núm.</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1"> Nombrel <br>de proceso</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Recepcion <br>de documentos</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Validación <br>de documentos</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Pago <br>realizado</p></th>
                                                <th><p class="text-sm font-semibold text-center line-height-1">Acciones</p>
                                                
                                                
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            
                                            @foreach($pagos_obra as $key => $pago)
                                                <tr>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-center">
                                                            {{ $key + 1}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-center">
                                                            {{ $pago->nombre }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-center">
                                                            <div class="div-estado-proceso">
                                                                @if($pago->fecha_recepcion != null)
                                                                    <div class="flex justify-center">
                                                                        <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    </div>
                                                                    <p class="text-xs font-semibold">{{ $service->formatDate($pago->fecha_recepcion) }}</p>
                                                                @else
                                                                    <div class="flex justify-center">
                                                                        <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-center">
                                                            <div class="div-estado-proceso">
                                                                @if($pago->fecha_validacion != null)
                                                                    <div class="flex justify-center items-center">
                                                                        <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    </div>
                                                                    <p class="text-xs font-semibold">{{ $service->formatDate($pago->fecha_validacion) }}</p>
                                                                @else
                                                                    <div class="flex justify-center items-center">
                                                                        <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-center">
                                                            <div class="div-estado-proceso">
                                                                @if($pago->fecha_pago != null)
                                                                    <div class="flex justify-center">
                                                                        <img src="{{ asset('image/Bien.svg') }}" alt="Workflow">
                                                                    </div>
                                                                    <p class="text-xs font-semibold">{{ $service->formatDate($pago->fecha_pago) }}</p>
                                                                @else
                                                                    <div class="flex justify-center">
                                                                        <img src="{{ asset('image/Mal.svg') }}" alt="Workflow">
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                
                                                    
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 flex">
                                                            
                                                            <a type="button" href="{{ route('show_pagos', $pago->id_desglose_pagos) }}" class="bg-white text-sm text-blue-500 font-normal text-ms p-2 rounded rounded-lg">Detalles</a>
                                                            
                                                        </div>
                                                    </td>

                                                </tr>
                                                
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab_content" id="tab3">

                        <div class="">
                            <p class="font-bold text-lg text-center">Estimaciones de la obra</p>
                            @if($obj_obra->get('obra')->monto_modificado==null?$total_pagado->total_estimacion<$obj_obra->get('obra')->monto_contratado:$total_pagado->total_estimacion<$obj_obra->get('obra')->monto_modificado)
                                <div class="flex justify-center">
                                    <button type="button" href="" class="text-sm text-blue-500 underline background-transparent font-semibold outline-none focus:outline-none ease-linear transition-all duration-150 text-center" onclick="toggleModal('modal-agregar-estimacion')">Agregar nueva estimacion</button>
                                </div>
                            @endif
                            @if($estimaciones!= null)
                                <div class="mt-5">
                                    <table id="example" class="table table_estimacion table-striped bg-white" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Núm.</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Total</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Retenciones</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Amortización <br>del anticipo</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Neto <br>pagado</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Periodo</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Acciones</p></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach($estimaciones as $key => $estimacion)
                                                <tr>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-center">
                                                            {{ $estimacion->numero_estimacion}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-right">
                                                            $ {{ number_format($estimacion->total_estimacion, 2) }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-right">
                                                            $ {{ number_format($estimacion->supervicion_obra + $estimacion->mano_obra + $estimacion->cinco_millar + $estimacion->dos_millar, 2) }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-right">
                                                            $ {{ number_format($estimacion->amortizacion_anticipo, 2) }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-right">
                                                            <b>$ {{ number_format($estimacion->total_estimacion - ($estimacion->supervicion_obra + $estimacion->mano_obra + $estimacion->cinco_millar + $estimacion->dos_millar + $estimacion->amortizacion_anticipo), 2) }}</b>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-right">
                                                        Del <b>{{ $service->formatDate($estimacion->fecha_inicio) }}</b><br>
                                                        Al <b>{{ $service->formatDate($estimacion->fecha_final) }}</b>
                                                        </div>
                                                    </td>
                                                    
                                                    <td>
                                                        @if($estimacion->total_estimacion == null)
                                                            <div class="text-sm leading-5 font-medium text-gray-900 flex justify-center">
                                                                <button type="button" href="" class="bg-white text-sm text-blue-500 font-normal text-ms p-2 rounded rounded-lg" onclick="toggleModal_2('modal-agregar-estimacion-edit', {{$estimacion}})">Editar</button>
                                                            </div>
                                                        @endif
                                                    </td>

                                                </tr>
                                                
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab_content" id="tab4">
                        <div class="">
                            <p class="font-bold text-lg text-center">Convenios modificatorios de la obra</p>
                            <div class="flex justify-center">
                                <button type="button" href="" class="text-sm text-blue-500 underline background-transparent font-semibold outline-none focus:outline-none ease-linear transition-all duration-150 text-center" onclick="toggleModal('modal')">Agregar nuevo convenio modificatorio</button>
                            </div>
                            @if($convenios!= null)
                                <div class="mt-5">
                                    <table id="example" class="table table1 table-striped bg-white" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Núm.</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Núm. Convenio</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Fecha</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Tipo</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Dato Modificado</p></th>
                                                <th><p class="text-sm font-semibold text-gray-900 text-center line-height-1">Acciones</p></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if(count($convenios) == 0)
                                                <script languaje="javascript">
                                                    setTimeout(estado_tabs,500);
                                                </script>
                                            @endif
                                            
                                            @foreach($convenios as $key => $convenio)
                                                <tr>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 text-center">
                                                            {{ $key +1 }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900">
                                                            {{ $convenio->numero_convenio_modificatorio }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900">
                                                            {{ $service->formatDate($convenio->fecha_convenio) }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900">
                                                            {{$convenio->tipo}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900">
                                                            <p>
                                                                @switch($convenio->tipo)
                                                                    @case("Convenio modificatorio al monto del contrato")
                                                                        Monto modificado: <br><b>$ {{ number_format($convenio->monto_modificado, 2) }}</b>
                                                                    @break
                                                                    @case("Convenio modificatorio a la fecha del contrato")
                                                                        Fecha modificada: <br><b>{{ $service->formatDate($convenio->fecha_fin_modificada) }}</b>
                                                                    @break

                                                                    @case("Convenio modificatorio a las metas del contrato")
                                                                        Se ha modificado las metas iniciales del contrato.
                                                                    @break

                                                                    @case("Convenio modificatorio al monto y fecha de contrato")
                                                                        Monto modificado: <br><b>$ {{ number_format($convenio->monto_modificado, 2) }}</b>
                                                                    @break

                                                                    @case("Convenio modificatorio al monto y metas de contrato")
                                                                        Monto modificado: <br><b>$ {{ number_format($convenio->monto_modificado, 2) }}</b>
                                                                    @break

                                                                    @case("Convenio modificatorio a la fecha y metas de contrato")
                                                                        Fecha modificada: <br><b>{{ $service->formatDate($convenio->fecha_fin_modificada) }}</b>
                                                                    @break

                                                                    
                                                                    @default
                                                                        Monto modificado: <br><b>$ {{ number_format($convenio->monto_modificado, 2) }}</b><br>
                                                                        Fecha modificada: <br><b>{{ $service->formatDate($convenio->fecha_fin_modificada) }}</b>
                                                                @endswitch
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-sm leading-5 font-medium text-gray-900 flex">
                                                            @if($key == count($convenios) - 1)
                                                                <button type="button" href="" class="bg-white text-sm text-blue-500 font-normal text-ms p-2 rounded rounded-lg" onclick="toggleModal_1('modal-edit', {{$convenio}})">Editar</button>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                @if($key == count($convenios) - 1)
                                                    
                                                    <script languaje="javascript">
                                                        setTimeout(estado_tabs,500);
                                                    </script>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
                
            </div>
        </div>
    </div>
</div>

@if($obj_obra->get('obra')->modalidad_ejecucion == 2)
    <!-- inicio modal -->
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal">
        <div class="relative w-auto my-28 mx-auto max-w-3xl">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-center justify-between px-5 py-3 border-b border-solid border-blueGray-200 rounded-t bg-blue-cmr1">
                <h4 class="text-base font-normal uppercase text-white">
                    Agregar nuevo convenio modificatorio
                </h4>
                <button class="p-1 ml-auto bg-transparent border-0 text-white float-right text-2xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal')">
                    <span>
                        <i class="fas fa-xmark"></i>
                    </span>
                </button>
            </div>
            <!--body-->
            <form action="{{ route('create_convenio') }}" method="POST" id="formulario_convenio" name="formulario_convenio">
            @csrf
            @method('POST')
                <div class="relative p-6 flex-auto">
                    <div class="grid grid-cols-10 gap-4">
                        <input type="text" name="id_obra" id="id_obra" maxlength="40" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm text-sm border-gray-300 rounded-md" value="{{ $obj_obra->get('obra')->id_obra }}">
                        <div class="col-span-5 sm:col-span-5 ">
                            <p class="text-sm">Número de convenio*</p>
                            <input type="text" name="numero_convenio_modificatorio" id="numero_convenio_modificatorio" maxlength="40" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm text-sm border-gray-300 rounded-md" value="{{ old('oficio_notificacion') }}">
                            <label id="error_numero_convenio_modificatorio" class="hidden text-sm font-normal text-red-500" >Ingrese un número de convenio valido</label>
                        </div>
                        <div class="col-span-3 sm:col-span-5">
                            <p class="text-sm">Tipo de convenio*</p>
                            <select id="tipo" name="tipo" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-800 focus:border-blue-800 text-sm">                
                                <option value="Convenio modificatorio al monto del contrato">Al monto del contrato</option>
                                <option value="Convenio modificatorio a la fecha del contrato">A la fecha del contrato</option>
                                <option value="Convenio modificatorio a las metas del contrato">A las metas del contrato</option>
                                <option value="Convenio modificatorio al monto y fecha de contrato">Al monto y fecha de contrato</option>
                                <option value="Convenio modificatorio al monto y metas de contrato">Al monto y metas de contrato</option>
                                <option value="Convenio modificatorio a la fecha y metas de contrato">A la fecha y metas de contrato</option>
                                <option value="Convenio modificatorio al monto, metas y fecha de contrato">Al monto, metas y fecha de contrato</option>
                            </select>
                        </div>
                        <div class="col-span-5">
                            <p class="text-sm">Fecha del convenio*</p>
                            <input type="date" name="fecha_convenio" id="fecha_convenio" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm text-sm border-gray-300 rounded-md" >
                            <label id="error_fecha_convenio" class="hidden text-sm font-normal text-red-500" >Ingrese un número de contrato valido</label>
                        </div>
                        <div id="mod_fecha_fin" class="hidden col-span-5">
                            <p class="text-sm">Fecha final modificada*</label>
                            <input type="date" name="fecha_fin_modificada" id="fecha_fin_modificada" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->ejercicio +1}}-03-31" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm text-sm border-gray-300 rounded-md" >
                            <label id="error_fecha_fin" name="error_fecha_fin" class="hidden text-sm font-normal text-red-500" >Seleccione una fecha valida</label>
                        </div>
                        <div id="monto_modificado_div" class="col-span-10">
                            <p id="label_monto_modificado" class="text-sm text-center">Fuentes de financiamiento*</p>
                            <table class="w-full mt-1">
                                @foreach ($fuentes_financiamiento as $fuente)
                                    <tr>
                                        <th class="border-gray-300 border w-1/2">
                                            <p class="text-sm">
                                                {{$fuente->nombre_corto}}
                                            </p>
                                            
                                        </th>
                                        <th class="border-gray-300 border w-1/2">
                                        <div class="relative ">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-700 text-base">
                                                $
                                                </span>
                                            </div>       
                                            <input type="text" name="monto_modificado_{{$fuente->id_fuente_financiamiento}}" id="monto_modificado_{{$fuente->id_fuente_financiamiento}}" maxlength="20" class="monto_modificado pl-7 py-1 focus:ring-blue-800 focus:border-none block w-full text-sm border-none" placeholder="0.00" value="{{number_format($fuente->monto,2)}}">
                                        </div>
                                        </th>
                                    </tr>
                                @endforeach
                            </table>
                            <label id="error_monto" name="error_monto" class="hidden text-sm font-normal text-red-500" >El monto a modificar es mayor que el ejercicido</label>
                        </div>
                    </div>
                    <div class="mt-10">
                        <span class="block text-xs">Verifique los campos obligatorios marcados con un ( * ) </span>
                    </div>
                </div>
                <!--footer-->
                <div class=" p-4 border-t border-solid border-blueGray-200 rounded-b">
            
                    <div class="text-right">
                        <button class="text-red-500 background-transparent font-bold uppercase px-6 text-sm outline-none focus:outline-none ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal')">
                            Cancelar
                        </button>
                        <button type="submit" id="guardar_convenio" class="text-blue-500 font-bold uppercase text-sm px-6 rounded outline-none focus:outline-none ease-linear transition-all duration-150" >
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
                        Editar convenio modificatorio
                    </h4>
                    <button class="p-1 ml-auto bg-transparent border-0 text-white float-right text-2xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-edit')">
                        <span>
                            <i class="fas fa-xmark"></i>
                        </span>
                    </button>
                </div>
                <!--body-->
                <form action="{{ route('update_convenio') }}" method="POST" id="formulario_convenio_edit" name="formulario_convenio_edit">
                    @csrf
                    @method('POST')
                    <div class="relative p-6 flex-auto">
                        <div class="grid grid-cols-10 gap-4">
                            <input type="text" name="id_convenio_modificatorio" id="id_convenio_modificatorio" maxlength="40" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="">
                            <div class="col-span-5 sm:col-span-5 ">
                                <p class="text-sm">Número de convenio*</p>
                                <input type="text" name="numero_convenio_modificatorio_edit" id="numero_convenio_modificatorio_edit" maxlength="40" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('oficio_notificacion') }}">
                                <p id="error_numero_convenio_modificatorio" class="hidden text-sm font-normal text-red-500" >Ingrese un número de convenio valido</label>
                            </div>
                            <div class="col-span-3 sm:col-span-5">
                                <p for="tipo_edit" class="text-sm">Tipo de convenio *</p>
                                <select id="tipo_edit" name="tipo_edit" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-800 focus:border-blue-800 sm:text-sm">                
                                    <option value="Convenio modificatorio al monto del contrato">Al monto del contrato</option>
                                    <option value="Convenio modificatorio a la fecha del contrato">A la fecha del contrato</option>
                                    <option value="Convenio modificatorio a las metas del contrato">A las metas del contrato</option>
                                    <option value="Convenio modificatorio al monto y fecha de contrato">Al monto y fecha de contrato</option>
                                    <option value="Convenio modificatorio al monto y metas de contrato">Al monto y metas de contrato</option>
                                    <option value="Convenio modificatorio a la fecha y metas de contrato">A la fecha y metas de contrato</option>
                                    <option value="Convenio modificatorio al monto, metas y fecha de contrato">Al monto, metas y fecha de contrato</option>
                                </select>
                            </div>
                            <div class="col-span-5">
                                <p class="text-sm">Fecha del convenio*</p>
                                <input type="date" name="fecha_convenio_edit" id="fecha_convenio_edit" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >
                                <label id="error_fecha_convenio_edit" class="hidden text-base font-normal text-red-500" >Ingrese un número de contrato valido</label>
                            </div>
                            <div id="mod_fecha_fin_edit" class="col-span-5">
                                <p for="fecha_fin_modificada_edit" class="text-sm">Fecha final modificada*</p>
                                <input type="date" name="fecha_fin_modificada_edit" id="fecha_fin_modificada_edit" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->ejercicio +1}}-03-31" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >
                                <label id="error_fecha_fin_edit" name="error_fecha_fin_edit" class="hidden text-base font-normal text-red-500" >Seleccione una fecha valida</label>
                            </div>
                            <div id="monto_modificado_edit_div" class="col-span-8 sm:col-span-5">
                                <p class="text-sm">Monto modificado*</p>
                                <div class="relative ">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-700 text-base">
                                        $
                                        </span>
                                    </div>
                                    <input type="text" name="monto_modificado_edit" id="monto_modificado_edit" maxlength="20" class="pl-7  mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="0.00">
                                </div>
                                <label id="error_monto_edit" name="error_monto_edit" class="hidden text-base font-normal text-red-500" >El monto a modificar es mayor que el ejercicido $ {{number_format($total_pagado->total_obra + $obj_obra->get('obra')->anticipo_monto, 2)}}</label>
                            </div>
                            <div class="col-span-10">
                                <span class="block text-xs">Verifique los campos obligatorios marcados con un ( * ) </span>
                            </div>
                        </div>
                    </div>
                <!--footer-->
                <div class=" p-4 border-t border-solid border-blueGray-200 rounded-b">
                    <div class="text-right">
                        <button class="text-red-500 background-transparent font-bold uppercase px-6 text-sm outline-none focus:outline-none ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-edit')">
                            Cancelar
                        </button>
                        <button type="submit" id="btn-edit" class="text-blue-500 font-bold uppercase text-sm px-6 rounded outline-none focus:outline-none ease-linear transition-all duration-150" >
                            Guardar
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-agregar-estimacion">
        <div class="relative w-auto my-28 mx-auto max-w-3xl">
            <!--content-->
            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                <!--header-->
                <div class="flex items-center justify-between px-5 py-3 border-b border-solid border-blueGray-200 rounded-t bg-blue-cmr1">
                    <h4 class="text-base font-normal uppercase text-white">
                        Agregar nueva estimación
                    </h4>
                    <button class="p-1 ml-auto bg-transparent border-0 text-white float-right text-2xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-agregar-estimacion')">
                        <span>
                            <i class="fas fa-xmark"></i>
                        </span>
                    </button>
                </div>
                <!--body-->
                <form action="{{ route('create_estimacion') }}" method="POST" id="formulario_create_estimacion" name="formulario_create_estimacion">
                    @csrf
                    @method('POST')
                    <div class="relative p-6 flex-auto">
                        <div class="grid grid-cols-9 gap-4">
                            <input type="text" name="id_obra_contrato" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $obj_obra->get('contrato')->obra_contrato_id }}">
                            <div class="col-span-2 sm:col-span-3 ">
                                <p class="text-sm text-center">Número de estimación</p>
                                <p id="label_numero_estimacion" class="mt-1 text-base font-semibold px-3 py-2 border border-gray-300 text-center rounded-md bg-gray-100">{{str_pad(count($estimaciones) + 1,3,"0",STR_PAD_LEFT)}}</p>
                                <input type="text" name="numero_estimacion" id="numero_estimacion" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{count($estimaciones) + 1}}">
                                <label id="error_numero_estimacion" class="hidden text-sm font-normal text-red-500" >Ingrese un número de estimación valido</label>
                            </div>
                            <div class="col-span-3 sm:col-span-3 ">
                                <p class="text-sm text-center">¿Es finiquito?</p>
                                <div class="mt-1 py-2 border border-gray-300 rounded-md">
                                    <div class="col-span-8 md:col-span-8">
                                        <div class="form-group">
                                            <div class="grid grid-cols-8">
                                                
                                                <div class="col-span-4 flex justify-center">
                                                    <div>
                                                        <input type="radio" value="1" id="s_finiquito" name="finiquito">
                                                        <label for="s_finiquito" class="text-base font-medium text-gray-700">Si</label>
                                                    </div>
                                                </div>

                                                <div class="col-span-4 flex justify-center">
                                                    <div>
                                                        <input type="radio" value="0" checked id="n_finiquito" name="finiquito">
                                                        <label for="n_finiquito" class="text-base font-medium text-gray-700"> No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>

                            <div class="col-span-3">
                                <p class="text-sm">Fecha de recepción de documentos*</p>
                                <input type="date" name="fecha_recepcion" id="fecha_recepcion" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                                <p id="error_fecha_recepcion" class="mt-1 hidden text-sm font-normal text-red-500 leading-snug" >Ingrese una fecha de recepción de documentos valida</p>
                            </div>
                            <div class="col-span-9">
                                <p class="text-sm text-center">Periodo de la estimación</p>
                                <div class="grid grid-cols-4 gap-4">
                                    <div class="col-span-2">
                                        <input type="date" name="fecha_inicio_estimacion" id="fecha_inicio_estimacion" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                                        <p for="fecha_inicio_estimacion" class="text-xs text-center">Fecha de inicio*</p>
                                        <p id="error_fecha_inicio_estimacion" class="mt-1 hidden text-sm font-normal text-red-500 leading-snug" >Ingrese una fecha de inicio valida</p>
                                    </div>
                                    <div class="col-span-2">
                                        <input type="date" name="fecha_fin_estimacion" id="fecha_fin_estimacion" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}"  class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                                        <p for="fecha_fin_estimacion" class="text-xs text-center">Fecha de fin*</p>
                                        <p id="error_fecha_fin_estimacion" class="mt-1 hidden text-sm font-normal text-red-500 leading-snug" >Ingrese una fecha final valida</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-9">
                                <span class="block text-xs">Verifique los campos obligatorios marcados con un ( * ) </span>
                            </div>
                            
                        </div>

                    </div>
                    <!--footer-->
                    <div class=" p-4 border-t border-solid border-blueGray-200 rounded-b">
                        <div class="text-right">
                            <button class="text-red-500 background-transparent font-bold uppercase px-6 text-sm outline-none focus:outline-none ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-agregar-estimacion')">
                                Cancelar
                            </button>
                            <button type="submit" id="btn-create-estimacion" class="text-blue-500 font-bold uppercase text-sm px-6 rounded outline-none focus:outline-none ease-linear transition-all duration-150" >
                                Guardar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-agregar-estimacion-edit">
        <div class="relative w-auto my-28 mx-auto max-w-3xl">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-center justify-between px-5 py-3 border-b border-solid border-blueGray-200 rounded-t bg-blue-cmr1">
                <h4 class="text-base font-normal uppercase text-white">
                    Editar estimación
                </h4>
                <button class="p-1 ml-auto bg-transparent border-0 text-white float-right text-2xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-agregar-estimacion-edit')">
                    <span>
                        <i class="fas fa-xmark"></i>
                    </span>
                </button>
            </div>
            <!--body-->
            <form action="{{ route('update_estimacion') }}" method="POST" id="formulario_create_estimacion_edit" name="formulario_create_estimacion_edit">
            @csrf
            @method('POST')
                <div class="relative p-6 flex-auto">
                    <div class="grid grid-cols-9 gap-4">
                        <input type="text" name="id_estimacion_edit" id="id_estimacion_edit" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="">
                        <div class="col-span-2 sm:col-span-3 ">
                            <p class="text-sm text-center">Número de estimación</p>
                            <div class="mt-1">
                                <p id="label_numero_estimacion_edit" class="mt-1 text-base font-semibold px-3 py-2 border border-gray-300 text-center rounded-md bg-gray-100 leading-tight">{{str_pad(count($estimaciones) + 1,3,"0",STR_PAD_LEFT)}}</p>
                            </div>  
                            <input type="text" name="numero_estimacion_edit" id="numero_estimacion_edit" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{count($estimaciones) + 1}}">
                            <p id="error_numero_estimacion_edit" class="mt-1 hidden text-sm font-normal text-red-500 leading-snug" >Ingrese un número de estimación valido</p>
                        </div>
                        <div class="col-span-3 sm:col-span-3 ">
                            <p class="text-sm text-center">¿Es finiquito?</p>
                            <div class="mt-1 py-2 border border-gray-300 rounded-md leading-tight">
                                <div class="col-span-8 md:col-span-8">
                                    <div class="form-group">
                                        <div class="grid grid-cols-8">
                                            <div class="col-span-4 flex justify-center">
                                                <div>
                                                    <input type="radio" value="1" id="s_finiquito_edit" name="finiquito_edit">
                                                    <label for="s_finiquito_edit" class="text-base leading-tight">Si</label>
                                                </div>
                                            </div>
                                            <div class="col-span-4 flex justify-center">
                                                <div>
                                                    <input type="radio" value="0" id="n_finiquito_edit" name="finiquito_edit">
                                                    <label for="n_finiquito_edit" class="text-base leading-tight"> No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>

                        <div class="col-span-3">
                            <p class="text-sm">Fecha de recepción de documentos*</p>
                            <input type="date" name="fecha_recepcion_edit" id="fecha_recepcion_edit" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->ejercicio+1}}-03-31" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                            <p id="error_fecha_recepcion_edit" class="mt-1 hidden text-sm font-normal text-red-500 leading-snug" >Ingrese una fecha de recepción de documentos valida</p>
                        </div>
                        
                        <div class="col-span-9">
                            <p class="text-sm text-center">Periodo de la estimación</p>
                            <div class="grid grid-cols-4 gap-4">
                                <div class="col-span-2">
                                    <input type="date" name="fecha_inicio_estimacion_edit" id="fecha_inicio_estimacion_edit" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->ejercicio+1}}-03-31" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                                    <p for="fecha_inicio_estimacion_edit" class="text-xs text-center">Fecha de inicio*</p>
                                    <p id="error_fecha_inicio_estimacion_edit" class="mt-1 hidden text-sm font-normal text-red-500 leading-snug" >Ingrese una fecha de inicio valida</label>
                                </div>
                                <div class="col-span-2">
                                    <input type="date" name="fecha_fin_estimacion_edit" id="fecha_fin_estimacion_edit" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->ejercicio+1}}-03-31"  class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                                    <p for="fecha_fin_estimacion_edit" class="text-xs text-center">Fecha de fin*</p>
                                    <p id="error_fecha_fin_estimacion_edit" class="mt-1 hidden text-sm font-normal text-red-500 leading-snug" >Ingrese una fecha final valida</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-9">
                            <span class="block text-xs">Verifique los campos obligatorios marcados con un ( * ) </span>
                        </div>
                        
                    </div>
                </div>
                <!--footer-->
                <div class=" p-4 border-t border-solid border-blueGray-200 rounded-b">
                    <div class="text-right">
                        <button class="text-red-500 background-transparent font-bold uppercase px-6 text-sm outline-none focus:outline-none ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-agregar-estimacion-edit')">
                            Cancelar
                        </button>
                        <button type="submit" id="btn-create-estimacion" class="text-blue-500 font-bold uppercase text-sm px-6 rounded outline-none focus:outline-none ease-linear transition-all duration-150" >
                            Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>

    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-update-pago">
        <div class="relative w-auto my-28 mx-auto max-w-3xl">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-center justify-between px-5 py-3 border-b border-solid border-blueGray-200 rounded-t">
                <h4 class="text-base font-normal uppercase text-white">
                    Actualizar proceso de pago de
                    <label id="nombre_pago"></label>
                </h4>
            <button class="p-1 ml-auto bg-transparent border-0 text-white float-right text-2xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-update_pago')">
                <span>
                    <i class="fas fa-xmark"></i>
                </span>
            </button>
            </div>
            <!--body-->
            <form action="{{ route('create_estimacion') }}" method="POST" id="formulario_update_pago" name="formulario_update_pago">
                @csrf
                @method('POST')
                <div class="relative p-6 flex-auto">
                    <div class="grid grid-cols-10 gap-4">
                        <input type="text" name="id_pago_desglose" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="">
                        <div class="col-span-5">
                            <p for="fecha_recepcion" class="text-sm font-semibold text-center">Fecha de recepción de documentos*</p>
                            <input type="date" name="fecha_recepcion" id="fecha_recepcion" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                            <label id="error_fecha_recepcion" class="hidden text-base font-normal text-red-500" >Ingrese una fecha valida</label>
                        </div>
                        <div class="col-span-5">
                            <p for="fecha_recepcion" class="text-sm font-semibold text-center">Fecha de observaciones de documentos*</p>
                            <input type="date" name="fecha_recepcion" id="fecha_recepcion" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                            <label id="error_fecha_recepcion" class="hidden text-base font-normal text-red-500" >Ingrese una fecha valida</label>
                        </div>
                        <div class="col-span-5">
                            <p for="fecha_recepcion" class="text-sm font-semibold text-center">Fecha de solventación de observaciones*</p>
                            <input type="date" name="fecha_recepcion" id="fecha_recepcion" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                            <label id="error_fecha_recepcion" class="hidden text-base font-normal text-red-500" >Ingrese una fecha valida</label>
                        </div>
                        <div class="col-span-5">
                            <p for="fecha_recepcion" class="text-sm font-semibold text-center">Fecha de validación de documentos*</p>
                            <input type="date" name="fecha_recepcion" id="fecha_recepcion" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                            <label id="error_fecha_recepcion" class="hidden text-base font-normal text-red-500" >Ingrese una fecha valida</label>
                        </div>

                        <div class="col-span-5">
                            <p for="fecha_recepcion" class="text-sm font-semibold text-center">Fecha de documentos*</p>
                            <input type="date" name="fecha_recepcion" id="fecha_recepcion" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                            <label id="error_fecha_recepcion" class="hidden text-base font-normal text-red-500" >Ingrese una fecha valida</label>
                        </div>
                        <div class="col-span-10">
                            <p for="ejecucion" class="text-sm font-semibold text-center">Periodo de la estimación</p>
                            <div class="grid grid-cols-4 gap-4">
                                <div class="col-span-2">
                                    <input type="date" name="fecha_inicio_estimacion" id="fecha_inicio_estimacion" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                                    <label for="fecha_inicio_estimacion" class="block text-sm font-semibold text-gray-700 text-center">Fecha de inicio*</label>
                                    <label id="error_fecha_inicio_estimacion" class="hidden text-base font-normal text-red-500" >Ingrese una fecha de inicio valida</label>
                                </div>
                                <div class="col-span-2">
                                    <input type="date" name="fecha_fin_estimacion" id="fecha_fin_estimacion" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}"  class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                                    <label for="fecha_fin_estimacion" class="block text-sm font-semibold text-gray-700 text-center">Fecha de fin*</label>
                                    <label id="error_fecha_fin_estimacion" class="hidden text-base font-normal text-red-500" >Ingrese una fecha final valida</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-5">

                        </div>
                        <div class="col-span-5">
                            
                            <input type="date" name="fecha_recepcion" id="fecha_recepcion" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                            <label for="fecha_recepcion" class="block text-sm font-semibold text-gray-700 text-right">Fecha de recepción de documentos*</label>
                            <label id="error_fecha_recepcion" class="hidden text-base font-normal text-red-500" >Ingrese una fecha de inicio valida</label>
                        </div>
                        
                    </div>
                    <div class="mt-10">
                        <span class="block text-xs">Verifique los campos obligatorios marcados con un ( * ) </span>
                    </div>
                
                </div>
                <!--footer-->
                <div class=" p-4 border-t border-solid border-blueGray-200 rounded-b">
                
                    <span class="block text-xs">Verifique los campos obligatorios marcados con un ( * ) </span>
                    <div class="text-right">
                        <button class="text-red-500 background-transparent font-bold uppercase px-6 text-sm outline-none focus:outline-none ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-agregar-estimacion')">
                            Cancelar
                        </button>
                        <button type="submit" id="btn-create-estimacion" class="text-blue-500 font-bold uppercase text-sm px-6 rounded outline-none focus:outline-none ease-linear transition-all duration-150" >
                            Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>

    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-proceso-validacion">
        <div class="relative w-auto my-28 mx-auto max-w-3xl">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-center justify-between px-5 py-3 border-b border-solid border-blueGray-200 rounded-t bg-blue-cmr1">
                <h4 class="text-base font-normal uppercase text-white">
                    Proceso de validación
                </h4>
                <button class="p-1 ml-auto bg-transparent border-0 text-white float-right text-2xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-proceso-validacion')">
                    <span>
                        <i class="fas fa-xmark"></i>
                    </span>
                </button>
            </div>
            <!--body-->
            <table id="example" class="table table_estimacion table-striped bg-white" style="width:100%;">
                <thead>
                    <tr>
                        <th class="text-center"><p  class="text-sm leading-5 font-bold text-gray-900 text-center line-height-1">Observaciones</p></th>
                        <th class="text-center"><p  class="text-sm leading-5 font-bold text-gray-900 text-center line-height-1">Solventación</p></th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    
                        <tr>
                            <td>
                                <div class="text-sm leading-5 font-medium text-gray-900 text-center">
                                </div>
                            </td>
                            <td>
                                <div class="text-sm leading-5 font-medium text-gray-900 text-center">
                                </div>
                            </td>
                            

                        </tr>
                        
                </tbody>
            </table>
            <form action="{{ route('create_estimacion') }}" method="POST" id="formulario_update_pago" name="formulario_update_pago">
                @csrf
                @method('POST')
                <div class="relative p-6 flex-auto">
                    <div class="grid grid-cols-10 gap-4">
                        <input type="text" name="id_pago_desglose" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="">
                        <div class="col-span-5">
                            <label for="fecha_recepcion" class="block text-sm font-semibold text-gray-700 text-center">Fecha de recepción de documentos*</label>
                            <input type="date" name="fecha_recepcion" id="fecha_recepcion" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                            <label id="error_fecha_recepcion" class="hidden text-base font-normal text-red-500" >Ingrese una fecha valida</label>
                        </div>
                        <div class="col-span-5">
                            <label for="fecha_recepcion" class="block text-sm font-semibold text-gray-700 text-center">Fecha de observaciones de documentos*</label>
                            <input type="date" name="fecha_recepcion" id="fecha_recepcion" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                            <label id="error_fecha_recepcion" class="hidden text-base font-normal text-red-500" >Ingrese una fecha valida</label>
                        </div>
                        <div class="col-span-5">
                            <label for="fecha_recepcion" class="block text-sm font-semibold text-gray-700 text-center">Fecha de solventación de observaciones*</label>
                            <input type="date" name="fecha_recepcion" id="fecha_recepcion" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                            <label id="error_fecha_recepcion" class="hidden text-base font-normal text-red-500" >Ingrese una fecha valida</label>
                        </div>
                        <div class="col-span-5">
                            <label for="fecha_recepcion" class="block text-sm font-semibold text-gray-700 text-center">Fecha de validación de documentos*</label>
                            <input type="date" name="fecha_recepcion" id="fecha_recepcion" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                            <label id="error_fecha_recepcion" class="hidden text-base font-normal text-red-500" >Ingrese una fecha valida</label>
                        </div>

                        <div class="col-span-5">
                            <label for="fecha_recepcion" class="block text-sm font-semibold text-gray-700 text-center">Fecha de documentos*</label>
                            <input type="date" name="fecha_recepcion" id="fecha_recepcion" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                            <label id="error_fecha_recepcion" class="hidden text-base font-normal text-red-500" >Ingrese una fecha valida</label>
                        </div>
                        <div class="col-span-10">
                            <label for="ejecucion" class="block text-sm font-bold text-gray-700 text-center">Periodo de la estimación 1</label>
                            <div class="grid grid-cols-4 gap-4">
                                <div class="col-span-2">
                                    <input type="date" name="fecha_inicio_estimacion" id="fecha_inicio_estimacion" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                                    <label for="fecha_inicio_estimacion" class="block text-sm font-semibold text-gray-700 text-center">Fecha de inicio*</label>
                                    <label id="error_fecha_inicio_estimacion" class="hidden text-base font-normal text-red-500" >Ingrese una fecha de inicio valida</label>
                                </div>
                                <div class="col-span-2">
                                    <input type="date" name="fecha_fin_estimacion" id="fecha_fin_estimacion" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}"  class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                                    <label for="fecha_fin_estimacion" class="block text-sm font-semibold text-gray-700 text-center">Fecha de fin*</label>
                                    <label id="error_fecha_fin_estimacion" class="hidden text-base font-normal text-red-500" >Ingrese una fecha final valida</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-5">

                        </div>
                        <div class="col-span-5">
                            
                            <input type="date" name="fecha_recepcion" id="fecha_recepcion" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                            <label for="fecha_recepcion" class="block text-sm font-semibold text-gray-700 text-right">Fecha de recepción de documentos*</label>
                            <label id="error_fecha_recepcion" class="hidden text-base font-normal text-red-500" >Ingrese una fecha de inicio valida</label>
                        </div>
                        
                    </div>
                    <div class="mt-10">
                        <span class="block text-xs">Verifique los campos obligatorios marcados con un ( * ) </span>
                    </div>
                
                </div>
                <!--footer-->
                <div class=" p-4 border-t border-solid border-blueGray-200 rounded-b">
                
                    <div class="text-right">
                        <button class="text-red-500 background-transparent font-bold uppercase px-6 text-sm outline-none focus:outline-none ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-agregar-estimacion')">
                            Cancelar
                        </button>
                        <button type="submit" id="btn-create-estimacion" class="text-blue-500 font-bold uppercase text-sm px-6 rounded outline-none focus:outline-none ease-linear transition-all duration-150" >
                            Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>

    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-backdrop"></div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-edit-backdrop"></div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-agregar-estimacion-backdrop"></div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-agregar-estimacion-edit-backdrop"></div>
@endif

@if($obj_obra->get('obra')->modalidad_ejecucion == 1)
    <!-- inicio modal agregar lista de raya -->
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-lista-raya">
        <div class="relative w-auto my-28 mx-auto max-w-3xl">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-center justify-between px-5 py-3 border-b border-solid border-blueGray-200 rounded-t bg-blue-cmr1">
                <h4 class="text-base font-normal uppercase text-white">
                    Agregar nueva lista de raya
                </h4>
                <button class="p-1 ml-auto bg-transparent border-0 text-white float-right text-2xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-lista-raya')">
                    <span>
                        <i class="fas fa-xmark"></i>
                    </span>
                </button>
            </div>
            <!--body-->
            <form action="{{ route('store_lista') }}" method="POST" id="formulario_lista" name="formulario_lista">
                @csrf
                @method('POST')
                <div class="relative p-6 flex-auto">
                    <div class="grid grid-cols-10 gap-2">
                        <input type="text" name="id_obra_admin_lista" id="id_obra_admin_lista" maxlength="40" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $obj_obra->get('admin')->obra_administracion_id }}">
                        <input type="text" name="id_obra_lista" id="id_obra_lista" maxlength="40" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $obj_obra->get('obra')->id_obra }}">
                        <div class="col-span-5 sm:col-span-5 ">
                            <p for="contrato" class="text-sm text-center">Número de lista de raya</p>
                            <div class="">
                                <p id="label_numero_lista_raya" class="text-base font-semibold px-3 py-2 bg-gray-100 text-center mt-1 rounded-md">{{str_pad(count($listas_raya) + 1,3,"0",STR_PAD_LEFT)}}</p>
                            </div>  
                            <input type="text" name="numero_lista_raya" id="numero_lista_raya" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{count($listas_raya) + 1}}">
                            <label id="error_numero_lista_raya" class="hidden text-sm font-normal text-red-500" >Ingrese un número de estimación valido</label>
                        </div>
                        <div class="col-span-5 sm:col-span-5">
                            <p class="text-sm">Total*</p>
                            <div class="relative ">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-700 text-base">
                                    $
                                    </span>
                                </div>
                                <input type="text" name="total_lista_raya" id="total_lista_raya" maxlength="20" class="pl-7  mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required placeholder="0.00">
                            </div>
                            <label id="error_monto_admin_mayor" class="hidden text-sm font-normal text-red-500" >El monto es mayor que el restante de la obra</label>
                            <label id="error_total_lista_raya" class="hidden text-sm font-normal text-red-500" >Ingrese un monto total de lista de raya valido</label>
                        </div>
                        
                        <div class="col-span-10">
                            <p class="text-sm text-center">Periodo de la lista de raya</p>
                            <div class="grid grid-cols-4 gap-4">
                                <div class="col-span-2">
                                    <input type="date" name="fecha_inicio_lista" id="fecha_inicio_lista" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                                    <p class="text-xs text-center">Fecha de inicio*</p>
                                    <label id="error_fecha_inicio_lista" class="hidden text-sm font-normal text-red-500" >Ingrese una fecha de inicio valida</label>
                                </div>
                                <div class="col-span-2">
                                    <input type="date" name="fecha_fin_lista" id="fecha_fin_lista" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}"  class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                                    <p class="text-xs text-center">Fecha de fin*</p>
                                    <label id="error_fecha_fin_lista" class="hidden text-sm font-normal text-red-500" >Ingrese una fecha final valida</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-10">
                            <div id="error_retenciones_lista" class="hidden mb-5 text-center">
                                <label  name="error_retenciones_lista" class=" text-base font-normal text-red-500 text-center font-bold" >El total de rentenciones es mayor que el monto de la estimación.</label>
                            </div>
                            <p class="text-sm text-center">Retenciones</p>
                            <div class="grid grid-cols-4 gap-4">
                                <div class="col-span-2">
                                    <div class="relative ">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-700 text-base">
                                            $
                                            </span>
                                        </div>
                                        <input type="text" name="isr_lista" id="isr_lista" maxlength="20" class="pl-7  mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="0.00">
                                    </div>
                                    <p class="text-xs text-center">I.S.R.*</p>
                                    <label id="error_isr_lista" class="hidden text-sm font-normal text-red-500" >Ingrese una cantidad de ISR valida</label>
                                </div>
                                <div class="col-span-2">
                                    <div class="relative ">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-700 text-base">
                                            $
                                            </span>
                                        </div>
                                        <input type="text" name="mano_obra_lista" id="mano_obra_lista" maxlength="20" class="pl-7  mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="0.00">
                                    </div>
                                    <p class="text-xs text-center">3% de mano de obra *</p>
                                    <label id="error_mano_obra_lista" class="hidden text-sm font-normal text-red-500" >Ingrese un monto de mano de obra valido</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-10 div_pago">
                            <p class="text-sm text-center">Neto pagado</p>
                            <label id="label_monto_neto_lista" class="block text-base font-medium py-3 px-2 text-center">$ 0.00</label>
                            <div id="div_error_guardar_lista" class="hidden mx-10 text-center">
                                <label  class="text-sm font-normal text-red-500 text-center font-bold" >El neto a pagar no puede ser menor a cero.</label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10">
                        <span class="block text-xs">Verifique los campos obligatorios marcados con un ( * ) </span>
                    </div>
                </div>
                <!--footer-->
                <div class=" p-4 border-t border-solid border-blueGray-200 rounded-b">
                    <div class="text-right">
                        <button class="text-red-500 background-transparent font-bold uppercase px-6 text-sm outline-none focus:outline-none ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-lista-raya')">
                            Cancelar
                        </button>
                        <button type="submit" id="guardar_lista" class="text-blue-500 font-bold uppercase text-sm px-6 rounded outline-none focus:outline-none ease-linear transition-all duration-150" >
                            Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>

    <!-- inicio modal editar lista de raya -->
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-lista-raya-edit">
        <div class="relative w-auto my-28 mx-auto max-w-3xl">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-center justify-between px-5 py-3 border-b border-solid border-blueGray-200 rounded-t bg-blue-cmr1">
                <h4 class="text-base font-normal uppercase text-white">
                    Editar lista de raya
                </h4>
                <button class="p-1 ml-auto bg-transparent border-0 text-white float-right text-2xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-lista-raya-edit')">
                    <span>
                        <i class="fas fa-xmark"></i>
                    </span>
                </button>
            </div>
            <!--body-->
            <form action="{{ route('update_lista') }}" method="POST" id="formulario_lista_edit" name="formulario_lista_edit">
                @csrf
                @method('POST')
                <div class="relative p-6 flex-auto">
                    <div class="grid grid-cols-10 gap-4">
                        <input type="text" name="id_lista" id="id_lista" maxlength="40" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="">
                        <input type="text" name="id_obra_lista_edit" id="id_obra_lista_edit" maxlength="40" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $obj_obra->get('obra')->id_obra }}">
                        <div class="col-span-5 sm:col-span-5 ">
                            <p for="contrato" class="text-sm text-center">Número de lista de raya</p>
                            <div class="mt-1">
                                <p id="label_numero_lista_raya_edit" class="text-base font-semibold px-3 py-2 bg-gray-100 text-center mt-1 rounded-md">{{str_pad(count($listas_raya) + 1,3,"0",STR_PAD_LEFT)}}</p>
                            </div>  
                            <input type="text" name="numero_lista_raya_edit" id="numero_lista_raya_edit" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{count($listas_raya) + 1}}">
                            <label id="error_numero_lista_raya_edit" class="hidden text-base font-normal text-red-500" >Ingrese un número de estimación valido</label>
                        </div>
                        <div class="col-span-5 sm:col-span-5">
                            <p class="text-sm">Total*</p>
                            <div class="relative ">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-700 text-base">
                                    $
                                    </span>
                                </div>
                                <input type="text" name="total_lista_raya_edit" id="total_lista_raya_edit" maxlength="20" class="pl-7  mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="0.00">
                            </div>
                            <label id="error_monto_admin_mayor_edit" class="hidden text-base font-normal text-red-500" >El monto es mayor que el restante de la obra</label>
                            <label id="error_total_lista_raya_edit" class="hidden text-base font-normal text-red-500" >Ingrese un total de lista de raya valido.</label>
                        </div>
                        
                        <div class="col-span-10">
                            <p class="text-sm text-center">Periodo de la lista de raya</p>
                            <div class="grid grid-cols-4 gap-4">
                                <div class="col-span-2">
                                    <input type="date" name="fecha_inicio_lista_edit" id="fecha_inicio_lista_edit" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                                    <p class="text-xs text-center">Fecha de inicio*</p>
                                    <label id="error_fecha_inicio_lista_edit" class="hidden text-base font-normal text-red-500" >Ingrese una fecha de inicio valida</label>
                                </div>
                                <div class="col-span-2">
                                    <input type="date" name="fecha_fin_lista_edit" id="fecha_fin_lista_edit" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}"  class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                                    <p class="text-xs text-center">Fecha de fin*</p>
                                    <label id="error_fecha_fin_lista_edit" class="hidden text-base font-normal text-red-500" >Ingrese una fecha final valida</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-10">
                            <div class="text-center">
                                <label id="error_retenciones_lista_edit" name="error_retenciones_lista" class="hidden text-base font-normal text-red-500 text-center font-bold" >El total de rentenciones es mayor que el monto de la estimación.</label>
                            </div>
                            <p class="text-sm text-center">Retenciones</p>
                            <div class="grid grid-cols-4 gap-4">
                                <div class="col-span-2">
                                    <div class="relative ">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-700 text-base">
                                            $
                                            </span>
                                        </div>
                                        <input type="text" name="isr_lista_edit" id="isr_lista_edit" maxlength="20" class="pl-7  mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="0.00">
                                    </div>
                                    <p class="text-xs text-center">I.S.R.*</p>
                                    <label id="error_isr_lista_edit" class="hidden text-base font-normal text-red-500" >Ingrese una cantidad de ISR valida</label>
                                </div>
                                <div class="col-span-2">
                                    <div class="relative ">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-700 text-base">
                                            $
                                            </span>
                                        </div>
                                        <input type="text" name="mano_obra_lista_edit" id="mano_obra_lista_edit" maxlength="20" class="pl-7  mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="0.00">
                                    </div>
                                    <p class="text-xs text-center">3% de mano de obra *</p>
                                    <label id="error_mano_obra_lista_edit" class="hidden text-base font-normal text-red-500" >Ingrese un monto de mano de obra valido</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-10 div_pago">
                            <p class="text-sm font-semibold text-center">Neto pagado</p>
                            <p id="label_monto_neto_lista_edit" class="text-base font-medium py-3 px-2 text-center">$ 0.00</p>
                            <div id="div_error_guardar_lista_edit" class="hidden mx-10 text-center">
                                <label  class="text-base font-normal text-red-500 text-center font-bold" >El neto a pagar no puede ser menor a cero.</label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10">
                        <span class="block text-xs">Verifique los campos obligatorios marcados con un ( * ) </span>
                    </div>
                
                </div>
                <!--footer-->
                <div class=" p-4 border-t border-solid border-blueGray-200 rounded-b">
                    <div class="text-right">
                        <button class="text-red-500 background-transparent font-bold uppercase px-6 text-sm outline-none focus:outline-none ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-lista-raya-edit')">
                            Cancelar
                        </button>
                        <button type="submit" id="guardar_lista_edit" class="text-blue-500 font-bold uppercase text-sm px-6 rounded outline-none focus:outline-none ease-linear transition-all duration-150" >
                            Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>

    <!-- inicio modal agregar factura  -->
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-agregar-factura">
        <div class="relative w-auto my-28 mx-auto max-w-3xl">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-center justify-between px-5 py-3 border-b border-solid border-blueGray-200 rounded-t bg-blue-cmr1">
                <h4 class="text-base font-normal uppercase text-white">
                    Agregar nueva factura
                </h4>
                <button class="p-1 ml-auto bg-transparent border-0 text-white float-right text-2xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-agregar-factura')">
                    <span>
                        <i class="fas fa-xmark"></i>
                    </span>
                </button>
            </div>
            <!--body-->
            <form action="{{ route('store_factura') }}" method="POST" id="formulario_factura" name="formulario_factura">
                @csrf
                @method('POST')
                <div class="relative p-6 flex-auto">
                    <div class="grid grid-cols-10 gap-2">
                        <input type="text" name="id_obra_admin_factura" id="id_obra_admin_factura" maxlength="40" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $obj_obra->get('admin')->obra_administracion_id }}">
                        <input type="text" name="id_obra_factura" id="id_obra_factura" maxlength="40" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $obj_obra->get('obra')->id_obra }}">
                        <div class="col-span-10 sm:col-span-5">
                            <p id="label_folio_fiscal_factura" class="text-sm font-semibold">Folio fiscal*</p>
                            <input type="text" name="folio_fiscal_factura" id="folio_fiscal_factura" maxlength="36" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('oficio_notificacion') }}">
                            <label id="error_folio_fiscal_factura" name="error_folio_fiscal_factura" class="hidden text-base font-normal text-red-500" >Ingrese un folio de factura valido.</label>
                        </div>
                        <div class="col-span-5">
                            <p id="label_fecha_factura" class="text-sm font-semibold">Fecha*</p>
                            <input type="date" name="fecha_factura" id="fecha_factura" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                            <label id="error_fecha_factura" class="hidden text-base font-normal text-red-500" >Ingrese una fecha de factura valida.</label>
                        </div>
                        <div class="col-span-5 sm:col-span-5">
                            <p for="tipo" class="text-sm font-semibold">Monto*</p>
                            <div class="relative ">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-700 text-base">
                                    $
                                    </span>
                                </div>
                                <input type="text" name="total_factura" id="total_factura" maxlength="20" class="pl-7  mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="0.00">
                            </div>
                            <label id="error_monto_admin_mayor_fac" class="hidden text-base font-normal text-red-500" >El monto es mayor que el restante de la obra: $ {{number_format($obj_obra->get('obra')->monto_contratado - $total_admin, 2)}}</label>
                            <label id="error_total_factura" class="hidden text-base font-normal text-red-500" >Ingrese un monto total de factura valido.</label>
                        </div>
                        <div class="col-span-10">
                            <p id="label_concepto_factura" class="text-sm font-semibold">Concepto*</p>
                            
                            <textarea maxlength ="300" name="concepto_factura" id="concepto_factura" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}"></textarea>
                            <label id="error_concepto_factura" class="hidden text-base font-normal text-red-500" >Ingrese concepto referente a la factura valido.</label>
                        </div>
                        <div class="col-span-10">
                            <p for="proveedor" class="block text-sm font-bold text-gray-700">Proveedor*</p>
                            <select class="js-example-basic-single mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-800 focus:border-blue-800 sm:text-sm" name="proveedor_id">
                                @foreach ($proveedores as $proveedor)
                                    <option value="{{$proveedor->id_proveedor}}">
                                        {{$proveedor->rfc}} -
                                        @if ($proveedor->razon_social != null)
                                            {{$proveedor->razon_social}}
                                        @else
                                            {{$proveedor->nombre}} {{$proveedor->apellidos}}
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                            <label id="error_proveedor_id" class="hidden text-base font-normal text-red-500" >Seleccione un proveedor.</label>
                        </div>
                    </div>
                    <div class="mt-10">
                        <span class="block text-xs">Verifique los campos obligatorios marcados con un ( * ) </span>
                    </div>
                
                </div>
                <!--footer-->
                <div class=" p-4 border-t border-solid border-blueGray-200 rounded-b">
                    <div class="text-right">
                        <button class="text-red-500 background-transparent font-bold uppercase px-6 text-sm outline-none focus:outline-none ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-agregar-factura')">
                            Cancelar
                        </button>
                        <button type="submit" id="guardar_factura" class="text-blue-500 font-bold uppercase text-sm px-6 rounded outline-none focus:outline-none ease-linear transition-all duration-150" >
                            Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>

    <!-- inicio modal editar factura  -->
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-edit-factura">
        <div class="relative w-auto my-28 mx-auto max-w-3xl">
            <!--content-->
            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                <!--header-->
                <div class="flex items-center justify-between px-5 py-3 border-b border-solid border-blueGray-200 rounded-t bg-blue-cmr1">
                    <h4 class="text-base font-normal uppercase text-white">
                        Editar factura
                    </h4>
                    <button class="p-1 ml-auto bg-transparent border-0 text-white float-right text-2xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-edit-factura')">
                        <span>
                            <i class="fas fa-xmark"></i>
                        </span>
                    </button>
                </div>
                <!--body-->
                <form action="{{ route('update_factura') }}" method="POST" id="formulario_factura_edit" name="formulario_factura_edit">
                    @csrf
                    @method('POST')
                    <div class="relative p-6 flex-auto">
                        <div class="grid grid-cols-10 gap-4">
                            <input type="text" name="id_factura" id="id_factura" maxlength="40" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="">
                            <input type="text" name="id_obra_factura_edit" id="id_obra_factura_edit" maxlength="40" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $obj_obra->get('obra')->id_obra }}">
                            <div class="col-span-10 sm:col-span-5">
                                <label  id="label_folio_fiscal_factura_edit" class="block text-sm font-bold text-gray-700">Folio fiscal:</label>
                                <input type="text" name="folio_fiscal_factura_edit" id="folio_fiscal_factura_edit" maxlength="36" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('oficio_notificacion') }}">
                                <label id="error_folio_fiscal_factura_edit" name="error_folio_fiscal_factura_edit" class="hidden text-base font-normal text-red-500" >Ingrese un folio de factura valido.</label>
                            </div>
                            <div class="col-span-5">
                                <label  id="label_fecha_factura_edit" class="block text-sm font-bold text-gray-700">Fecha:</label>
                                <input type="date" name="fecha_factura_edit" id="fecha_factura_edit" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                                <label id="error_fecha_factura_edit" class="hidden text-base font-normal text-red-500" >Ingrese una fecha de factura valida.</label>
                            </div>
                            <div class="col-span-5 sm:col-span-5">
                                <label for="tipo" class="block text-sm font-bold text-gray-700">Monto*</label>
                                <div class="relative ">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-700 text-base">
                                        $
                                        </span>
                                    </div>
                                    <input type="text" name="total_factura_edit" id="total_factura_edit" maxlength="20" class="pl-7  mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="0.00">
                                </div>
                                <label id="error_monto_admin_mayor_fac_edit" class="hidden text-base font-normal text-red-500" >El monto es mayor que el restante de la obra: $ {{number_format($obj_obra->get('obra')->monto_contratado - $total_admin, 2)}}</label>
                                <label id="error_total_factura_edit" class="hidden text-base font-normal text-red-500" >Ingrese un monto total de factura valido.</label>
                            </div>
                            <div class="col-span-10">
                                <label  id="label_concepto_factura_edit" class="block text-sm font-bold text-gray-700">Concepto:</label>
                                
                                <textarea maxlength ="300" name="concepto_factura_edit" id="concepto_factura_edit" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}"></textarea>
                                <label id="error_concepto_factura_edit" class="hidden text-base font-normal text-red-500" >Ingrese concepto referente a la factura valido.</label>
                            </div>
                            <div class="col-span-10">
                                <label  for="proveedor" class="block text-sm font-bold text-gray-700">Proveedor*</label>
                                <select class="js-example-basic-single-1 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-800 focus:border-blue-800 sm:text-sm" name="proveedor_id_edit" id="proveedor_id_edit">
                                    @foreach ($proveedores as $proveedor)
                                        <option value="{{$proveedor->id_proveedor}}">
                                            {{$proveedor->rfc}} - {{$proveedor->razon_social}}
                                            @if ($proveedor->razon_social != null)
                                                {{$proveedor->razon_social}}
                                            @else
                                                {{$proveedor->nombre}} {{$proveedor->apellidos}}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                                <label id="error_proveedor_id_edit" class="hidden text-base font-normal text-red-500" >Seleccione un proveedor.</label>
                            </div>
                        </div>
                        <div class="mt-10">
                            <span class="block text-xs">Verifique los campos obligatorios marcados con un ( * ) </span>
                        </div>
                    </div>
                    <!--footer-->
                    <div class=" p-4 border-t border-solid border-blueGray-200 rounded-b">
                        <div class="text-right">            
                            <button class="text-red-500 background-transparent font-bold uppercase px-6 text-sm outline-none focus:outline-none ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-edit-factura')">
                                Cancelar
                            </button>
                            <button type="submit" id="guardar_factura_edit" class="text-blue-500 font-bold uppercase text-sm px-6 rounded outline-none focus:outline-none ease-linear transition-all duration-150" >
                                Guardar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- inicio modal agregar factura  -->
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-agregar-contrato">
        <div class="relative w-auto my-28 mx-auto max-w-3xl">
            <!--content-->
            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                <!--header-->
                <div class="flex items-center justify-between px-5 py-3 border-b border-solid border-blueGray-200 rounded-t bg-blue-cmr1">
                    <h4 class="text-base font-normal uppercase text-white">
                        Agregar nuevo contrato de arrendamiento
                    </h4>
                    <button class="p-1 ml-auto bg-transparent border-0 text-white float-right text-2xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-agregar-contrato')">
                        <span>
                            <i class="fas fa-xmark"></i>
                        </span>
                    </button>
                </div>
                <!--body-->
                <form action="{{ route('store_contrato') }}" method="POST" id="formulario_contrato" name="formulario_contrato">
                    @csrf
                    @method('POST')
                    <div class="relative p-6 flex-auto">
                        <div class="grid grid-cols-10 gap-4">
                            <input type="text" name="id_obra_admin_contrato" id="id_obra_admin_contrato" maxlength="40" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $obj_obra->get('admin')->obra_administracion_id }}">
                            <input type="text" name="id_obra_contrato" id="id_obra_contrato" maxlength="40" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $obj_obra->get('obra')->id_obra }}">
                            <div class="col-span-10 sm:col-span-5">
                                <p  id="label_numero_contrato" class="text-sm font-semibold">Número de contrato*</p>
                                <input type="text" name="numero_contrato" id="numero_contrato" maxlength="36" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('oficio_notificacion') }}">
                                <label id="error_numero_contrato" name="error_numero_factura" class="hidden text-sm font-normal text-red-500" >Ingrese un folio de factura valido.</label>
                            </div>
                            <div class="col-span-5">
                                <p id="label_fecha_contrato" class="text-sm font-semibold">Fecha de contrato*</p>
                                <input type="date" name="fecha_contrato" id="fecha_contrato" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                                <label id="error_fecha_contrato" class="hidden text-base font-normal text-red-500" >Ingrese una fecha de factura valida.</label>
                            </div>
                            <div class="col-span-5 sm:col-span-5">
                                <p for="tipo" class="text-sm font-semibold">Monto*</p>
                                <div class="relative ">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-700 text-base">
                                        $
                                        </span>
                                    </div>
                                    <input type="text" name="total_contrato" id="total_contrato" maxlength="20" class="pl-7  mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="0.00">
                                </div>
                                <label id="error_monto_admin_mayor_contrato" class="hidden text-base font-normal text-red-500" >El monto es mayor que el restante de la obra: $ {{number_format($obj_obra->get('obra')->monto_contratado - $total_admin, 2)}}</label>
                                <label id="error_total_contrato" class="hidden text-base font-normal text-red-500" >Ingrese un monto total de factura valido.</label>
                            </div>
                            <div class="col-span-10">
                                <p  for="proveedor" class="text-sm font-semibold">Proveedor*</p>
                                <select class="js-example-basic-single mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-800 focus:border-blue-800 sm:text-sm" name="proveedor_id_contrato" id="proveedor_id_contrato">
                                    @foreach ($proveedores as $proveedor)
                                        <option value="{{$proveedor->id_proveedor}}">
                                            {{$proveedor->rfc}} - {{$proveedor->razon_social}}
                                            @if ($proveedor->razon_social != null)
                                                {{$proveedor->razon_social}}
                                            @else
                                                {{$proveedor->nombre}} {{$proveedor->apellidos}}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                                <label id="error_proveedor_id_contrato" class="hidden text-base font-normal text-red-500" >Seleccione un proveedor.</label>
                            </div>
                            <div class="col-span-10">
                                <p for="periodo_contrato" class="text-sm font-semibold text-center">Periodo de contrato de arrendamiento</p>
                                <div class="grid grid-cols-4 gap-4">
                                    <div class="col-span-2">
                                        <input type="date" name="fecha_inicio_contrato" id="fecha_inicio_contrato" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                                        <p class="text-xs text-center">Fecha de inicio*</p>
                                        <label id="error_fecha_inicio_contrato" class="hidden text-base font-normal text-red-500" >Ingrese una fecha de inicio valida</label>
                                    </div>
                                    <div class="col-span-2">
                                        <input type="date" name="fecha_fin_contrato" id="fecha_fin_contrato" min="{{$obj_obra->get('obra')->fecha_inicio_programada}}" max="{{$obj_obra->get('obra')->fecha_final_real}}"  class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('fecha_oficio_notificacion') }}">
                                        <p class="text-xs text-center">Fecha de fin*</p>
                                        <label id="error_fecha_fin_contrato" class="hidden text-base font-normal text-red-500" >Ingrese una fecha final valida</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10">
                            <span class="block text-xs">Verifique los campos obligatorios marcados con un ( * ) </span>
                        </div>
                    </div>
                    <!--footer-->
                    <div class=" p-4 border-t border-solid border-blueGray-200 rounded-b">
                        <div class="text-right">
                            <button class="text-red-500 background-transparent font-bold uppercase px-6 text-sm outline-none focus:outline-none ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-agregar-contrato')">
                                Cancelar
                            </button>
                            <button type="submit" id="guardar_contrato" class="text-blue-500 font-bold uppercase text-sm px-6 rounded outline-none focus:outline-none ease-linear transition-all duration-150" >
                                Guardar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-lista-raya-backdrop"></div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-lista-raya-edit-backdrop"></div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-agregar-factura-backdrop"></div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-edit-factura-backdrop"></div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-agregar-contrato-backdrop"></div>
@endif

<!-- inicio modal -->
<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-checklist">
    <div class="relative w-auto my-28 mx-auto max-w-3xl">
    <!--content-->
    <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
        <!--header-->
        <div class="flex items-center justify-between px-5 py-3 border-b border-solid border-blueGray-200 rounded-t bg-blue-cmr1">
            <h4 class="text-base font-normal uppercase text-white">
                Subir checklist de obra
            </h4>
            <button class="p-1 ml-auto bg-transparent border-0 text-white float-right text-2xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-checklist')">
                <span>
                    <i class="fas fa-xmark"></i>
                </span>
            </button>
        </div>
        <!--body-->
        <form action="{{ route('upload_checklist') }}" id="formulario_file_checklist" name="formulario_file_checklist" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="relative p-6 flex-auto mt-10">
                <div class="grid grid-cols-10 gap-4">
                    <input type="text" name="id_obra" maxlength="40" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $obj_obra->get('obra')->id_obra }}">
                    <input type="text" name="id_municipio" maxlength="40" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $obj_obra->get('obra')->id_municipio }}">
                    <input type="text" name="ejercicio" maxlength="40" class="hidden mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $obj_obra->get('obra')->ejercicio }}">
                    <div class="col-span-10">
                        <div class="container-input flex justify-center items-center">
                            <input type="file" name="file-2" id="file-2" class="inputfile inputfile-2" multiple accept="application/pdf"/>
                            <label for="file-2" class="flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
                                <span class="iborrainputfile">Seleccionar archivo</span>
                            </label>
                        </div> 
                    </div>    
                </div>
                <div class="mt-10">
                    <span class="block text-xs">Verifique los campos obligatorios marcados con un ( * ) </span>
                </div>
            </div>
            <!--footer-->
            <div class=" p-4 border-t border-solid border-blueGray-200 rounded-b">
                
                
                <div class="text-right">
                    <button class="text-red-500 background-transparent font-bold uppercase px-6 text-sm outline-none focus:outline-none ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-checklist')">
                        Cancelar
                    </button>
                    <button type="submit" id="guardar" class="text-blue-500 font-bold uppercase text-sm px-6 rounded outline-none focus:outline-none ease-linear transition-all duration-150" >
                        Guardar
                    </button>
            </div>
        </div>
        </form>

        
    </div>
    </div>
</div>

<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-checklist-backdrop"></div>
    
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/mk_charts.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.4/b-flash-1.6.4/b-html5-1.6.4/b-print-1.6.4/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.4/b-flash-1.6.4/b-html5-1.6.4/b-print-1.6.4/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            

            $('.table1').DataTable({
                "autoWidth": true,
                "responsive": true,
                "bFilter": false,
                "bPaginate": false,
                "bInfo": false,
                columnDefs: [{
                        responsivePriority: 1,
                        targets: 1
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
                order: [[ 0 , 'desc' ]],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                }
            })
            .columns.adjust();

            $('.table_estimacion').DataTable({
                "autoWidth": true,
                "responsive": true,
                "bFilter": false,
                "bPaginate": false,
                "bInfo": false,
                columnDefs: [{
                        responsivePriority: 1,
                        targets: 1
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
                order: [[ 0 , 'asc' ]],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                }
            })
            .columns.adjust();

            $("#contrato").on({
                "keydown": function(event) {
                    capturado = $(this).val();
                    
                    if(capturado.length > 40 || event.keyCode == 32){
                        return false;
                    }
                },
            });

            $("#avance_fisico").on({
                "keydown": function(event) { 
                    var totalx = $(this).val() + event.key;
                    if(event.keyCode != 8){
                        return (totalx < 101);
                    }else{
                        return true;
                    }
                    
                }
            });

            $("#formulario_periodo").validate({
                onfocusout: false,
                onclick: false,
                rules: {
                    fecha_inicio: { required: true},
                    fecha_fin: { required: true},
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

            $("#formulario_af").validate({
                onfocusout: false,
                onclick: false,
                rules: {
                    avance_fisico: { required: true},
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
            
            observaciones_datos = "{{str_replace("\r\n","  --  ", $observaciones?$observaciones->observacion:'\r\n')}}";
            
            observaciones_texto = "<p> * " + observaciones_datos.replaceAll("  --  ", '</p><p> * ') + "</p>";
            console.log(observaciones_texto);
            $('#div_observaciones').html(observaciones_texto);
        
        });
    </script>

    @if(session('mensaje')=='ok')
        <script>
            Swal.fire({  
                title: '{{session('datos')[1]}}',
                text: '{{session('datos')[2]}}',
                icon: '{{session('datos')[0]}}',
                confirmButtonText: 'Ok'

            })
        </script>
    @endif

    <script>

        
        "use strict";

        (function (document, window, index) {
        var inputs = document.querySelectorAll(".inputfile");
        Array.prototype.forEach.call(inputs, function (input) {
            var label = input.nextElementSibling,
            labelVal = label.innerHTML;

            input.addEventListener("change", function (e) {
            var fileName = "";
            if (this.files && this.files.length > 1)
                fileName = (this.getAttribute("data-multiple-caption") || "").replace(
                "{count}",
                this.files.length
                );
            else fileName = e.target.value.split("\\").pop();

            if (fileName) label.querySelector("span").innerHTML = fileName;
            else label.innerHTML = labelVal;
            });
        });
        })(document, window, 0);


        function mostrar_edicion(){
            $(".mostrar_datos").addClass("hidden");
            $("#formulario_nc").removeClass("hidden");
        }
        
        function ocultar_edicion(){
            $(".mostrar_datos").removeClass("hidden");
            $("#formulario_nc").addClass("hidden");
        }

        function modificar_af(){
            console.log("hola mundo");
            $(".modificar_af").addClass("hidden");
            $("#formulario_af").removeClass("hidden");
        }
        function ocultar_af(){
            $(".modificar_af").removeClass("hidden");
            $("#formulario_af").addClass("hidden");
        }
    </script>
@if($obj_obra->get('obra')->modalidad_ejecucion == 1)
    <script>

        function mostrar_periodo(){
            $(".ocultar_periodo").addClass("hidden");
            $("#formulario_periodo").removeClass("hidden");
        }

        function ocultar_periodo(){
            $(".ocultar_periodo").removeClass("hidden");
            $("#formulario_periodo").addClass("hidden");
        }

        function toggleModal(modalID){
            console.log(modalID)
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
        }

        function toggleModal_EditLista(modalID, lista, numero){
            console.log(lista);
            total = parseFloat(lista.total).toFixed(2);
            $("#label_numero_lista_raya_edit").html(numero);
            $("#numero_lista_raya_edit").val(lista.numero_lista_raya);
            $("#total_lista_raya_edit").val(("" + total).replace(/\D/g, "").replace(/([0-9])([0-9]{2})$/, '$1.$2').replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ","));
            $("#fecha_inicio_lista_edit").val(lista.fecha_inicio);
            $("#fecha_fin_lista_edit").val(lista.fecha_fin);
            total_isr = parseFloat(lista.isr).toFixed(2);
            $("#isr_lista_edit").val(("" + total_isr).replace(/\D/g, "").replace(/([0-9])([0-9]{2})$/, '$1.$2').replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ","));
            total_mano = parseFloat(lista.mano_obra).toFixed(2);
            $("#mano_obra_lista_edit").val(("" + total_mano).replace(/\D/g, "").replace(/([0-9])([0-9]{2})$/, '$1.$2').replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ","));
            total_neto = lista.total - lista.isr - lista.mano_obra;
            total_neto = parseFloat(total_neto).toFixed(2);
            $("#label_monto_neto_lista_edit").html("$ "+("" + total_neto).replace(/\D/g, "").replace(/([0-9])([0-9]{2})$/, '$1.$2').replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ","));
            $("#id_lista").val(lista.id_lista_raya);
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");


        }

        function toggleModal_EditFactura(modalID, factura){
            console.log(factura);
            total = parseFloat(factura.total).toFixed(2);
            $("#id_factura").val(factura.id_factura);
            $("#folio_fiscal_factura_edit").val(factura.folio_fiscal);
            $("#fecha_factura_edit").val(factura.fecha);
            $("#total_factura_edit").val(("" + total).replace(/\D/g, "").replace(/([0-9])([0-9]{2})$/, '$1.$2').replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ","));
            $("#concepto_factura_edit").val(factura.concepto);
            $("#proveedor_id_edit option[value="+factura.proveedor_id+"]").attr("selected",true);
            $('.js-example-basic-single-1').select2();
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");


        }

        function modificar_neto(){
            total_lista = $("#total_lista_raya").val().replaceAll(",", '');
            total_isr = $("#isr_lista").val().replaceAll(",", '');
            total_3por = $("#mano_obra_lista").val().replaceAll(",", '');

            total = total_lista - total_isr - total_3por;
            total = parseFloat(total).toFixed(2);
            $("#label_monto_neto_lista").html(total);

            if(total < 0 ){
                $("#error_retenciones_lista").removeClass("hidden");
                $("#label_monto_neto_lista").html("$ -"+("" + total).replace(/\D/g, "").replace(/([0-9])([0-9]{2})$/, '$1.$2').replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ","));
                $("#label_monto_neto_lista").removeClass("text-gray-700");
                $("#label_monto_neto_lista").addClass("text-red-500");
                return false;
            }else {
                $("#error_retenciones_lista").addClass("hidden");
                $("#label_monto_neto_lista").html("$ "+("" + total).replace(/\D/g, "").replace(/([0-9])([0-9]{2})$/, '$1.$2').replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ","));
                $("#label_monto_neto_lista").addClass("text-gray-700");
                $("#label_monto_neto_lista").removeClass("text-red-500");   
                return true;         
            }
        }

        function modificar_neto_edit(){
            total_lista = $("#total_lista_raya_edit").val().replaceAll(",", '');
            total_isr = $("#isr_lista_edit").val().replaceAll(",", '');
            total_3por = $("#mano_obra_lista_edit").val().replaceAll(",", '');

            total = total_lista - total_isr - total_3por;
            total = parseFloat(total).toFixed(2);
            $("#label_monto_neto_lista_edit").html(total);

            if(total < 0 ){
                $("#error_retenciones_lista_edit").removeClass("hidden");
                $("#label_monto_neto_lista_edit").html("$ -"+("" + total).replace(/\D/g, "").replace(/([0-9])([0-9]{2})$/, '$1.$2').replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ","));
                $("#label_monto_neto_lista_edit").removeClass("text-gray-700");
                $("#label_monto_neto_lista_edit").addClass("text-red-500");
                return false;
            }else {
                $("#error_retenciones_lista_edit").addClass("hidden");
                $("#label_monto_neto_lista_edit").html("$ "+("" + total).replace(/\D/g, "").replace(/([0-9])([0-9]{2})$/, '$1.$2').replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ","));
                $("#label_monto_neto_lista_edit").addClass("text-gray-700");
                $("#label_monto_neto_lista_edit").removeClass("text-red-500");   
                return true;         
            }
        }

        $(document).ready(function() {

            $("ul.tabs li").click(function() {
                $("ul.tabs li").removeClass("active"); //Remove any "active" class
                $(this).addClass("active"); //Add "active" class to selected tab
                $(".tab_content").hide(); //Hide all tab content

                var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
                $(activeTab).fadeIn(); //Fade in the active ID content
                return false;
            });

            $('#fecha_inicio_lista').change(function() {
                fecha = new Date($(this).val());
                if(fecha != "Invalid Date"){
                    $("#fecha_fin_lista").attr("min", $(this).val());
                }
            });

            $('#fecha_fin_lista').change(function() {
                fecha = new Date($(this).val());
                if(fecha != "Invalid Date"){
                    $("#fecha_inicio_lista").attr("max", $(this).val());
                }
            });

            $("#total_lista_raya").on({
                "keyup": function(event) {
                    $(event.target).val(function(index, value) {
                        return value.replace(/\D/g, "")
                            .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                    });

                    total_capturado =  parseFloat($(this).val().replaceAll(",", ''));
                    
                    total = {{$total_admin==''?0:$total_admin}};
                    total_obra = {{$obj_obra->get('obra')->monto_contratado}};
                        
                    total = total_capturado + total;
                    if(total > total_obra){
                        $("#error_monto_admin_mayor").removeClass("hidden");
                    }else{
                        $("#error_monto_admin_mayor").addClass("hidden");
                    }

                    modificar_neto();
                }
            });

            $("#isr_lista, #mano_obra_lista").on({
                "keyup": function(event) {
                    $(event.target).val(function(index, value) {
                        return value.replace(/\D/g, "")
                            .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                    });

                    modificar_neto();
                }
            });

            $("#guardar_lista").click(function () {

                
                total_capturado =  parseFloat($("#total_lista_raya").val().replaceAll(",", ''));
                    
                total = {{$total_admin}};
                total_obra = {{$obj_obra->get('obra')->monto_contratado}};
                        
                total = total_capturado + total;
                if(total > total_obra){
                    return false;
                }else{
                    estado = modificar_neto();
                    if(estado)
                        $("#div_error_guardar_lista").addClass("hidden");
                    else
                        $("#div_error_guardar_lista").removeClass("hidden"); 
                    return estado;
                }
                    
            });

            $("#formulario_lista").validate({
                onfocusout: false,
                onclick: false,
                rules: {
                    total_lista_raya: { required: true },
                    fecha_inicio_lista: { required: true },
                    fecha_fin_lista: { required:true },
                    isr_lista: { required:true },
                    mano_obra_lista: { required: true },
                },
                errorPlacement: function(error, element) {
                    console.log("1"+element.attr('id'));
                    if(error != null){
                    $('#error_'+element.attr('id')).fadeIn();
                    }else{
                    $('#error_'+element.attr('id')).fadeOut();
                    }
                // console.log(element.attr('id'));
                },
            }); 

            $("#formulario_lista input").on({
                "change":function(event) {
                    fecha = new Date($(this).val());
                    if($(this).attr('type')== "date"){
                        if(fecha != "Invalid Date"){
                            console.log(fecha);
                            $('#error_'+$(this).attr('id')).fadeOut();
                            $("#label_"+$(this).attr('id')).removeClass('text-red-500');
                            $("#label_"+$(this).attr('id')).addClass('text-gray-700');
                        }else{
                            $('#error_'+$(this).attr('id')).fadeIn();
                            $("#label_"+$(this).attr('id')).addClass('text-red-500');
                            $("#label_"+$(this).attr('id')).removeClass('text-gray-700');
                        }
                    }
                },
                "keyup": function(event) {
                    
                    fecha = $(this).val();
                    
                    if(fecha != ''){
                        console.log(fecha);
                        $('#error_'+$(this).attr('id')).fadeOut();
                        $("#label_"+$(this).attr('id')).removeClass('text-red-500');
                        $("#label_"+$(this).attr('id')).addClass('text-gray-700');
                    }else{
                        console.log("fecha");
                        $('#error_'+$(this).attr('id')).fadeIn();
                        $("#label_"+$(this).attr('id')).addClass('text-red-500');
                        $("#label_"+$(this).attr('id')).removeClass('text-gray-700');
                    }
                },
            });

            
            //Modal editar lista de raya

            $('#fecha_inicio_lista_edit').change(function() {
                fecha = new Date($(this).val());
                if(fecha != "Invalid Date"){
                    $("#fecha_fin_lista_edit").attr("min", $(this).val());
                }
            });

            $('#fecha_fin_lista_edit').change(function() {
                fecha = new Date($(this).val());
                if(fecha != "Invalid Date"){
                    $("#fecha_inicio_lista_edit").attr("max", $(this).val());
                }
            });

            $("#total_lista_raya_edit").on({
                "keyup": function(event) {
                    $(event.target).val(function(index, value) {
                        return value.replace(/\D/g, "")
                            .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                    });
                    console.log("hola mundo");
                    total_capturado =  parseFloat($(this).val().replaceAll(",", ''));
                    
                    total = {{$total_admin}};
                    total_obra = {{$obj_obra->get('obra')->monto_contratado}};
                        
                    total = total_capturado + total;
                    if(total > total_obra){
                        $("#error_monto_admin_mayor_edit").removeClass("hidden");
                    }else{
                        $("#error_monto_admin_mayor_edit").addClass("hidden");
                    }

                    modificar_neto_edit();
                }
            });

            $("#isr_lista_edit, #mano_obra_lista_edit").on({
                "keyup": function(event) {
                    $(event.target).val(function(index, value) {
                        return value.replace(/\D/g, "")
                            .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                    });

                    modificar_neto_edit();
                }
            });

            $("#guardar_lista_edit").click(function () {

                total_capturado =  parseFloat($("#total_lista_raya_edit").val().replaceAll(",", ''));
                    
                total = {{$total_admin}};
                total_obra = {{$obj_obra->get('obra')->monto_contratado}};
                        
                total = total_capturado + total;
                if(total > total_obra){
                    return false;
                }else{
                    estado = modificar_neto_edit();
                    if(estado)
                        $("#div_error_guardar_lista_edit").addClass("hidden");
                    else
                        $("#div_error_guardar_lista_edit").removeClass("hidden"); 
                    return estado;
                }
                    
            });

            

            $("#formulario_lista_edit").validate({
                onfocusout: false,
                onclick: false,
                rules: {
                    total_lista_raya_edit: { required: true},
                    fecha_inicio_lista_edit: { required: true},
                    fecha_fin_lista_edit: { required:true },
                    isr_lista_edit: { required:true },
                    mano_obra_lista_edit: { required: true },
                },
                errorPlacement: function(error, element) {
                    console.log(element.attr('id'));
                    if(error != null){
                    $('#error_'+element.attr('id')).fadeIn();
                    }else{
                    $('#error_'+element.attr('id')).fadeOut();
                    }
                // console.log(element.attr('id'));
                },
            }); 

            $("#formulario_lista_edit input").on({
                "change":function(event) {
                    fecha = new Date($(this).val());
                    if($(this).attr('type') == "date"){
                        if(fecha != "Invalid Date"){
                            console.log(fecha);
                            $('#error_'+$(this).attr('id')).fadeOut();
                            $("#label_"+$(this).attr('id')).removeClass('text-red-500');
                            $("#label_"+$(this).attr('id')).addClass('text-gray-700');
                        }else{
                            $('#error_'+$(this).attr('id')).fadeIn();
                            $("#label_"+$(this).attr('id')).addClass('text-red-500');
                            $("#label_"+$(this).attr('id')).removeClass('text-gray-700');
                        }
                    }
                },
                "keyup": function(event) {
                    
                    fecha = $(this).val();
                    
                    if(fecha != ''){
                        console.log(fecha);
                        $('#error_'+$(this).attr('id')).fadeOut();
                        $("#label_"+$(this).attr('id')).removeClass('text-red-500');
                        $("#label_"+$(this).attr('id')).addClass('text-gray-700');
                    }else{
                        console.log("fecha");
                        $('#error_'+$(this).attr('id')).fadeIn();
                        $("#label_"+$(this).attr('id')).addClass('text-red-500');
                        $("#label_"+$(this).attr('id')).removeClass('text-gray-700');
                    }
                },
            });

            

            //Modal crear factura
            $('.js-example-basic-single').select2();
            $("#total_factura").on({
                "keyup": function(event) {
                    $(event.target).val(function(index, value) {
                        return value.replace(/\D/g, "")
                            .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                    });

                    total_capturado =  parseFloat($(this).val().replaceAll(",", ''));
                    
                    total = {{$total_admin}};
                    total_obra = {{$obj_obra->get('obra')->monto_contratado}};
                        
                    total = total_capturado + total;
                    if(total > total_obra){
                        $("#error_monto_admin_mayor_fac").removeClass("hidden");
                    }else{
                        $("#error_monto_admin_mayor_fac").addClass("hidden");
                    }

                    modificar_neto();
                }
            });


            $("#formulario_factura").validate({
                onfocusout: false,
                onclick: false,
                rules: {
                    folio_fiscal_factura: { required: true},
                    fecha_factura: { required: true},
                    total_factura: { required:true },
                    proveedor_id: { required: true },
                },
                errorPlacement: function(error, element) {
                    
                    if(error != null){
                        $('#error_'+element.attr('id')).removeClass('hidden');
                    }else{
                        $('#error_'+element.attr('id')).addClass('hidden');
                    }
                // console.log(element.attr('id'));
                },
            }); 

            $("#guardar_factura").click(function () {
                total_capturado =  parseFloat($("#total_factura").val().replaceAll(",", ''));
                    
                total = {{$total_admin}};
                total_obra = {{$obj_obra->get('obra')->monto_contratado}};
                        
                total = total_capturado + total;
                concepto = $("#concepto_factura").val().length;
                
                if(total > total_obra){
                    return false;
                }else{

                    valido = true;
                    if(concepto < 10){
                        $("#formulario_factura input, #formulario_factura textarea").change();
                        $("#formulario_factura input, #formulario_factura textarea").keyup();
                        valido = false;
                    }
                    return valido;
                }
                    
            });

            $("#formulario_factura input, #formulario_factura textarea").on({
                "change":function(event) {
                    fecha = new Date($(this).val());
                    console.log($(this).attr('type'));
                    if($(this).attr('type')== "date"){
                        console.log("hola");
                        if(fecha != "Invalid Date"){
                            console.log(fecha);
                            $('#error_'+$(this).attr('id')).addClass('hidden');
                            $("#label_"+$(this).attr('id')).removeClass('text-red-500');
                            $("#label_"+$(this).attr('id')).addClass('text-gray-700');
                        }else{
                            $('#error_'+$(this).attr('id')).removeClass('hidden');
                            $("#label_"+$(this).attr('id')).addClass('text-red-500');
                            $("#label_"+$(this).attr('id')).removeClass('text-gray-700');
                        }
                    }
                },
                "keyup": function(event) {
                    
                    fecha = $(this).val();
                    if(fecha != ''){
                        console.log(fecha);
                        $('#error_'+$(this).attr('id')).addClass('hidden');
                        $("#label_"+$(this).attr('id')).removeClass('text-red-500');
                        $("#label_"+$(this).attr('id')).addClass('text-gray-700');
                    }else{
                        console.log("fecha");
                        $('#error_'+$(this).attr('id')).removeClass('hidden');
                        $("#label_"+$(this).attr('id')).addClass('text-red-500');
                        $("#label_"+$(this).attr('id')).removeClass('text-gray-700');
                    }
                },
            });

            //Modal editar factura
            $("#total_factura_edit").on({
                "keyup": function(event) {
                    $(event.target).val(function(index, value) {
                        return value.replace(/\D/g, "")
                            .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                    });

                    total_capturado =  parseFloat($(this).val().replaceAll(",", ''));
                    
                    total = {{$total_admin}};
                    total_obra = {{$obj_obra->get('obra')->monto_contratado}};
                        
                    total = total_capturado + total;
                    if(total > total_obra){
                        $("#error_monto_admin_mayor_fac_edit").removeClass("hidden");
                    }else{
                        $("#error_monto_admin_mayor_fac_edit").addClass("hidden");
                    }
                }
            });


            $("#formulario_factura_edit").validate({
                onfocusout: false,
                onclick: false,
                rules: {
                    folio_fiscal_factura_edit: { required: true},
                    fecha_factura_edit: { required: true},
                    total_factura_edit: { required:true },
                    proveedor_id_edit: { required: true },
                },
                errorPlacement: function(error, element) {
                    
                    if(error != null){
                        $('#error_'+element.attr('id')).removeClass('hidden');
                    }else{
                        $('#error_'+element.attr('id')).addClass('hidden');
                    }
                // console.log(element.attr('id'));
                },
            }); 

            $("#guardar_factura_edit").click(function () {
                total_capturado =  parseFloat($("#total_factura_edit").val().replaceAll(",", ''));
                    
                total = {{$total_admin}};
                total_obra = {{$obj_obra->get('obra')->monto_contratado}};
                        
                total = total_capturado + total;
                concepto = $("#concepto_factura_edit").val().length;
                
                if(total > total_obra){
                    return false;
                }else{

                    valido = true;
                    if(concepto < 10){
                        $("#formulario_factura_edit input, #formulario_factura_edit textarea").change();
                        $("#formulario_factura_edit input, #formulario_factura_edit textarea").keyup();
                        $("#error_concepto_factura_edit").removeClass("hidden");
                        valido = false;
                    }
                    return valido;
                }
                    
            });

            $("#formulario_factura_edit input, #formulario_factura_edit textarea").on({
                "change":function(event) {
                    fecha = new Date($(this).val());
                    if($(this).attr('type')== "date"){
                        if(fecha != "Invalid Date"){
                            $('#error_'+$(this).attr('id')).addClass('hidden');
                            $("#label_"+$(this).attr('id')).removeClass('text-red-500');
                            $("#label_"+$(this).attr('id')).addClass('text-gray-700');
                        }else{
                            $('#error_'+$(this).attr('id')).removeClass('hidden');
                            $("#label_"+$(this).attr('id')).addClass('text-red-500');
                            $("#label_"+$(this).attr('id')).removeClass('text-gray-700');
                        }
                    }
                },
                "keyup": function(event) {
                    
                    fecha = $(this).val();
                    if(fecha != ''){
                        console.log(fecha);
                        $('#error_'+$(this).attr('id')).addClass('hidden');
                        $("#label_"+$(this).attr('id')).removeClass('text-red-500');
                        $("#label_"+$(this).attr('id')).addClass('text-gray-700');
                    }else{
                        console.log("fecha");
                        $('#error_'+$(this).attr('id')).removeClass('hidden');
                        $("#label_"+$(this).attr('id')).addClass('text-red-500');
                        $("#label_"+$(this).attr('id')).removeClass('text-gray-700');
                    }
                },
            });
            
            //Modal editar contrato arrendamiento
            $("#total_contrato").on({
                "keyup": function(event) {
                    $(event.target).val(function(index, value) {
                        return value.replace(/\D/g, "")
                            .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                    });

                    total_capturado =  parseFloat($(this).val().replaceAll(",", ''));
                    
                    total = {{$total_admin}};
                    total_obra = {{$obj_obra->get('obra')->monto_contratado}};
                        
                    total = total_capturado + total;
                    if(total > total_obra){
                        $("#error_monto_admin_mayor_contrato").removeClass("hidden");
                    }else{
                        $("#error_monto_admin_mayor_contrato").addClass("hidden");
                    }
                }
            });


            $("#formulario_contrato").validate({
                onfocusout: false,
                onclick: false,
                rules: {
                    folio_fiscal_contrato: { required: true},
                    fecha_contrato: { required: true},
                    total_contrato: { required:true },
                    proveedor_id_contrato: { required: true },
                    fecha_inicio_contrato: { required: true },
                    fecha_fin_contrato: { required: true },
                },
                errorPlacement: function(error, element) {
                    
                    if(error != null){
                        $('#error_'+element.attr('id')).removeClass('hidden');
                    }else{
                        $('#error_'+element.attr('id')).addClass('hidden');
                    }
                // console.log(element.attr('id'));
                },
            }); 

            $("#guardar_contrato").click(function () {
                total_capturado =  parseFloat($("#total_contrato").val().replaceAll(",", ''));
                    
                total = {{$total_admin}};
                total_obra = {{$obj_obra->get('obra')->monto_contratado}};
                        
                total = total_capturado + total;
                
                if(total > total_obra){
                    return false;
                }else{

                    valido = true;
                    return valido;
                }
                    
            });

            $("#formulario_contrato input").on({
                "change":function(event) {
                    fecha = new Date($(this).val());
                    if($(this).attr('type')== "date"){
                        if(fecha != "Invalid Date"){
                            $('#error_'+$(this).attr('id')).addClass('hidden');
                            $("#label_"+$(this).attr('id')).removeClass('text-red-500');
                            $("#label_"+$(this).attr('id')).addClass('text-gray-700');
                        }else{
                            $('#error_'+$(this).attr('id')).removeClass('hidden');
                            $("#label_"+$(this).attr('id')).addClass('text-red-500');
                            $("#label_"+$(this).attr('id')).removeClass('text-gray-700');
                        }
                    }
                },
                "keyup": function(event) {
                    
                    monto = $(this).val();
                    if(monto != ''){
                        $('#error_'+$(this).attr('id')).addClass('hidden');
                        $("#label_"+$(this).attr('id')).removeClass('text-red-500');
                        $("#label_"+$(this).attr('id')).addClass('text-gray-700');
                    }else{
                        $('#error_'+$(this).attr('id')).removeClass('hidden');
                        $("#label_"+$(this).attr('id')).addClass('text-red-500');
                        $("#label_"+$(this).attr('id')).removeClass('text-gray-700');
                    }
                },
            });

            $('#fecha_inicio_contrato').change(function() {
                fecha = new Date($(this).val());
                if(fecha != "Invalid Date"){
                    $("#fecha_fin_contrato").attr("min", $(this).val());
                }
            });

            $('#fecha_fin_contrato').change(function() {
                fecha = new Date($(this).val());
                if(fecha != "Invalid Date"){
                    $("#fecha_inicio_contrato").attr("max", $(this).val());
                }
            });
            $("#numero_contrato").on({
            "keydown": function(event) {
                capturado = $(this).val();
                
                if(capturado.length > 40 || event.keyCode == 32){
                    return false;
                }
            },
        });
            
        });

    </script>
@endif
@if($obj_obra->get('obra')->modalidad_ejecucion == 2)
    <script>
        

        function toggleModal(modalID){
        document.getElementById(modalID).classList.toggle("hidden");
        document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
        }

        function toggleModal_1(modalID, convenio){
            console.log(convenio);
            $("#numero_convenio_modificatorio_edit").val(convenio.numero_convenio_modificatorio);
            $.each($("#tipo_edit option"),function(i,v){
                value = v.value;
                $("#tipo_edit option[value='"+value+"']").remove();
            })

            $('#tipo_edit').prepend("<option value='"+convenio.tipo+"' >"+convenio.tipo+"</option>");
            $("#fecha_convenio_edit").val(convenio.fecha_convenio);
            $("#id_convenio_modificatorio").val(convenio.id_convenio_modificatorio);
            monto_valor = parseFloat(convenio.monto_modificado).toFixed(2);
            $("#monto_modificado_edit").val((""+ monto_valor).replace(/\D/g, "").replace(/([0-9])([0-9]{2})$/, '$1.$2').replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ","));
            $("#fecha_fin_modificada_edit").val(convenio.fecha_fin_modificada);
            switch (convenio.tipo) {
                case "Convenio modificatorio al monto del contrato":
                    $('#monto_modificado_edit_div').removeClass("hidden");
                    $('#mod_fecha_fin_edit').addClass("hidden");
                    $("#fecha_fin_modificada_edit").val("");
                break;
                case "Convenio modificatorio a la fecha del contrato":
                    $('#mod_fecha_fin_edit').removeClass("hidden");
                    $('#monto_modificado_edit_div').addClass("hidden");
                    $("#fecha_fin_modificada_edit").val(convenio.fecha_fin_modificada);
                break;
                case "Convenio modificatorio a las metas del contrato":
                    $('#mod_fecha_fin_edit').addClass("hidden");
                    $('#monto_modificado_edit_div').addClass("hidden");
                    $("#fecha_fin_modificada_edit").val("");
                break;
                case "Convenio modificatorio al monto y fecha de contrato":
                    $('#mod_fecha_fin_edit').removeClass("hidden");
                    $('#monto_modificado_edit_div').removeClass("hidden");
                    $("#fecha_fin_modificada_edit").val(convenio.fecha_fin_modificada);
                break;
                case "Convenio modificatorio al monto y metas de contrato":
                    $('#mod_fecha_fin_edit').addClass("hidden");
                    $('#monto_modificado_edit_div').removeClass("hidden");
                    $("#fecha_fin_modificada_edit").val("");
                break;
                case "Convenio modificatorio a la fecha y metas de contrato":
                    $('#mod_fecha_fin_edit').removeClass("hidden");
                    $('#monto_modificado_edit_div').addClass("hidden");
                    $("#fecha_fin_modificada_edit").val(convenio.fecha_fin_modificada);
                break;
                default:
                    $('#mod_fecha_fin_edit').removeClass("hidden");
                    $('#monto_modificado_edit_div').removeClass("hidden");
                    $("#fecha_fin_modificada_edit").val(convenio.fecha_fin_modificada);
                break;
            }

        document.getElementById(modalID).classList.toggle("hidden");
        document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
        }

        function zfill(number, width) {
            var numberOutput = Math.abs(number); /* Valor absoluto del número */
            var length = number.toString().length; /* Largo del número */ 
            var zero = "0"; /* String de cero */  
            
            if (width <= length) {
                if (number < 0) {
                    return ("-" + numberOutput.toString()); 
                } else {
                    return numberOutput.toString(); 
                }
            } else {
                if (number < 0) {
                    return ("-" + (zero.repeat(width - length)) + numberOutput.toString()); 
                } else {
                    return ((zero.repeat(width - length)) + numberOutput.toString()); 
                }
            }
        }

        function toggleModal_2(modalID, estimacion){

            $("#label_numero_estimacion_edit").html(zfill(estimacion.numero_estimacion, 3));
            $("#numero_estimacion_edit").val(estimacion.numero_estimacion);
            if(estimacion.finiquito == 0)
                $("#n_finiquito_edit").prop("checked", true);
            else
                $("#s_finiquito_edit").prop("checked", true);
            $("#id_estimacion_edit").val(estimacion.id_estimacion)
            $("#fecha_recepcion_edit").val(estimacion.fecha_recepcion);
            $("#fecha_inicio_estimacion_edit").val(estimacion.fecha_inicio);
            $('#fecha_inicio_estimacion_edit').change();
            $("#fecha_fin_estimacion_edit").val(estimacion.fecha_final);
            $('#fecha_fin_estimacion_edit').change();

        document.getElementById(modalID).classList.toggle("hidden");
        document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
        }

        window.onload = function(){
            
        }

        desplazamiento_x = 100;
        desplazamiento_y = 100;
        total = 0;


        $(document).ready(function() {

            
            /*$("#flecha-scroll-left").click(function(){
                tamanio = $("#div-tabs").width();
                console.log( tamanio )
                console.log( $("#div-tabs").scrollLeft() )
                if($("#div-tabs").scrollLeft() < $("#div-tabs").width() + 40){
                    $("#div-tabs").animate({scrollLeft: $("#div-tabs").offset().left + desplazamiento_x}, 800);
                    desplazamiento_x = desplazamiento_x + 100;
                    desplazamiento_y = desplazamiento_y - 100;
                }
                
                total = $("#div-tabs").scrollLeft() + $("#div-tabs").outerWidth();
            }); 

            $("#flecha-scroll-right").click(function(){
                console.log($("#div-tabs").outerWidth());
                if($("#div-tabs").scrollLeft() > 0){
                    $("#div-tabs").animate({scrollLeft: $("#div-tabs").offset().left - desplazamiento_y}, 800);
                    desplazamiento_y = desplazamiento_y + 100;
                    desplazamiento_x = desplazamiento_x - 100;
                }
            });*/ 

            //On Click Event
            $("ul.tabs li").click(function() {
                

                $("ul.tabs li").removeClass("active"); //Remove any "active" class
                $(this).addClass("active"); //Add "active" class to selected tab
                $(".tab_content").hide(); //Hide all tab content

                var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
                $(activeTab).fadeIn(); //Fade in the active ID content
                return false;
            });

            $(document).on('change', '#tipo', function(event) {
                switch ($("#tipo option:selected").val()) {
                    case "Convenio modificatorio al monto del contrato":
                        $('#monto_modificado_div').removeClass("hidden");
                        $('#mod_fecha_fin').addClass("hidden");
                    break;
                    case "Convenio modificatorio a la fecha del contrato":
                        $('#mod_fecha_fin').removeClass("hidden");
                        $('#monto_modificado_div').addClass("hidden");
                    break;
                    case "Convenio modificatorio a las metas del contrato":
                        $('#mod_fecha_fin').addClass("hidden");
                        $('#monto_modificado_div').addClass("hidden");
                    break;
                    case "Convenio modificatorio al monto y fecha de contrato":
                        $('#mod_fecha_fin').removeClass("hidden");
                        $('#monto_modificado_div').removeClass("hidden");
                    break;
                    case "Convenio modificatorio al monto y metas de contrato":
                        $('#mod_fecha_fin').addClass("hidden");
                        $('#monto_modificado_div').removeClass("hidden");
                    break;
                    case "Convenio modificatorio a la fecha y metas de contrato":
                        $('#mod_fecha_fin').removeClass("hidden");
                        $('#monto_modificado_div').addClass("hidden");
                    break;
                    default:
                        $('#mod_fecha_fin').removeClass("hidden");
                        $('#monto_modificado_div').removeClass("hidden");
                    break;
                }
            });

            $(document).on('change', '#tipo_edit', function(event) {
                switch ($("#tipo_edit option:selected").val()) {
                    case "Convenio modificatorio al monto del contrato":
                        $('#monto_modificado_edit_div').removeClass("hidden");
                        $('#mod_fecha_fin_edit').addClass("hidden");
                    break;
                    case "Convenio modificatorio a la fecha del contrato":
                        $('#mod_fecha_fin_edit').removeClass("hidden");
                        $('#monto_modificado_edit_div').addClass("hidden");
                    break;
                    case "Convenio modificatorio a las metas del contrato":
                        $('#mod_fecha_fin_edit').addClass("hidden");
                        $('#monto_modificado_edit_div').addClass("hidden");
                    break;
                    case "Convenio modificatorio al monto y fecha de contrato":
                        $('#mod_fecha_fin_edit').removeClass("hidden");
                        $('#monto_modificado_edit_div').removeClass("hidden");
                    break;
                    case "Convenio modificatorio al monto y metas de contrato":
                        $('#mod_fecha_fin_edit').addClass("hidden");
                        $('#monto_modificado_edit_div').removeClass("hidden");
                    break;
                    case "Convenio modificatorio a la fecha y metas de contrato":
                        $('#mod_fecha_fin_edit').removeClass("hidden");
                        $('#monto_modificado_edit_div').addClass("hidden");
                    break;
                    default:
                        $('#mod_fecha_fin_edit').removeClass("hidden");
                        $('#monto_modificado_edit_div').removeClass("hidden");
                    break;
                }
            });

        

            var anio = (new Date).getFullYear();
            $('#anio_inicio').attr("min", anio - 2);
            $('#anio_inicio').attr("max", anio + 1);
            $('#anio_fin').attr("min", anio);
            $('#anio_fin').attr("max", anio + 3);

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preViewImg').attr('src', e.target.result);
                        $('#preViewImg').removeClass('hidden');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#file").click(function() {
                if ($('#logo_text').val() != "") {
                    $('#preViewImg').attr('src', $("#logo_text").val());
                } else {
                    $('#preViewImg').addClass('hidden');
                }
            });

            if ($('#logo_text').val() == "") {
                $('#preViewImg').addClass('hidden');
            }

            $(document).on('change', '#file', function() {
                readURL(this);
            });

            $('#fecha_inicio').change(function() {
                fecha = new Date($(this).val());
                if(fecha != "Invalid Date"){
                    fecha.setDate(fecha.getDate() + 1);
                    if($(this).val() != '{{$obj_obra->get('obra')->ejercicio}}-12-31') {
                        fecha.setDate(fecha.getDate() + 1);
                    }
                    const mes = fecha.getMonth() + 1; // Ya que los meses los cuenta desde el 0
                    const dia = fecha.getDate();
                    fecha = fecha.getFullYear()+'-'+(mes< 10?'0':'')+mes+'-'+(dia < 10 ? '0' : '')+dia;
                    $("#fecha_fin").attr("min", fecha);
                }
            });

            $('#fecha_fin').change(function() {
                fecha = new Date($(this).val());
                
                if(fecha != "Invalid Date"){
                    const mes = fecha.getMonth() + 1; // Ya que los meses los cuenta desde el 0
                    const dia = fecha.getDate();
                    fecha = fecha.getFullYear()+'-'+(mes< 10?'0':'')+mes+'-'+(dia < 10 ? '0' : '')+dia;
                    $("#fecha_inicio").attr("max", fecha);
                }
            });

            $("#formulario_nc").validate({
                onfocusout: false,
                onclick: false,
                rules: {
                    nombre_corto: { required: true},
                    min: 10,
                    max: 100,
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
            

            $("#formulario_convenio").validate({
                onfocusout: false,
                onclick: false,
                rules: {
                    numero_convenio_modificatorio: { required: true},
                    fecha_convenio: { required: true},
                    
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

            $("#guardar_convenio").click(function () {
                
                monto_modificado = 0.00;

                $(".monto_modificado").each(function(index) {
                    monto_modificado = monto_modificado + parseFloat($(this).val().replaceAll(",", ""));
                });

                monto_ejercido = {{$total_pagado->total_obra}} + {{$obj_obra->get('obra')->anticipo_monto}};
                console.log(monto_modificado < monto_ejercido);
                alert(monto_ejercido);
                if(monto_modificado < monto_ejercido && !$("#monto_modificado_div").hasClass("hidden")){
                    $("#error_monto").removeClass("hidden");
                    return false;
                }else{
                    $("#error_monto").addClass("hidden");
                    if($("#fecha_fin_modificada").val() == '' && !$("#mod_fecha_fin").hasClass("hidden")){
                        $("#error_fecha_fin").removeClass("hidden");
                        return false;
                    }else{
                        $("#error_fecha_fin").addClass("hidden");
                        return true;
                    }
                }
                
            });

            $("#btn-edit").click(function () {
                monto_modificado = $("#monto_modificado_edit").val().replace(",", '');
                monto_ejercido = {{$total_pagado->total_obra}} + {{$obj_obra->get('obra')->anticipo_monto}};
                if(monto_modificado < monto_ejercido && !$("#monto_modificado_edit_div").hasClass("hidden")){
                    $("#error_monto_edit").removeClass("hidden");
                    return false;
                }else{
                    $("#error_monto_edit").addClass("hidden");
                    if($("#fecha_fin_modificada_edit").val() == '' && !$("#mod_fecha_fin_edit").hasClass("hidden")){
                        $("#error_fecha_fin_edit").removeClass("hidden");
                        return false;
                    }else{
                        $("#error_fecha_fin_edit").addClass("hidden");
                        return true;
                    }
                }
                
            });

            $(".monto_modificado").on({
                "keyup": function(event) {

                    $(event.target).val(function(index, value) {
                        return value.replace(/\D/g, "")
                            .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                    });
                    sumatoria = 0.00;
                    $(".monto_modificado").each(function(index) {
                        sumatoria = sumatoria + parseFloat($(this).val().replaceAll(",", ""));
                    });

                    total_pagado = {{$total_pagado->total_obra}} + {{$obj_obra->get('obra')->anticipo_monto}};
                    
                    if(total_pagado>sumatoria){
                        $("#error_monto").removeClass("hidden");
                    }
                    else{
                        $("#error_monto").addClass("hidden");
                    }
                    
                    
                    

                }
            });

            

            $("#monto_modificado_edit").on({
                "keyup": function(event) {
                    $(event.target).val(function(index, value) {
                        return value.replace(/\D/g, "")
                            .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                    });


                    
                }
            });

            $("#numero_convenio_modificatorio, #folio_factura").on({
                "keydown": function(event) {
                    capturado = $(this).val();
                    console.log(event.keyCode);
                    if(capturado.length > 40  || event.keyCode == 32){
                        return false;
                    }
                },
            });

            $("#numero_convenio_modificatorio_edit").on({
                "keydown": function(event) {
                    console.log("hola");
                    capturado = $(this).val();
                    console.log(event.keyCode);
                    if(capturado.length > 40  || event.keyCode == 32){
                        return false;
                    }
                },
            });

            //Métodos utilizados en las estimaciones

            $("#total_estimacion").on({
                "focus": function(event) {
                    $(event.target).select();
                },
                "keyup": function(event) {
                    $(event.target).val(function(index, value) {
                        return value.replace(/\D/g, "")
                            .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                    });

                    monto_estimacion = $(this).val();
                    monto_est = monto_estimacion.replaceAll(",", "");
                    console.log()
                    monto_restante = {{$obj_obra->get('obra')->monto_modificado?$obj_obra->get('obra')->monto_modificado:$obj_obra->get('obra')->monto_contratado}} - {{$total_pagado->total_estimaciones?$total_pagado->total_estimaciones:0}};
                    

                    if (monto_est > monto_restante){
                        $("#error_total_estimacion").removeClass("hidden");
                        $("#label_monto_neto").html("$ 0.00");
                    }else{
                        $("#error_total_estimacion").addClass("hidden");

                        monto_supervicion = $("#supervicion_obra").val();
                        monto_supervicion = monto_supervicion.replaceAll(",", "");

                        monto_mano = $("#mano_obra").val();
                        monto_mano = monto_mano.replaceAll(",", "");

                        monto_dos = $("#dos_millar").val();
                        monto_dos = monto_dos.replaceAll(",", "");

                        monto_cinco = $("#cinco_millar").val();
                        monto_cinco = monto_cinco.replaceAll(",", "");

                        monto_amortizacion = $("#amortizacion_anticipo").val();
                        monto_amortizacion = monto_amortizacion.replaceAll(",", "");

                        monto_total = monto_est - monto_supervicion - monto_mano - monto_dos - monto_cinco - monto_amortizacion;
                        monto_total = parseFloat(monto_total).toFixed(2);

                        if(monto_total < 0 ){
                            $("#error_retenciones").removeClass("hidden");
                            $("#label_monto_neto").html("$ -"+("" + monto_total).replace(/\D/g, "").replace(/([0-9])([0-9]{2})$/, '$1.$2').replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ","));
                            $("#label_monto_neto").removeClass("text-gray-700");
                            $("#label_monto_neto").addClass("text-red-500");
                        }else {
                            $("#error_retenciones").addClass("hidden");
                            $("#label_monto_neto").html("$ "+("" + monto_total).replace(/\D/g, "").replace(/([0-9])([0-9]{2})$/, '$1.$2').replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ","));
                            $("#label_monto_neto").addClass("text-gray-700");
                            $("#label_monto_neto").removeClass("text-red-500");
                            
                        }
                    }

                    if(monto_estimacion.length == 0) {
                        $("#label_monto_neto").html("$ 0.00");
                    }
                }
            });

            $("#supervicion_obra, #mano_obra, #dos_millar, #cinco_millar, #amortizacion_anticipo").on({
                "focus": function(event) {
                    $(event.target).select();
                },
                "keyup": function(event) {
                    $(event.target).val(function(index, value) {
                        return value.replace(/\D/g, "")
                            .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                    });
                    monto_supervicion = $("#supervicion_obra").val();
                    monto_supervicion = monto_supervicion.replaceAll(",", "");

                    monto_mano = $("#mano_obra").val();
                    monto_mano = monto_mano.replaceAll(",", "");

                    monto_dos = $("#dos_millar").val();
                    monto_dos = monto_dos.replaceAll(",", "");

                    monto_cinco = $("#cinco_millar").val();
                    monto_cinco = monto_cinco.replaceAll(",", "");

                    monto_amortizacion = $("#amortizacion_anticipo").val();
                    monto_amortizacion = monto_amortizacion.replaceAll(",", "");

                    monto_estimacion = $("#total_estimacion").val();
                    monto_est = monto_estimacion.replaceAll(",", "");
                    monto_total = monto_est - monto_supervicion - monto_mano - monto_dos - monto_cinco - monto_amortizacion;
                    monto_total = parseFloat(monto_total).toFixed(2);
                    if(monto_total < 0 ){
                        $("#error_retenciones").removeClass("hidden");
                        $("#label_monto_neto").html("$ -"+("" + monto_total).replace(/\D/g, "").replace(/([0-9])([0-9]{2})$/, '$1.$2').replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ","));
                        $("#label_monto_neto").removeClass("text-gray-700");
                        $("#label_monto_neto").addClass("text-red-500");
                    }else {
                        $("#error_retenciones").addClass("hidden");
                        $("#label_monto_neto").html("$ "+("" + monto_total).replace(/\D/g, "").replace(/([0-9])([0-9]{2})$/, '$1.$2').replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ","));
                        $("#label_monto_neto").addClass("text-gray-700");
                        $("#label_monto_neto").removeClass("text-red-500");
                        $("#div_error_guardar").addClass("hidden");
                    }
                }
            });

            $('#fecha_inicio_estimacion').change(function() {
                fecha = new Date($(this).val());
                fecha.setDate(fecha.getDate() + 30);
                fecha_final = new Date('{{$obj_obra->get('obra')->fecha_final_real}}');
                fecha_final.setDate(fecha_final.getDate() + 1);

                if(fecha_final < fecha){
                    fecha = fecha_final;
                }
                
                const mes = fecha.getMonth() + 1; // Ya que los meses los cuenta desde el 0
                const dia = fecha.getDate();
                fecha_text = fecha.getFullYear()+'-'+(mes< 10?'0':'')+mes+'-'+(dia < 10 ? '0' : '')+dia;
                $("#fecha_fin_estimacion").attr("min", $(this).val());
                $("#fecha_fin_estimacion").attr("max", fecha_text);
                
                $("#fecha_recepcion").attr("min", fecha_text);;

                fecha.setDate(fecha.getDate() + 6);

                const mes_1 = fecha.getMonth() + 1; // Ya que los meses los cuenta desde el 0
                const dia_1 = fecha.getDate();
                fecha_text = fecha.getFullYear()+'-'+(mes_1< 10?'0':'')+mes_1+'-'+(dia_1 < 10 ? '0' : '')+dia_1;
                
                $("#fecha_recepcion").attr("max", fecha_text);;
            });

            $('#fecha_fin_estimacion').change(function() {

                fecha = new Date($(this).val());
                fecha.setDate(fecha.getDate() - 30);
                fecha_inicio = new Date('{{$obj_obra->get('obra')->fecha_inicio_programada}}');
                fecha_inicio.setDate(fecha_inicio.getDate() + 1);

                
                if(fecha_inicio > fecha){
                    fecha = fecha_inicio;
                }
                
                const mes = fecha.getMonth() + 1; // Ya que los meses los cuenta desde el 0
                const dia = fecha.getDate();
                fecha_text = fecha.getFullYear()+'-'+(mes< 10?'0':'')+mes+'-'+(dia < 10 ? '0' : '')+dia;
                $("#fecha_inicio_estimacion").attr("min", fecha_text);
                $("#fecha_inicio_estimacion").attr("max", $(this).val());

                $("#fecha_recepcion").attr("min", $(this).val());;
                fecha = new Date($(this).val());
                console.log(fecha);
                fecha.setDate(fecha.getDate() + 6);
                console.log(fecha);

                const mes_1 = fecha.getMonth() + 1; // Ya que los meses los cuenta desde el 0
                const dia_1 = fecha.getDate();
                fecha_text = fecha.getFullYear()+'-'+(mes_1< 10?'0':'')+mes_1+'-'+(dia_1 < 10 ? '0' : '')+dia_1;
                
                $("#fecha_recepcion").attr("max", fecha_text);;

            });

            
            $('#fecha_inicio_estimacion_edit').change(function() {
                fecha = new Date($(this).val());
                fecha.setDate(fecha.getDate() + 30);
                fecha_final = new Date('{{$obj_obra->get('obra')->fecha_final_real}}');
                fecha_final.setDate(fecha_final.getDate() + 1);

                if(fecha_final < fecha){
                    fecha = fecha_final;
                }
                
                const mes = fecha.getMonth() + 1; // Ya que los meses los cuenta desde el 0
                const dia = fecha.getDate();
                fecha_text = fecha.getFullYear()+'-'+(mes< 10?'0':'')+mes+'-'+(dia < 10 ? '0' : '')+dia;
                $("#fecha_fin_estimacion_edit").attr("min", $(this).val());
                $("#fecha_fin_estimacion_edit").attr("max", fecha_text);
                
                $("#fecha_recepcion_edit").attr("min", fecha_text);;

                fecha.setDate(fecha.getDate() + 6);

                const mes_1 = fecha.getMonth() + 1; // Ya que los meses los cuenta desde el 0
                const dia_1 = fecha.getDate();
                fecha_text = fecha.getFullYear()+'-'+(mes_1< 10?'0':'')+mes_1+'-'+(dia_1 < 10 ? '0' : '')+dia_1;
                
                $("#fecha_recepcion_edit").attr("max", fecha_text);;
            });

            $('#fecha_fin_estimacion_edit').change(function() {

                fecha = new Date($(this).val());
                fecha.setDate(fecha.getDate() - 30);
                fecha_inicio = new Date('{{$obj_obra->get('obra')->fecha_inicio_programada}}');
                fecha_inicio.setDate(fecha_inicio.getDate() + 1);

                
                if(fecha_inicio > fecha){
                    fecha = fecha_inicio;
                }
                
                const mes = fecha.getMonth() + 1; // Ya que los meses los cuenta desde el 0
                const dia = fecha.getDate();
                fecha_text = fecha.getFullYear()+'-'+(mes< 10?'0':'')+mes+'-'+(dia < 10 ? '0' : '')+dia;
                $("#fecha_inicio_estimacion_edit").attr("min", fecha_text);
                $("#fecha_inicio_estimacion_edit").attr("max", $(this).val());

                $("#fecha_recepcion_edit").attr("min", $(this).val());;
                fecha = new Date($(this).val());
                console.log(fecha);
                fecha.setDate(fecha.getDate() + 6);
                console.log(fecha);

                const mes_1 = fecha.getMonth() + 1; // Ya que los meses los cuenta desde el 0
                const dia_1 = fecha.getDate();
                fecha_text = fecha.getFullYear()+'-'+(mes_1< 10?'0':'')+mes_1+'-'+(dia_1 < 10 ? '0' : '')+dia_1;
                
                $("#fecha_recepcion_edit").val($(this).val());
                $("#fecha_recepcion_edit").attr('min', $(this).val());
            });

            $("#formulario_create_estimacion").validate({
                onfocusout: false,
                onclick: false,
                rules: {
                    //total_estimacion: { required: true},
                    fecha_inicio_estimacion: { required: true},
                    fecha_fin_estimacion: { required: true},
                    folio_factura: { required: true},
                    fecha_recepcion: { required: true},
                },
                errorPlacement: function(error, element) {
                    if(error != null){
                        $('#error_'+element.attr('id')).removeClass("hidden");
                    }else{
                        $('#error_'+element.attr('id')).addClass("hidden");
                    }
                // console.log(element.attr('id'));
                },
            });

            $("#formulario_create_estimacion_edit").validate({
                onfocusout: false,
                onclick: false,
                rules: {
                    //total_estimacion: { required: true},
                    fecha_inicio_estimacion_edit: { required: true},
                    fecha_fin_estimacion_edit: { required: true},
                    folio_factura_edit: { required: true},
                    fecha_recepcion_edit: { required: true},
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

            $("#btn-create-estimacion").click(function () {  
                return true;          
                /*monto = $("#label_monto_neto").html();

                if(monto.indexOf('-') > -1){
                    console.log("ejemplo");
                    $("#div_error_guardar").removeClass("hidden");
                    return false;
                }else {
                    $("#div_error_guardar").addClass("hidden");
                    return true;
                }*/
            });
            
            
        });

        
    </script>
@endif






@endsection



