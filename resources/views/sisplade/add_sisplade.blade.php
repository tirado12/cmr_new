@extends('layouts.plantilla')
@section('title','Sisplade')
@section('contenido')
<link rel="stylesheet" href="{{ asset('css/datatable.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/style_alert.css') }}">

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
        <div class="grid grid-cols-8 gap-4">
          <div class="col-span-4 ">
            
            <label  id="label_cliente_id" for="cliente_id" class="block text-sm font-medium text-gray-700">Cliente *</label>
            <select id="cliente_id" name="cliente_id"  class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">                
              <option value=""> Elija una opción </option>
             @foreach ($clientes as $cliente)
              <option value="{{$cliente->id_cliente}}"> {{$cliente->nombre}} </option>
              @endforeach
            </select>
            <label id="error_cliente_id" name="error_cliente_id" class="hidden text-base font-normal text-red-500" >Seleccione una opción</label>
          </div>

          <div class="col-span-4">

            <label id="label_ejercicio" for="label_ejercicio" class="block text-sm font-medium text-gray-700">Ejercicio *</label>
            <select id="ejercicio" name="ejercicio" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">                
                <option value=""> Elija un cliente </option>
              
              </select>
            <label id="error_ejercicio" name="error_ejercicio" class="hidden text-base font-normal text-red-500" >Porfavor ingresar un año de ejercicio</label>  
        
        </div>
        <div class="col-span-4">

            <label id="label_fuente" for="fuente" class="block text-sm font-medium text-gray-700">Fuente de financiamiento *</label>
            <select id="fuente" name="fuente" class="select2 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">                
                <option value=""> Elija un cliente  y ejercicio</option>
               
              </select>
            <label id="error_ejercicio" name="error_ejercicio" class="hidden text-base font-normal text-red-500" >Porfavor ingresar un año de ejercicio</label>  
        
        </div>
        
        <div class="col-span-4">
        <label for="password_confirmation" class="block text-base font-bold text-gray-700">Confirmar contraseña *</label>
        <input type="text" name="pass" id="pass"  class="mt-1 focus:ring-blue-800 focus:border-blue-800 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >
          
      </div>
         
         

         
          
      </div>
      
    </div>

  


</div>


<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/sl-1.3.3/datatables.min.js"></script>

    
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>



  


  //select ejercicio disponible por cliente
  $(document).ready(function() {
      var cliente;
      $("#cliente_id").on('change', function () {
         cliente=$(this).val();
         //if(cliente == ''){
         $("#ejercicio").empty();
         $("#fuente").empty();
         $("#ejercicio").append('<option value="">Elija un cliente</option>');
         $("#fuente").append('<option value="">Elija un cliente y ejercicio</option>');
        //}
         //console.log(elegido);
         var link = '{{ url("/selectEjercicio")}}/'+cliente;
         $.ajax({
          url: link,
          data:'json',
          type:'get',
          success: function(data){
            $.each(data,function(key, item) {
              $("#ejercicio").append('<option value='+item.ejercicio+'>'+item.ejercicio+'</option>');
            });
          },
          cache: false
        });
      });
  });

  //select fuentes de financiamiento disponibles por cliente
  $(document).ready(function() {
    var cliente, ejercicio;
    $("#ejercicio, #cliente_id").on('change', function () {
      
      ejercicio=$('#ejercicio').val();
      cliente=$('#cliente_id').val();
      $("#fuente").empty();
      $("#fuente").append('<option value="">Elija un cliente y ejercicio</option>');
      if(cliente.length>0 && ejercicio.length>0){  
        var direccion = '{{ url("/autocomplete")}}/'+ejercicio+','+cliente;
        consulta(direccion,cliente,ejercicio);
      }
      
    }); //ejercicio
      
    
 
    
    

   function consulta(direccion, cliente, ejercicio){
    $.ajax({
          url: direccion,
          data:'json',
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
   } );

      });
     
      
</script>

@endsection
