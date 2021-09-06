<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use App\Models\Cliente;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'name' => 'Juan',
            'email' => 'josese@gmail.com',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(100)
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Andy',
            'email' => 'antrick10@gmail.com',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(100)
        ])->assignRole('Administrador');
        User::create([
            'name' => 'carlos',
            'email' => 'carlos10@gmail.com',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(100)
        ])->assignRole('Administrador');

       /* $cliente= new Cliente();
        $cliente ->anio_inicio = 2020;
        $cliente ->anio_fin = 2022;
        $cliente ->logo = "modifica_el_logo";
        $cliente ->id_onesignal = 1;
        $cliente ->user_id = 1;
        $cliente ->municipio_id = 10;
        $cliente->save();*/
    }
}
