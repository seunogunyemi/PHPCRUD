<?php

require_once "../config.php";

//register users
function registerUser($fullnames, $email, $password, $gender, $country){
    $conn = db();
    // $host = "127.0.0.1";
    // $user = "root";
    // $db = "zuriphp";
    // $password = "";
    // $conn = mysqli_connect($host, $user, $password, $db);
    $sql = "INSERT INTO `students` (`fullnames`, `country`, `email`, `gender`, `password`)
             VALUES ('$fullnames', '$country', '$email', '$gender', '$password')";
    $sqlEmailCheck = mysqli_query($conn, "SELECT `email` FROM `students` WHERE `email` = '".$_POST['email']."'");
    if(mysqli_num_rows($sqlEmailCheck)){
        exit ('email already exists');
    }
    If(!mysqli_query($conn, $sql)){
        echo "error in registration";
    }
    else{
        header("location: http://localhost/USERAUTHMYSQL/userAuthMySQL/dashboard.php");
    }
    mysql_close();
    //create a connection variable using the db function in config.php
    
   //check if user with this email already exist in the database
}


//login users
function loginUser($email, $password){
    //create a connection variable using the db function in config.php
    $conn = db();
    $sql = "SELECT * FROM `students` WHERE `email` = '$email' AND `password` = '$password'; ";
    // $result = mysqli_query($conn, $sql);
    $rowcount = mysqli_query($conn, $sql);   
    if($rowcount > 0){
     header("location: http://localhost/USERAUTHMYSQL/userAuthMySQL/dashboard.php");
 }
 else{
     exit('incorrect login details');
 }

    echo "<h1 style='color: red'> LOG ME IN (IMPLEMENT ME) </h1>";
    // //open connection to the database and check if username exist in the database
    // //if it does, check if the password is the same with what is given
    // //if true then set user session for the user and redirect to the dasbboard
}


function resetPassword($email, $password){
    //create a connection variable using the db function in config.php
    $conn = db();
    $password = $_POST['password'];
    $newpassword = $_POST['newpassword'];
    $dbconn = mysqli_connect($host, $user, $password, $db);
    // echo "<h1 style='color: red'>RESET YOUR PASSWORD (IMPLEMENT ME)</h1>";
    $password = $_POST['password'];
    $sqlAccountCheck = "SELECT * FROM `students` WHERE `email` = '$email' AND `password` = 'password';";
    //open connection to the database and check if username exist in the database
    $sqlReset = "UPDATE `students` SET `password`= '$newpassword';";
    if($password = $newpassword){
        echo "new password cannot be the same as old password";
    }
    else{
        
        header("location: http://localhost/USERAUTHMYSQL/userAuthMySQL/dashboard.php");
        echo "<script>alert('password changed successfully')</script>";
    }
    //if it does, replace the password with $password given
}

function getusers(){
    $conn = db();
    $sql = "SELECT * FROM Students";
    $result = mysqli_query($conn, $sql);
    echo"<html>
    <head></head>
    <body>
    <center><h1><u> ZURI PHP STUDENTS </u> </h1> 
    <table border='1' style='width: 700px; background-color: magenta; border-style: none'; >
    <tr style='height: 40px'><th>ID</th><th>Full Names</th> <th>Email</th> <th>Gender</th> <th>Country</th> <th>Action</th></tr>";
    if(mysqli_num_rows($result) > 0){
        while($data = mysqli_fetch_assoc($result)){
            //show data
            echo "<tr style='height: 30px'>".
                "<td style='width: 50px; background: blue'>" . $data['id'] . "</td>
                <td style='width: 150px'>" . $data['fullnames'] .
                "</td> <td style='width: 150px'>" . $data['email'] .
                "</td> <td style='width: 150px'>" . $data['gender'] . 
                "</td> <td style='width: 150px'>" . $data['country'] . 
                "</td>
                <form action='action.php' method='post'>
                <input type='hidden' name='id'" .
                 "value=" . $data['id'] . ">".
                "<td style='width: 150px'> <button type='submit', name='delete'> DELETE </button>".
                "</tr>";
        }
        echo "</table></table></center></body></html>";
    }
    //return users from the database
    //loop through the users and display them on a table
}

 function deleteaccount($id){
    $host = "127.0.0.1";
    $user = "root";
    $db = "zuriphp";
    $password = "";
    $id = $_POST['id'];
    $conn = mysqli_connect($host, $user, $password, $db);
    $sqlDelete = mysqli_query($conn, "DELETE  FROM `students` WHERE `id`= '$id';");
    if($sqlDelete === TRUE){
        echo "account deleted. Go back and refresh the table";
    }
    else{
        echo "deletion unsuccessful";
    }
  
     //delete user with the given id from the database
 }
