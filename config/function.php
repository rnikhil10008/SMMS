<?php

session_start();

require 'dbcon.php';

//Input field validation
function validate($inputData)
{
    global $con;
    $validatedData = mysqli_real_escape_string($con, $inputData);
    return trim($validatedData);

}

// Redirect from 1 page to another page with the message(status)
function redirect($url, $status)
{
    $_SESSION['status'] = $status;
    header('Location:' . $url);
    exit (0);

}

//Display message or status after any process.
function alertMessage()
{

    if (isset ($_SESSION['status'])) {
        echo '<div class= "alert alert-warning alert-dismissible fade show" role="alert">
        ' . $_SESSION['status'] . '
        <button type= "button" class = "btn-close" data-bs-dismiss="alert" aria-label="Close"></br>
        </div>';
        unset($_SESSION['status']);
    }
}

// Insert record using this function 

function insert($tableName, $data)
{
    global $con;
    $table = validate($tableName);

    $columns = array_Keys($data);
    $values = array_values($data);

    $finalColumn = implode(',', $columns);
    $finalValues = "'" . implode("', '", $values) . "'";

    $query = "INSERT INTO $table ($finalColumn) VALUES ($finalValues)";
    $result = mysqli_query($con, $query);
    return $result;
}

// Update data using this funciton
function update($tableName, $id, $data)
{
    global $con;

    $table = validate($tableName);
    $id = validate($id);

    $updateDataString = "";

    foreach ($data as $column => $value) {
        $updateDataString .= $column . '=' . "'$value',";
    }

    $finalUpdateData = substr(trim($updateDataString), 0, -1);
    $query = "UPDATE $table SET $finalUpdateData WHERE id ='$id";
    $result = mysqli_query($con, $query);
    return $result;

}

function getAll($tableName, $status = NULL)
{
    global $con;

    $table = validate($tableName);
    $status = validate($status);

    if ($status == 'status') {

        $query = "SELECT * FROM $table WHERE status ='0'";
    } else {
        $query = "SELECT * FROM $table";
    }
    return mysqli_query($con, $query);


}
function getById($tableName, $id)
{
    global $con;

    $table = validate($tableName);
    $id = validate($id);


    $query = "SELECT * FROM $table WHERE id = '$id' LIMIT 1";
    $result = mysqli_query($con, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $response = [
                'status' => 404,
                'data' => $row,
                'message' => 'Data Found'
            ];
        } else {

            $response = [

                'status' => 404,
                'message' => 'No Data Found'
            ];
            return $response;
        }
    } else {
        $response = [
            'status' => 500,
            'message' => 'Something went wrong'
        ];
        return $response;
    }
}

// Delete data from database using id
function delete($tableName, $id)
{
    global $con;

    $table = validate($tableName);
    $id = validate($id);
    $query = "DELETE * FROM $table WHERE id = '$id' LIMIT 1";
    $result = mysqli_query($con, $query);
    return $result;
}
?>