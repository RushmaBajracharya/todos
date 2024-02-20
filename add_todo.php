<?php

header("Access-Control-Allow-Origin: *");
include './connection.php';

if(isset($_POST['user_id'])&& isset($_POST['title'])&& isset($_POST['description'])){
    $userId=$_POST['user_id'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $date=date('y-m-d');

    $sql="Insert into todos(user_id,title,description,date) values ('$userId','$title','$description','$date')";
    $result=mysqli_query($conn,$sql);
    if($result){
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
}else{
    $data=[
        'success'=>false,
        'message'=>'Please fill all the fields'

    ];
    echo json_encode($data);
}