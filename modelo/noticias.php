<?php

require_once '../app/rutas.php';
sesion::init();

class noticias extends modelo{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function agregar($autor, $titulo, $contenido){
        
            $args = func_get_args();
            $this->escaparCaracteres($args);
            
            $fecha = date("Y-m-d H:i:s");
            
            $sql = "INSERT INTO noticias VALUES('', '$args[0]' , '$args[1]' , '$args[2]', '$fecha')";
            //echo $sql;
            $result = $this->_db->query($sql);
                        
            if ($this->_db->error ){
                return "Error: ".$this->_db->error;
            }else{  
                return 1;
            }
            
        
    }
    
    public function mostrar(){
        
        $args = func_get_args();
        $this->escaparCaracteres($args);
        
        $sql = "SELECT * FROM noticias";
        //echo $sql;
        
        if($result = $this->_db->query($sql)){
            
            return $result;
            //return $row2;  
        }
        
        
    }
    
    public function actualizar($identificacion,$celular){
        
        $args = func_get_args();
        $this->escaparCaracteres($args);
        
        $sql = "UPDATE oferentes SET celular = '$celular' WHERE identificacion=$identificacion";
        //echo $sql;
        
        $this->_db->query($sql);
        
        if($this->_db->error){
            return "Error: ". $this->_db->error;
        }
        else{
            return 1;
        }
        
    }
    
    public function existe($identificacion){
        
        $args = func_get_args();
        $this->escaparCaracteres($args);

        $sql = "SELECT * FROM oferentes WHERE identificacion = $args[0]";
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


