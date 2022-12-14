<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => "Admin",
            'email' => "admin@qubitsolutionlab.com",
            'password' => Hash::make("pathok@2022")
        ]);

        User::create([
            'name' => "Motiur Rahaman",
            'email' => "memotiur@gmail.com",
            'password' => Hash::make("qubitdev@2022")
        ]);

        User::create([
            'name' => "Motiur Rahaman",
            'email' => "admin@gmail.com",
            'password' => Hash::make("qubitdev@2022")
        ]);

        User::create([
            'name' => "Mohiuddin Soel",
            'email' => "ashfaq@prothomalo.com",
            'password' => Hash::make("qubitdev@2022")
        ]);
    }
}
