<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Output\ConsoleOutput;

class ListaElementoSeeder extends Seeder
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
        $output->writeln('Procesando seeder de los elementos de las listas' );
        $output->writeln('******************************************************' );
        $this->agregarMetodoDepreciación();//Número del id del tipo = 1

        // Variable para detectar la hora fin
        $tiempo_fin = microtime(true);
        // Cálculo para determinar el tiempo de ejecución
        echo "\nTiempo de ejecución: ".round($tiempo_fin - $tiempo_inicio,2)." segundos\n\n";        

    }
     /**
     * @abstract Metodo para ejecutar los inserts de los tipos de método de depreciación.
     *           Los tipos de método de depreciación van desde el 1 al 3 con registros efectivos
     *           
     * @return void
     */
    public function agregarMetodoDepreciación() {
        $output = new ConsoleOutput();
        $output->writeln(' :Procesando los tipos de método de depreciación:.' );
        /* id del tipo de listos tipos de método de depreciación" */
        $idLista = 1;
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 1,
                'nombre' => 'Lineal',
                'descripcion' => 'Lineal',
                'prv_lista_tipo_id'=>$idLista,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 2,
                'nombre' => 'Regresivo decreciente',
                'descripcion' => 'Regresivo decreciente',
                'prv_lista_tipo_id'=>$idLista,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 3,
                'nombre' => 'Regresivo creciente',
                'descripcion' => 'Regresivo creciente',
                'prv_lista_tipo_id'=>$idLista,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $output->writeln(' :Elementos tipos de método de depreciación creados o actualizados satisfactoriamente:.');

    }


    public function agregarTipoDepreciacion() {
        $output = new ConsoleOutput();
        $output->writeln(' :Procesando los tipos de depreciación:.' );
        /* id del tipo de listos tipos de depreciación" */
        $idLista = 78;
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 38960,
                'nombre' => 'Edificaciones',
                'descripcion' => 'Edificaciones',
                'prv_lista_tipo_id'=>$idLista,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 38961,
                'nombre' => 'Embalses, Represas y Canales- Obras Civiles',
                'descripcion' => 'Embalses, Represas y Canales- Obras Civiles',
                'prv_lista_tipo_id'=>$idLista,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elemtos')->updateOrInsert([
                'id' => 38962,
                'nombre' => 'Embalses, Represas y Canales-Obras Control',
                'descripcion' => 'Embalses, Represas y Canales-Obras Control',
                'prv_lista_tipo_id'=>$idLista,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elemtos')->updateOrInsert([
                'id' => 38963,
                'nombre' => 'Generacion, Transmision, Produccion y Tratamiento',
                'descripcion' => 'Generacion, Transmision, Produccion y Tratamiento',
                'prv_lista_tipo_id'=>$idLista,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elemtos')->updateOrInsert([
                'id' => 38964,
                'nombre' => 'Torres, Postes y Accesorios',
                'descripcion' => 'Torres, Postes y Accesorios',
                'prv_lista_tipo_id'=>$idLista,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 38965,
                'nombre' => 'Redes, lineas y Cables aereos y sus accesorios',
                'descripcion' => 'Redes, lineas y Cables aereos y sus accesorios',
                'prv_lista_tipo_id'=>$idLista,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 38966,
                'nombre' => 'Plantas y Ductos',
                'descripcion' => 'Plantas y Ductos',
                'prv_lista_tipo_id'=>$idLista,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 38967,
                'nombre' => 'Maquinaria y Equipo',
                'descripcion' => 'Maquinaria y Equipo',
                'prv_lista_tipo_id'=>$idLista,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 38968,
                'nombre' => 'Barcos, Trenes, aviones y maquinaria',
                'descripcion' => 'Barcos, Trenes, aviones y maquinaria',
                'prv_lista_tipo_id'=>$idLista,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 38969,
                'nombre' => 'Equipo Medico y Cientifico',
                'descripcion' => 'Equipo Medico y Cientifico',
                'prv_lista_tipo_id'=>$idLista,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 38970,
                'nombre' => 'Muebles, Enseres y Equipos de Oficina',
                'descripcion' => 'Muebles, Enseres y Equipos de Oficina',
                'prv_lista_tipo_id'=>$idLista,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elemtos')->updateOrInsert([
                'id' => 38971,
                'nombre' => 'Equipo de Comunicacion y Accesorios',
                'descripcion' => 'Equipo de Comunicacion y Accesorios',
                'prv_lista_tipo_id'=>$idLista,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 38972,
                'nombre' => 'Equipo de Transporte, Traccion y Elevacion',
                'descripcion' => 'Equipo de Transporte, Traccion y Elevacion',
                'prv_lista_tipo_id'=>$idLista,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 38973,
                'nombre' => 'Equipo de Comedor, cocina, despensa y hoteler',
                'descripcion' => 'Equipo de Comedor, cocina, despensa y hoteler',
                'prv_lista_tipo_id'=>$idLista,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 38974,
                'nombre' => 'Equipos de Computacion y accesorios',
                'descripcion' => 'Equipos de Computacion y accesorios',
                'prv_lista_tipo_id'=>$idLista,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        $output->writeln(' :Elementos tipos de depreciación creados o actualizados satisfactoriamente:.');
    }

}