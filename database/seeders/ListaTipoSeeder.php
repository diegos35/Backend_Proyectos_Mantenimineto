<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
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
        // Variable para detectar la hora de inicio
        $tiempo_inicio = microtime(true);

        //Instancia para enviar mensajes por consola
        $output = new ConsoleOutput();
        $output->writeln('Procesando seeder de los tipos de listas' );
        $output->writeln('******************************************************' );
        DB::table('listas_tipos')->truncate();
        $this->tipoMetodoDepreciación();
        $this->tipoTipoDepreciacion(); 
	    $this->estadoActivoFijo();
	    $this->unidadCompra();
        $this->marcas();
        $this->tipoDocumento();
        $this->tipoGenero();
        $this->tipoProducto();

         // Variable para detectar la hora fin
         $tiempo_fin = microtime(true);
         // Cálculo para determinar el tiempo de ejecución
         echo "\nTiempo de ejecución: ".round($tiempo_fin - $tiempo_inicio,2)." segundos\n\n";        
 
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
            ]
        );         
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
            ]
        ); 
    }

    public function estadoActivoFijo(){
    	$output = new ConsoleOutput();
    	$output->writeln('Procesando seeder estados de activos fijos');
	    DB::table('listas_tipos')->updateOrInsert([
                'id'		    => '3',
                'nombre'		=> 'Estado Activos Fijos',
                'descripcion'	=> 'Estados de activos fijos',
                'created_at'	=> date('Y-m-d H:i:s'),
                'updated_at'	=> date('Y-m-d H:i:s')  
            ]
        );
    }
    
    public function UnidadCompra(){
    	$output = new ConsoleOutput();
    	$output->writeln('Procesando seeder unidad de compra');
	    DB::table('listas_tipos')->updateOrInsert([
                'id'    		=> '4',
                'nombre'		=> 'Unidad de compra',
                'descripcion'	=> 'Unidad de compra',
                'created_at'	=> date('Y-m-d H:i:s'),
                'updated_at'	=> date('Y-m-d H:i:s')  
            ]
        );

    }
    
    public function marcas(){
    	$output = new ConsoleOutput();
    	$output->writeln('Procesando seeder para el tipo de lista marcas');
	    DB::table('listas_tipos')->updateOrInsert([
                'id'		    => '5',
                'nombre'		=> 'Marca',
                'descripcion'	=> 'Marca',
                'created_at'	=> date('Y-m-d H:i:s'),
                'updated_at'	=> date('Y-m-d H:i:s')  
            ]
        );
    }

    public function tipoDocumento(){

        $output = new ConsoleOutput();
        $output->writeln('Procesando seeder para el tipo de lista de documento');
        DB::table('listas_tipos')->updateOrInsert([
                'id'            => '6',
                'nombre'        => 'Tipo de documento',
                'descripcion'   => 'Tipo de documento',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ]
        );
    }


    private function tipoGenero(){
        $output = new ConsoleOutput();
        $output->writeln('Procesando seeder de los tipos de lista género');
        DB::table('listas_tipos')->updateOrInsert([
                'id'                => '7',
                'nombre'            => 'Género',
                'descripcion'       => 'Género',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ]
        );
    }

    private function tipoProducto(){
        $output = new ConsoleOutput();
        $output->writeln('Procesando seeder de los tipos de producto');
        DB::table('listas_tipos')->updateOrInsert([
                'id'                => '8',
                'nombre'            => 'Tipo de producto',
                'descripcion'       => 'Tipo de producto',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ]
        );
    }


}

