<?php

header("Access-Control-Allow-Origin: *");
include './connection.php';

if(isset($_POST['user_id'])) {
    $user_id=$_POST['user_id'];
    $sql="SELECT * FROM todos WHERE user_id='$user_id'";
    $result=mysqli_query($conn,$sql);
    $todos=[];
    while($row[]=mysqli_fetch_assoc($result)){
        $todos=$row;
    }
    echo json_encode($todos);
}else{
    $data=[
        'success'=>false,
        'message'=>'Please fill all the fields'

    ];
    echo json_encode($data);
}