
<?php $service = app('App\Http\Controllers\ObraController'); ?>
<?php $__env->startSection('title', 'Editar '); ?>
<?php $__env->startSection('contenido'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/style_alert.css')); ?>">

<div class="flex flex-row mb-4">
    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
    </svg>
    <h1 class="font-bold text-xl ml-2">Mostrar Obra</h1>
</div>

<div class="mt-10 sm:mt-0 shadow-2xl bg-white rounded-lg">
    <div class="mt-6 contenedor p-8 shadow-2xl bg-white rounded-lg">
        <h2 class="font-bold text-xl text-center">Documentos que integran el expediente técnico</h2>
        <hr>
        <div class="bg-gray-200 mt-5">
            <h2 class="font-bold text-lg text-center">Datos generales de la obra</h2>
        </div>
        <p class="mt-5 font-bold"><?php echo e($obj_obra->get('obra')->nombre_obra); ?></p>
        <div class="grid sm:grid-cols-9 ">
            <div class="sm:col-span-3">
                <p class="mt-5 sm:ml-2 text-normal">Localidad: <span class="font-bold"><?php echo e($obj_obra->get('obra')->nombre_localidad); ?></span></p>
                <p class="mt-5 sm:ml-2 text-normal">Municipio: <span class="font-bold"><?php echo e($obj_obra->get('obra')->nombre_municipio); ?></span></p>
                <p class="mt-5 sm:ml-2">Distrito: <span class="font-bold"><?php echo e($obj_obra->get('obra')->nombre_distrito); ?></span></p>
                <?php if($obj_obra->get('contrato') != null): ?>
                <p class="mt-5 sm:ml-2">Contratista: <span class="font-bold"><?php echo e($obj_obra->get('contrato')->razon_social); ?></span></p>
                <?php endif; ?>
            </div>
            <div class="sm:col-span-3">
                <p class="mt-5 sm:mr-2 sm:ml-2">N° de contrato: <span class="font-bold"><?php echo e($obj_obra->get('obra')->numero_contrato); ?></span></p>
                <p class="mt-5 sm:mr-2 sm:ml-2">Fecha de contrato: <span class="font-bold"><?php echo e(date('d-m-Y', strtotime($obj_obra->get('obra')->fecha_contrato))); ?></span>
                </p>
                <p class="mt-5 sm:mr-2 sm:ml-2">Oficio de notificación: <span class="font-bold"><?php echo e($obj_obra->get('obra')->oficio_notificacion); ?></span></p>
                <p class="mt-5 sm:mr-2 sm:ml-2">Monto contratado: <span class="font-bold"><?php echo e($service->formatNumber($obj_obra->get('obra')->monto_contratado)); ?></span>
                </p>
                <?php if($obj_obra->get('obra')->monto_modificado != null): ?>
                <p class="mt-5 sm:mr-2 sm:ml-2">Monto modificado: <span class="font-bold"><?php echo e($service->formatNumber($obj_obra->get('obra')->monto_modificado)); ?></span>
                </p>
                <?php endif; ?>
            </div>
            <div class="sm:col-span-3">
                <p class="mt-5 sm:mr-2">Fuente de financiamiento: <span class="font-bold"><?php echo e($obj_obra->get('obra')->nombre_fuente); ?></span></p>
                <p class="mt-5 sm:mr-2">Periodo <span class="font-bold"></span></p>
                <p class="mt-1 ml-3 sm:mr-2">Fecha de inicio: <span class="font-bold"><?php echo e(date('d-m-Y', strtotime($obj_obra->get('obra')->fecha_inicio_programada))); ?></span>
                </p>
                <p class="mt-1 ml-3 sm:mr-2">Fecha de termino: <span class="font-bold"><?php echo e(date('d-m-Y', strtotime($obj_obra->get('obra')->fecha_final_programada))); ?></span>
                </p>
                <p class="mt-5 sm:mr-2">Modalidad de ejecución:
                    <?php if($obj_obra->get('contrato') != null): ?>
                    <span class="font-bold">Contrato</span>
                    <?php if($obj_obra->get('contrato')->modalidad_asignacion == 1): ?>
                    <span class="font-bold">- Licitación pública</span>
                    <?php endif; ?>
                    <?php if($obj_obra->get('contrato')->modalidad_asignacion == 2): ?>
                    <span class="font-bold">- Invitación a cuando menos tres contratistas</span>
                    <?php endif; ?>
                    <?php if($obj_obra->get('contrato')->modalidad_asignacion == 3): ?>
                    <span class="font-bold">- Adjudicación directa</span>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if($obj_obra->get('admin') != null): ?>
                    <span class="font-bold">Administración directa</span>
                    <?php endif; ?>
                </p>
            </div>
        </div>
        <div class="bg-gray-200 mt-10">
            <h2 class="font-bold text-lg text-center">Estructura del expediente técnico</h2>
        </div>
        <div class="___class_+?47___">
            <div class="___class_+?48___">
                <div class="bg-gray-200 mt-8">
                    <h2 class="font-bold text-base text-center">Parte social</h2>
                </div>
                <div class="grid sm:grid-cols-8 gap-x-8">
                    <div class="sm:col-span-4">
                        <table class="table table-striped bg-white mt-2" style="width:100%;">
                            <tbody>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?56___">Acta de integración del Consejo de Desarrollo
                                            Municipal</p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->acta_integreacion_consejo):
                                            case (1): ?>
                                            <img class="___class_+?59___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?60___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?61___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?64___">Acta de selección de obras</p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->acta_seleccion_obras):
                                            case (1): ?>
                                            <img class="___class_+?67___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?68___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?69___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?72___">Acta de priorización de obras, acciones sociales
                                            básicas e inversión</p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->acta_priorizacion_obras):
                                            case (1): ?>
                                            <img class="___class_+?75___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?76___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?77___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?80___">Convenio celebrado con instancias Estatales y
                                            Federales para Mezcla de recursos, transferencias de recursos. Liberacion de
                                            recursos.</p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->convenio_mezcla):
                                            case (1): ?>
                                            <img class="___class_+?83___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?84___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?85___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="sm:col-span-4">
                        <table class="table table-striped bg-white sm:mt-2" style="width:100%;">
                            <tbody>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?90___">Acta de integración del comité de obras</p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->acta_integracion_comite):
                                            case (1): ?>
                                            <img class="___class_+?93___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?94___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?95___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?98___">Convenio de concertación</p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->convenio_concertacion):
                                            case (1): ?>
                                            <img class="___class_+?101___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?102___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?103___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php if($obj_obra->get('contrato')->modalidad_asignacion == 3): ?>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p c lass="">Acta para adjudicar la obra de manera directa</p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->acta_ejecutar_adjudicacion):
                                            case (1): ?>
                                            <img class="___class_+?108___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?109___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?110___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?113___">Acta de excepción a la licitación pública</p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->acta_excep_licitacion):
                                            case (1): ?>
                                            <img class="___class_+?116___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?117___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?118___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="___class_+?119___">
                <div class="bg-gray-200 mt-8">
                    <h2 class="font-bold text-base text-center">Parte técnica</h2>
                </div>
                <div class="bg-gray-100 mt-4">
                    <h2 class="font-semibold text-base text-center">Proyecto ejecutivo</h2>
                </div>
                <div class="grid sm:grid-cols-8 gap-x-8">
                    <div class="sm:col-span-4">
                        <table class="table table-striped bg-white mt-2" style="width:100%;">
                            <tbody>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?129___">Estudio de factibilidad técnica, económica y
                                            ecológica de la realización de la obra</p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->estudio_factibilidad):
                                            case (1): ?>
                                            <img class="___class_+?132___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?133___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?134___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?137___">
                                            Oficio de notificación de aprobación y autorización de obras, acciones
                                            sociales basicas e inversiones
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->oficio_aprobacion_obra):
                                            case (1): ?>
                                            <img class="___class_+?140___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?141___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?142___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?145___">
                                            Anexo del oficio de notificación, de aprobación y autorización de obras,
                                            acciones sociales básicas e inversiones
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->anexos_oficio_notificacion):
                                            case (1): ?>
                                            <img class="___class_+?148___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?149___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?150___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?153___">
                                            Cédula de información básica
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->cedula_informacion_basica):
                                            case (1): ?>
                                            <img class="___class_+?156___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?157___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?158___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?161___">
                                            Generalidades de la inversión
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->generalidades_inversion):
                                            case (1): ?>
                                            <img class="___class_+?164___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?165___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?166___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>

                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?169___">
                                            Documentos que acrediten la tenencia de la tierra
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->tenencia_tierra):
                                            case (1): ?>
                                            <img class="___class_+?172___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?173___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?174___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?177___">
                                            Dictamen de impacto ambiental
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->dictamen_impacto_ambiental):
                                            case (1): ?>
                                            <img class="___class_+?180___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?181___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?182___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?185___">
                                            Presupuesto de obra programada
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->presupuesto_obra):
                                            case (1): ?>
                                            <img class="___class_+?188___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?189___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?190___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?193___">
                                            Catalogo de conceptos
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->catalogo_conceptos):
                                            case (1): ?>
                                            <img class="___class_+?196___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?197___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?198___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="sm:col-span-4">
                        <table class="table table-striped bg-white sm:mt-2" style="width:100%;">
                            <tbody>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?203___">
                                            Explosión de insumos programada
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->explosion_insumos):
                                            case (1): ?>
                                            <img class="___class_+?206___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?207___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?208___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?211___">
                                            Generadores de obra programada
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->generadores_obra):
                                            case (1): ?>
                                            <img class="___class_+?214___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?215___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?216___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?219___">
                                            Planos del proyecto
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->planos_proyecto):
                                            case (1): ?>
                                            <img class="___class_+?222___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?223___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?224___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?227___">
                                            Especificaciones generales y particulares de construcción
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->especificaciones_generales_particulares):
                                            case (1): ?>
                                            <img class="___class_+?230___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?231___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?232___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?235___">
                                            Licencia del Director Responsable de Obra
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->dro):
                                            case (1): ?>
                                            <img class="___class_+?238___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?239___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?240___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?243___">
                                            Programa de obra e inversión
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->programa_obra_inversion):
                                            case (1): ?>
                                            <img class="___class_+?246___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?247___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?248___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?251___">
                                            Croquis de Micro localización
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->croquis_macro):
                                            case (1): ?>
                                            <img class="___class_+?254___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?255___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?256___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?259___">
                                            Croquis de Macro localización
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('social')->croquis_micro):
                                            case (1): ?>
                                            <img class="___class_+?262___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?263___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?264___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </tbody>
                        </table>
                    </div>
                </div>
                <div class="bg-gray-100 mt-4">
                    <h2 class="font-semibold text-base text-center">Proceso de contratación</h2>
                </div>
                <div class="grid sm:grid-cols-8 gap-x-8">
                    <?php if($obj_obra->get('contrato')->modalidad_asignacion == 2): ?>
                    <div class="sm:col-span-4">
                        <table class="table table-striped bg-white mt-2" style="width:100%;">
                            <tbody>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?272___">Padron de contratista</p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('licitacion')->padron_contratistas):
                                            case (1): ?>
                                            <img class="___class_+?275___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?276___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?277___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?280___">
                                            Invitaciones (con acuses de recepción)
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('licitacion')->invitacion_acuse_recepcion):
                                            case (1): ?>
                                            <img class="___class_+?283___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?284___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?285___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?288___">
                                            Oficio de aceptación de la invitación (con acuses de recepción)
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('licitacion')->aceptacion_invitacion):
                                            case (1): ?>
                                            <img class="___class_+?291___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?292___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?293___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?296___">
                                            Bases de licitacion (con anexos)
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('licitacion')->bases_licitacion):
                                            case (1): ?>
                                            <img class="___class_+?299___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?300___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?301___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?304___">
                                            Constancia de visita o de conocer el sitio donde se ejecutará la obra
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('licitacion')->constancia_visita):
                                            case (1): ?>
                                            <img class="___class_+?307___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?308___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?309___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?312___">
                                            Acta de la junta de aclaraciones
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('licitacion')->acta_junta_aclaraciones):
                                            case (1): ?>
                                            <img class="___class_+?315___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?316___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?317___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?320___">
                                            Acta de apertura técnica
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('licitacion')->acta_apertura_tecnica):
                                            case (1): ?>
                                            <img class="___class_+?323___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?324___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?325___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?328___">
                                            Dictamen técnico y análisis detallado
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('licitacion')->acta_apertura_tecnica):
                                            case (1): ?>
                                            <img class="___class_+?331___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?332___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?333___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?336___">
                                            Acta de apertura económica
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('licitacion')->acta_apertura_tecnica):
                                            case (1): ?>
                                            <img class="___class_+?339___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?340___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?341___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?344___">
                                            Dictamen económico y análisis detallado
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('licitacion')->acta_apertura_tecnica):
                                            case (1): ?>
                                            <img class="___class_+?347___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?348___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?349___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="sm:col-span-4">
                        <table class="table table-striped bg-white sm:mt-2" style="width:100%;">
                            <tbody>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?354___">
                                            Dictamen
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('licitacion')->dictamen):
                                            case (1): ?>
                                            <img class="___class_+?357___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?358___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?359___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?362___">
                                            Acta de fallo
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('licitacion')->acta_fallo):
                                            case (1): ?>
                                            <img class="___class_+?365___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?366___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?367___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?370___">
                                            Propuesta económica de los licitantes
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('licitacion')->propuesta_licitantes_economica):
                                            case (1): ?>
                                            <img class="___class_+?373___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?374___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?375___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?378___">
                                            Propuesta técnica de los licitantes
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('licitacion')->propuesta_licitantes_tecnica):
                                            case (1): ?>
                                            <img class="___class_+?381___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?382___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?383___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?386___">
                                            Contrato
                                            <?php if($obj_obra->get('contrato')->contrato_tipo == 1): ?> <span class="font-bold">(Precios unitarios)</span> <?php endif; ?>
                                            <?php if($obj_obra->get('contrato')->contrato_tipo == 2): ?> Precios Alzados <?php endif; ?>
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('contrato')->contrato):
                                            case (1): ?>
                                            <img class="___class_+?389___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?390___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?391___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?394___">
                                            Oficio justificatorio para convenio modificatorio
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('contrato')->oficio_justificativo_convenio_modificatorio):
                                            case (1): ?>
                                            <img class="___class_+?397___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?398___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?399___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php if($convenios == null): ?>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?402___">
                                            Convenio modificatorio
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <img class="___class_+?405___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                        </div>
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <?php if($convenios != null): ?>
                                <?php $__currentLoopData = $convenios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $convenio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?408___">
                                            Convenio modificatorio
                                            <?php switch($convenio->tipo):
                                            case (1): ?>
                                            al monto del contrato
                                            <?php break; ?>
                                            <?php case (2): ?>
                                            al plazo del contrato
                                            <?php break; ?>
                                            <?php default: ?>
                                            al monto y plazo del contrato
                                            <?php endswitch; ?>
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($convenio->agregado_expediente):
                                            case (1): ?>
                                            <img class="___class_+?411___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?412___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?413___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                <tr class="border-b-1">
                                    <td colspan="2" class="___class_+?415___">
                                        <p class="text-center my-2">
                                            Anexos del contrato
                                        </p>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?419___">
                                            Catálogo de conceptos
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('contrato')->catalogo_conceptos):
                                            case (1): ?>
                                            <img class="___class_+?422___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?423___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?424___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?427___">
                                            Análisis de precios unitarios
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('contrato')->analisis_p_u):
                                            case (1): ?>
                                            <img class="___class_+?430___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?431___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?432___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?435___">
                                            Calendario de la ejecución de los trabajos
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('contrato')->montos_mensuales_ejecutados):
                                            case (1): ?>
                                            <img class="___class_+?438___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?439___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?440___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php else: ?>
                    <div class="sm:col-span-4">
                        <table class="table table-striped bg-white mt-2" style="width:100%;">
                            <tbody>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?445___">Padron de contratista</p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('licitacion')->padron_contratistas):
                                            case (2): ?>
                                            <img class="___class_+?448___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?449___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?450___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?453___">
                                            Contrato
                                            <?php if($obj_obra->get('contrato')->contrato_tipo == 1): ?> <span class="font-bold">(Precios unitarios)</span> <?php endif; ?>
                                            <?php if($obj_obra->get('contrato')->contrato_tipo == 2): ?> Precios Alzados <?php endif; ?>
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('contrato')->contrato):
                                            case (1): ?>
                                            <img class="___class_+?456___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?457___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?458___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?461___">
                                            Oficio justificatorio para convenio modificatorio
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('contrato')->oficio_justificativo_convenio_modificatorio):
                                            case (1): ?>
                                            <img class="___class_+?464___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?465___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?466___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php if($convenios == null): ?>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?469___">
                                            Convenio modificatorio
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <img class="___class_+?472___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                        </div>
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <?php if($convenios != null): ?>
                                <?php $__currentLoopData = $convenios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $convenio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?475___">
                                            Convenio modificatorio
                                            <?php switch($convenio->tipo):
                                            case (1): ?>
                                            al monto del contrato
                                            <?php break; ?>
                                            <?php case (2): ?>
                                            al plazo del contrato
                                            <?php break; ?>
                                            <?php default: ?>
                                            al monto y plazo del contrato
                                            <?php endswitch; ?>
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($convenio->agregado_expediente):
                                            case (1): ?>
                                            <img class="___class_+?478___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?479___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?480___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="sm:col-span-4">
                        <table class="table table-striped bg-white sm:mt-2" style="width:100%;">
                            <tbody>
                                <tr class="border-b-1">
                                    <td colspan="2" class="___class_+?484___">
                                        <p class="text-center my-2">
                                            Anexos del contrato
                                        </p>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?488___">
                                            Catálogo de conceptos
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('contrato')->catalogo_conceptos):
                                            case (1): ?>
                                            <img class="___class_+?491___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?492___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?493___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?496___">
                                            Análisis de precios unitarios
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('contrato')->analisis_p_u):
                                            case (1): ?>
                                            <img class="___class_+?499___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?500___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?501___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?504___">
                                            Calendario de la ejecución de los trabajos
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('contrato')->montos_mensuales_ejecutados):
                                            case (1): ?>
                                            <img class="___class_+?507___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?508___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?509___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="bg-gray-100 mt-4">
                    <h2 class="font-semibold text-base text-center">Documentación comprobatoria</h2>
                </div>
                <div class="grid sm:grid-cols-8 gap-x-8">
                    <div class="sm:col-span-4">
                        <table class="table table-striped bg-white mt-2" style="width:100%;">
                            <tbody>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?517___">Asignacion mediante oficio del Superintendente de
                                            obra</p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('contrato')->oficio_superintendente):
                                            case (1): ?>
                                            <img class="___class_+?520___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?521___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?522___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?525___">
                                            Asignacion mediante oficio del Residente de obra
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('contrato')->oficio_residente_obra):
                                            case (1): ?>
                                            <img class="___class_+?528___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?529___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?530___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?533___">
                                            Oficio emitido por la ejecutora dirigido al contratista por la disposición
                                            del inmueble
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('contrato')->oficio_disposicion_inmueble):
                                            case (1): ?>
                                            <img class="___class_+?536___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?537___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?538___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?541___">
                                            Notificacion de inicio de obra
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('contrato')->oficio_inicio_obra):
                                            case (1): ?>
                                            <img class="___class_+?544___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?545___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?546___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="sm:col-span-4">
                        <table class="table table-striped bg-white sm:mt-2" style="width:100%;">
                            <tbody>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?551___">
                                            Factura de anticipo: <span class="font-bold"><?php echo e($obj_obra->get('contrato')->factura_anticipo); ?></span>
                                            <br>
                                            Importe: <span class="font-bold"><?php echo e($service->formatNumber($obj_obra->get('obra')->anticipo_porcentaje * 0.01 * $obj_obra->get('obra')->monto_contratado)); ?></span>
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('contrato')->exp_factura_anticipo):
                                            case (1): ?>
                                            <img class="___class_+?556___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?557___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?558___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?561___">
                                            Fianza de anticipo
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('contrato')->exp_fianza_anticipo):
                                            case (1): ?>
                                            <img class="___class_+?564___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?565___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?566___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?569___">
                                            Fianza de cumplimiento
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('contrato')->exp_fianza_cumplimiento):
                                            case (1): ?>
                                            <img class="___class_+?572___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?573___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?574___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?577___">
                                            Fianza de vicios ocultos
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('contrato')->exp_fianza_v_o):
                                            case (1): ?>
                                            <img class="___class_+?580___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?581___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?582___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php $__currentLoopData = $estimaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $estimacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="sm:col-span-4">
                        <div class="w-full ">
                            <div x-data={show:false}>
                                <div class=" bg-transparent" id="headingOne" style="margin-bottom: -7px;">
                                    <button @click="show=!show" type="button" style="width:100%;">
                                        <table class="table table-striped bg-white" style="width:100%;">
                                            <tbody>
                                                <tr class="border-b-1">
                                                    <td class="col-nombre pl-2">
                                                        <div class="flex justify-between">
                                                            <p class="text-left">
                                                                Estimación <?php echo e($estimacion->numero_estimacion); ?>

                                                                <?php if(strpos($estimacion->nombre, ' ') != false): ?>
                                                                y finiquito
                                                                <?php endif; ?>
                                                            </p>
                                                            <div x-show="!show" class="flex down-simbolo">
                                                                <img class="___class_+?592___" src="<?php echo e(asset('image/down.svg')); ?>" alt="Workflow">
                                                            </div>
                                                            <div x-show="show" class="flex up-simbolo">
                                                                <img class="___class_+?594___" src="<?php echo e(asset('image/up.svg')); ?>" alt="Workflow">
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td class="col-estado">
                                                        <div class="flex justify-center my-2">
                                                            <?php if($estimacion->factura_estimacion == 1 && $estimacion->caratula_estimacion == 1 && $estimacion->presupuesto_estimacion == 1 && $estimacion->cuerpo_estimacion == 1 && $estimacion->numero_generadores_estimacion == 1 && $estimacion->resumen_estimacion == 1 && $estimacion->estado_cuenta_estimacion == 1 && $estimacion->croquis_ilustrativo_estimacion == 1 && $estimacion->reporte_fotografico_estimacion == 1 && $estimacion->notas_bitacora == 1): ?>
                                                            <img class="___class_+?597___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                                            <?php else: ?>
                                                            <img class="___class_+?598___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </button>
                                </div>
                                <div x-show="show" class="border-l-1 border-t-1 border-r-1 mb-2">
                                    <table class="table table-striped bg-white" style="width:100%;">
                                        <tbody>
                                            <tr class="border-b-1">
                                                <td class="col-nombre pl-6">
                                                    <p class="text-left">
                                                        Factura de la estimación
                                                    </p>
                                                </td>
                                                <td class="col-estado">
                                                    <div class="flex justify-center my-2">
                                                        <?php switch($estimacion -> factura_estimacion):
                                                        case (1): ?>
                                                        <img class="___class_+?606___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                                        <?php break; ?>
                                                        <?php case (3): ?>
                                                        <img class="___class_+?607___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                                        <?php break; ?>
                                                        <?php default: ?>
                                                        <img class="___class_+?608___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                                        <?php endswitch; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="border-b-1">
                                                <td class="col-nombre pl-6">
                                                    <p class="text-left">
                                                        Presupuesto de la estimación
                                                    </p>
                                                </td>
                                                <td class="col-estado">
                                                    <div class="flex justify-center my-2">
                                                        <?php switch($estimacion -> presupuesto_estimacion):
                                                        case (1): ?>
                                                        <img class="___class_+?614___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                                        <?php break; ?>
                                                        <?php case (3): ?>
                                                        <img class="___class_+?615___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                                        <?php break; ?>
                                                        <?php default: ?>
                                                        <img class="___class_+?616___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                                        <?php endswitch; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="border-b-1">
                                                <td class="col-nombre pl-6">
                                                    <p class="text-left">
                                                        Carátula de estimación
                                                    </p>
                                                </td>
                                                <td class="col-estado">
                                                    <div class="flex justify-center my-2">
                                                        <?php switch($estimacion -> caratula_estimacion):
                                                        case (1): ?>
                                                        <img class="___class_+?622___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                                        <?php break; ?>
                                                        <?php case (3): ?>
                                                        <img class="___class_+?623___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                                        <?php break; ?>
                                                        <?php default: ?>
                                                        <img class="___class_+?624___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                                        <?php endswitch; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="border-b-1">
                                                <td class="col-nombre pl-6">
                                                    <p class="text-left">
                                                        Cuerpo de estimación
                                                    </p>
                                                </td>
                                                <td class="col-estado">
                                                    <div class="flex justify-center my-2">
                                                        <?php switch($estimacion -> cuerpo_estimacion):
                                                        case (1): ?>
                                                        <img class="___class_+?630___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                                        <?php break; ?>
                                                        <?php case (3): ?>
                                                        <img class="___class_+?631___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                                        <?php break; ?>
                                                        <?php default: ?>
                                                        <img class="___class_+?632___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                                        <?php endswitch; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="border-b-1">
                                                <td class="col-nombre pl-6">
                                                    <p class="text-left">
                                                        Resumen de estimación
                                                    </p>
                                                </td>
                                                <td class="col-estado">
                                                    <div class="flex justify-center my-2">
                                                        <?php switch($estimacion -> resumen_estimacion):
                                                        case (1): ?>
                                                        <img class="___class_+?638___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                                        <?php break; ?>
                                                        <?php case (3): ?>
                                                        <img class="___class_+?639___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                                        <?php break; ?>
                                                        <?php default: ?>
                                                        <img class="___class_+?640___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                                        <?php endswitch; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="border-b-1">
                                                <td class="col-nombre pl-6">
                                                    <p class="text-left">
                                                        Estado de cuenta de estimación
                                                    </p>
                                                </td>
                                                <td class="col-estado">
                                                    <div class="flex justify-center my-2">
                                                        <?php switch($estimacion -> estado_cuenta_estimacion):
                                                        case (1): ?>
                                                        <img class="___class_+?646___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                                        <?php break; ?>
                                                        <?php case (3): ?>
                                                        <img class="___class_+?647___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                                        <?php break; ?>
                                                        <?php default: ?>
                                                        <img class="___class_+?648___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                                        <?php endswitch; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="border-b-1">
                                                <td class="col-nombre pl-6">
                                                    <p class="text-left">
                                                        Número generadores de estimación
                                                    </p>
                                                </td>
                                                <td class="col-estado">
                                                    <div class="flex justify-center my-2">
                                                        <?php switch($estimacion -> numero_generadores_estimacion):
                                                        case (1): ?>
                                                        <img class="___class_+?654___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                                        <?php break; ?>
                                                        <?php case (3): ?>
                                                        <img class="___class_+?655___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                                        <?php break; ?>
                                                        <?php default: ?>
                                                        <img class="___class_+?656___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                                        <?php endswitch; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="border-b-1">
                                                <td class="col-nombre pl-6">
                                                    <p class="text-left">
                                                        Corquis de localización de estimación
                                                    </p>
                                                </td>
                                                <td class="col-estado">
                                                    <div class="flex justify-center my-2">
                                                        <?php switch($estimacion -> croquis_ilustrativo_estimacion):
                                                        case (1): ?>
                                                        <img class="___class_+?662___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                                        <?php break; ?>
                                                        <?php case (3): ?>
                                                        <img class="___class_+?663___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                                        <?php break; ?>
                                                        <?php default: ?>
                                                        <img class="___class_+?664___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                                        <?php endswitch; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="border-b-1">
                                                <td class="col-nombre pl-6">
                                                    <p class="text-left">
                                                        Soporte fotográfico de estimación
                                                    </p>
                                                </td>
                                                <td class="col-estado">
                                                    <div class="flex justify-center my-2">
                                                        <?php switch($estimacion -> reporte_fotografico_estimacion):
                                                        case (1): ?>
                                                        <img class="___class_+?670___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                                        <?php break; ?>
                                                        <?php case (3): ?>
                                                        <img class="___class_+?671___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                                        <?php break; ?>
                                                        <?php default: ?>
                                                        <img class="___class_+?672___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                                        <?php endswitch; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="border-b-1">
                                                <td class="col-nombre pl-6">
                                                    <p class="text-left">
                                                        Notas de bitácora
                                                    </p>
                                                </td>
                                                <td class="col-estado">
                                                    <div class="flex justify-center my-2">
                                                        <?php switch($estimacion -> notas_bitacora):
                                                        case (1): ?>
                                                        <img class="___class_+?678___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                                        <?php break; ?>
                                                        <?php case (3): ?>
                                                        <img class="___class_+?679___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                                        <?php break; ?>
                                                        <?php default: ?>
                                                        <img class="___class_+?680___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                                        <?php endswitch; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="bg-gray-100 mt-4">
                    <h2 class="font-semibold text-base text-center">Terminación de los trabajos</h2>
                </div>
                <div class="grid sm:grid-cols-8 gap-x-8">
                    <div class="sm:col-span-4">
                        <table class="table table-striped bg-white mt-2" style="width:100%;">
                            <tbody>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?688___">Presupuesto definitivo</p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('contrato')->presupuesto_definitivo):
                                            case (1): ?>
                                            <img class="___class_+?691___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?692___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?693___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?696___">
                                            Actas de entrega de recepción fisica de los trabajos del contratista al
                                            municipio
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('contrato')->acta_entrega_contratista):
                                            case (1): ?>
                                            <img class="___class_+?699___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?700___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?701___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?704___">
                                            Actas de entrega de recepción fisica de los trabajos del municipio a los
                                            beneficiarios
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('contrato')->acta_entrega_municipio):
                                            case (1): ?>
                                            <img class="___class_+?707___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?708___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?709___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="sm:col-span-4">
                        <table class="table table-striped bg-white sm:mt-2" style="width:100%;">
                            <tbody>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?714___">
                                            Acta de extinción de derechos y obligaciones
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('contrato')->acta_extincion):
                                            case (1): ?>
                                            <img class="___class_+?717___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?718___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?719___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?722___">
                                            Aviso de terminación de la obra por parte del contratista
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('contrato')->aviso_terminacion_obra):
                                            case (1): ?>
                                            <img class="___class_+?725___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?726___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?727___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="border-b-1">
                                    <td class="col-nombre pl-2">
                                        <p class="___class_+?730___">
                                            Sabana de finiquito
                                        </p>
                                    </td>
                                    <td class="col-estado">
                                        <div class="flex justify-center my-2">
                                            <?php switch($obj_obra->get('contrato')->saba_finiquito):
                                            case (1): ?>
                                            <img class="___class_+?733___" src="<?php echo e(asset('image/Bien.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php case (3): ?>
                                            <img class="___class_+?734___" src="<?php echo e(asset('image/NA.svg')); ?>" alt="Workflow">
                                            <?php break; ?>
                                            <?php default: ?>
                                            <img class="___class_+?735___" src="<?php echo e(asset('image/Mal.svg')); ?>" alt="Workflow">
                                            <?php endswitch; ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function() {

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
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Nueva carpeta (2)\CMR\Sistema\cmr_app\resources\views/obra/show.blade.php ENDPATH**/ ?>