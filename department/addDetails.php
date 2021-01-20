<?php
    header("content-Type: application/json");
    header("Acess-Control-Allow-Origin: *");

    require_once '../dbConnection.php';
    require_once '../querys.php';

    $req = $_REQUEST['addDetails'];
    $name = $_REQUEST['name'];
    $createdDate = $_REQUEST['createdDate'];

    if(isset($req)){
        if(isset($name) && isset($createdDate)){
            $sql= "INSERT INTO department (name, created_date) VALUES ('$name','$createdDate')";
            
            if($result=new_query($sql)){
                $response = array("message" => "Data inserted.", "status" => "200", "body" => array("inserted id" => $conn->insert_id));
                echo json_encode($response);
            }
            else
            {
                $response = array("message" => "Error in while inserting data", "status" => "400" , "error" => $conn->error);
                echo json_encode($response);
                }
        }
        else{
            $response = array("message" => "Error while writing date", "status" => "400");
            echo json_encode($response);
        }

    }
    else{
        $response = array("message" => "Error in addDetails", "status" => "400" );
        echo json_encode($response);
    }

?>