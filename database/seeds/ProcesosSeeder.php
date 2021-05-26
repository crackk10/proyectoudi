<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProcesosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
            'Estacionado',
            'Peso Inicial',
            'Cargando',
            'Peso Final',
            'Atendido',
        ];
        foreach($estados as $key => $value){
            DB::table('proceso')->insert([
                'nombre' => $value,
            ]);
        }
    }
}
