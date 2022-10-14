<?php
    function checkEmpty($value)
    {
        if (empty($value))
        {

            return false ;
        }
        return true ;
        
    }

    function ValidEmail($email)
    {
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            return false ;
        }
        return true;
    }
?>