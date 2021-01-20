<?php
    header("content-Type: application/json");
    header("Acess-Control-Allow-Origin: *");

    require_once '../dbConnection.php';
    require_once '../querys.php';

    $req = $_REQUEST['updateDetails'];
    $id = $_REQUEST['id'];

    if(isset($req)){
        if(isset($id)){

            $oldData = get_details("SELECT * FROM department");

            $query = "UPDATE department SET ";
            $query .= isset($_REQUEST['name']) ? "name = '{$_REQUEST['name']}'," : "name = '{$oldData['name']}',";
            $query .= isset($_REQUEST['created_date']) ? "created_date = '{$_REQUEST['created_date']}' " : "created_date = '{$oldData['created_date']}' ";
            $query .= "WHERE id='$id'";
 
            if($result = new_query($query)){
                $response = array("message" => "Data updated.", "status" => "200", "body" => array("updated id" => $id));
                echo json_encode($response);
            }
            else
            {
                $response = array("message" => "Error in while updating data", "status" => "400" , "error" => $conn->error);
                echo json_encode($response);
                }
        }
        else{
            $response = array("message" => "Error while writing data", "status" => "400");
            echo json_encode($response);
        }

    }
    else{
        $response = array("message" => "Error in updateDetails", "status" => "400" );
        echo json_encode($response);
    }
