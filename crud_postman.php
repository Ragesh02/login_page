<?php

header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Method: GET, POST, PUT, DELETE');
// header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

function createRecord($data){
    
    //global $connection;
    include "db_connect.php";
    
    $name = $data['name'];
    $patient_type = $data['patient_type'];
    $phone_number = $data['phone_number'];

    $sql = "INSERT INTO patients (id, name, patient_type, phone_number) 
        VALUES (NULL, '$name', '$patient_type', '$phone_number')";
    
    $result = mysqli_query($connection, $sql);

    if($result){
        return $lastInderId = mysqli_insert_id($connection);
    }else{
        mysqli_error($connection);
    }    
}

function updateRecord($id, $data){
    include "db_connect.php";
    
    $name = $data['name'];
    $patient_type = $data['patient_type'];
    $phone_number = $data['phone_number'];

    $sql = "UPDATE patients SET 
    name='$name', patient_type = '$patient_type', phone_number = '$phone_number'
    where id = '$id'";

    $result = mysqli_query($connection, $sql);
    if($result){
        return $affectedRow = mysqli_affected_rows($connection);
    }
}

function readRecords(){

    include "db_connect.php";
    $sql = "SELECT * FROM patients";
    $result = mysqli_query($connection, $sql);

    if($result){
        $records = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $records;
    }

}

function deleteRecord($id){

    include "db_connect.php";
    $sql = "DELETE from patients WHERE id = $id";
    $result = mysqli_query($connection, $sql);
    if($result){
        return $affected_row = mysqli_affected_rows($connection);
    }
}

$method = $_SERVER['REQUEST_METHOD'];

switch($method){
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $createdId = createRecord($data);
        echo json_encode(['id' => $createdId]);
        break;

    case 'GET':
        $records = readRecords();
        echo json_encode($records);
        break;

    case 'PUT':
        $data = json_decode(file_get_contents('php://input'), true);
        $id = $_GET['id'];
        $affected_rows = updateRecord($id, $data);
        echo json_encode(['affected_rows' => $affected_rows]);
        break;

    case 'DELETE':
        $data = json_decode(file_get_contents('php://input'), true);
        $id = $_GET['id'];
        $affected_rows = deleteRecord($id);
        echo json_encode(['Affected Rows' => $affected_rows]);
        break;
}

?>