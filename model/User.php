<?php
class User {
    public $name;
    public $email;
    public $password;
    public $poblation;
    public $birthday;
    public $gender;
    public $preferences;
    public $photo;

    public function __construct($name = "", $email = "", $password = "", $poblation = "", $birthday = "", $gender = "", $preferences = [], $photo = "") {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->poblation = $poblation;
        $this->birthday = $birthday;
        $this->gender = $gender;
        $this->preferences = $preferences;
        $this->photo = $photo;
    }
}