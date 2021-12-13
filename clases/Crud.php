<?php 
    require_once "Conexion.php";
    class Crud{
        public function insertarDatos($datos){
            try{
                $conexion = Conexion::conectar();
                $coleccion = $conexion->personas;
                $resultado = $coleccion->insertOne([

                    "nombre" => $datos ['nombre'],
                    "paterno" => $datos ['paterno'],
                    "materno" => $datos ['materno'],
                    "fecha_nacimiento" => $datos ['fecha_nacimiento']
                ]);
                return $resultado;   
            }catch(\Throwable $th){
                return $th;
            }
        }
        public function mostrar(){
            try{
                $conexion = Conexion::conectar();
                $coleccion = $conexion->personas;
                $datos = $coleccion->find();
                return $datos;

            }catch(\Throwable $th){
                return $th;
            }        
        }

        public function obtenerDocumento($id){
            $conexion = Conexion::conectar();
            $coleccion = $conexion->personas;

            try{
                $datos = $coleccion->findOne(array('_id' => new MongoDB\BSON\objectId($id)));
                return $datos;
            }catch(\Throwable $th){
                return $th;
            }
        }

        //

        
        public function eliminar($id){
            try{
                $conexion = Conexion::conectar();
                $coleccion = $conexion->personas;
                $respuesta = $coleccion->deleteOne(array("_id" => new \MongoDB\BSON\ObjectID($id)));
                return $respuesta;
            }catch(\Throwable $th){
                return $th;
            }
        }

        public function actualizar($datos){
            try{
                $conexion = Conexion::conectar();
                $coleccion = $conexion->personas;
                $resultado = $coleccion->updateOne(
                    ["_id" => new MongoDB\BSON\ObjectID($datos['_id'])],

                    [
                        '$set' => [
                            "nombre" => $datos['nombre'],
                            "paterno" => $datos['paterno'],
                            "materno" => $datos['materno'],
                            "fecha_nacimiento" => $datos['fecha_nacimiento']

                        ],
                    ]
                );
                return $resultado;
            }catch(\Throwable $th){
                return $th;
            }
        }

        public function mensajesCrud($mensaje){
            $msg = ' ';
            if($mensaje == "insert"){
                $msg = 'swal("Excelente!", "Agreagdo con exito!" ,"success" );';
            }else if($mensaje == "update"){
                $msg = 'swal("Excelente!", "Actualizado con exito!" ,"danger" );';
            }else if($mensaje == "delete"){
                $msg = 'swal("Excelente!", "Eliminado con exito!" ,"warning" );';
            }
            return $msg;
        }


    }  
?>