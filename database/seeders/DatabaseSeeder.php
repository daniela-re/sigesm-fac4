<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Recurso;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*  \App\Models\User::factory(10)->create();
        */
         // Admin
         User::create([
             'name' => 'Daniela Ramos',
             'email' => 'admin@uci.cu',
             'password' => Hash::make('12345678'),
             'rol' => 'Administrador',
         ]);
 
         // Asistente
         User::create([
             'name' => 'Gretel',
             'email' => 'gretel@uci.cu',
             'password' => Hash::make('12345678'),
             'rol' => 'Asistente',
         ]);
 
        // Sembrar datos ficticios
        
        Recurso::create([
            'categoria' => 'Computadoras',
            'cantidad' => 10,
            'disponibilidad' => 10,
            'sobrante' => false,
        ]);

        Recurso::create([
            'categoria' => 'Impresoras',
            'cantidad' => 5,
            'disponibilidad' => 5,
            'sobrante' => false,
        ]);


     }
}
