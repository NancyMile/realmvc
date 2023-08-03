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

    public function validate(){
        if(!$this->email){
            self::$errors[] = 'Please enter email';
        }

        if(!$this->password){
            self::$errors[] = 'Please enter password';
        }

        return self::$errors;
    }

    public function verifyUserExists(){
        $query = "SELECT * FROM ". self::$table." WHERE email = '".$this->email."' LIMIT 1";
        $result = self::$db->query($query);
        //debugear($result);
        if(!$result->num_rows){
            self::$errors[] = 'User does not exist';
            return;
        }

        return $result;
    }

    public function verifyPassExists($result){
        $user = $result->fetch_object();
        //debugear($user);
        $authenticated = password_verify($this->password,$user->password); //returns true or false
        if(!$authenticated){
            self::$errors[] = "Invalid password.";
        }

        return $authenticated;
    }

    public function loginAuthUser(){
        session_start();
        //session array
        $_SESSION['user'] = $this->email;
        $_SESSION['login'] = true;

        header('location: /admin');
    }
}