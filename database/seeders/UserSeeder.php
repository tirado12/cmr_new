<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Luis";
        $user->email = "luis@gmail.com";
        $user->password = Crypt::encrypt('123456');
        $user->remember_token = Str::random(100);
        $user->save();
    }
}
