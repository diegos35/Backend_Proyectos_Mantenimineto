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
        DB::table('listas_elementos')->truncate();
        $this->agregarMetodoDepreciación();//Número del id del tipo = 1
        $this->agregarTipoDepreciacion();//Número del id del tipo = 2
        $this->agregarEstadoActivoFijo();//Número del id del tipo = 3
	    $this->agregarUnidadCompra();//Número del id del tipo = 4
        $this->agregarMarcas();//Número del id del tipo  = 5
        $this->agregarTipoDocumento();//Número del id del tipo  = 6
        $this->agregarTipoGenero(); //Número del id del tipo  = 7
	// Variable para detectar la hora fin
        $tiempo_fin = microtime(true);
        // Cálculo para determinar el tiempo de ejecución
        echo "\nTiempo de ejecución: ".round($tiempo_fin - $tiempo_inicio,2)." segundos\n\n";        

    }
     /**
     * Método para ejecutar los inserts de los tipos de método de depreciación.
     *           Los tipos de depreciación van desde el 1 al 3 con registros efectivos
     *           y desde el  4 al 10  para registros nuevos
     *           
     * @return void
     */
    public function agregarMetodoDepreciación() {
        $output = new ConsoleOutput();
        $output->writeln(' :Procesando los tipos de método de depreciación:.' );
        /* id del tipo de lista  método de depreciación" */
        $idLista = 1;
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 1,
                'nombre' => 'Lineal',
                'descripcion' => 'Lineal',
                'lista_tipo_id'=> $idLista,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 2,
                'nombre' => 'Regresivo decreciente',
                'descripcion' => 'Regresivo decreciente',
                'lista_tipo_id' => $idLista,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 3,
                'nombre' => 'Regresivo creciente',
                'descripcion' => 'Regresivo creciente',
                'lista_tipo_id'=>$idLista,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $output->writeln(' :Elementos tipos de método de depreciación creados o actualizados satisfactoriamente:.');

    }

    /**
     * Método para ejecutar los inserts de los tipos de depreciación.
     *           Los tipos de  depreciación van desde el 11 al 25 con registros efectivos
     *           y desde el  26 al 35  para registros nuevos
     * @return void
     */
    public function agregarTipoDepreciacion() {
        $output = new ConsoleOutput();
        $output->writeln(' :Procesando los tipos de depreciación:.' );
        /* id del tipo de lista tipo de depreciación" */
        $idLista = 2;
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 11,
                'nombre' => 'Edificaciones',
                'descripcion' => 'Edificaciones',
                'lista_tipo_id'=>$idLista,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 12,
                'nombre' => 'Embalses, Represas y Canales- Obras Civiles',
                'descripcion' => 'Embalses, Represas y Canales- Obras Civiles',
                'lista_tipo_id'=>$idLista,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 13,
                'nombre' => 'Embalses, Represas y Canales-Obras Control',
                'descripcion' => 'Embalses, Represas y Canales-Obras Control',
                'lista_tipo_id'=>$idLista,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 14,
                'nombre' => 'Generacion, Transmision, Produccion y Tratamiento',
                'descripcion' => 'Generacion, Transmision, Produccion y Tratamiento',
                'lista_tipo_id'=>$idLista,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 15,
                'nombre' => 'Torres, Postes y Accesorios',
                'descripcion' => 'Torres, Postes y Accesorios',
                'lista_tipo_id'=>$idLista,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 16,
                'nombre' => 'Redes, lineas y Cables aereos y sus accesorios',
                'descripcion' => 'Redes, lineas y Cables aereos y sus accesorios',
                'lista_tipo_id'=>$idLista,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 17,
                'nombre' => 'Plantas y Ductos',
                'descripcion' => 'Plantas y Ductos',
                'lista_tipo_id'=>$idLista,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 18,
                'nombre' => 'Maquinaria y Equipo',
                'descripcion' => 'Maquinaria y Equipo',
                'lista_tipo_id'=>$idLista,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 19,
                'nombre' => 'Barcos, Trenes, aviones y maquinaria',
                'descripcion' => 'Barcos, Trenes, aviones y maquinaria',
                'lista_tipo_id'=>$idLista,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 20,
                'nombre' => 'Equipo Medico y Cientifico',
                'descripcion' => 'Equipo Medico y Cientifico',
                'lista_tipo_id'=>$idLista,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 21,
                'nombre' => 'Muebles, Enseres y Equipos de Oficina',
                'descripcion' => 'Muebles, Enseres y Equipos de Oficina',
                'lista_tipo_id'=>$idLista,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 22,
                'nombre' => 'Equipo de Comunicacion y Accesorios',
                'descripcion' => 'Equipo de Comunicacion y Accesorios',
                'lista_tipo_id'=>$idLista,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 23,
                'nombre' => 'Equipo de Transporte, Traccion y Elevacion',
                'descripcion' => 'Equipo de Transporte, Traccion y Elevacion',
                'lista_tipo_id'=>$idLista,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 24,
                'nombre' => 'Equipo de Comedor, cocina, despensa y hoteler',
                'descripcion' => 'Equipo de Comedor, cocina, despensa y hoteler',
                'lista_tipo_id'=>$idLista,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
                'id' => 25,
                'nombre' => 'Equipos de Computacion y accesorios',
                'descripcion' => 'Equipos de Computacion y accesorios',
                'lista_tipo_id'=>$idLista,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        $output->writeln(' :Elementos tipos de depreciación creados o actualizados satisfactoriamente:.');
    }

    /**
     * Método para ejecutar los inserts de los estados de activos fijos.
     *           Los estados de activos fijos van desde el 36 al 40 con registros efectivos
     *           y desde el 41 al 49 para registros nuevos
     * @return void
     */
    public function agregarEstadoActivoFijo(){
        $output = new ConsoleOutput(); 
        $output->writeln(' :Procesando los estados de activos fijos:.' );
        /* id del tipo de lista estado de activos fijos" */
        $idLista = 3;
        DB::table('listas_elementos')->updateOrInsert([
            'id' => 36,
            'nombre' => 'Dado baja',
            'descripcion' => 'Dado baja	',
            'lista_tipo_id'=> $idLista,
            'activo' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ]   
        );   
        DB::table('listas_elementos')->updateOrInsert([
            'id' => 37,
            'nombre' => 'En bodega',
            'descripcion' => 'En bodega',
            'lista_tipo_id'=> $idLista,
            'activo' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ]   
        );
        DB::table('listas_elementos')->updateOrInsert([
            'id' => 38,
            'nombre' => 'En mantenimiento',
            'descripcion' => 'En mantenimiento',
            'lista_tipo_id'=> $idLista,
            'activo' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ]   
        );
        DB::table('listas_elementos')->updateOrInsert([
            'id' => 39,
            'nombre' => 'En servicio',
            'descripcion' => 'En servicio',
            'lista_tipo_id'=> $idLista,
            'activo' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ]   
        );  
        DB::table('listas_elementos')->updateOrInsert([
            'id' => 40,
            'nombre' => 'No explotado',
            'descripcion' => 'No explotado',
            'lista_tipo_id'=> $idLista,
            'activo' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ]   
        );
        $output->writeln(' :Elementos estados de activos fijos creados o actualizados satisfactoriamente:.');
    }

    /** Método para ejecutar los insert de las unidades de compra
     * 
     */
    public function agregarUnidadCompra(){
	$output = new ConsoleOutput();
        $output->writeln(' :Procesando las unidades de compra:' );
        /* id del tipo de lista de unidad de compra" */
        $idLista = 4;

   	 DB::table('listas_elementos')->updateOrInsert([
            'id' => 50,
            'nombre' => 'Unidad',
            'descripcion' => 'Unidad',
            'lista_tipo_id'=> $idLista,
            'activo' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ]
    	);
	 DB::table('listas_elementos')->updateOrInsert([
            'id' => 52,
            'nombre' => 'Onza',
            'descripcion' => 'Onza',
            'lista_tipo_id'=> $idLista,
            'activo' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ]
    	);
	 DB::table('listas_elementos')->updateOrInsert([
            'id' => 53,
            'nombre' => 'Milimetro',
            'descripcion' => 'Milimetro',
            'lista_tipo_id'=> $idLista,
            'activo' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ]
        );

	$output->writeln(' :Elementos unidades de compra creados o actualzados satisfactoriamente: ');
    } 

	
    public function agregarMarcas(){
	$output = new ConsoleOutput();
        $output->writeln(' :Procesando las marcas:.' );
        /* id del tipo de lista de marca" */
        $idLista = 5;

   	 DB::table('listas_elementos')->updateOrInsert([
            'id' => 60,
            'nombre' => 'Samsung',
            'descripcion' => 'Samsung',
            'lista_tipo_id'=> $idLista,
            'activo' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ]
    	);
	
       	DB::table('listas_elementos')->updateOrInsert([
            'id' => 61,
            'nombre' => 'Toshiba',
            'descripcion' => 'Toshiba',
            'lista_tipo_id'=> $idLista,
            'activo' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ]
        );

	$output->writeln(' :Elementos marcas creados o actualzados satisfactoriamente: ');
    }

     /**
     * Metodo para ejecutar los inserts de los tipos de documentos.
     *           Los tipos de documentos van desde el 70 al 75 con registros efectivos
     *           y desde el 76 al 84 para registros nuevos
     * @return void
     */ 
    public function agregarTipoDocumento(){
        $output = new ConsoleOutput();
        $output->writeln(' :Procesando los tipos de documentos de indentificación:.' );
            /* id del tipo de lista de documento" */
            $idLista = 6;
            DB::table('listas_elementos')->updateOrInsert([
                'id' => 70,
                'nombre' => 'AS',
                'descripcion' => 'Adulto sin indentidad',
                'lista_tipo_id'=> $idLista,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                ]
            );
            DB::table('listas_elementos')->updateOrInsert([
                'id' => 71,
                'nombre' => 'RC',
                'descripcion' => 'Registro civil de nacimiento',
                'lista_tipo_id'=> $idLista,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                ]
            );
            DB::table('listas_elementos')->updateOrInsert([
                'id' => 72,
                'nombre' => 'TI',
                'descripcion' => 'Tarjeta de identidad',
                'lista_tipo_id'=> $idLista,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                ]
            );
            DB::table('listas_elementos')->updateOrInsert([
                'id' => 73,
                'nombre' => 'CC',
                'descripcion' => 'Cédula de ciudadania',
                'lista_tipo_id'=> $idLista,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                ]
            );
            DB::table('listas_elementos')->updateOrInsert([
                'id' => 74,
                'nombre' => 'CE',
                'descripcion' => 'Cédula de extranjería',
                'lista_tipo_id'=> $idLista,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                ]
            );
            DB::table('listas_elementos')->updateOrInsert([
                'id' => 75,
                'nombre' => 'NIT',
                'descripcion' => 'NIT',
                'lista_tipo_id'=> $idLista,
                'activo' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                ]
            );

        $output->writeln(' :Elementos tipos de documentos creados o actualzados satisfactoriamente: ');
        }
    
    /**
     * Metodo para ejecutar los inserts de los tipos de genero.
     *           Los tipos de genero van desde el 85 al  con registros efectivos
     *           y desde el 76 al 84 para registros nuevos
     * @return void
     */ 
    public  function agregarTipoGenero(){
        $output = new ConsoleOutput();
        $output->writeln(' :Procesando los tipos de generos:.' );
        /* id del tipo de genero" */
        $idLista = 7;

        DB::table('listas_elementos')->updateOrInsert([
            'id' =>  85,
            'nombre'=>'Femenino',
            'descripcion'=>'Femenino',
            'lista_tipo_id'=>$idLista,
            'activo' => 1,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            ]
        );
        DB::table('listas_elementos')->updateOrInsert([
            'id' =>  86,
            'nombre'=>'Masculino',
            'descripcion'=>'Masculino',
            'lista_tipo_id'=>$idLista,
            'activo' => 1,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            ]
        );

    $output->writeln(' :Elementos tipos de genero creados o actualzados satisfactoriamente: ');
    }
}
