@extends('layouts.plantilla')
@section('title','Proveedores')
@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/datatable.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swalfire.css')}}">

    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">


    <div class="flex flex-row items-center ">
        <img class="block ml-8 h-24 w-24 rounded-full shadow-2xl" src="{{$cliente->icono}}" alt="cmr">
        <div class="ml-4 grid grid-col-1">
            <p class="block font-black text-xl">Listado de proveedores</p>
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
                <a href="/cliente/ver/{{$cliente->id_cliente}}" class="text-blue-500">
                    <i class="fas fa-user" aria-hidden="true"></i> Cliente  
                </a>
                - 
                <i class="fas fa-user" aria-hidden="true"></i> Proveedores
                
            </p>
        </div>
    </div>

    <div class="">

        <div class="text-base mt-6 shadow-xl bg-white rounded-lg">
            <div class="border-b p-4 flex justify-between items-center">
                <span class="inline-block text-xl font-medium font-semibold">Listado de proveedores</span>
                <button href="#" id="ejemplo" class="text-base text-white bg-green-500 px-2 py-1 rounded-lg px-6" type="button" onclick="toggleModal('modal-add')">
                    Agregar
                </button>
            </div>
            
            <div class="p-4 ">
                <div class="">
                    <table id="example" class="table table-striped bg-white" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="text-sm text-center">Razón social o nombre</th>
                                <th class="text-sm text-center">RFC</th>
                                <th class="text-sm text-center">Teléfono</th>
                                <th class="text-sm text-center">Correo</th>
                                <th class="text-sm text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proveedores as $key => $proveedor)
                                <tr>
                                    <td>
                                        <div>
                                            <p class="text-sm leading-5 font-medium">
                                                @if($proveedor->razon_social == null)
                                                    {{ $proveedor->apellidos }} {{ $proveedor->nombre }}    
                                                @else
                                                    {{ $proveedor->razon_social }}
                                                @endif
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p class="text-sm leading-5 font-medium">   
                                                {{ $proveedor->rfc }}
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p class="text-sm leading-5 font-medium">   
                                                {{ $proveedor->telefono }}
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p class="text-sm leading-5 font-medium">   
                                                {{ $proveedor->correo }}
                                            </p>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        
                                        <div class="text-center text-base leading-5 font-medium text-gray-900">
                                            <button type="button"  href="#" class="bg-transparent text-sm text-blue-500 font-normal px-3" onclick="toggleModalProveedor('modal-id',{{$proveedor}})">Detalles</button>
                                            <button type="button"  href="#" class="bg-transparent text-sm text-green-500 font-normal px-3" onclick="toggleModalFisica('modal-edit-fisica', {{$proveedor}})">Editar</button>
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
                    <a type="button"  href="{{ route('cliente.ver', $cliente->id_cliente)}}" class="text-base bg-white text-red-500 p-2 rounded-lg px-6">Regresar</a>
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
                        Detalles del proveedor
                    </h4>
                
                    <button class="p-1 ml-auto bg-transparent border-0 text-white float-right text-2xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
                        <span>
                            <i class="fas fa-xmark"></i>
                        </span>
                    </button>
                </div>
                <!--body-->
            
                    <div class="relative p-6 flex-auto">
                        
                        <div class="grid grid-cols-9 gap-2 mb-7">
                            <div class="col-span-9">
                                <p id="label_rfc_c" class="text-sm text-center">RFC</p>
                                <p id="rfc_c" class="text-base font-semibold px-3 py-2 border border-gray-300 text-center rounded-md bg-gray-100">{{$cliente->nombre_municipio}}</p>
                            </div>
                            

                            <div class="col-span-9" id="representante_legal_c">
                                <p id="label_rl_c" class="text-sm text-center">Razón Social</p>
                                <p id="rl_c" class="text-base font-semibold px-3 py-2 border border-gray-300 text-center rounded-md bg-gray-100">{{$cliente->nombre_municipio}}</p>
                            </div>

                            <div class="col-span-9">
                                <p id="label_nombre_c" class="text-sm text-center">Nombre completo</p>
                                <p id="nombre_c" class="text-base font-semibold px-3 py-2 border border-gray-300 text-center rounded-md bg-gray-100">{{$cliente->nombre_municipio}}</p>
                            </div>
                            
                            
                            <div class="col-span-9 sm:col-span-4">
                                <p id="label_telefono_c" class="text-sm text-center">Teléfono</p>
                                <p id="telefono_c" class="text-base font-semibold px-3 py-2 border border-gray-300 text-center rounded-md bg-gray-100">{{$cliente->nombre_municipio}}</p>
                            </div>
                            
                            <div class="col-span-9 sm:col-span-5">
                                <p id="label_correo_c" class="text-sm text-center">Correo electrónico</p>
                                <p id="correo_c" class="text-base font-semibold px-3 py-2 border border-gray-300 text-center rounded-md bg-gray-100">{{$cliente->nombre_municipio}}</p>
                            </div>
                            
                            <div class="col-span-9">
                                <p id="label_domicilio_c" class="text-sm text-center">Domicilio</p>
                                <p id="domicilio_c" class="text-base font-semibold px-3 py-2 border border-gray-300 text-center rounded-md bg-gray-100">{{$cliente->nombre_municipio}}</p>
                            </div>
                        </div>
            
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- inicio modal -->
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-edit-fisica">
        <div class="relative w-auto my-28 mx-auto max-w-3xl">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-center justify-between px-5 py-3 border-b border-solid border-blueGray-200 rounded-t bg-blue-cmr1">
                <h4 class="text-base font-normal uppercase text-white">
                    Editar proveedor
                </h4>
            
                <button class="p-1 ml-auto bg-transparent border-0 text-white float-right text-2xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-edit-fisica')">
                    <span>
                        <i class="fas fa-xmark"></i>
                    </span>
                </button>
            </div>
            <!--body-->
            <form action="{{ route('proveedor_update') }}" method="POST" id="formulario" name="formulario">
                @csrf
                @method('POST')
                <div class="relative p-6 flex-auto">
                    <div class="grid grid-cols-10 gap-4">
                        <div class="col-span-10 hidden">
                            <input type="text" name="id_proveedor" id="id_proveedor" class="text-sm font-semibold text-center hidden">
                            <input type="text" name="id_cliente" id="id_cliente" class="text-sm font-semibold text-center hidden" value="{{$cliente->id_cliente}}">
                        </div>

                        <div class="col-span-10">
                            <p id="label_rfc" for="first_rfc" class="text-sm font-semibold text-center">RFC</p>
                            <p id="rfc" class="mt-1 sm:text-sm font-semibold px-3 py-2 border border-gray-300 text-center rounded-md bg-gray-100"></p>
                        </div>

                        <div class="col-span-10" id="div_razon_social_e">
                            <label id="label_razon_social" for="razon_social" class="text-sm font-semibold text-center">Razón Social *</label>
                            <input type="text" name="razon_social" id="razon_social" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <label id="error_razon_social" name="error_razon_social" class="hidden text-sm font-normal text-red-500" >Ingresa una Razón Social valida</label>
                        </div>
                        
                        <div class="col-span-10 sm:col-span-5">
                            <label id="label_nombre" for="nombre" class="text-sm font-semibold text-center">Nombre *</label>
                            <input type="text" name="nombre" id="nombre" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            <label id="error_nombre" name="error_nombre" class="hidden text-sm font-normal text-red-500" >Ingresa al menos un RFC genérico (XXXX000000XXX)</label>
                        </div>

                        <div class="col-span-5 sm:col-span-5">
                            <label id="label_apellidos" for="apellidos" class="text-sm font-semibold text-center">Apellidos *</label>
                            <input type="text" name="apellidos" id="apellidos" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            <label id="error_apellidos" name="error_apellidos" class="hidden text-sm font-normal text-red-500" >Ingresa al menos un RFC genérico (XXXX000000XXX)</label>
                        </div>
                        
                        
                        <div class="col-span-10 sm:col-span-5 ">
                            <label id="label_telefono" for="first_telefono" class="text-sm font-semibold text-center">Teléfono *</label>
                            <input type="text" name="telefono" id="telefono" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required maxlength="200">
                            <label id="error_telefono" name="error_telefono" class="hidden text-sm font-normal text-red-500" >Ingrese un número adecuado</label>
                        </div>
                        <div class="col-span-10 sm:col-span-5 ">
                            <label id="label_correo" for="first_correo" class="text-sm font-semibold text-center">Correo electrónico *</label>
                            <input type="email" name="correo" id="correo" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required maxlength="200">
                            <label id="error_correo" name="error_correo" class="hidden text-sm font-normal text-red-500" >Ingrese un número adecuado</label>
                        </div>
                        <div class="col-span-8 sm:col-span-10">
                            <label id="label_domicilio" for="domicilio" class="text-sm font-semibold text-center">Domicilio *</label>
                            <input type="text" name="domicilio" id="domicilio" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            <label id="error_domicilio" name="error_domicilio" class="hidden text-sm font-normal text-red-500" >Ingresa un cargo</label>
                        </div>
                    </div>
                    <div class="mt-8">
                        <span class="block text-xs">Verifique los campos obligatorios marcados con un ( * ) </span>
                    </div>
                </div>
                <!--footer-->
                <div class=" p-4 border-t border-solid border-blueGray-200 rounded-b">
                    <div class="text-right">
                        <button class="text-red-500 background-transparent font-bold uppercase px-6 text-sm outline-none focus:outline-none ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-edit-fisica')">
                            Cancelar
                        </button>
                        <button id="editar_proveedor" type="submit" class="text-blue-500 font-bold uppercase text-sm px-6 rounded outline-none focus:outline-none ease-linear transition-all duration-150" >
                            Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>

    <!-- inicio modal -->
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-add">
        <div class="relative w-auto my-28 mx-auto max-w-3xl">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-center justify-between px-5 py-3 border-b border-solid border-blueGray-200 rounded-t bg-blue-cmr1">
                <h4 class="text-base font-normal uppercase text-white">
                    Agregar nuevo proveedor
                </h4>
            
                <button class="p-1 ml-auto bg-transparent border-0 text-white float-right text-2xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-add')">
                    <span>
                        <i class="fas fa-xmark"></i>
                    </span>
                </button>
            </div>
            <!--body-->
            <form action="{{ route('proveedor_create') }}" method="POST" id="formulario_cont" name="formulario_cont">
                @csrf
                @method('POST')
                <div class="relative p-6 flex-auto">
                    <div class="grid grid-cols-10 gap-4">
                        <div class="col-span-10 hidden">
                            <input type="text" name="id_cliente" class="text-sm font-semibold text-center hidden" value="{{$cliente->id_cliente}}">
                        </div>

                        <div class="col-span-10 sm:col-span-5 ">
                            <p id="label_rfc_a" for="first_rfc_a" class="text-sm font-semibold">RFC *</p>
                            <input type="text" name="rfc" id="rfc_a" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required maxlength="13" minlength="12">
                            <p id="error_rfc_a" class="hidden text-sm font-normal text-red-500" >RFC incorrecto, puede ingresar un genérico (XXXX000000XXX)</p>
                            <p id="error_rfc_1" class="hidden text-sm font-normal text-red-500" >El RFC ya esta registrado</p>
                        </div>
                        
                        <div class="col-span-10 hidden" id="div_razon_social">
                            <label id="label_razon_social_a" for="razon_social_a" class="text-sm font-semibold text-center">Razón Social *</label>
                            <input type="text" name="razon_social" id="razon_social_a" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            <label id="error_razon_social_a" class="hidden text-sm font-normal text-red-500" >Ingrese una razón social</label>
                        </div>
                        
                        <div class="col-span-10 sm:col-span-5">
                            <label id="label_nombre_a" for="nombre_a" class="text-sm font-semibold text-center">Nombre *</label>
                            <input type="text" name="nombre" id="nombre_a" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            <label id="error_nombre_a" class="hidden text-sm font-normal text-red-500" >Ingrese un nombre</label>
                        </div>
                        <div class="col-span-5 sm:col-span-5">
                            <label id="label_apellidos_a" for="apellidos_a" class="text-sm font-semibold text-center">Apellidos *</label>
                            <input type="text" name="apellidos" id="apellidos_a" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            <label id="error_apellidos_a" class="hidden text-sm font-normal text-red-500" >Ingrese un apellido</label>
                        </div>
                        
                        
                        <div class="col-span-10 sm:col-span-5 ">
                            <label id="label_telefono_a" for="first_telefono" class="text-sm font-semibold text-center">Teléfono *</label>
                            <input type="text" name="telefono" id="telefono_a" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required maxlength="10" minlength="10">
                            <label id="error_telefono_a"class="hidden text-sm font-normal text-red-500" >Ingrese un número teléfonico adecuado</label>
                        </div>
                        <div class="col-span-10 sm:col-span-5 ">
                            <label id="label_correo_a" for="first_correo_a" class="text-sm font-semibold text-center">Correo electrónico *</label>
                            <input type="email" name="correo" id="correo_a" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required maxlength="200">
                            <label id="error_correo_a" name="error_correo" class="hidden text-sm font-normal text-red-500" >Ingrese un correo electrónico adecuado</label>
                        </div>
                        <div class="col-span-8 sm:col-span-10">
                            <label id="label_domicilio_a" for="domicilio_a" class="text-sm font-semibold text-center">Domicilio *</label>
                            <input type="text" name="domicilio" id="domicilio_a" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            <label id="error_domicilio_a" name="error_domicilio_a" class="hidden text-sm font-normal text-red-500" >Ingresa un domicilio</label>
                        </div>

                    </div>
                    <div class="mt-8">
                        <span class="block text-xs">Verifique los campos obligatorios marcados con un ( * ) </span>
                    </div>
                </div>
                <!--footer-->
                <div class=" p-4 border-t border-solid border-blueGray-200 rounded-b">
                    <div class="text-right">
                        <button class="text-red-500 background-transparent font-bold uppercase px-6 text-sm outline-none focus:outline-none ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-add')">
                            Cancelar
                        </button>
                        <button id="guardar_proveedor" type="submit" class="text-blue-500 font-bold uppercase text-sm px-6 rounded outline-none focus:outline-none ease-linear transition-all duration-150" >
                            Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>

    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-edit-fisica-backdrop"></div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-add-backdrop"></div>
    

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.4/b-flash-1.6.4/b-html5-1.6.4/b-print-1.6.4/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.4/b-flash-1.6.4/b-html5-1.6.4/b-print-1.6.4/datatables.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

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

    <script type="text/javascript">
        function toggleModal(modalID){
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
        }

        function toggleModalProveedor(modalID, proveedor){
            $("#rfc_c").html(proveedor.rfc);
            $("#nombre_c").html(proveedor.apellidos + " " + proveedor.nombre);
            $("#telefono_c").html(proveedor.telefono);
            $("#correo_c").html(proveedor.correo);
            $("#domicilio_c").html(proveedor.domicilio);
                        
            if(proveedor.rfc.length == 12){
                $("#representante_legal_c").removeClass("hidden");
                $("#rl_c").html(proveedor.razon_social);
                $("#label_nombre_c").html("Resentante Legal")
            }else{
                $("#representante_legal_c").addClass("hidden");
                $("#rl_c").html("");
                $("#label_nombre_c").html("Nombre completo")
            }
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
        }

        function toggleModalFisica(modalID, proveedor){
            $("#nombre").val(proveedor.nombre);
            $("#apellidos").val(proveedor.apellidos);
            $("#razon_social").val(proveedor.razon_social);
            $("#rfc").html(proveedor.rfc);
            $("#correo").val(proveedor.correo);
            $("#telefono").val(proveedor.telefono);
            $("#domicilio").val(proveedor.domicilio);
            $("#id_proveedor").val(proveedor.id_proveedor);

            if(proveedor.rfc.length == 12){
                $("#div_razon_social_e").removeClass("hidden");
            }else{
                $("#div_razon_social_e").addClass("hidden");
            }


            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
        }

    </script>

    <script>
        $(document).ready(function() {

            existeRFC = false;
            validoRFC = false;
            
            $('#example').DataTable({
                    "autoWidth": true,
                    "responsive": true,
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

                $("#rfc_a").on({
                    "change":function(event) {
                        rfc = $(this).val();

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        
                        var formData = {
                            rfc: rfc,
                            municipio: {{$cliente->id_municipio}},
                        };
                        var state = jQuery('#ejemplo').val();
                        var type = "GET";
                        var ajaxurl = '/existe/proveedor';
                        $.ajax({
                            type: type,
                            url: ajaxurl,
                            data: formData,
                            dataType: 'json',
                            success: function (data) {
                                if(data.total == 0){  
                                    existeRFC = false;
                                    $("#error_rfc_1").addClass("hidden");
                                }else{
                                    existeRFC = true;
                                    $("#error_rfc_1").removeClass("hidden");
                                }
                                validoRFC = data.valido;
                                if(data.valido){
                                    $("#error_rfc_a").addClass("hidden");
                                }else{
                                    $("#error_rfc_a").removeClass("hidden");
                                }
                            },
                            error: function (data) {
                                console.log(data);
                            }
                        });

                        if(rfc.length == 12){
                            $("#div_razon_social").removeClass("hidden");
                            $("#label_nombre_a").html("Nombre Representante Legal *");
                            $("#label_apellidos_a").html("Apellidos Representante Legal *");
                        }
                        else{
                            $("#div_razon_social").addClass("hidden");
                            $("#label_nombre_a").html("Nombre *");
                            $("#label_apellidos_a").html("Apellidos *");
                        }
                    },
                    "keyup":function(event) {
                        rfc = $(this).val();

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        
                        var formData = {
                            rfc: rfc,
                            municipio: {{$cliente->id_municipio}},
                        };
                        var state = jQuery('#ejemplo').val();
                        var type = "GET";
                        var ajaxurl = '/existe/proveedor';
                        $.ajax({
                            type: type,
                            url: ajaxurl,
                            data: formData,
                            dataType: 'json',
                            success: function (data) {
                                if(data.total == 0){  
                                    existeRFC = false;
                                    $("#error_rfc_1").addClass("hidden");
                                }else{
                                    existeRFC = true;
                                    $("#error_rfc_1").removeClass("hidden");
                                }
                                validoRFC = data.valido;
                                if(data.valido){
                                    $("#error_rfc_a").addClass("hidden");
                                }else{
                                    $("#error_rfc_a").removeClass("hidden");
                                }
                            },
                            error: function (data) {
                                console.log(data);
                            }
                        });
                        
                        if(rfc.length == 12){
                            $("#razon_social").removeClass("hidden");
                            $("#label_nombre_a").html("Nombre Representante Legal *");
                            $("#label_apellidos_a").html("Apellidos Representante Legal *");
                        }
                        else{
                            $("#razon_social_a").val("");
                            $("#razon_social").addClass("hidden");
                            $("#label_nombre_a").html("Nombre *");
                            $("#label_apellidos_a").html("Apellidos *");
                        }
                    }
                });


                $("#formulario_cont").validate({
                    onfocusout: false,
                    onclick: false,
                        rules: {
                        nombre_a: { required: true},
                        rfc_a: { required: true, minlength: 12, maxlength: 13, rfcA: ""},
                        apellidos_a: { required: true},
                        telefono_a: { required: true},
                        correo_a: { required: true},
                        domicilio_a: { required: true},
                    },
                    errorPlacement: function(error, element) {
                        
                        if(error != null){
                            $('#error_'+element.attr('id')).fadeIn();
                        }
                        else{
                            $('#error_'+element.attr('id')).fadeOut();
                        }
                    },
                });

                $("#guardar_proveedor").click(function () {
                    valido = true;
                    rfc = $("#rfc").text();

                    valido = !existeRFC;
                                                
                    if (validoRFC){
                        $("#error_rfc_a").addClass("hidden");
                    }else {
                        valido = false;
                        $("#error_rfc_a").removeClass("hidden");
                    }

                    if($("#nombre_a").val() == ''){
                        valido = false;
                        $('#error_nombre_a').removeClass("hidden");
                    }else{
                        $('#error_nombre_a').addClass("hidden");
                    }


                    if($("#apellidos_a").val() == ''){
                        valido = false;
                        $('#error_apellidos_a').removeClass("hidden");
                    }else{
                        $('#error_apellidos_a').addClass("hidden");
                    }

                    if($("#telefono_a").val() == ''){
                        valido = false;
                        $('#error_telefono_a').removeClass("hidden");
                    }else{
                        $('#error_telefono_a').addClass("hidden");
                    }

                    if($("#correo_a").val() == ''){
                        valido = false;
                        $('#error_correo_a').removeClass("hidden");
                    }else{
                        $('#error_correo_a').addClass("hidden");
                    }

                    if($("#domicilio_a").val() == ''){
                        valido = false;
                        $('#error_domicilio_a').removeClass("hidden");
                    }else{
                        $('#error_domicilio_a').addClass("hidden");
                    }

                    if(rfc.length == 12 && $("#razon_social_a").val() == ''){
                        valido = false;
                        $("#error_razon_social_a").removeClass("hidden");
                    }
                    else{
                        $("#error_razon_social_a").addClass("hidden");
                    }

                    return valido;
                });

                $("#editar_proveedor").click(function () {
                    valido = true;
                    rfc = $("#rfc").html();

                    if($("#nombre").val() == ''){
                        valido = false;
                        $('#error_nombre').removeClass("hidden");
                    }else{
                        $('#error_nombre').addClass("hidden");
                    }


                    if($("#apellidos").val() == ''){
                        valido = false;
                        $('#error_apellidos').removeClass("hidden");
                    }else{
                        $('#error_apellidos').addClass("hidden");
                    }

                    if($("#telefono").val() == ''){
                        valido = false;
                        $('#error_telefono').removeClass("hidden");
                    }else{
                        $('#error_telefono').addClass("hidden");
                    }

                    if($("#correo").val() == ''){
                        valido = false;
                        $('#error_correo').removeClass("hidden");
                    }else{
                        $('#error_correo').addClass("hidden");
                    }

                    if($("#domicilio").val() == ''){
                        valido = false;
                        $('#error_domicilio').removeClass("hidden");
                    }else{
                        $('#error_domicilio').addClass("hidden");
                    }

                    if(rfc.length == 12 && $("#razon_social").val() == ''){
                        valido = false;
                        $("#error_razon_social").removeClass("hidden");
                    }
                    else{
                        $("#error_razon_social").addClass("hidden");
                    }
                    return valido;
                });

            
        });
    </script>
@endsection