<?php

class Db_object {
  
    //READ
   
    //FIND ALL
    public static function find_all() {
        
        $sql = "SELECT * FROM " . static::$db_table . " ";
        
        return static::find_query($sql);
    }
    
    
    //FIND ALL BY ID 
    public static function  find_by_id($id) {
        
        $sql = "SELECT * FROM " . static::$db_table . " WHERE id = $id LIMIT 1";
        
        $objectArray2 = static::find_query($sql);
        
        return !empty($objectArray2) ? array_shift($objectArray2) : false;
        
    }
    
    
    //FIND QUERY
     public static function find_query($sql) {
        
        global $database;
        
        $sqlResult = $database->query($sql);
        $objectArray= array();
        
      while($sqlRows = mysqli_fetch_assoc($sqlResult)) {
        $objectArray[] = static::instant($sqlRows); 
        }
        
        return $objectArray;
    }
     
    
    
    
    //INSTATINATION (DODJELJIVANJE VRIJEDNOSTI SVOJSTVIMA U KLASI)
    public static function instant($sqlRows){
        
        $calling_class = get_called_class();
        $object = new $calling_class;
        
        foreach($sqlRows as $key => $value) {
            
            if($object->find_key($key)) {
                $object->$key=$value;
            }
        }
        
        return $object;
    }
    
    
    
    //FIND KEYS IN PROPERTIES
    private function find_key($key) {
        
    $objectVars = get_object_vars($this);
    return array_key_exists($key,$objectVars);
        
    }
    
    
    
    
    //CREATE; UPDATE; DELETE
    
    
        //  CLASS VARIABLES
    public function properties() {
        
       
       $properties = array();
       
        foreach(static::$db_table_field as $db_field) {
            
            if(property_exists($this, $db_field)) {
                
                $properties[$db_field] = $this->$db_field;
            }
        }
        
        return $properties;
    }
    
    
    //CLASS VARIABLES CLEAN
    public function clean_properties() {
        
        
        global $database;
        
        $clean_properties = array();
        
        foreach($this->properties() as $key => $value) {
            
            $clean_properties[$key] = $database->escape_string($value);
        }
        
        return $clean_properties;
    }
    
    
    
    //CREATE
    public function create() {
        
        global $database;
        
        $properties = $this->clean_properties();
        
        $sql = "INSERT INTO " . static::$db_table . "(" . implode(',', array_keys($properties)) . ") ";
        $sql .= "VALUES ('" . implode("','", array_values($properties)) . "')" ;
        
        if($database->query($sql)) {
            
        $this->id = $database->insert_id();
            return true;
            
        } else {
            
            $database->confirm_query($result);
        }
    }
    
    
    //UPDATE
    public function update() {
        
        global $database;
        
        $properties = $this->clean_properties();
        $properties_pairs = array();
        
        foreach($properties as $key => $value) {
            
            $properties_pairs[] = "$key='$value'";
        }
        
        $sql = "UPDATE " . static::$db_table . " SET ";
        $sql .= implode("," , $properties_pairs);
        $sql .= " WHERE id = " . $database->escape_string($this->id);
     
        
        $database->query($sql);
        
        return(mysqli_affected_rows($database->connection)==1) ? true: false;
        
    } 
    
    
    
    //DELETE
    public function delete() {
    
      global $database;
    
      $id = $database->escape_string($this->id);
        
      $sql = "DELETE FROM " . static::$db_table . " WHERE id = $id ";
    
      if ($result=$database->query($sql)) {
        
       return true;
          
      }else {
        
        $database->confirm_query($result);
       
      }
   
    }
    
    
    //UPDATE OR CREATE
    public function save() {
        
        return(isset($this->id)) ? $this->update() : $this->create();
    }
    

    }
?>