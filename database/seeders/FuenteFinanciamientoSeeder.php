<?php

namespace Database\Seeders;

use App\Models\FuentesFinanciamiento;
use Illuminate\Database\Seeder;

class FuenteFinanciamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $fuente_financiamiento1 = new FuentesFinanciamiento();
        $fuente_financiamiento1->nombre_corto = "Ramo 28";
        $fuente_financiamiento1->nombre_largo = "Ramo 28";
        $fuente_financiamiento1->save();

        $fuente_financiamiento2 = new FuentesFinanciamiento();
        $fuente_financiamiento2->nombre_corto = "Fondo III";
        $fuente_financiamiento2->nombre_largo = "Ramo 33 Fondo III: Fondo de Aportaciones para la Infraestructura Social Municipal y de las Demarcaciones
        Territoriales del Distrito Federal";
        $fuente_financiamiento2->save();

        $fuente_financiamiento3 = new FuentesFinanciamiento();
        $fuente_financiamiento3->nombre_corto = "Fondo IV";
        $fuente_financiamiento3->nombre_largo = "Ramo 33 Fondo IV: Fondo de Aportaciones para el Fortalecimiento de los Municipios y de las Demarcaciones
        Territoriales del Distrito Federal";
        $fuente_financiamiento3->save();

        $fuente_financiamiento4 = new FuentesFinanciamiento();
        $fuente_financiamiento4->nombre_corto = "Convenios Federales";
        $fuente_financiamiento4->nombre_largo = "Convenios Federales";
        $fuente_financiamiento4->save();

        $fuente_financiamiento5 = new FuentesFinanciamiento();
        $fuente_financiamiento5->nombre_corto = "Convenios Estatales";
        $fuente_financiamiento5->nombre_largo = "Convenios Estatales";
        $fuente_financiamiento5->save();

        $fuente_financiamiento6 = new FuentesFinanciamiento();
        $fuente_financiamiento6->nombre_corto = "Convenios Particulares";
        $fuente_financiamiento6->nombre_largo = "Convenios Particulares";
        $fuente_financiamiento6->save();

        $fuente_financiamiento7 = new FuentesFinanciamiento();
        $fuente_financiamiento7->nombre_corto = "Recursos Fiscales y Propios";
        $fuente_financiamiento7->nombre_largo = "Recursos Fiscales y Propios";
        $fuente_financiamiento7->save();
    }
}
