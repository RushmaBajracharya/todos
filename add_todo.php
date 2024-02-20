<?php

header("Access-Control-Allow-Origin: *");
include './connection.php';

if(isset($_POST['user_id'])&& isset($_POST['title'])&& isset($_POST['description'])){
    $userId=$_POST['user_id'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $date=date('Y-m-d');

    // Prepare the SQL statement
    $sql = "INSERT INTO todos(user_id, title, description, date) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "isss", $userId, $title, $description, $date);

    // Execute the prepared statement
    $success = mysqli_stmt_execute($stmt);

    if($success) {
        $data=[
            'success'=>true,
            'message'=>'Todo added successfully'
    
        ];
    }else{
        $data=[
            'success'=>false,
            'message'=>'Todo adding failed'
    
        ];
        
    }
    echo json_encode($data);
}else{
    $data=[
        'success'=>false,
        'message'=>'Please fill all the fields'

    ];
    echo json_encode($data);
}