<?php
class ExceptionExtensionFile extends Exception
{
    function __toString()
    {
        return "ExceptionExtensionFichier " . $this->getCode()
            . ": " . $this->getMessage() . "<br />" . " in "
            . $this->getFile() . " on line " . $this->getLine()
            . "<br />";
    }
}

class ExceptionTailleFile extends Exception
{
    function __toString()
    {
        return "ExceptionTailleFichier " . $this->getCode()
            . ": " . $this->getMessage() . "<br />" . " in "
            . $this->getFile() . " on line " . $this->getLine()
            . "<br />";
    }
}

class ExceptionEnvoiFile extends Exception
{
    function __toString()
    {
        return "ExceptionEnvoiFichier " . $this->getCode()
            . ": " . $this->getMessage() . "<br />" . " in "
            . $this->getFile() . " on line " . $this->getLine()
            . "<br />";
    }
}

class ExceptionInsertion extends Exception
{
    function __toString()
    {
        return "ExceptionInsertion " . $this->getCode()
            . ": " . $this->getMessage() . "<br />" . " in "
            . $this->getFile() . " on line " . $this->getLine()
            . "<br />";
    }
}