<?php
class config{
    private static $instance=null;
    public static function getConnexion(){
        if (!isset(self::$instance)){
            try{
                self::$instance = new PDO('mysql:host=localhost;dbname=atelierclub','root',"");
            }
            catch(Exception $e) {
                die('Message Erreur: '.$e->getMessage());
            }
        }
        return self::$instance;
    }
}
