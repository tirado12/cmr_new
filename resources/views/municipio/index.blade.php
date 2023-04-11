
@extends('layouts.plantilla')
@section('title','Municipio')
@section('contenido')
        <link rel="stylesheet" href="{{ asset('css/datatable.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style_alert.css') }}">
        <!--Responsive Extension Datatables CSS-->
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
        
<div class="flex flex-row">
  <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
  </svg>
<h1 class="text-xl font-bold ml-2">Lista de municipios</h1>
</div>
@php
  $nombre = 1;
@endphp

<!-- fin tabla tailwind, inicio data table -->
<div class="mt-6 contenedor p-8 shadow-2xl bg-white rounded-lg">

<table id="example" class="table table-striped bg-white" style="width:100%;">
  <thead>
      <tr>
          <th>Núm.</th>
          <th>Nombre</th>
          <th>RFC</th>
          <th>Distrito</th>
          <th class="flex justify-center">Acción</th>
          
      </tr>
  </thead>
  <tbody> 
  @foreach($municipio as $key => $index)
      <tr>
          
          <td>
            <div class="text-sm leading-5 font-medium text-gray-900">
              {{$index->id_municipio}}
            </div>
          </div>
          </td>
          <td>
            <div class="text-sm leading-5 font-medium text-gray-900">
              {{$index->nombre}}
            </div>
            
          </td>
          <td>
            <div class="text-sm leading-5 font-medium text-gray-900">
              {{$index->rfc}}
            </div>
            
          </td>
          <td>
            <div class="text-sm leading-5 font-medium text-gray-900">
            {{ $index->distrito->nombre }}
            </div>
            
          </td>
          <td>
            <div class="flex justify-center">
            <form action="{{ route('municipio.destroy', $index->id_municipio) }}" method="POST" class="form-eliminar" >
              <div>
              <a type="button"  href="{{ route('municipio.edit', $index->id_municipio)}}" class="bg-white text-sm text-blue-500 font-normal text-ms p-2 rounded rounded-lg">Editar</a>
              <button class="bg-transparent text-blue-500 active:bg-transparent font-normal  text-sm p-2  rounded outline-none focus:outline-none  ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id', {{$index}}, {{$distrito}})">
    Detalles
    </button>
              <!--@csrf
              @method('DELETE')
          <button type="submit" class="bg-white text-red-500 p-2 rounded rounded-lg">Eliminar</button>
              </div>-->
              
              </form>
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

<!-- inicio modal -->
<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
  <div class="relative w-auto my-6 mx-auto max-w-3xl">
    <!--content-->
    <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
      <!--header-->
      <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
        <h4 class="text-xl font-semibold">
          Municipio
        </h4>
        <button class="p-1 ml-auto bg-transparent border-0 text-red-500 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal_1('modal-id')">
          <span class="bg-transparent text-red-500 h-6 w-6 text-2xl block outline-none focus:outline-none">
            ×
          </span>
        </button>
      </div>
      <!--body-->
      
      <div class="relative p-6 flex-auto">
        
          <div class="grid grid-cols-8 gap-6">
            <div class="col-span-8 ">
              <label for="first_name" class="text-base font-medium text-gray-700">Nombre: </label>
              <label id="nombre_municipio" class="text-base font-bold text-gray-900"></label>
            </div>
            <div class="col-span-8">
              <label for="rfc_address" class=" text-base font-medium text-gray-700">RFC: </label>
              <label id="rfc_municipio" class="text-base font-bold text-gray-900"></label>
            </div>
            <div class="col-span-8">
              <label for="domicilio_address" class=" text-base font-medium text-gray-700">Domicilio: </label>
              <label id="direccion_municipio" class="text-base font-bold text-gray-900"></label>
            </div>
            <div class="col-span-8">
              <label for="distrito_address" class="text-base font-medium text-gray-700">Distrito: </label>
              <label id="distrito_municipio" class="text-base font-bold text-gray-900"></label>
            </div>

            <div class="col-span-8">
              <label for="region_address" class="text-base font-medium text-gray-700">Región: </label>
              <label id="region_municipio" class="text-base font-bold text-gray-900"></label>
            </div>
            
          </div>
        
      </div>
      <!--footer-->
    </div>
  </div>
</div>

<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>  
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>

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
  $(".btn-AddDate").on("click",function() {
  alert("Modal Mostrada");
  document.getElementById('modal-id').classList.toggle("hidden");
    document.getElementById('modal-id' + "-backdrop").classList.toggle("hidden");
    
});
  function toggleModal(modalID, municipio, distrito){
    $('#nombre_municipio').html(municipio.nombre); 
    $('#rfc_municipio').html(municipio.rfc); 
    $('#direccion_municipio').html(municipio.direccion); 
    $('#distrito_municipio').html(municipio.distrito.nombre + ' - ' + municipio.distrito.id_distrito); 
    $('#region_municipio').html(distrito[municipio.distrito_id - 1].nombre_region + ' - ' + distrito[municipio.distrito_id - 1].id_region); 
    document.getElementById(modalID).classList.toggle("hidden");
    document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
  }

  function toggleModal_1(modalID){
    document.getElementById(modalID).classList.toggle("hidden");
    document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
  }
</script>
<style>
  
</style>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.4/b-flash-1.6.4/b-html5-1.6.4/b-print-1.6.4/datatables.min.js"></script>



<script>
  
  $(document).ready(function() {
    
    $('#example').DataTable({
        "autoWidth" : true,
        "responsive" : true,
        columnDefs: [
            { responsivePriority: 1, targets: 4 },
            { responsivePriority: 1, targets: 1 },
            { responsivePriority: 10001, targets: 4 },
            { responsivePriority: 2, targets: -2 }
        ],
        language: {
          url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
        }
      }
    )
    .columns.adjust();
});
</script>




@endsection