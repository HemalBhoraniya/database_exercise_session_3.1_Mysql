<?php
    header("content-Type: application/json");
    header("Acess-Control-Allow-Origin: *");

    require_once '../dbConnection.php';
    require_once '../querys.php';

    $req = $_REQUEST['addDetails'];
    $name = $_REQUEST['name'];
    $empno = $_REQUEST['emp_no'];
    $deptid = $_REQUEST['dept_id'];
    $join = $_REQUEST['join_date'];
    $end = $_REQUEST['end_date'];


    if(isset($req)){
        if(isset($name) && isset($empno) && isset($deptid) && isset($join) && isset($end)){
            $sql= "INSERT INTO employee (name, emp_no, dept_id, join_date, end_date) VALUES ('$name','$empno','$deptid','$join','$end')";
            
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
            $response = array("message" => "Error while writting data", "status" => "400");
            echo json_encode($response);
        }

    }
    else{
        $response = array("message" => "Error in addDetails", "status" => "400" );
        echo json_encode($response);
    }
