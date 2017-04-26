<?php    public function update() {
        
        global $database;
        
       
        $properties = $this->properties();
        $properties_pairs = array();
        
        foreach($properties as $key => $value) {
            
            $properties_pairs[] = "$key='$value'"; 
        }
        
        
        $sql = "UPDATE " . self::$db_table . " SET ";
        $sql .= implode("," , $properties_pairs);
        $sql .= " WHERE id = " . $database->escape_string($this->id);
        
        $database->query($sql);
        
        return(mysqli_affected_rows($database->connection)==1) ? true: false;
        
    }

?>