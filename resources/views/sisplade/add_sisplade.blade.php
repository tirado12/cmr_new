@extends('layouts.plantilla')
@section('title','Sisplade')
@section('contenido')
<link rel="stylesheet" href="{{ asset('css/datatable.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/style_alert.css') }}">
<meta name="_token" content="{{ csrf_token() }}">

<!--Responsive Extension Datatables CSS-->
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
<!--CDNs select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<div class="flex flex-row">
  <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
  </svg>
<h1 class="text-xl font-bold ml-2">Agregar Sisplade</h1>
</div>

<div class="mt-6 contenedor p-8 shadow-2xl bg-white rounded-lg">
    <div class="relative p-6 flex-auto">
      
        <div class="alert flex flex-row items-center justify-center bg-gray-100 p-2 mb-4 shadow">
          <div class="alert-content ml-4">
            <p class="font-bold sm:text-sm">Fuentes de financimiento de clientes</p>
          </div>
        </div>
      

    <div class="grid grid-cols-8 gap-4">
          <div class="col-span-3 ">
            <label  id="label_cliente_id" for="cliente_id" class="block text-sm font-medium text-gray-700">Cliente *</label>
            <select id="cliente_id" name="cliente_id"  class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">                
                <option value=""> Elija una opción </option>
                @foreach ($fuenteClientes as $item)
                <option value="{{$item->cliente_id}}"> {{$clientes->find($item->cliente_id)->nombre}} </option>
                @endforeach
            </select>
            <label id="error_cliente_id" name="error_cliente_id" class="hidden text-base font-normal text-red-500" >Seleccione una opción</label>
          </div>

          <div class="col-span-2">
            <label id="label_ejercicio" for="label_ejercicio" class="block text-sm font-medium text-gray-700">Ejercicio *</label>
              <select id="ejercicio" name="ejercicio" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">                
                <option value=""> Elija un cliente </option>
              </select>
            <label id="error_ejercicio" name="error_ejercicio" class="hidden text-base font-normal text-red-500" >Porfavor ingresar un año de ejercicio</label>  
          </div>
        
          <div class="col-span-3">
              <label id="label_fuente" for="fuente" class="block text-sm font-medium text-gray-700">Fuente de financiamiento *</label>
              <select id="fuente" name="fuente" class="select2 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">                
                  <option value=""> Elija un cliente  y ejercicio</option>
                </select>
              <label id="error_ejercicio" name="error_ejercicio" class="hidden text-base font-normal text-red-500" >Porfavor ingresar un año de ejercicio</label>  
          </div>
      </div>
      
      <div class="alert flex flex-row items-center justify-center bg-gray-100 p-2 mt-4 mb-4 shadow">
        <div class="alert-content ml-4">
          <p class="font-bold sm:text-sm">Nuevo Sisplade</p>
        </div>
      </div>

  
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form id="formulario" name="formulario">
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
              <fieldset class="grid grid-cols-8 gap-4 p-5">

                <div class="col-span-4">
                  <legend class="text-base font-medium text-gray-900 ">Registrado</legend>
                      <div class="mt-4 space-y-4">
                        <div class="flex items-center ">
                          
                          <div class="mr-3 text-sm">
                            <input id="fecha_capturado" name="fecha_capturado" type="date" class="focus:ring-gray-500 text-gray-600 border-gray-300 rounded w-full" disabled>
                            
                          </div>
                          <div class="flex items-center h-5">
                            <label for="fecha_capturado" class="font-medium text-gray-700">Fecha de captura</label>
                            
                          </div>
                        </div>

                        <div class="flex items-center ">
                          
                          <div class="mr-3 text-sm">
                            
                            <input id="fecha_validado" name="fecha_validado" type="date" class="focus:ring-gray-500 text-gray-600 border-gray-300 rounded w-full" disabled>
                          </div>
                          <div class="flex items-center h-5">
                            <label for="fecha_validado" class=" block font-medium text-gray-700">Fecha de validación</label>
                            
                          </div>
                          
                        </div>
                      </div>
                </div>

                <div class="col-span-4">
                  <legend class="text-base font-medium text-gray-900 ">Estado</legend>
                      <div class="mt-4 space-y-4 ">
                        <div class="flex items-start mb-8 mt-6">
                          <div class="flex items-center h-5">
                            
                            <input id="capturado" name="capturado" type="checkbox" class="focus:ring-green-500 h-6 w-6 text-green-600 border-gray-300 rounded">
                          </div>
                          <div class="ml-3 text-sm">
                            <label for="capturado" class="font-medium text-gray-700">Capturado</label>
                          </div>
                        </div>

                        <div class="flex items-start mt-8">
                          <div class="flex items-center h-5">
                            <input id="validado" name="validado" type="checkbox" class="focus:ring-green-500 h-6 w-6 text-green-600 border-gray-300 rounded">
                            <input id="fuenteCliente_id" name="fuenteCliente_id" type="text" hidden>
                           </div>
                          <div class="ml-3 text-sm">
                            <label for="validado" class="font-medium text-gray-700">Validado</label>
                            
                          </div>
                        </div>
                      </div>
                </div>
              </fieldset>
              
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <a type="button" href="{{route('sisplade.index')}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-400 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Regresar
              </a>
              <button type="buttom" id="guardar" name="guardar" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-orange-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-800" disabled>
                Guardar
              </button>
            </div>
          </div>
        </form>
      </div>

    </div>
    
