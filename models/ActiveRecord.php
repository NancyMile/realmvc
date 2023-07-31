<?php

namespace App;

class ActiveRecord {
    //db attribute
    protected static $db;
    protected static $dbColumns = [];
    protected static $table = '';

    //errors
    protected static $errors = [];

    //connection to db
    public static function setDB($database){
        self::$db = $database;
    }

    public function saving(){
        if(!is_null($this->id)){
            $this->update();
        }else{
            $this->create();
        }
    }

    public  function update(){
        //sanitize the attributes
        $attributes = $this->sanitizeData();

        $values = [];
         foreach($attributes as $key => $value ){
            $values[] = "{$key} = '{$value}'";
         }

         $query = "UPDATE ". static::$table ." SET ";
         $query .= join(', ',$values);
         $query .= " WHERE id = '".self::$db->escape_string($this->id)."'";
         $query .= " LIMIT 1";

         $result = self::$db->query($query);
         if($result){
            // redirect to admin
            header('Location: /admin?result=2');
        }
    }
    public function create(){
        //echo "Saving table";

        //sanitize data
        $attributes = $this->sanitizeData();

        //save record on db
        $query = "INSERT INTO ". static::$table ." ( ";
        $query.= join(', ',array_keys($attributes));
        $query.= " )VALUES('";
        $query.= join("', '",array_values($attributes));
        $query.= "')";

        $result = self::$db->query($query);
        //debugear($result);
        if($result){
            //redirect user
            header('location: /admin?result=1');
        }
    }

    public function Delete(){
        $query = "DELETE FROM ". static::$table ." WHERE id = ".self::$db->escape_string($this->id)." LIMIT 1";
        $result = self::$db->query($query);
        if($result){
            $this->deleteImage();
            header('Location: /admin?result=3');
        }
    }

    //identify and map the attributes of the db
    public function attributes(){
        $attributes = [];
        foreach(static::$dbColumns as $column){
            if($column === 'id') continue;
            $attributes[$column] = $this->$column;
        }
        return $attributes;
    }

    public function sanitizeData(){
        $attributes = $this->attributes();
        $sanitized = [];
        foreach($attributes as $key => $value){
            $sanitized[$key] = self::$db->escape_string($value);
        }
        return $sanitized;
    }

    //validation
    public static function getErrors(){
        return static::$errors;
    }

    //set image
    public function setImage($image){
        //delete previous image
        if(!is_null($this->id)){
            $this->deleteImage();
        }
        //asignt to attribute imagen the name of the new image
        if($image){
            $this->image = $image;
        }
    }

    //delete image
    public function deleteImage(){
        //check if the image exist
        $imageExists = file_exists(IMAGES_FOLDER.$this->image);
        if($imageExists){
            unlink(IMAGES_FOLDER.$this->image);
        }
    }

    public function validate(){
        static::$errors =[];
        return static::$errors;
    }

    // get specific number of records
    public static function get($count){
        $query = "SELECT * FROM ".static::$table." LIMIT ".$count;
        $result = self::sqlQuery($query);
        return $result;
    }

    //list of all field of the etable
    public static function all(){
        $query = "SELECT * FROM ".static::$table;
        $result = self::sqlQuery($query);
        return $result;
    }

    //find a record by id
    public static function find($id){
        $query = "SELECT * FROM ". static::$table ." WHERE id = $id ";
        $result = self::sqlQuery($query);
        return array_shift($result); //return the first position of the array
    }

    public static function sqlQuery($query){
        //query db
        $result = self::$db->query($query);
        //debugear($result->fetch_assoc());

        //iterate results
        $array = [];
        while($record = $result->fetch_assoc()){
            $array[] = static::createObject($record);
        }
        //debugear($array);// now is an array of objects

        //free memory
        $result->free();
        //return results
        return $array;
    }

    public static function createObject($record){
        $object = new static; //instanciate from the class that is hereding 
        //debugear($object); //onject  with all the key empty

        foreach($record as $key => $value){
            if(property_exists($object,$key)){
                $object->$key = $value;  //if the prop exist asign the value
            }
        }

        //debugear($object); //object with the new values;
        return $object;
    }

    // sincronnise the object on memory with thechanges made by the user
    public function sincronnise( $args = [] ){
        foreach($args as $key => $value){
            if(property_exists($this,$key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
}