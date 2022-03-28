<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('status_indicacoes')->insert(array(
            [
             'id'=> 1,   
            'descricao' => 'INICIADA'
            ],
        [
            'id'=> 2, 
            'descricao' => 'EM PROCESSO'
        ],
        [
            'id'=> 3, 
            'descricao' => 'FINALIZADA'
        ]
        ));

        DB::table('users')->insert(array(
            [
            'name'=> 'admin',   
            'email' => 'admin@admin.com.br',
            'password' => md5('123456')
            ]
        ));
    }
}
