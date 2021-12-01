<?php

class DB
{
    private $container;
    private $pdo;

    public function __construct(Container $container)
    {
        $this->container = $container;    
        
        try 
        {
            $credentials = $this->container->Credentials()->GetDBCredentials();
            $dbname = $credentials['dbname'];
            $username = $credentials['username'];
            $password = $credentials['password'];

            $this->pdo = new PDO("mysql:host=localhost;dbname=$dbname",$username,$password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            error_log("PDO Connection Astablished", 0);
        }
        catch(PDOException $e)
        {
            throw new Exception("PDO Connection Error: ".$e->getMessage(), 1);
        }
    }
}

?>