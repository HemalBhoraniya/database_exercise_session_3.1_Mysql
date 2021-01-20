<?php
header("content-Type: application/json");
header("Acess-Control-Allow-Origin: *");

require_once '../dbConnection.php';
require_once '../querys.php';

$req = $_REQUEST['updateDetails'];
$id = $_REQUEST['id'];


if (isset($req)) {
    if (isset($id)) {

        $oldData = get_details("SELECT * FROM salary");

        $query = "UPDATE salary SET ";
        $query .= isset($_REQUEST['emp_id']) ? "emp_id = '{$_REQUEST['emp_id']}'," : "emp_id = '{$oldData['emp_id']}',";
        $query .= isset($_REQUEST['month']) ? "month = '{$_REQUEST['month']}'," : "month = '{$oldData['month']}',";
        $query .= isset($_REQUEST['year']) ? "year = '{$_REQUEST['year']}'," : "year = '{$oldData['year']}',";
        $query .= isset($_REQUEST['amount']) ? "amount = '{$_REQUEST['amount']}'," : "amount = '{$oldData['amount']}',";
        $query .= isset($_REQUEST['generated_date']) ? "generated_date = '{$_REQUEST['generated_date']}' " : "generated_date = '{$oldData['generated_date']}' ";
        $query .= "WHERE id='$id'";

        if ($result = new_query($query)) {
            $response = array("message" => "Data updated.", "status" => "200", "body" => array("updated id" => $id));
            echo json_encode($response);
        } else {
            $response = array("message" => "Error in while updating data", "status" => "400", "error" => $conn->error);
            echo json_encode($response);
        }
    } else {
        $response = array("message" => "Error while writing data", "status" => "400");
        echo json_encode($response);
    }
} else {
    $response = array("message" => "Error in updateDetails", "status" => "400");
    echo json_encode($response);
}
