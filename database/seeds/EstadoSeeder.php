<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
            'Activo',
            'Inactivo',
        ];
        foreach($estados as $key => $value){
            DB::table('estado')->insert([
                'nombre' => $value,
                
            ]);
        }
    }
}