</div>

<!-- agregar sisplade -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/sl-1.3.3/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>

  //metodo ajax obtener el registro fuenteCliente exacto
  $(document).ready(function() {
    var fuente,ejercicio,cliente;
    $("#fuente").on('change', function () {
      
        $('#guardar').prop( "disabled", false ); //validacion de formulario
        $("#fecha_capturado").prop( "disabled", false );
        $("#fecha_validado").prop( "disabled", false );
        $('#guardar').removeClass('bg-orange-800  focus:ring-orange-800');
        $('#guardar').addClass('bg-blue-600 hover:bg-blue-700 focus:ring-blue-500');
     
      fuente= $(this).val();
      ejercicio=$('#ejercicio').val();
      cliente=$('#cliente_id').val();
      
      var link='{{ url("/fuentesClientes")}}/'+ejercicio+','+cliente+','+fuente; 
      $.ajax({
        url: link,
        dataType:'json',
        type: 'get',
        success: function(data){
          $.each(data,function(key, item) {
             //console.log('id '+item.id_fuente_financ_cliente);
             $("#fuenteCliente_id").val(item.id_fuente_financ_cliente);
          });
        }
      });
    });
    
    //guardar registro sisplade
    $("#guardar").on('click', function () {
      var validado,capturado;
      var fuentes_clientes_id= $("#fuenteCliente_id").val();
      if($('#capturado').prop("checked"))
      {capturado=1;}
      else
      {capturado=0;}
      var fecha_capturado= $('#fecha_capturado').val();
      if($('#validado').prop("checked"))
      {validado= 1;}
      else
      {validado=0;}
      console.log("capturado "+capturado);
      console.log("validado "+validado);
      var fecha_validado= $('#fecha_validado').val();
      var direccion= '{{ route("sisplade.store") }}';
      var token = '{{ csrf_token() }}';
      var data= {
        fuentes_clientes_id:fuentes_clientes_id,
        capturado:capturado,
        fecha_capturado:fecha_capturado, 
        validado:validado,
        fecha_validado:fecha_validado,
        _token:token,
        };
        
        $.ajax({
          type: 'POST',
          url: direccion,
          data: data,
          success: function(data){
              window.location = data.url;
          },
          cache: false
        });
    });

    //select ejercicio disponible por cliente
    $("#cliente_id").on('change', function () {

         cliente=$(this).val();
         $("#ejercicio").empty();
         $("#fuente").empty();
         $("#ejercicio").append('<option value="">Elija un cliente</option>');
         $("#fuente").append('<option value="">Elija un cliente y ejercicio</option>');
         var link = '{{ url("/selectEjercicio")}}/'+cliente;
         $.ajax({
          url: link,
          dataType:'json',
          type:'get',
          success: function(data){
            $.each(data,function(key, item) {
              $("#ejercicio").append('<option value='+item.ejercicio+'>'+item.ejercicio+'</option>');
            });
          },
          cache: false
        });
    });
  
      //select fuentes de financiamiento disponibles por cliente
      $("#ejercicio, #cliente_id").on('change', function () {
        
        if($("#cliente_id").val()== '' || $("#ejercicio").val()== ''){
        $('#guardar').prop( "disabled", true ); //validacion de formulario
        $("#fecha_capturado").prop( "disabled", true );
        $("#fecha_validado").prop( "disabled", true );
        $('#guardar').removeClass('bg-blue-600 hover:bg-blue-700 focus:ring-blue-500');
        $('#guardar').addClass('bg-orange-800  focus:ring-orange-800');
      }
        ejercicio=$('#ejercicio').val();
        cliente=$('#cliente_id').val();
        $("#fuente").empty();
        $("#fuente").append('<option value="">Elija un cliente y ejercicio</option>');
        if(cliente.length>0 && ejercicio.length>0){  
          var direccion = '{{ url("/autocomplete")}}/'+ejercicio+','+cliente;
          consulta(direccion);
        }
        //ejercicio
      }); 

      function consulta(direccion){
        $.ajax({
              url: direccion,
              dataType:'json',
              type:'get',
              success: function(data){
                console.log(data);
                $.each(data,function(key, item) {
                  $("#fuente").append('<option value='+item.id_fuente_financiamiento+'>'+item.nombre_corto+'</option>');
                });
                
              },
              cache: false
        });
      }
  });
 
  //ejecucion del datatable
  $(document).ready(function() {
          var table = $('#example').DataTable({
              select: true,
              "autoWidth" : true,
              "responsive" : true,
              columnDefs: [ 
              ],
              language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
              }
            }).columns.adjust();
           
            $('#example tbody').on( 'click', 'tr', function () {
          //console.log( table.cell(1,2).data() );
          
              $('#pass').val(table.cell(this,0).data());
   });

});
     
      
</script>

@endsection
