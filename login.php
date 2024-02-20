<?php

header("Access-Control-Allow-Origin: *");
include './connection.php';

if(isset($_POST['email']) && isset($_POST['password'])){

    $email=$_POST['email'];
    $password=$_POST['password'];

    $checkSql="SELECT * from users Where email='$email'";
    $checkResult= mysqli_query($conn,$checkSql);

    if($checkResult->num_rows >0){
        $row=$checkResult->fetch_assoc();

        if(password_verify($password,$row['password'])){
            $data=[
                'success'=>true,
                'message'=>'Login successful',
                'user'=>$row    
            ];
           
        }else{
            $data=[
                'success'=>false,
                'message'=>'Invalid password',
                  
            ];
        }
        
    }else{
        $data=[
            'success'=>false,
            'message'=>'Invalid email',
              
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