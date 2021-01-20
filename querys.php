<?php
    include_once 'dbConnection.php';

    function new_query($query)
    {
        global $conn;
        if($result = $conn->query($query)){
            return true;
        }
        else{
            return false;
        }
    }

    function get_details($query){
        global $conn;
        if ($result = $conn->query($query)) {
            $data=$result->fetch_assoc();
            return $data;
        } else {
            return false;
        }


    }
?>