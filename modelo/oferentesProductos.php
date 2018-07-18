<?php

require_once '../app/rutas.php';
sesion::init();

class oferentesProductos extends modelo{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function agregar($oferente_id, $producto_id, $cantidad, $fecha){
        
        $args = func_get_args();
        $this->escaparCaracteres($args);

        $sql = "INSERT INTO oferentes_productos VALUES('', $args[0], $args[1], $args[2], '$args[3]', 1)";
        //echo $sql;
        $result = $this->_db->query($sql);

        if ($this->_db->error ){
            return "Error: ".$this->_db->error;
        }else{  
            return 1;
        }
       
    }
    
    public function consultar($entregado=null){
        
        if($entregado != true){
            $estado = 1;
        }
        else{
            $estado = 0;
        }
        
        $sql = "SELECT oferentes_productos.producto_id AS producto_id, YEAR(fecha) AS anio,"
                . " oferente_id AS identificacion, nombres, apellidos, celular,"
                . " productos.nombre AS producto, SUM(cantidad) AS cantidad, SUM(cantidad)*2 AS cantidad2, DATE(oferentes_productos.fecha) AS fecha"
                . " FROM oferentes_productos JOIN productos ON oferentes_productos.producto_id = productos.id"
                . " JOIN oferentes ON oferentes.identificacion = oferentes_productos.oferente_id"
                . " WHERE estado=$estado GROUP BY identificacion, producto, anio ORDER BY apellidos";
        //echo $sql;
        
        
        if ($this->_db->error ){
            return "Error: ".$this->_db->error;
        }
        else{
            
            if($result = $this->_db->query($sql)){

                $i=0;
                 $row2 = array();
                 while($row = $result->fetch_assoc()){
                     
                     if($entregado != true){
                     $row2[] = array(
                         "id"=>++$i, 
                         "identificacion" => $row['identificacion'],
                         "nombres" => $row['nombres'],
                         "apellidos" => $row['apellidos'],
                         "celular" => $row['celular'],
                         "producto" => $row['producto'],
                         "cantidad" => $row['cantidad'],
                         "cantidad2" => $row['cantidad2'],
                         "fecha" => $row['fecha'],
                         "check" => "<center><a href=# onclick='actualizar(" . $row['identificacion'] . "," . $row['producto_id'] . "," . $row['anio'] . ")'><img class=eliminar src='img/visto.png' /></a></center>",
                         "imagen" => "<center><a href=# onclick='ira(" . $row['identificacion'] . "," . $row['producto_id'] . "," . $row['anio'].  ")'><img class=eliminar src='img/eliminar.png' /></a></center>"
                          );
                     }
                     else{
                     
                     $row2[] = array(
                         "id"=>++$i, 
                         "identificacion" => $row['identificacion'],
                         "nombres" => $row['nombres'],
                         "apellidos" => $row['apellidos'],
                         "celular" => $row['celular'],
                         "producto" => $row['producto'],
                         "cantidad" => $row['cantidad'],
                         "cantidad2" => $row['cantidad2'],
                         "fecha" => $row['fecha'],
                        );
                     }
                     

                 }
                 return $row2;   
            }
            else{
                return 0;
            }
        }
        
        
    }
    
    public function existe($identificacion, $anio){
        
        $args = func_get_args();
        $this->escaparCaracteres($args);
        //Ver si existe un producto ofrendado el año actual por un ofrendante
        $sql = "SELECT * FROM oferentes_productos WHERE oferente_id = $args[0] and YEAR(fecha) like '$args[1]'";
        //echo $sql;
        $result = $this->_db->query($sql);
              
        if ($this->_db->error ){
            return "Error: ".$this->_db->error;
        }
        else{
            if($result->num_rows > 0){
                return  $result->fetch_assoc();
            }
            else{
                return 0;
            }
        }
    }
    
    public function eliminar($oferente_id, $producto_id, $anio){
        
        $args = func_get_args();
        $this->escaparCaracteres($args);
        
        $sql = "DELETE FROM oferentes_productos WHERE oferente_id = ". $args[0] . " and producto_id =" . $args[1] . " and YEAR(fecha) =" . $args[2];
        //echo $sql;
        $this->_db->query($sql);
        
        if ($this->_db->error ){
            return "Error: ".$this->_db->error;
        }
        else{
            return 1;
        }
        
    }
    
    public function actualizar($oferente_id, $producto_id, $anio){
        
        $args = func_get_args();
        $this->escaparCaracteres($args);
        
        $sql = "UPDATE oferentes_productos SET estado = 0 WHERE oferente_id = ". $args[0] . " and producto_id =" . $args[1] . " and YEAR(fecha) =" . $args[2];
        $this->_db->query($sql);
        
        if ($this->_db->error ){
            return "Error: ".$this->_db->error;
        }
        else{
            return 1;
        }
        
    }
    
    
    function escaparCaracteres(&$args){    
        for ($i = 0; $i < count($args); $i++) {
            
            $args[$i] = $this->_db->real_escape_string($args[$i]);
            
        }
    }
}

