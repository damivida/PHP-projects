<?php

class Db_object {
    
    //protected static $db_table = "users";
    
     public $upload_errors_array = array(

   UPLOAD_ERR_OK  => "There in no error",
   UPLOAD_ERR_INI_SIZE  => "The uploaded file exceeds the uplad_max_fielsize",       
   UPLOAD_ERR_FORM_SIZE =>"The uploaded file exceeds the MAX_FILE_SIZE directive",
   UPLOAD_ERR_PARTIAL =>"The upladed file was onliy pariall uploaded",
   UPLOAD_ERR_NO_FILE =>"No file was uploaded.",   
   UPLOAD_ERR_NO_TMP_DIR =>"Missing a temporary folder.",
   UPLOAD_ERR_CANT_WRITE =>"Failed to write file to disk",
   UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload."       
   ); 
    
    //QUERY METHODS
    
    
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
    
    
    
    
    
    
        
    //THE CRUD
    
    
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
    
    
    
    
    
    //FILE UPLOAD
    
    


    //This is passing $_FILES['uploaded_file'] as an argument
    public function set_file($file) {
        
        if(empty($file) || !$file || !is_array($file)) {
            
            $this->errors[] = "There was no file uploaded here";
            return false;
            
        }elseif($file['error'] !=0)  {
            
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
            
        } else {
            
            $this->user_image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
            
        }
        
    }
    
    
          //FILE PATH 
    public function picture_path() {
        
        return $this->upload_directory.DS.$this->user_image;
    }
    
     //MOVE  FILE TO DATA BASE    
   public function upload_photo() {
       

         if(!empty($this->errors)) {
           
             return false;
           }
        
           if (empty($this->user_image) || empty($this->tmp_path)) {
               
               $this->errors[] = "the file was not available";
               return false;
            }
        
            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;
        
        
            if (file_exists($target_path)) {
               
               $this->errors[] = "The file {$this->user_image} alredy exists";
               return false;
            }
        
             if (move_uploaded_file($this->tmp_path, $target_path)) {
               
                   unset($this->tmp_path);
                   return true;
               
                 } else {
                 
                 $this->errors[] = "the file directory probably does not have permision";
                   return false;
           
             }
            
         
    
    }
    
     //DELETE user_pic
    public function delete_user() {
        
        if($this->delete()) {
            
            $target_path = SITE_ROOT . DS .  'admin' . DS . $this->picture_path();
            
            return unlink($target_path) ? : false;
            
        } else {
            
            return false;
        }
        
    }
    
    
    //COUNT ALL
    
    public static function count_all() {
        
        global $database;
        
        $sql = "SELECT COUNT(*) AS TOTAL FROM " . static::$db_table;
        
        $result = $database->query($sql);
        $row = mysqli_fetch_assoc($result);
        
        return $row['TOTAL'];
        
    }
    
    
    
    
} //END OF Db_object

?>