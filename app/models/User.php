<?php

class User extends \Phalcon\Mvc\Model
{
    public $email;
    private $password;

    public function initialize()
    {
        // Set table name
        $this->setSource("user");
    }

    public static function findByEmailAndPassword($email, $password){
        // Create password hash
        // $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        // exit($passwordHash);

        // Create query, bind parameters and resturn first result
        $user = self::query()
            ->where('email = :email:', [ 'email' => $email ])
            ->execute()
            ->getFirst();

        // Check password
        if(password_verify($password, $user->password)) {
            return $user;
        }
        
        return false;
    }

}