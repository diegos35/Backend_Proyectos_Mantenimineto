<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Output\ConsoleOutput;

class ListaTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->tipoMetodoDepreciación();
        $this->tipoTipoDepreciacion(); 
    }

    public function tipoMetodoDepreciación(){

        //Instancia para enviar mensajes por consola
        $output = new ConsoleOutput();
        $output->writeln('Procesando seeder de los tipos de método de depreciación');
        DB::table('listas_tipos')->updateOrInsert([
            'id'                => '1',
            'nombre'            => 'Método de depreciación',
            'descripcion'       => 'Método utilizado en el proceso de depreciación del inventario',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);         
    }

    public function tipoTipoDepreciacion(){
        
        //Instancia para enviar mensajes por consola
        $output = new ConsoleOutput();
        $output->writeln('Procesando seeder de los tipos de depreciación');
        DB::table('listas_tipos')->updateOrInsert([
            'id'                => '2',
            'nombre'            => 'Tipo de depreciación',
            'descripcion'       => 'Tipo de depreciación que se aplicará sobre los activos fijos',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]); 
    }

}
