<?php

class ExceptionBD extends Exception{
    function __toString(){
        return '<strong>Erreur de connexion/Exception '.$this->getcode() .'</strong>'. $this->getMessage() 
        . '<br /> dans '. $this->getFile() .'en ligne' .$this->getline() .'<br />' ;
    }
}