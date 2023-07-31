<?php
 namespace App;

class Seller extends ActiveRecord {
    protected static $table = 'sellers';
    protected static $dbColumns = ['id','name','lastname','phone'];
    
    public $id;
    public $name;
    public $lastname;
    public $phone;

    function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->lastname = $args['lastname'] ?? '';
        $this->phone = $args['phone'] ?? '';
    }

    public function validate(){
        if(!$this->name){
            self::$errors[] = 'Please enter name';
        }

        if(!$this->lastname){
            self::$errors[] = 'Please enter lastname';
        }

        if(!$this->phone){
            self::$errors[] = 'Please enter phone';
        }

        if(!preg_match('/[0-9]{10}/',$this->phone)){
            self::$errors[] = 'Format is not valid';
        }

        return self::$errors;
    }
}
