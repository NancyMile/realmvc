<?php
namespace Model;

class Admin extends ActiveRecord {

    //database
    protected static $table = 'users';
    protected static $dbColumns = ['id','email','password'];

    public $id;
    public $email;
    public $password;

    function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

}