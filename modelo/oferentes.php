<?php

require_once '../app/rutas.php';
sesion::init();

class oferentes extends modelo{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function agregar($identificacion, $nombres, $apellidos, $celular){
        
            $args = func_get_args();
            $this->escaparCaracteres($args);
            
            $sql = "INSERT INTO oferentes VALUES('', $args[0], '$args[1]', '$args[2]', '$args[3]')";
            //echo $sql;
            $result = $this->_db->query($sql);
                        
            if ($this->_db->error ){
                return "Error: ".$this->_db->error;
            }else{  
                return 1;
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


