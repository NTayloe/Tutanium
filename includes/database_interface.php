<?php

    function queryDatabase($sql, $connection){

        $result = $connection->query($sql) or die(mysqli_error($connection));

        return $result;

    }

    function checkValueAlreadyExist($value, $column, $table, $connection){

        //query the database for the value in question
        $sql = sprintf("Select 1 FROM %s WHERE %s = '%s'", $table, $column, $value);
        $result = queryDatabase($sql, $connection); 
        
        if($result->num_rows == 1){
            return true;
        }

        return false;

    }

?>