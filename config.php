<?php 
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db = "crud_fop";
//connection work
$conn = new mysqli($host , $user , $pass , $db);
if($conn->connect_error){
    echo "connection failed";
}


//insertion operation

function insertData($table_name, $data){
    global $conn;
    $cols = implode(",",array_keys($data));
    $values = implode("','",$data);
    $query = $conn->query("insert into $table_name ($cols) values ('$values')");
    return $query;
    // if($query){
    //     echo "insert successfull";
    // }
    // else{
    //     "insert failed";
    // }
}
//calling function
function callingData($table){
    global $conn;

    $query = $conn->query("select * from $table");

    $data = $query->fetch_all(MYSQLI_ASSOC);
    return $data;
}
// delete record function

function deleteRecord($table,$cond){
    global $conn;
    $query = $conn->query("DELETE FROM $table WHERE $cond");
    return $query;
}
//redirect function

function redirect($page){
    // echo "<script>window.open('$page','_self')</script>";

    //redirect method given by php
    header("location: $page");  
}
function setAlert($msg,$type){
    $_SESSION['flash'] = $msg;
    $_SESSION['type'] = $type;
}
function getAlert($type){
    if(isset($_SESSION['flash'])){
        echo "<div class='alert-$type alert'>". $_SESSION['flash'] . "</div>";
        unset($_SESSION['flash']);
        unset($_SESSION['type']);
    }

}

?>










