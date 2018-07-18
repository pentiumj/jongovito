<?php

require_once '../app/rutas.php';
sesion::init();

class productos extends modelo{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function agregar($nombre){
        
            $args = func_get_args();
            $this->escaparCaracteres($args);
            
            $sql = "INSERT INTO productos VALUES('', '$args[0]')";
            //echo $sql;
            $result = $this->_db->query($sql);
                        
            if ($this->_db->error ){
                return "Error: ".$this->_db->error;
            }else{  
                return 1;
            }
            
        
    }
    
    public function listar(){
        
        $sql = "SELECT nombre, sum(oferentes_productos.cantidad) AS contar from productos"
                . " JOIN oferentes_productos ON productos.id = oferentes_productos.producto_id"
                . " WHERE estado=1"
                . " group by nombre having contar"
                . " order by contar DESC";
        
        $result = $this->_db->query($sql);
        
        if ($this->_db->error ){
             return "Error: ".$this->_db->error;
         }
         else{

             if($result = $this->_db->query($sql)){
                 $i=0;
                 $row2 = array();
                 while($row = $result->fetch_assoc()){
                     
                     $row2[] = array(
                         "id"=>++$i, 
                         "nombre" => $row['nombre'],
                         "contar" => $row['contar']
                          );
                     

                 }
                 return $row2;    
             }
             else{
                 return 0;
             }
         }
        
    }
    
    public function listarTodos(){
        
        $sql = "SELECT nombre from productos ORDER BY nombre";
        
        $result = $this->_db->query($sql);
        
        if ($this->_db->error ){
             return "Error: ".$this->_db->error;
         }
         else{

             if($result = $this->_db->query($sql)){
                 $i=0;
                 $row2 = array();
                 while($row = $result->fetch_assoc()){
                     
                     $row2[] = array(
                         "id"=>++$i, 
                         "nombre" => $row['nombre']
                          );
                     

                 }
                 return $row2;    
             }
             else{
                 return 0;
             }
         }
        
    }
    
    public function consultar($producto){
        
            $arg = $this->_db->real_escape_string($producto);
            
            $sql = "SELECT * from productos where nombre like '%".$arg."%'";
            //echo
            $result = $this->_db->query($sql);

            while ($row = $result->fetch_assoc())
            {
		$row["nombre"]=stripslashes($row["nombre"]);
		$productos[] = $row["nombre"];
            }
                                    
            if ($this->_db->error ){
                return "Error: ".$this->_db->error;
            }else{  
                return $productos;
            }
            
        
    }
    
    public function existe($nombre){
        
        $args = func_get_args();
        $this->escaparCaracteres($args);

        $sql = "SELECT * FROM productos WHERE nombre like '%$args[0]%'";
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
    
    function escaparCaracteres(&$args){    
        for ($i = 0; $i < count($args); $i++) {
            
            $args[$i] = $this->_db->real_escape_string($args[$i]);
            
        }
    }
    
}


