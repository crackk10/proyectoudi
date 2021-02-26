<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Tipo_UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
            'Operativo',
            'Administrativo',
            'Consulta',
        ];
        foreach($estados as $key => $value){
            DB::table('tipo_usuario')->insert([
                'nombre' => $value,  
            ]);
        }
    }
}
