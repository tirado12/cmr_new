@extends('layouts.plantilla')
@section('title','Municipio')
@section('contenido')
    <link rel="stylesheet"
        href="{{ asset('css/datatable.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/jquery.dataTables.min.css') }}">

    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
<div class="flex flex-row items-center ">
    <img class="block ml-8 h-24 w-24 rounded-full shadow-2xl" src="{{$cliente->logo}}" alt="cmr">
    <div class="ml-4 grid grid-col-1">
        <p class="block font-black text-xl">{{$cliente->id_municipio}} - {{$cliente->nombre_municipio}}</p>
        <p class="text-gray-600">{{$cliente->id_distrito}} {{$cliente->nombre_distrito}} - {{$cliente->id_region}} {{$cliente->nombre_region}}</p>
        <p class="text-gray-600"></p>
    </div>
</div>


    <div class="grid sm:grid-cols-4 sm:gap-4">
        

        <div class="mt-6 sm:col-span-3 shadow-xl bg-white rounded-lg">
            <div class="border-b p-4">
                <label for="first_name" class="text-xl font-medium font-semibold">Información general</label>
            </div>
            <div class="p-4 grid grid-cols-8 ">

                <div class="col-span-8 sm:col-span-4 ">
                    <label for="first_name" class="block text-normal font-base text-gray-500">Dirección: </label>
                    <label for="first_name" class="text-base font-semibold">{{$cliente->direccion}}</label>
                </div>
                <div class="col-span-8 sm:col-span-4 mt-3 sm:mt-0">
                    <label for="first_name" class="block text-normal font-base text-gray-500">RFC: </label>
                    <label for="first_name" class="text-base font-semibold">{{$cliente->rfc}}</label>
                </div>
                <div class="col-span-8 sm:col-span-4 mt-3">
                    <label for="first_name" class="block text-normal font-base text-gray-500">Correo: </label>
                    <label for="first_name" class="text-base font-semibold">{{$cliente->email}}</label>
                </div>
                
                <div class="col-span-8 sm:col-span-4 mt-3">
                    <label for="first_name" class="block text-normal font-base text-gray-500">Periodo: </label>
                    <label for="first_name" class="text-base font-semibold">{{ $cliente->anio_inicio }}@if ($cliente->anio_fin != $cliente->anio_inicio) - {{ $cliente->anio_fin }}@endif</label>
                </div>                 
            </div>
            <div class=" p-4 border-t border-solid border-blueGray-200 rounded-b">
                <div class="text-right">
                    <a type="button"  href="{{ route('clientes.edit', $cliente->id_cliente) }}" class="text-base text-white bg-blue-500 p-2 rounded-lg px-6">Editar</a>
                </div>
            </div>
        </div>
        
        <div class="mt-6 sm:col-span-1 bg-white rounded-lg">
            <div class="border-b p-4">
                <label for="first_name" class="text-xl font-medium font-bold">Ejercicios</label>
            </div>
            <div class="p-4">
                <div class="">
                    <select name="" id="" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-800 focus:border-blue-800 sm:text-sm">
                        @for ($i = $cliente->anio_inicio; $i <= $cliente->anio_fin; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
                <div class="mt-4 flex justify-center">
                    <button class="text-base text-white bg-green-500 p-2 rounded-lg px-6">Acceder</button>
                </div>
            </div>
        </div>
    </div>
    <div class="">

        <div class="text-base mt-6 shadow-xl bg-white rounded-lg">
            <div class="border-b p-4">
                <label for="first_name" class="text-xl font-medium font-semibold">Datos del cabildo</label>
            </div>
            <div class="p-4 ">
                <div class="">
                    <table id="example" class="table table-striped bg-white" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Cargo</th>
                                <th>Nombre</th>
                                <th>RFC</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    <tbody>
                        @foreach ($cabildo as $key => $integrante)
                            <tr>
                                <td>
                                    <div class="text-base leading-5 font-medium text-gray-900">
                                        {{ $integrante->cargo }}
                                    </div>
                                </td>
                                <td>
                                    <div class="text-base leading-5 font-medium text-gray-900">
                                        {{ $integrante->nombre }}
                                    </div>
                                </td>
                                <td>
                                    <div class="text-base leading-5 font-medium text-gray-900">
                                        {{ $integrante->rfc }}
                                    </div>
                                </td>
                                <td>
                                    <div class="text-base leading-5 font-medium text-gray-900">
                                        {{ $integrante->telefono}}
                                    </div>
                                </td>
                                <td>
                                    <div class="text-base leading-5 font-medium text-gray-900">
                                        {{ $integrante->correo}}
                                    </div>
                                </td>
                                <td>
                                    <div class="text-base leading-5 font-medium text-gray-900">
                                        <a type="button"
                                            href="{{ route('cabildo.edit', $integrante->id_integrante) }}"
                                            class="bg-white text-sm text-blue-500 font-normal text-ms p-2 rounded rounded-lg">Editar</a>
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
                
            </div>
            
            <div class=" p-4 border-t border-solid border-blueGray-200 rounded-b">
        
            
                <div class="text-right">
                    <a type="button"  href="{{ route('inicio')}}" class="text-base text-white bg-gray-500 p-2 rounded-lg px-6">Regresar</a>
                    
                </div>
            </div>
            
        </div>
    
    </div>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript"
        charset="utf8"
        src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        charset="utf-8"></script>
        <script type="text/javascript"
        src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.4/b-flash-1.6.4/b-html5-1.6.4/b-print-1.6.4/datatables.min.js">
    </script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.4/b-flash-1.6.4/b-html5-1.6.4/b-print-1.6.4/datatables.min.js">
    </script>
    <script>
        $(document).ready(function() {
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
                .columns.adjust()
                .responsive.recalc();

            
        });
    </script>

@endsection