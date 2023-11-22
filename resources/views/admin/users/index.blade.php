@extends('layouts.plantilla')
@section('title','Usuarios')
@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/datatable.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_alert.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles_personalizados.css') }}">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
        
    <!-- fin tabla tailwind, inicio data table -->
    <div class="contenedor px-8 py-2 shadow-2xl bg-white rounded-lg text-sm mt-8">
        <div class="border-b p-4 flex justify-between">
            <h2 class="text-xl font-bold">
                Listado de usuarios
            </h2>
            <button class="bg-trasparent text-blue-1a font-bold uppercase text-sm outline-none focus:outline-none" type="button" onclick="toggleModal('modal-id')">
                Agregar
            </button>
        </div>
        <table id="example" class="table table-striped bg-white" style="width:100%;">
            <thead>
                <tr>
                    <th class="text-sm text-center">Nombre</th>
                    <th class="text-sm text-center">Correo</th>
                    <th class="text-sm text-center">Tipo de usuario</th>
                    <th class="flex justify-center">Acciones</th>
                </tr>
            </thead>
            <tbody> 
                @foreach($roles as $index=>$user)
                    <tr class="p-4">
                        <td>
                            <p class="text-sm leading-5 font-medium p-1">{{$user->name}}</p>
                        </td>
                        <td>
                            <p class="text-sm leading-5 font-medium p-1">{{$user->email}}</p>
                        </td>
                        <td>
                            <p class="text-sm leading-5 font-medium p-1">{{ $user->roles[0]->name }}</p>
                        </td>
                        <td>
                            <div class="flex justify-center">
                                <a type="button"  href="{{ route('admin.users.edit', $user->id)}}" class="bg-trasnparent text-blue-500 p-1">Editar</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <!-- inicio modal -->
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
        <div class="relative w-auto my-28 mx-auto max-w-3xl">
            <!--content-->
            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                <!--header-->
                <div class="flex items-center justify-between px-5 py-3 border-b border-solid border-blueGray-200 rounded-t bg-blue-02">
                    <h4 class="text-base font-normal uppercase text-white">
                        Agregar Nuevo Usuario
                    </h4>
                    <button class="p-1 ml-auto bg-transparent border-0 text-white float-right text-2xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
                        <span>
                            <i class="fas fa-xmark"></i>
                        </span>
                    </button>
                </div>
                <!--body-->
                <form action="{{ route('admin.users.store', $user->id) }}" method="POST" id="formulario" name="formulario">
                    @csrf
                    @method('POST')
                    <div class="relative p-6 flex-auto">
                        <div class="grid grid-cols-8 gap-4">
                            <div class="col-span-8 sm:col-span-4">
                                <label for="first_name" class="text-sm font-semibold text-center pb-2">Usuario *</label>
                                <input type="text" name="name" id="name" autocomplete="given-name" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <label id="error_name" name="error_name" class="hidden text-sm font-normal text-red-500" >Ingrese el nombre del usuario</label>
                            </div>
                            <div class="col-span-8 sm:col-span-4">
                                <label for="email_address" class="text-sm font-semibold text-center pb-2">Correo *</label>
                                <input type="text" name="email" id="email" autocomplete="email" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <label id="error_email" name="error_email" class="hidden text-sm font-normal text-red-500" >Ingresar un correo electrónico</label>
                            </div>
                            <div class="col-span-8 sm:col-span-4">
                                <label for="password" class="text-sm font-semibold text-center pb-2">Contraseña *</label>
                                <div class="relative mt-1 focus:ring-blue-800 focus:border-blue-800 block shadow-sm sm:text-sm border-1 border-gray-300 rounded-md overflow-hidden">
                                    <input type="password" name="password" id="password" class=" w-full border-none">
                                    <span id="icon-password" data-activo=false class="absolute h-full flex items-center px-3  bg-white right-0 top-0 text-lg text-blue-26 cursor-pointer" onclick="myPassword('password')">
                                        <i class="fa-regular fa-eye"></i>
                                    </span>
                                </div>
                                <div class="text-xs hidden" id="mensaje-password">
                                    
                                    <p class="font-semibold mb-0">La contraseña debe contener:</p>
                                    <p id="tamanio" class="text-red-500"><i class="fa-solid fa-xmark"></i> Mínimo 8 caracteres</p>
                                    <p id="mayuscula" class="text-red-500"><i class="fa-solid fa-xmark"></i> Una mayúscula</p>
                                    <p id="minuscula" class="text-red-500"><i class="fa-solid fa-xmark"></i> Una minúscula</p>
                                    <p id="digito" class="text-red-500"><i class="fa-solid fa-xmark"></i> Un digito</p>
                                    <p id="signo" class="text-red-500"><i class="fa-solid fa-xmark"></i> Un signo * - % & _</>
                                </div>
                                <label id="error_password" name="error_password" class="hidden text-sm font-normal text-red-500" >Ingresar una contraseña</label>
                            </div>
                            <div class="col-span-8 sm:col-span-4">
                                <label for="confirm" class="text-sm font-semibold text-center pb-2">Confirmar contraseña *</label>
                                <div class="relative mt-1 focus:ring-blue-800 focus:border-blue-800 block shadow-sm sm:text-sm border-1 border-gray-300 rounded-md overflow-hidden">
                                    <input type="password" name="confirm" id="confirm" autocomplete="confirm" class="w-full border-none">
                                    <span id="icon-confirm" data-activo=false class="absolute h-full flex items-center px-3  bg-white right-0 top-0 text-lg text-blue-26 cursor-pointer" onclick="myPassword('confirm')">
                                        <i class="fa-regular fa-eye"></i>
                                    </span>
                                </div>
                                <label id="error_confirm" name="error_confirm" class="hidden text-sm font-normal text-red-500" >Confirma la contraseña</label>
                            </div>
                            <div class="col-span-8 sm:col-span-4" >
                                <label for="country" class="text-sm font-semibold text-center pb-2">Tipo de rol *</label>
                                <select id="roles" name="roles" onchange="validarRol()" class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <option value="">Elija una opción</option>
                                    @foreach($roles_list as $rol)
                                        <option value="Administrador">{{ $rol->name }}</option>
                                    @endforeach
                                </select>
                                <label id="error_roles" name="error_roles" class="hidden text-sm font-normal text-red-500" >Selecciona el tipo de rol</label>
                            </div>
                        </div>
                        <div class="mt-5">
                        <p class="text-xs">Verifique los campos obligatorios marcados con un ( * )</p>
                        </div>
                        
                    </div>
                    <!--footer-->
                    <div class=" p-4 border-t border-solid border-blueGray-200 rounded-b">
                        <div class="text-right">
                            <button class="text-red-500 background-transparent font-bold uppercase px-6 text-sm outline-none focus:outline-none ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                                Cancelar
                            </button>
                            <button id="guardar" type="submit" class="text-blue-26 font-bold uppercase text-sm px-6 rounded outline-none focus:outline-none ease-linear transition-all duration-150">
                                Guardar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.4/b-flash-1.6.4/b-html5-1.6.4/b-print-1.6.4/datatables.min.js"></script>
    <!--Alerta de confirmacion-->
    @if(session('eliminar')=='ok')
    <script>
        Swal.fire(
        '¡Eliminado!',
        'El usuario ha sido eliminado.',
        'success'
        )
    </script>
    @endif

    <script>
        $(".form-eliminar").submit(function(e){
            e.preventDefault();
            Swal.fire({
                customClass: {
                    title: 'swal_title_modificado',
                    cancelButton: 'swal_button_cancel_modificado'
                },
                title: '¿Seguro que desea eliminar este usuario?',
                text: "¡Aviso, esta acción es irreversible!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#10b981',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Borrar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
        /* */
    </script>

    <script type="text/javascript">
        function toggleModal(modalID){
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
        }

        function myPassword(id) {
            var x = document.getElementById(id);
            if (x.type === "password") {
                x.type = "text";
                $("#icon-" + id + " i").removeClass('fa-eye');
                $("#icon-" + id + " i").addClass('fa-eye-slash');
            } else {
                x.type = "password";
                $("#icon-" + id + " i").addClass('fa-eye');
                $("#icon-" + id + " i").removeClass('fa-eye-slash');
            }
        }

        

        
    
        //validacion de campos del modal
        $(document).ready(function() {
            $("#modal-id input").keyup(function() {
                //console.log($(this).attr('id'));
                var monto = $(this).val();
        
                if(monto != ''){
                    $('#error_'+$(this).attr('id')).fadeOut();
                    $("#label_"+$(this).attr('id')).removeClass('text-red-500');
                    $("#label_"+$(this).attr('id')).addClass('text-gray-700');
                    //$('#guardar').removeAttr("disabled");
                }
                else{
                    //$("#guardar").attr("disabled", true);
                    $('#error_'+$(this).attr('id')).fadeIn();
                    $("#label_"+$(this).attr('id')).addClass('text-red-500');
                    $("#label_"+$(this).attr('id')).removeClass('text-gray-700');
                }
        
            });


            $('#password').focus(function(){
                $("#mensaje-password").removeClass("hidden");
            });

            $('#password').keyup(function(){
                var cadena= $(this).val();
                var patron=/[A-Z]/g;
                var verificacion = cadena.match(patron);

                estatus('#mayuscula', verificacion == null);

                patron=/[a-z]/g;
                verificacion = cadena.match(patron);

                estatus("#minuscula", verificacion == null);

                patron =/[0-9]/g;
                verificacion = cadena.match(patron);
                
                estatus("#digito", verificacion == null);

                /*patron =/[*-%&_]/g;
                verificacion = cadena.match(patron);

                estatus("#signo", verificacion == null);*/

                var tamanio = cadena.length;

                estatus("#tamanio", tamanio < 8);
                
            });

            $("#guardar").click(function () {
                value = true;

                if($("#name").val() == null){
                    value = false;
                    $("error_name").removeClass("hidden");
                }else{
                    $("error_name").addClass("hidden");
                }

                if($("#email").val() == null){
                    value = false;
                    $("error_email").removeClass("hidden");
                }else{
                    $("error_email").addClass("hidden");
                }

                if($("#password").val() == null){
                    value = false;
                    $("error_email").removeClass("hidden");
                }else{
                    var cadena= $("#password").val();
                    /*var patron=/[A-Za-z0-9*-%&_]{9}/g;
                    var verificacion = cadena.match(patron);
                    $("error_email").addClass("hidden");*/
                }
                return value;
            });

            
        });

        function estatus(id, valor){
            if(valor){
                $(id).removeClass('text-blue-26');
                $(id).addClass('text-red-500');
                $(id + " i").addClass('fa-xmark');
                $(id + " i").removeClass('fa-check');
            }else{
                $(id).addClass('text-blue-26');
                $(id).removeClass('text-red-500');
                $(id + " i").removeClass('fa-xmark');
                $(id + " i").addClass('fa-check');
            }
        }

        function validarRol() {
            var valor = document.getElementById("roles").value;
            if(valor != ''){
                $('#error_roles').fadeOut();
                $("#label_roles").removeClass('text-red-500');
                $("#label_roles").addClass('text-gray-700');
            }else{
                $('#error_roles').fadeIn();
                $("#label_roles").addClass('text-red-500');
                $("#label_roles").removeClass('text-gray-700');
            }
        }

        //validacion del formulario con el btn guardar
        $().ready(function() {
            $("#formulario").validate({
            onfocusout: false,
            onclick: false,
                rules: {
                    name: { required: true},
                    email: { required: true, email: true},
                    password: { required: true},
                    roles: { required: true},
                    comfirm: { requerid: true},
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
    
        });



    </script>


    <script>
        $(document).ready(function() {  
            $('#example').DataTable({
                "autoWidth" : false,
                "responsive" : true,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                }
            }).columns.adjust();

        });
    </script>

@endsection