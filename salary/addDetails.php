<?php
header("content-Type: application/json");
header("Acess-Control-Allow-Origin: *");

require_once '../dbConnection.php';
require_once '../querys.php';

$req = $_REQUEST['addDetails'];
$empid = $_REQUEST['emp_id'];
$month = $_REQUEST['month'];
$year = $_REQUEST['year'];
$amount = $_REQUEST['amount'];
$genrated = $_REQUEST['generated_date'];


if (isset($req)) {
    if (isset($empid) && isset($month) && isset($year) && isset($amount) && isset($genrated)) {
        $sql = "INSERT INTO salary (emp_id, month, year, amount, generated_date) VALUES ('$empid','$month','$year','$amount','$genrated')";

        if ($result = new_query($sql)) {
            $response = array("message" => "Data inserted.", "status" => "200", "body" => array("inserted id" => $conn->insert_id));
            echo json_encode($response);
        } else {
            $response = array("message" => "Error in while inserting data", "status" => "400", "error" => $conn->error);
            echo json_encode($response);
        }
    } else {
        $response = array("message" => "Error while writting data", "status" => "400");
        echo json_encode($response);
    }
} else {
    $response = array("message" => "Error in addDetails", "status" => "400");
    echo json_encode($response);
}
