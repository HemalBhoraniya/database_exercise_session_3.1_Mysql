<?php
header("content-Type: application/json");
header("Acess-Control-Allow-Origin: *");

require_once '../dbConnection.php';
require_once '../querys.php';

$req = $_REQUEST['deleteDetails'];
$id = $_REQUEST['id'];

if (isset($req)) {
    if (isset($id)) {
        $sql = "DELETE FROM salary where id='$id'";

        if ($result = new_query($sql)) {
            $response = array("message" => "Data deleted.", "status" => "200", "body" => array("deleted id" => $id));
            echo json_encode($response);
        } else {
            $response = array("message" => "Error in while deleting data", "status" => "400", "error" => $conn->error);
            echo json_encode($response);
        }
    } else {
        $response = array("message" => "Error in writting url", "status" => "400");
        echo json_encode($response);
    }
} else {
    $response = array("message" => "Error in deleteDetails", "status" => "400");
    echo json_encode($response);
}
?>