<?php

require_once '../app/rutas.php';
sesion::init();

class usuarios extends modelo{
    
    public function __construct() {
        parent::__construct();
        
    }
    
    public function existe($cedula, $contrasena){
        
            $args = func_get_args();
            $this->escaparCaracteres($args);
            
            $sql = "SELECT * from usuarios where cedula =".$args[0]." and contrasena ='" .md5($args[1]). "'";
            //echo $sql;
            $result = $this->_db->query($sql);
                        
            if ($this->_db->error ){
                return "Error: ".$this->_db->error;
            }else{  
                if($result ->num_rows > 0){
                    return $result->fetch_assoc();
                }
                else{
                    return 0;
                }
            }
            
        
    }
    
    public function aContrasena($cedula,$contrasena){
        
        $args = func_get_args();
        $this->escaparCaracteres($args);
        
        $sql = "UPDATE usuarios SET contrasena ='". $args[1] . "' WHERE cedula = ". $args[0];
        $this->_db->query($sql);
        
        if ($this->_db->error ){
            return "Error: ".$this->_db->error;
        }
        else{
            return 1;
        }
        
    }
    
    public function escaparCaracteres(&$args){    
        for ($i = 0; $i < count($args); $i++) {
            
            $args[$i] = $this->_db->real_escape_string($args[$i]);
            
        }
    }
    
    
}


