<?php
namespace App;

class Property extends ActiveRecord {

    protected static $table = 'properties';
    protected static $dbColumns = ['id','title','price','image','description','rooms','bathrooms','garages','seller_id','created_at'];

    public $id;
    public $title;
    public $price;
    public $image;
    public $description;
    public $rooms;
    public $bathrooms;
    public $garages;
    public $seller_id;
    public $created_at;

    function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->title = $args['title'] ?? '';
        $this->price = $args['price'] ?? '';
        $this->image = $args['image'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->rooms = $args['rooms'] ?? '';
        $this->bathrooms = $args['bathrooms'] ?? '';
        $this->garages = $args['garages'] ?? '';
        $this->seller_id = $args['seller_id'] ?? '';
        $this->created_at = date('Y/m/d');
    }

    public function validate(){
        if(!$this->title){
            self::$errors[] = 'Please enter title';
          }
        if(!$this->price){
        self::$errors[] = 'Please enter price';
        }
        if(strlen($this->description) < 50){
        self::$errors[] = 'Please enter description min 50 characters';
        }
        if(!$this->rooms){
        self::$errors[] = 'Please enter rooms';
        }
        if(!$this->bathrooms){
        self::$errors[] = 'Please enter bathrooms';
        }
        if(!$this->garages){
        self::$errors[] = 'Please enter garages';
        }
        if(!$this->seller_id){
        self::$errors[] = 'Please select the seller';
        }
        if(!$this->image){
         self::$errors[] = "Please Upload an image";
        }
    return self::$errors;
    }

}